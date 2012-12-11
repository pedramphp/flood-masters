<?php

$headers = 'From: pedramphp@gmail.com' . "\r\n" .
'Reply-To: pedramphp@gmail.com' . "\r\n" .
'X-Mailer: PHP/' . phpversion();
mail('curlybit@thefloodmasters.com', 'CronJob', 'Testing Schedule Task (a.k.a Cron Job) Functionality', $headers);

?>
