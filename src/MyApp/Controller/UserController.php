<?php

namespace MyApp\Controller;

use Silex\Application;
use Silex\Component\HttpFoundation\Request;
use Silex\Component\HttpFoundation\Response;
use MyApp\Controller\BaseController;

class UserController extends BaseController {

    public function newAction() {
        $form = $this->app['form.factory']
            ->createBuilder(new UserType(), null, array(
                'action' => $this->app['url_generator']->generate('user_create'),
                'method' => 'POST'
            ))
            ->add('submit', 'submit', array('label' => 'Create User'))
            ->getForm();

        return $this->app['twig']->render('users/new.html.twig', array(
            'form' => $form->createView()
        ));
    }

    public function createAction(Request $request) {
        $form = $this->app['form.factory']
            ->createBuilder(new UserType(), null, array(
                'action' => $this->app['url_generator']->generate('user_create'),
                'method' => 'POST'
            ))
            ->add('submit', 'submit', array('label' => 'Create User'))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isValid()) {

        }


        return $this->app['twig']->render('users/new.html.twig', array(
            'form' => $form->createView()
        ));

    }

    public function editAction($id) {

    }
    public function updateAction(Request $request, $id) {

    }
}
