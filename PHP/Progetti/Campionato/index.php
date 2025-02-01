<?php

require 'Dbconnection.php';

$config= require('db_config.php');

$db= Dbconnection::getDb($config);

require 'header.php';
?>


<div class="container bg-dark mt-5">

</div>

<?php
require 'footer.php';
?>
