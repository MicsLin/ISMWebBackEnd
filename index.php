<?php
require_once dirname(__FILE__) . '/connect.php';
include_once dirname(__FILE__) . '/news/read.php';
include_once dirname(__FILE__) . '/banner/read.php';
include_once dirname(__FILE__) . '/categories/read.php';
include_once dirname(__FILE__) . '/products/read.php';
include_once dirname(__FILE__) . '/service_centers/read.php';
include_once dirname(__FILE__) . '/feedback/read.php';
include_once dirname(__FILE__) . '/partners/read.php';
include_once dirname(__FILE__) . '/about/read.php';
include_once dirname(__FILE__) . '/countries/read.php';
include_once dirname(__FILE__) . '/connectHeader.php';
include_once dirname(__FILE__) . '/echoData.php';

if ($_POST['isBackstage']) {
    $isBackstage = $_POST['isBackstage'];
    if ($isBackstage == 'products') {
        $productPage = ['list' => $products, 'category' => $categories];
        echoData(1, $productPage);
    }
    if ($isBackstage == 'news') echoData(1, $news);
    if ($isBackstage == 'banner') echoData(1, $banner);
    if ($isBackstage == 'categories') echoData(1, $categories);
    if ($isBackstage == 'service_centers'){
        $serviceCentersPage = ['serviceCenters' => $service_centers, 'countries' => $countries];
        echoData(1, $serviceCentersPage);
    }
    if ($isBackstage == 'feedback') echoData(1, $feedback); 
    if ($isBackstage == 'partners') echoData(1, $partners); 
    if ($isBackstage == 'about') echoData(1, $about); 
}

$result = array();
$result["categories"] = $categories;
$result["news"] = $news;
$result["banner"] = $banner;
$result["products"] = $products;
$result["service_centers"] = $service_centers;
$result["partners"] = $partners;
$result["about"] = $about;
echoData(1, $result);