<?php
namespace app\models;

use Yii;
use yii\base\Model;

/**
 * Signup form
 */
class SignupForm extends Model {
    public $name;
    public $email;
    public $username;
    public $password;

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['name'], 'required'],
            ['name', 'string', 'min' => 3],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => 'app\models\AppUser', 'message' => 'This email is already taken'],

            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required'],
            ['username', 'string', 'max' => 255],
            ['username', 'unique', 'targetClass' => 'app\models\AppUser', 'message' => 'This username is already taken'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }

    /**
     * Signs user up.
     * @return User|null the saved model or null if saving fails
     */
    public function signup() {
        if (!$this->validate()) {
            return null;
        }

        $user = new AppUser();
        $user->name = $this->name;
        $user->email = $this->email;
        $user->username = $this->username;
        $user->setPassword($this->password);
        $user->setAuthKey();

        if ($user->save()) {
            return $user;
        } else {
            return null;
        }
    }
}

