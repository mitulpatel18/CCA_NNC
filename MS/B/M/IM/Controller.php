<?php
namespace B\IM;

class Controller extends \App\Http\Controllers\Controller
{
	public function __construct(){
     

        //$this->middleware('groupname')->except(['method_name']);
    }
	public function index(){




			$data=[

			

			];
		return view('IM.V.panel_data')->with('data',$data);
		
		
	}


	public function indexData(){




			$data=[

			

			];
		return view('IM.V.Object.MasterDetails')->with('data',$data);
		
		
	}

}