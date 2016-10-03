<?php

namespace app\controllers;

use Yii;

class AjaxController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionTest ()
    {
        //Сконвертировали в формат Json тем самым создали объект в javaSript
        $arr = ['name' => 'Andrey', 'fio' => 'lebedev', 'age' => 34];
        echo $arrJson = json_encode($arr);

        //Получили переменную из javascript (var sex = 'mail') в php
        $sex = Yii::$app->getRequest()->getBodyParam('sex');
    }

}
