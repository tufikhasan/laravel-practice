<?php
date_default_timezone_set('Asia/Dhaka');
define('DB_NAME', 'db/users.csv');
if (!file_exists(DB_NAME)) {
  file_put_contents(DB_NAME, json_encode([]), LOCK_EX);
}

function getAllUsers()
{
  $data = file_get_contents(DB_NAME);
  $users = json_decode($data, true); ?>
  <table class="table table-bordered">
    <thead>
      <tr class="text-center">
        <th>Image</th>
        <th>Name</th>
        <th>Email</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($users as $user) { ?>
        <tr class="align-middle text-center">
          <td><img src="<?php echo $user['picture'] ?>" class="rounded-circle img-fluid" alt="<?php echo $user['name'] ?>" style="width: 60px;height: 60px;"></td>
          <td><?php echo $user['name'] ?></td>
          <td><?php echo $user['email'] ?></td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
<?php
}

function getUniqueId($users)
{
  $maxId = 0;
  if (count($users)) {
    $maxId = max(array_column($users, 'id'));
  }
  return $maxId += 1;
}
function addUser($name, $email, $password, $pic)
{
  $data = file_get_contents(DB_NAME);
  $allUsers = json_decode($data, true);

  $found = false;
  foreach ($allUsers as $user) {
    if ($email == $user['email']) {
      $found = true;
      break;
    }
  }
  if (!$found) {
    $user = [
      "id"       => getUniqueId($allUsers),
      "name"     => $name,
      "email"    => $email,
      "password" => $password,
      "picture"  => $pic,
      "date"     => date('Y-m-d_H:i:s:a'),
    ];
    array_push($allUsers, $user);
    $data = json_encode($allUsers);
    file_put_contents(DB_NAME, $data, LOCK_EX);
    return true;
  }
  return false;
}

//
function login($email, $pass)
{
  $data = file_get_contents(DB_NAME);
  $allUsers = json_decode($data, true);
  $found = false;
  foreach ($allUsers as $user) {
    if ($email == $user['email'] && $pass == $user['password']) {
      $found = $user['email'];
      break;
    }
  }
  return $found;
}
