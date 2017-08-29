<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mj_user".
 *
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $username
 * @property string $password_hash
 * @property string $auth_key
 * @property string $token
 * @property string $type
 * @property integer $is_active
 * @property string $creation_date
 *
 * @property MjPost[] $mjPosts
 * @property MjUserSettings[] $mjUserSettings
 */
class AppUser extends \yii\db\ActiveRecord
               implements \yii\web\IdentityInterface {
    /**
     * @inheritdoc
     */
    public static function findIdentity($id) {
        return self::findOne(['id' => $id]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null) {
        return self::findOne(['auth_key' => $token]);
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username) {
        return self::findOne(['username' => $username]);
    }

    /**
     * @inheritdoc
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey() {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey) {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password) {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * @inheritdoc
     */
    public function setAuthKey() {
        $this->auth_key = yii::$app->security->generaterandomstring();
    }

    /**
     * @inheritdoc
     */
    public function setPassword($rawPassword) {
        $this->password_hash = Yii::$app->security->generatePasswordHash($rawPassword);
    }

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'mj_user';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['name', 'email', 'username', 'password_hash'], 'required'],
            [['password_hash', 'picture'], 'string'],
            [['is_active', 'settings_id'], 'integer'],
            [['creation_date'], 'safe'],
            [['name', 'type'], 'string', 'max' => 50],
            [['email', 'username'], 'string', 'max' => 200],
            [['auth_key', 'token'], 'string', 'max' => 250],
            [['email'], 'unique'],
            [['username'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'email' => 'Email',
            'username' => 'Username',
            'password_hash' => 'Password Hash',
            'auth_key' => 'Auth Key',
            'token' => 'Token',
            'type' => 'Type',
            'is_active' => 'Is Active',
            'creation_date' => 'Creation Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPosts() {
        return $this->hasMany(Post::className(), ['author' => 'id'])
                    ->all();
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSettings() {
        return $this->hasOne(UserSettings::className(), ['settings_id' => 'id'])
                    ->one();
    }
}
