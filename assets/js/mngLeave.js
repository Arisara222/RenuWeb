    $(document).ready(function () {
        const table = intializeTable();
    });
    function intializeTable() {
        $.ajax({
            url: API_URL + "Manage_leave/show_leave",
            type: 'GET',
            dataType: 'json',
        })
        .done(function(data) {
            console.log(data); // Use console.log for better debugging
            return $('#tblEmployee').DataTable({
                data: data,
                destroy: true,
                columns: [
                    { data: null, render: function(data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                        },className:'text-center'
                    },
                    { data: 'sa_firstname',className:'text-center' },
                    { data: 'sa_lastname',className:'text-center' },
                    { data: 'ild_created_date',className:'text-center' },
                    { data: 'ild_leave_kind',className:'text-center' },
                    { data: 'ild_date_start',className:'text-center' },
                    { data: 'ild_date_end',className:'text-center' },
                    { data: 'ild_start_date',className:'text-center' },
                    { data: 'ild_start_date',className:'text-center' },
                    { data: null, "render": function(data, type, row) {
                        return calculateTimeDifference(row.ild_date_start, row.ild_date_end);
                    }},
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
        // Send the form data using AJAX
        $.ajax({
            url: API_URL + "Manage_leave/insert_leave",
            type: 'POST',
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