// JavaScript Document



window.onload = initPage;

function initPage()
{
	//document.getElementById("lst_fac1").style.visibility = "hidden";
	//document.getElementById("lst_spec1").style.visibility = "hidden";
	//document.getElementById("btnAdd").style.visibility = "hidden";

	document.getElementById("tb_allot").style.visibility = "hidden";
}

function show_tb()
{

document.getElementById("tb_allot").style.visibility = "visible";
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
	
	
	
	var tb = document.getElementById("tb_allot");

	var lst_row = document.getElementById("rlast");
	var str = lst_row.title;

	var r_ind = parseInt(str,10);
	r_ind++;
	
		
	var new_row = document.createElement("tr");
	tb.appendChild(new_row);
	new_row.innerHTML = lst_row.innerHTML;
	r_ind += '';
	new_row.title = r_ind;
	var new_prog_id = "lst_prog"+r_ind;
	var new_batch_id = "lst_batch"+r_ind;
	var new_sect_id = "lst_sect"+r_ind;
	
	
	var new_lst = new_row.getElementsByTagName("select");
	var old_btn = lst_row.getElementsByTagName("input");
	//var old_btn = lst_row.getElementsByTag("input");
	//old_btn[0].style.visibility = "hidden";
	
	old_btn[0].style.visibility = "hidden";
	
	
	new_lst[0].id = new_prog_id;
	new_lst[1].id = new_batch_id;
	new_lst[2].id = new_sect_id;
	
	
	new_lst[0].name = new_prog_id;
	new_lst[1].name = new_batch_id;
	new_lst[2].name = new_sect_id+"[]";
	
	
	new_lst[1].innerHTML = "";
	new_lst[2].innerHTML = "";
	
	
	
	
	lst_row.id = "";
	new_row.id = "rlast";
	
	
	
}










