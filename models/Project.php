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
 * @property integer $id_status
 *
 * @property CommentBaru[] $commentBarus
 * @property Comment[] $comments
 * @property Plan[] $plans
 * @property Reality[] $realities
 * @property ProjectStatus $idProjectStatus
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
            [['tahun', 'nama', 'klien', 'kode', 'id_status'], 'required'],
            [['tahun', 'id_status'], 'integer'],
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
            'tahun' => 'Year',
            'nama' => 'Project Name',
            'klien' => 'Client Name',
            'kode' => 'Project Code',
            'id_status' => 'ID Status',
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
     * @return \yii\db\ActiveQuery
     */
    public function getIdProjectStatus()
    {
        return $this->hasOne(ProjectStatus::className(), ['id' => 'id_status']);
    }
	
	/**
     * Creates data provider instance with search query applied
     * @return ActiveDataProvider
     */
     public function search()
	 {
	 	$filter_key = strtolower(Yii::$app->session['filter_key']);
		$filter_year = Yii::$app->session['filter_year'];
		
	 	$query = self::find();
		
		// apply filter to query
		$query	->andFilterWhere(['tahun' => $filter_year])
				->andFilterWhere(['or', 
						['like', 'LOWER(nama)', $filter_key], 
						['like', 'LOWER(kode)', $filter_key], 
						['like', 'LOWER(klien)', $filter_key],
				]);
		
		$dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
		
		return $dataProvider;
	 }
}
