<?php

    session_start();
    
    if (isset($_POST['username']) == false || $_POST['username'] == '') {
        echo 'Username is required.';
        return;
    } else if (isset($_POST['password']) == false || $_POST['password'] == '') {
        echo 'Password is required.';
        return;
    }

    $xml = new DOMDocument();
    $file_path = '../data/users.xml';
    $xml->load($file_path);

    $users = $xml->getElementsByTagName('users')->item(0);
    $all_users = $users->getElementsByTagName('user');
    foreach ($all_users as $user) {
        if ($user->getElementsByTagName('username')->item(0)->nodeValue == $_POST['username'] &&
            $user->getElementsByTagName('password')->item(0)->nodeValue == $_POST['password']) {
            echo 'User logged in';
            $_SESSION['username'] = $_POST['username'];
            return;
        }
    }

    echo 'Invalid credentials';

?>