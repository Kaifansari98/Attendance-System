<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Track Teacher</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        .error-text{
            display: none;
            color: #851923;
            padding: 4px 6px;
            text-align: center;
            border-radius: 4px;
            background: #ffe3e5;
            border: 1px solid #dfa5ab;
            margin-bottom: 8px;
        }
    </style>
</head>
<body>
    <section class="trackstd">
    <form action="" method="post" class="trackform">
        <h2>Track Teacher</h2>
        <div class="error-text"></div>
        <div class="form_control">
            <label for="teacheremail">Email</label>
            <input type="email" placeholder="Email" id="teacheremail" name="teacheremail" required>
        </div>
        <div class="form_control">
            <label for="teacherpassword">Password</label>
            <input type="password" placeholder="Password" id="teacherpassword" name="teacherpassword" required>
        </div>
        <div class="trackbtn">
        <input type="submit" value="Track Teacher" name="trackteacher" class="btn">
        </div>
    </form>
</section>
<script src="js/trackteacher.js"></script>

</body>
</html>