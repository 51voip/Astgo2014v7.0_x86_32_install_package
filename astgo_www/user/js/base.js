// ****************************************************************************
// ** Script for www.uucall.com v1.0 beta
// ****************************************************************************
function G(id){if(typeof(id)=="string"){return document.getElementById(id);}return id;}

String.prototype.trim = function () {
    return this.replace(/(^\s*)|(\s*$)/g, "");
};

//----------------------------------------------------------
// Asynchronous Notic
//----------------------------------------------------------
function notic(url){
	(new Image()).src=url;
}

//----------------------------------------------------------
// Set Cookie
//----------------------------------------------------------
function setCookie(sName, sValue){
   //document.cookie = escape(sName) + "=" + escape(sValue) + "; domain=uucall.com";
   
   
	var argv=setCookie.arguments;
	var argc=setCookie.arguments.length;
	var expires=(2<argc)?argv[2]:null;
	var path=(3<argc)?argv[3]:null;
	var domain=(4<argc)?argv[4]:null;
	var secure=(5<argc)?argv[5]:false;
	document.cookie=escape(sName)+"="+escape(sValue)+((expires==null)?"":("; expires="+expires.toGMTString()))+((path==null)?"":("; path="+path))+((domain==null)?"":("; domain="+domain))+((secure==true)?"; secure":"");
}

//----------------------------------------------------------
// Get Cookie
//----------------------------------------------------------
function getCookie(name) {
    var arg = name + "=";
    var alen = arg.length;
    var clen = document.cookie.length;
    var i = 0;
    while (i < clen) {
        var j = i + alen;
        if (document.cookie.substring(i, j) == arg) {
		    var endstr = document.cookie.indexOf(";", j);
		    if (endstr == -1) {
		        endstr = document.cookie.length;
		    }
		    return unescape(document.cookie.substring(j, endstr));
        }
        i = document.cookie.indexOf(" ", i) + 1;
        if (i == 0) {
            break;
        }
    }
    return null;
}

//----------------------------------------------------------
// Dynamic Load Javascript
//----------------------------------------------------------
function loadScript(id,url){
    oScript = document.getElementById(id); 
    var head = document.getElementsByTagName("head").item(0); 
    if (oScript) {
        head.removeChild(oScript); 
    }  
    oScript = document.createElement("script"); 
    oScript.setAttribute("src", url); 
    oScript.setAttribute("id",id); 
    oScript.setAttribute("type","text/javascript"); 
    oScript.setAttribute("language","javascript"); 
    head.appendChild(oScript); 
    return oScript; 
}

//----------------------------------------------------------
// Base AjaxRequest
//----------------------------------------------------------
function AjaxRequest(){
    var oThis = this; 
    var text = null;
    var xml = null;
    var object = null;
    var xmlhttp = null;
    var parameters = [];
    try {
        xmlhttp = new XMLHttpRequest();
    }catch (e1) {
        try {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        } catch (e2) {
            try{
                xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
            }catch(e3){
            }
        }
    }
    if(xmlhttp==null){
        alert("Can't create XMLHttpRequest object");
        return null;
    }

    this.onreadystatechange = function(){
        if(xmlhttp.readyState==4){
            if(xmlhttp.status==200 ||xmlhttp.status==0){
                oThis.onBack();
            }else{
                if (xmlhttp.status==404){
                    // alert("URL: (" + oThis.url + ") doesn't exist!");
                }else{
                    // alert("Status is " + xmlhttp.status);
                }
            }
        }
    }
    
    this.open = function(_method,_url,_async){
        xml = null;
        text = null;
        object = null;
        oThis.clearParameters();
        oThis.async = _async;
        oThis.url = _url;
        xmlhttp.open(_method,_url,_async);
        xmlhttp.setRequestHeader("CONTENT-TYPE","application/x-www-form-urlencoded");
        oThis.setParameter("_isAjaxRequest",'true');    
        if(_async==true) {xmlhttp.onreadystatechange=oThis.onreadystatechange;}
    }

    this.setParameter = function(name,value) {
        parameters.push({'name':name,'value':value});
    }

    this.clearParameters = function(){
        parameters = new Array();
    }

    this.getParametersStr = function(){
        var info = [];
        var pvalue = null;
        for(var i=0;i<parameters.length;i++){
            var p = parameters[i];
            if(p==null) continue;
            pvalue = encodeURIComponent(p.value);
            info.push(p.name + "=" + pvalue);
        }
        var str = info.join("&");
        return str;
    }
    
    this.send = function(){
        var str =oThis.getParametersStr();
        xmlhttp.send(str);
        // if async is false, run function by synchronous
        if(oThis.async==false) {oThis.onreadystatechange();}
        oThis.clearParameters();
    }
    
    // return value of object
    this.getObject = function(){
        if(object==null){
            try{
                object = eval("obj=" + oThis.getText());
            }catch(e){
                object = null;
            }
        }
        return object;
    }
    
    // return value of text
    this.getText = function(){
        if(text==null) {text = xmlhttp.responseText;}
        return text;
    }

    // return value of xmlDoc
    this.getXml = function(){
        if(xml==null) {xml = xmlhttp.responseXML;}
        return xml;
    }
      
    this.onBack = function(){}
}
function addLoadEvent(func){
	var oldonload = window.onload;
	if(typeof window.onload != 'function'){
		window.onload = func;
	}else{
		window.onload = function(){
			oldonload();
			func();
		}
	}
}
function moveMessage(elementID,final_x,final_y,interval){
	var elem=G(elementID);
	if(elem.movement){
		clearTimeout(elem.movement);
	}
	var xpos=parseInt(elem.style.left);
	var ypos=parseInt(elem.style.top);
	if(xpos==final_x && ypos==final_y){
		return true;
	}
	if(xpos<final_x){
		xpos++
	}
	if(xpos>final_x){
		xpos--
	}
	if(ypos<final_y){
		ypos++
	}
	if(ypos>final_y){
		ypos--
	}
	elem.style.left=xpos+"px";
	elem.style.top=ypos+"px";
	var recp="moveMessage('"+elementID+"',"+final_x+","+final_y+","+interval+")"
	elem.movement=setTimeout(recp,interval);
}
function insertAfter(newElement,targetElement){
	var parent = targetElement.parentNode;
	if(parent.lastChild == targetElement){
		parent.appendChild(newElement);
		}else{
		parent.insertBefore(newElement,targetElement.nextSibling);
		}
}
function addClass(element,value){
	if(!element.className){
		element.className = value;
		}else{
		newClassName = element.className;
		newClassName += " ";
		newClassName += value;
		element.className = newClassName;
		}
}

//input number only
function keypress(e){
	if(window.event){
		if(e.keyCode<48 || e.keyCode>57 || e.keyCode==8){
			return false;
		}else{
			return true;
		}
	}else if(e.which){
		if((e.which>47) && (e.which<58) || (e.which==8)){
			return true;
		}else{
			return false;
		}
	}
}

function StringBuffer(){
    var oThis = this; 
    this._strings = [];
    
    this.append = function(str){
        oThis._strings.push(str);
    }
    this.toString = function(){
        return oThis._strings.join("");
    }
    this.length = function(){
        return oThis._strings.join("").length;
    }
}

function validNameNumber(name, number) {
	if (isNaN(number)) {
		return false;
	}
	var pag2 = /^[_a-zA-Z0-9\\-]+([\\.][_a-zA-Z0-9\\-]*)*@[a-zA-Z0-9\\-]+([\\.][a-zA-Z0-9\\-]+)+$/;
	if (!pag2.test(name)) {
		return false;
	}
	return true;
}

Date.prototype.format = function(format) {
	var o = {
		"M+" : this.getMonth() + 1,
		"d+" : this.getDate(),
		"h+" : this.getHours(),
		"m+" : this.getMinutes(),
		"s+" : this.getSeconds(),
		"q+" : Math.floor((this.getMonth() + 3) / 3),
		"S" : this.getMilliseconds()
	}

	if (/(y+)/.test(format)) {
		format = format.replace(RegExp.$1, (this.getFullYear() + "").substr(4 - RegExp.$1.length));
	}

	for ( var k in o) {
		if (new RegExp("(" + k + ")").test(format)) {
			format = format.replace(RegExp.$1, RegExp.$1.length == 1 ? o[k]
					: ("00" + o[k]).substr(("" + o[k]).length));
		}
	}
	return format;
}

/**
 * 格式化数字显示方式 
 * 用法
 * formatNumber(12345.999,'#,##0.00');
 * formatNumber(12345.999,'#,##0.##');
 * formatNumber(123,'000000');
 * @param num
 * @param pattern
 */
function formatNumber(num,pattern){
  var strarr = num?num.toString().split('.'):['0'];
  var fmtarr = pattern?pattern.split('.'):[''];
  var retstr='';

  // 整数部分
  var str = strarr[0];
  var fmt = fmtarr[0];
  var i = str.length-1;  
  var comma = false;
  for(var f=fmt.length-1;f>=0;f--){
    switch(fmt.substr(f,1)){
      case '#':
        if(i>=0 ) retstr = str.substr(i--,1) + retstr;
        break;
      case '0':
        if(i>=0) retstr = str.substr(i--,1) + retstr;
        else retstr = '0' + retstr;
        break;
      case ',':
        comma = true;
        retstr=','+retstr;
        break;
    }
  }
  if(i>=0){
    if(comma){
      var l = str.length;
      for(;i>=0;i--){
        retstr = str.substr(i,1) + retstr;
        if(i>0 && ((l-i)%3)==0) retstr = ',' + retstr; 
      }
    }
    else retstr = str.substr(0,i+1) + retstr;
  }

  retstr = retstr+'.';
  // 处理小数部分
  str=strarr.length>1?strarr[1]:'';
  fmt=fmtarr.length>1?fmtarr[1]:'';
  i=0;
  for(var f=0;f<fmt.length;f++){
    switch(fmt.substr(f,1)){
      case '#':
        if(i<str.length) retstr+=str.substr(i++,1);
        break;
      case '0':
        if(i<str.length) retstr+= str.substr(i++,1);
        else retstr+='0';
        break;
    }
  }
  return retstr.replace(/^,+/,'').replace(/\.$/,'');
}