function $(element) {
	return document.getElementById(element);
}
//切屏--是按钮，_v是内容平台，_h是内容库
function reg(str){
  var bt=$(str+"_b").getElementsByTagName("h2");
  for(var i=0;i<bt.length;i++){
    bt[i].subj=str;
    bt[i].pai=i;
    bt[i].style.cursor="pointer";
    bt[i].onclick=function(){
      $(this.subj+"_v").innerHTML=$(this.subj+"_h").getElementsByTagName("blockquote")[this.pai].innerHTML;
      for(var j=0;j<$(this.subj+"_b").getElementsByTagName("h2").length;j++){
        var _bt=$(this.subj+"_b").getElementsByTagName("h2")[j];
        var ison=j==this.pai;
        _bt.className=(ison?"":"h2bg");
      }
    }
  }
  $(str+"_h").className="none";
  $(str+"_v").innerHTML=$(str+"_h").getElementsByTagName("blockquote")[0].innerHTML;
}


function picturs(){
	var goodsimg = document.getElementById("goodsimg");
	var imglist = document.getElementById("imglist");
	var imgnum = imglist.getElementsByTagName("img");
	for(var i = 0; i<imgnum.length; i++){
		imgnum[i].onclick=function(){
			var lang = this.getAttribute("lang");
			goodsimg.setAttribute("src",lang);
			for(var j=0; j<imgnum.length; j++){
				if(imgnum[j].getAttribute("class") =="onbg" || imgnum[j].getAttribute("className") =="onbg"){
					imgnum[j].className = "autobg";
					break;
				}
			}
			this.className = "onbg";
		}
	}
}

function colorStyle(id,color1,color2){
  var elem = document.getElementById(id);
  if(elem.getAttribute("id") == id){
	  //elem.className = color1;
	  if(elem.className == color1)
		   elem.className = color2;
		else
		   elem.className = color1; 
	}
}

function articleSize(size,lineheight){
var article = document.getElementById("article");
article.style.fontSize = size+"px";
article.style.lineHeight = lineheight+"px";
}

function elems(id,cur){
var id = document.getElementById(id).getElementsByTagName("li");
for(var i=0; i<id.length; i++)
 {
	 id[0].className = "cur";
   id[i].onmouseover = function()
   {
    this.className="";
		for(var j=0; j<id.length; j++)
		{
			 if((id[j].getAttribute("class") == cur) || (id[j].getAttribute("className") == cur))
			 {
			 id[j].className = "";
			 break;
			 }
		}
	this.className = cur;	
   }
 }
}

//点击切换背景图片效果

function mypicBg(){
	
	var imglist = document.getElementById("imglist");
	var imgnum = imglist.getElementsByTagName("a");
	for(var i = 0; i<imgnum.length; i++){
		imgnum[i].onclick=function(){
			
			for(var j=0; j<imgnum.length; j++){
				if(imgnum[j].getAttribute("class") =="selected" || imgnum[j].getAttribute("className") =="selected"){
					imgnum[j].className = "";
					break;
				}
			}
			this.className = "selected";
		}
	}
}
//
var old = new Array();
var buyercmt;
function show_goodspic(id,type)
{
  if(old[type]!=null)
  {
	  document.getElementById(type+"b"+old[type]).style.display='none';
	  document.getElementById(type+"s"+old[type]).style.display='block';
  }
      document.getElementById(type+"s"+id).style.display='none';
	  document.getElementById(type+"b"+id).style.display='block';
	  old[type] = id;
}
function stopError() {

            return true;

          }

          window.onerror = stopError;

function MakeFlashString(source,id,width,height,wmode, otherParam)
{	
	return "<embed src="+source+" quality=high wmode="+wmode+" type=\"application/x-shockwave-flash\" pluginspage=\"https://www.macromedia.com/shockwave/download/index.cgi?p1_prod_version=shockwaveflash\" width="+width+" height="+height+"></embed>";
}

function MakeObjectString(classid, codebase, name, id, width,height, param)
{
	return "<object classid="+classid+" codebase="+codebase+" name="+name+" width="+width+" height="+height+" id="+id+"><param name=wmode value="+wmode+" />"+param+"</object>";
}
function chgActive(id)
{
	document.write(id.text);
}
// innerHTML Type
function SetInnerHTML(target, code)
{ 
	target.innerHTML = code; 
}

// Direct Write Type
function DocumentWrite(src)
{
	document.write(src);
}



