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
                            if (hours > 8 || (hours === 8 && minutes > 0)) {
                                // Calculate extra minutes
                                var extraMinutes = (hours - 8) * 60 + minutes;
                                return extraMinutes;
                            } else {
                                return 0;
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
                            if (hours > 8 || (hours === 8 && minutes > 0)) {
                                // Calculate extra minutes
                                var extraMinutes = (hours - 8) * 60 + minutes;
                                return extraMinutes + 15;
                            } else {
                                return 0;
                            }
                        }
                    },
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

    function calculateExtraMinutes(timeIn) {
        // Split time string to extract hours and minutes
        var timeParts = timeIn.split(":");
        var hours = parseInt(timeParts[0]);
        var minutes = parseInt(timeParts[1]);
    
        // Check if time exceeds 8:00 AM
        if (hours > 8 || (hours === 8 && minutes > 0)) {
            // Calculate extra minutes
            var extraMinutes = (hours - 8) * 60 + minutes;
            return extraMinutes;
        } else {
            return 0;
        }
    }
    function calculateExtraTotalMinutes(timeIn) {
        // Split time string to extract hours and minutes
        var timeParts = timeIn.split(":");
        var hours = parseInt(timeParts[0]);
        var minutes = parseInt(timeParts[1]);
    
        // Check if time exceeds 8:00 AM
        if (hours > 8 || (hours === 8 && minutes > 0)) {
            // Calculate extra minutes
            var extraMinutes = (hours - 8) * 60 + minutes;
            return extraMinutes+15;
        } else {
            return 0;
        }
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

    var daysOfWeek = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];

// Function to get the day name from a date string
function getDayName(dateString) {
    var date = new Date(dateString);
    var dayIndex = date.getDay();
    return daysOfWeek[dayIndex];
}

    function showReportTime(id) {
        $.ajax({
            url: API_URL + "Manage_timesheet/show_timesheet_view",
            type: 'GET',
            dataType: 'json',
            data: {
                id: id
            }
        })
        .done(function(data) {
            console.log(data); // Use console.log for better debugging
            
            // Clear existing table content
            $('#tblTimeReport tbody').empty();
            
            // Iterate through the data and append rows to the table
            $.each(data, function(index, item) {
                var html = '<tr>' +
                    '<td class="text-center">' + (index + 1) + '</td>' +
                    '<td class="text-center">' + item.its_date + '</td>' +
                    '<td class="text-center">' + getDayName(item.its_date) + '</td>' +
                    '<td class="text-center">' + item.its_time_in + '</td>' +
                    '<td class="text-center">' + item.its_time_out + '</td>' +
                    '<td class="text-center">' + item.its_ot + '</td>' +
                    '<td class="text-center">' + calculateTimeDifference(item.its_time_in, item.its_time_out) + '</td>' +
                    '<td class="text-center '+(getDayName(item.its_date) == "Sunday" ? 'text-danger' : '')+'">' + item.its_remark + '</td>' +
                    '<td class="text-center text-danger">' + calculateExtraMinutes(item.its_time_in) + '</td>' +
                    '<td class="text-center text-danger">' + calculateExtraTotalMinutes(item.its_time_in) + '</td>' +
                    '</tr>';
                $('#tblTimeReport tbody').append(html);
            });
        })
        .fail(function(xhr, status, error) {
            // Handle error
            console.error(error);
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

    $('#tblTimesheet').on('click', '#btnView', function (ev) {
        $('#viewModal').modal('show');
        var id = $(this).data('id');
        showReportTime(id);
    });

