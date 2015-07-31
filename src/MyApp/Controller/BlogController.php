<?php

namespace MyApp\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use MyApp\Controller\BaseController;
use Resources\Form\ArticleType;


class BlogController extends BaseController {

    public function indexAction(Application $app, Request $request) {
        $all_articles = $this->app['article.service']->pageNum();
        $pages = $this->app['article.service']->paginate();

        if ($request->get('page')) {
            $page = $request->get('page');
            $all_articles = $this->app['article.service']->pageNum($page);
        }

        return $this->app['twig']->render('blogs/index.html.twig', array(
            'all_articles' => $all_articles,
            'pages' => $pages
        ));
    }
    public function showAction($id) {
        return $this->app['twig']->render('blogs/show.html.twig');
    }

    public function newAction() {
        $form = $this->app['form.factory']
            ->createBuilder(new ArticleType(), null, array(
                'action' => $this->app['url_generator']->generate('blog_create'),
                'method' => 'POST'
            ))
            ->add('submit', 'submit', array('label' => 'Create Article'))
            ->getForm();

        return $this->app['twig']->render('blogs/new.html.twig', array(
            'form' => $form->createView()
        ));
    }

    public function createAction(Request $request) {
        $form = $this->app['form.factory']
            ->createBuilder(new ArticleType(), null, array(
                'action' => $this->app['url_generator']->generate('blog_create'),
                'method' => 'POST'
            ))
            ->add('submit', 'submit', array('label' => 'Create Article'))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isValid()) {
            return "ok! good";
        } else {
            return $this->app['twig']->render('blogs/new.html.twig', array(
                'form' => $form->createView()
            ));
        }

    }
    public function editAction($id) {
        return $this->app['twig']->render('blogs/edit.html.twig');
    }
    public function updateAction(Request $request, $id) {
        return "update action";
    }
    public function destroyAction($id) {
        return "destroy action";
    }

}

