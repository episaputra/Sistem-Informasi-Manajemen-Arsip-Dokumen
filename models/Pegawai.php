<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pegawai".
 *
 * @property string $nip
 * @property string $nama
 * @property string $foto
 *
 * @property ArsipSdm[] $arsipSdms
 */
class Pegawai extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pegawai';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nip', 'nama', 'foto'], 'required'],
            [['foto'], 'string'],
            [['nip'], 'string', 'max' => 9],
            [['nip'], 'unique'],
            [['nama'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'nip' => Yii::t('app', 'NIP'),
            'nama' => Yii::t('app', 'Nama Pegawai'),
            'foto' => 'Foto',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArsipSdms()
    {
        return $this->hasMany(ArsipSdm::className(), ['nip' => 'nip']);
    }

}
