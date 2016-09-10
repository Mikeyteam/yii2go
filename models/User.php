<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $name
 * @property string $last_name
 * @property string $login
 * @property string $password
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'last_name' => 'Last Name',
            'login' => 'Login',
            'password' => 'Password',

        ];
    }

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // login and password are both required
            [['name','login', 'last_name','password'], 'required'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
            // минимальная длинна строки 5 символов
            [ ['password'],'string','min'=>5],
        ];
    }

    /**
     * @return array the objects post.
     */
    public function getPosts ()
    {
        return $this->hasMany(Post::className(),['user_id' => 'id']);
    }


    /* Геттер для полного имени человека */
    public function getName() {
        return $this->name;
    }

    public function setPassword($password)
    {
        $this->password = sha1($password);
    }


    public function validatePassword($password)
    {
        return $this->password === sha1($password);
    }

    public static function findIdentity($id)
    {
        return self::findOne($id);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {

    }

    public function validateAuthKey($authKey)
    {

    }

    public static function findIdentityByAccessToken($token, $type = null)
    {

    }
}
