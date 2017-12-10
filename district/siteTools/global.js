// JavaScript Document

   var manager = new jsAnimManager();
   

	function init(){
		
	   content = document.getElementById("content"); 
	   manager.registerPosition("content");
	   content.setPosition(0,0);
	   content.style.position = "relative";  
	   var anim = manager.createAnimObject("content");
	   
	   anim.add({property: Prop.height, from: 1, to: 430, duration: 800}); //, ease:jsAnimEase.bounceSmooth//if we want to bounce
       anim.add({property: Prop.opacity, from: .01, to: 2,  duration: 4000});
	  /* anim.add({property: Prop.backgroundColor, from: (00,00,00), to: new Col(36,36,36),  
       duration:2000});*/
	   
	}
	
/*	function init2(){
	  content2 = document.getElementById("subNav");  
	   content2.style.position = "relative";  
	   var anim2 = manager.createAnimObject("subNav"); 
	   
	     
     
   anim2.add({property: Prop.left, to: 500, duration: 500}); 

	}*/
	
	/*function init3(){
		

	   
	   var content3 = document.getElementById("content")
       var children = content3.getElementsByTagName("div");
	   
	   
	 
	 anim3.add({property: Prop.left, to: 500, duration: 500}); 
	}*/
	/*  function init2(){ 
	   
	   var test = document.getElementById("test");
	   test.setOpacity(0);
	   anim.add({property: Prop.opacity, to: 1, duration: 2000});	
	   
	   
	}*/
			
  /*function init3(){*/
	  
	  /*subNav = ul.getElementsByTagName("li");*/
	  /*subNav = document.getElementByID("content").getelementByClass("fltLft");

	  
	 
	  manager.registerPosition("fltLft");
	   subNav.setPosition(0,0);
	   subNav.style.position = "relative";  
	   var anim3 = manager.createAnimObject("fltLft");  
	   
	   anim.add({property: Prop.left, to: 500, duration: 2000});*/
	   
	  
	   /*function init(){
	   
	   var bg = {type: 'backgroundy', to: 0, step: -1, delay: 20};
	   var content = document.getElementById('content');
	   var contentAppear = {type: 'opacity', from:0, to:100, step: 1, delay:50}
	   
 
	   $fx(content[0]).fxAdd(bg).fxRun(null, -1);
	   $fx('#content').fxAdd(contentAppear).fxRun();
	   
	   }
	   */
		

   

   
