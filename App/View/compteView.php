<?php
include('inc/nav.php');
?>

<h1> Voici le profil de <?= $_SESSION['user']['pseudo']; ?></h1>
    <ul>
        <li>Votre pseudo est : <?= $profil['pseudo'] ?></li>
        <li>Votre mail est : <?= $profil['email'] ?></li>
        </ul>
<a class="modif_button" href="index.php?page=modifier">modifier</a>
<hr>
<h2 class="compte_sondage">mes sondages : </h2>
<?php

foreach ($sondages as $sondage) {

?>
    <li><?= $sondage['questions'] ?></li>
    <p>Résultats des votes:</p>
    <table>
        <tr>
            <th>Reponses</th>
            <th>Nombres de votes</th>
        </tr>
        <?php

        foreach ($reponses as $reponse) {
        ?>
            <tr>
                <td><?= $reponse['name_questions'] ?></td>
                <td><?= $reponse['nb_vote'] ?></td>
            </tr>
        <?php
        }
        ?>
    </table>
    <hr>

<?php
}
?>
<h2><a href="index.php?page=deconnexion"> Deconnexion</a></h2>

<?php
include('inc/footer.php');
?>