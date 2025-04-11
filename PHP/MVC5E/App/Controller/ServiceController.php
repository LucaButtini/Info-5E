<?php

namespace App\Controller;
class ServiceController
{
    public function presentation3()
    {
        $content= 'ciao sono presentation3 in productcontroller';
        require 'App/View/content.php';
    }
}