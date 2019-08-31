<?php require "header.php" ?>
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
<section>
    <div class="container-fluid">
        <div class="row">
                <div class="banner1 col-2">
                    <div class="d-flex flex-column">
                    </div>
                </div>
                <div class="col-8">
                    <div class="d-flex flex-column">
                        <div class="screen">
                            <h1 class="display-4 text-center" style="opacity:0.9; font-size:3.8rem;margin-top:70px;">
                            </h1>
                            <li class="lead pr-4 float-right mr-4" style="font-weight:250;font-size:30px;margin-top:200px;">
                            <a href="register.html">Sign-Up</a>
                            </li>
                        </div>
                    </div>
                    <div class="item-2 p-2 d-flex flex-column mt-2">
                        <h1 class="text-center" style="font-size:40px;font-size:40px;"> Welcome to our website!!</h1>
                        <p class="item-2 ml-2 mt-2 pr-1" style="opacity:0.7; font-size:25px;">
                        *This week we have an ultimate battle between all sides of the force.<br>
                        *This week we’re comparing first, second and last trilogies of infamous Star Wars franchise.
                        </p>
                    </div>
                    <div class="item-3 p-2 d-flex flex-column mt-1 ">
                        <h2 class="ml-3 mt-4"style="font-size:30px;">This week’s participants</h2>
                        <p class="item-3 ml-2 ml-2" style="opacity:0.7;font-size:25px;">
                        *	Star Wars: Episodes IV – VI (#Topic object #1)<br>
                        *	Star Wars: Episodes I – III (#Topic object #2)<br>
                        *	Star Wars: Episodes VII – IX (#Topic object #3)<br>
                        </p>
                    </div>
                </div>
                <div class="banner2 col-2">
                    <div class="d-flex flex-column">
                    </div >
                </div>
            </div>
        </div>
    </div>
</section>
</main>
<?php require "footer.php"?>