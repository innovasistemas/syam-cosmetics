<?php namespace App\Controllers;

use App\Models\SettingModel;
use App\Models\CountryModel;
use App\Models\ParameterModel;


use CodeIgniter\HTTP\IncomingRequest;

class Setting extends BaseController
{
	protected $helpers = ['url', 'form'];
	protected $format = 'json';
	private $objModels;
	public $request;


	public function __construct()
	{
		$this->objModels = new class{};
		$this->objModels->modelDepartment = new SettingModel();
		$this->objModels->modelCountry = new CountryModel();
		$this->objModels->modelParameter = new ParameterModel();

		$this->request = service('request');
	}


	public function __desctruct()
	{

	}


	public function index()
	{

	}


	public function listRecords()
	{
		if(!empty($this->request->getGet('dataSend'))){
			$arrayData = json_decode($this->request->getGet('dataSend'), TRUE);
			$strCodeCountry = $this->objModels->modelParameter
									->getTableName($arrayData['db']['table']);
			$model = 'model' . ucfirst($strCodeCountry);

			if(empty($arrayData['fields']['id'])){
				$arrayResult = $this->objModels->$model
												->getWhere(['active' => 1])
												->getResult();
			}else{
				$arrayResult = $this->objModels->$model
								->getWhere([
											'id' => $arrayData['fields']['id'],
											'active' => 1
										])
								->getResult();
			}

			$arrayResponse = [
                "content" => $arrayResult, 
                "error" => 0
            ];
        }else{
            $arrayResult = [
                "content" => "Datos incompletos para realizar esta solicitud", 
                "error" => 101
            ];
        }
        
        echo json_encode($arrayResponse);
	}

}
