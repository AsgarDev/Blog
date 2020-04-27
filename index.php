<?php

// Point d'entrée unique
// récupérer la valeur du paramètre GET 'page'
// on vérifie qu'on a un paramètre d'URL 'page'
if (isset($_GET['page'])) {
    // si c'est le cas, on stocke la valeur dans $page
    $page = $_GET['page'];
} else {
    // on essaie d'accéder à l'accueil
    // on définit une valeur par défaut pour $page
    $page = 'home';
}

// valeurs possibles pour $page :
// 'home', 'article', 'author', 'category'

// Inclusion des fichiers nécessaires
require __DIR__ . '/inc/classes/Article.php'; // on oublie pas la classe, sinon Erreur fatale : classe introuvable
require __DIR__ . '/inc/classes/Author.php';
require __DIR__ . '/inc/classes/Category.php';

// on require data.php APRES les classes, car elles sont utilisées dans data.php
require __DIR__ . '/inc/data.php';

// Récupération des données nécessaires la page (si besoin)
// Dans ces trois variables on trouve des listes d'objets des classes Article, Category et Author
$articleList = $dataArticlesList;
$categoryList = $dataCategoriesList;
$authorList = $dataAuthorsList;

// dans le cas où la page demandée est 'article', on va chercher un article à afficher
if ($page === 'article') {
    // TODO: valider qu'un paramètre articleId existe ! (avec isset, comme pour page)
    $articleId = $_GET['articleId'];
    // TODO: vérifier qu'un index $articleId existe sur $articleList
    $articleToDisplay = $articleList[$articleId];
} 
else if ($page === 'category') {
    // sur la page category, il faudra le même fonctionnement pour sélectionner seulement les articles de la categorie dont on a donné l'id en paramètre
    $categoryId = $_GET['categoryId'];
    // on récupère la catégorie à afficher (objet de la classe Category)
    $categoryObject = $dataCategoriesList[$categoryId];
    $categoryName = $categoryObject->name;

    // modifier la valeur de $articleList pour stocker les articles à afficher
    $articleList = []; // je vide articleList
    
    // regarder pour chacun des articles si la catégorie correspond à ce qu'on a demandé (comparer avec $categoryName)
    foreach($dataArticlesList as $articleId => $articleObject) {
        if ($articleObject->category == $categoryName) {
            // les catégories correspondent, j'ajoute cet article à la liste à afficher
            $articleList[$articleId] = $articleObject;
        }
    }

}
else if ($page === 'author') {
    // TODO: sur la page author, même chose: il faudrait récupérer l'id de l'auteur en paramètre pour 
    $authorId = $_GET['authorId'];
    $authorName = $dataAuthorsList[$authorId]->name;
    // filtrer les articles en fonction de l'auteur
    
    // vider la liste des articles
    $articleList = [];

    // pour chacun des articles existants
    foreach ($dataArticlesList as $articleId => $articleObject) {
        // si l'auteur dont a récupéré l'id en param d'URL est le même que celui d'un article, on stocke l'article en question dans la liste à afficher
        if ($articleObject->author == $authorName) {
            $articleList[$articleId] = $articleObject;
        }
    }
}

// TODO: générer les listes de liens vers les catégories et les auteurs (blocs de droite)


// Affichage
// en fonction de la valeur du param page, charger le template correspondant
// __DIR__ représente le chemin vers le répertoire courant (le répertoire dans lequel se trouve ce fichier)
// c'est un chemin absolu, qui part donc de la racine
// dans ce cas précis (valable que chez moi), __DIR__ vaut '/var/www/html/Asgard/S04/s04-e03-oblog-GaetanOclock
require __DIR__. '/inc/templates/header.tpl.php';
require __DIR__. "/inc/templates/{$page}.tpl.php";
require __DIR__. '/inc/templates/aside.tpl.php';
require __DIR__. '/inc/templates/footer.tpl.php';

