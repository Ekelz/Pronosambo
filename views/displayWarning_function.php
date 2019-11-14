<?php
/**
 *  Affichage d'un message d'information.
 * 
 * @param string $type Détermine la couleur du message : vert pour 'success', jaune pour 'warning' et rouge pour 'danger'
 * @param mixed $message Le message à afficher  
 *  */
function displayWarning($type, $message)
{
    echo '<div class="row"><div class="col alert alert-'. $type . '">';
    echo $message;
    echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button></div></div>';
}