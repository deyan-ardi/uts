<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../assets/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="container ">
        <nav class="navbar navbar-default" style=" margin: 0px;"></nav>
        <div class="content center" >
            <hr>
            <div class="box">
            <h1>Login</h1>
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="email">Email address:</label>
                        <input type="email" name="email" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input type="password"  name="password" class="form-control" >
                        <span><?=(isset($msg))?$msg: '' ?></span>
                        
                    </div>
                    <div class="form-group pull-right">
                        <button type="submit" class="btn btn-default">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

