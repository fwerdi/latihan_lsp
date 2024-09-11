<?php
    include 'proses.php';
?>
<!DOCTYPE html>
<html>  
<head>
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap.min.css">
</head>
<body class="bg-dark d-flex align-items-center" style="height: 100vh; margin: 0;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title text-center mb-4">Login Page</h3>
                        <form method="POST" action="proses.php">
                            <div class="form-group">
                                <label for="username">Username:</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="login" value="Login" class="btn btn-primary btn-block">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
