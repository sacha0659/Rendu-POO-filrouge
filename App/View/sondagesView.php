<?php
include_once('inc/header.php');
include_once('inc/nav.php');
?>
<form method="post">

    <input type="text" placeholder="Qu'est ce que je mange ce soir ?" name="question">

    <input type="text" name="reponse[]" placeholder="Chinois"></input>

    <input type="text" name="reponse[]" placeholder="Italien"></input>

    

    <button type="submit"> Confirmer</button>
</form>