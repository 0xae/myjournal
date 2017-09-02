<?php
namespace app\controllers;
use app\models\ImgUpload;
use app\models\Post;

class HomeController extends \yii\web\Controller {
    public function actionIndex() {
        $uploadModel = new ImgUpload;
        $postModel = new Post;

        return $this->render('index', [
            'uploadModel' => $uploadModel,
            'postModel' => $postModel
        ]);
    }

    public function actionTest() {
        $model = new ImgUpload;
        return $this->renderPartial('test', [
            'model' => $model
        ]);
    }
}
