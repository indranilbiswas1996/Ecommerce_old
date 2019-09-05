<?php
/**
 * Created by IntelliJ IDEA.
 * User: INDRANIL
 * Date: 9/4/2019
 * Time: 2:15 PM
 */
$err = "";
if(empty($_POST["fname"])){
    $err .= "<li>Enter First name</li>";
}else{
    $fname = $_POST["fname"];
}
if(empty($_POST["lname"])){
    $err .= "<li>Enter Last name</li>";
}else{
    $lname = $_POST["lname"];
}
if(empty($_POST["gender"])){
    $err .= "<li>Select Gender</li>";
}else{
    $gender = $_POST["gender"];
}
if(empty($_POST["phone"])){
    $err .= "<li>Enter Mobile no</li>";
}else{
    $phone = $_POST["phone"];
    if(!preg_match("/^[6-9]{1}[0-9]{9}$/", $phone)) {
        $err .= "<li>Invalid Mobile no</li>";
    }
}
if(empty($_POST["email"])){
    $err .= "<li>Enter Email name</li>";
}else{
    $email = $_POST["email"];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $err .= "<li>Invalid Email format</li>";
    }
}
if(empty($_POST["n_password"])){
    $err .= "<li>Enter New password</li>";
}else{
    $n_password = $_POST["n_password"];
}
if(empty($_POST["c_password"])){
    $err .= "<li>Enter Confirm password</li>";
}else{
    $c_password = $_POST["c_password"];
}
if($_POST["c_password"]!=$_POST["n_password"]) {
    $err .= "<li>Password does not match</li>";
}
if(empty($err)){
    include_once 'vugy8y90u78edcvjb/jlkio9786rtfkbjhu.php';
    $sql = "SELECT id FROM a_profile WHERE phone = $phone";
    $result = mysqli_query($conn,$sql);
    $rowcount=mysqli_num_rows($result);
    if($rowcount == 0){
        $sql = "SELECT id FROM a_profile WHERE email = '$email'";
        $result = mysqli_query($conn,$sql);
        $rowcount=mysqli_num_rows($result);
        if($rowcount == 0) {
            $sql = "INSERT INTO a_profile (uid, f_name,l_name,gender,phone,verify_phone,email,verify_email,password,user_type)
                VALUES ('','" . $_POST["fname"] . "','" . $_POST["lname"] . "',0,'" . $_POST["phone"] . "',0,'" . $_POST["email"] . "',0,'" . $_POST["n_password"] . "',0)";

            if (mysqli_query($conn, $sql)) {
                $last_id = $conn->insert_id;
                $uid = "IPS000" . $last_id;
                $stmt = $conn->prepare("UPDATE a_profile SET uid='$uid' WHERE id=$last_id");
                $stmt->execute();
                $_SESSION['logged_in'] = 1;
                $_SESSION['uid'] = $uid;
                echo json_encode(['code' => 200]);
            }
        }else{
            $msg = "Email already exist";
            echo json_encode(['code'=>409, 'msg'=>$msg]);
        }
    }else{
        $msg = "Mobile number already exist";
        echo json_encode(['code'=>409, 'msg'=>$msg]);
    }
    $conn->close();
}else{
    echo json_encode(['code'=>404, 'msg'=>$err]);
}
?>