<?php
$title = "Pronosambo";
ob_start();
?>
<hr>
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
                            <button type="submit" class="btn btn-outline-light my-2 my-sm-0" name="btnLog">Log in</button>
                        </div>
                    </form>
                    <hr><hr>
                    <div class="container signin">
                        <p>
                        <form method="post" action="./home.php">
                            Don't have an account? <input class="btn btn-outline-light my-2 my-sm-0" type="submit" name="btnSub" value="Sign up">
                        </form>
                        </p>

                    </div>
                </div>
            </div>
        </div>
</section>
<?php
$content = ob_get_clean();
require("layout.php");
?>