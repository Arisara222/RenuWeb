<style>
    .img-circle {
        border-radius: 50%;
        width: 250px;
        height: 250px;
    }

    .custom-control {
        display: flex;
        align-items: center;
        margin-right: 15px;
    }

    .custom-control input[type="checkbox"],
    .custom-control input[type="radio"] {
        display: none;
    }

    .custom-control label {
        position: relative;
        padding-left: 25px;
        cursor: pointer;
    }

    .custom-control label::before {
        content: "";
        position: absolute;
        left: 0;
        top: 50%;
        transform: translateY(-50%);
        width: 16px;
        height: 16px;
        border: 1px solid #ccc;
        border-radius: 4px;
        background-color: #fff;
    }

    .custom-control input[type="checkbox"]:checked+label::before {
        background-color: #28a745;
        border: none;
        content: "\2713";
        color: white;
        font-size: 12px;
        text-align: center;
        line-height: 16px;
    }

    .custom-control input[type="radio"]:checked+label::before {
        background-color: #ffc107;
        border-radius: 50%;
        border: none;
    }

    .custom-control input[type="radio"]+label::before {
        border-radius: 50%;
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
                                            <img src="http://127.0.0.1/api/uploads/profile.png" class="img-circle" height="200px" weidth="200px" id="imgProfile" alt="">
                                        </div>

                                    </div><br>
                                    <hr><br>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <h5 id="userName">Name : </h5>
                                        </div>

                                        <h6 id="position">Position : </h6>
                                        <h6 id="leaveBalance">Leave Balance : </h6>

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
                                    <div class="col-lg-6">
                                        <label for="inpDateStart" class="form-label">จากวันที่</label>
                                        <input type="date" id="startDate" name="startDate" class="form-control" value="<?= date('Y-m-d')?>">

                                    </div>
                                    <div class="col-lg-6">
                                        <label for="inpDateEnd" class="form-label">ถึงวันที่</label>
                                        <input type="date" id="endDate" name="endDate" class="form-control" value="<?= date('Y-m-d')?>">

                                    </div>

                                </div><br>
                                <input type="hidden" id="isHalfDayValue" value="0">
                                <div class="row">
                                    <div class="col-lg-12 d-flex align-items-center">
                                        <div class="custom-control">
                                            <input type="checkbox" id="isHalfDay" name="isHalfDay">
                                            
                                            <label for="isHalfDay">ลาไม่เต็มวัน</label>
                                        </div>
                                        <div class="custom-control ch" style="display:none">
                                            <input type="radio" id="firstHalf" name="leaveKind" value="ลาครึ่งแรก" checked>
                                            <label for="firstHalf">ลาครึ่งแรก</label>
                                        </div>
                                        <div class="custom-control ch" style="display:none">
                                            <input type="radio" id="secondHalf" name="leaveKind" value="ลาครึ่งหลัง">
                                            <label for="secondHalf">ลาครึ่งหลัง</label>
                                        </div>
                                    </div><br><br>
                                    <div class="col-lg-6 ch" style="display:none">
                                        <label for="" class="form-label">Start</label>
                                        <input type="text" id="timeStart" name="timeHalf" class="form-control" disabled>
                                    </div>
                                    <div class="col-lg-6 ch" style="display:none">
                                        <label for="" class="form-label">End</label>
                                        <input type="text" id="timeEnd" name="timeHalf" class="form-control" disabled>
                                    </div>
                                </div><br>
                                <div class="row">
                                <div class="col-lg-6">
                                        <label for="days" class="form-label">รวมเวลา</label>
                                        <input type="text" id="daysCount" name="daysCount" class="form-control">

                                </div>
                                <div class="col-lg-6">
                                    <label for="inpFile" class="form-label">แนบใบรับรองแพทย์</label><br>
                                    <input type="file" id="medicalCertificate" name="medicalCertificate" class="form-control">
                                </div>
                                </div><br>
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

    <div class="modal fade" id="viewLeaveModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" style="padding: 0px 10px;margin: 10px 0px;font-weight: 600;"><i class="ti-pencil-alt mr-3"></i> Register Leave Information</h3>
                    <button type="button" class="btn-close me-2 mb-3" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  
                    

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="btnSaveLeave">Save changes</button>
                </div>
                </form>
            </div>
        </div>
</div>
