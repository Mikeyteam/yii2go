<?php
namespace app\models;

use app\custom\behaviors\ExtraPropsBehaviour;
use Yii;

/**
 * This is the model class for table "post".
 *
 * @property integer $id
 * @property integer $author_id
 * @property string $text
 * @property string $date
 */
class Post extends \yii\db\ActiveRecord
{

    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%post}}';
    }

    /** @inheritdoc */
    public function behaviors()
    {
        return [
            ExtraPropsBehaviour::className()
        ];
    }

    /**
     * @return array the objects User.
     */
    public function getUser () {

        return $this->hasOne(User::className(),['id' => 'author_id']);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['text', 'date'], 'required'],
            [['text'], 'string'],
            [['date'], 'safe'],
        ];
    }



    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'text' => 'Text',
            'date' => 'Date',
        ];
    }
}
