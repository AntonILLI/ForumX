<!--?php require "header.php"; ?-->

<main>
    <h1>Signup</h1>
    <form action="scripts/signup.php" method="post">
        <input type="text" name="username_x" placeholder="Username">
        <input type="text" name="email_x" placeholder="Email">
        <input type="password" name="passwd_x" placeholder="Password">
        <input type="password" name="passwd_repeat" placeholder="Confirm password">
        <button type="submit" name="signup-btn">Signup</button>
    </form>
</main>

<?php require "footer.php"; ?>