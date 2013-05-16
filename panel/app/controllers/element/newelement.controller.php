<?php

$app->configureApp(USER_HANDLING | LOG_PROTECTION | FORME);

$metadataJSON = Kompakt\Helpers\Beautifier::JSON(json_encode(array(null)));

$timestamp = time();

?>