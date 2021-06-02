function countDown(Secs) {
    document.getElementById("BackSecs").innerHTML=conMin(Secs);
    if(Secs>0) {
        setTimeout("countDown("+Secs+"-1)",1000);
    }
	else {
		document.getElementById("BackSecs").innerHTML="<strong style=\"color:#F00\">登录超时，请重新登录!</strong>"
	}
}
function conMin(Seconds) {
    if(Seconds>60) {
        Seconds = Math.floor(Seconds/60) + " 分 " + (Seconds%60);
    }
	else {
		Seconds = Seconds;
	}
	return Seconds;
}
document.write(" 您本次登录还有 <span style=\"font-size:12px;\" id=\"BackSecs\" name=\"BackSecs\">0</span>秒超时。");
countDown(60*20);