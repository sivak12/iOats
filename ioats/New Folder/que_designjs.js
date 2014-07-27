// JavaScript Document

window.onload = initPage;
alert ("in");
function ch_ansopt(t)
{
	var obj;
	switch(t.value)
	{
		case "single":
						obj = document.getElementById("ans_opt");
						obj.type = "radio";
						obj.name = "ans_opt";
						break;				
		
		case "multiple":
						obj = document.getElementById("ans_opt");
						obj.type = "checkbox";
						obj.name = "ans_opt[]";
						break;	
			
	
	}


}


function initPage()
{

	var txtName,capName,btnNextName,btnCompName,btnOptName;
	var i,ctrl;
	for(i=1;i<=10;i++)
	{
		txtName = "txtOpt"+i;
		chkName = "chkOpt"+i;
		capName = "cap_"+txtName;
		
		btnNextName = "btnNext_"+txtName;
		btnCompName = "btnComp_"+txtName;
		
		document.getElementById(txtName).style.visibility = "hidden";
		document.getElementById(chkName).style.visibility = "hidden";
		document.getElementById(capName).style.visibility = "hidden";
		document.getElementById(btnNextName).style.visibility = "hidden";
		document.getElementById(btnCompName).style.visibility = "hidden";
	
	
	
	}

	document.getElementById("cap_txtOpt1").style.visibility = "visible";
	document.getElementById("txtOpt1").style.visibility = "visible";
	document.getElementById("chkOpt1").style.visibility = "visible";
	//document.getElementById("txtOpt1").disabled = false;
	
	/*document.getElementById("cap_txtOpt2").style.visibility = "visible";
	document.getElementById("txtOpt2").style.visibility = "visible";
	
	
	document.getElementById("btnNext_txtOpt2").style.visibility = "visible";
	document.getElementById("btnComp_txtOpt2").style.visibility = "visible";*/
	
	
	document.getElementById("btnNext_txtOpt2").disabled = true;
	document.getElementById("btnComp_txtOpt2").disabled = true;



}

function txtQn_change(t)
{
var flag,i,mode;
var txtName,capName,btnNextName,btnCompName,chkName;

if(t.value == "")
{
	
	document.getElementById("txtOpt1").disabled = true;
	document.getElementById("cap_txtOpt1").disabled = true;
	document.getElementById("chkOpt1").disabled = true;
	mode = "hidden";
	flag = true;
}
else
{

	document.getElementById("txtOpt1").disabled = false;
	document.getElementById("cap_txtOpt1").disabled = false;
	document.getElementById("chkOpt1").disabled = false;
	mode = "visible";
	flag = false;
}		
		
	
	
	
	
		for(i=1;i<=10;i++)
		{
			txtName = "txtOpt"+i;
			chkName = "chkOpt"+i;
			capName = "cap_"+txtName;
			btnNextName = "btnNext_"+txtName;
			btnCompName = "btnComp_"+txtName;
				
			
			if(document.getElementById(txtName).style.visibility == "visible")
			{
				document.getElementById(txtName).disabled = flag;
				document.getElementById(capName).disabled = flag;
				document.getElementById(chkName).disabled = flag;
			}
			
			
			if(document.getElementById(btnNextName).style.visibility == "visible")
			{
				document.getElementById(btnNextName).disabled = flag;
				document.getElementById(btnCompName).disabled = flag;
			}
			
			
			
			
		}

		
		
		
		

}

function txtOpt_change(t)
{
	
	
	
	var txtName,capName,btnNextName,btnCompName,index,nindex;
	var c_mode="hidden";
	var n_mode="visible";
	var str = t.title;
	var index = parseInt(str,10);
	
	/*if(t.value == "")
	{
		c_mode = "visible";
		n_mode = "hidden"
	}*/
	
	nindex = index+1;
	
	// formatting next opt controls
	txtName = "txtOpt"+nindex;
	chkName = "chkOpt"+nindex;
	capName = "cap_"+txtName;
	btnNextName = "btnNext_"+txtName;
	btnCompName = "btnComp_"+txtName;
	
	
	if(document.getElementById(txtName).style.visibility == "hidden" || document.getElementById(txtName).disabled==true)
	
	{
		document.getElementById(txtName).style.visibility = n_mode;
		document.getElementById(txtName).disabled = false;
		
		document.getElementById(capName).style.visibility = n_mode;
		document.getElementById(btnNextName).style.visibility = n_mode;
		
		document.getElementById(chkName).style.visibility = n_mode;
		
		document.getElementById(btnCompName).style.visibility = n_mode;
			
		
		//formatting present controls
		txtName = "txtOpt"+index;
		capName = "cap_"+txtName;
		btnNextName = "btnNext_"+txtName;
		btnCompName = "btnComp_"+txtName;
	
		document.getElementById(btnNextName).style.visibility = c_mode;
		document.getElementById(btnNextName).disabled = true;
		document.getElementById(btnCompName).style.visibility = c_mode;
		document.getElementById(btnCompName).disabled = true;
	}
	

	
}	

function val_qdet(ind)
{
	
	//alert(document.getElementById('txtQuestion').value);
	var txtName,count=0,i;
	if (document.getElementById("txtQuestion").value == "")
	{
		alert("Please enter question.");
		return;
	}
	
	for(i=1;i<=10;i++)
	{
		txtName = "txtOpt"+i;
		if( document.getElementById(txtName).value == "")
		{
			count++;
		}
		
	}
	if(count <2)
	{
		alert("Please enter atleast 2 options.");	
		return;
	}
	var j = parseInt(ind,10);
	if(ind ==1)
	document.form1.action="que_design_upd.php?ind=1";
	else
	document.form1.action="que_design_upd.php?ind=2";
	
}