<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property string $verification_token
 *
 */
class Users extends \yii\db\ActiveRecord
{
    public $new_password;
    public $old_password;
    public $repeat_password;

    const SCENARIO_WITH_PASSWORD = 'password';
    const SCENARIO_CHANGE_PROFILE = 'profile';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'name', 'auth_key', 'password_hash', 'email', 'created_at', 'updated_at'], 'required'],
            [['username', 'name', 'email'], 'required', 'on' => static::SCENARIO_CHANGE_PROFILE],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['username', 'password_hash', 'password_reset_token', 'email', 'verification_token'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique'],
            [['old_password', 'new_password', 'repeat_password'], 'string', 'min' => 6, 'on' => static::SCENARIO_WITH_PASSWORD],
            [['repeat_password'], 'compare', 'compareAttribute' => 'new_password', 'on' => static::SCENARIO_WITH_PASSWORD],
            [['new_password'], 'required', 'on' => static::SCENARIO_WITH_PASSWORD],
            [['old_password', 'repeat_password'], 'required', 'when' => function ($model) {
                return (!empty($model->new_password));
            }, 'whenClient' => "function (attribute, value) {
                return ($('#users-new_password').val().length>0);
            }", 'on' => static::SCENARIO_WITH_PASSWORD],
            ['username', 'filter', 'filter' => 'trim', 'on' => static::SCENARIO_CHANGE_PROFILE],
            [['username'], 'unique', 'on' => static::SCENARIO_CHANGE_PROFILE],
            [['email'], 'unique', 'on' => static::SCENARIO_CHANGE_PROFILE],
            [['email'], 'email', 'on' => static::SCENARIO_CHANGE_PROFILE],
        ];
    }

    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios['password'] = ['old_password', 'new_password', 'repeat_password'];
        $scenarios['profile'] = ['username', 'name', 'email'];
        return $scenarios;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    public function isPasswordValid($attribute, $old_password){
        $isValid = $this->validatePassword($old_password);
        if(!$isValid){
            $this->addError($attribute, 'Kata sandi lama tidak sesuai');
            return false;
        }else{
            return true;
        }
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'verification_token' => 'Verification Token',
        ];
    }

    public static function getName($id){
        $name = self::find()->select(['name'])->where(['id' => $id])->scalar();
        return $name == '' ? '-' : $name;
    }
}
