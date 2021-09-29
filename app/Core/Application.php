<?php

namespace app\Core;

class Application
{
    public static string $ROOT_DIR;
    public string $layout = 'main';
    public string $userClass;
    public static Application $app;
    public Router $router;
    public Request $request;
    public Database $db;
    public Response $response;
    public Session $session;
    public ?Controller $controller = null;
    public ?DbModel $user; //might be null
    public View $view; //might be null

    public function __construct($rootPath, array $config)
    {
        $this->userClass = $config['userClass'];
        self::$ROOT_DIR = $rootPath;
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->session = new Session();
        $this->router = new Router($this->request, $this->response);
        $this->view = new View();
        $this->db = new Database($config['db']);
        $primaryValue = $this->session->get('user');
        if($primaryValue){
            $primaryKey = $this->userClass::primaryKey();
           $this->user = $this->userClass::findOne([$primaryKey => $primaryValue]);
        }
        else {
            $this->user = null;
        }

    }

    public static function isGuest()
    {
        return !self::$app->user;
    }

    public function run()
    {
        try{
            echo $this->router->resolve();
        } catch (\Exception $e){
            Application::$app->response->setStatusCode($e->getCode());
            echo $this->view->renderView('_error', [
                'exception' => $e
            ]);
        }

    }

    public function getController()
    {
        return $this->controller;
    }

    public function setController(Controller $controller)
    {
        $this->controller = $controller;
    }

    public function login(DbModel $user)
    {
        $this->user = $user;
        $primaryKey = $user->primaryKey();
        $primaryValue = $user->{$primaryKey};
        $this->session->set('user', $primaryValue);
        return true;
    }

    public function logout() {
        $this->user = null;
        $this->session->remove('user');
    }
}