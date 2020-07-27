<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "keamanan".
 *
 * @property int $id
 * @property string $keamanan
 *
 * @property Disposisi[] $disposisis
 * @property SuratMasuk[] $suratMasuks
 */
class Keamanan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'keamanan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['keamanan'], 'required'],
            [['keamanan'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'keamanan' => 'Keamanan',
        ];
    }

    /**
     * Gets query for [[Disposisis]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDisposisis()
    {
        return $this->hasMany(Disposisi::className(), ['id_keamanan' => 'id']);
    }

    /**
     * Gets query for [[SuratMasuks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSuratMasuks()
    {
        return $this->hasMany(SuratMasuk::className(), ['id_keamanan' => 'id']);
    }
}
