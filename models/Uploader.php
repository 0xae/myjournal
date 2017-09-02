<?php
namespace app\models;

use Yii;

/**
 * Login form
 */
class Uploader {
    public static function upload($file, $mod) {
        $uploads = Yii::getAlias("@webroot");
        $ext = end((explode(".", $file)));
        $id = Yii::$app->security->generateRandomString();
        $randomName = $id . ".{$ext}";

        $n1 = "{$uploads}/media/{$mod}";
        $filename = $n1.'/'.$randomName;
        $file->saveAs($filename, false);

        return [
            "path" => "media/{$mod}/" . $randomName,
            "name" => $randomName,
            "id" => $id
        ];
    }

    public static function remove($file, $mod) {
        $uploads = Yii::getAlias("@webroot");
        return unlink("{$uploads}/media/{$mod}/$file");
    }
}

