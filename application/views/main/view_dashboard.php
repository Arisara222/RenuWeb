<style>
    .clicks{
        cursor: pointer;
        }
</style>

<div class="container-fluid">
        <!--  Row 1 -->
        <div class="row">
          <div class="col-lg-12">
            <div class="row">
              <div class="col-lg-4">
                <!-- Yearly Breakup -->
                <div class="card overflow-hidden clicks">
                  <div class="card-body p-4 ">
                    <h2 class="text-info">Leave Requests</h2>
                    <div class="row align-items-center">
                      <div class="col-8">
                      <h2 class="mb-4 " style="font-size: 50px"><span class="ps-3" id="countReq"> </span> </h2>

                      <div class="d-flex align-items-center pb-1">
                          <span
                            class="me-2 rounded-circle bg-light-danger round-20 d-flex align-items-center justify-content-center">
                            <i class="ti ti-checkbox text-danger"></i>
                          </span>
                          <p class="text-dark me-1 fs-3 mb-0"></p>
                          <p class="fs-3 mb-0">Request</p>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <span class="mb-5"><img src="http://127.0.0.1/renuWeb/assets/img/icon/bell (3).png" style="height: 80px;margin-bottom: 40px;margin-left: 20%" alt=""></span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <!-- Yearly Breakup -->
                <div class="card overflow-hidden">
                  <div class="card-body p-4 ">
                    <h2 class="text-warning">Late Today</h2>
                    <div class="row align-items-center">
                      <div class="col-8">
                      <h2 class="mb-4 " style="font-size: 50px"><span class="ps-3" id="late"> </span> </h2>

                      <div class="d-flex align-items-center pb-1">
                          <span
                            class="me-2 rounded-circle bg-light-danger round-20 d-flex align-items-center justify-content-center">
                            <i class="ti ti-clock text-danger"></i>
                          </span>
                          <p class="text-dark me-1 fs-3 mb-0"></p>
                          <p class="fs-3 mb-0">Over 08:00</p>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <span class="mb-5"><img src="http://127.0.0.1/renuWeb/assets/img/icon/clock-check (1).png" style="height: 80px;margin-bottom: 40px;margin-left: 20%" alt=""></span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <!-- Yearly Breakup -->
                <div class="card overflow-hidden">
                  <div class="card-body p-4 ">
                    <h2 class="text-danger">Storage</h2>
                    <div class="row align-items-center">
                      <div class="col-8">
                      <h2 class="mb-4 " style="font-size: 50px"><span class="ps-3" id="stock"> </span> </h2>

                      <div class="d-flex align-items-center pb-1">
                          <span
                            class="me-2 rounded-circle bg-light-danger round-20 d-flex align-items-center justify-content-center">
                            <i class="ti ti-checkbox text-danger"></i>
                          </span>
                          <p class="text-dark me-1 fs-3 mb-0"></p>
                          <p class="fs-3 mb-0">Piece</p>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <span class="mb-5"><img src="http://127.0.0.1/renuWeb/assets/img/icon/package.png" style="height: 80px;margin-bottom: 40px;margin-left: 20%" alt=""></span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
        <div class="row">
            <div class="col-lg-12 d-flex align-items-stretch">
                <div class="card w-100">
                    <div class="card-body p-4">
                        <h5 class="card-title fw-semibold mb-4">Recent Transactions</h5>
                        <div class="table-responsive">
                            <table class="table card-table border" style="width:100%" id="das">
                                <thead class="text-dark fs-4">
                                    <tr>
                                        <th class="border-bottom-0 text-center">
                                            <h6 class="fw-semibold mb-0">No.</h6>
                                        </th>
                                        <th class="border-bottom-0 text-center">
                                            <h6 class="fw-semibold mb-0">Company</h6>
                                        </th>
                                        <th class="border-bottom-0 text-center">
                                            <h6 class="fw-semibold mb-0">Product</h6>
                                        </th>
                                        <th class="border-bottom-0 text-center">
                                            <h6 class="fw-semibold mb-0">Quantity</h6>
                                        </th>
                                        <th class="border-bottom-0 text-center">
                                            <h6 class="fw-semibold mb-0">Indicator</h6>
                                        </th>

                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>