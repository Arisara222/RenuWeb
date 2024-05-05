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
                        return '<a href="javascript:void(0)" class="btn btn-warning float-center" id="btnEditBrand" data-id="' + data + '"><i class="ti-pencil"></i> Edit</a>';
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

$('#btnCreate').click(function(){
    $('#createModal').modal('show');
})

