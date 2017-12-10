	/******************************************
	* Popup Box- By Jim Silver @ jimsilver47@yahoo.com
	* Visit http://www.dynamicdrive.com/ for full source code
	* This notice must stay intact for use
	******************************************/
	
	var ns4=document.layers
	var ie4=document.all
	var ns6=document.getElementById&&!document.all
	
	//drag drop function for NS 4////
	/////////////////////////////////
	
	var dragswitch=0
	var nsx
	var nsy
	var nstemp
	
	function drag_dropns(name){
	if (!ns4)
	return
	temp=eval(name)
	temp.captureEvents(Event.MOUSEDOWN | Event.MOUSEUP)
	temp.onmousedown=gons
	temp.onmousemove=dragns
	temp.onmouseup=stopns
	}
	
	function gons(e){
	temp.captureEvents(Event.MOUSEMOVE)
	nsx=e.x
	nsy=e.y
	}
	function dragns(e){
	if (dragswitch==1){
	temp.moveBy(e.x-nsx,e.y-nsy)
	return false
	}
	}
	
	function stopns(){
	temp.releaseEvents(Event.MOUSEMOVE)
	}
	
	//drag drop function for ie4+ and NS6////
	/////////////////////////////////
	
	
	function drag_drop(e){
	if (ie4&&dragapproved){
	crossobj.style.left=tempx+event.clientX-offsetx
	crossobj.style.top=tempy+event.clientY-offsety
	return false
	}
	else if (ns6&&dragapproved){
	crossobj.style.left=tempx+e.clientX-offsetx+"px"
	crossobj.style.top=tempy+e.clientY-offsety+"px"
	return false
	}
	}
	
	function initializedrag(e){
	crossobj=ns6? document.getElementById("showimage") : document.all.showimage
	var firedobj=ns6? e.target : event.srcElement
	var topelement=ns6? "html" : document.compatMode && document.compatMode!="BackCompat"? "documentElement" : "body"
	while (firedobj.tagName!=topelement.toUpperCase() && firedobj.id!="dragbar"){
	firedobj=ns6? firedobj.parentNode : firedobj.parentElement
	}
	
	if (firedobj.id=="dragbar"){
	offsetx=ie4? event.clientX : e.clientX
	offsety=ie4? event.clientY : e.clientY
	
	tempx=parseInt(crossobj.style.left)
	tempy=parseInt(crossobj.style.top)
	
	dragapproved=true
	document.onmousemove=drag_drop
	}
	}
	document.onmouseup=new Function("dragapproved=false")
	
	////drag drop functions end here//////
	
	function hidebox(){
	crossobj=ns6? document.getElementById("showimage") : document.all.showimage
	if (ie4||ns6)
	crossobj.style.visibility="hidden"
	else if (ns4)
	document.showimage.visibility="hide"
	}


// The application

	function FP_changePropRestore() {//v1.0
	 var d=document,x; if(d.$cpe) { for(i=0; i<d.$cpe.length; i++) { x=d.$cpe[i];
	 if(x.v=="") x.v=""; eval("x."+x.n+"=x.v"); } d.$cpe=null; }
	}
	
	function FP_changeProp() {//v1.0
	 var args=arguments,d=document,i,j,id=args[0],o=FP_getObjectByID(id),s,ao,v,x;
	 d.$cpe=new Array(); if(o) for(i=2; i<args.length; i+=2) { v=args[i+1]; s="o"; 
	 ao=args[i].split("."); for(j=0; j<ao.length; j++) { s+="."+ao[j]; if(null==eval(s)) { 
	  s=null; break; } } x=new Object; x.o=o; x.n=new Array(); x.v=new Array();
	 x.n[x.n.length]=s; eval("x.v[x.v.length]="+s); d.$cpe[d.$cpe.length]=x;
	 if(s) eval(s+"=v"); }
	}
	
	function FP_getObjectByID(id,o) {//v1.0
	 var c,el,els,f,m,n; if(!o)o=document; if(o.getElementById) el=o.getElementById(id);
	 else if(o.layers) c=o.layers; else if(o.all) el=o.all[id]; if(el) return el;
	 if(o.id==id || o.name==id) return o; if(o.childNodes) c=o.childNodes; if(c)
	 for(n=0; n<c.length; n++) { el=FP_getObjectByID(id,c[n]); if(el) return el; }
	 f=o.forms; if(f) for(n=0; n<f.length; n++) { els=f[n].elements;
	 for(m=0; m<els.length; m++){ el=FP_getObjectByID(id,els[n]); if(el) return el; } }
	 return null;
	}

