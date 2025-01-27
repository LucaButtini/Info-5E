<?php
function isActive($page){
return ($_SERVER['PHP_SELF'] === $page)? 'active' : '';
}