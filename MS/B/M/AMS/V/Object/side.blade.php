	<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  



  <div class="panel panel-default">
      



    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title  "  >




         <div class="btn-group ms-btn-full-width" role="group" aria-label="...">
          <span class="btn btn-default collapsed  ms-btn-full-width-main text-left" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne"><i class="fa fa-cogs" aria-hidden="true"></i> Manage Agency</span>

           <span class="pull-right ms-mod-btn btn btn-default  ms-btn-full-width-side" ms-live-link="{{ route('AMS.index.Data') }}">
            
            <i class="fa fa-home" aria-hidden="true"></i>


          </span> 
        </div>
       
      </h4>

     
    </div>
    <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body list-group">
       
		  <a href="#" class="list-group-item ms-mod-btn" ms-live-link="{{ route('AMS.Agency.Add') }}" ms-breadcrumb="Modules/ Agency Management System / Add Agency"> <i class="fa fa-plus" aria-hidden="true"></i> Add Agency</a>

      <a href="#" class="list-group-item ms-mod-btn" ms-live-link="{{ route('AMS.Agency.View') }}" ms-breadcrumb="Modules/ Agency Management System / View  All Agency"> <i class="fa fa-eye" aria-hidden="true"></i> View All Agency</a>
  
    


      </div>
    </div>
  </div>







</div>