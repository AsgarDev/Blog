<!-- Par défaut (= sur mobile) mon element <main> prend toutes les colonnes (=12)
        MAIS au dela d'une certaine taille, il n'en prendra plus que 9
        https://getbootstrap.com/docs/4.1/layout/grid/#grid-options -->
<main class="col-lg-9">

    <?php foreach($articleList as $articleId => $article) : ?>
    <?php 
        /**
         * $id = la clé de chaque élément dans la liste d'articles
         * $article = la valeur,  un objet Article
         */
    ?>
    <!-- Je dispose une card: https://getbootstrap.com/docs/4.1/components/card/ -->
    <article class="card">
        <div class="card-body">
            <?php // BONUS: fonction pour générer des liens ?>
            <h2 class="card-title"><a href="index.php?page=article&articleId=<?= $articleId ?>"><?= $article->title; ?></a></h2>
            <p class="card-text"><?= $article->content; ?></p>
            <p class="infos">
            Posté par <a href="#" class="card-link"><?= $article->author ?></a> le <time datetime="TODO: 2017-07-13"><?= $article->getDateFr() ?></time> dans <a href="#"
                class="card-link">#<?= $article->category ?></a>
            </p>
        </div>
    </article>
    <?php endforeach; ?>

    <!-- Je met un element de navigation: https://getbootstrap.com/docs/4.1/components/pagination/ -->
    <nav aria-label="Page navigation example">
    <ul class="pagination justify-content-between">
        <li class="page-item"><a class="page-link" href="#"><i class="fa fa-arrow-left"></i> Précédent</a></li>
        <li class="page-item"><a class="page-link" href="#">Suivant <i class="fa fa-arrow-right"></i></a></li>
    </ul>
    </nav>

</main>