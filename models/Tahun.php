<?php
/**
 * @author Punto Aji <punto@jogjamedia.co.id>
 * @copyright Copyright (c) 2015 JMC IT Consultant
 * @link http://www.jogjamedia.co.id
 */
 
namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "tahun".
 *
 * @property integer $id
 * @property integer $nama
 */
class Tahun extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tahun';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'nama'], 'required'],
            [['id', 'nama'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
        ];
    }
}
