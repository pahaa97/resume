<?php
$query = "SELECT * FROM information WHERE 1";

$result = mysqli_query($db,$query);
$res = mysqli_fetch_assoc($result);
?>

<div class="main__wrapper">
    <div class="sidebar">
        <div class="logo__wrapper">
            <img src="<?php echo 'data/'.$res['image']; ?>" alt="">
        </div>
        <div class="info__wrapper">
            <div class="contact__wrapper">
                <h3>Contact</h3>
                <p><?php echo $res['phone']; ?></p>
                <p><?php echo $res['email']; ?></p>
                <p><?php echo $res['address']; ?></p>
                <p><?php echo $res['linkedin']; ?></p>
            </div>
            <div class="education__wrapper">
                <h3>Education</h3>
                <div class="description">
                    <p><?php echo $res['education']; ?></p>
                </div>
            </div>
            <div class="skills__wrapper">
                <h3>Skills</h3>
                <div class="description">
                    <p><?php echo $res['skills']; ?></p>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="name__wrapper">
            <h1><?php echo $res['name']; ?></h1>
            <h2>web developer</h2>
        </div>
        <div class="profile__wrapper">
            <h3>Profile</h3>
            <p><?php echo $res['profile']; ?></p>
        </div>
        <div class="experience__wrapper">
            <h3>Professional experiance</h3>
            <p><?php echo $res['experience']; ?></p>
        </div>
    </div>
</div>