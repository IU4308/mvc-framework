<?php

namespace app\controllers;

use app\core\Application;
use app\models\ContactForm;
use app\core\Controller;
use app\core\Request;
use app\core\Response;

class SiteController extends Controller
{
    public function home()
    {
        $params = [
            'name' => 'John Doe'
        ];
        return $this->render('home', $params);
    }
    public function contact(Request $request, Response $response)
    {
        $contact = new ContactForm();
        if ($request->isPost()) {
            $contact->loadData($request->getBody());
            if ($contact->validate() && $contact->send()) {
                Application::$app->session->setFlash('success', 'Thanks for contacting us.');
                return $response->redirect('/contact');
            }
        }
        return $this->render('contact', [
            'model' => $contact
        ]);
    }
    public function handleContact(Request $request)
    {
        $body = $request->getBody();
        var_dump($body);
        return 'Handle submitted data';
    }
}
