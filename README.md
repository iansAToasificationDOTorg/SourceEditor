# Source Editor
<pre>

Source code editor for Apple devices.

Written for hosting on
HTTPS server. eg. raspberry pi.

Install in any subdirectory under /var/www/html
eg.
/var/www/html/e/
Browse 
https://rPi.ip/e/editor.php


Create or Edit file types;
php, html, css, svg and javascript.

Create files; 
via comment on line 2 of source text.
eg. 
/* filePathName: nam_htm/nam.htm */
This will save the source text to
/var/www/html/e/nam_htm/nam.htm


To copy a file, just change its
Path or Name in the line 2 comment.
eg.
/* filePathName: nam_htm/n2.htm */


Full filePathName and individual files can be Deleted vía the Editor

A backup is copied to
./nam_htm/BAK folder
each time a file is saved.
To restore from a backup, simply
rename the backup to the original
path/name via terminal or ssh.
</pre>

