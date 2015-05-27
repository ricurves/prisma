<?php
/**
 * @author Punto Aji <punto@jogjamedia.co.id>
 * @copyright Copyright (c) 2015 JMC IT Consultant
 * @link http://www.jogjamedia.co.id
 */

namespace app\models;
use yii\base\Object;
use yii\web\IdentityInterface;

class Identity extends Object implements IdentityInterface
{
    public $id;
    public $username;
    public $password;
	public $nama;
	public $job;
	public $jobColor;
	public $divisi;
	public $foto;

    private static $_user;

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        $data = User::findOne($id);
		
		//set default profile picture
		$data->foto = $data->foto ? $data->foto : 'default.png';
						
        self::$_user = [
			'id' => $data->id,
			'username' => $data->username,
			'password' => $data->password,
			'nama' => $data->nama,
			'job' => $data->idJob->nama,
			'jobColor' => $data->idJob->warna,
			'divisi' => $data->idDivisi->nama,
			'foto' => $data->foto,
		];
		
		return new static(self::$_user);
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
    	$data = User::findOne(['username' => $username]);
		
        self::$_user = [
			'id' => $data->id,
			'username' => $data->username,
			'password' => $data->password,
		];
		
		return new static(self::$_user);
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
