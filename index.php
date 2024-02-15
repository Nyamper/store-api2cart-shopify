<?php

use controllers\NavigationController;
use controllers\QueryController;

include_once('./src/controllers/navigation.controller.php');
include_once('./src/controllers/query.controller.php');

$DOMEN = $_ENV["DOMEN"];
$API_KEY = $_ENV["API_KEY"];
$STORE_KEY = $_ENV["STORE_KEY"];
$ENDPOINT = 'product.list.json?';

$queryController = new QueryController($DOMEN,  $ENDPOINT, $API_KEY, $STORE_KEY);
$navController = new NavigationController($queryController);

function getProducts($url)
{
    $products_json = file_get_contents($url);
    $decoded_products = json_decode($products_json);
    return $decoded_products;
}

function productsFilter($navController)
{
    $filter = $_GET['filter'] ?? null;

    switch ($filter) {
        case 'yesterday':
            return getProducts($navController->yesterday());
        case 'today':
            return getProducts($navController->today());
        default:
            return getProducts($navController->allProducts());
    }
}

$decoded_products = productsFilter($navController);
$products = $decoded_products->result->product;

require './src/views/filter.view.php';
require './src/views/card.view.php';
