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







function exp_excel()
{
	alert("in");
	var obj = document.getElementById("tb_report");
	//var obj2 = document.getElementsByTagName("table");
	//var str = obj.innerHTML; 
	//alert(str);
	var req_report = createRequest();
	if(req_report == null)
	{
		alert("No Ajax Support");
	
	//}
	alert(obj.innerHTML);
	/*var new_tb = document.createElement("textarea");
	 new_tb.setAttribute("name","excel_tb");
         new_tb.setAttribute("cols","10");
              new_tb.setAttribute("rows","2");
                new_tb.setAttribute("wrap","PHYSICAL");
new_tb.value = obj.innerHTML;
	
	
	obj.appendChild(new_tb); */
	//new_tb.name = "excel_tb";
	
	
	//document.form1.submit();
	
	var url = "exp_excel.php";
	req_report.open("POST",url,false);
	
	//req_report.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	
	req_report.setRequestHeader("Content-type: application/vnd.ms-excel");
   
    req_report.setRequestHeader("Content-Disposition: attachment; filename=$file");
   
	req_report.send(str);
		
	var result = req_report.responseText;
}