<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "disposisi".
 *
 * @property int $id
 * @property int $tgl_terima
 * @property int $tujuan_id
 * @property string $ringkas_dispo
 * @property string $keterangan
 * @property int $id_keamanan
 * @property int $id_kecepatan
 *
 * @property Keamanan $keamanan
 * @property Kecepatan $kecepatan
 * @property User $tujuan
 */
class Disposisi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'disposisi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tgl_terima', 'tujuan_id', 'ringkas_dispo', 'keterangan', 'id_keamanan', 'id_kecepatan'], 'required'],
            [['tgl_terima', 'tujuan_id', 'id_keamanan', 'id_kecepatan'], 'integer'],
            [['ringkas_dispo'], 'string', 'max' => 50],
            [['keterangan'], 'string', 'max' => 100],
            [['id_keamanan'], 'exist', 'skipOnError' => true, 'targetClass' => Keamanan::className(), 'targetAttribute' => ['id_keamanan' => 'id']],
            [['id_kecepatan'], 'exist', 'skipOnError' => true, 'targetClass' => Kecepatan::className(), 'targetAttribute' => ['id_kecepatan' => 'id']],
            [['tujuan_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['tujuan_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tgl_terima' => 'Tgl Terima',
            'tujuan_id' => 'Tujuan ID',
            'ringkas_dispo' => 'Ringkas Dispo',
            'keterangan' => 'Keterangan',
            'id_keamanan' => 'Id Keamanan',
            'id_kecepatan' => 'Id Kecepatan',
        ];
    }

    /**
     * Gets query for [[Keamanan]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getKeamanan()
    {
        return $this->hasOne(Keamanan::className(), ['id' => 'id_keamanan']);
    }

    /**
     * Gets query for [[Kecepatan]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getKecepatan()
    {
        return $this->hasOne(Kecepatan::className(), ['id' => 'id_kecepatan']);
    }

    /**
     * Gets query for [[Tujuan]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTujuan()
    {
        return $this->hasOne(User::className(), ['id' => 'tujuan_id']);
    }
}
