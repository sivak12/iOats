// JavaScript Document

window.onload = init;
var h,m;

function activate(x)
{
	//document.x.submit1.disabled = 'false';
	var btn = document.getElementById("submit1");
	btn.disabled = false;
	
}

function start_timer(time_limit)
{
	h = Math.floor(time_limit / 60);
	m = time_limit % 60;
	upd_timer();
	//document.getElementById("hr_txt").innerHTML = h;
	//document.getElementById("min_txt").innerHTML = m;
}

function upd_timer()
{
	document.getElementById("hr_txt").innerHTML = h;
	document.getElementById("min_txt").innerHTML = m;
	if(m == 0)
	{
		if(h==0)
		{
			
			alert ("Your Time is Over. Click OK to view score ");
			document.Question.submit();
		}
		h--;
		m=59;
	}
	else
		m--;
		
	
	setTimeout("upd_timer()",60000);
}
