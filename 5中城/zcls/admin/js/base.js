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
		alert("�������û�����");
		form.username.focus();
		return false;
	}
	if(isNull(form.password.value)){
		alert("���������룡");
		form.password.focus();
		return false;
	}
	return form.submit();
}

function check(form){
	if(isNull(form.username.value)){
		alert("����������ʺţ�");
		form.username.focus();
		return false;
	}
	if(isNull(form.password.value)){
		alert("������������룡");
		form.password.focus();
		return false;
	}
	if(isNull(form.name.value)){
		alert("���������ű��⣡");
		form.name.focus();
		return false;
	}
	if(isNull(form.type.value)){
		alert("��ѡ���������ͣ�");
		form.type.focus();
		return false;
	}
	if(isNull(form.content.value)){
		alert("�������������ݣ�");
		form.content.focus();
		return false;
	}
	return form.submit();
}