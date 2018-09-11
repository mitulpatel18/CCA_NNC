<?php
 

  $data['form-action-para']=[


    'TaskId'=>\MS\Core\Helper\Comman::en4url($data['TaskId']),
    'StepId'=>\MS\Core\Helper\Comman::en4url($data['StepId']),


    ];
    $data['form-action']=route('TMS.Task.Rise.Step.Query.Post',$data['form-action-para']);




 ?>

<div class="panel panel-info" >


      {!! Form::open(['url' => $data['form-action'],'method' => 'post','files' => true,'class'=>'ms-form ','role'=>'form']) !!}
     

<div class="panel-heading"><h5><strong> <i class="glyphicon glyphicon-home"></i> View Details for Task No.{{$data['TaskId']}} for Step No.{{$data['StepId']}} </strong></h5></div>
<div class="panel-body">
  

  <span class="col-lg-12">
    
        @include('B.L.Object.Error')
      </span>
</div>


  <table class="table table-bordered text-capitalize">

<tr>
<th colspan="6"><i class="fa fa-sort-amount-asc" aria-hidden="true"></i> Current step documents that required action </th>
</tr>

  <tr>
    <th>Step Id</th>
    <th>Type of Document</th>
    <th>Query</th>
    <th>Document Details</th>
  <th>Query Replay</th>
   <th>Document Replay</th>
    

  </tr>




 @foreach($data['stepData']['DocumentQueryArray']  as $docName=>$docDetails)
  

      @foreach($docDetails  as $docName1=>$docDetails1)



@foreach($docDetails1['QueryDocumentArray']  as $keyDoc=>$query)



  <tr class="info">
    
   <!--    
       <td>  {{  $data['StepId'] }}</td>    -->   


       <td> {{ $data['StepId'] }} </td>
      <td> {{\B\ATMS\Logics::getTypeOfDocument( $query ['TypeOfDocument'] ) ['NameOfDocuments'] }}</td>
      <td>  {{ $docDetails1['Query'] }} </td>

      <td> 

                     <table class="table table-bordered text-capitalize">

                
            
                 <tr>
                  <?php
                  $docPath=(array)$query;

                  $url=str_replace('\\' ,'/',$docPath['path']);
                  $urlArray=explode('/',$url);
                  $c=\MS\Core\Helper\Comman::random(2);
                  array_splice($urlArray, 1, 0, $c);
                  $url=implode('/', $urlArray);
           //     dd($docPath);  

                 //;
                 // if('Panchnma Copy_452'==explode('.',$docName)[0])dd($docPath);
                   ?>
                  
                  
                  <td>
<a href="{{ route('TMS.Task.Get.File.Name',['UniqId'=>\MS\Core\Helper\Comman::en4url($c),'TaskId'=>\MS\Core\Helper\Comman::en4url($data['taskData']['UniqId']),'StepId'=>\MS\Core\Helper\Comman::en4url($data ['StepId']),'TypeOfDocument'=>\MS\Core\Helper\Comman::en4url($docPath['TypeOfDocument']),'FileName'=>$query['FileName']]) }}" target="_BLANK">
                 {{ explode('.',$query['FileName'])[0] }}
               </a>
               </td>
               @if(array_key_exists('DateOfDocument', $docPath) && ($docPath['DateOfDocument']!=null))
           
               <td>
                 
                 {{ Carbon::parse($docPath['DateOfDocument'])->format('d / m / Y') }}

                
               </td> 

                @endif

                   @if(array_key_exists('NoOfDocument', $docPath)  && ($docPath['NoOfDocument']!=null))
               <td>
                 
                 Invoice No.{{ $docPath['NoOfDocument'] }}
                 {{ \Form::inputText(['name'=>'documentNo['.$query['UniqId'].']' ,'lable'=>'Change Invoice No.','value'=> $docPath['NoOfDocument'],'data'=>['input-size'=>'col-lg-12'] ]) }}
               </td> 

                @endif

                @if(array_key_exists('AmountOfDocument', $docPath)  && ($docPath['AmountOfDocument']!=null))
               <td>
                 
                Total Amount: ₹ {{ $docPath['AmountOfDocument'] }}
                 {{ \Form::inputNumber(['name'=>'documentNo['.$query['UniqId'].']' ,'lable'=>'Change Amount','value'=> $docPath['AmountOfDocument'],'data'=>['input-size'=>'col-lg-12'] ]) }}
               </td> 

                @endif




               </tr>
                
             
               
               </table>

       </td>




   <td> 
    @if($docDetails1['Replay']!=null)
      {{$docDetails1['Replay']}}
    @else

     <div class="btn btn-warning ms-text-black" >
                  <i class="fa fa-refresh fa-spin fa-fw"></i>
                  Waiting For Agency Replay
                </div>  
    @endif
      </td>

        <td> 

            @if($docDetails1['Replay']!=null)
              {{$docDetails1['Replay']}}
            @else

             <div class="btn btn-warning ms-text-black" >
                          <i class="fa fa-refresh fa-spin fa-fw"></i>
                          Waiting For Agency Replay
                        </div>  
            @endif






         </td>

  </tr>




  @endforeach

  @endforeach




  @endforeach



  <tr>
  <th colspan="6"><i class="fa fa-sort-amount-asc" aria-hidden="true"></i> Recent step documents that required action </th>
  </tr>





<?php 



 \MS\Core\Helper\Comman::DB_flush();
 $m3=new \B\TMS\Model('1',$data['TaskId']);

 if($recentTask=$m3->where('DocumentQuery',1)->get() != null){
 $recentTask=$m3->where('DocumentQuery',1)->get()->toArray();}else{$recentTask=[];}
  



?>


@if(count($recentTask)>0)
  @foreach(  $recentTask as $task ) 

  @if($task['UniqId'] != $data['StepId'])

  <?php 

    $task ['DocumentArray']=(array)json_decode($task ['DocumentArray'],true);
    $task ['DocumentVerifiedArray']=(array)json_decode($task ['DocumentVerifiedArray'],true);

    $task ['DocumentQueryArray']=(array)json_decode($task ['DocumentQueryArray'],true);
    $task ['DocumentReplyArray']=(array)json_decode($task ['DocumentReplyArray'],true);


  ?>

    @foreach($task['DocumentQueryArray']  as $docName=>$docDetails)
  

      @foreach($docDetails  as $docName1=>$docDetails1)
        @foreach($docDetails1['QueryDocumentArray']  as $keyDoc=>$query)

<tr class="warning">
    
   <!--    
       <td>  {{  $data['StepId'] }}</td>    -->   


       <td> {{$task['UniqId'] }} </td>
      <td> {{\B\ATMS\Logics::getTypeOfDocument( $query ['TypeOfDocument'] ) ['NameOfDocuments'] }}</td>
      <td>  {{ $docDetails1['Query'] }} </td>

      <td> 

                     <table class="table table-bordered text-capitalize">

                
            
                 <tr>
                  <?php
                  $docPath=(array)$query;

                  $url=str_replace('\\' ,'/',$docPath['path']);
                  $urlArray=explode('/',$url);
                  $c=\MS\Core\Helper\Comman::random(2);
                  array_splice($urlArray, 1, 0, $c);
                  $url=implode('/', $urlArray);
           //     dd($docPath);  

                 //;
                 // if('Panchnma Copy_452'==explode('.',$docName)[0])dd($docPath);
                   ?>
                  
                  
                  <td>
<a href="{{ route('TMS.Task.Get.File.Name',['UniqId'=>\MS\Core\Helper\Comman::en4url($c),'TaskId'=>\MS\Core\Helper\Comman::en4url($data['taskData']['UniqId']),'StepId'=>\MS\Core\Helper\Comman::en4url($data ['StepId']),'TypeOfDocument'=>\MS\Core\Helper\Comman::en4url($docPath['TypeOfDocument']),'FileName'=>$query['FileName']]) }}" target="_BLANK">
                 {{ explode('.',$query['FileName'])[0] }}
               </a>
               </td>
               @if(array_key_exists('DateOfDocument', $docPath) && ($docPath['DateOfDocument']!=null))
           
               <td>
                 
                 {{ Carbon::parse($docPath['DateOfDocument'])->format('d / m / Y') }}

                
               </td> 

                @endif

                   @if(array_key_exists('NoOfDocument', $docPath)  && ($docPath['NoOfDocument']!=null))
               <td>
                 
                 Invoice No.{{ $docPath['NoOfDocument'] }}
                 {{ \Form::inputText(['name'=>'documentNo['.$query['UniqId'].']' ,'lable'=>'Change Invoice No.','value'=> $docPath['NoOfDocument'],'data'=>['input-size'=>'col-lg-12'] ]) }}
               </td> 

                @endif

                @if(array_key_exists('AmountOfDocument', $docPath)  && ($docPath['AmountOfDocument']!=null))
               <td>
                 
                Total Amount: ₹ {{ $docPath['AmountOfDocument'] }}
                 {{ \Form::inputNumber(['name'=>'documentNo['.$query['UniqId'].']' ,'lable'=>'Change Amount','value'=> $docPath['AmountOfDocument'],'data'=>['input-size'=>'col-lg-12'] ]) }}
               </td> 

                @endif




               </tr>
                
             
               
               </table>

       </td>




   <td> 
    @if($docDetails1['Replay']!=null)
      {{$docDetails1['Replay']}}
    @else

     <div class="btn btn-warning ms-text-black" >
                  <i class="fa fa-refresh fa-spin fa-fw"></i>
                  Waiting For Agency Replay
                </div>  
    @endif
      </td>

        <td> 

            @if($docDetails1['Replay']!=null)
              {{$docDetails1['Replay']}}
            @else

             <div class="btn btn-warning ms-text-black" >
                          <i class="fa fa-refresh fa-spin fa-fw"></i>
                          Waiting For Agency Replay
                        </div>  
            @endif






         </td>

  </tr>

        @endforeach
      @endforeach
    @endforeach
    @endif

  @endforeach
@endif








  </table>

<div class="panel-footer">
  


  <div class="btn-group btn-group-justified" >
                              
                      <?php 
             
                      $link="TMS.Task.View.Id";
                   

                 

                      ?>  

           <div class="btn btn-default ms-text-black ms-mod-btn" ms-shortcut="back" ms-live-link="{{ route($link,['UniqId'=>\MS\Core\Helper\Comman::en4url($data['TaskId']) ]) }}"><i class="fa fa-fast-backward"  ></i> Go Back to Task Overview No. {{$data['TaskId']}}</div>
           
<!--            <div class="btn btn-success ms-text-black btn-frm-submit" > Submit Query <i class="fa fa-paper-plane-o"  ></i></div>
                 -->

                            </div>
</div>


    {!! Form::close() !!}

  </div>


  <script type="text/javascript">


  @include('L.jsFix')

  </script>