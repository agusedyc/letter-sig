<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SuratMasuk;

/**
 * SuratMasukSearch represents the model behind the search form of `app\models\SuratMasuk`.
 */
class SuratMasukSearch extends SuratMasuk
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'tujuan_dispo_id', 'tgl_terima', 'id_keamanan', 'id_kecepatan'], 'integer'],
            [['asal_surat', 'ringkas_surat', 'keterangan', 'file', 'path_file'], 'safe'],
            [['no_surat'],'string']
            // 'tgl_surat',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = SuratMasuk::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'tujuan_dispo_id' => $this->tujuan_dispo_id,
            'no_surat' => $this->no_surat,
            'tgl_surat' => $this->tgl_surat,
            'tgl_terima' => $this->tgl_terima,
            'id_keamanan' => $this->id_keamanan,
            'id_kecepatan' => $this->id_kecepatan,
        ]);

        $query->andFilterWhere(['like', 'asal_surat', $this->asal_surat])
            ->andFilterWhere(['like', 'ringkas_surat', $this->ringkas_surat])
            ->andFilterWhere(['like', 'keterangan', $this->keterangan])
            ->andFilterWhere(['like', 'file', $this->file])
            ->andFilterWhere(['like', 'path_file', $this->path_file]);

        return $dataProvider;
    }
}