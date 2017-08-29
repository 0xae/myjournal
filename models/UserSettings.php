<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mj_user_settings".
 *
 * @property integer $id
 * @property integer $user
 *
 * @property MjUser $user0
 */
class UserSettings extends \yii\db\ActiveRecord {
    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'mj_user_settings';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['user'], 'required'],
            [['user'], 'integer'],
            [['user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'user' => 'User',
        ];
    }
}
