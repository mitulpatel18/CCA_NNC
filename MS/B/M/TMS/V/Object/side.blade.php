  	<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  



  <div class="panel panel-default">
      



    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title "  >




         <div class="btn-group ms-btn-full-width" role="group" aria-label="...">
          <span class="btn btn-default collapsed  ms-btn-full-width-main text-left" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne"><i class="fa fa-cogs" aria-hidden="true"></i> Manage Task</span>

           <span class="pull-right ms-mod-btn btn btn-default  ms-btn-full-width-side" ms-live-link="{{route('TMS.index.Data')}}">
            
            <i class="fa fa-home" aria-hidden="true"></i>


          </span> 
        </div>
       
      </h4>

     
    </div>
    <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body list-group">
       

      <a href="#" class="list-group-item ms-mod-btn" ms-live-link="{{ route('TMS.Task.Search.Page') }}" ms-breadcrumb="Modules/ Task Management System / Search Task"> <i class="fa fa-search" aria-hidden="true"></i> Search Task</a>
       
		  <a href="#" class="list-group-item ms-mod-btn" ms-live-link="{{ route('TMS.Task.Add') }}"  ms-breadcrumb="Modules/ Task Management System / Assign Task to Agency"> <i class="fa fa-share-square-o" aria-hidden="true"></i> Assign Task to Agency</a>

        <a href="#" class="list-group-item ms-mod-btn" ms-live-link="{{ route('TMS.Task.View') }}" ms-breadcrumb="Modules/ Task Management System / View Open Task"> <i class="fa fa-folder-open" aria-hidden="true"></i> View Open Task</a>
      <a href="#" class="list-group-item ms-mod-btn" ms-live-link="{{ route('TMS.Task.View') }}" ms-breadcrumb="Modules/ Task Management System / View Closed Task"> <i class="fa fa-archive" aria-hidden="true"></i> View Closed Task</a>

  
  
    


      </div>
    </div>
  </div>







</div>