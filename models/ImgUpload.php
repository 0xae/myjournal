<?php
namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class ImgUpload extends Model {
    public $file;
    public $newName;

    public function rules() {
        return [
            [['file'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, gif'],
        ];
    }
}
