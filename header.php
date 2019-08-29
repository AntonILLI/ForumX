<?php session_start() ?>

<!DOCTYPE html>
<html>
    <head>
        <title></title>
    </head>
    <body>

        <header>
<div>
    <?php
        if (isset($_SESSION['userID'])) {
            echo '<form action="scripts/logout.php" method="post">
            <button type="submit" name="logout-btn">Logout</button>
            </form>';
        } else {
            echo ' 
            <form action="scripts/login.php" method="post">
            <input type="text" name="email_x" placeholder="Username/email">
            <input type="password" name="passwd_x" placeholder="Password">
            <button type="submit" name="login-btn">Login</button>
            </form>
            ';
        }    
    ?>
    <a href="signup.php">Signup</a>
</div>
        </header>