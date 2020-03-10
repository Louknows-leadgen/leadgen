<div class="modal fade" id="supervisor-modal">
  <div class="modal-dialog">
    <div class="modal-content">
    
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">List of Employees</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      
      <!-- Modal body -->
      <div class="modal-body">
        
        <div class="input-group input-group-sm mb-2">
          <input type="text" class="form-control form-control-sm modal-search-inp" placeholder="Search...">
          <div class="input-group-append">
            <span class="btn btn-secondary modal-search-btn">
              <em class="fa fa-search"></em>
            </span>
          </div>
        </div>

        <div class="modal-list">
          <ul class="list-group">
            @foreach($employees as $employee)
              <li class="list-group-item list-item" 
                  data-modal="supervisor">
                {{ ucwords($employee->name) }}
              </li>
            @endforeach
          </ul>
        </div>  
      </div>
    </div>
  </div>
</div>