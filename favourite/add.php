<?php 

include "../connect.php" ; 


$usersid = filterRequest("users_id") ; 
$itemsid = filterRequest("items_id") ; 


$data = array(
    "favourite_userid"  =>   $usersid , 
    "favourite_itemsid"  =>   $itemsid
);


insertData("favourite" ,$data) ;