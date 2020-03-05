<div class="modal fade" id="contract-modal">
  <div class="modal-dialog">
    <div class="modal-content">
    
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Available Contract Types</h4>
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
            @foreach($contracts as $contract)
              <li class="list-group-item list-item" 
                  data-modal="contract">
                {{ ucwords($contract->contract_name) }}
              </li>
            @endforeach
          </ul>
        </div>  
      </div>
      
      <!-- Modal footer -->
      <div class="border border-muted border-right-0 border-bottom-0 border-left-0 p-3">
        <div>
          <p>Can't find the right contract type? Go create one.</p>
          <div class="input-group input-group-sm mb-2">
            <input type="text" class="form-control form-control-sm otf-input">
            
            <div class="input-group-append otf-add" data-add='contract'>
              <span class="btn btn-success">
                Add and select
              </span>
            </div>
            <div class="invalid-feedback"></div>
          </div>
        </div>
      </div>
      
    </div>
  </div>
</div>