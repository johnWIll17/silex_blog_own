<?php

namespace MyApp\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use MyApp\Controller\BaseController;
use Resources\Form\AuthenType;

class AuthenController extends BaseController {

    public function loginAction() {
        $form = $this->app['form.factory']
            ->createBuilder(new AuthenType(), null, array(
                'action' => $this->app['url_generator']->generate('authen_user'),
                'method' => 'POST'
            ))
            ->add('submit', 'submit', array('label' => 'Login'))
            ->getForm();

        return $this->app['twig']->render('authen/login.html.twig', array(
            'form' => $form->createView()
        ));

    }
    public function logoutAction() {

        return $this->app->redirect($this->app['url_generator']->generate('log_in'));
    }

    public function authenUserAction(Request $request) {
        //print_r($request->request->get('blog_login'));
        extract($request->request->get('blog_login'));
        echo $email;
        echo "<br>";
        echo $password;
        die;
    }

}
