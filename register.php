<!DOCTYPE html>
<html lang="en">
<head>
    <title>Registration Form</title>
 
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/styles1.css">
</head>
<body>
    <?php
        include('./php/config.php');

        if(isset($_POST['submit'])){
            $email = $_POST['email'];
            $password = md5($_POST['password']);
            $re_password = md5($_POST['re-password']);

            if($password !== $re_password) {
                echo "<div class='message'>
                    <p>Passwords do not match. Please try again.</p>
                </div>";
                echo "<a href='javascript:self.history.back()'><button>Go back</button></a>";
            } 
            else {
                //verifying the unique email
                $verify_query = mysqli_query($con, "SELECT email FROM users WHERE email='$email'");

                if(mysqli_num_rows($verify_query) != 0){
                    echo "<div class='message'>
                        <p>This email is used, Please Try Another one!!!</p>
                    </div>";
                    echo "<a href='javascript:self.history.back()'><button>Go back</button>";
                }
                else{
                    mysqli_query($con, "INSERT INTO users(email, password, repeat_password) VALUES('$email','$password','$re_password')") or die("Error Occured!!!");
                    echo "<div class='message'>
                        <p>Registration Successfull !!!</p>
                    </div>";
                    echo "<a href='login.php'><button>Login Now</button>";
                    }
                }
        }else{
    ?>
    <div class="background">
    </div>
    <form action="" method="POST">
        <h3>Register Here</h3>

        <label for="email">Email</label>
        <input type="text" placeholder="Email" name="email" required>

        <label for="password">Password</label>
        <input type="password" placeholder="Password" name="password" required>

        <label for="re-password">Repeat Password</label>
        <input type="password" placeholder="Repeat Password" name="re-password" required>

        <label for="login"><a href="login.php">Already register? Go to Login</a></label>
        <button name="submit">Register</button>
    </form>
    <?php } ?>
</body>
</html>
