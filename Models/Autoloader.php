<?php

/**
 * Class Autoloader
 */
class Autoloader{

    /**
     * Enregistre cet autoloader
     */
    static function register(){
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }

    /**
     * Inclue le fichier correspondant à la classe
     * @param $class string Le nom de la classe à charger
     */
    static function autoload($class){
        require_once 'file:///Macintosh HD/Applications/MAMP/htdocs/JeuxVideoMVC-main/Models/Models' . $class . '.php';
    }

}