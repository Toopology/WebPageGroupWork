<%
class edit_form_class

	public form_title,form_id
	public form_style,l_width,r_width,l_style
	public field_name,field_list,field_size,field_type
	public form_html
	
	Private Sub Class_Initialize
		form_title  = "修改编辑"
		form_style  = "tbl_edit"
		l_style     = "left_td"
	End Sub
	
	public function show_form()
	
		field_name = split(field_name,",")
		field_list = split(field_list,",")
		field_size = split(field_size,",")
		field_type = split(field_type,",")
	
		form_html = "<form id='"&form_id&"' name='"&form_id&"' method='post' action='' onsubmit=''>"
		form_html = form_html&"<table border='0' cellspacing='0' cellpadding='0' class='"&form_style&"'>"
		form_html = form_html&"<tr><td colspan='20' class='header'>"&form_title&"</td></tr>"
		form_html = form_html&"<tr><td width='"&l_width&"' class='"&l_style&"'>主 题</td><td width='"&r_width&"'><input name='' type='' class='' id='' value='' size='' /></td></tr>"
		form_html = form_html&"</table></form>"
		
		response.Write(form_html)
	end function

end class
%>