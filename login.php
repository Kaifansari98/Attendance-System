<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <section class="login">
    <form action="" method="post" class="loginform">
        <h2>Login</h2>
        <div class="error-text"></div>
        <div class="form_control">
            <label for="email">Email</label>
            <input type="email" placeholder="Email" id="email" name="email" required>
        </div>
        <div class="form_control">
            <label for="password">Password</label>
            <input type="password" placeholder="Password" id="password" name="password" required>
        </div> 
        <div class="loginbtn">
        <input type="submit" value="Login" class="btn">
        </div>
    </form>
</section>
<script src="js/login.js"></script>
</body>
</html>