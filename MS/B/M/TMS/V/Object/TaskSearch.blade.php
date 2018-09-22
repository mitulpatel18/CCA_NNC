<div class="panel panel-info" >



<div class="panel-heading"><h5><strong> <i class="glyphicon glyphicon-home"></i> Search Task </strong></h5></div>
<div class="panel-body">

<?php 
$dataForOption=[
'lable'=>'Search By',

'name'=>'SearchBy',
'data'=>[ 
              '0'=>'Agency',
              '1'=>'Status',
              '2'=>'State',


],
'value'=>'1',
'ClassData'=>['form-class-div'=>'col-lg-4']


];




        ?>
{{\Form::inputOption($dataForOption)}}



<div class="form-group col-lg-4">

<label for="QueryText">Select</label> 

<select class="form-control ms-live-data-load" ms-live-link="{{ route('MSCDN.search.Task.get.Data') }}" id="QueryText" name="QueryText"></select>

</div>






<div class="btn btn-info col-lg-4 ms-text-black" style="margin-top:10px;"><i class="fa fa-search" aria-hidden="true"></i> <br>Search</div>
	<br>

<div class="panel panel-default col-lg-12">
	
<div class="panel-heading"> Search Result </div>
<div class="panel-body"></div>

</div>



</div>

<script type="text/javascript">
	

	$( "[name=SearchBy]" ).change(function() {
  	//alert( $("option:selected").val()  );

	TypeOfSearch=$("option:selected").val();

 	link=$('.ms-live-data-load').attr('ms-live-link');


var html='';
 $.ajax({
    url: link,
    data: { 
        "TypeOfSearch": TypeOfSearch
 
    },
    cache: false,
    type: "GET",
    success: function(data) {

    	 jQuery.each(data.data,function (index, item){

			html=html+'<option value="'+item+'">' +item+'</option>';

    	 	$('.ms-live-data-load').html(html);



    	 });

    	// console.log(html);

    },
    error: function(xhr) {
    	html='';
    	$('.ms-live-data-load').html(html);

    }
});
  

});



</script>


</div>