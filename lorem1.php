<?php
require_once 'inc/config.php';

$contents = nl2br(file_get_contents('lorem.txt'));
$contents = explode('<br />'.PHP_EOL.'<br />'.PHP_EOL, $contents);

debug($contents);
foreach ($contents as $key => $content) {
	file_put_contents('lorem/lorem'.$key.'.txt', $content);
}


 ?>