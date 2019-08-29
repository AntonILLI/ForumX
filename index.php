<?php require "header.php"; ?>

<main>
    <div style="float: right">
        <?php
        if (isset($_SESSION['userID'])) {
            echo "<p style='color: green'>You are logged in</p>";
        } else {
            echo "<p style='color: red'>You are not logged in</p>";
        }
        ?>
    </div>
</main>

<?php require "landing.php"; ?>