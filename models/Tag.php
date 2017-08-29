<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mj_tag".
 *
 * @property integer $id
 * @property string $name
 * @property string $creation_date
 *
 * @property MjPostTag[] $mjPostTags
 */
class Tag extends \yii\db\ActiveRecord {
    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'mj_tag';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['name'], 'required'],
            [['creation_date'], 'safe'],
            [['name'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'creation_date' => 'Creation Date',
        ];
    }
}

