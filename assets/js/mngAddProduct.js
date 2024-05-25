$(document).ready(function () {
        
    const table = intializeTable();
});

    function intializeTable() {
        $.ajax({
            url: API_URL + "Manage_stock/show_product_all",
            type: 'GET',
            dataType: 'json',
        })
        .done(function(data) {
            console.log(data); // Use console.log for better debugging
            return $('#tblProduct').DataTable({
                data: data,
                destroy: true,
                columns: [
                    { data: null, render: function(data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                        },className:'text-center'
                    },
                    { data: 'mp_name',className:'text-center' },
                    { data: 'mp_indicator',className:'text-center' },
                    { data: 'mp_price',className:'text-center' },
                    {
                        data: null, 
                        render: function(data) {
                          return `
                              <button class="btn btn-warning float-center" id="btnEdit" data-id="${data.mp_id}"><i class="ti-pencil"></i> Edit</button>
                          `;
                      },
                      className: 'text-center'
                      }                   
                ],
            });
        })
    }

    function showEditProduct(id){
        $.ajax({
            url: API_URL + "Manage_stock/show_product_byid",
            type: 'POST',
            dataType: 'json',
            data: {id: id},
        })
        .done(function(data) {
            console.log(data); // Use console.log for better debugging
            $('#inpEidtProduct').val(data[0].mp_name);
            $('#inpEidtIndicator').val(data[0].mp_indicator);
            $('#inpEidtUnit').val(data[0].mp_price);
            
        })
    }

    function reloadTable(){
        const table = intializeTable();
        table.ajax.reload( null, false);
    }

    $('#btnCreate').click(function(){
        $('#mdlAddProduct').modal('show');
    });

    $('#tblProduct').on('click', '#btnEdit', function () {
        $('#mdlEidtProduct').modal('show');
        showEditProduct($(this).data('id'));
    });

    $('#btnSaveAdd').click(function(e) {
        e.preventDefault();
  
          var formData = {
            product: $('#inpProduct').val(),
            indicator: $('#inpIndicator').val(),
            unit: $('#inpUnit').val()
          };
    
          $.ajax({
            url: API_URL + "Manage_stock/insertProduct",
            type: 'POST',
            data: formData,
            dataType: 'json',
            success: function(response) {
              if(response.status == 'success') {
                Swal .fire({
                    icon: 'success',
                    title: 'Success !',
                    html: 'Add product success',
                }).then(() => {
                    reloadTable();
                    $('#mdlAddProduct').modal('hide');
                })
            } else if(response.status == 'Exits') {
                Swal.fire({
                    icon: 'warning',
                    title: 'Warning !',
                    html: 'This product already exists.',
                });
                $('#inpProduct').addClass('border-danger');
              }
            },
            error: function(jqXHR, textStatus, errorThrown) {
              console.error('AJAX error: ' + textStatus + ' : ' + errorThrown);
              alert('An error occurred. Please try again.');
            }
          });
    });

    $('#btnSaveEdit').click(function(e) {
        e.preventDefault();
  
          var formData = {
            product: $('#inpEidtProduct').val(),
            indicator: $('#inpEidtIndicator').val(),
            unit: $('#inpEidtUnit').val()
          };
    
          $.ajax({
            url: API_URL + "Manage_stock/updateProduct",
            type: 'POST',
            data: formData,
            dataType: 'json',
            success: function(response) {
              if(response.status == 'success') {
                Swal.fire({
                    icon: 'success',
                    title: 'Success !',
                    html: 'Update product success',
                }).then(() => {
                    reloadTable();
                    $('#mdlAddProduct').modal('hide');
                })
              } else if(response.status == 'Exits') {
                Swal.fire({
                    icon: 'warning',
                    title: 'Warning !',
                    html: 'This product already exists.',
                })
              }
            },
            error: function(jqXHR, textStatus, errorThrown) {
              console.error('AJAX error: ' + textStatus + ' : ' + errorThrown);
              alert('An error occurred. Please try again.');
            }
          });
    });

    $('#mdlAddProduct').on('hidden.bs.modal', function () {
        $('#inpProduct').val('');
        $('#inpIndicator').val('');
        $('#inpUnit').val('');
        $('#inpProduct').removeClass('border-danger');
    });