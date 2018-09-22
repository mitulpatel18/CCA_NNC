<div class="panel panel-default">
	
<div class="panel-heading"><h5><strong> <i class="glyphicon glyphicon-home"></i> IM Module Home</strong></h5></div>
<div class="panel-body">


<div class="col-lg-6">



<?php 

	\MS\Core\Helper\Comman::DB_flush();
	$m1=new \B\IM\Model ();

	dd($m1->MS_all());

?>



</div>

</div>


</div>