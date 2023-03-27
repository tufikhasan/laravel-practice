<?php
class User
{
    const DB = "./user.csv";
    public function __construct()
    {
        if (!file_exists(self::DB)) {
            file_put_contents(self::DB, json_encode([]), LOCK_EX);
        }
    }
    function getUniqueId($users)
    {
        $maxId = 0;
        if (count($users)) {
            $maxId = max(array_column($users, 'id'));
        }
        return $maxId += 1;
    }
    public function user_register($fname, $lname, $email, $pass)
    {
        $data = file_get_contents(self::DB);
        $users = json_decode($data, true);
        $found = false;
        foreach ($users as $user) {
            if ($email == $user['email']) {
                $found = true;
                break;
            }
        }
        if (!$found) {
            $user = [
                "id"         => $this->getUniqueId($users),
                "first_name" => $fname,
                "last_name"  => $lname,
                "email"      => $email,
                "password"   => $pass,
                "date"       => date('Y-m-d_H:i:s:a'),
            ];
            array_push($users, $user);
            $data = json_encode($users);
            file_put_contents(self::DB, $data, LOCK_EX);
            return true;
        }
        return false;
    }
    public function login($email, $password)
    {
        $data = file_get_contents(self::DB);
        $users = json_decode($data, true);
        $found = false;
        foreach ($users as $user) {
            if ($email == $user['email'] && $password == $user['password']) {
                $_SESSION['name'] = $user['first_name'];
                $found = $user['first_name'];
                break;
            }
        }
        return $found;
    }
}
