<?php
$query = "SELECT * FROM information WHERE 1";

$result = mysqli_query($db,$query);
$res = mysqli_fetch_assoc($result);
?>

<?php if(isset($_SESSION['username'])):?>
<form action="/" enctype="multipart/form-data" method="post" class="edit_form">
<div class="main__wrapper">
    <div class="sidebar">
        <div class="logo__wrapper edit">
            <img src="<?php echo 'data/'.$res['image']; ?>" alt="">
            <input type="file" name="userfile" id="fileToUpload">
        </div>
        <div class="info__wrapper">
            <div class="contact__wrapper">
                <h3>Contact</h3>
                <input name="phone" type="text" value="<?php echo $res['phone']; ?>">
                <input name="email" type="text" value="<?php echo $res['email']; ?>">
                <input name="address" type="text" value="<?php echo $res['address']; ?>">
                <input name="linkedin" type="text" value="<?php echo $res['linkedin']; ?>">
            </div>
            <div class="education__wrapper">
                <h3>Education</h3>
                <div class="description">
                    <textarea name="education"><?php echo $res['education']; ?></textarea>
                </div>
            </div>
            <div class="skills__wrapper">
                <h3>Skills</h3>
                <div class="description">
                    <input name="skills" type="text" value="<?php echo $res['skills']; ?>">
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="name__wrapper">
            <h1><input name="name" type="text" value="<?php echo $res['name']; ?>"></h1>
            <h2>web developer</h2>
        </div>
        <div class="profile__wrapper">
            <h3>Profile</h3>
            <textarea name="profile"><?php echo $res['profile']; ?></textarea>
        </div>
        <div class="experience__wrapper">
            <h3>Professional experiance</h3>
            <textarea name="experience"><?php echo $res['experience']; ?></textarea>
        </div>
        <button name="edit" class="submit__wrapper">Submit</button>
    </div>
</div>
</form>
<?php else: ?>
<div class="no_login"><h1>You are not authorized!</h1></div>
<?php endif; ?>
