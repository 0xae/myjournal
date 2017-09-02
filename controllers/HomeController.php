<?php
namespace app\controllers;
use app\models\ImgUpload;

class HomeController extends \yii\web\Controller {
    public function actionIndex() {
        $uploadModel = new ImgUpload;
        return $this->render('index', [
            'uploadModel' => $uploadModel
        ]);
    }

    public function actionTest() {
        $model = new ImgUpload;
        return $this->renderPartial('test', [
            'model' => $model
        ]);
    }
}
