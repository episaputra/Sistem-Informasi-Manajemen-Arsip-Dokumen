<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "arsip_pengadaan".
 *
 * @property string $nomor_kontrak
 * @property string $kode_jenis_pengadaan
 * @property string $judul_kontrak
 * @property string $kode_perusahaan
 * @property string $nilai_RAB
 * @property string $harga_nego
 * @property string $tanggal_kontrak
 *
 * @property JenisPengadaan $kodeJenisPengadaan
 * @property Perusahaan $kodePerusahaan
 */
class ArsipPengadaan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'arsip_pengadaan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nomor_kontrak', 'kode_jenis_pengadaan', 'judul_kontrak', 'kode_perusahaan', 'nilai_RAB', 'harga_nego', 'tanggal_kontrak'], 'required'],
            [['nilai_RAB', 'harga_nego'], 'number'],
            [['tanggal_kontrak'], 'safe'],
            [['nomor_kontrak'], 'string', 'max' => 20],
            [['kode_jenis_pengadaan', 'kode_perusahaan'], 'string', 'max' => 5],
            [['judul_kontrak'], 'string', 'max' => 100],
            [['kode_jenis_pengadaan'], 'exist', 'skipOnError' => true, 'targetClass' => JenisPengadaan::className(), 'targetAttribute' => ['kode_jenis_pengadaan' => 'kode_jenis_pengadaan']],
            [['kode_perusahaan'], 'exist', 'skipOnError' => true, 'targetClass' => Perusahaan::className(), 'targetAttribute' => ['kode_perusahaan' => 'kode_perusahaan']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'nomor_kontrak' => 'Nomor Kontrak',
            'kode_jenis_pengadaan' => 'Kode Jenis Pengadaan',
            'judul_kontrak' => 'Judul Kontrak',
            'kode_perusahaan' => 'Kode Perusahaan',
            'nilai_RAB' => 'Nilai  Rab',
            'harga_nego' => 'Harga Nego',
            'tanggal_kontrak' => 'Tanggal Kontrak',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKodeJenisPengadaan()
    {
        return $this->hasOne(JenisPengadaan::className(), ['kode_jenis_pengadaan' => 'kode_jenis_pengadaan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKodePerusahaan()
    {
        return $this->hasOne(Perusahaan::className(), ['kode_perusahaan' => 'kode_perusahaan']);
    }
}
