<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jenis_barang".
 *
 * @property string $kode_jenis_barang
 * @property string $kode_barang
 * @property string $nama_jenis_barang
 *
 * @property Barang[] $barangs
 */
class JenisBarang extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jenis_barang';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kode_jenis_barang', 'kode_barang', 'nama_jenis_barang'], 'required'],
            [['kode_jenis_barang', 'kode_barang'], 'string', 'max' => 5],
            [['nama_jenis_barang'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'kode_jenis_barang' => 'Kode Jenis Barang',
            'kode_barang' => 'Kode Barang',
            'nama_jenis_barang' => 'Nama Jenis Barang',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBarangs()
    {
        return $this->hasMany(Barang::className(), ['kode_jenis_barang' => 'kode_jenis_barang']);
    }
}
