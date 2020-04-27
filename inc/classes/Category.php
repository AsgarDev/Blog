<?php

class Category {

    // déclaration des propriétés
    public $name;

    // le constructeur :
    // - se déclenche dès l'instanciation (automatiquement)
    // - reçoit en paramètres les arguments donnés en arguments de l'instanciation
    function __construct($nameParam)
    {   
        // la propriété name prend la valeur de namePara
        $this->name = $nameParam;
    }

}
