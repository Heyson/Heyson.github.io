function submitform()  {
	var sErrStr, sFieldName;
	sErrStr = "";
	sFieldName = "";
	var email = trim(document.frm.email.value);
	if (email == "")  {
		sErrStr += "Please Enter Email\n";
		if (sFieldName == "")
			sFieldName = "email";
	}
	else if (!emailCheck(document.frm.email.value))  { 
		sErrStr += "Enter Valid E-mail Address\n"
		if (sFieldName == "")
			sFieldName = "email"
	}
	if (sErrStr != "")
	{
		alert("Following are the required fields:- \n"+sErrStr);
		for (i=0;i<document.frm.elements.length;i++)
		{
			if (document.frm.elements[i].name == sFieldName)
			document.frm.elements[i].focus();
		}
		return false;
	}
	return true;
}

function openSendWindow (num1, num2, num3, carrier)
{
	if(document.frm.formID)
	formID=document.frm.formID.value;
	if(document.frm.cellPhoneNumber1 && document.frm.cellPhoneNumber2 && document.frm.cellPhoneNumber3)
	{
		if(!phoneValidation(document.frm.cellPhoneNumber1,document.frm.cellPhoneNumber2,document.frm.cellPhoneNumber3,'Cell Phone Number'))
		return false;
		if(document.frm.CellPhoneCarrier)
		{
			var cellCarrier=document.frm.CellPhoneCarrier.options[document.frm.CellPhoneCarrier.selectedIndex].value
			if (cellCarrier != "")
			{
				var url = "http://app.mobilestorm.com/stun/manageforms/sendTestSMSMessage.php?phone="+num1+""+num2+""+num3+"&carrier="+cellCarrier+"&formID="+formID;
				var url1 = "http://app.mobilestorm.com/stun/manageforms/sendTestSMSMessage1.php?phone="+num1+""+num2+""+num3+"&carrier="+cellCarrier+"&formID="+formID;
				//document.frames["I1"].location.replace(url);
				document.getElementById("myDiv").innerHTML="<img width=1 height=1 border=0 src='"+url+"'>";
				MM_openBrWindow(url1,"sendWin","scrollbars=no,resize=no,width=400,height=200");
			}
			else        {
				alert("Please select carrier for Cell Phone.");
				//return false;
			}
		}
	}
}

function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}