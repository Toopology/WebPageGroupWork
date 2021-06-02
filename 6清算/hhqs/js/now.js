		today=new Date();
		var hours = today.getHours();
		var minutes = today.getMinutes();
		var seconds = today.getSeconds();
		var timeValue = "" + ((hours >12) ? hours -12 :hours); timeValue += ((minutes < 10) ? ":0" : ":") + minutes+"";
		timeValue += (hours >= 12) ? "PM" : "AM";
		function initArray(){
		this.length=initArray.arguments.length
		for(var i=0;i<this.length;i++)
		this[i+1]=initArray.arguments[i]  }
		var d=new initArray("星期日","星期一","星期二","星期三","星期四","星期五","星期六");
		document.write("",today.getYear(),"年","",today.getMonth()+1,"月","",today.getDate(),"日 ",d[today.getDay()+1]," <span id=tim1></span> &nbsp;&nbsp;&nbsp;&nbsp;");
		
		function settimes(){
		var time= new Date();
		hours= time.getHours();
		mins= time.getMinutes();
		secs= time.getSeconds();
		if (hours<10)
		hours="0"+hours;
		if(mins<10)
		mins="0"+mins;
		if (secs<10)
		secs="0"+secs;
		tim1.innerHTML=hours+":"+mins+":"+secs
		ctimer=setTimeout('settimes()',960);
		}
		settimes();
		  //-->