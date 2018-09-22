

<?php
$heading=[];
$headingKey=[];
//dd($data);

if(count($data['List-array'])>0){




  foreach ($data['List-array'] as $key => $value) {
    
    if(in_array($key, $data['List-display'])){

      $heading[]=ucfirst($value);
    $headingKey[]=$key;
    }else{

       $heading[]=ucfirst($value);

    }
    



  }


}else{

  $heading=$data['List-display'];
  $headingKey=$data['List-display'];

}





//dd($data);

?>
<div class="panel panel-default ">


  @isset($data['List-title'])
 
<div  class="panel-heading panel-info"><h5 class=""> <strong><i class="glyphicon glyphicon-chevron-right"></i> {{$data['List-title']}}



</strong>  
</h5></div>

@endisset
  <div class="panel-body">

    @if(array_key_exists('List-btn' ,$data))
  <div class="col-lg-12" style="margin-bottom: 5px;margin-left: -15px;">
    

     <div class="btn-group">
  
        
      @foreach ($data['List-btn'] as $btn)
      
      @if(array_key_exists('action',$btn))

      @if(array_key_exists('data',$btn))
      
      @if(array_key_exists('color',$btn))
      {{ Form::button("<i class='".$btn["icon"]." ' aria-hidden='true'></i> ".$btn["text"], ['class'=>'btn   ms-mod-btn '.$btn['color'].' ms-text-black' , 'ms-live-link'=>action($btn["action"],$btn['data']),] ) }}
      @else
      {{ Form::button("<i class='".$btn["icon"]."' aria-hidden='true'></i> ".$btn["text"], ['class'=>'btn btn-info   ms-mod-btn'.' ms-text-black' , 'ms-live-link'=>action($btn["action"],$btn['data']),] ) }}
      @endif


      @else
      
      @if(array_key_exists('color',$btn))
      {{ Form::button("<i class='".$btn["icon"]."' aria-hidden='true'></i> ".$btn["text"], ['class'=>'btn   ms-mod-btn '.$btn['color'].' ms-text-black' , 'ms-live-link'=>action($btn["action"]),] ) }}
      @else
      {{ Form::button("<i class='".$btn["icon"]."' aria-hidden='true'></i> ".$btn["text"], ['class'=>'btn btn-info   ms-mod-btn ms-text-black ' , 'ms-live-link'=>action($btn["action"]),] ) }}
      @endif


      @endif

      
      @else

      @if(array_key_exists('color',$btn))
      {{ Form::div("<i class='".$btn["icon"]."' aria-hidden='true'></i> ".$btn["text"], ['class'=>'btn  btn-frm-submit end-close '.$btn['color'].' ms-text-black'] ) }}
      @else
      {{ Form::div("<i class='".$btn["icon"]."' aria-hidden='true'></i> ".$btn["text"], ['class'=>'btn btn-success  btn-frm-submit ms-text-black'] ) }}
      @endif
      

      @endif


      @endforeach
      </div>


  </div>

@endif

</div>
      <table class="table table-responsive table-bordered table-hover text-capitalize">
  <tr>
     <th class="text-right">Shortcut<br><span class="label label-default">alt +  I + { 1,2,.. }</span></th>

  @foreach ($heading as $head)
    <th>{{ $head }}</th>
  @endforeach

      @if(array_key_exists('edit-btn',$data['List-action']) or (array_key_exists('delete-btn',$data['List-action']) or array_key_exists('LoginasAgency-btn',$data['List-action']))   )


 <th>Action</th>

    @endif
  </tr>
<tbody>

<?php


$sortType='sortByDesc';
$sortBy='updated_at';
  
if (array_key_exists('sortType',(array)  $data['List-extraData'])) {
  

    switch ($data['List-extraData']['sortType']) {
  case 'l2o':
    $sortType='sortBy';
    break;
  
  default:
    # code...
    break;
}


}

if (array_key_exists('sortBy',(array) $data['List-extraData'])) {

  $sortBy=$data['List-extraData']['sortBy'];
}

//dd(  (array) $data['List-extraData']);


 ?>

  @foreach ($data['List-Paginate']->$sortType( $sortBy) as $object)


    <?php 


  $trColor='';
  $boldtext='';
//dd(session()->all());

  //if(session()->has('user.SuperAdmin'))

if(session()->has('user.SuperAdmin')){

//dd(session('user.AgencyAdmin'));
if(session('user.SuperAdmin') && !(session('user.AgencyAdmin')!=null || session('user.AgencyAdmin')!=0) ){

  if($object->ReadStatus!=null){

    if($object->ReadStatus==0){

        $trColor='info';


        if($object->ReadUserCode!=null){

          $object->ReadUserCode=json_decode($object->ReadUserCode,true,3);

       // dd($object->ReadUserCode);

          if(!in_array(session('user.userData.UniqId'), $object->ReadUserCode))$boldtext='ms-text-bold';


        }

    }




  

  }


}


}





   ?>



   @if(array_key_exists('view-btn',$data['List-action']))
  

  @if($loop->iteration < 10)


  <tr class="ms-mod-btn {{$trColor}} {{$boldtext}}" ms-live-link="{{ route($data['List-action']['view-btn']['method'],\MS\Core\Helper\Comman::en4url($object->$data['List-action']['view-btn']['key'])) }}"      ms-shortcut="i+{{$loop->iteration }}" > 
  
    @elseif($loop->iteration == 10)

  <tr class="ms-mod-btn {{$trColor}} {{$boldtext}}" ms-live-link="{{ route($data['List-action']['view-btn']['method'],\MS\Core\Helper\Comman::en4url($object->$data['List-action']['view-btn']['key'])) }}"      ms-shortcut="i+0" > 
  

    @else
  <tr class="ms-mod-btn {{$trColor}} {{$boldtext}} " ms-live-link="{{ route($data['List-action']['view-btn']['method'],\MS\Core\Helper\Comman::en4url($object->$data['List-action']['view-btn']['key'])) }}"     > 

    @endif
   @else
   </tr>

  @endif


 <td class="text-right">{{$loop->iteration}}</td>
 
    @foreach($headingKey as $key)

     <td>

      @if((string)$object->$key ===  '0')


      @if($key == "CurrentStatus")


          @if(in_array($key, $data['List-dynamic-column']))




          <?php

          $class="\\".$data['Module-Namespace']."\\Logics";
          
          $func="get".$key;

          ?>

          {{ $class::$func($object->$key) }}
          @else

          {{ $object->$key }} 
          @endif





      @else

       <i class="fa fa-times text-danger"></i>
      @endif

     
      @elseif((string )$object->$key === '1')


      <i class="fa fa-check text-success"></i>


      @else



   @if(count($data['List-dynamic-column']) > 0)


          
          @if(in_array($key, $data['List-dynamic-column']))




            <?php


  


            $class="\\".$data['Module-Namespace']."\\Logics";

            $func="get".$key;
          //  dd($func);

            ?>

            {{ $class::$func($object->$key) }}
          
          @else

            
            {{ $object->$key }} 
          @endif


       @else


        {{ $object->$key }} 
       @endif


      @endif

      </td>

        
    @endforeach


    @if(array_key_exists('edit-btn',$data['List-action']) or (array_key_exists('delete-btn',$data['List-action']) or array_key_exists('LoginasAgency-btn',$data['List-action']))   )

    <td>

        <?php  $icon='fa fa-file-text-o';
               $vName='';


         ?>

      <div class="btn-group btn-group-xs " role="group" aria-label="...">
        @if(array_key_exists('edit-btn',$data['List-action']))

          @if(array_key_exists('access',$data['List-action']['edit-btn']))

    
              @if(\B\Users\Logics::getUserCode(session('user.userData.UniqId'))  >  $data['List-action']['edit-btn']['access'] )

               <button type="button" class="btn  ms-text-black btn-success ms-mod-btn" ms-live-link="{{route($data['List-action']['edit-btn']['method'],\MS\Core\Helper\Comman::en4url($object->$data['List-action']['edit-btn']['key']))}}"><i class="fa fa-pencil "></i></button>

              @else

              

                  @if($object->$data['List-action']['edit-btn']['key'] === session('user.userData.UniqId'))
                    <button type="button" class="btn  ms-text-black btn-success ms-mod-btn" ms-live-link="{{route($data['List-action']['edit-btn']['method'],\MS\Core\Helper\Comman::en4url($object->$data['List-action']['edit-btn']['key']))}}"><i class="fa fa-pencil "></i></button>
                  @endif
              
              @endif

          @else
               <button type="button" class="btn  ms-text-black btn-success ms-mod-btn" ms-live-link="{{route($data['List-action']['edit-btn']['method'],\MS\Core\Helper\Comman::en4url($object->$data['List-action']['edit-btn']['key']))}}"><i class="fa fa-pencil "></i></button>
          @endif
        @endif



        @if(array_key_exists('delete-btn',$data['List-action']))
        <button type="button" class="btn btn-danger ms-text-black ms-mod-btn" ms-live-link="{{route($data['List-action']['delete-btn']['method'],\MS\Core\Helper\Comman::en4url($object->$data['List-action']['delete-btn']['key']))}}"><i class="fa fa-trash"></i></button>
        @endif
        @if(array_key_exists('AllocationLater-btn',$data['List-action']))
        <?php 
        if(array_key_exists('icon',$data['List-action']['AllocationLater-btn']))$icon=$data['List-action']['AllocationLater-btn']['icon'];
        if(array_key_exists('vName',$data['List-action']['AllocationLater-btn']))$vName=$data['List-action']['AllocationLater-btn']['vName'];
         ?>
        <button type="button" class="btn  ms-text-black btn-info ms-mod-btn" ms-live-link="{{route($data['List-action']['AllocationLater-btn']['method'],\MS\Core\Helper\Comman::en4url($object->$data['List-action']['AllocationLater-btn']['key']))}}"><i class="{{$icon}}"></i></button>
        @endif
       
        @if(array_key_exists('LoginasAgency-btn',$data['List-action']))
        <?php 
        if(array_key_exists('icon',$data['List-action']['LoginasAgency-btn']))$icon=$data['List-action']['LoginasAgency-btn']['icon']; 
        if(array_key_exists('vName',$data['List-action']['LoginasAgency-btn']))$vName=$data['List-action']['LoginasAgency-btn']['vName'];
        ?>
        <button type="button" class="btn  ms-text-black btn-info ms-mod-btn" ms-live-link="{{route($data['List-action']['LoginasAgency-btn']['method'],\MS\Core\Helper\Comman::en4url($object->$data['List-action']['LoginasAgency-btn']['key']))}}"><i class="{{$icon}}"></i>  {{ $vName}}</button>
        @endif
       



      </div>

    </td>

    @endif




 

  </tr>
  @endforeach
   </tbody>

  
  </table>


    <div class="panel-footer">
      


    {{ $data['List-Paginate']->links('Pages.Paginate') }}


    </div>

</div>


<script type="text/javascript">


@include('L.jsFix')


</script>