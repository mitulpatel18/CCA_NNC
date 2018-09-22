<?php
namespace B\MSCDN;

class Controller extends \App\Http\Controllers\Controller
{
	public function __construct(){
     

        //$this->middleware('groupname')->except(['method_name']);
    }
	public function index(){




			$data=[

			

			];
		return view('MSCDN.V.panel_data')->with('data',$data);
		
		
	}


	public function indexData(){




			$data=[

			

			];
		return view('MSCDN.V.Object.MasterDetails')->with('data',$data);
		
		
	}

	public function searchTask(\Illuminate\Http\Request $r){

		$input=$r->all();
		//dd($r->all());

		if(array_key_exists('TypeOfSearch' ,$input)) {


			switch ($input['TypeOfSearch']) {
				case '0':


					\MS\Core\Helper\Comman::DB_flush();
					$m1=new \B\AMS\Model();
					$data=$m1->MS_all()->pluck('Name')->toArray();
					//dd();

					//$data=[];
					$status=200;
					$array=[
							'data'=>$data,
					 	//	'redirectData'=>action('\B\TMS\Controller@indexData'),
					 		
						];

					return response()->json($array, $status);
					break;

				case '1':
					\MS\Core\Helper\Comman::DB_flush();
					$m1=new \B\TMS\Model(6);
					$data=$m1->MS_all()->pluck('NameOfAction')->toArray();
					//dd();

					//$data=[];
					$status=200;
					$array=[
							'data'=>$data,
					 	//	'redirectData'=>action('\B\TMS\Controller@indexData'),
					 		
						];

					return response()->json($array, $status);
					break;

				case '2':
					\MS\Core\Helper\Comman::DB_flush();
					$m1=new \B\TMS\Model();
					$data=$m1->MS_all()->groupBy('NameOperatorState')->toArray();
					//dd();

					//$data=[];
					$status=200;
					$array=[
							'data'=>array_keys($data),
					 	//	'redirectData'=>action('\B\TMS\Controller@indexData'),
					 		
						];

					return response()->json($array, $status);
					break;
				
				default:
					# code...
					break;
			}


		}

				$status=422;
					$array=[
							'msg'=>["Invalid Input"],
					 	//	'redirectData'=>action('\B\TMS\Controller@indexData'),
					 		
						];

	
				return response()->json($array, $status);


	}
}