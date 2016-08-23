window.onload=startTimer;
var mins;
var secs;
var updateTimer;
var i=1;

function startTimer()
{
       if(readCookie("minutes")==null&&readCookie("seconds")==null)
      { 
            mins = readCookie("timer");
            secs=0;
      }
      else
      {
            mins=readCookie("minutes");
            secs=readCookie("seconds");
      }

       update();
    updateTimer = setInterval('update()', 1000);
}

function update()
{
       var timeField = document.getElementById('time');
       if(mins<=1)
       {
            if(i%2==0)
                  document.getElementById('time').style.background="#c0392b";
            else
                  document.getElementById('time').style.background="black";
            i++    
       }
       if(secs == 0)
       {
             if(mins == 0) 
             {
                  clearInterval(updateTimer);
                  alert('Time\'s up..... ');
                  self.location="timeup.php";
                  return;
            }
            else
            {
            	mins--;
            	secs = 59;
            }
       } 
       else 
       {
            secs--;
       }
       if(secs<10)
       {
            timeField.innerHTML = '<p>Time</p><p>' + mins + ':0' + secs + '</p>' ;
       } 
       else 
       {
            timeField.innerHTML = '<p>Time</p><p>' + mins + ':' + secs + '</p>';
       }   
       createCookie("minutes",mins,1);
       createCookie("seconds",secs,1);
}

function createCookie(name,value,days) 
{
      if (days) 
      {
            var date = new Date();
            date.setTime(date.getTime()+(days*24*60*60*1000));
            var expires = "; expires="+date.toGMTString();
      }
      else 
            var expires = "";
      document.cookie = name+"="+value+expires+"; path=/";
}

function readCookie(name) 
{
      var nameEQ = name + "=";
      var ca = document.cookie.split(';');
      for(var i=0;i < ca.length;i++) 
      {
            var c = ca[i];
            while (c.charAt(0)==' ') c = c.substring(1,c.length);
            if (c.indexOf(nameEQ) == 0) 
                   return c.substring(nameEQ.length,c.length);
      }
      return null;
}

function eraseCookie(name) 
{
     createCookie(name,"",-1);
}

function DeleteAllCookies()
{
      eraseCookie("minutes");
      eraseCookie("seconds");
}

function del_cookie(name)
{
    document.cookie = name + '=; expires=Thu, 01 Jan 1970 00:00:01 GMT;';
}