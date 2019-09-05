<?php
include 'vugy8y90u78edcvjb/poivd9fj59746hbj.php';
/**
 * Created by IntelliJ IDEA.
 * User: INDRANIL
 * Date: 9/5/2019
 * Time: 12:44 AM
 */
$err = "";
if(empty($_POST["userid"])){
    $err .= "<li>Enter Mobile number</li>";
}else{
    $userid = $_POST["userid"];
    if(!preg_match("/^[6-9]{1}[0-9]{9}$/", $userid)) {
        $err .= "<li>Invalid Mobile no</li>";
    }
}
if(empty($_POST["password"])){
    $err .= "<li>Enter Password</li>";
}else{
    $password = $_POST["password"];
}
if(empty($err)){
    include_once 'vugy8y90u78edcvjb/jlkio9786rtfkbjhu.php';
    $sql = "SELECT id, uid, f_name, password FROM a_profile WHERE phone = $userid";
    $result = mysqli_query($conn,$sql);
    $rowcount=mysqli_num_rows($result);
    if($rowcount == 1){
        $row = $result->fetch_assoc();
        $_SESSION['logged_in'] = 1;
        $_SESSION['uid'] = $row['uid'];
        $profile_name = $row['f_name'];
        echo json_encode(['code'=>200]);
    }
    else{
        $msg = "<li>Account Doesn't exist</li>";
        echo json_encode(['code'=>404, 'msg'=>$msg]);
    }
    $conn->close();
}else{
    echo json_encode(['code'=>404, 'msg'=>$err]);
}
?>