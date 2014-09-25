//document.scripts[0].src="jquery-min.js"
var socket;
var _extension;
var _ip="127.0.0.1";
var _port = "9999";
var _cntcallback;
var _popcallback;
//jQuery.support.cors = true;
/**
**
**连接服务器的接口
**ip:服务器IP地址
**func:连接服务器的回调函数
**/
function connect(ip, func) {
    _ip = ip; 
    _cntcallback = func;
    var host = "ws://" + _ip + ":" + _port;
    try{
        _socket = new WebSocket(host);
        _socket.onopen    =  function(msg) {onConnected(msg);};
        _socket.onmessage = function(msg) { onMessage(msg);};
        _socket.onclose   = function(msg) { onClosed(msg); };
        _socket.onerror = function(msg) { ; };
        socket
    }
    catch(ex){ ; }
}

/**
**
**设置来电弹屏回调函数
**
**/
function setPop(ext, func) {
    _extension=ext;
    _popcallback = func;

}

/**
**
**接收服务器数据
**
**/

function onMessage(msg) {
    val = msg.data;
    if (val.indexOf("newcall") != -1) {
	  _popcallback(val); 	
	}
      
}
/**
**
**成功连接服务器的事件
**
**/
function onConnected(msg) {
    _cntcallback("connected");
}
/**
**
**连接关闭的事件
**
**/
function onClosed(msg) {
    _cntcallback("disconnected");
}

/**
 * 
 *进队列
 *
**/ 
function addQueue(queue, func) {

    host = "http://"+_ip+"/interface?action=queueadd&extension="+_extension+"&queue="+queue;
    $.ajax({url:host,
       
            success:function(result,status,xhr){ func(result);}
    });
}
/**
 *
 *出队列
 *
**/ 

function removeQueue(queue, func) {

    host = "http://"+_ip+"/interface?action=queueremove&extension="+_extension+"&queue="+queue;
    $.ajax({url:host,

            success:function(result,status,xhr){ func(result);}
    });
}
/**
 *
 *
 * 软拨号
 *
* */
function  autoDial(callerid,func) {

    host = "http://"+_ip+"/interface?action=autodial&callerid=" +callerid +"&extension="+_extension;
    $.ajax({url:host,
            success:function(result,status,xhr){ func(result);}
    });
}


/**
 *
 *
 * 监听
 *
* */
function  spyExtension(target,func) {

    host = "http://"+_ip+"/interface?action=spy&extension=8008&target=" +target + "&extension="+_extension;
    $.ajax({url:host,
            success:function(result,status,xhr){ func(result);}
    });
}


/**
 * 
 *进队列
 *
**/ 
function hangupCall(func) {

    host = "http://"+_ip+"/interface?action=hangup&extension="+_extension;
    $.ajax({url:host,
            success:function(result,status,xhr){ func(result);}
    });
}

/**
 * 
 *查询所有队列信息
 *
**/ 
function queueStatus(func) {
    host = "http://"+_ip+"/interface?action=queuestatus";
    $.ajax({url:host,
            success:function(result,status,xhr){ func(result);}
    });
}


/**
 * 
 *查询我的状态
 *
**/ 
function myStatus(queue, func) {
    queueStatus(function(msg) {

        var mySta = new Object();
        mySta.Response = "false";
        $.each($.parseJSON(msg), function(idx, obj) {
                if(obj.number == queue && obj.members.indexOf(_extension) >= 0) {
                    mySta.Response = "ture";
                    return ;
                }
                        
            });
            var jsonStr = JSON.stringify(mySta);
             func(jsonStr);
        });
 
}




//处理刷新后上次的连接
window.onbeforeunload=function(){
   // alert("befor unload");      
    	try{ 
	    	_socket.close();
	    	_socket=null;
        }
        catch(ex){ 
		    ;//alert(ex);
        }
   
}


