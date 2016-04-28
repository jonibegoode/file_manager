<?php
require_once 'inc/db.php';
require_once 'inc/func.php';

$current_page = basename($_SERVER['PHP_SELF']); // Ex: index.php

$pages = array(
	'Accueil' => 'index.php',
	'About' => 'page.php',
	'Services' => 'page.php',
	'Contact' => 'form.php',
	'search' =>'search.php'
);

if($current_page){

}