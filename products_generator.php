<?php
require_once '../inc/func.php';
require_once '../inc/db.php';

define('MAX_PRODUCTS', 20);

$contents = nl2br(file_get_contents('lorem.txt'));
$contents = explode('<br />'.PHP_EOL.'<br />'.PHP_EOL, $contents);
$pictures = glob('../img/product/*');

$products = array();
for ($i = 0; $i < MAX_PRODUCTS; $i++) {

	$rand_year = rand(2014, date('Y'));
	$rand_month = sprintf('%1$02d', $rand_year == date('Y') ? rand(1, date('n')) : rand(1, 12));
	$rand_day = sprintf('%1$02d', rand(1, 28));
	$rand_hour = sprintf('%1$02d', rand(0, 23));
	$rand_minute = sprintf('%1$02d', rand(0, 59));
	$rand_second = sprintf('%1$02d', rand(0, 59));

	$rand_date = $rand_year.'-'.$rand_month.'-'.$rand_day.' '.$rand_hour.':'.$rand_minute.':'.$rand_second;

	//echo $rand_date.'<br>';

	$product_description = str_replace(';', '.', trim($contents[$i]));
	$first_point_pos = strpos($product_description, '.');

	$product_category = rand(1, 6);
	$product_name = substr($product_description, 0, $first_point_pos);
	$product_description = substr($product_description, $first_point_pos + 2);
	$product_price = (float) rand(10, 500).'.'.rand(0, 99);

	$random_number = rand(0, 10);
	$product_picture = $random_number < 2 ? '' : basename($pictures[array_rand($pictures)]);

	$product_rating = (float) rand(0, 5).'.'.rand(0, 9);
	$product_rating = (float) $product_rating > 5.0 ? 5.0 : $product_rating;

	$products[] = array(
		'product_category' => $product_category,
		'product_name' => ucfirst($product_name),
		'product_description' => ucfirst($product_description),
		'product_price' => $product_price,
		'product_picture' => $product_picture,
		'product_rating' => $product_rating,
		'product_date' => $rand_date
	);
}

//exit(debug($products));

$query = $db->prepare('INSERT INTO products (category, name, description, price, picture, rating, date) VALUES (:category, :name, :description, :price, :picture, :rating, :date)');
$query->bindParam('category', $product_category);
$query->bindParam('name', $product_name);
$query->bindParam('description', $product_description);
$query->bindParam('price', $product_price);
$query->bindParam('picture', $product_picture);
$query->bindParam('rating', $product_rating);
$query->bindParam('date', $product_date);

$count = 0;

foreach($products as $key => $product) {

	$product_category = $product['product_category'];
	$product_name = $product['product_name'];
	$product_description = $product['product_description'];
	$product_price = $product['product_price'];
	$product_picture = $product['product_picture'];
	$product_rating = $product['product_rating'];
	$product_date = $product['product_date'];

	$query->execute();

	$insert_id = $db->lastInsertId();

	if (!empty($insert_id)) {
		$count++;
	}
}

echo $count.' produit(s) inséré(s)';