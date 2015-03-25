<?php
/**
 * @author Punto Aji <punto@jogjamedia.co.id>
 * @copyright Copyright (c) 2015 JMC IT Consultant
 * @link http://www.jogjamedia.co.id
 */
 
namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\data\ActiveDataProvider;

/**
 * This is the model class for table "project".
 *
 * @property integer $id
 * @property integer $tahun
 * @property string $nama
 * @property string $klien
 * @property string $kode
 * @property integer $status
 *
 * @property CommentBaru[] $commentBarus
 * @property Comment[] $comments
 * @property Plan[] $plans
 * @property Reality[] $realities
 */
class Project extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'project';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tahun', 'nama', 'klien'], 'required'],
            [['tahun', 'status'], 'integer'],
            [['nama', 'klien'], 'string', 'max' => 100],
            [['kode'], 'string', 'max' => 20],
            [['kode'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tahun' => 'Tahun',
            'nama' => 'Nama',
            'klien' => 'Klien',
            'kode' => 'Kode',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCommentBarus()
    {
        return $this->hasMany(CommentBaru::className(), ['id_project' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['id_project' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlans()
    {
        return $this->hasMany(Plan::className(), ['id_project' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRealities()
    {
        return $this->hasMany(Reality::className(), ['id_project' => 'id']);
    }
	
	/**
     * Creates data provider instance with search query applied
     * @return ActiveDataProvider
     */
     public function search()
	 {
	 	$query = self::find();
		
		$dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
		
		return $dataProvider;
	 }
}
