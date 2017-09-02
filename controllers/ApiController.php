<?php
namespace app\controllers;
use app\models\ImgUpload;
use yii\web\UploadedFile;


class ApiController extends \yii\web\Controller {
    public function actionIndex() {
        return $this->render('index');
    }

    public function actionUploadImg() {
        $model = new ImgUpload();

        if (Yii::$app->request->isPost) {
            $model->file = UploadedFile::getInstance($model, 'file');
            if ($model->upload()) {
                echo json_encode([
                    'filename' => ''
                ]);
            }
        }
    }
}

