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
        $categories = Category::getCategoriesOf($user->id);
        $query = [
            'author' => $user->id,
            'parent' => NULL
        ];
        $mainCat = null;

        if ($id) {
            $query['category'] = (int)$id;
            foreach ($categories as $c) {
                if ($c['id'] == $id) {
                    $mainCat = $c;
                    break;
                }
            }
        }

        $posts = Post::find()
                    ->where($query)
                    ->orderBy('creation_date desc')
                    ->all();


        return $this->render('index', [
            'uploadModel' => $uploadModel,
            'postModel' => $postModel,
            'postData' => $posts,
            'categoryData' => $categories,
            'categoryFilter' => $mainCat
        ]);
    }

    public function actionTest() {
        $model = new ImgUpload;
        return $this->render('test', [
            'model' => $model
        ]);
    }
}

