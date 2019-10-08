<?php
$title="Pronosambo";
ob_start();
?>
    <section class="section">
        <div class="container">
            <h1 class="title">
                Hello
            </h1>
            <p class="subtitle">
                    It's been a <strong>long time.</strong>
            </p>
        </div>
    </section>
</html>

<?php
    $content=ob_get_clean();
    require("layout.php");
?>