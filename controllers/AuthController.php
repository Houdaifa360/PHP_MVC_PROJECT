<?php 

/** 
 * User: Houdaifa (tut: TheCodeHolic) 
 * Date : 03/01/2023
 * App: PHP MVC Framework
 *
*/

namespace app\controllers;
use ho_b7\phpmvc\Application;
use ho_b7\phpmvc\middlewares\AuthMiddleware;
use ho_b7\phpmvc\Request;
use ho_b7\phpmvc\Response;
use app\models\LoginForm;
use app\models\User;

/**
 * Class AuthController
 * 
 * @author houdaifa <boucena214@gmail.com>
 * @package app\controllers;
*/

class AuthController extends Controller
{
    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleware(['profile']));
    }

    public function login(Request $request, Response $response)
    {
        $this->setLayout('auth');

        $loginForm = new LoginForm();

        if($request->isPost()) {
            
            $loginForm->loadData($request->getBody());

            if ($loginForm->validate() && $loginForm->login()) {
                $response->redirect('/');
                return;
            }

            return $this->render('login', ['model'=>$loginForm]);
        }

        return $this->render('login', ['model'=>$loginForm]);
    }

    public function register(Request $request, Response $response)
    {
        $this->setLayout('auth');

        $user = new User();

        if($request->isPost()) {

            $user->loadData($request->getBody());

            if ($user->validate() && $user->save()) {
                Application::$app->session->setFlash('success', 'Thanks for registering');
                $response->redirect('/');
                exit;
            }

            return $this->render('register', ['model'=>$user]);
        }
        return $this->render('register', ['model'=>$user]);
    }

    public function logout(Request $request, Response $response)
    {
        if($request->isPost()) {
            Application::$app->logout();
            $response->redirect('/');
        }
    }

    public function profile() 
    {
        Application::$app->view->title = 'Profile';
        return $this->render('profile');
    }
}