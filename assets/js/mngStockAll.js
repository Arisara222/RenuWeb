$(document).ready(function () {
	const table = intializeTable();
});

function intializeTable() {
	$.ajax({
		url: API_URL + "Manage_stock/show_stock",
		type: "GET",
		dataType: "json",
	}).done(function (data) {
		console.log(data); // Use console.log for better debugging
		return $("#tblStock").DataTable({
			data: data,
			destroy: true,
			columns: [
				{
					data: null,
					render: function (data, type, row, meta) {
						return meta.row + meta.settings._iDisplayStart + 1;
					},
					className: "text-center",
				},
				{ data: "isd_company", className: "text-center" },
				{ data: "mp_name", className: "text-center" },
				{ data: "qty", className: "text-center" },
				{ data: "mp_indicator", className: "text-center" },
				{ data: "mp_price", className: "text-center" },
				{ data: "total_price", className: "text-center" },
				{
					data: null,
					render: function (data) {
						return `
                        <button class="btn btn-danger float-center" id="btnOut" data-id="${data.isd_id}" data-mp="${data.mp_id}"><i><img src="http://127.0.0.1/RenuWeb/assets/img/icon/package-export.png" style="height:20px"></i> OUT</button>
                    `;
					},
					className: "text-center",
				},
			],
		});
	});
}

function show_product(html_id, mp_id = null) {
  $.ajax({
      url: API_URL + "Manage_stock/show_product",
      dataType: "json",
      type: "GET",
      data: {
          mp_id: mp_id,
      },
      success: function (data) {
          console.log(data);
          const select_id = $("#" + html_id);
          select_id.empty();
          select_id.append(
              $("<option>", {
                  value: "",
                  text: "- Select Product -",
                  disabled: true,
                  selected: true,
              })
          );

          // Initialize firstValue to null or undefined
          let firstValue = null;
          if (data.result1 && data.result1.length > 0) {
              firstValue = data.result1[0].mp_id; // Get the value of the first result if exists
          }

          $.each(data.result, function (key, value) {
              let option = $("<option>", {
                  value: value.mp_id,
                  text: value.mp_name,
              });

              // If the current option's value matches the first result's value, mark it as selected
              if (firstValue !== null && value.mp_id === firstValue) {
                  option.prop("selected", true);
              }

              select_id.append(option);
          });
      },
  });
}

function showEditStock(id) {
	$.ajax({
		url: API_URL + "Manage_stock/show_edit_stock",
		type: "POST",
		data: {
			id: id,
		},
		dataType: "json",
		success: function (data) {
			$("#companyEdit").val(data[0].isd_company);
			$("#quantityInputEdit").val(data[0].qty);
			$("#unitPriceInputEdit").val(data[0].mp_price);
			$("#notesInputEdit").val(data[0].mp_note);
			var quantity = parseInt($("#quantityInputEdit").val()) || 0;
			var unitPrice = parseFloat($("#unitPriceInputEdit").val()) || 0;
			var totalPrice = quantity * unitPrice;
			$("#totalPriceInputEdit").val(totalPrice.toFixed(2));
		},
	});
}

function reloadTable() {
  const table = intializeTable();
  table.ajax.reload(null, false);
}

// Update product dropdown based on selected company (if applicable)
$("#companySelect").change(function () {
	var companyId = $(this).val();
	// Your logic to fetch products based on company ID and populate product dropdown
	// Replace with your AJAX call and logic to populate product dropdown
});

// Calculate total price on quantity or unit price change
$("#quantityInput").keyup(function () {
	var quantity = parseInt($("#quantityInput").val()) || 0;
 
	var unitPrice = parseFloat($("#unitPriceInput").val()) || 0;
	var totalPrice = quantity * unitPrice;
	$("#totalPriceInput").val(totalPrice.toFixed(2));
});

$("#quantityInputEdit").keyup(function () {
	var quantity = parseInt($("#quantityInputEdit").val()) || 0;
	var unitPrice = parseFloat($("#unitPriceInputEdit").val()) || 0;
	var totalPrice = quantity * unitPrice;
	$("#totalPriceInputEdit").val(totalPrice.toFixed(2));
});

// Submit form (handled by your controller logic)
$("#submitStock").click(function (e) {
	e.preventDefault();

	var formData = {
		company: $("#company").val(),
		product: $("#productSelect").val(),
		quantity: $("#quantityInput").val(),
		notes: $("#notesInput").val(),
	};

	$.ajax({
		url: API_URL + "Manage_stock/insertStock",
		type: "POST",
		data: formData,
		dataType: "json",
		success: function (response) {
			if (response.status == "success") {
				Swal.fire({
          icon: 'success',
          title: 'Success !',
          html: 'Insert Stock success',
        });
        $('#addStockModal').modal('hide');
        reloadTable();
			}
		},
		error: function (jqXHR, textStatus, errorThrown) {
			console.error("AJAX error: " + textStatus + " : " + errorThrown);
			alert("An error occurred. Please try again.");
		},
	});
});

// Submit form (handled by your controller logic)
$("#submitStockEdit").click(function (e) {
	e.preventDefault();
	var formData = {
		product: $("#productSelectEdit").val(),
		product: $("#productSelectEdit").val(),
		quantity: $("#quantityInputEdit").val(),
		notes: $("#notesInputEdit").val(),
		company: $("#companyEdit").val(),
	};

	$.ajax({
		url: API_URL + "Manage_stock/updateStock",
		type: "POST",
		data: formData,
		dataType: "json",
		success: function (response) {
			if (response.status == "success") {
        Swal.fire({
          icon: 'success',
          title: 'Success !',
          html: 'Update Stock success',
        });
        $('#editStockModal').modal('hide');
        reloadTable();
			}
		},
		error: function (jqXHR, textStatus, errorThrown) {
			console.error("AJAX error: " + textStatus + " : " + errorThrown);
			alert("An error occurred. Please try again.");
		},
	});
});

$("#productSelect").change(function () {
	$.ajax({
		url: API_URL + "Manage_stock/show_product_byid",
		dataType: "json",
    type: "POST",
    data: {
      id: $(this).val(),
    },
		success: function (data) {
			$("#unitPriceInput").val(data[0].mp_price);
		},
	});
});

$("#btnAddStock").on("click", function () {
	$("#addStockModal").modal("show");
	show_product("productSelect","");
});

$("#tblStock").on("click", "#btnOut", function () {
	$("#editStockModal").modal("show");
	showEditStock($(this).data("id"));
	show_product("productSelectEdit", $(this).data("mp"));
});
