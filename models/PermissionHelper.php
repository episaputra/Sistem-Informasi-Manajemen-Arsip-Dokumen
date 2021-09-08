<?php

namespace app\models;

use Yii;
use app\models\User;

class PermissionHelper{

	function requireSuperAdmin(){
		$level = Yii::$app->user->identity->user_level;
		if($level=='Super Admin'){
			return true;
		} else {
			return false;
		}
	}

	function requireAdmin(){
		$level = Yii::$app->user->identity->user_level;
		if($level=='Admin'){
			return true;
		} else {
			return false;
		}
	}

	function requireAdminSDM(){
		if(Yii::$app->user->identity->user_level=='Admin SDM'){
			return true;
		} else {
			return false;
		}
	}

	function requirePegawaiSDM(){
		if(Yii::$app->user->identity->user_level=='Pegawai SDM'){
			return true;
		} else {
			return false;
		}
	}

	function requireAdminPengadaan(){
		if(Yii::$app->user->identity->user_level=='Admin Pengadaan'){
			return true;
		} else {
			return false;
		}
	}

	function requirePegawaiPengadaan(){
		if(Yii::$app->user->identity->user_level=='Pegawai Pengadaan'){
			return true;
		} else {
			return false;
		}
	}

	function requireSupervisorPengadaan(){
		if(Yii::$app->user->identity->user_level=='Supervisor Pengadaan'){
			return true;
		} else {
			return false;
		}
	}

	function requireAdminSekum(){
		if(Yii::$app->user->identity->user_level=='Admin Sekum'){
			return true;
		} else {
			return false;
		}
	}

	function requireSupervisorSdmUmum(){
		if(Yii::$app->user->identity->user_level=='Supervisor SDM dan Umum'){
			return true;
		} else {
			return false;
		}
	}

	function requireAdminandAdminSDM(){
		$level = Yii::$app->user->identity->user_level;
		if($level == 'Admin' AND $level == 'Admin SDM'){
			return true;
		} else {
			return false;
		}
	}
}