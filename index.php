<?php
    session_start();
    include('connection.php');

    $Lregerror = $Sregerror =$semerror= $Lpasserror = $cadreerror = $Spasserror = $Apasserror = $nameerror = $brancherror = $emailerror = $phoneerror = $aderror = "";

    if(isset($_POST["Login"])){
      require "validateGuestLogin.php";
    }

    if(isset($_POST["signUp"])) {
      require "validateGuestSignUp.php";
    }
?>
<html>
    <head>
        <title>Quarters - NIT Andhra</title>
        <link rel="icon" type="image/png" href="Tlogo.png">
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>


        <div class="heading">
            <span>NIT Andhra Pradesh </span> <br> <span class="smallText">Book A Quarter Now!!!</span>
        </div>




        <div class="LS">
            <button></button>
            <button type="submit" name="SLogin" class="SLogin half">Log-In</button>
            <button type="submit" name="SsignUp" class="SsignUp half">Create Account</button>
            <button></button>
        </div>


        <form action="" method="post" class="login" name="login">
            <div class="field">
                <span class="error"><?php echo $Lregerror; ?></span>
                <input type="number" name="regNo" placeholder="User ID">
            </div>
            <div class="field">
                <span class="error"><?php echo $Lpasserror; ?></span>
                <input type="password" name="password" placeholder="Password">
            </div>
            <button type="submit" name="Login" class="Login">Log-In</button>
        </form>


        <form action="" method="post" class="signUp" name="signUp">
            <div class="field">
                <span class="error"><?php echo $Sregerror; ?></span>
                <input type="number" name="regNo" placeholder="User ID">
            </div>
            <div class="field">
                <span class="error"><?php echo $nameerror; ?></span>
                <input type="text" name="name" placeholder="Name">
            </div>
            <div class="field">
                <span class="error"><?php echo $cadreerror; ?></span>
                <input type="text" name="cadre" placeholder="Cadre" list="cadre">
                <datalist id="cadre">
                    <option value="Ad-Hoc">
                    <option value="Associate Professor">
                    <option value="Assistant Professor">
                    <option value="College Management Staff">
                    <option value="Head Of Dept.">
                </datalist>
            </div>
            <div class="field">
                <span class="error"><?php echo $brancherror; ?></span>
                <input type="text" name="branch" placeholder="Department" list="branch">
                <datalist id="branch">
                    <option value="CSE">
                    <option value="Bio-Tech">
                    <option value="EEE">
                    <option value="Management">
                    <option value="Civil">
                    <option value="Mech">
                    <option value="ECE">
                    <option value="MME">
                    <option value="Chemical">
                </datalist>
            </div>
            <div class="field">
                <span class="error"><?php echo $emailerror; ?></span>
                <input type="email" name="email" placeholder="Email">
            </div>
            <div class="field">
                <span class="error"><?php echo $phoneerror; ?></span>
                <input type="number" name="phone" placeholder="Phone Number">
            </div>
            <div class="field">
                <span class="error"><?php echo $Spasserror; ?></span>
                <input type="password" name="password" placeholder="Password">
            </div>
            <button type="submit" name="signUp" class="signup">Create Account</button>
        </form>

    </body>

    <script src="jquery3.1.4.js"></script>
    <script>

              $(".LS").find(".SLogin").click(function(e){
                $(this).css('border-bottom','solid 6px rgb(0,200,00)');
                $(".SsignUp").css('border-bottom','solid 3px gray');
                $(".login").css('display','block');
                $(".signUp").css('display','none');
              });

              $(".LS").find(".SsignUp").click(function(e){
                $(this).css('border-bottom','solid 6px rgb(0,200,00)');
                $(".SLogin").css('border-bottom','solid 3px gray');
                $(".login").css('display','none');
                $(".signUp").css('display','block');
              });

    </script>
</html>
