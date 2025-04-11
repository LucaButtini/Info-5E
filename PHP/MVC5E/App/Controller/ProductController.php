<?php

namespace App\Controller;
class ProductController
{

    public function show1()
    {
        $content= 'ciao sono show1 in productcontroller';
        require 'App/View/content.php';
    }
}