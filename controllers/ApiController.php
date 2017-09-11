<?php
namespace app\controllers;
use Yii;
use app\models\ImgUpload;
use app\models\Uploader;
use app\models\Category;
use app\models\Post;
use yii\web\UploadedFile;
use yii\filters\AccessControl;
use yii\web\HttpException;
use yii\web\NotFoundHttpException;

class ApiController extends \yii\web\Controller {
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['upload', 'remove', 'post',
                                       'category_create', 'post_view',
                                       'post_stream', 'post_create'],
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

    public function actionCategory_create() {
        $name = trim($_GET['name']);
        $ret = Category::find()
            ->where(['name' => strtolower($name)])
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

    public function actionPost_create() {
        $user = Yii::$app->user->identity;
        $id = @$_POST['id'];
        $model = null;

        if ($id) {
            $model = Post::find()
                ->where(['id' => $id, 'author' => $user->id])
                ->one();
            if (!$model) {
                throw new HttpException(400, "Bad post update request");
            }

            $model->content = $_POST['content'];
        } else {
            $model = new Post;
            $model->creation_date = date('Y-m-d H:i:s');
            $model->author = $user->id;
            $model->content = $_POST['content'];
            $model->category = $_POST['category'];
            $parent = @$_POST['parent'];
            $model->parent = ($parent) ? $parent : null;
        }

        if ($model->save()) {
            return json_encode([
                'id' => $model->id,
                'action' => $id ? 'updated' : 'created'
            ]);
        } else {
            $resp = json_encode($model->getErrors());
            throw new HttpException(400, $resp);
        }
    }

    public function actionPost_view($id) {
        return $this->renderPartial('@app/views/plugins/post_view.php', [
            'post' => Post::findById($id)
        ]);
    }

    public function actionPost_stream($id) {
        return $this->renderPartial('@app/views/plugins/post.php', [
            'post' => Post::findById($id)
        ]);
    }

    public function actionCategory_view() {
    }
}

