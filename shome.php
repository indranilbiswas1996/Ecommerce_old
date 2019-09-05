<?php
$servername = "localhost";
$username = "root";
$password = "";
$conn = new mysqli($servername, $username, $password);
if($conn->connect_error){
    die("Connection failed: ".$conn->connect_error);
}
else{
    echo "Ok";

}
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <?php include 'header_files.php';?>
</head>
<body>
<div class="container">
    <div class="header-container">
        <div class="logo-container">
            <a href="#">
                <img src="icons/2.png" class="icon">
            </a>
        </div>
        <div class="blank-container"></div>
        <div class="name-container">
            <a href="#">Indranil Biswas</a>
        </div>
        <div class="sign-out-container">
            <a href="#"><span class="fa fa-sign-out"></span></a>
        </div>
    </div>
    <div class="control-container">
        <div class="control-option">
            <a href="#">Upload Product</a>
        </div>
        <div class="control-option">
            <a href="#">Products</a>
        </div>
        <div class="control-option">
            <a href="#">Orders</a>
        </div>
        <div class="control-option">
            <a href="#">Accepted</a>
        </div>
        <div class="control-option">
            <a href="#">Deleted</a>
        </div>
        <div class="control-option">
            <a href="#">Delivered</a>
        </div>
    </div>
</div>
</body>
</html>