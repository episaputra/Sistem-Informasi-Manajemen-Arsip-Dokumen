<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class UploadForm extends Model
{
    /**
     * @var UploadedFile
     */
    public $foto;
    public $filedokumen;

    public function rules()
    {
        return [
            [['foto'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
            [['filedokumen'], 'file', 'skipOnEmpty' => true, 'extensions' => 'pdf'],
        ];
    }
    
    public function upload()
    {
        if ($this->validate()) {
        	if($this->foto){
            	$this->foto->saveAs(Yii::getAlias('@app').'/foto/' . $this->foto->baseName . '.' . $this->foto->extension);
        	}
            
        	if($this->filedokumen){
            	$this->filedokumen->saveAs(Yii::getAlias('@app').'/dokumen/' . $this->filedokumen->baseName . '.' . $this->filedokumen->extension);
            }
            return true;
        } else {
            return false;
        }
    }
}

?>