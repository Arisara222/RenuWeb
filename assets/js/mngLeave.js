    $(document).ready(function () {
        const table = intializeTable();
    });
    
    function calculateTimeDifference(startTime, endTime) {
        // Convert start time and end time to Date objects
        var start = new Date("2024-05-05 " + startTime);
        var end = new Date("2024-05-05 " + endTime);
    
        // Calculate the time difference in milliseconds
        var timeDiff = Math.abs(end - start);
    
        // Convert milliseconds to hours
        var hours = Math.floor(timeDiff / 1000 / 60 / 60);
    
        return hours;
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
                    { data: 'ild_leave_kind',className:'text-center' },
                    { data: 'ild_date_start',className:'text-center' },
                    { data: 'ild_date_end',className:'text-center' },
                    { data: null, "render": function(data, type, row) {
                        return calculateTimeDifference(row.ild_date_start, row.ild_date_end);
                    }},
                    { data: 'ild_status',className:'text-center' },
                    {
                        data: null,
                        render: function(data) {
                            return `
                                <a href="javascript:void(0)" class="btn btn-info float-center" id="btnView" data-id="${data.sa_id}"><i class="ti-search"></i> View</a>
                                <a href="javascript:void(0)" class="btn btn-warning float-center" id="btnEdit" data-id="${data.its_id}"><i class="ti-pencil"></i> Edit</a>
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
        
    $('#btnRegisterLeave').click(function () {
        $('#addLeaveModal').modal('show');
        showEmployee();
        showTypeLeave();
    });

    $('#btnSaveLeave').on('click', function(e) {
        e.preventDefault(); // Prevent default button behavior
        // Create a FormData object to handle file uploads

        var formData = new FormData();
        formData.append('medicalCertificate', $('#medicalCertificate')[0].files[0]);
        formData.append('leaveType', $('#leaveType').val());
        formData.append('employeeName', $('#employeeName').val());
        formData.append('startDate', $('#startDate').val());
        formData.append('endDate', $('#endDate').val());
        formData.append('leaveKind', $('#leaveKind').val());
        formData.append('remark', $('#remark').val());

        // Send the form data using AJAX
        $.ajax({
            url: API_URL + "Manage_leave/insert_leave",
            type: 'POST',
            dataType: 'json',
            data: formData,
            contentType: false, // Necessary for file uploads
            processData: false, // Necessary for file uploads
            success: function(response) {
                // Handle success
                console.log('Form submitted successfully:', response);
                alert('Form submitted successfully');
            },
            error: function(xhr, status, error) {
                // Handle error
                console.error('Form submission failed:', error);
                alert('Form submission failed');
            }
        });
    });