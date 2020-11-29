<?php
    require_once 'config.php';

    function __autoload($class_name){
        //class name should be the same as the file name
        require_once 'lib/'. $class_name . '.php';
    }
?>