<?php
namespace app\models;

use Yii;

/**
 * Login form
 */
class Uploader {
    public static function upload($file) {
        $uploads = Yii::getAlias("@webroot");
        $n1 = "{$uploads}/media";
        $ext = end((explode(".", $file)));
        $randomName = Yii::$app->security->generateRandomString().".{$ext}";
        $filename = $n1.'/'.$randomName;
        $file->saveAs($filename, false);
        return $filename;
    }
}

