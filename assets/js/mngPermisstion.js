$(() => {

    // Function to show Main Menu
    function showGroupDetail() {
        var url = API_URL + "Manage_permis_detail/show_group";
        $.ajax({
            method: "get",
            url: base_url("ManagePermision/callApiShowData?url=" + url),
            dataType: 'Json',

            success: (response) => {
                for (let i = 0; i < response.length; i++) {
                    const data = response[i];
                    $('.selGroup').append(`<option value="${data.spg_id}">${data.spg_name}</option>`);
                }
            },
            error: (err) => {
                console.log(err);
            },
        });
    }

    // Show Main Menu on page load
    showGroupDetail();

    // Event handler for clicking the search button
    $(document).on('click', '#btnSerchMain', function () {
        
        loadData();
    });
})


function loadData() {
    
    MainmenuDropdown();
    SubmenuDropdown();
    shDataTable(); // เรียกเพื่อโหลดข้อมูลในตารางเมื่อหน้าเว็บโหลด
}

function shDataTable() {
    var permisId = $('#selGroup').val();

    if (permisId == '') {
        Swal.fire({
            icon: 'warning',
            title: 'Ooops..',
            html: 'Please choose Main Menu',
        });
    } else {
        var x = document.getElementById("content");
        if (x.style.display === "none") {
            x.style.display = "block";
        }
        var url = API_URL + "Manage_permis_detail/show_tb?permisId=" + permisId;
        $.ajax({
            method: "POST",
            url: base_url("ManagePermision/callApiShowTable?url=" + url),
            data: {
                permisId: permisId,
            },
            dataType: 'Json',
            success: (data) => {
                var html = "";
                for (let i = 0; i < data.length; i++) {
                    html += `
                        <tr>
                            <td>${i + 1}</td>
                            <td>${data[i].smm_name}</td>
                            <td>${data[i].ssm_name}</td>
                            <td class="">${data[i].spd_updated_date}</td>
                            <td class="">${data[i].spd_updated_by}</td>
                            <td>
                                <button class="btnStatus rounded-3 fw-semibold badge bg-${data[i].spd_status_flg == 1 ? 'success' : 'danger'} me-1" id="flgStatus" data-sa-id="${data[i].spd_id}" value="${data[i].spd_status_flg}">${data[i].spd_status_flg == 1 ? 'Enable' : 'Disable'}</button>
                            </td>
                            <td class="">
                                <a href="" class="tblEditBtn btn btn-warning" data-bs-toggle="modal" data-bs-target="#mdlEdit" id="btnEdit" data-id="${data[i].spd_id}">
                                    <i class="bx bxs-edit"></i><div class="fas fa-edit"></div></i>
                                </a>
                            </td>
                        </tr>`;
                }

                $('#tblPermis tbody').html(html)
                $('#tblPermis').DataTable()                                
                    .promise()
                    .done(() => {
                        $("#tblPermis").DataTable({
                            scrollX: true,
                        });
                    });
            },
            error: (err) => {
                console.log(err);
            },
        });
    }
}


function MainmenuDropdown() {
    var dropdown = $('#selMenuGroupName');

    // เรียก API
    $.ajax({
        method: "get",
        url: "http://127.0.0.1/api/Manage_permis_detail/drop_main",
        dataType: 'json',
        success: (response) => {
            console.log(response); // ดูข้อมูลที่ได้รับจาก API ใน Console Log

            // ล้างค่าเดิมทั้งหมดใน dropdown ก่อน
            dropdown.empty();

            // วนลูปเพื่อเพิ่ม options เข้าไปใน dropdown
            for (let i = 0; i < response.length; i++) {
                const menu = response[i];
                dropdown.append(`<option value="${menu.smm_id}">${menu.smm_name}</option>`);
            }
            $('#selMenuGroupName').trigger('change');
        },
        error: (err) => {
            console.log(err);
        },
    });
}


function SubmenuDropdown() {
    var mainMenuId = $('#selMenuGroupName').val(); // Get the selected main menu ID
    // alert(mainMenuId);
    var dropdown = $('#selSubMenuName');

    if (!mainMenuId) {
        // If no main menu is selected, clear the submenu dropdown
        dropdown.empty();
        dropdown.append('<option value="">Choose sub menu</option>');
        return;
    }

    // Call the API
    $.ajax({
        method: "POST",
        url: "http://127.0.0.1/api/Manage_permis_detail/drop_sub",
        data: { main_menu_id: mainMenuId }, // Send the main menu ID as a parameter
        dataType: 'json',
        
        success: (response) => {
            console.log(response); // Log the response from the API

            // Clear existing options in the dropdown
            dropdown.empty();
            // Loop through the response and add options to the dropdown
            for (let i = 0; i < response.length; i++) {
                const menu = response[i];
                dropdown.append(`<option value="${menu.ssm_id}">${menu.ssm_name}</option>`);
            }
        },
        error: (err) => {
            console.log(err);
        },
    });
}

// Attach the event listener to the main menu dropdown
$('#selMenuGroupName').change(SubmenuDropdown);


//-------------------------- Update flg status ----------------------------------

$(document).on('click', '.btnStatus', function () {
    const detailId = $(this).data('sa-id');
    var newStatus = $(this).closest('td').find('.btnStatus').val();

    if (newStatus == 1) {
        newStatus = 0;
    } else if (newStatus == 0) {
        newStatus = 1;
    }

    Swal.fire({
        title: 'Are you Sure',
        text: "You want to Changed Status ?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            var url = API_URL + "Manage_permis_detail/update_flg";
            $.ajax({
                url: base_url('ManagePermision/callApiUpdateStatus?url=') + url,
                type: 'POST',
                data: {
                    detailId: detailId,
                    newStatus: newStatus,
                },
                dataType: 'json',
                success: function (response) {
                    if (response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            html: 'Changed Status Success!',
                            timer: 2500,
                        }).then(() => {
                            shDataTable();
                            location.reload();
                        });
                    } else {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Warning!',
                            html: 'Change status Fail',
                            timer: 2500,
                        });
                    }
                },
                error: function (error) {
                    console.log(error);
                }
            });
        }
    });
});



//-------------------------- add Permiss ----------------------------------

$(document).ready(function () {
    $('#btnSaveAddPer').on('click', function () {
        var arrDataAdd = [];
        var PermisID = $('#selGroup').val();
        var MenuGroup = $('#selMenuGroupName').val();
        var SubMenu = $('#selSubMenuName').val();


        if (MenuGroup == '') {
            Swal.fire({
                icon: 'warning',
                title: 'Oops...',
                text: 'Please choose MenuGroup code',
            })
        } else if (SubMenu == '') {
            Swal.fire({
                icon: 'warning',
                title: 'Oops...',
                text: 'Please choose SubMenu',
            })
        }  else {
            Swal.fire({
                title: 'Are you sure?',
                text: "Do you want to add Permission",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, add Permission!'
            }).then((result) => {
                if (result.isConfirmed) {
                    var url = API_URL + 'Manage_permis_detail/insert_permiss';
                    const formData = new FormData()
                    formData.append('PermisID', PermisID);
                    formData.append('MenuGroup', MenuGroup);
                    formData.append('SubMenu', SubMenu);

                    
                    $.ajax({
                        url: base_url('ManagePermision/callApiAddPermiss'),
                        type: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false,
                        cache: false,
                        dataType: 'json',
                        success: function(res) {
                            if (res.result == 1) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success !',
                                    html: 'Add Permission success',
                                    timer: 2500,
                                }).then(() => {
                                    // $('#btnBack').trigger('click');
                                    shDataTable()
                                    location.reload();
                                    
                                });
                            } else if (res.result == 9) {
                                Swal.fire({
            
                                    icon: 'warning',
                                    title: 'Ooops...',
                                    html: 'This permission already exists.',
                                }).then(() => {
                                    
                                });
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Ooops...',
                                    html: 'A system error has occurred.',
                                });
                            }
                        }
                    });
                }
            });
        }
    });
});