
$(document).ready(function () {
	const table = initializeTable();
    leave_request();
    late();
    stock();
});

function initializeTable() {
    $.ajax({
        url: API_URL + "Manage_stock/show_das",
        type: "GET",
        dataType: "json",
    }).done(function (data) {
        console.log(data); // Use console.log for better debugging

        // Clear the existing table body
        $('#das tbody').empty();

        // Populate the table with data
        data.forEach((item, index) => {
            const quantity = item.stock_status == 1 ? '+' + item.isd_qty : '-' + item.isd_qty;
            const quantityClass = item.stock_status == 1 ? 'text-success' : 'text-danger'; // Define CSS class based on stock status

            const row = `
                <tr>
                    <td class="text-center">${index + 1}</td>
                    <td class="text-center">${item.isd_company}</td>
                    <td class="text-center">${item.mp_name}</td>
                    <td class="text-center ${quantityClass}">${quantity}</td> <!-- Apply CSS class dynamically -->
                    <td class="text-center">${item.mp_indicator}</td>
                </tr>
            `;
            $('#das tbody').append(row);
        });
    }).fail(function(jqXHR, textStatus, errorThrown) {
        console.error('Error fetching data:', textStatus, errorThrown);
    });
}

function leave_request() {
    $.ajax({
        url: API_URL + "Manage_leave/show_leave_request",
        type: "GET",
        dataType: "json",
    }).done(function (data) {
        console.log(data); // Use console.log for better debugging
        $('#countReq').text(' ' + data[0].cou);
    });
}

function late() {
    $.ajax({
        url: API_URL + "Manage_leave/show_late",
        type: "GET",
        dataType: "json",
    }).done(function (data) {
        console.log(data); // Use console.log for better debugging
        $('#late').text(' ' + data[0].tim);
    });
}

function stock() {
    $.ajax({
        url: API_URL + "Manage_stock/show_stock_cou",
        type: "GET",
        dataType: "json",
    }).done(function (data) {
        console.log(data); // Use console.log for better debugging
        $('#stock').text(' ' + data[0].qty);
    });
}

$('.clicks').click(function (event) {
    event.preventDefault(); // Prevent the default action (navigation)

    Swal.fire({
        title: 'Are you sure?',
        text: "You are about to leave this page.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, go ahead!'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = 'http://127.0.0.1/RenuWeb/Admin/mngLeaveletter';
        }
    });
});