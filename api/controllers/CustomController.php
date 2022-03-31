<?php

namespace api\controllers;

class CustomController extends \yii\rest\ActiveController
{
    public function fields()
    {
        return ['id'];
    }
}
