# Source Editor
Source code editor for Apple devices.

Written for hosting on<br>
HTTPS server. eg. raspberry pi.

Install in any subdirectory under
/var/www/html<br>
eg.<br>
/var/www/html/e/<br>
Browse <br>
https://rPi.ip/e/editor.php<br><br>

Create or Edit file types;<br>
php, html, css, svg and javascript.<br>

Create files; <br>
via comment on line 2 of source text.<br>
eg. <br>
/* filePathName: nam_htm/nam.htm */<br>
This will save the source text to<br>
/var/www/html/e/nam_htm/nam.htm<br><br>

To copy a file, just change its<br>
Path or Name in the line 2 comment.<br>
eg.<br>
/* filePathName: nam_htm/n2.htm */<br><br>

Full filePathName and individual files can be Deleted vía the Editor


A backup is copied to
./nam_htm/BAK folder<br>
each time a file is saved.<br>
To restore from a backup, simply<br>
rename the backup to the original<br>
path/name via terminal or ssh.<br><br>

