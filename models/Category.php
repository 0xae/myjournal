<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mj_category".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $creation_date
 *
 * @property MjPost[] $mjPosts
 */
class Category extends \yii\db\ActiveRecord {
    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'mj_category';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['name'], 'required'],
            [['creation_date'], 'safe'],
            [['name', 'description'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'creation_date' => 'Creation Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPosts() {
        return $this->hasMany(Post::className(), ['category' => 'id'])
                    ->all();
    }

    public function getCategoriesOf($userId) {
        $sql = '
            SELECT C.id,C.name,COUNT(P.ID) as total_post FROM MJ_CATEGORY C
            JOIN MJ_POST P ON P.CATEGORY = C.ID AND P.AUTHOR = :userId
            GROUP BY C.ID
        ';

        return Yii::$app->db->createCommand($sql)
                ->bindValue(':userId', $userId)
                ->queryAll();
    }
}
