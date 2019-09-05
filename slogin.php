<?php
include 'vugy8y90u78edcvjb/poivd9fj59746hbj.php'
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <?php include 'header_files.php';?>
</head>
<body>
<div class="container">
    <?php include 'sheader.php';?>
    <div class="login-container">
        <form action="<?=$_SERVER['PHP_SELF'];?>" method="post">
            <div class="login-div">
                <div class="login-part">
                    <img src="icons/4.png" class="login-part-img">
                </div>
                <div class="login-part">
                    <div class="login-part-inner" id="login_div" >
                        <div class="headline"><span>Login</span></div>
                        <div class="alert alert-danger" id="login_err">
                        </div>
                        <div class="login-item">
                            <input type="text" name="userid" id="userid" class="login-textbox" placeholder="Enter Mobile number">
                        </div>
                        <div class="login-item">
                            <input type="password" name="password" id="password" class="login-textbox" placeholder="Password">
                        </div>
                        <div class="login-item">
                            <button type="submit" class="login-button" name="login" id="login">Login</button>
                        </div>
                        <div class="login-item">
                            <a href="#" onclick="openRegistration()">Create an account</a>
                            <a href="#" style="float: right;">Forgot password?</a>
                        </div>
                    </div>
                    <div class="login-part-inner" id="registration_div" style="display: none">
                        <div class="headline"><span>Registration</span></div>
                        <div class="alert alert-danger" id="registration_err">
                        </div>
                        <div class="login-item">
                            <input type="text" name="fname" id="fname" class="login-textbox" placeholder="First name">
                        </div>
                        <div class="login-item">
                            <input type="text" name="lname" id="lname" class="login-textbox" placeholder="Last name">
                        </div>
                        <div class="login-item">
                            Gender :
                            <input type="radio" name="gender" value="1" checked> Male
                            <input type="radio" name="gender" value="2"> Female
                            <input type="radio" name="gender" value="3"> Other
                        </div>
                        <div class="login-item">
                            <input type="text" name="phone" id="phone" class="login-textbox" placeholder="Enter Mobile number">
                        </div>
                        <div class="login-item">
                            <input type="text" name="email" id="email" class="login-textbox" placeholder="Enter Email id">
                        </div>
                        <div class="login-item">
                            <input type="password" name="n_password" id="n_password" class="login-textbox" placeholder="New password">
                        </div>
                        <div class="login-item">
                            <input type="password" name="c_password" id="c_password" class="login-textbox" placeholder="Confirm password">
                        </div>
                        <div class="login-item">
                            <button type="submit" class="login-button" name="submit" id="submit">Submit</button>
                        </div>
                        <div class="login-item">
                            <a href="#" onclick="openLogin()">Existing User? Log in</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
    function openRegistration(){
        document.getElementById('login_div').style.display = "none";
        document.getElementById('registration_div').style.display = "block";
    }
    function openLogin(){
        document.getElementById('login_div').style.display = "block";
        document.getElementById('registration_div').style.display = "none";
    }
    /*Registration*/
    $(document).ready(function(){
        $('#submit').click(function(e){
            e.preventDefault();
            var fname = $("#fname").val();
            var lname = $("#lname").val();
            var gender =  $("input[name='gender']:checked").val();
            var phone = $("#phone").val();
            var email = $("#email").val();
            var n_password = $("#n_password").val();
            var c_password = $("#c_password").val();
            $.ajax({
                type : "POST",
                url : "/Ecommerce/sregistration_background.php",
                dataType : "json",
                data:{fname:fname, lname:lname, gender:gender, phone:phone, email:email, n_password:n_password, c_password:c_password},
                success : function(data){
                    if(data.code == "200"){
                        /*$("#registration_err").html("<ul>"+data.msg+"</ul>");
                        $("#registration_err").css("display","block");*/
                        window.location = "/Ecommerce/ajax_test.php";
                    }else{
                        $("#registration_err").html("<ul>"+data.msg+"</ul>");
                        $("#registration_err").css("display","block");
                    }
                }
            });
        });
    });
    /*Login*/
    $(document).ready(function(){
        $('#login').click(function(e){
            e.preventDefault();
            var userid = $("#userid").val();
            var password = $("#password").val();
            $.ajax({
                type : "POST",
                url : "/Ecommerce/slogin_background.php",
                dataType : "json",
                data:{userid:userid, password:password},
                success : function(data){
                    if(data.code == "200"){
                        /*$("#login_err").html("<ul>"+data.msg+"</ul>");
                        $("#login_err").css("display","block");*/
                        window.location = "/Ecommerce/slogin.php";
                    }else{
                        $("#login_err").html("<ul>"+data.msg+"</ul>");
                        $("#login_err").css("display","block");
                    }
                }
            });
        });
    });
</script>
</body>
</html>