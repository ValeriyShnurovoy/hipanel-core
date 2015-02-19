<?php

namespace frontend\controllers;

use yii\filters\AccessControl;
use yii\web\Response;

/**
 * HiPanel controller
 */
class HipanelController extends \frontend\components\Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index'],
                'rules' => [
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function renderJson ($data) {
        \Yii::$app->response->format = Response::FORMAT_JSON;
        return $data;
    }

    public function renderJsonp ($data) {
        \Yii::$app->response->format = Response::FORMAT_JSONP;
        return $data;
    }

}
