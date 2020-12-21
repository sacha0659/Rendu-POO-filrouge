<?php include_once('inc/nav.php'); ?>
<div>Modifier votre profil : </div>
        <form method="post">

    <input type="text" placeholder="Votre prénom" name="pseudo" value="<?php
                                                                        echo $_SESSION['user']['pseudo'];
                                                                        ?>" required>   

    <input type="email" placeholder="Adresse mail" name="mail" value="<?php
                                                                        echo $_SESSION['user']['email'];
                                                                        ?>" required>
    <button type="submit" name="modification">Modifier</button>
</form>