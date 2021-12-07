<?php

require_once __DIR__ . '/../vendor/autoload.php';

use app\controllers\AuthController;
use app\controllers\SiteController;
use app\core\Application;
use app\models\Car;
use app\models\Reservering;
use app\models\User;
use Dotenv\Dotenv;

require_once __DIR__ . '/../vendor/autoload.php';
$dotenv = Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();
$config = [
    'userClass' => User::class,
    'carClass' => Car::class,
    'reserveringClass' => Reservering::class,
    'db' => [
        'dsn' => $_ENV['DB_DSN'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD'],
    ]
];

$app = new Application(dirname(__DIR__), $config);

$app->on(Application::EVENT_BEFORE_REQUEST, function(){
    echo '';
});
 
 $app->router->get('/', [new SiteController(), 'home']);
 $app->router->get('/login', [new AuthController(), 'login']);
 $app->router->post('/login', [new AuthController(), 'login']);
 $app->router->get('/register', [new AuthController(), 'register']);
 $app->router->post('/register', [new AuthController(), 'register']);
 $app->router->get('/loggedin', [new AuthController(), 'loggedin']);
 $app->router->get('/logout', [new AuthController(), 'logout']);
 $app->router->get('/changepass', [new AuthController(), 'changepassword']);
 $app->router->get('/catalogus', [new AuthController(), 'catalog']);
 $app->router->get('/invoices', [new AuthController(), 'invoices']);
 $app->router->get('/car', [new AuthController(), 'car']);
 $app->router->post('/reserve', [new AuthController(), 'reserve']);
 $app->router->get('/admin', [new AuthController(), 'admin']);

 $app->run();