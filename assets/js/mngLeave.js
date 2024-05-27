    $(document).ready(function () {
        
        const table = intializeTable();
        calculateDays();
        });

    
    function calculateTimeDifference(startTime, endTime) {
        // Convert start time and end time to Date objects
        var start = new Date(startTime);
        var end = new Date(endTime);
    
        // Calculate the time difference in milliseconds
        var timeDiff = Math.abs(end - start);
    
        // Convert milliseconds to hours
        var hours = Math.floor(timeDiff / (1000 * 60 * 60 * 24));
    
        return hours;
    }

    function calculateDays() {
        
        var startDate = $('#startDate').val();
        var endDate = $('#endDate').val();
        var isHalfDay = $('#isHalfDay').is(':checked');
        var leaveKind = $('input[name="leaveKind"]:checked').val();

        if (startDate && endDate) {
            var start = new Date(startDate);
            var end = new Date(endDate);
            var timeDiff = end.getTime() - start.getTime();
            var diffDays = "";
            
            if (isHalfDay && startDate === endDate) {
                    
                if (leaveKind === "ลาครึ่งแรก") {
                    diffDays += "ลารวม 0 วัน 4 ชั่วโมง 0 นาที";
                } else {
                    diffDays += "ลารวม 0 วัน 4 ชั่วโมง 0 นาที";
                }
            } else {
                diffDays += "ลารวม "+ Math.ceil(timeDiff / (1000 * 3600 * 24)) + " วัน 0 ชั่วโมง 0 นาที";
            }
            $('#daysCount').val(diffDays);
        } else {
            $('#daysCount').val('');
            $('#totalTime').text("ลารวม 0 วัน 0 ชั่วโมง 0 นาที");
        }
        
    }

    $('#startDate, #endDate, #isHalfDay, input[name="leaveKind"]').on('change', function() {
        calculateDays();
    });

    $('#startDate').change(function() {
        var startDate = $(this).val();
        $('#endDate').attr('min', startDate);
        $('#endDate').val(startDate); // Reset end date value
        $('#endDate').removeAttr('disabled');
        calculateDays();
    });

    $('#isHalfDay').change(function() {
        if ($(this).is(':checked')) {
            $('.ch').show();
            var today = new Date().toISOString().split('T')[0]; // Get today's date in YYYY-MM-DD format
            $('#startDate').val(today);
            $('#endDate').val(today);
            $('#endDate').attr('disabled', true);
        } else {
            $('.ch').hide();
            $('#endDate').removeAttr('disabled');
        }
        calculateDays();
    });

    $('#startDate').trigger('change');

    function reloadTable() {
        const table = intializeTable();
        table.ajax.reload( null, false );
    }

    function intializeTable() {
        $.ajax({
            url: API_URL + "Manage_leave/show_leave",
            type: 'GET',
            dataType: 'json',
        })
        .done(function(data) {
            console.log(data); // Use console.log for better debugging
            return $('#tblLeave').DataTable({
                data: data,
                destroy: true,
                columns: [
                    { data: null, render: function(data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                        },className:'text-center'
                    },
                    {
                        data: null,
                        render: function(data) {
                            return data.sa_firstname +''+ data.sa_lastname;
                        },
                        className: 'text-center'
                    },
                    { data: 'ild_created_date',className:'text-center' },
                    { data: null, "render": function(data, type, row) {
                        if(data.ild_type_leave == '0'){
                        
                            return 'ลาเต็มวัน';
                        }else{

                            return 'ลาไม่เต็มวัน';
                        }
                  
                }},
                    { data: null, "render": function(data, type, row) {
                            return data.ild_date_start +' '+ data.ild_time_start;
                      
                    }},
                    { data: null, "render": function(data, type, row) {
                            return data.ild_date_end +' '+ data.ild_time_end;
                      
                    }},
                    { data: null, "render": function(data, type, row) {
                        if(data.ild_type_leave == '0'){

                            return calculateTimeDifference(row.ild_date_start, row.ild_date_end);
                        }else{

                            return '0.5';
                        }
                    }},
                    { data: null, "render": function(data, type, row) {
                        var [statusFlg,colorFlg] = data.ild_status == '1' ? ['อนุมัติ','btn-success'] :  ['รออนุมัติ','btn-warning'];
                        return `
                        <button type="button" id="flgStatus" class="btn btn-circle ${colorFlg} btnStatus" data-id="${data.ild_id}">${statusFlg}</button>

                    `;
                        
                    }},
                    {
                        data: null,
                        render: function(data) {
                            var [statusFlg,colorFlg] = data.ild_status == '0' ? ['','btn-danger'] :  ['disabled','btn-secondary'];
                            return `
                                <button href="javascript:void(0)" class="btn ${colorFlg} float-center" id="btnDelete" data-id="${data.ild_id}" ${statusFlg}><i class="ti-trash"></i> Cancel</button>
                            `;
                        },
                        className: 'text-center'
                    }
                ],
            });
        })
    }

    function showEmployee() {
        $.ajax({
            url: API_URL + "Manage_timesheet/show_username",
            type: 'GET',
            dataType: 'json',
        })
        .done(function(data) {
            $('#employeeName').empty();
            // Append new options from data received
            $('#employeeName').append($('<option>', {
                value: "",
                text: "- Select Employee -",
                disabled: true,
                selected: true
            }));
            $.each(data, function(index, item) {
                $('#employeeName').append($('<option>', {
                    value: item.sa_id,
                    text: item.sa_firstname + ' ' + item.sa_lastname,
                }));

            });
        });
    }           

    function showTypeLeave() {
        $.ajax({
            url: API_URL + "Manage_leave/show_type_leave",
            type: 'GET',
            dataType: 'json',
        })
        .done(function(data) {
            $('#leaveType').empty();
            // Append new options from data received
            $('#leaveType').append($('<option>', {
                value: "",
                text: "- Select Type -",
                disabled: true,
                selected: true
            }));
            $.each(data, function(index, item) {
                $('#leaveType').append($('<option>', {
                    value: item.mld_id,
                    text: item.mld_name,
                }));

            });
        });
    }    
    
    
    $('#tblLeave').on('click', '#btnDelete', function () {
        var ild_id = $(this).data('id');
        // alert(ild_id);
        // Use SweetAlert to confirm deletion
        Swal.fire({
            title: 'Are you sure?',
            text: 'You are about to delete this record!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'

        }).then((result) => {
            // If user confirms deletion
            if (result.isConfirmed) {
                // Send AJAX request to delete the record
                $.ajax({
                    url: API_URL + "Manage_leave/deleteLeave",
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        ild_id: ild_id
                    }
                }).done(function(data) {
                    Swal.fire({
                        title: 'Deleted!',
                        text: 'The record has been deleted.',
                        icon: 'success'
                    }).then(() => {
                        // Reload the receive detail
                        reloadTable();
                    });
           
                })
            }
        });
        });

    $('#btnRegisterLeave').click(function () {
        $('#addLeaveModal').modal('show');
        showEmployee();
        showTypeLeave();
    });

    $('#btnSaveLeave').on('click', function(e) {
        e.preventDefault(); // Prevent default button behavior
        // Create a FormData object to handle file uploads
        var hhd = $('#isHalfDayValue').val();
        alert(hhd);
        var formData = new FormData();
        formData.append('medicalCertificate', $('#medicalCertificate')[0].files[0]);
        formData.append('leaveType', $('#leaveType').val());
        formData.append('employeeName', $('#employeeName').val());
        formData.append('startDate', $('#startDate').val());
        formData.append('endDate', $('#endDate').val());
        formData.append('HalfDayValue', $('#isHalfDayValue').val());
        formData.append('remark', $('#remark').val());
        if(hhd == '1'){
            
            formData.append('timeStart', $('#timeStart').val());
            formData.append('timeEnd', $('#timeEnd').val());
        }else{
            formData.append('timeStart', "00:00:00");
            formData.append('timeEnd', "00:00:00");
        }
        // Send the form data using AJAX
        $.ajax({
            url: API_URL + "Manage_leave/insert_leave",
            type: 'POST',
            dataType: 'json',
            data: formData,
            contentType: false, // Necessary for file uploads
            processData: false, // Necessary for file uploads
            success: function(response) {
                Swal.fire({
                    title: "Success!",
                    text: "Form submitted successfully",
                    icon: "success"
                });
                $('#addLeaveModal').modal('hide');
                reloadTable();
            }
        });
    });

    $('#employeeName').change(function() {
        var id = $(this).val();
        $.ajax({
            url: API_URL + "Manage_timesheet/show_username_all",
            type: 'POST',
            dataType: 'json',
            data: {
                id: id
            },
            success: function(data) {
                if(data[0].sad_picture != null){
                    
                    $('#imgProfile').attr('src', 'http://127.0.0.1/api/uploads/'+data[0].sad_picture);
                }else{
                    $('#imgProfile').attr('src', 'http://127.0.0.1/api/uploads/profile.png');
                }

                // Update the user name
                $('#userName').text('Name : '+data[0].sa_firstname +' '+ data[0].sa_lastname);
    
                // Update the position
                $('#position').text( 'Position : '+ data[0].mp_name);
    
                // Update the leave balance
                $('#leaveBalance').text('Leave Balance : '+data[0].sad_leave_balance);
                }
        })
    })

    $('#isHalfDay').change(function() {
        if ($(this).is(':checked')) {
            $('.ch').show();
            $('#isHalfDayValue').val('1');
        } else {
            $('.ch').hide();
            $('#isHalfDayValue').val('0');
        }
        $('#timeStart').val("08:00:00");
            $('#timeEnd').val("12:00:00");
    });
    
    $('input[name="leaveKind"]').change(function(){
        // Get the value of the selected radio button
        var selectedValue = $(this).val();
        if(selectedValue == "ลาครึ่งแรก") {
            $('#timeStart').val("08:00:00");
            $('#timeEnd').val("12:00:00");
        }else{
            $('#timeStart').val("13:00:00");
            $('#timeEnd').val("17:00:00");
        }
    });

    $('#addLeaveModal').on('hidden.bs.modal', function() {
        $('#imgProfile').attr('src', 'http://127.0.0.1/api/uploads/profile.png');
    

    // Update the user name
    $('#userName').text('Name : ');

    // Update the position
    $('#position').text( 'Position : ');

    // Update the leave balance
    $('#leaveBalance').text('Leave Balance : ');
    });

