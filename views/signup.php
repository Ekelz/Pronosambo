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
                            <h1>Sign up</h1>
                            <p>Please write your informations to create your account.</p>
                            <hr>

                            <label for="email"><b>Email</b></label>
                            <input class="form-control" type="text" placeholder="Enter Email" name="username" required>
                            <br>
                            <label for="psw"><b>Password</b></label>
                            <input class="form-control" id="password" name="password" type="password" pattern="^\S{6,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Must have at least 6 characters' : ''); if(this.checkValidity()) form.password_two.pattern = this.value;" placeholder="Password" required>
                            <br>
                            <label for="psw"><b>Confirm password</b></label>
                            <input class="form-control" id="password_two" name="password_two" type="password" pattern="^\S{6,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Please enter the same Password as above' : '');" placeholder="Verify Password" required>
                            <hr>
                            <input type="submit" class="btn btn-outline-light my-2 my-sm-0" name="btnSgn" value="Sign up">
                        </div>
                        <hr>
                        <hr>
                    </form>
                    <p>
                        <form method="post" action="./home.php">
                            Already have an account? <input class="btn btn-outline-light my-2 my-sm-0" type="submit" name="btnLogin" value="Sign in">
                        </form>
                    </p>
                </div>
            </div>
        </div>
</section>
<?php
$content = ob_get_clean();
require("layout.php");
?>