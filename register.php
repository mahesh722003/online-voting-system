<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Check if username or password is empty
    if (empty($username) || empty($password)) {
        echo "Username and password cannot be empty. <a href='register.html'>Try again</a>";
        exit();
    }

    // Check if user already exists
    $users = file('users.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($users as $user) {
        list($stored_username, $stored_password) = explode(',', $user);
        if ($stored_username == $username) {
            echo "Username already exists. <a href='register.html'>Try again</a>";
            exit();
        }
    }

    // Save new user
    $file = fopen('users.txt', 'a');
    fwrite($file, $username . ',' . $password . "\n");
    fclose($file);

    echo "Account created successfully. <a href='login.html'>Login</a>";
}
?>
