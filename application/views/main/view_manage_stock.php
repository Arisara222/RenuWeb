<div class="container-fluid">
  <div>
    <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-5">
      <div class="card-body pb-0 pt-3">
        <div class="row align-items-center">
          <div class="col-9">
            <h4 class="fw-semibold mb-8"><i class="ti-bar-chart"></i> STOCK DATA</h4>
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
        <button type="button" class="btn btn-circle btn-success" style="background-color: #15CEA2!important;float:right" id="btnAddStock"><i class="ti-plus"></i><b> Add Stock</b></button>
      </div>
      <div class="col-lg-5">
      </div>
    </div>
    <div class="card border">
      <div class="card-body">
        <div class="table-responsive text-nowrap">
          <div class="card-datatable table-responsive pt-0">
            <table class="table card-table border" style="width:100%" id="tblStock">
              <thead>
                <tr>
                  <th class="text-center">No.</th>
                  <th class="text-center">Company</th>
                  <th class="text-center">Product</th>
                  <th class="text-center">Quantity</th>
                  <th class="text-center">CF</th>
                  <th class="text-center">Unit Price</th>
                  <th class="text-center">Total Price</th>
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

<div class="modal fade" id="addStockModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Stock</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="addStockForm">
          <div class="row mb-3">
          <div class="col-lg-6">
              <label for="productSelect" class="form-label">Product</label>
              <select id="productSelect" class="form-control" required>
                </select>
            </div>
            <div class="col-lg-6">
              <label for="company" class="form-label">Company</label>
              <input type="text" class="form-control" id="company" required>
            </div>

            
          </div>
          <div class="row mb-3">
          <div class="col-lg-4">
              <label for="quantityInput" class="form-label">Quantity</label>
              <input type="inpQty" min="1" class="form-control" id="quantityInput" required>
            </div>
            <div class="col-lg-4">
              <label for="unitPriceInput" class="form-label">Unit Price</label>
              <input type="inpUnitPrice" min="0" step="0.01" class="form-control" id="unitPriceInput" disabled>
            </div>
            <div class="col-lg-4">
              <label for="totalPriceInput" class="form-label">Total Price</label>
              <input type="number" min="0" step="0.01" class="form-control" id="totalPriceInput" disabled>
            </div>
          </div>
          <div class="mb-3">
            <label for="notesInput" class="form-label">Notes (optional)</label>
            <textarea class="form-control" id="notesInput"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="submitStock">Add Stock</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="editStockModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Stock</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="addStockForm">
          <div class="row mb-3">
          <div class="col-lg-6">
              <label for="productSelectEdit" class="form-label">Product</label>
              <select id="productSelectEdit" class="form-control" required>
                </select>
            </div>
            <div class="col-lg-6">
              <label for="companyEdit" class="form-label">Company</label>
              <input type="text" class="form-control" id="companyEdit" required>
              <input type="hidden" class="form-control" id="isd_id">
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-lg-4">
                <label for="quantityInputEdit" class="form-label">Quantity</label>
                <input type="number" min="1" class="form-control" id="quantityInputEdit" required>
              </div>
              <div class="col-lg-4">
                <label for="unitPriceInput" class="form-label">Unit Price</label>
                <input type="inpUnitPrice" min="0" step="0.01" class="form-control" id="unitPriceInputEdit" disabled>
              </div>
              <div class="col-lg-4">
                <label for="totalPriceInput" class="form-label">Total Price</label>
                <input type="number" min="0" step="0.01" class="form-control" id="totalPriceInputEdit" disabled>
              </div>
            </div>
          <div class="mb-3">
            <label for="notesInput" class="form-label">Notes (optional)</label>
            <textarea class="form-control" id="notesInputEdit"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="submitStockEdit">Add Stock</button>
      </div>
    </div>
  </div>
</div>
