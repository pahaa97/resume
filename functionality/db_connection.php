<?php

$db = mysqli_connect("localhost", "root", "root", "project-test");

if ($db === false) {
    die("Ошибка: " . mysqli_connect_error());
} else {
    startProject($db);
}

function startProject($db) {
    $query = "SELECT ID FROM users";
    $result = mysqli_query($db, $query);
    if(empty($result)) {
        $query = "CREATE TABLE users (
                          id int(11) AUTO_INCREMENT PRIMARY KEY,
                          username varchar(255) NOT NULL,
                          email varchar(255) NOT NULL,
                          password varchar(255) NOT NULL
                   )";
        mysqli_query($db, $query);

        $username = mysqli_real_escape_string($db, "test");
        $email = mysqli_real_escape_string($db, "test@gmail.com");
        $password = md5(mysqli_real_escape_string($db, "qqq"));
        $query = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
        mysqli_query($db, $query);
    }


    $query = "SELECT id FROM information";
    $result = mysqli_query($db, $query);
    if(empty($result)) {
        $query = "CREATE TABLE information (
                          id int(11) AUTO_INCREMENT PRIMARY KEY,
                          phone varchar(255) NOT NULL,
                          email varchar(255) NOT NULL,
                          address varchar(100),
                          linkedin varchar(100),
                          education varchar(600),
                          skills varchar(600),
                          name varchar(100),
                          profile varchar(600),
                          experience varchar(600),
                          image varchar(100)
                   )";
        mysqli_query($db, $query);

        $phone = mysqli_real_escape_string($db, "+380995373942");
        $email = mysqli_real_escape_string($db, "pahaa97@gmail.com");
        $address = mysqli_real_escape_string($db, "Zaporizhzhia, Svetlaya 16");
        $linkedin = mysqli_real_escape_string($db, "linkedin.com/username");
        $education = mysqli_real_escape_string($db, "Your degree name
Education
University Name
Your degree name
Education
University Name");
        $skills = mysqli_real_escape_string($db, "php, html, css, javascript");
        $name = mysqli_real_escape_string($db, "Pavel Fedotov");
        $profile = mysqli_real_escape_string($db, "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum");
        $experience = mysqli_real_escape_string($db, "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum");
        $image = mysqli_real_escape_string($db, "2021-02-02 16.30.15.jpg");

        $query = "INSERT INTO information (phone, email, address, linkedin, education, skills, name, profile, experience, image) VALUES ('$phone', '$email', '$address', '$linkedin', '$education', '$skills', '$name', '$profile', '$experience', '$image')";
        if (mysqli_query($db, $query)) {
            echo "Start information added!";
        } else {
            echo 'Error: '.mysqli_error($db);
        }
        die();
    }
}



