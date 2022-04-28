<?php

if(isset($_POST['edit'])) {
    if(isset($_FILES['userfile']) && $_FILES['userfile']['error'] == UPLOAD_ERR_OK){
        $uploaddir = $_SERVER['DOCUMENT_ROOT'].'/data/';
        $uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
        move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile);
        $image = mysqli_real_escape_string($db, $_FILES['userfile']['name']);
    }

    $phone = mysqli_real_escape_string($db, $_POST['phone']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $address = mysqli_real_escape_string($db, $_POST['address']);
    $linkedin = mysqli_real_escape_string($db, $_POST['linkedin']);
    $education = mysqli_real_escape_string($db, $_POST['education']);
    $skills = mysqli_real_escape_string($db, $_POST['skills']);
    $name = mysqli_real_escape_string($db, $_POST['name']);
    $profile = mysqli_real_escape_string($db, $_POST['profile']);
    $experience = mysqli_real_escape_string($db, $_POST['experience']);

    $query = "UPDATE information SET phone='$phone', email='$email', address='$address', linkedin='$linkedin', education='$education', skills='$skills', name='$name', profile='$profile', experience='$experience'";
    if (isset($image)) { $query .= ", image='$image'"; }
    $query .= " WHERE id=1";

    if (mysqli_query($db,$query)) {
        $_SESSION['success'] = "Information edited!";
        die(json_encode(["success"=>"Information edited!"]));
    } else {
        die(json_encode(["errors" => " Information not edited! " . mysqli_error($db)]));
//        $_SESSION['errors'] = "Information not edited!";
    }
}
