<?php
session_start();
include_once "./functions.php";
$obj = new User();

$task = $_GET['task'] ?? 'register';
$error = $_GET['error'] ?? "";

$fname = $lname = $r_email = $r_pass = $rc_pass = "";
if (isset($_POST['fname']) && 'register' == $task) {
    $fname = filter_input(INPUT_POST, 'fname', FILTER_SANITIZE_SPECIAL_CHARS);
    $lname = filter_input(INPUT_POST, 'lname', FILTER_SANITIZE_SPECIAL_CHARS);
    $r_email = filter_input(INPUT_POST, 'r_email', FILTER_SANITIZE_EMAIL);
    $r_pass = sha1($_POST['r_password']);
    $rc_pass = sha1($_POST['rc_password']);

    if ($r_pass != $rc_pass) {
        header('Location: index.php?task=register&error=not-match');
        exit;
    } else {
        if ($fname != '' && $lname != '' && $r_email != '' && $r_pass != '' && $rc_pass != '') {
            $valid = $obj->user_register($fname, $lname, $r_email, $r_pass);
            if ($valid) {
                header("Location: index.php?task=login");
                exit;
            } else {
                header('Location: index.php?task=register&error=exists');
                exit;
            }
        } else {
            header('Location: index.php?task=register&error=require');
            exit;
        }
    }
}

//Login
$email = $password = "";
if ('login' == isset($task) && isset($_POST['email'])) {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = sha1($_POST['password']);
    if ($_POST['email'] != '' && $_POST['password'] != '') {
        $found = $obj->login($email, $password);
        $_SESSION['user'] = false;
        if ($found) {
            $_SESSION['user'] = true;
            $_SESSION['name'] = $found;
        } else {
            header('location: index.php?task=login&error=wrong');
        }
    }
}
if (isset($_POST['logout'])) {
    $_SESSION['user'] = false;
    session_destroy();
    header('location: index.php?task=login');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment 8</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <main class="main">
        <?php if (isset($_SESSION['user']) && true == $_SESSION['user']) { ?>
            <!-- Welcome -->
            <div class="box">
                <h2>Welcome</h2>
                <p style="text-transform:none"><b>Your First Name: </b> <?php echo $_SESSION['name']; ?></p>
                <form method="POST">
                    <input type="hidden" name="logout" value="1">
                    <input type="submit" value="Sign out">
                </form>
            </div>
        <?php } else { ?>
            <?php if ('register' == $task) { ?>
                <!-- Register Area -->
                <div class="box">
                    <h2>Register</h2>
                    <p class="warning">
                        <?php
                        if ('not-match' == $error) {
                            echo "<span style='color:green'>Password not match</span>";
                        }
                        if ('exists' == $error) {
                            echo "<span style='color:brown'>Already exists</span>";
                        }
                        if ('require' == $error) {
                            echo "<span style='color:red'>All field are required</span>";
                        }
                        ?>
                    </p>
                    <form method="post" action="index.php?task=register">
                        <input type="text" name="fname" placeholder="First name" value="<?php echo $fname; ?>">
                        <input type="text" name="lname" placeholder="Last name" value="<?php echo $lname; ?>">
                        <input type="email" name="r_email" placeholder="email address" value="<?php echo $r_email; ?>">
                        <input type="password" name="r_password" placeholder="Password" value="<?php echo $r_pass; ?>">
                        <input type="password" name="rc_password" placeholder="Confirm password" value="<?php echo $rc_pass; ?>">
                        <input type="submit" value="Register">
                    </form>
                    <p>I have an account? <a href="index.php?task=login">Sign in</a></p>
                </div>
            <?php } ?>
            <?php if ('login' == $task) { ?>
                <!-- Login Area -->
                <div class="box">
                    <h2>Log in</h2>
                    <?php if ('wrong' == $error) {
                        echo "<p class='warning'><span style='color:red'>Invalid cradintial</span></p>";
                    } ?>
                    <form method="post">
                        <input type="email" name="email" required placeholder="email address" value="<?php echo $email; ?>">
                        <input type="password" name="password" required placeholder="password" value="<?php echo $password; ?>">
                        <p><a href="#">Forgot password?</a></p>
                        <input type="submit" value="login">
                    </form>
                    <p>Don't have an account? <a href="index.php?task=register">Sign up</a></p>
                </div>
            <?php } ?>

        <?php } ?>
    </main>
</body>

</html>