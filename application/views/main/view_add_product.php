<div class="container-fluid">
  <div>
    <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-5">
      <div class="card-body pb-0 pt-3">
        <div class="row align-items-center">
          <div class="col-9">
            <h4 class="fw-semibold mb-8"><i class="ti-bar-chart"></i> Add Product</h4>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a class="text-muted text-decoration-none" href="<?php echo base_url('Dashboard/dashboard'); ?>">Home</a>
                </li>
                <li class="breadcrumb-item" aria-current="page"> Stock Management</li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>
    <div class="form-group row mb-3">
            <div class="col-lg-12 mb-4">
                <button type="button" class="btn btn-circle btn-success" style="background-color: #15CEA2!important;float:right" id="btnCreate"><i class="ti-plus"></i> <b>New Product</b></button>
            </div>


            <div class="col-lg-5">
            </div>

        </div>
    <div class="card border">
      <div class="card-body">
        <div class="table-responsive text-nowrap">
          <div class="card-datatable table-responsive pt-0">
            <table class="table card-table border" style="width:100%" id="tblProduct">
              <thead>
                <tr>
                  <th class="text-center">No.</th>
                  <th class="text-center">Product</th>
                  <th class="text-center">Indicator</th>
                  <th class="text-center">Unit Price</th>
                  <th class="text-center">Action</th>
                </tr>
              </thead>
              <tbody class="table-border-bottom-0 text-center">
              </tbody>
            </table>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

      <div class="modal fade" id="mdlAddProduct" tabindex="-1" aria-hidden="true">
       <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
         <div class="modal-header">
          <h5 class="modal-title" style="padding: 0px 10px;margin: 10px 0px;font-weight: 600;"><i class="ti-file mr-3"></i> Add Product</h5>
           <button type="button" class="btn-close me-2 mb-3" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
          <div class="modal-body">
           <form id="registerForm" enctype="multipart/form-data">
            <div class="form-group row mb-2" style="padding: 0px 10px;padding-bottom: 20px;margin: 10px 0px;">
             <div class="col-lg-6">
              <label for="inpProduct" class="form-label">Product</label>
              <input type="text" id="inpProduct" class="form-control" placeholder="Enter Product">
             </div>
             <div class="col-lg-6">
              <label for="inpIndicator" class="form-label">Indicator</label>
              <input type="text" id="inpIndicator" class="form-control" placeholder="Enter Indicator">
             </div>
            </div>
            <div class="form-group row mb-2" style="padding: 0px 10px;padding-bottom: 20px;margin: 10px 0px;">
             <div class="col-lg-6">
              <label for="inpUnit" class="form-label">Unit Price</label>
               <input type="text" id="inpUnit" class="form-control" placeholder="Enter Unit">
             </div>
            </div>
           </form>
          </div>
          <div class="modal-footer">
           <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
           <button type="button" class="btn btn-primary" id="btnSaveAdd">Save changes</button>
          </div>
         </div>
        </div>
      </div>

      <div class="modal fade" id="mdlEidtProduct" tabindex="-1" aria-hidden="true">
       <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
         <div class="modal-header">
          <h5 class="modal-title" style="padding: 0px 10px;margin: 10px 0px;font-weight: 600;"><i class="ti-pencil mr-3"></i> Edit Product</h5>
           <button type="button" class="btn-close me-2 mb-3" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
          <div class="modal-body">
           <form id="eidtForm" enctype="multipart/form-data">
            <div class="form-group row mb-2" style="padding: 0px 10px;padding-bottom: 20px;margin: 10px 0px;">
             <div class="col-lg-6">
              <label for="inpProduct" class="form-label">Product</label>
              <input type="text" id="inpEidtProduct" class="form-control" placeholder="Enter Product">
             </div>
             <div class="col-lg-6">
              <label for="inpIndicator" class="form-label">Indicator</label>
              <input type="text" id="inpEidtIndicator" class="form-control" placeholder="Enter Indicator">
             </div>
            </div>
            <div class="form-group row mb-2" style="padding: 0px 10px;padding-bottom: 20px;margin: 10px 0px;">
             <div class="col-lg-6">
              <label for="inpUnit" class="form-label">Unit Price</label>
               <input type="text" id="inpEidtUnit" class="form-control" placeholder="Enter Unit">
             </div>
            </div>
           </form>
          </div>
          <div class="modal-footer">
           <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
           <button type="button" class="btn btn-primary" id="btnSaveEdit">Save changes</button>
          </div>
         </div>
        </div>
      </div>
