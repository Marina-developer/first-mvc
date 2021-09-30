<?php

namespace app\Controllers;

use app\Core\Application;
use app\Core\Request;
use app\Core\Response;
use app\Core\Controller;
use app\Models\LoginForm;
use app\Models\User;
use app\Core\Middlewares\AuthMiddleware;

use app\Core\Model;

class AuthController extends Controller
{
    public function login(Request $request, Response $response)
    {
        $loginForm = new LoginForm();
        if ($request->isPost()) {
            $loginForm->loadData($request->getBody());
            if ($loginForm->validate() && $loginForm->login()) {
                $response->redirect('/');
                return;
            }
        }
        $this->setLayout('auth');
        return $this->render('Login', [
            'model' => $loginForm
        ]);
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
            return $this->render('Register', [
                'model' => $user
            ]);
        }
        $this->setLayout('auth');
        return $this->render('Register', [
            'model' => $user
        ]);
    }

    public function logout(Request $request, Response $response)
    {
        Application::$app->logout();
        $response->redirect('/');
    }


}