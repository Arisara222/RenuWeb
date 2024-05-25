    $(document).ready(function () {
        
        const table = intializeTable();
        calculateDays();
    });

    function intializeTable() {
        $.ajax({
            url: API_URL + "Manage_leave/show_leave_approve",
            type: 'GET',
            dataType: 'json',
        })
        .done(function(data) {
            console.log(data); // Use console.log for better debugging
            return $('#tblLeaveApprove').DataTable({
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
                
                    {
                        data: null,
                        render: function(data) {
                            return `
                                <button href="javascript:void(0)" class="btn btn-success float-center" id="btnApprove" data-id="${data.ild_id}"><i class="ti-check-box"></i> Approve</button>
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
        var start = new Date(startTime);
        var end = new Date(endTime);
    
        // Calculate the time difference in milliseconds
        var timeDiff = Math.abs(end - start);
    
        // Convert milliseconds to hours
        var hours = Math.floor(timeDiff / (1000 * 60 * 60 * 24));
    
        return hours;
    }

    $('#tblLeaveApprove').on('click', '#btnApprove', function () {
        var ild_id = $(this).data('id');
        // alert(ild_id);
        // Use SweetAlert to confirm deletion
        Swal.fire({
            title: 'Are you sure?',
            text: 'You are about to approve this record!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, approve it!'

        }).then((result) => {
            // If user confirms deletion
            if (result.isConfirmed) {
                // Send AJAX request to delete the record
                $.ajax({
                    url: API_URL + "Manage_leave/approve_leave",
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        ild_id: ild_id
                    }
                }).done(function(data) {
                    Swal.fire({
                        title: 'Approve!',
                        text: 'The record has been approve.',
                        icon: 'success'
                    }).then(() => {
                        // Reload the receive detail
                        reloadTable();
                    });
           
                })
            }
        });
    });

    function reloadTable(){
        const table = intializeTable();
        table.ajax.reload( null, false );
    }