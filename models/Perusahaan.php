<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "perusahaan".
 *
 * @property string $kode_perusahaan
 * @property string $nama_perusahaan
 * @property string $alamat_perusahaan
 *
 * @property ArsipPengadaan[] $arsipPengadaans
 */
class Perusahaan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'perusahaan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kode_perusahaan', 'nama_perusahaan', 'alamat_perusahaan'], 'required'],
            [['kode_perusahaan'], 'string', 'max' => 5],
            [['nama_perusahaan'], 'string', 'max' => 50],
            [['alamat_perusahaan'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'kode_perusahaan' => 'Kode Perusahaan',
            'nama_perusahaan' => 'Nama Perusahaan',
            'alamat_perusahaan' => 'Alamat Perusahaan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArsipPengadaans()
    {
        return $this->hasMany(ArsipPengadaan::className(), ['kode_perusahaan' => 'kode_perusahaan']);
    }
}
