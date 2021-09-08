<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "arsip_sdm".
 *
 * @property string $nip
 * @property string $kode_kategori
 * @property string $no_dokumen
 * @property string $nama_dokumen
 * @property string $keterangan
 * @property string $file
 *
 * @property Pegawai $nip0
 * @property KategoriDokumen $kodeKategori
 */
class ArsipSdm extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

    public static function tableName()
    {
        return 'arsip_sdm';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nip', 'kode_kategori', 'no_dokumen', 'nama_dokumen'], 'required'],
            [['keterangan', 'file'], 'string'],
            [['nip'], 'string', 'max' => 9],
            [['kode_kategori'], 'string', 'max' => 5],
            [['no_dokumen'], 'string', 'max' => 35],
            [['no_dokumen'], 'unique'],
            [['nama_dokumen'], 'string', 'max' => 25],
            [['nip'], 'exist', 'skipOnError' => true, 'targetClass' => Pegawai::className(), 'targetAttribute' => ['nip' => 'nip']],
            [['kode_kategori'], 'exist', 'skipOnError' => true, 'targetClass' => KategoriDokumen::className(), 'targetAttribute' => ['kode_kategori' => 'kode_kategori']],
            [['file', 'jumlah'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'nip' => Yii::t('app', 'NIP'),
            'namaPegawai' => Yii::t('app', 'Nama'),
            'kode_kategori' => 'Kategori',
            'namaKategori' => 'Kategori',
            'no_dokumen' => Yii::t('app', 'Nomor Dokumen'),
            'nama_dokumen' => 'Nama Dokumen',
            'keterangan' => 'Keterangan',
            'file' => 'File',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNip0()
    {
        return $this->hasOne(Pegawai::className(), ['nip' => 'nip']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKodeKategori()
    {
        return $this->hasOne(KategoriDokumen::className(), ['kode_kategori' => 'kode_kategori']);
    }

    public function getNamaPegawai()
    {
        return $this->nip0->nama;
    }

    public function getNamaKategori()
    {
        return $this->kodeKategori->nama_kategori;
    }
}
