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
        if(is_file('includes/class/' . $class . '.class.php')){
            require_once 'includes/class/' . $class . '.class.php';
        }
        if(is_file('includes/interface/' . $class . '.interface.php')){
            require_once 'includes/interface/' . $class . '.interface.php';
        }
    }

}