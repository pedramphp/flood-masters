Function.prototype.createDelegate = function(obj, args, appendArgs){
    var method = this;
    return function() {
        var callArgs = args || arguments;
        if (appendArgs === true){
            callArgs = Array.prototype.slice.call(arguments, 0);
            callArgs = callArgs.concat(args);
        }else if (typeof appendArgs === 'number' && isFinite(appendArgs)){
            callArgs = Array.prototype.slice.call(arguments, 0); // copy arguments first
            var applyArgs = [appendArgs, 0].concat(args); // create method call params
            Array.prototype.splice.apply(callArgs, applyArgs); // splice them in
        }
        return method.apply(obj || window, callArgs);
    };
};

(function($){

	$.fn.gMap = function( options ){
		
		options = $.extend({}, $.fn.gMap.settings, options);
		var map, 
			privateMethods
			publicMethods = this;

		privateMethods = {

			getGeoCoderStatusDescription: function( status ){

				var desc = null;
				switch( status ){
					case google.maps.GeocoderStatus.ZERO_RESULTS:
						desc = "indicates that the geocode was successful but returned no results. This may occur if the geocode was passed a non-existent address or a latng in a remote location.";
						break;
					case 'OVER_QUERY_LIMIT':
						desc = "indicates that you are over your quota.";
						break
					case google.maps.GeocoderStatus.OK:
						desc = "indicates that the geocode was successful.";
						break
					case google.maps.GeocoderStatus.REQUEST_DENIED:
						desc = "indicates that your request was denied for some reason.";
						break
					case google.maps.GeocoderStatus.INVALID_REQUEST:
						desc = "generally indicates that the query (address or latLng) is missing.";
						break
				}
				return desc;
				
			}, /* </getGeoCoderStatusDescription> */
			
			getGeoCoderInstance: function(){
				return new google.maps.Geocoder();
			}
		};
		
		/**
		* @Public
		*/
		this.option = function(){
			if( arguments.length == 1 ){ return options[arguments[0]]; }
			switch(arguments[0]){
				case "mapType":
					map.setMapTypeId(google.maps.MapTypeId[arguments[1]]);
					break;
			}
		};

		/**
		* @Public
		*/
		this.getAddress = function(){
			
			 var error = {},
			 	 address = null,
			 	 geocoder,
			 	 latLng,
			 	 callback;

		 	 if( arguments.length == 3 ){
		 		latLng = new google.maps.LatLng( arguments[0], arguments[1] );
		 		callback = arguments[2]
			 }else{
				 latLng = arguments[0];
				 callback = arguments[1];
			 }
			 
			 geocoder = privateMethods.getGeoCoderInstance();
			 geocoder.geocode( { latLng: latLng }, function(results, status){
				 
				switch( status ){
					case "OK":
						success = true;
						address =  results[0].formatted_address;
	 					break;
	 				default:
		 				error = {
							status: status,
							description: privateMethods.getGeoCoderStatusDescription( status )
		 				};
	 					success = false;
	 					break;	
				}
				callback( address, success, error );
				
		     }.createDelegate(this)); 

		}, /* </getAddress> */

		/**
		* @Public
		*/
		this.getLatLng = function( address, callback ){

			 var error = {},
			 latLng = null,
			 	 geocoder;

			 geocoder = privateMethods.getGeoCoderInstance();
			 geocoder.geocode( { address: address}, function(results, status){

	 			switch( status ){
					case "OK":
						success = true;
						latLng =  results[0].geometry.location;
	 					break;
	 				default:
		 				error = {
							status: status,
							description: privateMethods.getGeoCoderStatusDescription( status )
		 				};
	 					success = false;
	 					break;	
				}
				callback( latLng, success, error );
				
		     }.createDelegate(this)); 

		}; /* </getLatLng> */


		/**
		* @Public
		*/		
		this.addMarkers = function(){
			
			var markers = [],
				markerEvents = ['click','dblclick','mouseup','mousedown','mouseover','mouseout'],
				addMarkerEventListener;

			addMarkerEventListener = function( marker, markerOption, selectedMarkerEvent){
				
				 marker["markerEvent"+selectedMarkerEvent] =  markerOption[selectedMarkerEvent];
				 google.maps.event.addListener( marker, selectedMarkerEvent, function() {
					 this["markerEvent"+selectedMarkerEvent].call( this, map );
				 });

			}

			var newMarkers = options.marker.slice(0);
			if( arguments.length == 1){
				newMarkers = arguments[0];
				options.marker = $.merge( options.marker, newMarkers );
			}
			
			if( newMarkers.length ){		
				for( var i = 0; i <  newMarkers.length; i++){
					 markers[i] = new google.maps.Marker({
					      position: new google.maps.LatLng( newMarkers[i].latitude, newMarkers[i].longitude ),
					      map: map
					 });
					 for( var j = 0; j < markerEvents.length; j++ ){
						 if( newMarkers[i][markerEvents[j]] ){
							 addMarkerEventListener( markers[i], newMarkers[i], markerEvents[j] );
						}
					}
					 
				}
			}

		}; /* </addMarkerEvents> */


		/**
		* Every Instance of DOM will call this method
		*/
		var gMap = function(){
			
			var dom = this, 
				$dom = $(dom),
				mapCore;
				
			mapCore={
				
				init: function(){
					if( !options.loadMap ){ return; }
					if( !options.latitude && !options.longitude && !options.address ){
						options.onError("You have to Pass Either Latitude,Longtitude or an address");
					} 

					if(  options.latitude && options.longitude ){
						this.myLatlng = new google.maps.LatLng( options.latitude, options.longitude );
						this.initMap();					
					}else{
						publicMethods.getLatLng( options.address, function( latLng, success, error ){ 
							if(!success) options.onError(error);
							this.myLatlng = latLng;
							this.initMap();	
						}.createDelegate(this));
					}

				},


				initMap: function(){

					// setting to map variable
					map = new google.maps.Map( dom, {
					      zoom: options.zoom,
					      center: this.myLatlng,
					      mapTypeId: google.maps.MapTypeId[ options.mapType ]
					});
					this.initEvents();

				},
				
				initEvents: function(){

					// Zoom Changed Event Listener
					google.maps.event.addListener(map, 'zoom_changed', function() {
						options.zoomChanged.call( dom, map );
					});

					publicMethods.addMarkers();

				},

				addMarkers: function(){
					
					var markers = [],
						markerEvents = ['click','dblclick','mouseup','mousedown','mouseover','mouseout'],
						addMarkerEventListener;

					addMarkerEventListener = function( marker, markerOption, selectedMarkerEvent){
						
						 marker["markerEvent"+selectedMarkerEvent] =  markerOption[selectedMarkerEvent];
						 google.maps.event.addListener( marker, selectedMarkerEvent, function() {
							 this["markerEvent"+selectedMarkerEvent].call( dom, map );
						 });

					}
					

					if( options.marker.length ){		
						for( var i = 0; i <  options.marker.length; i++){
							 markers[i] = new google.maps.Marker({
							      position: new google.maps.LatLng( options.marker[i].latitude, options.marker[i].longitude ),
							      map: map
							 });
							 for( var j = 0; j < markerEvents.length; j++ ){
								 if( options.marker[i][markerEvents[j]] ){
									 addMarkerEventListener( markers[i], options.marker[i], markerEvents[j] );
								}
							}
							 
						}
					}

				} /* </addMarkerEvents> */

			}; /* </mapCore> */
			mapCore.init();

		}; /* </ gMap >*/

		return this.each( gMap );
		

	};
	// You have to provice either ll or address.
	$.fn.gMap.settings ={
		mapType: 'ROADMAP', // ROADMAP, SATELLITE, HYBRID, TERRAIN   
		zoom: 8,
		latitude: null,//-34.397,
		longitude: null,//150.644,
		address: null, //1600 Amphitheatre Parkway, Mountain View, CA
		zoomChanged: $.noop, // this function will be triggered when the zoom changes in the map
		marker: [], // an array of Objects
		onError: $.noop,
		loadMap: true // Boolean - if you change it to false the map will not be loaded
	};
	
})(jQuery);



