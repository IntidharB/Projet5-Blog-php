
<!-- List des Articles -->
<?php foreach ($articles as $article){ ?>
    <div class=' container card-group'>
        <div class='card w-50  border-dark m-2'>
            <a href="Article/<?= $article->getId(); ?>"><h2><?= $article->getTitre(); ?></h2></a>
            <p><strong><?= $article->getChapo(); ?></strong></p>
            <p>Modifié le <?= $article->getDateDernierModif(); ?>.</p>
        </div>
    </div>
    
<?php } ?>

 


