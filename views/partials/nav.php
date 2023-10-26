 <!-- NAV BAR -->

 <?php
    if( isset($_SESSION["user_id"]) ){         
?>

<div class="col-2">Logo</div>
    <div class="col-8">
        <input class="w-100" type="search"></input>
    </div>    
    <div class="col-2">
        <div class="col">
            <a href="logout" class="mx-1">Logout</a>
            <a href="account" class="mx-1">Account</a>
            <a href="contact" class="mx-1">Contact</a>
        </div>
    </div>

<?php
        }
        else{
?>

<div class="col-2">Logo</div>
    <div class="col-8">
        <input class="w-100" type="search"></input>
    </div>    
    <div class="col-2">
        <div class="col">
            <a href="login" class="mx-1">Login</a>
            <a href="register" class="mx-1">Register</a>
            <a href="contact" class="mx-1">Contact</a>
        </div>
    </div>

<?php
        }
?>


