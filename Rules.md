<pre style="width:100%;font:8px/7px '';">
Rules
Install Directory is anything...
eg. "ed/"

Install Subdirectory must be...
 "editor_php/"

Install File Name must be...
 "editor.php"

So
/var/www/html/ed/editor_php/editor.php

standalone.js must be in editor_php

f.ttf must be in parent dir (ed/)


lines 1 through 5 of files

The comments in 
lines 1 to 4 define details

Line 1 
defines doctype or tag 
else whole line is comment.

Line 2
defines the file pathName.

Line 3 contains 
last written dateTime of file

Line 4 contains
last line number edited

<b>For PHP 
&lt;?php // doctype or tag
/* filePathName: eg_php/eg.php */
/* Uploaded: 13:33:03,  Sat 4 Dec 2021 */
/* LineNo: 36 */

For HTML
&lt;!DOCTYPE html>
&lt;html data-a="/* FilePathName: eg_php/eg.html */"
      data-b="/* Uploaded: 13:33:03,  Sat 4 Dec 2021 */"
      data-c="/* LineNo: 36 */" 
  lang="en">

For JavaScript 
// commented or blank 1st  line for this editor system no tag for js
/* filePathName: eg_php/eg.js */
/* Uploaded: 13:33:03,  Sat 4 Dec 2021 */
/* LineNo: 36 */

For css
// commented or blank 1st  line for this editor system no tag for css
/* filePathName: eg_php/eg.css */
/* Uploaded: 13:33:03,  Sat 4 Dec 2021 */
/* LineNo: 36 */

For any file type
<!-- 
/* FilePathName: eg_php/eg.svg */
/* Uploaded: 13:33:03,  Sat 4 Dec 2021 */
/* LineNo: 36 */--></b>

</pre>

