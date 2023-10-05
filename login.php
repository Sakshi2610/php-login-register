<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login Form</title>
 
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/styles.css">

</head>
<body>
    <?php
        include("./php/config.php");

            if(isset($_POST['submit']))
                {
                    $email = $_POST['email'];
                    $password = md5($_POST['password']);

                    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";

                    $res = mysqli_query($con, $sql);

                    if(mysqli_num_rows($res) == 0)
                    {
                        
                        echo "<div class='message'>
                            <p>Wrong Email or Password !!!</p>
                            </div>";
                        echo "<a href='login.php'><button>Go back</button>";
                    }
                    else
                    {
                        header("Location: welcome.php");
                    }
                }else{
    ?>
    <div class="background">
    </div>
        <form action="" method="POST">
            <h3>Login Here</h3>

            <label for="email">Email</label>
            <input type="text" placeholder="Email" name="email" required>

            <label for="password">Password</label>
            <input type="password" placeholder="Password" name="password" required>

            <label for="register"><a href="register.php">Not Register??? Create an Account</a></label>

            <button name="submit">Log In</button>
        </form>
    <?php } ?>
</body>
</html>
