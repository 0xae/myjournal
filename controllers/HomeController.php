<?php
namespace app\controllers;
use Yii;
use yii\helpers\ArrayHelper;
use yii\filters\AccessControl;
use yii\web\NotFoundHttpException;
use app\models\ImgUpload;
use app\models\Post;
use app\models\Category;

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

        $user = Yii::$app->user->identity;

        $postModel = new Post;
        $uploadModel = new ImgUpload;
        $query = ['author' => $user->id];
        if ($id) {
            $query['category'] = (int)$id;
        }

        $posts = Post::find()
                    ->where($query)
                    ->orderBy('creation_date desc')
                    ->all();

        $categories = Category::getCategoriesOf($user->id);

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

