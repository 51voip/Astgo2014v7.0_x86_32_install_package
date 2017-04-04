var pictwo=0;
var movement=0;
var p=0;
var onmoudu=0;
function flashPay(){
	var flash_pic=G("inpic");	
	var fig_Id=G("flash_btn");
	var fig_Href=G("flash_img");
	var fig_Hreflink=fig_Href.getElementsByTagName("a");
	var fig_list=fig_Id.getElementsByTagName("li");
	if(movement){
		clearTimeout(movement);
	}
	for(i=0;i<fig_list.length;i++){
		fig_list[i].className="";
	}
	if(pictwo==3){
		pictwo=0;
	}	
	var o=document.getElementById("flash_btn");
	var tt=o.getElementsByTagName("li");
	var picgg=G("flash_img");
	var pitt=picgg.getElementsByTagName("a");	
	
	pitt[0].onmouseover=function(){p=1;pictwo--;if(onmoudu==1){pictwo++};}
	pitt[0].onmouseout=function(){p=0;pictwo++;}
	tt[0].onmouseover=function(){figdx(0);p=1;pictwo=0;onmoudu=1;}
	tt[0].onmouseout=function(){figdx(0);p=0;}
	tt[1].onmouseover=function(){figdx(1);p=1;pictwo=1;onmoudu=1;}
	tt[1].onmouseout=function(){figdx(1);p=0;}
	tt[2].onmouseover=function(){figdx(2);p=1;pictwo=2;onmoudu=1;}
	tt[2].onmouseout=function(){figdx(2);p=0;}
	
	if(p==0){
			if(pictwo<3){		
			if(pictwo==0){
				flash_pic.setAttribute("src",PicImage[0]);
				fig_Hreflink[0].setAttribute("href",PicLink[0]);
			}
			if(pictwo==1){
				flash_pic.setAttribute("src",PicImage[1]);
				fig_Hreflink[0].setAttribute("href",PicLink[1]);
			}
			if(pictwo==2){
				flash_pic.setAttribute("src",PicImage[2]);
				fig_Hreflink[0].setAttribute("href",PicLink[2]);
			}
			fig_list[pictwo].className="figlist";
			pictwo++;
			onmoudu=0;
		}
	}else{
		fig_list[pictwo].className="figlist";
	}
    
	movement=setTimeout("flashPay()",3000)
}
function figdx(index){
	pictwo=index;
	if(movement!=0){clearTimeout(movement);movement=0;}
	flashPay();
}

function roll(indexId,aspect,roWidth,roheight,timing,sticktime,begintime,welterheight){
	var marquee1 = new Marquee(indexId)
		marquee1.Direction = aspect;
		marquee1.Step = 1;
		marquee1.Width = roWidth;
		marquee1.Height = roheight;
		marquee1.Timer = timing;
		marquee1.DelayTime = sticktime;
		marquee1.WaitTime = begintime;
		marquee1.ScrollStep = welterheight;
		marquee1.Start();
	}