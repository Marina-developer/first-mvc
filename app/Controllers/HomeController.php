<?php

namespace app\Controllers;

use app\Core\Application;
use app\Core\Controller;

class HomeController extends Controller
{
    public function show()
    {
        $params = [
            'name' => "User"
        ];
        return $this->render('Home', $params);
    }
}