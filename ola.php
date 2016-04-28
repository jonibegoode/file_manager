<?php
require_once 'inc/config.php';
setlocale(LC_ALL,'fr_FR.UTF-8');
$query= $db->prepare('SELECT name from products');
$query->execute();
$old_names= $query->fetchAll();
//debug($old_names);

$files= glob("img/*.jpg");
//debug($files);

$new_names= array();
foreach ($old_names as $old_name) {
	$new_names[] = str_replace(" ", "-", $old_name);
}

//debug($new_names);
/*foreach ($new_names as &$new_name) {
	$new_names_clean= iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $new_name);
}*/

$test= "élèmàt oùd&";

echo iconv("UTF-8","ASCII//TRANSLIT", $test);
 ?>