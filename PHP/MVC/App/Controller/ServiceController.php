<?php

namespace App\Controller;
class ServiceController
{
    public function presentation3()
    {
        $content =  'ciao sono presentation3 nella Servicecontroller';
        require 'App/View/content.php';
    }
}