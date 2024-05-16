<style>
        .img-circle {
            border-radius: 50%;
            width: 250px;
            height: 250px;
        }
    </style>
<div class="container-fluid">
    <!--  Row 1 -->
    <div>
        <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-5">
            <div class="card-body pb-0 pt-3">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h4 class="fw-semibold mb-8"><i class="ti-file"></i> DATA EMPLOYEE </h4>
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
                <button type="button" class="btn btn-circle btn-success" style="background-color: #15CEA2!important;float:right" id="btnRegisterLeave"><i class="ti-plus"></i> <b>Register</b></button>
            </div>


            <div class="col-lg-5">
            </div>

        </div>
        <div class="card border">
            <div class="card-body">
                <!-- start page container -->
                <div class="table-responsive text-nowrap">
                    <div class="card-datatable table-responsive pt-0">
                        <table class="table card-table border" style="width:100%" id="tblLeave">
                            <thead>
                                <tr>
                                    <th class="text-center">NO.</th>
                                    <th class="text-center">ชื่อ-นามสกุล</th>
                                    <th class="text-center">วันที่</th>
                                    <th class="text-center">ประเภท</th>
                                    <th class="text-center">ลาวันที่</th>
                                    <th class="text-center">ถึงวันที่</th>
                                    <th class="text-center">จำนวนวัน</th>
                                    <th class="text-center">สถานะ</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            <tbody class="table-border-bottom-0 text-center">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="modal fade" id="addLeaveModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" style="padding: 0px 10px;margin: 10px 0px;font-weight: 600;"><i class="ti-pencil-alt mr-3"></i> Register Leave Information</h3>
                    <button type="button" class="btn-close me-2 mb-3" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="RegisterLeaveForm" enctype="multipart/form-data">
                        <div class="form-group row mb-2" style="padding: 0px 10px;padding-bottom: 20px;margin: 10px 0px;">
                            <div class="col-lg-6">
                                <label for="inpAddDoc" class="form-label">Information</label>
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row mb-3 text-center">
                                            <div class="col-lg-12">
                                                <img src="http://127.0.0.1/api/uploads/user1.jpg" class="img-circle" height="200px" weidth="200px" id="inpAddDoc" alt="">
                                            </div>
                                            
                                        </div>
                                        <div class="row">
                                        <div class="col-lg-12">
                                            <h5>นายนรภัทร จิรเศรษฐสิริ</h5>
                                            </div>
                                            
                                            <h6>Position : Manager</h6>
                                            <h6>Leave Balance : 6</h6>
                                            
                                        </div>
                                        
                                        

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label for="selAddEmp" class="form-label">ชื่อ-นามสกุล</label>
                                <select name="employeeName" id="employeeName" class="form-control">
                                    <!-- Options will be added dynamically -->
                                </select>
                                <br>

                                <label for="selTypeLeave" class="form-label">ประเภทการลา</label>
                                <select name="leaveType" id="leaveType" class="form-control">
                                    <!-- Options will be added dynamically -->
                                </select>
                                <br>
                                <div class="row">
                                    <div class="col-lg-5">
                                        <label for="inpDateStart" class="form-label">จากวันที่</label>
                                        <input type="date" id="startDate" name="startDate" class="form-control">

                                    </div>
                                    <div class="col-lg-5">
                                        <label for="inpDateEnd" class="form-label">ถึงวันที่</label>
                                        <input type="date" id="endDate" name="endDate" class="form-control">

                                    </div>
                                    <div class="col-lg-2">
                                        <label for="days" class="form-label">จำนวน</label>
                                        <input type="text" id="daysCount" name="daysCount" class="form-control">

                                    </div>
                                </div><br>

                                <div class="col-lg-6">
                                    <label class="form-label">ชนิดการลา</label><br>
                                    <fieldset>
                                        <div>
                                            <input type="radio" id="half" class="form-check-input" name="leaveKind" value="half" checked />
                                            <label for="half">ลาไม่เต็มวัน</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                            <input type="radio" id="full" class="form-check-input" name="leaveKind" value="full" />
                                            <label for="full">ลามีใบรับรองแพทย์</label>
                                        </div>

                                    </fieldset>
                                </div><br>
                                <div class="col-lg-6">
                                    <label for="inpFile" class="form-label">แนบใบรับรองแพทย์</label><br>
                                    <input type="file" id="medicalCertificate" name="medicalCertificate" class="form-control">
                                </div>
                                <div class="col-lg-12">
                                    <label for="inpRemark" class="form-label">หมายเหตุ</label><br>
                                    <textarea name="remark" id="remark" rows="5" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="btnSaveLeave">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="modal fade" id="detailsModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl" style="width:1200px" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" style="padding: 0px 10px;margin: 10px 0px;font-weight: 600;"><i class="ti-pencil-alt mr-3"></i> Receive Details</h3>
                    <button type="button" class="btn-close me-2 mb-3" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group row mb-2" style="padding: 0px 10px;padding-bottom: 20px;margin: 10px 0px;">
                        <div class="col-lg-12 mb-3">
                            <label class="col-form-label">
                                <h5 style="font-weight: 600;"><i class="ti-file" style="padding-right: 7px;"></i>Form input location stock</h5>
                            </label>

                            <button type="button" class="btn btn-circle btn-secondary float-end" id="btnDownload">Download</button>
                        </div>

                        <div class="col-lg-3">
                            <label for="edtMainMenu" class="form-label">Document Number</label>
                            <input type="text" id="docNumber" class="form-control">
                        </div>
                        <div class="col-lg-3">
                            <label for="edtOrderNo" class="form-label">Invoice Number</label>
                            <input type="text" id="invNumber" class="form-control">
                        </div>

                        <div class="col-lg-3">
                            <label for="edtOrderNo" class="form-label">PO Number</label>
                            <input type="text" id="poNumber" class="form-control">
                        </div>
                        <div class="col-lg-3">
                            <label for="edtMainIcon" class="form-label">Create Date</label>
                            <input type="text" id="invDate" class="form-control">
                        </div>
                    </div>

                    <div class="form-group row mb-2" style="padding: 0px 10px;padding-bottom: 20px;margin: 10px 0px;">
                        <div class="col-lg-3">
                            <label for="edtOrderNo" class="form-label">Date</label>
                            <input type="Date" id="edtOrderNo" class="form-control">
                        </div>
                        <div class="col-lg-3">
                            <label for="edtOrderNo" class="form-label">Date</label>
                            <input type="Date" id="edtOrderNo" class="form-control">
                        </div>
                        <div class="col-lg-6">
                            <label for="edtOrderNo" class="form-label">Supplier Name </label>
                            <input type="text" id="edtOrderNo" class="form-control">
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row mb-3 mt-3" style="padding: 0px 10px;padding-bottom: 20px;margin: 10px 0px;">
                        <div class="col-lg-2">
                            <button type="button" class="btn btn-circle btn-success" id="btnDownload"><i class="ti-plus"></i>Add</button>
                        </div>
                        <div class="col-lg-10">
                            <button type="button" class="btn btn-circle btn-danger float-end" id="btnDownload"><i class="ti-file"></i> PDF</button>
                            <button type="button" class="btn btn-circle btn-light float-end me-2" id="btnDownload"><i class="ti-printer"></i> Print</button>
                        </div>

                    </div>
                    <div class="form-group row mb-3 mt-3" style="padding: 0px 10px;padding-bottom: 20px;margin: 10px 0px;">
                        <div class="table-responsive text-nowrap">
                            <div class="card-datatable table-responsive pt-0">
                                <table class="table card-table border" style="width:100%" id="tblReceiveDetail">
                                    <thead>
                                        <tr>
                                            <th class="text-center">NO.</th>
                                            <th class="text-center">BRAND</th>
                                            <th class="text-center">PRODUCT</th>
                                            <th class="text-center">MODEL</th>
                                            <th class="text-center">DESCRIPTION</th>
                                            <th class="text-center">QTY</th>
                                            <th class="text-center">PRICE</th>
                                            <th class="text-center">ACTION</th>
                                        </tr>
                                    <tbody class="table-border-bottom-0 text-center">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="btnSaveEdit">Save changes</button>
                </div>
            </div>
        </div>
    </div>