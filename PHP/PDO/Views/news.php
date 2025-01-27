<?php


$content= 'sono pagina news';
$title='news';



require 'header.php';
?>
<div>
    <p><?=/**@var $content */$content?></p>
    <p><?=$_SERVER['PHP_SELF']?></p>

</div>
<?php
require 'footer.php';
?>
