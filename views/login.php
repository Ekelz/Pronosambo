<?php
$title = "Pronosambo";
ob_start();
?>
<div class="container">
    <div class="sambo-container container-header">
        <form method="post" action="./views/auth/connect.php">
            <div class="container">
                <h1>Register</h1>
                <p>Please write your credentials to connect to your account.</p>
                <hr>
                
                <label for="email"><b>Email</b></label>
                <input type="text" class="form-control mr-sm-2" placeholder="Enter Email" name="email" required>

                <label for="psw"><b>Password</b></label>
                <input type="password" class="form-control mr-sm-2" placeholder="Enter Password" name="psw" required>
                <button type="submit" class="btn btn-light sambo-background">Log in</button>
            </div>
        </form>
    </div>
</div>

<div class="container signin">
    <p>Already have an account? <a href="#">Sign in</a>.</p>
</div>
<?php
$content = ob_get_clean();
require("layout.php");
?>