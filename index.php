<?php
require_once "./function.php";
session_name('User_Create');
session_start([
  'cookie_lifetime' => 300,
  'cookie_path'     => '/',
]);
$result = $_GET['result'] ?? 'login';
$error = $_GET['error'] ?? '0';
//Add new user
$name = '';
$email = '';
$password = '';
if (isset($_POST['name'])) {
  $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
  $password = sha1($_POST['password']);

  $img = $_FILES['pic']['name'];
  $rename = date("d_m_Y_h_i_s_a") . "." . pathinfo($img, PATHINFO_EXTENSION);

  $file_location = 'uploads/' . $rename;

  //add new student
  if ($name != '' && $email != '' && $password != '' && $file_location != '') {
    $valid = addUser($name, $email, $password, $file_location);
    if ($valid) {
      //image upload
      move_uploaded_file($_FILES['pic']['tmp_name'], $file_location);
      header('location: index.php?result=login');
    } else {
      header('location: index.php?result=register&error=1');
    }
  }
}
//login
if (isset($_POST['lEmail']) && isset($_POST['lPass'])) {
  $lEmail = filter_input(INPUT_POST, 'lEmail', FILTER_SANITIZE_EMAIL);
  $lPass = sha1($_POST['lPass']);
  $found = login($lEmail, $lPass);
  $_SESSION['user'] = false;
  if ($found) {
    $_SESSION['user'] = true;
    $_SESSION['name'] = $found;
  } else {
    header('location: index.php?result=login&error=1');
  }
}
//logout
if ('logout' == $result) {
  $_SESSION['user'] = false;
  session_destroy();
  header('location: index.php?result=login');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Module 6 Assignment</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <nav class="navbar navbar-expand-sm navbar-dark bg-dark shadow">
    <div class="container">
      <a class="navbar-brand" href="/">HOME</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="d-flex">
        <?php if (isset($_SESSION['user']) && true == $_SESSION['user']) { ?>
          <a href="index.php?result=logout" class="btn btn-sm btn-outline-info" type="button">Logout</a>
        <?php } else { ?>
          <a href="index.php?result=register" class="btn btn-sm btn-outline-info me-2" type="button">Register</a>
          <a href="index.php?result=login" class="btn btn-sm btn-outline-info" type="button">Login</a>
        <?php } ?>
      </div>
    </div>
  </nav>
  <div class="container">
    <div class="row">
      <!-- All Users -->
      <?php if (isset($_SESSION['user']) && true == $_SESSION['user']) { ?>
        <div class="col-md-6 mx-auto">
          <h1 class="text-center my-3">All Users</h1>
          <button class="btn btn-sm btn-outline-info">User-Email : <?php echo $_SESSION['name']; ?></button>

        <?php
        getAllUsers();
      } else { ?>
        </div>
        <!-- Register form -->
        <?php if ('register' == $result) { ?>
          <div class="col-md-6 mx-auto">
            <h1 class="text-center">Register</h1>
            <?php if ($error) {
              echo "<p class='text-danger'>Email already exist</p>";
            } ?>
            <form action="index.php?result=register" method="POST" enctype="multipart/form-data">
              <div class="mb-3 mt-3">
                <label for="nam" class="form-label">Name:</label>
                <input type="text" class="form-control" id="nam" placeholder="Enter name" name="name" value="<?php echo $name; ?>">
              </div>
              <div class="mb-3 mt-3">
                <label for="em" class="form-label">Email:</label>
                <input type="email" class="form-control" id="em" placeholder="Enter email" name="email" value="<?php echo $email; ?>">
              </div>
              <div class="mb-3">
                <label for="pwd" class="form-label">Password:</label>
                <input type="password" name="password" class="form-control" id="pwd" placeholder="Enter password" value="<?php echo $password; ?>">
              </div>
              <div class="mb-3">
                <label for="formFile" class="form-label">Profile picture</label>
                <input class="form-control" name="pic" type="file" id="formFile">
              </div>
              <button type="submit" class="btn btn-primary">Add new user</button>
            </form>
          </div>
        <?php } ?>

        <!-- Login form -->
        <?php if ('login' == $result) { ?>
          <div class="col-md-6 mx-auto">
            <h1 class="text-center">Login</h1>
            <?php if ($error) {
              echo "<p class='text-danger'>Invalid Credentials</p>";
            } ?>
            <form method="POST">
              <div class="mb-3 mt-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="lEmail">
              </div>
              <div class="mb-3">
                <label for="pwd" class="form-label">Password:</label>
                <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="lPass">
              </div>
              <button type="submit" class="btn btn-primary">Login</button>
            </form>
          </div>
      <?php }
      } ?>
    </div>
  </div>
</body>

</html>