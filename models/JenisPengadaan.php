<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jenis_pengadaan".
 *
 * @property string $kode_jenis_pengadaan
 * @property string $nama_jenis_pengadaan
 *
 * @property ArsipPengadaan[] $arsipPengadaans
 */
class JenisPengadaan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jenis_pengadaan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kode_jenis_pengadaan', 'nama_jenis_pengadaan'], 'required'],
            [['kode_jenis_pengadaan'], 'string', 'max' => 5],
            [['nama_jenis_pengadaan'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'kode_jenis_pengadaan' => 'Kode Jenis Pengadaan',
            'nama_jenis_pengadaan' => 'Nama Jenis Pengadaan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArsipPengadaans()
    {
        return $this->hasMany(ArsipPengadaan::className(), ['kode_jenis_pengadaan' => 'kode_jenis_pengadaan']);
    }
}
