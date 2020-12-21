
        <h1>
            Découvrir
        </h1>
        <section class="catégorie_sondage">
            <p class="section_titre">Sondages</p>
            <section class="section_preview">
            <?php foreach ($listesondages as $result) {
?>
    <div class="preview_sondage"><a href="?page=affichersondage&url_='<?= $result['_url'] ?>'"><p class="vide_sondage"><?= $result['questions'] ?></p></a></div>
<?php
}?>
                <div class="preview_sondage" ><p class="vide_sondage">...</p></div>
            </section>
        </section>
       
    </main>
    
    <script src="scripts/main.js"></script>
</body>
</html>