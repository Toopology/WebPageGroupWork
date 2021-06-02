<?php

function get_syslog_list($offset,$perpage,$sql= '')
{
	global $db;
	$limit=" LIMIT ".$offset.','.$perpage;
	$result = $db->query("SELECT * FROM ".table('syslog')." ".$sql.$limit);
	while($row = $db->fetch_array($result))
	{
	$row['l_page']=urldecode($row['l_page']);
	$row_arr[] = $row;
	}
	return $row_arr;
}
function del_syslog($id)
{
	global $db;
	$delnum=0;
	if (!is_array($id)) $id=array($id);
	$sqlin=implode(",",$id);
	if (preg_match("/^(\d{1,10},)*(\d{1,10})$/",$sqlin))
	{
		$db->query("Delete from ".table('syslog')." WHERE l_id IN (".$sqlin.")");
		$delnum=$db->affected_rows();
	}
	return $delnum;
}
?>