<?php
$title = "Pronosambo";
ob_start();
?>
<section class="section">
    <div class="container item-body">
        <div class="row">
            <div class="card combattant">
                <div class="card-header sambo-background">
                    <form method="post" action="./views/auth/connect.php">
                        <div class="container">
                            <h1>Register</h1>
                            <p>Please write your credentials to connect to your account.</p>
                            <hr>

                            <label for="email"><b>Email</b></label>
                            <input type="text" placeholder="Enter Email" name="username" required>

                            <label for="psw"><b>Password</b></label>
                            <input type="password" placeholder="Enter Password" name="password" required>
                            <button type="submit" class="button is-primary">Log in</button>
                        </div>
                    </form>
                    <div class="container signin">
                        <p>Already have an account? <a href="#">Sign in</a>.</p>
                    </div>
                </div>
            </div>
        </div>
</section>
<?php
$content = ob_get_clean();
require("layout.php");
?>