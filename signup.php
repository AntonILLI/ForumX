<?php require "header.php" ?>

<section>
<body>
    <div class="container-register">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-register my-5">
                    <div class="card-body">
                
                        <h5 class="card-title text-center">Register</h5>

                        <form class="form-register" action="scripts/signup.php" method="post">

                        <div class="form-label-group">
                            <input
                            type="name"
                            id="inputUserName"
                            name="username_x"
                            class="form-control"
                            placeholder="Username"
                            required autofocus>
                        </div>

                        <div class="form-label-group">
                            <input
                            type="email"
                            id="inputEmail"
                            name="email_x"
                            class="form-control"
                            placeholder="Email Address"
                            required>
                        </div>
            
                        <div class="form-label-group">
                            <input
                            type="password"
                            id="inputPassword"
                            name="passwd_x"
                            class="form-control"
                            placeholder="Password"
                            required>
                        </div>
            
                        <div class="form-label-group">
                            <input
                            type="password"
                            id="inputConfirmPassword"
                            name="passwd_repeat"
                            class="form-control"
                            placeholder="Confirm Password"
                            required>
                        </div>

                        <div class="form-button ">
                            <button type="submit" class="btn btn-success" name="signup-btn">Submit</button>
                        </div>

                        </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</section>

<?php require "footer.php"; ?>

