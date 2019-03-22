<!DOCTYPE html>
<html lang="en">
<head>
	<title>MAGIC SQUARE</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
	<div class="col-md-12">
		<br>
		<div class="card">
			<div class="card-header">
		    MAGIC SQUARE
		  	</div>
		  	<div class="card-body">
		  		<h5 class="card-title">What is this ?</h5>
		    	<p class="card-text">Magic Square is a square with size n x n that containing numbers 1 to (n x n) and each number will only appear once, and each row, column, and diagonal has the same number, so you only need to enter the value of n into the form below</p>
		    	<form action="index.php" method="POST" class="form-inline">
					<div class="form-group">
						<input type="number" name="input" value="" class="form-control" placeholder="Value of n">
						<input type="submit" name="submit" value="SQUARE IT!" class="btn btn-primary">
					</div>
				</form>
		  	</div>
		  	<div class="card-footer" background-color="red">
		  		<p><b>Note : </b>input that is too large (larger than 20) may cause the display to be less tidy</p>
		  	</div>
		</div>
		<hr>
		<div class="limiter">
				<div class="table100 ver2 m-b-110">
					<table data-vertable="ver2">
						<tbody>
							<?php
							if(isset($_POST['submit']) && isset($_POST['input'])){
								$square = array();
								$input = $_POST['input'];
								if($input < 3){
									?>
									<div class="alert alert-danger" role="alert">
			  							Try to input the number that bigger than 2
									</div>
									<?php
								}
								else{
									if($input % 4 == 2){
										/* 
										or you can use
										ceil(($input-2)/4) == floor(($input-2)/4)
										*/
										$mtd = array('Strachey', 'Conway LUX');
										$method = floor(rand(0, 1));
										$total = ($input * $input * $input / 2) + $input / 2;
										?>
										<div class="row">
											<div class="col-md-8 alert alert-success" role="alert">
						  						Try to add the numbers horizontally, vertically, or diagonally, then the number is <b><?php echo $total ?></b>
											</div>
											<div class="col-md-4 alert alert-success" role="alert">
												Method : <strong><?php echo $mtd[$method]; ?></strong>
											</div>
										</div>
										<?php
										if($method == 0){
											$r = 0;
											$c = ($input - 2) / 4; //or (($input/2)-1)/2
											for($i = 1; $i <= $input/2 * $input/2; $i++){
												$square[$r][$c] = $i;
												$r_tmp = $r - 1 < 0 ? ($input/2) - 1 : $r - 1;
												$c_tmp = $c + 1 >= $input/2 ? 0 : $c + 1;
												if(!empty($square[$r_tmp][$c_tmp])){
													$r = $r + 1;
												}
												else{
													$r = $r_tmp;
													$c = $c_tmp;
												}
											}

											$r = $input/2;
											$c = (($input - 2) / 4) + ($input / 2);
											for($i = ($input/2 * $input/2)+1; $i <= ($input/2 * $input/2)*2; $i++){
												$square[$r][$c] = $i;
												$r_tmp = $r - 1 < $input/2 ? $input - 1 : $r - 1;
												$c_tmp = $c + 1 >= $input ? $input/2 : $c + 1;
												if(!empty($square[$r_tmp][$c_tmp])){
													$r = $r + 1;
												}
												else{
													$r = $r_tmp;
													$c = $c_tmp;
												}
											}

											$r = 0;
											$c = (($input - 2) / 4) + ($input / 2);
											for($i = ($input*$input/2)+1; $i <= ($input/2 * $input/2)*3; $i++){
												$square[$r][$c] = $i;
												$r_tmp = $r - 1 < 0 ? ($input/2) - 1 : $r - 1;
												$c_tmp = $c + 1 >= $input ? $input/2 : $c + 1;
												if(!empty($square[$r_tmp][$c_tmp])){
													$r = $r + 1;
												}
												else{
													$r = $r_tmp;
													$c = $c_tmp;
												}
											}

											$r = $input/2;
											$c = ($input - 2) / 4;
											for($i = ($input/2 * $input/2)*3+1; $i <= ($input/2 * $input/2)*4; $i++){
												$square[$r][$c] = $i;
												$r_tmp = $r - 1 < $input/2 ? $input - 1 : $r - 1;
												$c_tmp = $c + 1 >= $input/2 ? 0 : $c + 1;
												if(!empty($square[$r_tmp][$c_tmp])){
													$r = $r + 1;
												}
												else{
													$r = $r_tmp;
													$c = $c_tmp;
												}
											}

											//tahap swap
											$m = ($input-2)/4;
											for($i = 0; $i < $input/2; $i++){
												for($j = 0; $j < $input; $j++){
													if(($j < $m || $j > $input - $m) && $i != $m){
														$val_tmp = $square[$i][$j];
														$square[$i][$j] = $square[$i + ($input/2)][$j];
														$square[$i + ($input/2)][$j] = $val_tmp;
													}
												}
											}
											$val_temp = $square[$m][$m];
											$square[$m][$m] = $square[$m + ($input/2)][$m];
											$square[$m + ($input/2)][$m] = $val_temp;
										}
										else{
											$lux = array();
											$lux_rplc = array();
											$lux_idx = $input / 2;
											$m = ($input - 2)/4;
											$u = ($input - $m)-($input / 2);
											// or you also can use $u = $m - 2;
											for($i = 0; $i < $lux_idx; $i++){
												for($j = 0; $j < $lux_idx; $j++){
													$lux[$i][$j] = $i < $m + 1 ? "L" : ($i == $u ? "U" : "X");
													if($i == $u && $j == ($lux_idx - 1) / 2){
														$lux[$i][$j] = "L";
														$lux[$i - 1][$j] = "U";
													}
												}
											}
											// print("<pre>".print_r([$lux], true)."</pre>");
											$r = 0;
											$c = ($lux_idx - 1)/2;
											for($i = 1; $i <= $input*$input; $i++){
												$lux_rplc[$r][$c] = $lux[$r][$c];
												// or u also can set to $i
												if($lux[$r][$c] == "L"){
													$square[$r*2][$c*2+1] = $i;
													$square[$r*2+1][$c*2] = $i+1;
													$square[$r*2+1][$c*2+1] = $i+2;
													$square[$r*2][$c*2] = $i+3;		
												}
												elseif ($lux[$r][$c] == "U") {
													$square[$r*2][$c*2] = $i;
													$square[$r*2+1][$c*2] = $i+1;
													$square[$r*2+1][$c*2+1] = $i+2;
													$square[$r*2][$c*2+1] = $i+3;
												}
												elseif($lux[$r][$c] == "X"){
													$square[$r*2][$c*2] = $i;
													$square[$r*2+1][$c*2+1] = $i+1;
													$square[$r*2+1][$c*2] = $i+2;
													$square[$r*2][$c*2+1] = $i+3;
												}

												$r_tmp = $r - 1 < 0 ? $lux_idx - 1 : $r - 1;
												$c_tmp = $c + 1 >= $lux_idx ? 0 : $c + 1;
												if(!empty($lux_rplc[$r_tmp][$c_tmp])){
													$r = $r + 1;
												}
												else{
													$r = $r_tmp;
													$c = $c_tmp;
												}
												$i = $i + 3;
											}
											// print("<pre>".print_r([$lux, $square], true)."</pre>");
										}
									}
									elseif($input % 2 == 1){
										$r = 0;
										$c = ($input - 1)/2;
										$total = (($input * $input + 1)/2) * $input;
										?>
										<div class="row">
											<div class="col-md-8 alert alert-success" role="alert">
						  						Try to add the numbers horizontally, vertically, or diagonally, then the number is <b><?php echo $total ?></b>
											</div>
											<div class="col-md-4 alert alert-success" role="alert">
												Method : <strong>Siamese</strong>
											</div>
										</div>
										<?php
										for($i = 1; $i <= $input*$input; $i++){
											$square[$r][$c] = $i;
											$r_tmp = $r - 1 < 0 ? $input - 1 : $r - 1;
											$c_tmp = $c + 1 >= $input ? 0 : $c + 1;
											if(!empty($square[$r_tmp][$c_tmp])){
												$r = $r + 1;
											}
											else{
												$r = $r_tmp;
												$c = $c_tmp;
											}
										}
										// print("<pre>".print_r([$square, $total, $r, $c, $r_tmp, $c_tmp], true)."</pre>");
									}
									else{
										/*
										Mencari Total
										*/
										$mtd = array('Type X', 'Type Star');
										$method = floor(rand(0, 1));
										$total = (($input * $input / 2) + ($input * $input / 2 + 1)) * ($input / 2);
										?>
										<div class="row">
											<div class="col-md-8 alert alert-success" role="alert">
						  						Try to add the numbers horizontally, vertically, or diagonally, then the number is <b><?php echo $total ?></b>
											</div>
											<div class="col-md-4 alert alert-success" role="alert">
												Method : <strong>Lozenge <?php echo $mtd[$method]; ?></strong>
											</div>
										</div>
										<?php
										/*
										Mengisi seluruh square dengan angka dari 1 sampai (input x input) secara berurutan
										*/
										for($i = 1; $i <= $input * $input; $i++){
											for($j = 0; $j < $input; $j++){
												for($k = 0; $k < $input; $k++){
													$square[$j][$k] = $i;
													$i++;
												}
											}
										}
										// PHP random number : rand(min, max);
										//javascript random number : Math.floor(Math.random() * (Math.ceil(max) - Math.floor(min) + 1) + Math.floor(min));
										/*
										Menandai mana saja cell yang akan di swap
										*/
										$square_swap = array();
										if($method == 0){
											for($i = 0; $i < $input/2; $i++){
												$middle = ($input / 2) - 1;
												$swap = $i % 2 == 0 ? false : true;
												while($middle >= 0){
													if($swap == false){
														$square_swap[$i][$middle] = 'x';
														$square_swap[$i][($input - 1) - $middle] = 'x';
														$swap = true;
													}
													else{
														$square_swap[$i][$middle] = 'o';
														$square_swap[$i][($input - 1) - $middle] = 'o';
														$swap = false;
													}
													$middle--;
												}
											}
										}
										else{
											$row_swap = 1;
											for($i = 0; $i < $input / 2; $i++){
												if($row_swap == 5)
													$row_swap = 1;
												$col_swap = ($row_swap == 1 || $row_swap == 4 ? 1 : 3);

												for($j = 0; $j < $input / 2; $j++){
													if($col_swap == 1 || $col_swap == 4){
														$square_swap[$i][$j] = 'o';
														$square_swap[$i][($input - 1) - $j] = 'o';
													}
													else{
														$square_swap[$i][$j] = 'x';
														$square_swap[$i][($input - 1) - $j] = 'x';
													}
													$col_swap = ($col_swap == 4 ? 1 : $col_swap + 1);
												}
												$row_swap++;
												// $row_swap = $row_swap == 5 ? 1 : $row_swap + 1;
											}
										}

										// print("<pre>".print_r($square_swap, true)."</pre>"); exit();
										for($j = 0; $j < $input; $j++){
											for($k = 0; $k < $input; $k++){
												if($square_swap[$j][$k] == 'o'){
													$val_tmp = $square[$j][$k];
													$square[$j][$k] = $square[($input - 1) - $j][($input - 1) - $k];
													$square[($input - 1) - $j][($input - 1) - $k] = $val_tmp;
												}
											}
										}
										?>
										<!-- <div class="alert alert-danger" role="alert">
				  							We still build the algorithm for Lozenge Method
										</div> -->
									<?php
									}
									/*
									Menampilkan isi array ke tabel
									*/
									for($j = 0; $j < $input; $j++){
										?>
										<tr class="row100">
										<?php
										for($k = 0; $k < $input; $k++){
											?>
											<td class="column100 column<?php echo $k+1; ?>" data-column="column<?php echo $k+1; ?>" align="center" ><?php echo $square[$j][$k] ?></td>
											<?php
										}
										?>
										</tr>
										<?php
									}
								}
							}
							?>
						</tbody>
					</table>
				</div>
		</div>
	</div>
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="vendor/select2/select2.min.js"></script>
	<script src="js/main.js"></script>
	<script>
		var input = document.getElementsByName('input')[0];
		var value = "<?php echo $_POST['input']; ?>";
		input.setAttribute('value', value);
		input.focus();
	</script>
</body>
</html>