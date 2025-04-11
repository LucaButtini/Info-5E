<?php

namespace App\Controller;
class HomeController
{
    public function presentation1()
    {
        $content= 'ciao sono presentation1 di home controller';
        require 'App/View/content.php';
    }
}