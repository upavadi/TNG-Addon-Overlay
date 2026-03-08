<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">

<?php
/************ P Joshi Doc 2 ******* */
$cms['tngpath'] = "../";
include( "../tng_begin.php");
if( !$cms['support'] )
	$cms['tngpath'] = "../";

$title = "Gujarati Article 1";
$description = "";
$path = $_SERVER['PHP_SELF'];

$logstring = "<a href=\"$path\">". $title. "</a>";
writelog($logstring);
preparebookmark($logstring);
var_dump($logstring);

$flags['noicons'] = true;
tng_header( "Pranshanker Joshi", $flags ); 

?>


<div class="article-text">
    <h1 class="article-title">Pranshanker Joshi (1867 - 1958)</h1>
    Friend of Mahatma Gandhi - Article in Gujarati Newspaper, <b>Kumar</b>
<p class="center"><a class="btn-detail" href="../articles/articles-list.php">Back to Articles Index</a></p>
    <object class="pdf" 
            data= "../documents/Pranshankar_B.Joshi_KUMAR - 1969.pdf"
            width="800"
            height="500">
    <p>
    This document cannot be displayed in your browser.
    <a href="../documents/Pranshankar_B.Joshi_KUMAR - 1969.pdf" target="_blank">Click <b>here</b> to download or view the PDF.</a>
    </p>
    </object>
</div>
</body>

<p class="center"><a class="btn-detail" href="../articles/articles-list.php">Back to Articles Index</a></p>
<?php tng_footer( "" ); ?>





