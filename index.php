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

session_start();
function getProducts($url)
{
    $products_json = file_get_contents($url);
    $decoded_products = json_decode($products_json);
    $_SESSION['previousPageHash'] = $decoded_products->pagination->previous;
    $_SESSION['nextPageHash'] = $decoded_products->pagination->next;
    return $decoded_products;
}

function productsFilter($navController)
{
    $filter = $_GET['filter'] ?? null;

    $prevPageHash = $_SESSION['previousPageHash'];
    $nextPageHash = $_SESSION['nextPageHash'];

    switch ($filter) {
        case 'yesterday':
            return getProducts($navController->yesterday());
        case 'today':
            return getProducts($navController->today());
        case 'previous':
            return getProducts($navController->pagination($prevPageHash));
        case 'next':
            return getProducts($navController->pagination($nextPageHash));
        default:
            return getProducts($navController->allProducts());
    }
}

$decoded_products = productsFilter($navController);
$products = $decoded_products->result->product;


require './src/views/filter.view.php';
require './src/views/card.view.php';
require './src/views/pagination.view.php';
