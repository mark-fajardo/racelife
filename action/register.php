<?php

    session_start();

    if (isset($_POST['name']) == false || $_POST['name'] == '') {
        echo 'Name is required';
        return;
    } else if (isset($_POST['username']) == false || $_POST['username'] == '') {
        echo 'Username is required';
        return;
    } else if (isset($_POST['password']) == false || $_POST['password'] == '') {
        echo 'Password is required';
        return;
    }

    $xml = new DOMDocument();
    $file_path = '../data/users.xml';
    $xml->load($file_path);
    $xml->preserveWhiteSpace = false;
    $xml->formatOutput = true;

    $users = $xml->getElementsByTagName('users')->item(0);
    $all_users = $users->getElementsByTagName('user');
    foreach ($all_users as $user) {
        if ($user->getElementsByTagName('username')->item(0)->nodeValue == $_POST['username']) {
            echo 'User already registered';
            return;
        }
    }

    $user = $xml->createElement('user');
    $user->appendChild($xml->createElement('id', (int)$all_users->length + 1));
    $user->appendChild($xml->createElement('name', $_POST['name']));
    $user->appendChild($xml->createElement('username', $_POST['username']));
    $user->appendChild($xml->createElement('password', $_POST['password']));
    $users->appendChild($user);

    if ($xml->save($file_path)) {
        echo 'User registered';
        $_SESSION['username'] = $_POST['username'];
    } else {
        echo 'User not registered';
    }

?>