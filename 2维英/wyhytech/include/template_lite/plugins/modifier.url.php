<?php
function tpl_modifier_url($string)
{
	if (strpos($string,","))
	{
	$val=explode(",",$string);
		if ($val[0]=="user")
		{
			return get_member_url($val[1],true);
		}
		else
		{
		return url_rewrite($val[0],array('id0'=>$val[1],"id1"=>$val[2 ]));
		}	
	}
	else
	{
	return url_rewrite($string);
	}
}
?>