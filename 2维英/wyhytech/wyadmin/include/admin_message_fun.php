<?php
/*
* 管理中心共用数据调用函数
*/

function get_message($offset, $perpage, $sql= '')
{

	global $db;
	$row_arr = array();
	$limit=" LIMIT ".$offset.','.$perpage;
	$result = $db->query("SELECT *  FROM ".table('message').$sql."  ".$limit);
	while($row = $db->fetch_array($result)){
		$row_arr[] = $row;
	}
	return $row_arr;
}
function del_message($id)
{
	global $db,$thumb_dir,$upfiles_dir;
	if (!is_array($id)) $id=array($id);

	foreach($id as $val)
	{
		$db->query("Delete from  ".table('message')." where id=".intval($val)." LIMIT 1");
	}
	return true;
}

?>