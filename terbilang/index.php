<!DOCTYPE html>
<html lang="en">
<head>
	<title>Algoritma Terbilang</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
	<div class="container-contact100">
		<div class="wrap-contact100">
			<form class="contact100-form validate-form">
				<span class="contact100-form-title">
					Masukkan Nominal
				</span>

				<label class="label-input100" for="nominal">Nominal</label>
				<div class="wrap-input100 validate-input" data-validate="Nominal is Required">
					<input id="nominal" class="input100" type="text" name="nominal" placeholder="Input Nominal Di Sini" onkeyup="terbilangA()">
					<span class="focus-input100"></span>
				</div>
				<label class="label-input100" for="message">Terbilang</label>
				<div class="wrap-input100 validate-input" data-validate = "Message is required">
					<textarea id="terbilang" class="input100" name="terbilang" placeholder="Terbilang Akan Muncul Di Sini" readonly=""></textarea>
					<span class="focus-input100"></span>
				</div>

				<div class="container-contact100-form-btn">
					<button class="contact100-form-btn" disabled="">
						Send Message
					</button>
				</div>
			</form>

			<div class="contact100-more flex-col-c-m" style="background-image: url('images/bg-01.jpg');">
				<div class="flex-w size1 p-b-47">
					<div class="txt1 p-r-25">
						<span class="lnr lnr-map-marker"></span>
					</div>

					<div class="flex-col size2">
						<span class="txt1 p-b-20">
							Address
						</span>
						<span class="txt2">
							Jalan Pasar Taluk, Kenagarian Taluk Kecamatan Batang Kapas Kebupaten Pesisir Selatan
						</span>
					</div>
				</div>

				<div class="dis-flex size1 p-b-47">
					<div class="txt1 p-r-25">
						<span class="lnr lnr-phone-handset"></span>
					</div>

					<div class="flex-col size2">
						<span class="txt1 p-b-20">
							Lets Talk
						</span>

						<span class="txt3">
							+6281266067808
						</span>
					</div>
				</div>

				<div class="dis-flex size1 p-b-47">
					<div class="txt1 p-r-25">
						<span class="lnr lnr-envelope"></span>
					</div>

					<div class="flex-col size2">
						<span class="txt1 p-b-20">
							General Support
						</span>
						<span class="txt3">
							yr.alditya@gmail.com
						</span>
					</div>
				</div>

				<div class="dis-flex size1 p-b-47">
					<div class="txt1 p-r-25">
						<span class="lnr lnr-screen"></span>
					</div>

					<div class="flex-col size2">
						<span class="txt1 p-b-20">
							Template By
						</span>
						<span class="txt3">
							<a href="https://colorlib.com/wp/template/contact-form-v17/">Contact From v17</a> by <a href="https://colorlib.com/wp/author/aigars-silkalns/">Aigars</a> via <a href="https://colorlib.com">Colorlib</a>
						</span>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="dropDownSelect1"></div>

	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="vendor/animsition/js/animsition.min.js"></script>
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
	<script src="vendor/countdowntime/countdowntime.js"></script>
	<script src="js/main.js"></script>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-23581568-13');
	</script>
	<script>
	  	var besaran = ['', 'Ribu', 'Juta', 'Miliar', 'Triliun', 'Kuadriliun', 'Kuintiliun', 'Sekstiliun', 'Septiliun', 'Oktiliun', 'Noniliun', 'Desiliun'
		];
		var bilangan = {
			"0":"",
			"1":"Satu",
			"2":"Dua",
			"3":"Tiga",
			"4":"Empat",
			"5":"Lima",
			"6":"Enam",
			"7":"Tujuh",
			"8":"Delapan",
			"9":"Sembilan",
			"10":"Sepuluh",
			"11":"Sebelas",
		};
		var rps = ['Ratus ', 'Puluh ', ' '];

		function terbilangA(){
			var terbilang = "";
			var bagi = [];
			var tiga = [];
			var input = document.getElementsByName("nominal")[0];
			var textareaTerbilang = document.getElementById("terbilang");
			var nominal = input.value;
			var count = nominal.length;
			// console.log(nominal[0]);
			var j = 0;
			var limit = 2;
			var maxIndeks = (count % 3 > 0) ? Math.floor(count/3) : Math.floor(count/3) - 1;
			for(var i = count - 1; i >= 0; i--){
				if(nominal[i] != "0")
					if(limit == 1 && nominal[i] == "1"){
						if(nominal[i+1] == "0"){
							tiga[limit] = "Sepuluh";
						}
						else if(nominal[i+1] == "1"){
							tiga[limit] = "Sebelas";
						}
						else{
							tiga[limit] = bilangan[nominal[i+1]] + " Belas ";	
						}
						tiga[2] = "";
					}
					else if(limit == 0){
						if(nominal[i] == "1"){
							tiga[limit] = "Seratus ";
						}
						else{
							tiga[limit] = bilangan[nominal[i]] + " " + rps[limit];
						}
					}
					else{
						tiga[limit] = bilangan[nominal[i]]+ " " + rps[limit];
					}
				else
					tiga[limit] = bilangan[nominal[i]] + " ";
				
				limit--;

				if(limit < 0 || i == 0){
					limit = 2;
					bagi[j] = tiga;
					j++;
					tiga = [];
				}
			}
			if(bagi[1][1] == undefined && bagi[1][2] == "Satu  ")
				bagi[1][2] = "Se";
			console.log(bagi[1][2]);

			for(var k = maxIndeks; k >= 0; k--){
				for(var l = 0; l < 3; l++){
					if(bagi[k][l] != undefined){
						terbilang = terbilang + bagi[k][l];
					}
				}
				terbilang = terbilang + besaran[k] + " ";
			}
			textareaTerbilang.value = terbilang.replace(/  /g, " ");
		}
	</script>
</body>
</html>