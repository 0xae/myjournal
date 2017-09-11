<?php
namespace app\models;
use Yii;
use yii\web\NotFoundHttpException;


/**
 * This is the model class for table "mj_post".
 *
 * @property integer $id
 * @property string $content
 * @property integer $author
 * @property integer $category
 * @property string $creation_date
 *
 * @property MjUser $author0
 * @property MjCategory $category0
 * @property MjPostTag[] $mjPostTags
 */
class Post extends \yii\db\ActiveRecord {
    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'mj_post';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['content', 'category'], 'required'],
            [['content'], 'string'],
            [['author', 'parent', 'category'], 'integer'],
            [['creation_date', 'location', 'lang'], 'safe'],
            [['author'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['author' => 'id']],
            [['category'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'content' => 'Content',
            'author' => 'Author',
            'category' => 'Category',
            'creation_date' => 'Creation Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor() {
        return $this->hasOne(User::className(), ['id' => 'author'])
                    ->one();
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory() {
        return $this->hasOne(Category::className(), ['id' => 'category'])
                    ->one();
    }

    public function getChildren() {
        return $this->hasMany(Post::className(), ['parent' => 'id'])
                    ->all();
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTags() {
        return [];
    }

    public static function findById($id) {
        if (($model = Post::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
