<?php

require "vendor/autoload.php";

$password = "totally-insecure-but-lengthy-password";

$lib = new Chevron\Password\Bcrypt;

$hash = $lib->info('$2y$08$M4o8vexTiZ9R6.gK8UJpleWq/7a8JgEGF9X3p0BT54zNF9APNcqUS');

var_export($hash);

