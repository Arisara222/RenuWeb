<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Dashboard</title>

	<link rel="stylesheet" href="path/to/combined-and-minified.css">

	<!-- Other External Stylesheets -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{base_url}src/assets/css/styles.min.css">
    <link href="{base_url}assets/css/themify-icons/themify-icons.css" rel="stylesheet">

	<script src="https://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.js"></script>
	<link href="https://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.css" rel="stylesheet"/>
    <style>
        .red-text {
            color: red;
        }
    </style>


</head>
<!-- END HEAD -->

<body class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-white white-sidebar-color logo-indigo">
	<div class="page-wrapper">
		{header}
		{slide_bar}


		{page_content}

		<script>
			const API_URL = 'http://127.0.0.1/api/';

			// function convert to md5
			var MD5 = function(d) {
				var r = M(V(Y(X(d), 8 * d.length)));
				return r.toLowerCase()
			};

			function M(d) {
				for (var _, m = "0123456789ABCDEF", f = "", r = 0; r < d.length; r++) _ = d.charCodeAt(r), f += m.charAt(_ >>> 4 & 15) + m.charAt(15 & _);
				return f
			}

			function X(d) {
				for (var _ = Array(d.length >> 2), m = 0; m < _.length; m++) _[m] = 0;
				for (m = 0; m < 8 * d.length; m += 8) _[m >> 5] |= (255 & d.charCodeAt(m / 8)) << m % 32;
				return _
			}

			function V(d) {
				for (var _ = "", m = 0; m < 32 * d.length; m += 8) _ += String.fromCharCode(d[m >> 5] >>> m % 32 & 255);
				return _
			}

			function Y(d, _) {
				d[_ >> 5] |= 128 << _ % 32, d[14 + (_ + 64 >>> 9 << 4)] = _;
				for (var m = 1732584193, f = -271733879, r = -1732584194, i = 271733878, n = 0; n < d.length; n += 16) {
					var h = m,
						t = f,
						g = r,
						e = i;
					f = md5_ii(f = md5_ii(f = md5_ii(f = md5_ii(f = md5_hh(f = md5_hh(f = md5_hh(f = md5_hh(f = md5_gg(f = md5_gg(f = md5_gg(f = md5_gg(f = md5_ff(f = md5_ff(f = md5_ff(f = md5_ff(f, r = md5_ff(r, i = md5_ff(i, m = md5_ff(m, f, r, i, d[n + 0], 7, -680876936), f, r, d[n + 1], 12, -389564586), m, f, d[n + 2], 17, 606105819), i, m, d[n + 3], 22, -1044525330), r = md5_ff(r, i = md5_ff(i, m = md5_ff(m, f, r, i, d[n + 4], 7, -176418897), f, r, d[n + 5], 12, 1200080426), m, f, d[n + 6], 17, -1473231341), i, m, d[n + 7], 22, -45705983), r = md5_ff(r, i = md5_ff(i, m = md5_ff(m, f, r, i, d[n + 8], 7, 1770035416), f, r, d[n + 9], 12, -1958414417), m, f, d[n + 10], 17, -42063), i, m, d[n + 11], 22, -1990404162), r = md5_ff(r, i = md5_ff(i, m = md5_ff(m, f, r, i, d[n + 12], 7, 1804603682), f, r, d[n + 13], 12, -40341101), m, f, d[n + 14], 17, -1502002290), i, m, d[n + 15], 22, 1236535329), r = md5_gg(r, i = md5_gg(i, m = md5_gg(m, f, r, i, d[n + 1], 5, -165796510), f, r, d[n + 6], 9, -1069501632), m, f, d[n + 11], 14, 643717713), i, m, d[n + 0], 20, -373897302), r = md5_gg(r, i = md5_gg(i, m = md5_gg(m, f, r, i, d[n + 5], 5, -701558691), f, r, d[n + 10], 9, 38016083), m, f, d[n + 15], 14, -660478335), i, m, d[n + 4], 20, -405537848), r = md5_gg(r, i = md5_gg(i, m = md5_gg(m, f, r, i, d[n + 9], 5, 568446438), f, r, d[n + 14], 9, -1019803690), m, f, d[n + 3], 14, -187363961), i, m, d[n + 8], 20, 1163531501), r = md5_gg(r, i = md5_gg(i, m = md5_gg(m, f, r, i, d[n + 13], 5, -1444681467), f, r, d[n + 2], 9, -51403784), m, f, d[n + 7], 14, 1735328473), i, m, d[n + 12], 20, -1926607734), r = md5_hh(r, i = md5_hh(i, m = md5_hh(m, f, r, i, d[n + 5], 4, -378558), f, r, d[n + 8], 11, -2022574463), m, f, d[n + 11], 16, 1839030562), i, m, d[n + 14], 23, -35309556), r = md5_hh(r, i = md5_hh(i, m = md5_hh(m, f, r, i, d[n + 1], 4, -1530992060), f, r, d[n + 4], 11, 1272893353), m, f, d[n + 7], 16, -155497632), i, m, d[n + 10], 23, -1094730640), r = md5_hh(r, i = md5_hh(i, m = md5_hh(m, f, r, i, d[n + 13], 4, 681279174), f, r, d[n + 0], 11, -358537222), m, f, d[n + 3], 16, -722521979), i, m, d[n + 6], 23, 76029189), r = md5_hh(r, i = md5_hh(i, m = md5_hh(m, f, r, i, d[n + 9], 4, -640364487), f, r, d[n + 12], 11, -421815835), m, f, d[n + 15], 16, 530742520), i, m, d[n + 2], 23, -995338651), r = md5_ii(r, i = md5_ii(i, m = md5_ii(m, f, r, i, d[n + 0], 6, -198630844), f, r, d[n + 7], 10, 1126891415), m, f, d[n + 14], 15, -1416354905), i, m, d[n + 5], 21, -57434055), r = md5_ii(r, i = md5_ii(i, m = md5_ii(m, f, r, i, d[n + 12], 6, 1700485571), f, r, d[n + 3], 10, -1894986606), m, f, d[n + 10], 15, -1051523), i, m, d[n + 1], 21, -2054922799), r = md5_ii(r, i = md5_ii(i, m = md5_ii(m, f, r, i, d[n + 8], 6, 1873313359), f, r, d[n + 15], 10, -30611744), m, f, d[n + 6], 15, -1560198380), i, m, d[n + 13], 21, 1309151649), r = md5_ii(r, i = md5_ii(i, m = md5_ii(m, f, r, i, d[n + 4], 6, -145523070), f, r, d[n + 11], 10, -1120210379), m, f, d[n + 2], 15, 718787259), i, m, d[n + 9], 21, -343485551), m = safe_add(m, h), f = safe_add(f, t), r = safe_add(r, g), i = safe_add(i, e)
				}
				return Array(m, f, r, i)
			}

			function md5_cmn(d, _, m, f, r, i) {
				return safe_add(bit_rol(safe_add(safe_add(_, d), safe_add(f, i)), r), m)
			}

			function md5_ff(d, _, m, f, r, i, n) {
				return md5_cmn(_ & m | ~_ & f, d, _, r, i, n)
			}

			function md5_gg(d, _, m, f, r, i, n) {
				return md5_cmn(_ & f | m & ~f, d, _, r, i, n)
			}

			function md5_hh(d, _, m, f, r, i, n) {
				return md5_cmn(_ ^ m ^ f, d, _, r, i, n)
			}

			function md5_ii(d, _, m, f, r, i, n) {
				return md5_cmn(m ^ (_ | ~f), d, _, r, i, n)
			}

			function safe_add(d, _) {
				var m = (65535 & d) + (65535 & _);
				return (d >> 16) + (_ >> 16) + (m >> 16) << 16 | 65535 & m
			}

			function bit_rol(d, _) {
				return d << _ | d >>> 32 - _
			}


			function base_url(url) {
				return '<?php echo $base_url; ?>' + url;
			}

			////////////// add account ///////////////
			function InputAdd(inputElement) {
				var inputValue = inputElement.value;
				var pattern = /^(?:[a-zA-Z0-9!@#$%^&*()_+={}[\]\\|:;\"'<>,.?/~`+\-*/%\s]+|)$/;
				var errorMessage = document.getElementById("errMegadd");

				if (!pattern.test(inputValue)) {
					errorMessage.style.display = "block";
				} else {
					errorMessage.style.display = "none";
				}
			}

			function InputAddEmpcode(inputElement) {
				var inputValue = inputElement.value;
				var pattern = /^(?:[a-zA-Z0-9\s]+|)$/;
				var errorMessage = document.getElementById("errAddempcode");

				if (!pattern.test(inputValue)) {
					errorMessage.style.display = "block";
				} else {
					errorMessage.style.display = "none";
				}
			}

			function InputAddpersonal(inputElement) {
				var inputValue = inputElement.value;
				var pattern = /^(?:[a-zA-Z\s]+|)$/;
				var errorMessage = document.getElementById("errAddpersonal");

				if (!pattern.test(inputValue)) {
					errorMessage.style.display = "block";
				} else {
					errorMessage.style.display = "none";
				}
			}

			function chkAddEmpcode(text) {
				// ตรวจสอบว่า text เป็น null หรือไม่
				if (text === null) {
					return false;
				}
				// ตรวจสอบว่า text เป็นช่องว่างหรือไม่
				var trimmedText = text.trim();
				if (trimmedText === '') {
					return false;
				}
				var Pattern = /^(?:[a-zA-Z0-9\s]+|)$/;
				return Pattern.test(text);
			}

			function chkAddpersonal(text) {
				// ตรวจสอบว่า text เป็น null หรือไม่
				if (text === null) {
					return false;
				}
				// ตรวจสอบว่า text เป็นช่องว่างหรือไม่
				var trimmedText = text.trim();
				if (trimmedText === '') {
					return false;
				}
				var Pattern = /^(?:[a-zA-Z\s]+|)$/;
				return Pattern.test(text);
			}


			////////////// edit account ///////////////
			function InputEdit(inputElement) {
				var inputValue = inputElement.value;
				var pattern = /^(?:[a-zA-Z0-9!@#$%^&*()_+={}[\]\\|:;\"'<>,.?/~`+\-*/%\s]+|)$/;
				var errorMessage = document.getElementById("errMegedit");

				if (!pattern.test(inputValue)) {
					errorMessage.style.display = "block";
				} else {
					errorMessage.style.display = "none";
				}
			}

			function InputEditpersonal(inputElement) {
				var inputValue = inputElement.value;
				var pattern = /^(?:[a-zA-Z\s]+|)$/;
				var errorMessage = document.getElementById("errEditpersonal");

				if (!pattern.test(inputValue)) {
					errorMessage.style.display = "block";
				} else {
					errorMessage.style.display = "none";
				}
			}

			function chkEditpersonal(text) {
				// ตรวจสอบว่า text เป็น null หรือไม่
				if (text === null) {
					return false;
				}
				// ตรวจสอบว่า text เป็นช่องว่างหรือไม่
				var trimmedText = text.trim();
				if (trimmedText === '') {
					return false;
				}
				var Pattern = /^(?:[a-zA-Z\s]+|)$/;
				return Pattern.test(text);
			}



			function isThaiLanguage(text) {
				// ตรวจสอบว่า text เป็น null หรือไม่
				if (text === null) {
					return false;
				}
				// ตรวจสอบว่า text เป็นช่องว่างหรือไม่
				var trimmedText = text.trim();
				if (trimmedText === '') {
					return false;
				}
				var Pattern = /^(?:[a-zA-Z0-9!@#$%^&*()_+={}[\]\\|:;\"'<>,.?/~`+\-*/%\s]+|)$/;
				return Pattern.test(text);
			}
		</script>
		{footer}
	</div>

	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src="{base_url}src/assets/libs/jquery/dist/jquery.min.js"></script>
	<script src="{base_url}src/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
	<script src="{base_url}src/assets/js/sidebarmenu.js"></script>
	<script src="{base_url}src/assets/js/app.min.js"></script>
	<script src="{base_url}src/assets/libs/simplebar/dist/simplebar.js"></script>
	<script src="{base_url}src/assets/js/dashboard.js"></script>
	<script src="{base_url}src/assets/js/login.js"></script>
	<script src="{base_url}src/assets/js/logout.js"></script>
	<script src="{base_url}assets/js/submanu.js"></script>
	<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
	<script src="{base_url}src/assets/libs/apexcharts/dist/apexcharts.min.js"></script>
	<!-- <script src="{base_url}src/assets/js/dashboard.js"></script> -->
<!-- Bootstrap JavaScript -->
<script src="<?php echo base_url() ?>/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>/assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<script src="<?php echo base_url() ?>/assets/plugins/sparkline/jquery.sparkline.js"></script>
<script src="<?php echo base_url() ?>/assets/js/pages/sparkline/sparkline-data.js"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script> -->

{another_js}

</body>

</html>