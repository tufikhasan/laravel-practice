<?php include "./class.php";?>
<!doctype html>
<html lang="en">

<head>
    <title>Module 5 - Assignment</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="https://cdn-icons-png.flaticon.com/512/295/295128.png" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div>
        <div class="login-box">
            <h2>Task-1 Html Form</h2>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <div class="user-box">
                    <input type="text" name="name" required="required">
                    <label>Name</label>
                </div>
                <div class="user-box">
                    <input type="email" name="email" required="required">
                    <label>Email</label>
                </div>
                <a href="#">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <!-- Login -->
                    <input type="submit" value="Submit">
                </a>

            </form>
        </div>
        <div class="output">
            <h2>Task-2 Basic OOP</h2>
            <p>Name: <span><?php echo $taskTwoName; ?></span></p>
            <p>Email: <span><?php echo $taskTwoEmail; ?></span></p>
            <hr /><br>
            <h2>Task-3 Super Global</h2>
            <p>Name: <span><?php echo $name; ?></span></p>
            <p>Email: <span><?php echo $email; ?></span></p>
        </div>
    </div>
</body>

</html>