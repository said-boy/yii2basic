<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mahasiswa".
 *
 * @property string $nim
 * @property string $nama
 * @property string $tgl_lahir
 * @property string $jenis_kelamin
 * @property string $hobi
 */
class Mahasiswa extends \yii\db\ActiveRecord
{

    public $hobbies = [];

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mahasiswa';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nim', 'nama', 'tgl_lahir', 'jenis_kelamin', 'hobi'], 'required'],
            [['tgl_lahir'], 'safe'],
            [['jenis_kelamin', 'hobi'], 'string'],
            [['nim'], 'string', 'max' => 10],
            [['nama'], 'string', 'max' => 50],
            [['hobbies'], 'safe'],
            [['nim'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'nim' => 'Nim',
            'nama' => 'Nama',
            'tgl_lahir' => 'Tgl Lahir',
            'jenis_kelamin' => 'Jenis Kelamin',
            'hobi' => 'Hobi',
            'hobbies' => 'Hobbies',
        ];
    }
    
    /**
     * Before save event handler to convert array to comma-separated string
     */
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            // Convert array to string for `hobi`
            $this->hobi = is_array($this->hobbies) ? implode(',', $this->hobbies) : $this->hobi;
            return true;
        }
        return false;
    }

    /**
     * After find event handler to convert comma-separated string to array
     */
    public function afterFind()
    {
        parent::afterFind();
        // Convert string to array for `hobbies`
        $this->hobbies = !empty($this->hobi) ? explode(',', $this->hobi) : [];
    }
}
