<?php

namespace app\models;

use yii\base\Model;

class Signup extends Model
{
    public $name;
    public $password;
    public $last_name;
    public $login;


    public function rules()
    {
        return [
            [['name','password','last_name','login'],'required'],
            ['login','unique','targetClass'=>'app\models\User'],
            ['password','string','min'=>2,'max'=>10]
        ];
    }

    public function signup()
    {
        $user = new User();
        $user->name = $this->name;
        $user->last_name = $this->last_name;
        $user->login = $this->login;
        $user->setPassword($this->password);
        return $user->save();
    }

}