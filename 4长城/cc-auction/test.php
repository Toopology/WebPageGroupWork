<?
	$file="products/".$_POST['name'].".csv";
	$handle=fopen($file,"r");
	while($data=fgetcsv($handle,0,",")){
		echo $data[0].",".$data[1].",".$data[2].",".$data[3].",".$data[4].",".$data[5].",".$data[6].",".$data[7].",".$_POST['name']."<br>";
	}
	fclose($handle);
?>