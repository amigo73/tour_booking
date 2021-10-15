<?php
    include 'class/user.php';
    // session_start();
    
    if( !isset($_SESSION["account_id"]))
    {
        header("Location: index.php");
    }

    $user = new User($_SESSION["account_id"]);

    $account_id = $user->getAccountID();
    $firstname = $user->getFirstName();
    $lastname = $user->getLastName();
    $username = $user->getUserName();
    $address = $user->getAddress();
    $contactNumber = $user->getContactNumber();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Profile</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a href="#" class="navbar-brand">Blog</a>
            
            <button class="navbar-toggler" data-toggle="collapse" data-target="#menu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="menu">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a href="#" class="nav-link">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Users</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Posts</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Categories</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="#" class="nav-link">Welcome, <?php echo "$firstname $lastname"; ?> !</a>
                    </li>
                    <li class="nav-item">
                        <a href="logout.php" class="nav-link">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="jumbotron-fluid bg-secondary">
        <div class="container py-5">
            <h1 class="text-white display-4"><i class="fas fa-user"></i> Profile</h1>
        </div>
    </div>
    <div class="container" style="margin-bottom: 7%;">
        <div class="row mt-5 d-flex justify-content-center">
            <div class="col-3">
                <div class="card">
                    <img src="assets/images/depositphotos_9431737-stock-photo-portrait-of-gray-striped-cat.jpeg" alt="profile photo of a cat" class="card-img-top">
                    <div class="card-body">
                        <h2 class="card-title mb-0"> <?php echo "$firstname $lastname";?></h2></h2>
                        <p class="text-muted font-italic mb-0">@<?php echo $username;?></p>
                    </div>
                </div>
            </div>
            <div class="col-5">
                <form action="" class="mb-3">
                    <div class="form-row">
                        <div class="col">
                            <div class="form-group">
                                <label for="firstname" class="small">First Name</label>
                                <input type="text" name="firstname" id="firstname" class="form-control" value='<?php echo $firstname;?>'>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="lastname" class="small">Last Name</label>
                                <input type="text" name="lastname" id="lastname" class="form-control" value='<?php echo $lastname;?>'>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-8">
                            <div class="form-group">
                                <label for="address" class="small">Address</label>
                                <input type="text" name="address" id="address" class="form-control" value="<?php echo $address;?>">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="contactno" class="small">Contact No.</label>
                                <input type="tel" name="contactno" id="contactno" class="form-control" value="<?php echo $contactNumber;?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="username" class="small">Username</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">@</div>
                            </div>
                            <input type="text" name="username" id="username" class="form-control" value="<?php echo $username;?>">
                        </div>
                    </div>
                    <!-- <div class="form-row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="password" class="small">Password</label>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="confirmpassword" class="small">Confirm Password <span class="text-danger">*</span></label>
                                <input type="password" name="confirmpassword" id="confirmpassword" class="form-control">
                            </div>
                        </div>
                    </div> -->

                    <!-- Button trigger modal DELETER-->
                    <button type="button" href="#" class="btn btn-primary btn-block" data-toggle="modal" data-target="#updateAccount">
                        Update
                    </button>
                    
                    <!-- Modal DELETE-->
                    <div class="modal fade" id="updateAccount" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Update Account</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="password">Enter Password to proceed with the update.</label>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input type="submit" class="btn btn-primary" value="Update" name="update">
                                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                        </div>
                    </div>
                </form>
                <!-- <a href="#" class="text-muted small font-italic float-right"><i class="text-danger fas fa-trash"></i> Delete Account</a> -->
                <!-- Button trigger modal CHANGE PASSWORD-->
                <a href="#" class="text-muted small float-left" data-toggle="modal" data-target="#changePassword">
                    <i class="fas fa-lock"></i> Change Password
                </a>
                <!-- Button trigger modal DELETER-->
                <a href="#" class="text-muted small float-right" data-toggle="modal" data-target="#deleteAccount">
                    <i class="fas fa-trash"></i> Delete Account
                </a>
                
                <!-- Modal DELETE-->
                <div class="modal fade" id="deleteAccount" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-trash"></i> Delete Account</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p class="text-center font-italic">Are you sure you want to delete your account?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary">Yes</button>
                            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                    </div>
                </div>
                <!-- Modal CHANGE PASSWORD-->
                <div class="modal fade" id="changePassword" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-lock"></i> Change Password</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="">
                                <div class="form-group">
                                    <label for="currentPassword">Current Password</label>
                                    <input type="password" name="currentPassword" id="currentPassword" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="newPassword">New Password</label>
                                    <input type="password" name="newPassword" id="newPassword" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="confirmNewPassword">Confirm New Password</label>
                                    <input type="password" name="comfirmNewPassword" id="confirmNewPassword" class="form-control">
                                </div>
                        </div>
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-primary" value="Update">
                            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
                            </form>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>     
    <footer class="footer bg-light fixed-bottom pt-3 border-top">
        <div class="container">
            <p class="text-center text-muted">&copy; 2021 | Your Name</p>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>
</html>