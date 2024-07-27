<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $users = file('users.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $is_valid = false;

    foreach ($users as $user) {
        list($stored_username, $stored_password) = explode(',', $user);
        if ($stored_username == $username && $stored_password == $password) {
            $is_valid = true;
            break;
        }
    }

    if ($is_valid) {
        $_SESSION['username'] = $username;
        header("Location: vote.html");
    } else {
        echo "Invalid username or password. <a href='login.html'>Try again</a>";
    }
}
?>
