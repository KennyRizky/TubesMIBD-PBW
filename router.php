<?php
    $url = $_SERVER['REDIRECT_URL'];
    $baseURL = '/TubesMIBD-PBW';

    if($_SERVER["REQUEST_METHOD"] == "GET"){
        switch ($url) {
            case $baseURL.'/index':
                require_once "controller/indexController.php";
                $indexCtrl = new IndexController();
                echo $indexCtrl->view_index();
                break;
            case $baseURL.'/companyprofile':
                require_once "controller/indexController.php";
                $indexCtrl = new IndexController();
                echo $indexCtrl->view_company_profile();
                break;
            case $baseURL.'/signin';
                require_once "controller/signInController.php";
                $indexCtrl = new signInController();
                echo $indexCtrl->view_signIn();
                break;
            case $baseURL.'/register';
                require_once "controller/registerController.php";
                $indexCtrl = new registerController();
                echo $indexCtrl->view_register();
                break;
            default:
                echo '404 Not Found';
                break;
        }
    }else if($_SERVER["REQUEST_METHOD"] == "POST"){
        switch($url){
            default:
                echo '404 Not Found';
                break;
        }
    }
    
?>