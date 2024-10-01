<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Track Student</title>
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
    <form action="" method="POST" class="trackform">
        <h2>Track Student</h2>
        <div class="error-text"></div>
        <div class="form_control">
            <label for="studentid">Student ID</label>
            <input type="text" placeholder="Student ID" id="studentid" name="studentid" required>
        </div>
        <div class="trackbtn">
        <input type="submit" value="Track Student" class="btn">
        </div>
    </form>
</section>
<script src="js/trackstd.js"></script>
</body>
</html>