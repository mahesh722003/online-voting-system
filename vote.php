<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.html");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $candidate = $_POST['candidate'];
    $username = $_SESSION['username'];

    $file = fopen('votes.txt', 'a');
    fwrite($file, $username . ',' . $candidate . "\n");
    fclose($file);

    echo "Thank you for voting! <a href='results.html'>See Results</a>";
}
?>
