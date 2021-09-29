<?php

namespace app\Controllers;

use app\Core\Application;
use app\Core\Controller;
use app\Core\Request;
use app\Core\Middlewares\AuthMiddleware;
use app\Models\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleware());
    }
    public function show()
    {
        $params = [
            'name' => 'User'];

        return $this->render('User', $params);
    }

    public function post(Request $request)
    {
        $body = $request->getBody();
        return 'Handling submitted data';
    }
    public function profile()
    {
        return $this->render('Profile');
    }

    public function register(Request $request)
    {
        $user = new User();
        if ($request->isPost()) {
            $user->loadData($request->getBody());

            if ($user->validate() && $user->save()) {
                Application::$app->session->setFlash('success', 'Thanks for registering');
                Application::$app->response->redirect('/');
                // exit;

            }
            return $this->render('User', [
                'model' => $user
            ]);
        }
        return $this->render('User', [
            'model' => $user
        ]);
    }

}