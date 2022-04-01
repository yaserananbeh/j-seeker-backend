<?php

namespace api\controllers;

use yii\web\Controller;

/**
 * Site controller
 */
class SiteController extends Controller
{
  

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return [
            [
                'message' => 'Greeting message',
                'data' => 'Welcome to the J-seekers api '
            ]
        ];
    }

}
