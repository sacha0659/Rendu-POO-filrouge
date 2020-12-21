<aside id="classement">
    <p class="sondage_aside" id="amis_aside">Amis</p>
    <ol class="amis">
        <?php foreach ($data as $pseudo) {
            if ($pseudo['iduser_1'] == $_SESSION['user']['pseudo']) { ?>
                <li class="ami">
                    <div>
                        <p class="ami_nom"><?= $pseudo['iduser_2'] ?></p>

                    </div>
                    <form method="post"><button type="submit" name='deletefriend' value=<?= $pseudo['iduser_2'] ?>> Supprimer</button></form>
                </li>
            <?php

            } elseif ($pseudo['iduser_2'] == $_SESSION['user']['pseudo']) { ?>
                <li class="ami">
                    <div>
                        <p class="ami_nom"><?= $pseudo['iduser_1'] ?></p>

                    </div>

                </li>
        <?php }
        }
        ?>



</aside>

<h1>Trouver des amis : </h1>
<form method="post">
    <input type="text" name="search">
    <button type="submit">Rechercher</button>
</form>
<?php if (!empty($_POST)) {
    if ($search_friend == null) {
        echo ('Erreur : aucun résultat !');
    } else {

?>
        <table>
            <tr>
                <th>Pseudo</th>
                <th>Email</th>
            </tr>
            <?php
            foreach ($search_friend as $friend) {
            ?>
                <tr>
                    <td><?= $friend['pseudo'] ?></td>
                    <td><?= $friend['email'] ?></td>
                    <td>
                        <form method="post"><button type="submit" name='addfriend' value=<?= $friend['pseudo'] ?>> ajouter</button></form>
                    </td>
                </tr>
    <?php

            }
        }
    }
    ?>
        </table>

        <?php
        include('inc/footer.php');
        ?>