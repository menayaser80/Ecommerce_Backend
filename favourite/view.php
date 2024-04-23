<?php


include "../connect.php";


$id = filterRequest("id");


getAllData("myfavourite", "favourite_userid = ?  ", array($id));