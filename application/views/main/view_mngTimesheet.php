<style>
    #tblTimeReport {
        border-collapse: collapse;
    }
    #tblTimeReport th,
    #tblTimeReport td {
        border: 1px solid #ddd; /* Add borders to each cell */
        padding: 8px; /* Add padding for better spacing */
    }
    #tblTimeReport th:first-child,
    #tblTimeReport td:first-child {
        border-left: none; /* Remove left border for first column */
    }
    #tblTimeReport th:last-child,
    #tblTimeReport td:last-child {
        border-right: none; /* Remove right border for last column */
    }
</style>
<div class="container-fluid">
    <!--  Row 1 -->

        <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-5">
            <div class="card-body pb-0 pt-3">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h4 class="fw-semibold mb-8"><i class="ti-file"></i> TIME SHEET </h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a class="text-muted text-decoration-none" href="<?php echo base_url('Dashboard/dashboard'); ?>">Home</a>
                                </li>
                                <li class=" breadcrumb-item" aria-current="page"> Admin
                                </li>
                            </ol>
                        </nav>
                    </div>

                </div>
            </div>
        </div>
        <div class="form-group row mb-3">
            <div class="col-lg-12 mb-4">
                <button type="button" class="btn btn-circle btn-success" style="background-color: #15CEA2!important;float:right" id="btnCreate"><i class="ti-plus"></i> <b>Add Information</b></button>
            </div>


            <div class="col-lg-5">
            <button type="button" id="report" class="btn btn-danger">Report</button>
            </div>

        </div>
        <div class="card border">
            <div class="card-body">
                <!-- start page container -->
                <div class="table-responsive text-nowrap">
                    <div class="card-datatable table-responsive pt-0">
                        <table class="table card-table border" style="width:100%" id="tblTimesheet">
                            <thead>
                                <tr>
                                    <th class="text-center">NO.</th>
                                    <th class="text-center">First Name</th>
                                    <th class="text-center">Last Name</th>
                                    <th class="text-center">Date</th>
                                    <th class="text-center">Start Time</th>
                                    <th class="text-center">End Time</th>
                                    <th class="text-center">Over Time (Hr.)</th>
                                    <th class="text-center">Total</th>
                                    <th class="text-center">Remarks</th>
                                    <th class="text-center">Late Minute</th>
                                    <th class="text-center">Total</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            <tbody class="table-border-bottom-0 text-center">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="card" style="display: none;" id="content">
                <div class="col-sm-12 mt-3">
                    <div class="row ">
                        <div class="col-md-12">
                            <div class="card container">
                                <div class="row py-2 mt-2">
                                    <span class="fs-5 fw-bold text-primary-emphasis">Register Permission</span>
                                    <div class="col-md-5 col-sm-10 col-5 mt-3">
                                        <div class="row ">
                                            <div class="col-lg-3 p-t-20">
                                                <span>Sub Menu</span><span class="red-text">*</span>
                                            </div>
                                            <div class="col-lg">
                                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                                    <select class="form-control" id="selMenuGroupName">
                                                        <option value="">Choose main menu</option>
                                                    </select>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5 col-sm-2 col-5">
                                        <div class="row ">
                                            <div class="col-lg-5 p-t-20">
                                                <span>Sub Menu controller</span><span class="red-text">*</span>
                                            </div>
                                            <div class="col-lg">
                                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                                    <select class="form-control" id="selSubMenuName">
                                                        <option value="">Choose main menu</option>
                                                    </select>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md col-sm-2 col-2 p-t-20">
                                        <button type="button" class="btn btn-circle btn-primary" id="btnSaveAddPer">Add</button>
                                    </div>
                                    <div class="col-12 col-sm-12 justify-content-start">
                                        <div id="errMegadd" style="color: red; display: none;">Please enter in English only.</div>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive text-nowrap">
                                            <div class="card-datatable table-responsive pt-0">
                                                <table class="table card-table" id="tblPermis">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center">No.</th>
                                                            <th class="text-center">Main Menu</th>
                                                            <th class="text-center">Sub Menu</th>
                                                            <th class="text-center">Update Date</th>
                                                            <th class="text-center">Update By</th>
                                                            <th class="text-center">Stasus</th>
                                                            <th class="text-center">Action</th>
                                                            <th class="text-center">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="table-border-bottom-0 text-center" id="tbody">
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="card-foot mt-2">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--/ Bordered Table -->

                                <!-- Button trigger modal -->

                                <!-- Modal -->
                                <div class="modal fade" id="mdlEdit" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropEdit">Edit Menu </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col mb-3">
                                                        <label for="edtSubMenu" class="form-label">Main Menu</label>
                                                        <input type="text" id="edtSubMenu" class="form-control" placeholder="Enter Main Menu">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col mb-3">
                                                        <label for="edtController" class="form-label">Main Menu Icon</label>
                                                        <input type="text" id="edtController" class="form-control" placeholder="Enter Main Menu Icon">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col mb-3">
                                                        <label for="edtOrderNo" class="form-label">Order No.</label>
                                                        <input type="text" id="edtOrderNo" class="form-control" placeholder="Enter Order No.">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary" id="btnSaveEdit1">Save changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="createModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" style="padding: 0px 10px;margin: 10px 0px;font-weight: 600;"><i class="ti-file mr-3"></i> Register Personal Information</h3>
                    <button type="button" class="btn-close me-2 mb-3" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="registerForm" enctype="multipart/form-data">
                        <div class="form-group row mb-2" style="padding: 0px 10px;padding-bottom: 20px;margin: 10px 0px;">
                            <div class="col-lg-12 mb-3">
                                <label class="col-form-label">
                                    <h4 style="font-weight: 600;"><i class="ti-file" style="padding-right: 7px;"></i>Form input Information</h4>
                                </label>
                            </div>
                            <div class="col-lg-3">
                                <label for="selUsername" class="form-label">ชื่อ-นามสกุล</label>
                                <select name="" class="form-control" id="selUsername">
                                    <option value="">- select name -</option>
                                </select>
                            </div>
                            <div class="col-lg-3">
                                <label for="inputDate" class="form-label">วันที่</label>
                                <input type="date" id="inpDate" class="form-control" value="<?= date('Y-m-d') ?>">
                            </div>
                            <div class="col-lg-3">
                                <label for="inpTimeStart" class="form-label">เวลาเข้า</label>
                                <input type="time" id="inpTimeStart" class="form-control" placeholder="Enter Address">
                            </div>
                            <div class="col-lg-3">
                                <label for="inpTimeEnd" class="form-label">เวลาออก</label>
                                <input type="time" id="inpTimeEnd" class="form-control" placeholder="Enter Birthday">
                            </div>
                        </div>
                        <div class="form-group row mb-2" style="padding: 0px 10px;padding-bottom: 20px;margin: 10px 0px;">
                            <div class="col-lg-6">
                                <label for="inpOt" class="form-label">Over Time</label>
                                <input type="text" id="inpOt" class="form-control" placeholder="Enter Over Time">
                            </div>
                        </div>
                        <div class="form-group row mb-2" style="padding: 0px 10px;padding-bottom: 20px;margin: 10px 0px;">
                            <div class="col-lg-6">
                                <label for="inpRemark" class="form-label">Remark</label>
                                <textarea name="" id="inpRemark" class="form-control" id="" cols="20" rows="5"></textarea>
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

    <div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" style="padding: 0px 10px;margin: 10px 0px;font-weight: 600;"><i class="ti-file mr-3"></i> Edit Time Sheet</h3>
                    <button type="button" class="btn-close me-2 mb-3" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="registerForm" enctype="multipart/form-data">
                        <div class="form-group row mb-2" style="padding: 0px 10px;padding-bottom: 20px;margin: 10px 0px;">

                            <div class="col-lg-3">
                                <label for="selUsername" class="form-label">ชื่อ-นามสกุล</label>
                                <select name="" class="form-control" id="selEditUsername">
                                    <option value="">- select name -</option>
                                </select>
                            </div>
                            <div class="col-lg-3">
                                <label for="inputDate" class="form-label">วันที่</label>
                                <input type="date" id="inpEditDate" class="form-control" value="<?= date('Y-m-d') ?>">
                            </div>
                            <div class="col-lg-3">
                                <label for="inpTimeStart" class="form-label">เวลาเข้า</label>
                                <input type="time" id="inpEditTimeStart" class="form-control" placeholder="Enter Address">
                                <!-- <input type="text" id="iddd" class="form-control" placeholder="Enter Address"> -->
                            </div>
                            <div class="col-lg-3">
                                <label for="inpTimeEnd" class="form-label">เวลาออก</label>
                                <input type="time" id="inpEditTimeEnd" class="form-control" placeholder="Enter Birthday">
                            </div>
                        </div>
                        <div class="form-group row mb-2" style="padding: 0px 10px;padding-bottom: 20px;margin: 10px 0px;">
                            <div class="col-lg-6">
                                <label for="inpOt" class="form-label">Over Time</label>
                                <input type="text" id="inpEditOt" class="form-control" placeholder="Enter Over Time">
                            </div>
                        </div>
                        <div class="form-group row mb-2" style="padding: 0px 10px;padding-bottom: 20px;margin: 10px 0px;">
                            <div class="col-lg-6">
                                <label for="inpRemark" class="form-label">Remark</label>
                                <textarea name="" id="inpEditRemark" class="form-control" id="" cols="20" rows="5"></textarea>
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

    <div class="modal fade" id="viewModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" style="padding: 0px 10px;margin: 10px 0px;font-weight: 600;"><i class="ti-clipboard mr-3"></i> Summary Time Sheet</h3>
                    <button type="button" class="btn-close me-2 mb-3" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <button type="button" class="btn btn-danger float-end" id="btnPrint"><i class="ti-write"></i> PDF</button><br><br>

                        <div class="form-group row mb-2" style="padding: 0px 10px;padding-bottom: 20px;margin: 10px 0px;">
                            <table class="table card-table border" style="width:100%" id="tblTimeReport">
                                <thead>
                                    <tr>
                                        <th class="text-center">No.</th>  
                                        <th colspan="2" class="text-center">Date</th>  
                                        <th class="text-center">From</th>  
                                        <th class="text-center">To</th>  
                                        <th class="text-center">OT Hours</th>  
                                        <th class="text-center">TOTAL (Hours)</th>  
                                        <th class="text-center">Remark</th>  
                                        <th class="text-center">Late / min</th>  
                                        <th class="text-center">Total Late</th>  
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>

                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <!-- <button type="button" class="btn btn-primary" id="btnSaveEdit1">Save changes</button> -->
                </div>
            </div>
        </div>
    </div>
