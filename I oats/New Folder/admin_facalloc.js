// JavaScript Document



window.onload = initPage;

function initPage()
{
	//document.getElementById("lst_fac1").style.visibility = "hidden";
	//document.getElementById("lst_spec1").style.visibility = "hidden";
	//document.getElementById("btnAdd").style.visibility = "hidden";

	document.getElementById("tb_fac").style.visibility = "hidden";
}








function load_speclst(p)
{
	var req_ldlst = createRequest();
	alert ("in specialise");
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
	alert (url);
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
	
	alert ("clicked");
//this.disabled = "true";
	var tb = document.getElementById("tb_fac");
	alert (tb);
	var lst_row = document.getElementById("rlast");
	var str = lst_row.title;
	alert ("str:"+str);
	var r_ind = parseInt(str,10);
	r_ind++;
	
	//hide button
	//var btn = lst_row.getElementById("btnAdd");
	//btn.style.visibility = "hidden";
	
	
	//var r_ind = lst_row.value;
	//alert (r_ind);
	/*
	
	var qn_
	
	r_ind++;
	var qn_lst = document.createElement("select");
	var qn_lst_name = "qn"+r_ind;
	qn_lst.name = qn_lst_name;
	qn_lst.id = qn_lst_name;*/
	
	var new_row = document.createElement("tr");
	tb.appendChild(new_row);
	new_row.innerHTML = lst_row.innerHTML;
	r_ind += '';
	new_row.title = r_ind;
	var new_fac_id = "lst_fac"+r_ind;
	var new_spec_id = "lst_spec"+r_ind;
	
	var new_lst = new_row.getElementsByTagName("select");
	//alert("length:"+new_lst.length);
	
	new_lst[0].id = new_fac_id;
	new_lst[1].id = new_spec_id;
	new_lst[0].name = new_fac_id;
	new_lst[1].name = new_spec_id+"[]";
	
	//new_lst[1].innerHTML ="";
	//alert(new_lst[0].id +"  "+new_lst[1].id);
	
	//var btn = new_row.getElementsByTagName("input");
	//btn.id ="btnAddQuery";
	//var ss = document.getElementById(new_qn_id);
	//alert ("new is:"+ss.id+" title:"+ss.title);	
	//alert("added");
	
	lst_row.id = "";
	new_row.id = "rlast";
	
	
}






