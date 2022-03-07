# Source Editor
<pre>

Source code editor 
for Apple devices.

This lets you edit websites
without need for ftp or ssh
because it is all done via php

Written for hosting on
HTTPS server.
 eg. Raspberry Pi 
  Apache Server etc.

Will work without https but
JavaScript written for security 
sensitive features on 
iOS and iPadOS, 
must be hosted on https
Self signed certificate works OK.

Install in any subdirectory 
under /var/www/html
eg.
/var/www/html/e/

chown dir e/ and all subdirectories
to chown -R www-data:www-data e/
Or appropriate owner group/name

chmod such that php can create 
files and folders.

Quick ugly insecure eg.
chown 777 e/ for initial folders
chown 666 for files

Browse
https://rPi.ip/e/edit_php/edit.php
Add to Homescreen 
for best experience 

Create or Edit file types;
php, html, css, svg
and javascript.

Create files;
Project File pathNames are
created via comment on
line 2 of source text.
eg. 
filePathName: nam_htm/nam.htm
This will save 
the source text to
./e/nam_htm/nam.htm


To copy a file,
just change its Path 
or Name in the line 2 comment.
eg.
filePathName: nam_htm/n2.htm


Full filePathName and
individual files can
be Deleted via the Editor

A backup is copied to
./nam_htm/BAK folder
each time a file is saved.
To restore a backup,
simply rename the backup
to the original path/name 
via terminal or ssh.

Enjoy 
</pre>

