<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "surat_masuk".
 *
 * @property int $id
 * @property int $tujuan_dispo_id
 * @property int $no_surat
 * @property string $asal_surat
 * @property string $ringkas_surat
 * @property string $keterangan
 * @property int $tgl_surat
 * @property int $tgl_terima
 * @property string $file
 * @property string $path_file
 * @property int $id_keamanan
 * @property int $id_kecepatan
 *
 * @property Keamanan $keamanan
 * @property Kecepatan $kecepatan
 * @property User $tujuanDispo
 */
class SuratMasuk extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'surat_masuk';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tujuan_dispo_id', 'id_keamanan', 'id_kecepatan'], 'integer'],
            [['asal_surat', 'ringkas_surat', 'keterangan', 'tgl_surat', 'tgl_terima', 'id_keamanan', 'id_kecepatan'], 'required'],
            [['asal_surat', 'keterangan', 'tgl_surat', 'tgl_terima'], 'string', 'max' => 100],
            [['ringkas_surat', 'file','no_surat'], 'string', 'max' => 300],
            // [['path_file'], 'string', 'max' => 255],
            [['file'], 'file','skipOnEmpty' => true, 'extensions' => 'pdf'],
            [['id_keamanan'], 'exist', 'skipOnError' => true, 'targetClass' => Keamanan::className(), 'targetAttribute' => ['id_keamanan' => 'id']],
            [['id_kecepatan'], 'exist', 'skipOnError' => true, 'targetClass' => Kecepatan::className(), 'targetAttribute' => ['id_kecepatan' => 'id']],
            [['tujuan_dispo_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['tujuan_dispo_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tujuan_dispo_id' => 'Tujuan Dispo ID',
            'no_surat' => 'No Surat',
            'asal_surat' => 'Asal Surat',
            'ringkas_surat' => 'Ringkasan Surat',
            'keterangan' => 'Keterangan',
            'tgl_surat' => 'Tgl Surat',
            'tgl_terima' => 'Tgl Terima',
            'file' => 'File',
            'path_file' => 'Path File',
            'id_keamanan' => 'Keamanan',
            'id_kecepatan' => 'Kecepatan',
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
     * Gets query for [[TujuanDispo]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTujuanDispo()
    {
        return $this->hasOne(User::className(), ['id' => 'tujuan_dispo_id']);
    }
}
