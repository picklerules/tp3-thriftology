<?php

require_once('model/Log.php');

class ControllerLog extends Controller {

    public function index(){
        $logModel = new Log();
        $logs = $logModel->selectAll(); 
        return Twig::render('log/index.php', ['logs' => $logs]);

    }
}
?>
