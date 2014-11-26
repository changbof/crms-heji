var weeks=["星期日","星期一","星期二","星期三","星期四","星期五","星期六"];


//替换tooltip函数
//动态更新tooltip显示内容
$.updateTooltip=function (element, options) {
    if (element.data('tooltip') != null) {
        element.tooltip('hide');
        element.removeData('tooltip');
    }
    element.tooltip(options).tooltip('show');
}

//动态更新popover显示内容
$.updatePopover=function (element, options) {
    if (element.data('popover') != null) {
        element.popover('hide');
        element.removeData('popover');
    }
    element.popover(options).popover('show');
}

$.updatePopoverAutoHide=function (element, options,timeout) {
    if(timeout==null || timeout=="" || timeout==0)timeout=3000;
    $.updatePopover(element, options);
    setTimeout(function() {element.popover('hide');}, timeout);
}

$.updateTooltipAutoHide=function (element, options,timeout) {
    if(timeout==null || timeout=="" || timeout==0)timeout=3000;
    $.updateTooltip(element, options);
    setTimeout(function() {element.tooltip('hide');}, timeout);
}


function listenShortCut(clazz){
	$('.'+clazz).click(function(){
		elem=$(this);
		url = $(this).attr("url");
		method= $(this).attr("method");
		$.getJSON(url+"&method="+method, function(json){
			
			if(json.result){
				$(".bb-alert").find("span").html(json.msg);
				$(".bb-alert").fadeIn();
				
				setTimeout(function(){
					$(".bb-alert").fadeOut();
				},3000);
				setTimeout(function(){
					if(method=="add"){
						elem.attr("method","del")
						elem.attr("class","icon-minus");
					}else if (method=="del"){
						elem.attr("method","add")
						elem.attr("class","icon-plus");
					}
				},3000);
			}
		});
	});
}

function createAutoClosingAlert(selector, delay) {
   var alert = $(selector).alert();
   window.setTimeout(function() { alert.alert('close') }, delay);
}

function alertDismiss(clazz,sec){
	setTimeout(function(){
		$('.'+clazz).fadeOut();
	},sec*1000);
}

$.ajaxSetup({
    contentType: "application/x-www-form-urlencoded; charset=utf-8"
});

var DataDeal = {
	//将从form中通过$('#form').serialize()获取的值转成json
   	formToJson: function (data) {
   		data= decodeURIComponent(data,true);//防止中文乱码
	    data=data.replace(/&/g,"\",\"");
        data=data.replace(/=/g,"\":\"");
        data="{\""+data+"\"}";
        return $.parseJSON(data);
    },
    formReset: function (formId){
    	$(':input','#'+formId)  
		 .not(':button, :submit, :reset, :hidden')  
		 .val('')  
		 .removeAttr('checked')  
		 .removeAttr('selected');
    }
};

/*格式化时间
formatStr:
   yyyy:年
   MM:月
   dd:日
   hh:小时
   mm:分钟
   ss:秒
*/
Date.prototype.toString = function(formatStr)
{
	var formatStr = formatStr || 'yyyy-MM-dd' ;
	var date = this;
	var timeValues = function(){};
	timeValues.prototype = {
		year:function(){
			if(formatStr.indexOf("yyyy")>=0)
			{
				return date.getFullYear();
			}
			else
			{
				return date.getFullYear().toString().substr(2);
			}
		},
		elseTime:function(val,formatVal){
			return formatVal>=0?(val<10?"0"+val:val):(val);
		},
		month:function(){
			return this.elseTime(date.getMonth ()+1,formatStr.indexOf("MM"));
		},
		day:function(){
			return this.elseTime(date.getDate(),formatStr.indexOf ("dd"));
		},
		hour:function(){
			return this.elseTime(date.getHours(),formatStr.indexOf ("hh"));
		},
		minute:function(){
			return this.elseTime(date.getMinutes (),formatStr.indexOf("mm"));
		},
		second:function(){
			return this.elseTime(date.getSeconds(),formatStr.indexOf ("ss"));
		}
	}
	var tV = new timeValues();
	var replaceStr = {
		year:["yyyy","yy"],
		month:["MM","M"],
		day:["dd","d"],
		hour:["hh","h"],
		minute:["mm","m"],
		second:["ss","s"]
	};
	for(var key in replaceStr)
	{
		formatStr = formatStr.replace(replaceStr[key][0],eval ("tV."+key+"()"));
		formatStr = formatStr.replace(replaceStr[key][1],eval ("tV."+key+"()"));
	}
	return formatStr;
}
/*
 * 根据生日计算年龄
 * yyyy-MM-dd
 *
 */
 function calAgeByBirthday(dateText){
	var birthday=new Date(dateText.replace(/-/g, "\/")); 
 	var now = new Date();

 	var age = now.getFullYear() - birthday.getFullYear() - 1;
 	if (birthday.getMonth() < now.getMonth() || 
 		birthday.getMonth() == now.getMonth() && 
 		birthday.getDate() <= now.getDate()) {
 		age++;
 	}
 	return age;
 } 

 function substr_replace(str, replace, start, length) {
  //  discuss at: http://phpjs.org/functions/substr_replace/
  //  original by: Brett Zamir (http://brett-zamir.me)
  //  example 1: substr_replace('ABCDEFGH:/MNRPQR/', 'bob', 0);
  //   returns 1: 'bob'
  //  example 2: $var = 'ABCDEFGH:/MNRPQR/';
  //  example 2: substr_replace($var, 'bob', 0, $var.length);
  //   returns 2: 'bob'
  //  example 3: substr_replace('ABCDEFGH:/MNRPQR/', 'bob', 0, 0);
  //   returns 3: 'bobABCDEFGH:/MNRPQR/'
  //  example 4: substr_replace('ABCDEFGH:/MNRPQR/', 'bob', 10, -1);
  //   returns 4: 'ABCDEFGH:/bob/'
  //  example 5: substr_replace('ABCDEFGH:/MNRPQR/', 'bob', -7, -1);
  //   returns 5: 'ABCDEFGH:/bob/'
  //  example 6: substr_replace('ABCDEFGH:/MNRPQR/', '', 10, -1)
  //   returns 6: 'ABCDEFGH://'

	if (start < 0) { // start position in str
		start = start + str.length;
  	}
  	length = length !== undefined ? length : str.length;
  	if (length < 0) {
  		length = length + str.length - start;
  	}
	return str.slice(0, start) + replace.substr(0, length) + replace.slice(length) + str.slice(start + length);
 }
/**
 * 随机数
 * 1）获取0-100的随机数——getRandom(100);
 * 2）获取0-999的随机数——getRandom(999);
 * 3）以此类推…
 * @param n
 * @returns {number}
 */
function getRandom(n){
    return Math.floor(Math.random()*n+2);
}