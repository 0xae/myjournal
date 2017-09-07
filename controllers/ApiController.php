<?php
namespace app\controllers;
use Yii;
use app\models\ImgUpload;
use app\models\Uploader;
use app\models\Category;
use app\models\Post;
use yii\web\UploadedFile;
use yii\filters\AccessControl;
use \yii\web\HttpException;

class ApiController extends \yii\web\Controller {
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['upload', 'remove', 'post',
                                      'category'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

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

        throw new HttpException(400, 'Bad request');
    }

    public function actionRemove() {
        $filename = $_GET['file'];
        return Uploader::remove($filename, 'posts');
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

    public function actionPost() {
        $model = new Post;
        $model->creation_date = date('Y-m-d H:i:s');
        $model->author = Yii::$app->user->identity->id;
        $model->content = $_POST['content'];
        $model->category = $_POST['category'];

        if ($model->save()) {
            return json_encode([
                'id' => $model->id
            ]);
        } else {
            return json_encode($model->getErrors());
        }
    }
}

