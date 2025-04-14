<?php

namespace App\Controller;
class HomeController
{
    public function presentation1()
    {
        $content = "ciao sono presentation1 di homecontroller";
        require 'App/View/content.php';
    }
}