<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<?php
/************ History ******* */
$cms['tngpath'] = "../";
include( "../tng_begin.php");
if( !$cms['support'] )
	$cms['tngpath'] = "../";

$title = "Greater Expectations";
$description = "";
$path = $_SERVER['PHP_SELF'];

$logstring = "<a href=\"$path\">". $title. "</a>";
writelog($logstring);
preparebookmark($logstring);
var_dump($logstring);

$flags['noicons'] = true;
tng_header( "Greater Expectations", $flags ); 

?>


<div>
    <h1 class="article-title">Greater Expectations</h1>
    <h4 class="article-description">A Web Article by <a href="../getperson.php?personID=I926&tree=upavadi_1">Nikesh Shukla</a></h4>
        <h4 class="article-description">Nikesh Shukla reflects on why immigrants shouldn't have to be superheroes with stories about Mahesh Upadhyaya and an illegal immigrant, Mamoudou Gassama.</h4>
    <p class="center"><a class="btn-detail" href="../articles/articles-list.php">Back to Articles Index</a></p>
    <object class="pdf" 
            data= "../articles/Greater_expectations.pdf"
            width="800"
            height="500">
    <p>
    This document cannot be displayed in your browser.
    <a href="../articles/Greater_expectations.pdf" target="_blank">Click <b>here</b> to download or view the PDF.</a>
    </p>
    </object>
</div>
</body>

<p class="center"><a class="btn-detail" href="../articles/articles-list.php">Back to Articles Index</a></p>
<?php tng_footer( "" ); ?>





