<?php
namespace B\TMS;

class Logics{
	



	public static function getHireAgencyCode($code){


		

		$model=new \B\AMS\Model (0);

		//dd($model->getHireAgencyCodeFromId($code));

		return $model->getHireAgencyCodeFromId($code);


	}


	public static function getTypeOfAction($code){


		$model=new \B\TMS\Model (0);
		\MS\Core\Helper\Comman::DB_flush();


		//dd($model->getTypeOfActionFromId($code));



		return $model->getTypeOfActionFromId($code);
	}


	public static function  getCurrentStatus($code){


		
		\MS\Core\Helper\Comman::DB_flush();
		$model=new Model (7);

		//dd($model->getHireAgencyCodeFromId($code));

		return $model->getCurrentStatuseFromId($code);


	}



	public static function setCurrentStatusfroEvent($TaskId,$ActionType){

		\MS\Core\Helper\Comman::DB_flush();
		$m2=new \B\TMS\Model ();
		$m2->MS_update(['CurrentStatus'=>$ActionType],$TaskId);		


	}
}