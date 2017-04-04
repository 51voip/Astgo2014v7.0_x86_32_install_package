function cityListuu(){
	var provinceList=G("icbcprovince");
	var cityList=G("icbccity");
	var today=new Date();
	for(p=0;p<provinces.length;p++){
			var provinceOp=document.createElement("option");
			var provinceTe=document.createTextNode(provinces[p]);
			provinceOp.appendChild(provinceTe);
			provinceOp.setAttribute("value",p);
			provinceList.appendChild(provinceOp);
		}
		for(q=0;q<citys[0].length;q++){
			var bcityOp=document.createElement("option");
			var bcityTe=document.createTextNode(citys[0][q]);
			bcityOp.appendChild(bcityTe);
			bcityOp.setAttribute("value",citys[0][q]);
			cityList.appendChild(bcityOp);
		}
	var yearId=G("yearId");
	for(y=0;y<Year.length;y++){
		var yearOp=document.createElement("option");
		var yearText=document.createTextNode(Year[y]);
		yearOp.appendChild(yearText);
		yearOp.setAttribute("value",Year[y]);
		yearId.appendChild(yearOp);
	}
	var mouthId=G("mouthId");
	
	for(m=0;m<month.length;m++){
		var monthOp=document.createElement("option");
		var monthText=document.createTextNode(month[m]);
		monthOp.appendChild(monthText);
		monthOp.setAttribute("value",month[m]);
		mouthId.appendChild(monthOp);
	}

	var dayId=G("dayId");
	for(d=0;d<day.length;d++){
		var dayOp=document.createElement("option");
		var dayText=document.createTextNode(day[d]);
		dayOp.appendChild(dayText);
		dayOp.setAttribute("value",day[d]);
		dayId.appendChild(dayOp);
	}

	var hourId=G("hourId");
	for(d=0;d<days.length;d++){
		var hourOp=document.createElement("option");
		var hourText=document.createTextNode(days[d]);
		hourOp.appendChild(hourText);
		hourOp.setAttribute("value",days[d]);
		hourId.appendChild(hourOp);
	}
	var minuteId=G("minuteId");
	for(m=0;m<minute.length;m++){
		var minuteOp=document.createElement("option");
		var minuteText=document.createTextNode(minute[m]);
		minuteOp.appendChild(minuteText);
		minuteOp.setAttribute("value",minute[m]);
		minuteId.appendChild(minuteOp);
	}
}

function Cityshow(index){
var provinceList=G("icbcprovince");
var cityList=G("icbccity");
var hid_Id=G("hid");
hid_Id.setAttribute("value",provinces[index.value]);
if(provinceList.value=="-1"){
	for(j=cityList.length-1;j>-1;j--){
			cityList.remove(j);
		}
		var bcityOp=document.createElement("option");
			var bcityTe=document.createTextNode("请选择");
			bcityOp.appendChild(bcityTe);
			bcityOp.setAttribute("value","-1")
			cityList.appendChild(bcityOp);
		return;
 }
		for(j=cityList.length-1;j>-1;j--){
			cityList.remove(j);
		}
		for(i=0;i<citys[provinceList.value].length;i++){
			var bcityOp=document.createElement("option");
			var bcityTe=document.createTextNode(citys[provinceList.value][i]);
			bcityOp.appendChild(bcityTe);
			bcityOp.setAttribute("value",citys[provinceList.value][i])
			cityList.appendChild(bcityOp);
		}
}

function remitBankId(){
	var remit_bankId=G("bankId");
	var bankId_err=G("bankIderr");
	if(remit_bankId.value == 0){
		bankId_err.innerHTML="<div class='input_error_msg1'>请选择汇入银行</div>";
		G('remit_bank_account').innerHTML = "";
		return false;
	}
	G('remit_bank_account').innerHTML = unescape(G('remit_bank_account_'+remit_bankId.value).value);
	bankId_err.innerHTML="";
	return true;
}

function remitMantt(){
	var remit_man=G("remitMan");
	var remit_err=G("remiterr");
	if(remit_man.value.length==0){
		remit_err.innerHTML="<div class='input_error_msg1'>不能为空</div>";
		return false;
	}
	remit_err.innerHTML="";
	return true;
}

function RemitBank(){
	var remit_bank=G("remitBank");
	var Bank_err=G("Bankerr");
	if(remit_bank.value==""){
		Bank_err.innerHTML="<div class='input_error_msg1'>请选择汇款银行</div>";
		return false;
	}
	Bank_err.innerHTML="";
	return true;
}

function RCash(){
	var R_cash=G("remitCash");
	var Cash_err=G("Casherr");
	if(R_cash.value.length==0 || R_cash.value==0.0){
		Cash_err.innerHTML="<div class='input_error_msg1'>请输入金额</div>";
		return false;
	}
	if(isNaN(R_cash.value)){
		Cash_err.innerHTML="<div class='input_error_msg1'>您输入有误</div>";
		return false;
	}
	if(R_cash.value<20){
		Cash_err.innerHTML="<div class='input_error_msg1'>汇款金额必需大于20元</div>";
		return false;
	}
	Cash_err.innerHTML="";
	return true;
}
function TelPhone(){
	var tel_phone=G("remitTelphone");
	var telphone_err=G("TelphoneErr");
	var cellphone=/^([\d-+]*)$/;
	if(tel_phone.value==""){
		telphone_err.innerHTML="<div class='input_error_msg1'>电话号码不能为空</div>";
		return false;
	}
	if(!cellphone.test(tel_phone.value)){
		telphone_err.innerHTML="<div class='input_error_msg1'>电话号码输入有误</div>";
		return false;
	}
	telphone_err.innerHTML="";
	return true;
}
function Messkeng(){
	var mess_age=G("message");
	var message_err=G("messageerr");
	if(mess_age.value=="您可在此说明您是给自己充值还是给他人充值（须写明他人的帐号），以及选择的套餐名称。"){
		mess_age.value="";
		return;
	}
}
function MessAge(){
	var mess_age=G("message");
	var message_err=G("messageerr");
	if(mess_age.value==""){
		mess_age.value="您可在此说明您是给自己充值还是给他人充值（须写明他人的帐号），以及选择的套餐名称。";
		mess_age.style.color="#999";
		return true;
	}else{
		mess_age.style.color="#333";
	}
	if(mess_age.value.length > 255){
		message_err.style.visibility="inherit";
		message_err.innerHTML="<div class='input_error_msg1'>不能超过255个字</div>";		
		return false;
	}
	message_err.innerHTML="";
	return true;
}
function RealName(){
	var real_name=G("realname");
	var realname_err=G("realnameerr");
	if(real_name.value.length==0){
		realname_err.innerHTML="<div class='input_error_msg1'>不能为空</div>";
		return false;
	}
	realname_err.innerHTML="";
	return true;
}
function idCard(){
	var id_card=G("idcard");
	var idcard_err=G("idcarderr");
	if(id_card.value.length==0){
		idcard_err.innerHTML="<div class='input_error_msg1'>不能为空</div>";
		return false;
	}
	var num=id_card.value; 
　　 var len = num.length; 
　　 if (len == 11){ 
　　 	re = new RegExp(/^(\d{6})()?(\d{2})(\d{2})(\d{2})(\d{3})$/); 
	}
　　 else {
		if (len == 20){
	　　 re = new RegExp(/^(\d{6})()?(\d{4})(\d{2})(\d{2})(\d{3})(\d)$/); 
		}
	　　 else {
		idcard_err.innerHTML="<div class='input_error_msg1'>手机号码有误</div>";
		return false;
		} 
	}	
	idcard_err.innerHTML="";
	return true;
}
function idtel(){
	var id_tel=G("idteladd");
	var idtel_err=G("idteladderr");
	if(id_tel.value.length==0){
		idtel_err.innerHTML="<div class='input_error_msg1'>不能为空</div>";
		return false;
	}
	var cellphone=/^([\d-+]*)$/; 
	if(!cellphone.test(id_tel.value)) 
	{ 
		idtel_err.innerHTML="<div class='input_error_msg1'>您输入有效电话号码！</div>";
		return false;
	}
	idtel_err.innerHTML="";
	return true;
}
function PostCode(){
	var post_code=G("postcode");
	var postcode_err=G("postcodeerr");
	if(post_code.value==""){
		postcode_err.innerHTML="<div class='input_error_msg1'>不能为空</div>";
		return false;
	}
	if(isNaN(post_code.value)||post_code.value.length!=6){
		postcode_err.innerHTML="<div class='input_error_msg1'>输入有误</div>";
		return false;
	}
	postcode_err.innerHTML="";
	return true;
}
function AddRess(){
	var add_ress=G("address");
	var address_err=G("addresserr");
	if(add_ress.value==""){
		address_err.innerHTML="<div class='input_error_msg1'>不能为空</div>";
		return false;
	}
	address_err.innerHTML="";
	return true;
}
function citylisttwo(){
	var icbcprovin=G("icbcprovince");
	var cityg_err=G("citygerr");
	if(icbcprovin.value=="-1"){
		cityg_err.innerHTML="<div class='input_error_msg1'>请选择省份</div>";
		return false;
	}
	cityg_err.innerHTML="";
	return true;
}
function timelistTw(){
	var yearId=G("yearId");
	var mouthId=G("mouthId");
	var dayId=G("dayId");
	var hourId=G("hourId");
	var minuteId=G("minuteId");
	var time_err=G("timeerr");
	if(yearId.value=="-1" || mouthId.value=="-1" || dayId.value=="-1" || hourId.value=="-1" || minuteId.value=="-1"){
		time_err.innerHTML="<div class='input_error_msg1'>请选择汇款时间</div>";
		return false;
	}
	time_err.innerHTML="";
	return true;
}
function addRemitSub(){
	// var boxone = G('hasConInfo');
	var result=remitMantt();
	result=result & remitBankId();
	result=result & RemitBank();
	result=result & citylisttwo();
	result=result & timelistTw();
	result=result & RCash();
	result=result & TelPhone();
	result=result & MessAge();
	//if(boxone.checked){
		//result=result&RealName();
		//result=result&idCard();
		//result=result&PostCode();
		//result=result&AddRess();
	//}
	if(result==0||result==false){
		return false;
	}
	return true;
}
function CardNber(){
	var card_Number=G("cardNumber");
	var cardNumber_err=G("cardNumbererr");
	if(card_Number.value==""){
		cardNumber_err.innerHTML="<div class='input_error_msg1'>不能为空</div>";
		return false;
	}
	cardNumber_err.innerHTML="";
	return true;
}
function PayPassword(){
	var pay_password=G("paypassword");
	var paypassword_err=G("paypassworderr");
	if(pay_password.value==""){
		paypassword_err.innerHTML="<div class='input_error_msg1'>不能为空</div>";
		return false;
	}
	paypassword_err.innerHTML="";
	return true;
}
function RandCode(){
	var rand_code=G("code");
	var code_err=G("codeerr");
	if(rand_code.value==""){
		code_err.innerHTML="<div class='input_error_msg1'>不能为空</div>";
		return false;
	}
	code_err.innerHTML="";
	return true;
}
function cardForm(){
	var result=CardNber();
	result=result&PayPassword();
	result=result&RandCode();
	if(result==0||result==false){
		return false;
	}
	return true;
}
function Question(){
	var question_Id=G("questionId");
	var questionId_err=G("questionerr");
	if(question_Id.value==0){
		questionId_err.innerHTML="<div class='input_error_msg1'>请选择问题</div>";
		return false;
	}
	questionId_err.innerHTML="";
	return true;
}
function AnSwer(){
	var an_swer=G("answer");
	var answer_err=G("answer_err");
	if(an_swer.value==""){
		answer_err.innerHTML="<div class='input_error_msg1'>请输入答案</div>";
		return false;
	}
	answer_err.innerHTML="";
	return true;
}
function pwdProForm(){
	var result=Question();
	result=result&AnSwer();
	if(result==0||result==false){
		return false;
	}
	return true;
}
function IdenTity(){
	var identity_Id=G("identityId");
	var identity_err=G("identityerr");
	if(identity_Id.value==100){
		identity_err.innerHTML="<div class='input_error_msg1' style='display:inline;'>请选择类型</div>";
		return false;
	}
	identity_err.innerHTML="";
	return true;
}
function PwdidentityNum(){
	var identityNuma_Id=G("identityNuma");
	var identityNumb_id=G("identityNumb");
	var identityNum_err=G("identityNum_err");
	if((identityNuma_Id.value==""||identityNuma_Id.value=="输入前6位数字")||(identityNumb_id.value==""||identityNumb_id.value=="输入后4位数字")){
		identityNum_err.innerHTML="<div class='input_error_msg1'>请填写证件号</div>";
		return false;
	}
	identityNum_err.innerHTML="";
	return true;
}
function PwdidentityNum2(){
	var identityNuma_Id=G("identityNuma");
	var identityNumb_id=G("identityNumb");
	var identityNum2a_Id=G("identityNum2a");
	var identityNum2b_id=G("identityNum2b");
	var identityNum2_err=G("identityNum2_err");
	if((identityNum2a_Id.value==""||identityNum2a_Id.value=="输入前6位数字")||(identityNum2b_id.value==""||identityNum2b_id.value=="输入后4位数字")){
		identityNum2_err.innerHTML="<div class='input_error_msg1'>再输一遍证件号</div>";
		return false;
	}
	if(identityNum2a_Id.value!=identityNuma_Id.value||identityNum2b_id.value!=identityNumb_id.value){
		identityNum2_err.innerHTML="<div class='input_error_msg1'>证件号不同</div>";
		return false;
	}
	identityNum2_err.innerHTML="";
	return true;
}
function IdentityNum(){
	var identityNum_Id=G("identityNum");
	var identityNum_err=G("identityNum_err");
	if(identityNum_Id.value==""){
		identityNum_err.innerHTML="<div class='input_error_msg1'>证件号不能为空</div>";
		return false;
	}
	identityNum_err.innerHTML="";
	return true;
}
function IdentityNum2(){
	var identityNum_Id=G("identityNum");
	var identityNum2_Id=G("identityNum2");
	var identityNum2_err=G("identityNum2_err");
	if(identityNum2_Id.value==""){
		identityNum2_err.innerHTML="<div class='input_error_msg1'>证件号不能为空</div>";
		return false;
	}
	if(identityNum2_Id.value!=identityNum_Id.value){
		identityNum2_err.innerHTML="<div class='input_error_msg1'>证件号不一致</div>";
		return false;
	}
	identityNum2_err.innerHTML="";
	return true;
}
function pwdProForm2(){
	var idt = document.getElementById("identityId").value;
	if(idt==101){
		var result=IdenTity();
		result=result&PwdidentityNum();
		result=result&PwdidentityNum2();
	}
	if(idt>101){
		var result=IdentityNum();
		result=result&IdentityNum2();
	}
	if(result==0||result==false){
		return false;
	}
	return true;
}
function OldPwd(){
	var oldPwd_Id=G("oldPwd");
	var oldPwderr=G("oldPwderr");
	if(oldPwd_Id.value==""){
		oldPwderr.innerHTML="";
		oldPwderr.innerHTML="<div class='input_error_msg1'>不能为空</div>";
		return false;
	}
	oldPwderr.innerHTML="";
	return true;
}
function NewPwd(){
	var newPwd_id=G("newPwd");
	var newPwd_err=G("newPwderr");
	if(newPwd_id.value==""){
		newPwd_err.innerHTML="";
		newPwd_err.innerHTML="<div class='input_error_msg1'>不能为空</div>";
		return false;
	}
	if(newPwd_id.value.length<6){
		newPwd_err.innerHTML="";
		newPwd_err.innerHTML="<div class='input_error_msg1'>不能小于6位</div>";
		return false;
	}
	newPwd_err.innerHTML="";
	return true;
}
function NewPwd2(){
	var newPwd_id=G("newPwd");
	var newPwd_id2=G("newPwd2");
	var newPwd_err2=G("newPwderr2");
	if(newPwd_id2.value==""){
		newPwd_err2.innerHTML="";
		newPwd_err2.innerHTML="<div class='input_error_msg1'>不能为空</div>";
		return false;
	}
	if(newPwd_id2.value!=newPwd_id.value){
		newPwd_err2.innerHTML="";
		newPwd_err2.innerHTML="<div class='input_error_msg1'>密码必须一致</div>";
		return false;
	}
	newPwd_err2.innerHTML="";
	return true;
}
function changPwdForm(){
	var result=OldPwd();
	result=result&NewPwd();
	result=result&NewPwd2();
	if(result==0||result==false){
		return false;
	}
	return true;
}
function CheckPassWord(){
	var check_Password=G("checkPassword");
	var checkPassword_err=G("checkPassworderr");
	if(check_Password.value==""){
		checkPassword_err.innerHTML="<div class='input_error_msg1'>不能为空</div>";
		return false;
	}
	checkPassword_err.innerHTML="";
	return true;
}
function InfoRealName(){
	var info_realname=G("inforealname");
	var inforealname_err=G("inforealnameerr");
	if(info_realname.value==""){
		inforealname_err.innerHTML="<div class='input_error_msg1'>不能为空</div>";
		return false;
	}
	inforealname_err.innerHTML="";
	return true;
}
function InfoaddressInput(){
	var address_input_Id=G("address_input");
	var address_input_err=G("address_input_err");
	if(address_input_Id.value==""){
		address_input_err.innerHTML="<div class='input_error_msg1'>不能为空</div>";
		return false;
	}
	address_input_err.innerHTML="";
	return true;
}
function InfoPostCode(){
	var post_code=G("infocodeId");
	var postcode_err=G("infocodeIderr");
	if(post_code.value==""){
		postcode_err.innerHTML="<div class='input_error_msg1'>不能为空</div>";
		return false;
	}
	if(isNaN(post_code.value)||post_code.value.length!=6){
		postcode_err.innerHTML="<div class='input_error_msg1'>输入有误</div>";
		return false;
	}
	postcode_err.innerHTML="";
	return true;
}
function InfoMobile(){
	var tel_phone=G("Info_Mobile");
	var telphone_err=G("Info_Mobile_err");
	if(tel_phone.value==""){
		telphone_err.innerHTML="<div class='input_error_msg1'>手机不能为空</div>";
		return false;
	}
	var num=tel_phone.value; 
　　 var len = num.length; 
	if (len == 11){ 
　　 	re = new RegExp(/^(\d{6})()?(\d{2})(\d{2})(\d{2})(\d{3})$/); 
	}
　　 else {
		if (len == 20){
	　　 re = new RegExp(/^(\d{6})()?(\d{4})(\d{2})(\d{2})(\d{3})(\d)$/); 
		}
	　　 else {
		telphone_err.innerHTML="<div class='input_error_msg1'>手机有误</div>";
		return false;
		}
	}
	telphone_err.innerHTML="";
	return true;
}
function InfoTel(){
	var info_tel=G("info_tel");
	var info_tel_err=G("info_tel_err");
	if(info_tel.value!=""){
		if(isNaN(info_tel.value)){
			info_tel_err.innerHTML="<div class='input_error_msg1'>格式有误</div>";
			return false;
		}
	}
	info_tel_err.innerHTML="";
	return true;
}
function InfoForm(){
	var result=InfoRealName();
	var result=result&InfoaddressInput();
	var result=result&InfoPostCode();
	var result=result&InfoMobile();
	var result=result&InfoTel();
	if(result==0||result==false){
		return false;
	}
	return true;
}