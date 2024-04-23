<?php 

include "../connect.php" ; 

$usersid = filterRequest("users_id");
$itemsid = filterRequest("items_id");

deleteData("cart" , "cart_id  = (SELECT cart_id FROM cart WHERE cart_usersid = $usersid AND cart_itemsid = $itemsid AND cart_orders =0 LIMIT 1) "); 