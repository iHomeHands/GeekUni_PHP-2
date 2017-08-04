<?php

class SiteController
{
    public function actionIndex()
    {
        require_once(Config::get('path_views') . '/site/index.php');
        return true ;
    }

    public function actionAbout()
    {
        require_once(Config::get('path_views') . '/site/about.php');
        return true;
    }

    public function actionContact()
    {
        require_once(Config::get('path_views') . '/site/contact.php');
        return true;
    }
}
