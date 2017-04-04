// JavaScript Document
var UserFie=G("UserNameField");
var UserFieDiv=UserFie.getElementsByTagName("div")[1];
var Useratt=UserFie.getElementsByTagName("p")[0];
var Usererror=UserFie.getElementsByTagName("p")[1];
var Userok=UserFie.getElementsByTagName("p")[2];
var UserId=G("U_UserName");
var nameFlag = true;
UserId.onfocus=function(){
	if(UserId.value == "请输入11位手机号码"){
		UserId.value = "";
	} else {
		UserId.select();
	}
	addClass(UserFie,"hover");
	if(UserId.value == ""){
		UserFieDiv.style.display="block";
		Useratt.style.display="block";
		Usererror.style.display="none";
		UserId.className = "U_Field";
		return;
	}
}
UserId.onblur=function(){
	UserFie.className="field";
	if(UserId.value == ""){
		Useratt.style.display="none";
		Usererror.style.display="none";
		Userok.style.display="none";
		UserId.className="input_other";
		UserId.value = "请输入11位手机号码";
		return;
	}
	if (!NameField()) {
		return;
	}
	if (!NameExit()) {
		return;
	}
}

function NameField(){
	var errtext1="您填写的用户名有误，请输入11位手机号码";
	var str = UserId.value;
	//var patn = /^[a-zA-Z]{1}([a-zA-Z0-9]){1,}$/;
	
	var patn =/^1[3,5,8,4]\d{9}$/;

	if(patn.test(str)){
		if(checkByteLength(str,11,30)){
			//Reg.checkName(obj.value,callback_chkUserName);
			Usererror.style.display="none";
			Useratt.style.display="none";
			Userok.style.display="block";
			UserId.className="U_Field";
			return true;
		}
	}
	UserFieDiv.style.display="block";		
	Usererror.style.display="block";
	Useratt.style.display="none";
	Userok.style.display="none";
	Usererror.innerHTML=errtext1;
	addClass(UserId,"error");
	return false;
}
function checkByteLength(str,minlen,maxlen) {
	if (str == null) return false;
	var l = str.length;
	var blen = 0;
	for(i=0; i<l; i++) {
		if ((str.charCodeAt(i) & 0xff00) != 0) {
			blen ++;
		}
		blen ++;
	}
	if (blen > maxlen || blen < minlen) {
		return false;
	}
	return true;
}
function NameExit() {
	
	 
	  $.get("?action=username_exits",{payName :UserId.value}, function(data){  
	  	  //alert(UserId.value); alert(data);
				 if (data == '0') callbackName(0);
		 });
				 
	//return Pwd2.checkName(UserId.value, callbackName);
}

function callbackName(flag) {
	nameFlag = flag;
	var errtext2="已被注册";
	if (!flag) {
		UserFieDiv.style.display="block";		
		Usererror.style.display="block";
		Useratt.style.display="none";
		Userok.style.display="none";
		Usererror.innerHTML=errtext2;
		addClass(UserId,"error");
		return false;
	}
	Usererror.style.display="none";
	Useratt.style.display="none";
	Userok.style.display="block";
	UserId.className="U_Field";
	return true;
}

var PasswordId=G("U_PasswordField");
var PassId=G("U_Password");
var PasswordDiv=PasswordId.getElementsByTagName("div")[1];
var Passwordatt=PasswordId.getElementsByTagName("p")[0];
var Passworderror=PasswordId.getElementsByTagName("p")[1];
var Passwordok=PasswordId.getElementsByTagName("p")[2];
PassId.onfocus=function(){
	addClass(PasswordId,"hover");
	if(PassId.value == ""){
	PasswordDiv.style.display="block";
	Passwordatt.style.display="block";
	Passwordok.style.display="none";
	Passworderror.style.display="none";
	PassId.className="U_Field";
	}
}
PassId.onblur=function(){
	PasswordId.className="field";
		if(PassId.value == ""){
	Passwordatt.style.display="none";
	Passworderror.style.display="none";
	Passwordok.style.display="none";
	PasswordId.className="field";
	return false;	
	}
	if(PassId.value==RePassId.value && PassId.value!=""){
		RePasswordDiv.style.display="block";		
		RePassworderror.style.display="none";
		RePasswordatt.style.display="none";
		RePasswordok.style.display="block";
		RePassId.className="U_Field";
	}
	PassWords();

}
PassId.onkeyup=function(){
	var planId=G("schedule");
	var plantextId=G("schetext");
	if(PassId.value.length<6){
     planId.style.width="33px";
	 plantextId.innerHTML="弱";
	}
	if(PassId.value.length>6){
     planId.style.width="66px";
	 plantextId.innerHTML="中";
	}
	if(PassId.value.length>12){
     planId.style.width="101px";
	 plantextId.innerHTML="强";
	}
}
function PassWords(){
	if(PassId.value!=RePassId.value && RePassId.value != ''){
		RePasswordDiv.style.display="block";		
		RePassworderror.style.display="block";
		RePasswordatt.style.display="none";
		RePasswordok.style.display="none";
		RePassworderror.innerHTML="密码不匹配";
		addClass(RePassId,"error");
	}
	if(PassId.value.length==0){
		PassId.className="U_Field";
		PasswordDiv.style.display="block";		
		Passworderror.style.display="block";
		Passwordatt.style.display="none";
		Passwordok.style.display="none";
		Passworderror.innerHTML="密码在6-16个字符内";
		addClass(PassId,"error");
		return false;	
		}
	if(PassId.value.length<6 && PassId.value.length>0){
		PasswordDiv.style.display="block";		
		Passworderror.style.display="block";
		Passwordatt.style.display="none";
		Passwordok.style.display="none";
		Passworderror.innerHTML="密码在6-16个字符内";
		addClass(PassId,"error");
		return false;	
		}
	if(PassId.value.indexOf(" ")!=-1){
		PasswordDiv.style.display="block";		
		Passworderror.style.display="block";
		Passwordatt.style.display="none";
		Passwordok.style.display="none";
		Passworderror.innerHTML="您设置的密码格式有误";
		addClass(PassId,"error");
		return false;
	}
	Passworderror.style.display="none";
	Passwordatt.style.display="none";
	Passwordok.style.display="block";
	PassId.className="U_Field";
	return true;
}


var RePasswordId=G("U_RePasswordField");
var RePassId=G("U_RePassword");
var RePasswordDiv=RePasswordId.getElementsByTagName("div")[1];
var RePasswordatt=RePasswordId.getElementsByTagName("p")[0];
var RePassworderror=RePasswordId.getElementsByTagName("p")[1];
var RePasswordok=RePasswordId.getElementsByTagName("p")[2];
RePassId.onfocus=function(){
	addClass(RePasswordId,"hover");
	//if(PassId.value!=RePassId.value){
		//RePasswordatt.style.display="none";
		//RePasswordok.style.display="none";
		//RePassworderror.style.display="block";
		//addClass(RePassId,"error");
		//return false;
	//}
	if(RePassId.value == ""){
		RePasswordatt.style.display="none";
		RePasswordok.style.display="none";
		RePassworderror.style.display="none";
		RePasswordatt.style.display="block";
		RePassId.className="U_Field";
	}
}
RePassId.onblur=function(){
	RePasswordId.className="field";
	if(RePassId.value == ""){
		RePasswordatt.style.display="none";
		RePassworderror.style.display="none";
		RePasswordok.style.display="none";
		RePasswordId.className="field";
		RePassId.className="U_Field";
	}
	RePassWords();

}
function RePassWords(){
	if(PassId.value!=RePassId.value){
		RePasswordDiv.style.display="block";		
		RePassworderror.style.display="block";
		RePasswordatt.style.display="none";
		RePasswordok.style.display="none";
		RePassworderror.innerHTML="密码不匹配";
		addClass(RePassId,"error");
		return false;	
	}
	if(PassId.value.indexOf(" ")!=-1){
		RePasswordDiv.style.display="block";		
		RePassworderror.style.display="block";
		RePasswordatt.style.display="none";
		RePasswordok.style.display="none";
		RePassworderror.innerHTML="您设置的密码格式有误";
		addClass(RePassId,"error");
        return false;
	}
	if (PassId.value == '') {
		return false;
	}
	RePassworderror.style.display="none";
	RePasswordatt.style.display="none";
	RePasswordok.style.display="block";
	RePassId.className="U_Field";
	return true;
}

var CodeFieId=G("U_CodeField");
var CodeId=G("U_Code");
var CodeDiv=CodeFieId.getElementsByTagName("div")[1];
var Codeatt=CodeFieId.getElementsByTagName("p")[0];
var Codeerror=CodeFieId.getElementsByTagName("p")[1];
var Codeok=CodeFieId.getElementsByTagName("p")[2];
CodeId.onfocus=function(){
	addClass(CodeFieId,"hover");
	if(CodeId.value==""){
		CodeDiv.style.display="block";
		Codeatt.style.display="block";
		Codeerror.style.display="none";
		CodeId.className="U_Field";
	}
	//if (document.getElementById("U_CheckCode").style.display == "none") {
	//	nchangeImg();
	//}
}
CodeId.onblur=function(){
	if(CodeId.value==""){		
		CodeDiv.style.display="none";
		Codeatt.style.display="none";
		CodeId.className="U_Field";
		CodeFieId.className="field code-field";
		return false;	
	}
    CodeField();
}
function CodeField(){
	if(CodeId.value == '' || CodeId.value.length != 4){
		CodeDiv.style.display="block";		
		Codeerror.style.display="block";
		Codeatt.style.display="none";
		Codeok.style.display="none";
		Codeerror.innerHTML="请输入4位验证码";
		addClass(CodeId,"error");
		return false;		
	}
	Codeerror.style.display="none";
	Codeatt.style.display="none";
	Codeok.style.display="none";
	CodeId.className="U_Field";
	return true;
}
function UserInfoBut(){
	if (!userProtocol()) {
		alert("请阅读并同意聊否用户使用协议！");
		return false;
	}
	var result = NameField();
	if (!result) {
		return false;
	}
	result = result & nameFlag;
	if (!nameFlag) {
		var errtext2="已注册";
		UserFieDiv.style.display="block";		
		Usererror.style.display="block";
		Useratt.style.display="none";
		Userok.style.display="none";
		Usererror.innerHTML=errtext2;
		addClass(UserId,"error");
		return false;
	}
	result = result & PassWords();
	if(RePassId.value==""){
		RePasswordDiv.style.display="block";		
		RePassworderror.style.display="block";
		RePasswordatt.style.display="none";
		RePasswordok.style.display="none";
		RePassworderror.innerHTML="密码不匹配";
		addClass(RePassId,"error");
		return false;
	}
	result = result & RePassWords();
	result = result & CodeField();
	if(result == 0 || result == false){
		return false;
	}
	return true;
}
function userProtocol() {
	var box = G('U_confer');
	if (box.checked) {
		return true;
	} else {
		return false;
	}
}
function initForm() {
	if(UserId.value != ""){
		NameField();
	}
	if(EmailId.value != ""){
		EmailField();
	}
}