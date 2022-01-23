<?php

session_start();

try {
    $db = new PDO("mysql:host=localhost;dbname=templete;charset=utf8", "root", "");
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);//tüm verileri obj olarak çekti
} catch (PDOException $e) {
    print $e->getMessage();
    die();
}
?>