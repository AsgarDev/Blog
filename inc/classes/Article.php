<?php

class Article {

    public $title;
    public $content;
    public $author;
    public $date;
    public $category;

    // Constructeur : Déclenché au moment de l'instanciation
    function __construct($titleParam = '', $contentParam = '', $authorParam = '', $dateParam = '', $categoryParam = '')
    {
        // on utilise $this pour accéder (en lecture et en écriture) aux prpriétés et aux méthodes d'un objet ($this représente l'instance de la classe, pas la classe elle-même)
        $this->title = $titleParam;
        $this->content = $contentParam;
        $this->author = $authorParam;
        $this->date = $dateParam;
        $this->category = $categoryParam;
    }

    // getDateFr doit renvoyer la date de l'article au format dd/mm/yyyy
    function getDateFr()
    {
        // on transforme la date de l'article en timestamp : nombre de secondes depuis le 01/01/1970 à 00:00
        // PHP va lire la date (attention au format, le plus sûr est d'utiliser yyyy-mm-dd, sinon le timestamp renvoyé sera 0) et renvoyer un timestamp
        $timestamp = strtotime($this->date);

        // la fonction date renvoie une date sous forme de chaîne de caractère formatée en fonction de la valeur du premier argument 'format'. Cette chaîne est lue par PHP et chaque caractère qui y est rencontré est remplacé par l'élément de la date qui y correspond : https://www.php.net/manual/fr/function.date.php
        // en second argument, on passe le timestamp
        return date('d/m/Y', $timestamp);
    }
}