<?php

namespace app\controllers;

use app\core\Controller;

class SiteController extends Controller
{
    public function home(): string
    {
        return $this->render('home');
    }
}