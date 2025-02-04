<?php
    include "connection.php";
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "DELETE from `clients` where id=$id";
        $conn->query($sql);
    }
    header('location:/myform/index.php');
    exit;
?>