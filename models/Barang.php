<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "barang".
 *
 * @property string $kode_barang
 * @property string $kode_jenis_barang
 * @property string $seri_barang
 * @property string $nama_barang
 * @property string $merk_barang
 * @property string $Satuan
 * @property string $lokasi_barang
 * @property string $tgl_barang
 *
 * @property JenisBarang $kodeJenisBarang
 */
class Barang extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'barang';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kode_barang', 'kode_jenis_barang', 'seri_barang', 'nama_barang', 'merk_barang', 'Satuan', 'lokasi_barang', 'tgl_barang'], 'required'],
            [['tgl_barang'], 'safe'],
            [['kode_barang', 'kode_jenis_barang'], 'string', 'max' => 5],
            [['seri_barang'], 'string', 'max' => 20],
            [['nama_barang', 'merk_barang', 'lokasi_barang'], 'string', 'max' => 30],
            [['Satuan'], 'string', 'max' => 10],
            [['kode_jenis_barang'], 'exist', 'skipOnError' => true, 'targetClass' => JenisBarang::className(), 'targetAttribute' => ['kode_jenis_barang' => 'kode_jenis_barang']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'kode_barang' => 'Kode Barang',
            'kode_jenis_barang' => 'Kode Jenis Barang',
            'seri_barang' => 'Seri Barang',
            'nama_barang' => 'Nama Barang',
            'merk_barang' => 'Merk Barang',
            'Satuan' => 'Satuan',
            'lokasi_barang' => 'Lokasi Barang',
            'tgl_barang' => 'Tgl Barang',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKodeJenisBarang()
    {
        return $this->hasOne(JenisBarang::className(), ['kode_jenis_barang' => 'kode_jenis_barang']);
    }
}
