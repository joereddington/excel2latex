<!--
Copyright (c) 2010 Shawn M. Douglas (shawndouglas.com), modifed by Joe Reddington

Permission is hereby granted, free of charge, to any person
obtaining a copy of this software and associated documentation
files (the "Software"), to deal in the Software without
restriction, including without limitation the rights to use,
copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the
Software is furnished to do so, subject to the following
conditions:

The above copyright notice and this permission notice shall be
included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES
OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT
HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY,
WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING
FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR
OTHER DEALINGS IN THE SOFTWARE.
-->

<?php
echo "<head> 
<title>Excel to latex converter</title>
<h1>Copy & Paste Excel to LaTeX Converter</h1>
<form action='index.php' method='post'><textarea name='data' rows='10' cols='50'></textarea><br><input type='submit' /></form>";

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
echo "<small><b>Instructions:</b><br><br>
Copy & paste cells from Excel and click submit. Paste results into your LaTeX document.<br><br>

This is a hastly retargeted version of the very excellent Excel2Wiki tool at     <a href=\"http://excel2wiki.net/\">http://excel2wiki.net/</a>, the very awesome Shawn Douglas released the source code under the MIT licence and this modification is under the same one. However any latex related bugs are my fault and you should email me at joe@joereddington.com";
} else {
echo "<h2>result</h2>\n<pre>\n\begin{tabular}{|";
$lines = preg_split("/\n/", $_POST['data']);
$n = sizeof($lines);
 $line = preg_split("/\t/", $lines[0]);
  foreach ($line as $val) {
   $val2 = rtrim($val);
   echo 'r|';
  }
   echo "}\n".'\hline' ;
foreach ($lines as $index => $value) {
 $line = preg_split("/\t/", $value);
  $data = implode("   &   ", $line);
  echo ' ' . $data . '\\\\';
  if ($index < $n - 1) {
   echo "\n";
  } else {
echo "\n".'\hline';
}
 
}
echo "\n".'\end{tabular}'. "</pre>";
}

echo "</body></html>";

?>
