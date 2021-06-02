/**
 * myslider 110924
 * feedback www.51sea.com
 */

var Extend = function(destination, source) {
	for (var property in source) {
		destination[property] = source[property];
	}
	return destination;
}

var CurrentStyle = function(element){
	return element.currentStyle || document.defaultView.getComputedStyle(element, null);
}

var Bind = function(object, fun) {
	var args = Array.prototype.slice.call(arguments).slice(2);
	return function() {
		return fun.apply(object, args.concat(Array.prototype.slice.call(arguments)));
	}
}

var Tween = {
	Quart: {
		easeOut: function(t,b,c,d){
			return -c * ((t=t/d-1)*t*t*t - 1) + b;
		}
	},
	Back: {
		easeOut: function(t,b,c,d,s){
			if (s == undefined) s = 1.70158;
			return c*((t=t/d-1)*t*((s+1)*t + s) + 1) + b;
		}
	},
	Bounce: {
		easeOut: function(t,b,c,d){
			if ((t/=d) < (1/2.75)) {
				return c*(7.5625*t*t) + b;
			} else if (t < (2/2.75)) {
				return c*(7.5625*(t-=(1.5/2.75))*t + .75) + b;
			} else if (t < (2.5/2.75)) {
				return c*(7.5625*(t-=(2.25/2.75))*t + .9375) + b;
			} else {
				return c*(7.5625*(t-=(2.625/2.75))*t + .984375) + b;
			}
		}
	}
}

//容器对象,滑动对象,切换数量
var SlideTrans = function(container, slider, count, options) {
	this._slider = slider[0];
	this._slider_num = slider[1];
	this._container = container;//容器对象
	this._timer = null;//定时器
	this._count = Math.abs(count);//切换数量
	this._target = 0;//目标值
	this._t = this._b = this._c = 0;//tween参数
	
	this.Index = 0;//当前索引
	
	this.SetOptions(options);
	
	this.Auto = !!this.options.Auto;
	this.Duration = Math.abs(this.options.Duration);
	this.Time = Math.abs(this.options.Time);
	this.Pause = Math.abs(this.options.Pause);
	this.Tween = this.options.Tween;
	this.onStart = this.options.onStart;
	this.onFinish = this.options.onFinish;
	
	var bVertical = !!this.options.Vertical;
	this._css = bVertical ? "top" : "left";//方向
	
	//样式设置
	var p = CurrentStyle(this._container).position;
	p == "relative" || p == "absolute" || (this._container.style.position = "relative");
	this._container.style.overflow = "hidden";
	this._slider.style.position = "absolute";
	
	this.Change = this.options.Change ? this.options.Change :(this._slider[bVertical ? "offsetHeight" : "offsetWidth"]) / this._count;
};
SlideTrans.prototype = {
  //设置默认属性
  SetOptions: function(options) {
	this.options = {//默认值
		Vertical:	true,//是否垂直方向（方向不能改）
		Auto:		true,//是否自动
		Change:		0,//改变量
		Duration:	50,//滑动持续时间
		Time:		10,//滑动延时
		Pause:		1000,//停顿时间(Auto为true时有效)
		onStart:	function(){},//开始转换时执行
		onFinish:	function(){},//完成转换时执行
		Tween:		Tween.Quart.easeOut//tween算子
	};
	Extend(this.options, options || {});
  },
  //开始切换
  Run: function(index) {
	//修正index
	index == undefined && (index = this.Index);
	index < 0 && (index = this._count - 1) || index >= this._count && (index = 0);
	//设置参数
	this._target = -Math.abs(this.Change) * (this.Index = index);
	
	this._t = 0;
	this._b = parseInt(CurrentStyle(this._slider)[this.options.Vertical ? "top" : "left"]);
	this._c = this._target - this._b;
	
	this.onStart();
	this.Move();
  },
  //移动
  Move: function() {
	clearTimeout(this._timer);
	//未到达目标继续移动否则进行下一次滑动
	if (this._c && this._t < this.Duration) {
        
		this.MoveTo(Math.round(this.Tween(this._t++, this._b, this._c, this.Duration)));
		this._timer = setTimeout(Bind(this, this.Move), this.Time);
	}else{
		this.MoveTo(this._target);
		this.Auto && (this._timer = setTimeout(Bind(this, this.Next), this.Pause));
	}
  },
  //移动到
  MoveTo: function(i) {
	this._slider.style[this._css] = i + "px";
  },
  //下一个
  Next: function() {
	this.Run(++this.Index);
  },
  //上一个
  Previous: function() {
	this.Run(--this.Index);
  },
  //停止
  Stop: function() {
	clearTimeout(this._timer); this.MoveTo(this._target);
  }
};

if (document.all){
	window.attachEvent('onload',init_sliders)//IE
}else{
	window.addEventListener('load',init_sliders,false);//firefox
}

function init_sliders() {
	init_slider.init();
	attachStyle(document,'.slide_trans li,.slide_trans ul { padding:0; margin:0;}.slide_trans img {border:none;}.slide_trans_h li{float:left;}.slide_trans_num {POSITION: absolute;FLOAT: right;}.slide_trans_num li{TEXT-ALIGN: center;LIST-STYLE-TYPE: none;FONT-FAMILY: Arial;FLOAT: left;COLOR: #FFF;FONT-SIZE: 12px;color:#005900;width:20px;height:18px;line-height:18px;border:1px solid #F27602;text-align:center;margin-right:3px;cursor:pointer;background:#FDF1D4;text-decoration:none;position:relative;}.slide_trans_num li.on{background:#F60;color:#fff;border-color:#D86C01;font-weight:bold;height:20px;line-height:20px;top:-1px;FONT-SIZE:14px;}');
}

var st = [];
var nums = [];
var init_slider = { init: function(){
    var sliders = getElementsByClassName('slide_trans');//外容器
    var idSlider,pic_num,idSlider_w,idSlider_h;
    for(var i=0;i<sliders.length;i++){
        idSlider = sliders[i].getElementsByTagName('ul');//内容器
        idSlider_w = sliders[i].style.width;
        idSlider_h = sliders[i].style.height;
        pic_num = idSlider[0].getElementsByTagName('li').length;
        idSlider[0].style.width = parseInt(idSlider_w)*pic_num + 'px';
        idSlider[1].style.top = parseInt(idSlider_h) - 28 + 'px';//数字导航
        idSlider[1].style.left = parseInt(idSlider_w) - (130*pic_num/5) + 'px';
		var vertical = true;
		if(idSlider[0].className == 'slide_trans_h') vertical = false;
        st[i] = new SlideTrans(sliders[i], idSlider, pic_num, { Vertical: vertical });
		nums[i] = [];
        
        //插入数字
        for(var j = 0, n = st[i]._count - 1; j <= n;){
            (nums[i][j] = idSlider[1].appendChild(document.createElement("li"))).innerHTML = ++j;
        }
        
        for(var j=0; j<nums[i].length; j++){
            var obj = setObjEvent(nums[i],i,j);
            obj.addEvent(); 
        }       
        st[i].Run();
	}
}}

function setObjEvent(o, i, j) {
    return {o:o,addEvent:function(){
        o[j].onmouseover = function(){o[j].className = "on";st[i].Auto = false; st[i].Run(j);};
        o[j].onmouseout = function(){o[j].className = ""; st[i].Auto = true; st[i].Run();};
        //设置按钮样式
        st[i].onStart = function(){
            for(var j=0; j<o.length; j++){
                o[j].className = st[i].Index == j ? "on" : "";
            }
        }
    }};
}

var forEach = function(array, callback, thisObject){
	if(array.forEach){
		array.forEach(callback, thisObject);
	}else{
		for (var k = 0, len = array.length; k < len; k++) {callback.call(thisObject, array[k], k, array);}
	}
}

var $c=function(array){var nArray = [];for (var i=0;i<array.length;i++) nArray.push(array[i]);return nArray;};
Array.prototype.each=function(func){for(var i=0,l=this.length;i<l;i++) {func(this[i],i);};};
var getElementsByClassName=function(cn){
	var hasClass=function(w,Name){
	var hasClass = false;
	w.className.split(' ').each(function(s){
		if (s == Name) hasClass = true;
	});
	return hasClass;
		};
	var elems =document.getElementsByTagName("*")||document.all;
		var elemList = [];
	   $c(elems).each(function(e){
		   if(hasClass(e,cn)){elemList.push(e);}
	   })
	return $c(elemList);
};
function attachStyle(ownDoc,styCss) {
     var elmSty = ownDoc.createElement('STYLE');
     elmSty.setAttribute("type", "text/css");
     if (elmSty.styleSheet) {
         elmSty.styleSheet.cssText=styCss; 
     } else { 
         elmSty.appendChild(ownDoc.createTextNode(styCss)); 
     }
     ownDoc.getElementsByTagName("head")[0].appendChild(elmSty);
} 