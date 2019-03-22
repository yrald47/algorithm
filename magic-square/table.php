<?php 
$square = array();
$input = 10;

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

for($x = 0; $x < $input; $x++){
	for($y = 0; $y < $input; $y++){
		echo $square[$x][$y]." ";
	}
	echo "<br>";
}
// print("<pre>".print_r($square, true)."</pre>");
?>