<?php
$title = "Pronosambo";
ob_start();
?>
<section class="section">
    <div class="container item-body sambo-container">
        <?php
            // Requetage 
            require "./model/requetes/id_base.php";
            require "./model/requetes/get_competitions.php";
        ?>
        <div class="row container-title prono-container">
            <div class="col">
                COMPÉTITIONS
            </div>
        </div>

        <div class="row">
            <?php
                while ($value = $q->fetch()) :
            ?>
            <div class="col-md-4">
                <div class="card mb-4 box-shadow">
                    <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;" src="./src/img/<?php echo htmlspecialchars($value['image_lien'])?>" data-holder-rendered="true">
                    <div class="card-body">
                        <p class="card-text bold"><?php echo htmlspecialchars($value['nom'])?></p>
                        <div class="d-flex justify-content-between align-items-center">
                            <small class="text-muted"><?php echo htmlspecialchars($value['pays'])?></small>
                            <small class="text-muted"><?php echo htmlspecialchars($value['annee'])?></small>
                        </div>
                    </div>
                </div>
            </div>
            <?php
			    endwhile
		    ?>
        </div>
    </div>
</section>

<?php
$content = ob_get_clean();
require("layout.php");
?>