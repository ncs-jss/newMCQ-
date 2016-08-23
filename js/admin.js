
var xmlhttp;
function request(id)
{
  var val,des_id;
  if(id=="posmarks")
  {
    val = document.getElementById(id).value;
    des_id = "pos_value";
  }
  if(id=="negmarks")
  {
    val = document.getElementById(id).value;
    des_id = "neg_value";
  }
  if(id=="timer")
  {
    val = document.getElementById(id).value;
    des_id = "time";
  }
  if(id=="no_of_ques")
  {
    val = document.getElementById(id).value;
    des_id = "ques_count";
  }
  if(id=="myonoffswitch")
  {
    if(document.getElementById(id).checked)
      val=2;
    else
      val=1;
    des_id = 'neg_pos_status';
  }
  if(id=="delques")
  {
    if(confirm("Are u shure to delete all questions"))
    {
      des_id="del_quesmsg";
      val="questions";     
    }
    else
      return;
  }  
  if(val<0)
  {
    alert("Negative values not allowed");
    document.getElementById(id).value='';
    return;
  }
	if (window.XMLHttpRequest)
  {
  	xmlhttp=new XMLHttpRequest();
  }
	else
  {	
  	xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  if(val=='')
  {
    alert("Enter a numeric value");
    return;
  }  
  else
  xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
      document.getElementById(des_id).innerHTML=xmlhttp.responseText;
      document.getElementById(id).value='';
    }
  }  
  xmlhttp.open('POST','components/process.php',true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("id="+id+'&val='+val);
}
