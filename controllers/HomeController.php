<?php
namespace app\controllers;
use app\models\ImgUpload;
use app\models\Post;
use app\models\Category;
use yii\helpers\ArrayHelper;

class HomeController extends \yii\web\Controller {
    public function actionIndex() {
        $postModel = new Post;
        $uploadModel = new ImgUpload;
        $categories = Category::find()->asArray()->all();

        return $this->render('index', [
            'uploadModel' => $uploadModel,
            'postModel' => $postModel,
            'categoryData' => $categories
        ]);
    }

    public function actionTest() {
        $model = new ImgUpload;
        return $this->renderPartial('test', [
            'model' => $model
        ]);
    }
}
