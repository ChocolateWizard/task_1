<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <style type="text/css">
        #alert,
        #register-box,
        #forgot-box {
            display: none;
        }

        label.error {
            color: #a94442;
            font-weight: 600;
            /* background-color: #f2dede; */
            /* border-color: #ebccd1;
            padding: 1px 20px 1px 20px; */
        }
    </style>
</head>

<body class="bg-dark">
    <?php
    require_once(__DIR__ . "/../config.php");
    require(SITE_ROOT . "/database/repository/mysql/queries/UserQuery.php");
    ?>
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-4 offset-lg-4" id="alert">
                <div class="alert alert-success">
                    <strong id="result">Hello world!</strong>
                </div>
            </div>
        </div>
        <!-- LOGIN FORM -->
        <div class="row">
            <div class="col-lg-4 offset-lg-4 bg-light rounded" id="login-box">
                <h2 class="text-center mt-2">Sign in</h2>
                <form action="" method="post" role="form" class="p-2" id="login-frm">
                    <div class="form-group">
                        <input type="text" name="username" class="form-control" placeholder="Username" <?php echo UserQuery::$constraints["username"]["required"] ?> maxlength=<?php echo UserQuery::$constraints["username"]["maxLength"] ?>>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Password" <?php echo UserQuery::$constraints["password"]["required"] ?> minlength=<?php echo UserQuery::$constraints["password"]["minLength"] ?> maxlength=<?php echo UserQuery::$constraints["password"]["maxLength"] ?>>
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="rem" class="custom-control-input" id="customCheck">
                            <label for="customCheck" class="custom-control-label">Remember me</label>
                            <a href="#" id="forgot-btn" class="float-right">Forgot password</a>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="login" id="login" value="Sign in" class="btn btn-primary btn-block">
                    </div>
                    <div class="form-group">
                        <p class="text-center">New user? <a href="#" id="register-btn">Sign up here</a></p>
                    </div>
                </form>
            </div>
        </div>
        <!-- REGISTRATION FORM -->
        <div class="row">
            <div class="col-lg-4 offset-lg-4 bg-light rounded" id="register-box">
                <h2 class="text-center mt-2">Sign up</h2>
                <form action="" method="post" role="form" class="p-2" id="register-frm">
                    <div class="form-group">
                        <input type="text" name="firstName" class="form-control" placeholder="First name" <?php echo UserQuery::$constraints["firstName"]["required"] ?> maxlength=<?php echo UserQuery::$constraints["firstName"]["maxLength"] ?>>
                    </div>
                    <div class="form-group">
                        <input type="text" name="lastName" class="form-control" placeholder="Last name" <?php echo UserQuery::$constraints["lastName"]["required"] ?> maxlength=<?php echo UserQuery::$constraints["lastName"]["maxLength"] ?>>
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="Email" <?php echo UserQuery::$constraints["email"]["required"] ?> maxlength=<?php echo UserQuery::$constraints["email"]["maxLength"] ?>>
                    </div>
                    <div class="form-group">
                        <input type="text" name="username" class="form-control" placeholder="Username" <?php echo UserQuery::$constraints["username"]["required"] ?> maxlength=<?php echo UserQuery::$constraints["username"]["maxLength"] ?>>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Password" <?php echo UserQuery::$constraints["password"]["required"] ?> minlength=<?php echo UserQuery::$constraints["password"]["minLength"] ?> maxlength=<?php echo UserQuery::$constraints["password"]["maxLength"] ?>>
                    </div>
                    <div class="form-group">
                        <label for="place">Place</label>
                        <select class="form-control" id="place">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="rem" class="custom-control-input" id="customCheck2">
                            <label for="customCheck2" class="custom-control-label">
                                I agree to the
                                <a href="#">terms & conditions.</a>
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="register" id="register" value="Sign up" class="btn btn-primary btn-block">
                    </div>
                    <div class="form-group">
                        <p class="text-center">Already have an account? <a href="#" id="login-btn">Sign in here</a></p>
                    </div>
                </form>
            </div>
        </div>

        <!-- FORGOT PASSWORD -->
        <div class="row">
            <div class="col-lg-4 offset-lg-4 bg-light rounded" id="forgot-box">
                <h2 class="text-center mt-2">Reset password</h2>
                <form action="" method="post" role="form" class="p-2" id="forgot-frm">
                    <div class="form-group">
                        <small class="text-muted">
                            To reset your password, enter the email address and we will send reset password instructions
                            on your email
                        </small>
                    </div>
                    <div class="form-group">
                        <input type="email" name="femail" class="form-control" placeholder="Email" <?php echo UserQuery::$constraints["email"]["required"] ?> maxlength=<?php echo UserQuery::$constraints["email"]["maxLength"] ?>>
                    </div>


                    <div class="form-group">
                        <input type="submit" name="forgot" id="forgot" value="Send recovery email" class="btn btn-primary btn-block">
                    </div>
                    <div class="form-group text-center">
                        <a href="#" id="back-btn">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#forgot-btn").click(function() {
                $("#login-box").hide();
                $("#forgot-box").show();
            });
            $("#register-btn").click(function() {
                $("#login-box").hide();
                $("#register-box").show();
            });
            $("#login-btn").click(function() {
                $("#register-box").hide();
                $("#login-box").show();
            });
            $("#back-btn").click(function() {
                $("#forgot-box").hide();
                $("#login-box").show();
            });

            $("#login-frm").validate();
            $("#register-frm").validate();
            $("#forgot-frm").validate();
        });
    </script>
</body>

</html>