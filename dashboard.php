<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Dashboard</title>
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
                    <li class="nav-item active">
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
                        <a href="#" class="nav-link">Welcome, {firstname} {lastname}!</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="jumbotron-fluid bg-danger">
        <div class="container py-5">
            <h1 class="text-white display-4"><i class="fas fa-user-cog"></i> Dashboard</h1>
        </div>
    </div>
    <div class="container" style="margin-bottom: 7%;">
        <div class="row mt-5">
            <div class="col">
                <a href="#" class="btn btn-primary btn-block btn-lg"><i class="fas fa-plus-circle"></i> Add Post</a>
            </div>
            <div class="col">
                <a href="#" class="btn btn-success btn-block btn-lg"><i class="fas fa-folder-plus"></i> Add Category</a>
            </div>
            <div class="col">
                <a href="#" class="btn btn-warning btn-block text-white btn-lg"><i class="fas fa-user-plus"></i> Add User</a>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-8">
                <table class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Date Posted</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <td>1</td>
                        <td>Title</td>
                        <td>category</td>
                        <td>04-25-2021</td>
                        <td>
                            <a href="#" class="btn btn-outline-dark btn-sm btn-block"><i class="fas fa-angle-double-right"></i> Details</a>
                        </td>
                    </tbody>
                </table>
            </div>
            <div class="col-4">
                <div class="card bg-primary p-5">
                    <div class="card-body">
                        <h2 class="text-white text-center">Posts</h2>
                        <h3 class="text-white text-center mb-5"><i class="fas fa-pencil-alt"></i> 1</h3>
                        <a href="#" class="btn btn-block btn-outline-light text-uppercase">view</a>
                    </div>
                </div>
                <div class="card bg-success mt-3 p-5">
                    <div class="card-body">
                        <h2 class="text-white text-center">Category</h2>
                        <h3 class="text-white text-center mb-5"><i class="far fa-folder-open"></i> 1</h3>
                        <a href="#" class="btn btn-block btn-outline-light text-uppercase">view</a>
                    </div>
                </div>
                <div class="card bg-warning mt-3 p-5">
                    <div class="card-body">
                        <h2 class="text-white text-center">Users</h2>
                        <h3 class="text-white text-center mb-5"><i class="fas fa-users"></i> 1</h3>
                        <a href="#" class="btn btn-block btn-outline-light text-uppercase">view</a>
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