 <?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Register</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

</head>
<body>
    
    <div class="container">
        <div class="row mt-5">
            <div class=" col-4 mx-auto">
                <?php
                    if(isset($_SESSION["success"]) && isset($_SESSION["message"]))
                    {
                        //input
                        $class = ($_SESSION["success"]==1)?"success":"danger";
                        $message = $_SESSION["message"];

                        //delete session variables
                        unset($_SESSION["success"]);
                        unset($_SESSION["message"]);
                ?>
                    <div class="alert alert-<?php echo $class;?>" role="alert">
                        <?php echo $message;?>
                    </div>
                <?php
                    }
                ?>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-6">
                <h1>Register</h1>
                <form action="action/register.php" method="POST">
                    <div class="form-row">
                        <div class="col">
                            <div class="form-group">
                                <label for="firstname">First Name</label>
                                <input type="text" name="firstname" id="firstname" class="form-control" required>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="lastname">Last Name</label>
                                <input type="text" name="lastname" id="lastname" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input class="form-control" type="text" name="address" id="address" required>
                    </div>
                    <div class="form-group">
                        <label for="contact_number">Contact Number</label>
                        <input class="form-control" type="text" name="contact_number" id="contact_number" required>
                    </div>
                    <div class="form-group">
                        <label for="username">User Name</label>
                        <input class="form-control" type="text" name="username" id="username" required> 
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input class="form-control" type="password" name="password" id="password" required>
                    </div>
                    <input type="submit" value="Register" class="btn btn-success btn-block" name="submit">
                </form>
                <div class="mt-3 text-right">
                    <span class="text-muted">Have an account?</span>
                    <a href="index.php" class="text-decoration-none">Sign in</a>
                </div>
            </div>
        </div>
    </div>     


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>
</html>