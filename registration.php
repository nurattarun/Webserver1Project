<?php 
if (!isset($_POST["submit"])){
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
</head>
<body>
    <form action="registrationForm.php" method="post">
        <label for="fname">First Name: </label>
        <input type="text" id="fname" name="fname"><br><br>
         <label for="lname">Last Name: </label>
        <input type="text" id="lname" name="lname"><br><br>
         <label for="userName">User Name: </label>
        <input type="text" id="userName" name="username"><br><br>
        <label for="password">Password: </label>
        <input type="password" id="password" name="password"><br><br>
        <label for="cPassword">Confirm Password: </label>
        <input type="password" id="confirmPassword" name="confirmPassword"><br><br>
        <input type="submit" value="Create" name="submit">
        <input type="submit" value="Sign-In" name="submit">

    </form>
</body>
</html>
<?php
}else{


}



?>



