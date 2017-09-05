<?php
namespace app\controllers;
use Yii;
use app\models\ImgUpload;
use app\models\Uploader;
use app\models\Category;
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

    public function actionPost() {
    }

    public function actionCategory() {
        $name = strtolower(trim($_GET['name']));
        $ret = Category::find()
            ->where(['name' => $name])
            ->one();

        $isNew = false;

        if (!$ret) {
            $c = new Category;
            $c->name = $name;
            $c->save();
            $ret = $c;
            $isNew = true;
        }

        echo json_encode([
            'name' => $ret->name,
            'id' => $ret->id,
            'isNew' => $isNew
        ]);
    }
}

