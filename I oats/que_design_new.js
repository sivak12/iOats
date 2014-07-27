// JavaScript Document
// JavaScript Document



window.onload = initPage;

function initPage()
{
	//document.getElementById("lst_fac1").style.visibility = "hidden";
	//document.getElementById("lst_spec1").style.visibility = "hidden";
	//document.getElementById("btnAdd").style.visibility = "hidden";

	document.getElementById("tb_opt").style.visibility = "hidden";



}

function show_tb()
{

document.getElementById("tb_opt").style.visibility = "visible";
}

function ch_ansopt(p)
{

	var i;
	
	var opt_lst = new Array();
	opt_lst = document.getElementsByTagName("input");
	var opt_itm;
	//alert (opt_lst.length);
	for(i=0;i<opt_lst.length;i++)
	{
		//alert(opt_lst[i].name);
	
		if(opt_lst[i].name == "ans_opt" ||opt_lst[i].name == "ans_opt[]"  )
		{
			//alert("in rad or chk");
			switch(p.value)
			{
				case "single":
							//alert ("yup radio");
							opt_lst[i].type = "radio";		
							opt_lst[i].name = "ans_opt";
							break;
				case "multiple":
							//alert ("yup chkbox");
							opt_lst[i].type = "checkbox";		
							opt_lst[i].name = "ans_opt[]";
							break;
			
			}
		}

	}

}



function load_speclst(p)
{
	var req_ldlst = createRequest();
	//alert ("in specialise");
	if(req_ldlst == null)
	{
		alert("No Ajax Support");
	
	}
	
	
	
	//document.getElementById("lst_fac1").style.visibility = "visible";
	//document.getElementById("lst_spec1").style.visibility = "visible";
	
	document.getElementById("tb_fac").style.visibility = "visible";
	
	
	
	var url = "admin_ldlst.php";
	var obj = document.getElementById("lst_batch");
	var value = obj.value;
	
	var str="?lst="+p.id+"&val="+value;
	
	url = url+str;
	//alert (url);
	req_ldlst.open("GET",url,false);
	req_ldlst.send(null);
	
	var result = req_ldlst.responseText;
	
	//document.getElementById("lst_fac1").style.visibility = "visible";
	//ocument.getElementById("lst_spec1[]").style.visibility = "visible";
	var obj = document.getElementById("lst_spec1");
	obj.innerHTML = result;
	

}





function addRow(t)
{
	
	//alert ("in");
	//var ch ="a";
	//alert('a'.keyCode);
	document.getElementById(t.id).style.visibility = "hidden";
	//t.syle.visibility = "hidden";
	var tb = document.getElementById("tb_opt");

	var lst_row = document.getElementById("rlast");
	var str = lst_row.title;

	var r_ind = parseInt(str,10);
	
	//var old_btn = "btnAdd"+r_ind;
	//var old_btn = document.getElementById("old_btn");
	//old_btn.style.visibility = "hidden";
	
	r_ind++;
	ind_n = r_ind;
	
	var asc_ans = 97 + ind_n -1;
	var str_ans = String.fromCharCode(asc_ans);
	//alert ("new ans:"+str_ans);
	
	var new_row = document.createElement("tr");
	tb.appendChild(new_row);
	new_row.innerHTML = lst_row.innerHTML;
	r_ind += '';
	new_row.title = r_ind;
	var new_opt_id = "txtOpt"+r_ind;
	var new_btn_id = "btnAdd"+r_ind;
	//var new_batch_id = "lst_batch"+r_ind;
	//var new_sect_id = "lst_sect"+r_ind;
	
	
	var new_txt = new_row.getElementsByTagName("textarea");
	var new_btn = new_row.getElementsByTagName("input");
	var new_cap =  new_row.getElementsByTagName("th");
	//var old_btn = lst_row.getElementsByTag("input");
	//old_btn[0].style.visibility = "hidden";
	
	
	// changing option caption innerhtml
	new_cap[0].innerHTML = str_ans+".";
	
	// changing txtarea id &name
	new_txt[0].id = new_opt_id;
	new_txt[0].name = new_opt_id;
		
	// change chk & rad btn value
	new_btn[0].value = str_ans; 
		
	// change button id & name
	new_btn[1].id = new_btn_id; 
	new_btn[1].name = new_btn_id;
	document.getElementById(new_btn_id).style.visibility = "visible";
	
	
	
	lst_row.id = "";
	new_row.id = "rlast";
	
	
	
	
}



/*function val_qdet(t)
{
	
	//alert(document.getElementById('txtQuestion').value);

	alert ("in ind :"+ind);
	ind += "";
	var txtName,count=0,i;
	if (document.getElementById("txtQuestion").value == "")
	{
		alert("Please enter question.");
		return;
	}
	
	for(i=1;i<=10;i++)
	{
		txtName = "txtOpt"+i;
		if( document.getElementById(txtName).value != "")
		{
			count++;
		}
		
	}
	if(count <2)
	{
		alert("Please enter atleast 2 options.");	
		return;
	}
	
	//var ind = parseInt(ind,10);
	//alert ("ind:"+ind);
	
	
	//var j = parseInt(ind,10);
	if(ind =="1")
	{
		alert ("1");
	}
	else
	{
		alert("2");
	}
		
	/*document.form1.action="que_design_upd.php?ind=1";
	else
	document.form1.action="que_design_upd.php?ind=2";*/
	
	
	
	
	
	/*switch(t.id)
	{
		
	case "add":
		alert ("add");
		document.form1.action="que_design_upd.php?ind=1";
		break;
	
	case "complete":
		alert ("complete");
		document.form1.action="que_design_upd.php?ind=2";
		break;
	}*
}*/

function val_det(t)
{
	switch(t.id)
	{
		case "add":
			//alert("add");
			document.form1.action="que_design_upd.php?ind=1";
			break;
		
		case "complete":
			//alert("complete");
			document.form1.action="que_design_upd.php?ind=2";
			break;
	}
	document.form1.submit();
}










