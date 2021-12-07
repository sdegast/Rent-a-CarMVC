<?php

namespace app\core;

use app\core\db\Database;
use app\core\db\DbModel;
use app\models\Role;
use JetBrains\PhpStorm\Pure;

class Application
{
    const EVENT_BEFORE_REQUEST = 'beforeRequest';
    const EVENT_AFTER_REQUEST = 'afterRequest';

    protected array $eventListeners = [];

    public static Application $app;
    public static string $ROOT_DIR;
    public string $userClass;
    public string $layout = 'main';
    public Router $router;
    public Request $request;
    public Response $response;
    public ?Controller $controller = null;
    public Database $db;
    public Session $session;
    public View $view;
    public ?DbModel $user;

    public array $cars;
    public string $carClass;
    public array $reserveringen;
    public string $reserveringClass;

    public function __construct($rootDir, $config)
    {
        $this->user = null;
        $this->userClass = $config['userClass'];
        $this->carClass = $config['carClass'];
        $this->reserveringClass = $config['reserveringClass'];
        self::$ROOT_DIR = $rootDir;
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);
        $this->db = new Database($config['db']);
        $this->session = new Session();
        $this->view = new View();
        $this->cars = $this->carClass::findAllCars();
        $this->reserveringen = $this->reserveringClass::findAllReserved();

        $userId = Application::$app->session->get('user');
        if ($userId) {
            $key = $this->userClass::primaryKey();
            $this->user = $this->userClass::findOne([$key => $userId]);
        }
    }

    public function getUsername($id)
    {
        $key = $this->userClass::primaryKey();
        return $this->userClass::findOne([$key => $id])->getDisplayName();
    }

    public static function isGuest(): bool
    {
        return !self::$app->user;
    }

    #[Pure] public static function isAdmin(): bool
    {
        return self::$app->user->getRole() === Role::ROLE_ADMIN;
    }

    public function login(DbModel $user): bool
    {
        $this->user = $user;
        $primaryKey = $user->primaryKey();
        $value = $user->{$primaryKey};
        Application::$app->session->set('user', $value);

        return true;
    }

    public function logout()
    {
        $this->user = null;
        self::$app->session->remove('user');
    }

    public function run()
    {
        $this->triggerEvent(self::EVENT_BEFORE_REQUEST);
        try {
            echo $this->router->resolve();
        } catch (\Exception $e) {
            echo $this->router->renderView('_error', [
                'exception' => $e,
            ]);
        }
    }

    public function triggerEvent($eventName)
    {
        $callbacks = $this->eventListeners[$eventName] ?? [];
        foreach ($callbacks as $callback) {
            call_user_func($callback);
        }
    }

    public function on($eventName, $callback)
    {
        $this->eventListeners[$eventName][] = $callback;
    }
}