function countDown(Secs) {
    document.getElementById("BackSecs").innerHTML=conMin(Secs);
    if(Secs>0) {
        setTimeout("countDown("+Secs+"-1)",1000);
    }
	else {
		document.getElementById("BackSecs").innerHTML="<strong style=\"color:#F00\">��¼��ʱ�������µ�¼!</strong>"
	}
}
function conMin(Seconds) {
    if(Seconds>60) {
        Seconds = Math.floor(Seconds/60) + " �� " + (Seconds%60);
    }
	else {
		Seconds = Seconds;
	}
	return Seconds;
}
document.write(" �����ε�¼���� <span style=\"font-size:12px;\" id=\"BackSecs\" name=\"BackSecs\">0</span>�볬ʱ��");
countDown(60*20);