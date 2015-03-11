<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $nama
 * @property string $email
 * @property integer $id_grup
 * @property integer $id_divisi
 * @property integer $id_job
 * @property string $last_login
 *
 * @property CommentBaru[] $commentBarus
 * @property Comment[] $comments
 * @property Plan[] $plans
 * @property Reality[] $realities
 * @property Divisi $idDivisi
 * @property UserGrup $idGrup
 * @property Job $idJob
 * @property Notes[] $notes
 */
class User extends ActiveRecord implements IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password', 'nama', 'id_grup'], 'required'],
            [['id_grup', 'id_divisi', 'id_job'], 'integer'],
            [['last_login'], 'safe'],
            [['username', 'email'], 'string', 'max' => 50],
            [['password'], 'string', 'max' => 40],
            [['nama'], 'string', 'max' => 100],
            [['username'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'nama' => 'Nama',
            'email' => 'Email',
            'id_grup' => 'Id Grup',
            'id_divisi' => 'Id Divisi',
            'id_job' => 'Id Job',
            'last_login' => 'Last Login',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCommentBarus()
    {
        return $this->hasMany(CommentBaru::className(), ['id_user' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['id_user' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlans()
    {
        return $this->hasMany(Plan::className(), ['id_user' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRealities()
    {
        return $this->hasMany(Reality::className(), ['id_user' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdDivisi()
    {
        return $this->hasOne(Divisi::className(), ['id' => 'id_divisi']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdGrup()
    {
        return $this->hasOne(UserGrup::className(), ['id' => 'id_grup']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdJob()
    {
        return $this->hasOne(Job::className(), ['id' => 'id_job']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNotes()
    {
        return $this->hasMany(Notes::className(), ['id_user' => 'id']);
    }
	
	
	/***************************************************************************************
	 * Implement IdentityInterface
	 **************************************************************************************/
	
	/**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return self::findOne([$id]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return null;
    }

    /**
     * Finds user by username
     *
     * @param  string      $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return self::findOne(['username' => $username]);
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return null;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return null;
    }

    /**
     * Validates password
     *
     * @param  string  $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === md5($password);
    }
}
