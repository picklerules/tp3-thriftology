<?php

class RequirePage {

    static public function model($model){
        return require_once('model/'.$model.'.php');
    }

    static public function library($library){
        return require_once('library/'.$library.'.php');
    }

    static public function header($title){
        return '
        <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>'.$title.'</title>
                <link rel="stylesheet" href=""'.PATH_DIR.'assets/css/style.css"">
            </head>
            <body>
                <header>
                    <img src="'.PATH_DIR.'assets/img/banner.png" alt="Thriftology banner" class="banner">
                    <nav>
                        <ul>
                            <li><a href="'.PATH_DIR.'">Accueil</a></li>
                            <li><a href="'.PATH_DIR.'vetement">Vêtements</a></li>
                            <li><a href="#">À propos</a></li>
                            <li><a href="#">S\'inscrire</a></li>
                        </ul>
                     </nav>
                </header>
        ';
    }

    static public function url($url){
        header('location:'.PATH_DIR.$url);
    }
}


?>