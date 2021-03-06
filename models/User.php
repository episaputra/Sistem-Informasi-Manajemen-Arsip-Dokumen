<?php
 
namespace app\models;
use Yii;
 
use yii\db\ActiveRecord;
 
class User extends ActiveRecord implements \yii\web\IdentityInterface
{
 
public static function tableName() { return 'user'; }
 
   /**
 * @inheritdoc
 */
  public function rules()
  {
        return [
            [['nama','username','password','user_level'], 'required'],
            [['user_level'], 'string'],
            [['username'], 'unique','targetClass'=>'\app\models\User','message'=>Yii::t('app','Username telah dipergunakan.')],
            [['username'], 'unique'],
            [['nama','username','password','password_reset_token'], 'string', 'max' => 250],            
        ];
  }
 
public static function findIdentity($id) {
    $user = self::find()
            ->where([
                "id" => $id
            ])
            ->one();
    if (!count($user)) {
        return null;
    }
    return new static($user);
}
 
/**
 * @inheritdoc
 */
public static function findIdentityByAccessToken($token, $userType = null) {
 
    $user = self::find()
            ->where(["accessToken" => $token])
            ->one();
    if (!count($user)) {
        return null;
    }
    return new static($user);
}
 
/**
 * Finds user by username
 *
 * @param  string      $username
 * @return static|null
 */
public static function findByUsername($username) {
    $user = self::find()
            ->where([
                "username" => $username
            ])
            ->one();
    if (!count($user)) {
        return null;
    }
    return new static($user);
}
 
public static function findByUser($username) {
    $user = self::find()
            ->where([
                "username" => $username
            ])
            ->one();
    if (!count($user)) {
        return null;
    }
    return $user;
}
 
/**
 * @inheritdoc
 */
public function getId() {
    return $this->id;
}
 
/**
 * @inheritdoc
 */
public function getAuthKey() {
    return $this->authKey;
}
 
/**
 * @inheritdoc
 */
public function validateAuthKey($authKey) {
    return $this->authKey === $authKey;
}
 
/**
 * Validates password
 *
 * @param  string  $password password to validate
 * @return boolean if password provided is valid for current user
 */
public function validatePassword($password) {
    return $this->password ===  md5($password);
}
 
}