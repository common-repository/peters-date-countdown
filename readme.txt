=== Plugin Name ===
Contributors: pkthree
Donate link: http://www.theblog.ca
Tags: countdown, events, dates, date, event
Requires at least: 2.3
Tested up to: 2.6
Stable tag: trunk

Display a countdown of important dates. A real-time version is also available.

== Description ==

Display a countdown of important dates. A real-time JavaScript version is also available. The plugin can be used as widget if needed. See the plugin page at http://www.theblog.ca/date-countdown for full information.


== Installation ==

Unzip all files to a "peters-date-countdown" subdirectory in your WordPress plugin directory. Activate it in the Plugins menu of your admin section. There are a few settings at the top of the plugin file to tweak several features (for example, you can enable the JavaScript real-time countdown feature and customize the plugin for different languages), so you should edit that as well.

If you are upgrading, make sure that you do NOT overwrite datecountdowndates.php! Also, make sure that the files are placed in the folder "wp-content/plugins/peters-date-countdown"

Then, paste this code wherever you wish to display the countdowns:

`<?php
countdown_callit();
?>`

If you want to call a specific countdown, enter the number of the countdown item that you want to display in parentheses, such as this:

`<?php
countdown_callit(3);
?>`

Alternatively, you can manage it like a normal widget in WordPress.

== Frequently Asked Questions ==

Please visit the plugin page at http://www.theblog.ca/date-countdown with any questions.
