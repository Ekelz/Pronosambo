<?php
$title="Pronosambo";

ob_start();
?>
        <section class="section">
            <div class="container">
                <form method="post" action="connect.php">
                    <div class="container">
                        <h1>Register</h1>
                        <p>Please write your credentials to connect to your account.</p>
                        <hr>
                    
                        <label for="email"><b>Email</b></label>
                        <input type="text" placeholder="Enter Email" name="email" required>
                    
                        <label for="psw"><b>Password</b></label>
                        <input type="password" placeholder="Enter Password" name="psw" required>
                        <button type="submit" class="button is-primary">Log in</button>
                        </div>
                </form> 
            </div>
        </section>

        <div class="container signin">
            <p>Already have an account? <a href="#">Sign in</a>.</p>
        </div>
<?php
$content=ob_get_clean();
require("layout.php");
?>