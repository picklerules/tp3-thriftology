<?php

class ControllerHome extends Controller {

    public function index(){
      // $view = new view('home');

      return Twig::render('home.php');
    }

    public function error($e = null){
        return 'error '.$e;
    }

}

?>