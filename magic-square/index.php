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
		  		<p><b>Note : </b>Input that is too large (bigger than 20) may make the display less neat</p>
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
									if(ceil(($input-2)/4) == floor(($input-2)/4)){
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
										$total = ($input * $input * $input / 2) + $input / 2;
										?>
										<div class="alert alert-success" role="alert">
					  						Try to add the numbers horizontally, vertically, or diagonally, then the number is <b><?php echo $total ?></b>
										</div>
										<?php
										for($i = 1; $i <= $input*$input; $i++){
											$lux_rplc[$r][$c] = $lux[$r][$c]; // or u also can set to $i
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
									elseif($input % 2 == 1){
										$r = 0;
										$c = ($input - 1)/2;
										$total = (($input * $input + 1)/2) * $input;
										?>
										<div class="alert alert-success" role="alert">
					  						Try to add the numbers horizontally, vertically, or diagonally, then the number is <b><?php echo $total ?></b>
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
										?>
										<div class="alert alert-danger" role="alert">
				  							We still build the algorithm for Lozenge Method
										</div>
									<?php
									}
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