<?php

namespace App\Controllers;
use League\Plates\Engine;

class Controller {
    private ?Engine $template;

    public function __construct(){
        $this->template = new Engine();
        $this->template->addFolder('views',BASE_VIEWS);
        $this->template->addFolder('admin',BASE_VIEWS.'/Admin');
        $this->template->addFolder('adminComponents',BASE_VIEWS.'/Admin/components');
    }

    public function getTemplate(){
        return $this->template;
    }
}