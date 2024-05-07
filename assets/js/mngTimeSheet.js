$(document).ready(function () {
    const table = intializeTable();
});
    function intializeTable() {
        $.ajax({
            url: API_URL + "Manage_timesheet/show_timesheet",
            type: 'GET',
            dataType: 'json',
        })
        .done(function(data) {
            console.log(data); // Use console.log for better debugging
            return $('#tblTimesheet').DataTable({
                data: data,
                destroy: true,
                columns: [
                    { data: null, render: function(data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                        },className:'text-center'
                    },
                    { data: 'sa_firstname',className:'text-center' },
                    { data: 'sa_lastname',className:'text-center' },
                    { data: 'its_date',className:'text-center' },
                    { data: 'its_time_in',className:'text-center' },
                    { data: 'its_time_out',className:'text-center' },
                    { data: 'its_ot',className:'text-center' },
                    { data: null, "render": function(data, type, row) {
                        return calculateTimeDifference(row.its_time_in, row.its_time_out);
                    }},
                    { data: 'its_remark',className:'text-center' },
                    { 
                        "data": "its_time_in", 
                        "render": function(data, type, row) {
                            // Split time string to extract hours and minutes
                            var timeParts = data.split(":");
                            var hours = parseInt(timeParts[0]);
                            var minutes = parseInt(timeParts[1]);
        
                            // Check if time exceeds 70:00 (7:00 AM)
                            if (hours > 7 || (hours === 7 && minutes > 0)) {
                                // Calculate extra minutes
                                var extraMinutes = (hours - 7) * 60 + minutes;
                                return extraMinutes;
                            } else {
                                return data;
                            }
                        }
                    },
                    { 
                        "data": "its_time_in", 
                        "render": function(data, type, row) {
                            // Split time string to extract hours and minutes
                            var timeParts = data.split(":");
                            var hours = parseInt(timeParts[0]);
                            var minutes = parseInt(timeParts[1]);
        
                            // Check if time exceeds 70:00 (7:00 AM)
                            if (hours > 7 || (hours === 7 && minutes > 0)) {
                                // Calculate extra minutes
                                var extraMinutes = (hours - 7) * 60 + minutes;
                                return extraMinutes + 15;
                            } else {
                                return data;
                            }
                        }
                    },
                    { data: 'its_id', render: function(data) {
                        return '<a href="javascript:void(0)" class="btn btn-warning float-center" id="btnEdit" data-id="' + data + '"><i class="ti-pencil"></i> Edit</a>';
                    },className:'text-center'}
                ],
            });
        })
    }

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

    function showUsername() {
        $.ajax({
            url: API_URL + "Manage_timesheet/show_username",
            type: 'GET',
            dataType: 'json',
        })
        .done(function(data) {
            $('#selUsername').empty();
            // Append new options from data received
            
            $.each(data, function(index, item) {
                $('#selUsername').append($('<option>', {
                    value: item.sa_id,
                    text: item.sa_firstname + ' ' + item.sa_lastname,
                    'data-id': item.isd_id
                }));

            });
        });
    }

    function showEditTime() {
        $.ajax({
            url: API_URL + "Manage_timesheet/show_time_edit",
            type: 'GET',
            dataType: 'json',
        })
        .done(function(data) {
            $('#selEditUsername').empty();
            // Append new options from data received
            console.log(data);

        $('#inpEditDate').val(data.result2[0].its_date);
        $('#inpEditTimeStart').val(data.result2[0].its_time_in);
        $('#inpEditTimeEnd').val(data.result2[0].its_time_out);
        $('#inpEditRemark').val(data.result2[0].its_remark);
        $('#inpEditOt').val(data.result2[0].its_ot);

            $.each(data.result1, function(index, item) {
                $('#selEditUsername').append($('<option>', {
                    value: item.sa_id,
                    text: item.sa_firstname + ' ' + item.sa_lastname,
                    'data-id': item.isd_id
                }));

            });
        });
    }

    function insertTime() {
        var username = $('#selUsername').val();
        var date = $('#inpDate').val();
        var timeStart = $('#inpTimeStart').val();
        var timeEnd = $('#inpTimeEnd').val();
        var remark = $('#inpRemark').val();
        var inpOt = $('#inpOt').val();
        // Prepare data object to send via AJAX
        var formData = {
            username: username,
            date: date,
            timeStart: timeStart,
            timeEnd: timeEnd,
            remark: remark,
            inpOt: inpOt
        };
        $.ajax({
            url: API_URL + "Manage_timesheet/insert_timesheet",
            type: 'POST',
            dataType: 'json',
            data: formData
        })
        .done(function(data) {
            $('#createModal').modal('hide');
            showTimeSheet();
        });
    }

    $('#btnCreate').click(function(){
        $('#createModal').modal('show');
        showUsername();
    })

    $('#btnSaveAdd').click(function(){
        insertTime();
    })

    $('#tblTimesheet').on('click', '#btnEdit', function (ev) {
        $('#editModal').modal('show');
        var id = $(this).data('id');
        showEditTime(id);
    });

