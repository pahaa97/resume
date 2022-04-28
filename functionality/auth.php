<?php

$username = "";
$email = "";
$errors = array();

if(isset($_POST['login'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    if (count($errors) == 0) {
        $user_check_query = "SELECT * FROM users WHERE username='$username' LIMIT 1";
        $result = mysqli_query($db, $user_check_query);
        $user = mysqli_fetch_assoc($result);

        if (!$user) { // if user exists
            array_push($errors, "User with this username does not exist");
        }
    }

    if (count($errors) == 0) {
        if ($user['username'] === $username && $user['password'] === md5($password)) {
            $_SESSION['success'] = "You are now logged in";
            $_SESSION['username'] = $username;
            die(json_encode(['success' => "You are now logged in"]));
        } else {
            array_push($errors, "Wrong password");
            die(json_encode(['errors' => $errors]));
        }
    } else {
        die(json_encode(['errors' => $errors]));
    }
}

if (isset($_POST['register'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $repeat_password = mysqli_real_escape_string($db, $_POST['repeat_password']);

    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }
    if ($password != $repeat_password) {
        array_push($errors, "The two passwords do not match");
    }

    $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if (count($errors) == 0) {
        if ($user) { // if user exists
            if ($user['username'] === $username) {
                array_push($errors, "Username already exists");
            }
            if ($user['email'] === $email) {
                array_push($errors, "email already exists");
            }
        }
    }

    if (count($errors) == 0) {
        $password = md5($password);

        $query = "INSERT INTO users (username, email, password) 
  			  VALUES('$username', '$email', '$password')";
        mysqli_query($db, $query);
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are registered and authorized!";
        die(json_encode(["success"=>"You are registered and authorized!"]));
    } else {
        die(json_encode(["errors" => $errors]));
    }
}

if(isset($_POST['logout'])) {
    unset($_SESSION['username']);
}