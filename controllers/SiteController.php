<?php 

/** 
 * User: Houdaifa (tut: TheCodeHolic) 
 * Date : 03/01/2023
 * App: PHP MVC Framework
 *
*/

namespace app\controllers;
use ho_b7\phpmvc\Application;
use ho_b7\phpmvc\Request;
use ho_b7\phpmvc\Response;
use app\models\ContactForm;

/**
 * Class SiteController
 * 
 * @author houdaifa <boucena214@gmail.com>
 * @package app\controllers;
*/

class SiteController extends Controller
{
    public function home()
    {
        $params = [
            'name' => 'Houdaifa'
        ];

        return $this->render('home', $params);
    }

    public function contact(Request $request, Response $response)
    {
        $contact = new ContactForm();
        if($request->isPost()) {
            $contact->loadData($request->getBody());
            if($contact->validate() && $contact->send()) {
                Application::$app->session->setFlash('success', 'Thanks For Contacting Us');
                $response->redirect('/contact');
                return;
            }
        }
        return $this->render('contact', ['model' => $contact]);
    }

    public function handleContact(Request $request)
    {
        $body = $request->getBody();
        var_dump($body);
        return "handling submit data";
    }

}