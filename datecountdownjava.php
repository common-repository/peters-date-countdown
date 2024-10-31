// taken from http://scripts.franciscocharrua.com/countdown-clock.php
// modified specifically for Peter's Date Countdown: http://www.theblog.ca/?p=41
function countdown_clock(year, month, day, hour, minute, i, timediff, javaend, textend, textevent, text_day, text_days, text_hour, text_minute, text_second, text_before, text_until, text_since)
         {
         html_code = '<span id="pdc_item' + i + '"></span>';
         
         document.write(html_code);
         
         countdown(year, month, day, hour, minute, i, timediff, javaend, textend, textevent, text_day, text_days, text_hour, text_minute, text_second, text_before, text_until, text_since);              
         }
         
function countdown(year, month, day, hour, minute, i, timediff, javaend, textend, textevent, text_day, text_days, text_hour, text_minute, text_second, text_before, text_until, text_since)
         {
         until_text = text_until;
         eventtext = textevent;
         Today = new Date();
<?php
$pdc_gmt = date('O') / 100;
print "\tpdc_servergmt = $pdc_gmt\n";
?>
         pdc_gmt = pdc_servergmt + Today.getTimezoneOffset()/60;
         Todays_Hour = Today.getHours() + pdc_gmt + timediff;                  
         
         //Convert both today's date and the target date into milliseconds.                           
         Todays_Date = (new Date(Today.getFullYear(), Today.getMonth(), Today.getDate(), 
                                 Todays_Hour, Today.getMinutes(), Today.getSeconds())).getTime();                                 
         Target_Date = (new Date(year, month, day, hour, minute, 00)).getTime();    
                  
         // Find their difference, and convert that into seconds.                  
         Time_Left = Math.round((Target_Date - Todays_Date) / 1000);
         Unmod_Time = Time_Left;
		if(Time_Left > 0) {
                    days = Math.floor(Time_Left / (60 * 60 * 24));
                    Time_Left %= (60 * 60 * 24);
                    hours = Math.floor(Time_Left / (60 * 60));
                    Time_Left %= (60 * 60);
                    minutes = Math.floor(Time_Left / 60);
                    Time_Left %= 60;
                    seconds = Time_Left;
		}
             else if(Time_Left < 0) {

			// Continue counting in negative numbers
			if (javaend == 2 ) {
                    days = Math.ceil(Time_Left / (60 * 60 * 24));
                    Time_Left %= (60 * 60 * 24);
                    hours = Math.ceil(Time_Left / (60 * 60));
                    Time_Left %= (60 * 60);
                    minutes = Math.ceil(Time_Left / 60);
                    Time_Left %= 60;
                    seconds = Time_Left;
			}

			// Continue counting in positive numbers and time since
			else if (javaend == 3 ) {
                    days = Math.abs(Math.ceil(Time_Left / (60 * 60 * 24)));
                    Time_Left %= (60 * 60 * 24);
                    hours = Math.abs(Math.ceil(Time_Left / (60 * 60)));
                    Time_Left %= (60 * 60);
                    minutes = Math.abs(Math.ceil(Time_Left / 60));
                    Time_Left %= 60;
                    seconds = Math.abs(Time_Left);
                    until_text = text_since;
                    eventtext = textend;
			}

			// Simply stop at zero
			else {
                    days = 0;
                    hours = 0;
                    minutes = 0;
                    seconds = 0;
			}

		  }
         
                    sleeps = text_days;
                    // show day or days
                    if(Math.abs(days) == 1) sleeps = text_day;

			  pdc_div = document.getElementById('pdc_item' + i);
                    if (javaend == 0 && Unmod_Time < 0) {
			  pdc_div.innerHTML = textend;
			  }
			  else {

                    pdc_div.innerHTML = text_before + '<strong>' + days + '</strong> ' + sleeps + ' ';
                    pdc_div.innerHTML += hours + text_hour + ' ';
                    pdc_div.innerHTML += minutes + text_minute + ' ';
                    pdc_div.innerHTML += seconds + text_second + ' ';
                    pdc_div.innerHTML += until_text + eventtext;
			  }
               
         // Recursive call, keeps the clock ticking
         textend = textend.replace(/\'/g,'\\\'');
         textevent = textevent.replace(/\'/g,'\\\'');

         setTimeout('countdown(' + year + ',' + month + ',' + day + ',' + hour + ',' + minute + ',' + i + "," + timediff + ',' + javaend + ',\'' + textend + '\',\'' + textevent + '\',\'' + text_day + '\',\'' + text_days + '\',\'' + text_hour + '\',\'' + text_minute + '\',\'' + text_second + '\',\'' + text_before + '\',\'' + text_until + '\',\'' + text_since + '\');', 1000);
         }