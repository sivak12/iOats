// JavaScript Document
//window.onload = init_page;
//alert("jaaaaaaaaaaaaaaaaaava");
function createRequest() 
{
	
	try 
	{
	var request = new XMLHttpRequest();
	} 
	catch (tryMS) 
	{
		try 
		{
		request = new ActiveXObject("Msxml2.XMLHTTP");
		} 
		catch (otherMS) 
		{
			try 
			{
				request = new ActiveXObject("Microsoft.XMLHTTP");
			} 
			catch (failed) 
			{
				request = null;
			}
		}
	}
	return request;
}




function load_lst(p)
{
	//alert("ind"+p.value);
	if(p.value=="select")
		return;
	
	var req_ldlst = createRequest();
	alert ("in");
	if(req_ldlst == null)
	{
		alert("No Ajax Support");
	
	}
	
	var url = "admin_ldlst.php";
	var str="?lst="+p.id+"&val="+p.value;
	/*switch(ind)
	{
		case 1:
				str = "?ind="+1;	
				break;
		
		case 2:
				str = "?ind="+2;
				break;
	}*/

	url = url+str;
	alert("url:"+url);
	req_ldlst.open("GET",url,false);
	req_ldlst.send(null);
	
	
	var result = req_ldlst.responseText;
	alert(result);
	var obj_name;
	switch(p.id)
	{
		case "lst_prog":
						obj_name = "lst_batch";
						break;
		case "lst_batch":
						obj_name = "lst_sect";
						break;
	}
	
	var obj = document.getElementById(obj_name);
	obj.innerHTML = result;
	
	
	
	
}