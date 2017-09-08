<?php
namespace app\controllers;
use app\models\ImgUpload;
use app\models\Post;
use app\models\Category;
use yii\helpers\ArrayHelper;
use yii\filters\AccessControl;
use Yii;

class HomeController extends \yii\web\Controller {
    /*
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
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
    */

    public function actionIndex($id=false) {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['site/index']);
        } 

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
                    ->orderBy('creation_date desc')
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

