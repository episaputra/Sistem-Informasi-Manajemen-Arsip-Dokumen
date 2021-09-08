<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kategori_dokumen".
 *
 * @property string $kode_kategori
 * @property string $nama_kategori
 *
 * @property ArsipSdm[] $arsipSdms
 */
class KategoriDokumen extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kategori_dokumen';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kode_kategori', 'nama_kategori'], 'required'],
            [['kode_kategori'], 'string', 'max' => 5],
            [['kode_kategori'], 'unique','targetClass'=>'\app\models\KategoriDokumen','message'=>Yii::t('app','Kode Kategori telah dipergunakan.')],
            [['nama_kategori'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'kode_kategori' => 'Kode Kategori',
            'nama_kategori' => Yii::t('app', 'Nama Kategori'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArsipSdms()
    {
        return $this->hasMany(ArsipSdm::className(), ['kode_kategori' => 'kode_kategori']);
    }
}
