/* 
	Tito Jackson: Global JS
	Author: Transmyt Marketing
	Last Updated: 06/22/09
	
							   */
/* External Links */

<!--
function externalLinks() {
 if (!document.getElementsByTagName) return;
 var anchors = document.getElementsByTagName("a");
 for (var i=0; i<anchors.length; i++) {
   var anchor = anchors[i];
   if (anchor.getAttribute("href") &&
       anchor.getAttribute("rel") == "external")
     anchor.target = "_blank";
 }
}
window.onload = externalLinks;
//-->

<!--

function ValidateSidebarForm()
	{
	    var name = document.SidebarForm.name;
	    var email = document.SidebarForm.email;
		var comments = document.SidebarForm.comments;
	
		if (name.value == "")
		{
			window.alert("Please enter your name.");
			name.focus();
			return false;
		}
		
		if (email.value == "")
		{
			window.alert("Please enter a valid e-mail address.");
			email.focus();	
			return false;
		}
		if (email.value.indexOf("@", 0) < 0)
		{
			window.alert("Please enter a valid e-mail address.");
			email.focus();
			return false;
		}
		if (email.value.indexOf(".", 0) < 0)
		{
			window.alert("Please enter a valid e-mail address.");
			email.focus();	
			return false;
		}
		if (comments.value == "")
		{
			window.alert("Please enter your comments or suggestions.");
			comments.focus();
			return false;
		}
		
		return true;
		}

//-->

<!--

function ValidateInvolveForm()
	{
	    var name = document.InvolveForm.fullname;
	    var email = document.InvolveForm.emailaddress;
	
	    if (name.value == "")
	    {
	        window.alert("Please enter your name.");
	        name.focus();
	        return false;
	    }
	    
	    if (email.value == "")
	    {
		  window.alert("Please enter a valid e-mail address.");
  	      email.focus();	
  	      return false;
  		  }
  		  if (email.value.indexOf("@", 0) < 0)
		  	  {
	  	      window.alert("Please enter a valid e-mail address.");
	  	      email.focus();
	  	      return false;
	  	  }
	  	  if (email.value.indexOf(".", 0) < 0)
	  	  {
				window.alert("Please enter a valid e-mail address.");
		        email.focus();	
		        return false;
		  }
	
	    	return true;
		 }

//-->