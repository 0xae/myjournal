<?php
namespace app\controllers;
use app\models\ImgUpload;
use app\models\Post;
use app\models\Category;
use yii\helpers\ArrayHelper;
use Yii;

class HomeController extends \yii\web\Controller {
    public function actionIndex($id=false) {
        $u = Yii::$app->user->identity;

        $postModel = new Post;
        $uploadModel = new ImgUpload;
        $categories = Category::find()->all();
        $query = ['author' => $u->id];
        if ($id) {
            $query['category'] = $id;
        }
        $posts = Post::find()
                    ->where($query)
                    ->all();

        return $this->render('index', [
            'uploadModel' => $uploadModel,
            'postModel' => $postModel,
            'postData' => $posts,
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

