<?php


include "../connect.php";


$usersid = filterRequest("users_id");
$itemsid = filterRequest("items_id");


$count  = getData("cart", "cart_itemsid = $itemsid AND cart_usersid = $usersid" ,null  , false );


$data = array(
    "cart_usersid" =>  $usersid,
    "cart_itemsid" =>  $itemsid
);

insertData("cart", $data);
 

    // Mysql 

    // PHP 