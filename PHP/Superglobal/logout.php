<?php
session_start();
$_SESSION=[];
session_destroy();
setcookie(session_name(),'', time()-3600,'/','', false, false);
echo 'logged out';