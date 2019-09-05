<?php
/**
 * Created by IntelliJ IDEA.
 * User: INDRANIL
 * Date: 9/2/2019
 * Time: 11:18 PM
 */
$servername = "localhost";
$username = "root";
$password = "";
$db = "ecommerce";
$conn = new mysqli($servername, $username, $password, $db);
if($conn->connect_error){
    die("Connection failed: ".$conn->connect_error);
}
?>