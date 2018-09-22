<?php
namespace B\IM;


use \Illuminate\Http\Request;



use \MS\Core\Module\MasterModule\MasterBase;

class Base extends MasterBase{


///////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////
//Basic Details of Model Table,Column & Connection///////////
///////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////

public static $controller="\B\IM\Controller";
public static $model="\B\M\IM\Model";


public static $routes=[
						[
						'name'=>'IM.Data',
						'route'=>'/',
						'method'=>'index',
						'type'=>'get',
						],

						[
						'name'=>'IM.index.Data',
						'route'=>'/data',
						'method'=>'indexData',
						'type'=>'get',
						],
					];

public static $tableNo="0";



public static $connection ="MSDBC";

public static $allOnSameconnection=true;



////////////////////////////////////////////////////////////////////////
// Sub Module Start
////////////////////////////////////////////////////////////////////////
public static $table="Users";

public static $connection1 ="IM_Data";

public static $tableStatus1=false;

public static $field=[
['name'=>'UniqId','type'=>'string','input'=>'auto','value'=>'genUniqID','default'=>'genUniqID',],
['name'=>'Status','type'=>'boolean','input'=>'radio','value'=>'status','default'=>'status'],

];



////////////////////////////////////////////////////////////////////////
// Sub Module End
////////////////////////////////////////////////////////////////////////






////////////////////////////////////
/////////////////////////////////////
//MODEL CALLBACK FUNCTIONS///////////
///////////////////////////////////
/////////////////////////////////




public static function status(){
	return [
	'Hide','Publish'
	];
}







}