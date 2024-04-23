<?php

include "../connect.php";


$categoryid = filterRequest("id");

// getAllData("itemsview", "categories_id = $categoryid");

$userid = filterRequest("users_id");

$stmt = $con->prepare("SELECT items1view.* , 1 as favourite , (items_price - (items_price * items_discount / 100 ))  as itemspricedisount FROM items1view 
INNER JOIN favourite ON favourite.favourite_itemsid  = items1view.items_id AND favourite.favourite_userid = $userid
WHERE categories_id = $categoryid
UNION ALL 
SELECT *  , 0 as favourite ,(items_price - (items_price * items_discount / 100 )) as itemspricedisount FROM items1view
WHERE  categories_id = $categoryid AND items_id NOT IN  ( SELECT items1view.items_id FROM items1view 
INNER JOIN favourite ON favourite.favourite_itemsid = items1view.items_id AND favourite.favourite_userid =  $userid  )");

$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
$count  = $stmt->rowCount();

if ($count > 0) {
    echo json_encode(array("status" => "success", "data" => $data));
} else {
    echo json_encode(array("status" => "failure"));
}