<?php

namespace App\Controller;
require 'App\Model\Tablet.php';

use App\Model\Tablet;
use mysql_xdevapi\TableSelect;

class ProductController
{
    protected Tablet $tablet;
    public function __construct($db)
    {
        $this->tablet = new Tablet($db);
    }
    function showAllTablet():void
    {
        $tablets = $this->tablet->showAll();
        require 'App/View/showAllTablet.php';
    }
    function formInsertOneTablet():void{
        require 'App/View/formInsertTablet.php';
    }


    function insertOneTablet():void
    {
        $tabletAttributes = require 'App\Attributes\tabletAttributes.php';
        $tablet = [];
        foreach ($tabletAttributes as $attribute => $attributeValues)
            $tablet[$attribute] = $_POST[$attribute] ?? '';
        if ($this->tablet->createOne($tablet)) {
            $content = 'Tablet inserito';
            require 'App/View/home.php';
        } else {
            $content = 'Errore nel db';
            require 'App/View/errorPage.php';
        }
    }
    public function show1()
    {
        $content =  'ciao show 1 nella classe productcontroller';
        require 'App/View/content.php';
    }
}