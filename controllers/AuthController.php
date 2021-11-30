<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\exception\ForbiddenException;
use app\core\middlewares\AuthMiddleware;
use app\core\Request;
use app\core\Response;
use app\models\LoginForm;
use app\models\User;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleware(['loggedin', 'catalog', 'invoices', 'car', 'logout']));
    }

    public function login(Request $request, Response $response): string
    {
        $loginForm = new LoginForm();
        if ($request->isPost()) {
            $loginForm->loadData($request->getBody());
            if ($loginForm->validate() && $loginForm->login()) {
                $response->redirect('/loggedin');
            }
        }
        $this->setLayout('login');
        return $this->render('login', [
            'model' => $loginForm
        ]);
    }

    public function register(Request $request): string
    {
        $user = new User();
        if ($request->isPost()) {
            $user->loadData($request->getBody());

            if ($user->validate() && $user->save()) {
                Application::$app->session->setFlash('success', 'User registered successfully');
                Application::$app->response->redirect('/');
            }
            return $this->render('register', [
                'model' => $user
            ]);
        }
        $this->setLayout('register');
        return $this->render('register', [
            'model' => $user
        ]);
    }

    public function reserve(Request $request, Response $response)
    {
        if ($request->isPost()) {
            $carId = $request->getBody()['carId'];
            if (Application::$app->reserveCar($carId)) {
                Application::$app->session->setFlash('success', 'Reservering is geplaatst.');
            } else {
                Application::$app->session->setFlash('success', 'Something went wrong.');
            }
        }
        $this->setLayout('sidebar');
        $response->redirect('/catalogus');
    }

    public function loggedin(): string
    {
        if (Application::isAdmin()) {
            $this->setLayout('sidebar');
            return $this->render('admin');
        } else {
            $this->setLayout('sidebar');
            return $this->render('loggedin');
        }
    }

    public function catalog(): string
    {
        $this->setLayout('sidebar');
        return $this->render('catalogus');
    }

    public function invoices(): string
    {
        $this->setLayout('sidebar');
        return $this->render('invoices');
    }

    public function car(): string
    {
        $this->setLayout('sidebar');
        return $this->render('car');
    }

    public function changepassword(): string
    {
        $this->setLayout('sidebar');
        return $this->render('changepass');
    }

    public function logout(Request $request, Response $response)
    {
        Application::$app->logout();
        $response->redirect('/');
    }

    public function admin(): string{
        if (Application::isAdmin()) {
            $this->setLayout('sidebar');
            return $this->render('admin');
        } else {
            throw new ForbiddenException();
        }
    }
}