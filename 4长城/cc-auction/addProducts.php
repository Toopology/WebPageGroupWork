<?
	include "conn.php";
	$conn=mysql_connect($url,$c_username,$c_password);
	mysql_select_db("cc-auction");
	mysql_query("set names'gbk'");
	$file="products/".$_POST['name'].".csv";
	echo $file."<br>";
	$handle=fopen($file,"r");
	while($data=fgetcsv($handle,0,",")){
		$sql="insert into product (pictureid,author,pname,age,size,quality,price,note,announcement) values ('".
						$data[0]."','".
						$data[1]."','".
						$data[2]."','".
						$data[3]."','".
						$data[4]."','".
						$data[5]."','".
						$data[6]."','".
						$data[7]."','".
						$_POST['name']."');";
		echo $sql."<br>";
		//mysql_query($sql);
	}
	fclose($handle);
	mysql_close($conn);
	echo "导入拍卖品成功！";
?>