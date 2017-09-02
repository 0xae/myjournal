<?php
namespace app\controllers;
use Yii;
use app\models\ImgUpload;
use app\models\Uploader;
use yii\web\UploadedFile;


class ApiController extends \yii\web\Controller {
    public function actionIndex() {
        return $this->render('index');
    }

    public function actionUpload() {
        $model = new ImgUpload();

        if (\Yii::$app->request->isPost) {
            $model->file = UploadedFile::getInstance($model, 'file');

            if ($model->file) {
                $obj = Uploader::upload($model->file, 'posts');
                return json_encode($obj);
            }
        }

        throw new \yii\web\HttpException(400, 'Bad request');
    }

    public function actionRemove() {
        $filename = $_GET['file'];
        return Uploader::remove($filename, 'posts');
    }
}

