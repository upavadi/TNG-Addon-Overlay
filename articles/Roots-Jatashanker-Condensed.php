<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<?php
/************ Roots ******* */
$cms['tngpath'] = "../";
include( "../tng_begin.php");
if( !$cms['support'] )
	$cms['tngpath'] = "../";

$title = "Our Roots";
$description = "";
$path = $_SERVER['PHP_SELF'];

$logstring = "<a href=\"$path\">". $title. "</a>";
writelog($logstring);
preparebookmark($logstring);

$flags['noicons'] = true;
tng_header( "Our Roots - Jatu Bapuji", $flags ); 

?>


<div>
    <h1 class="article-title">Roots</h1>
    <h4 class="article-description">Jatashanker Juthabhai Upadhyaya (1891 - 1981)<br>Condensed Version</h4>
<p class="center"><a class="btn-detail" href="../articles/articles-list.php">Back to Articles Index</a></p>
    <object class="pdf" 
            data= "../articles/Roots-Jatashanker-Condensed.pdf"
            width="800"
            height="500">
    <p>
    This document cannot be displayed in your browser.
    <a href="../articles/Roots-Jatashanker-Condensed.pdf" target="_blank">Click <b>here</b> to download or view the PDF.</a>
    </p>
    </object>
</div>
</body>

<p class="center"><a class="btn-detail" href="../articles/articles-list.php">Back to Articles Index</a></p>
<?php tng_footer( "" ); ?>





