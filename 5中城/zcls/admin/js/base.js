function isNull(str) {
	if (str == "") {
		return true;
	}
	var regu = "^[ ]+$";
	var re = new RegExp(regu);
	return re.test(str);
}

function login(form){
	if(isNull(form.username.value)){
		alert("请输入用户名！");
		form.username.focus();
		return false;
	}
	if(isNull(form.password.value)){
		alert("请输入密码！");
		form.password.focus();
		return false;
	}
	return form.submit();
}

function check(form){
	if(isNull(form.username.value)){
		alert("请输入管理帐号！");
		form.username.focus();
		return false;
	}
	if(isNull(form.password.value)){
		alert("请输入管理密码！");
		form.password.focus();
		return false;
	}
	if(isNull(form.name.value)){
		alert("请输入新闻标题！");
		form.name.focus();
		return false;
	}
	if(isNull(form.type.value)){
		alert("请选择新闻类型！");
		form.type.focus();
		return false;
	}
	if(isNull(form.content.value)){
		alert("请输入新闻内容！");
		form.content.focus();
		return false;
	}
	return form.submit();
}