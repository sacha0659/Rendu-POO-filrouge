<section class="page_sondage">

    

    <div class="div_sondage">
      
        <div class="question_sondage">
        <?= $select_sondage[1]['questions'] ?>
        </div>
        <section class="reponses">
        <form method='post' action="index.php?page=vote&url_=<?= $_GET['url_'] ?>">
    <?php
    foreach ($select_sondage as $reponse) {
    ?>

        <div class="choix_reponses"><button class="select_reponse" type="radio" name="vote" value="'<?= $reponse['name_questions'] ?>'"></button> <?= $reponse['name_questions'] ?>
    </div>
    <?php
    }
    echo ('<h2>
    Partager ce sondage avec un ami :
    </h2>');
    echo '<p class="url">'.$_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'] . "?page=affichersondage&url_= " . $_GET['url_'] . '</p>';
    
    
    ?>
    </section>

    <div class="col-12 my-1">
    <h2>Tchat : </h2>
    <div class="p-2" id="discussion">
    </div>
</div>
<div>
    <div>
        <input type="text" id="texte" placeholder="Entrez votre texte">
        <div>
            <span id="valid"><i class="la la-check"></i></span>
        </div>
    </div>
</div>
    

</section>
<?php include('inc/footer.php') ?>

