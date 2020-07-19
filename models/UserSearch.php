<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\User;
use app\models\Instansi;

/**
 * UserSearch represents the model behind the search form about `hscstudio\mimin\models\User`.
 */
class UserSearch extends User
{

	// public $instansi;
	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
            [['id'], 'integer'],
            [['nama_lengkap','nip','username','certificate'],'string'],
            [['status', 'username', 'password', 'auth_key', 'password_reset_token', 'account_activation_token', 'created_at', 'updated_at'], 'safe'],
        ];
	}

	/**
	 * @inheritdoc
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
		$query = User::find();
		$dataProvider = new ActiveDataProvider([
			'query' => $query,
		]);

		$this->load($params);

		if (!$this->validate()) {
			// uncomment the following line if you do not want to return any records when validation fails
			// $query->where('0=1');
			return $dataProvider;
		}

		// $query->joinWith('instansi');

		$query->andFilterWhere([
			'id' => $this->id,
			'nama_lengkap' => $this->nama_lengkap,
			'nip' => $this->nip,
			// 'jabatan' => $this->jabatan,
			'status' => $this->status,
			// 'instansi_id' => $this->instansi_id,
			'created_at' => $this->created_at,
			'updated_at' => $this->updated_at,
		]);
		
		$query->orFilterWhere(['like', 'username', $this->username])
			->orFilterWhere(['like', 'nip', $this->nip])
			->orFilterWhere(['like', 'nama_lengkap', $this->nama_lengkap])
			// ->andFilterWhere(['like', 'jabatan', $this->jabatan])
			// ->orFilterWhere(['like', 'instansi.nama_instansi', $this->instansi_id])
			->orFilterWhere(['like', 'status', $this->status]);

		return $dataProvider;
	}
}