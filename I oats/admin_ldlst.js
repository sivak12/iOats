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
	var lst_id,lst_val,t1,obj_name;
	
	
	if(p.value=="select")
		return;
	
	lst_id = p.id;
	lst_val = p.value;
	
	var req_ldlst = createRequest();
	//alert ("in");
	if(req_ldlst == null)
	{
		alert("No Ajax Support");
	
	}
	
	var url = "admin_ldlst.php";
	
	var cat = "";
	
	var rlast = document.getElementById("rlast")
	if(rlast != null )
	{
		cat = "&cat=1";
		t1 = p.id;
		if( (t1.search(/lst_prog/i)) != -1)
		{
			lst_id = "lst_prog";
			obj_name = "lst_batch"+ rlast.title;
		}
		else if( (t1.search(/lst_batch/i)) != -1)
		{
			lst_id = "lst_batch";
			obj_name = "lst_sect"+ rlast.title;
			
		}
	}
	
	
	if(cat == "")
	{
		switch(lst_id)
		{
			case "lst_prog":
							obj_name = "lst_batch";
							break;
			case "lst_batch":
							obj_name = "lst_sect";
							break;
		}
	
	}
	
	
	
	
	
	var str="?lst="+lst_id+"&val="+lst_val;
	str = str+cat;
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
	//alert("url:"+url);
	req_ldlst.open("GET",url,false);
	req_ldlst.send(null);
	
	
	var result = req_ldlst.responseText;
	//alert(result);
	
	
	var obj = document.getElementById(obj_name);
	obj.innerHTML = result;
	
	
	
	
}