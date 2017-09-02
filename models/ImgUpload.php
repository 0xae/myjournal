<?php
namespace app\models;

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
    
    public function upload() {
        if ($this->validate()) {
            $newName = Yii::$app->security->generateRandomString().".{$this->file->extension}";
            $this->file->saveAs('media/' . $newName);
            $this->newName = $newName;
            return true;
        } else {
            return false;
        }
    }
}
