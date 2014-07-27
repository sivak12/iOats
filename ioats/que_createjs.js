// JavaScript Document

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


function en_submit()
{
	
	var btn = document.getElementById("btnSubmit");
	var txt = document.getElementById("txtName"); 
	/*if(txt.value == "")
		btn.disabled = true;
 	else
		btn.disabled = false;	*/

}


function ld_lst(lst)
{
	
	
	
	if(lst.value=="select")
		return;
	
	
	
	var url = "que_create_ldlst.php";
	var str="?lst="+lst.id+"&val="+lst.value;
	
	url = url+str;
	
	
	var req_ldlst = createRequest();
	
	req_ldlst.open("GET",url,false);
	req_ldlst.send(null);
	var result = req_ldlst.responseText;
	
	
	switch(lst.id)
	{
		case "lst_prog":
						obj_name = "lst_batch";
						break;
		case "lst_batch":
						obj_name = "chk_fld";
						break;
	}
	/*switch(lst.id)
	{
		case "lst_prog" :
		
		
		case "lst_batch":
		
	}*/

	var obj = document.getElementById(obj_name);
	obj.innerHTML = result;

}