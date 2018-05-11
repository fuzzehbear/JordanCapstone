<?php
//$class_name = '/home';

spl_autoload_register(function ($class_name) {
    include $_SERVER['DOCUMENT_ROOT'] . "/students/m1/run8/jtrajandran/phpcrudsample/" .$class_name . '.php';
});
?>