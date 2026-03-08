<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<?php
/************ Mahesh learning to code ******* */
$cms['tngpath'] = "../";
include( "../tng_begin.php");
if( !$cms['support'] )
	$cms['tngpath'] = "../";

$title = "Learning to Code";
$description = "";
$path = $_SERVER['PHP_SELF'];

$logstring = "<a href=\"$path\">". $title. "</a>";
writelog($logstring);
preparebookmark($logstring);
//var_dump($logstring);

$flags['noicons'] = true;
tng_header( "Learning to Code", $flags ); 

?>


<div class="article-text">
    <h1 class="article-title">Learning To Code</h1>
    A Web Article by <a href="../getperson.php?personID=I926&tree=upavadi_1">Mahesh Upadhyaya</a><br>
    Link To the Article is <a href="https://medium.com/@mahesh_u/my-411-days-journey-to-fcc-front-end-certification-7411597feabd">Here</a>
<p class="center"><a class="btn-detail" href="../articles/articles-list.php">Back to Articles Index</a></p>
    <object class="pdf" 
            data= "../articles/411days-codeCamp.pdf"
            width="800"
            height="500">
    <p>
    This document cannot be displayed in your browser.
    <a href="../articles/411days-codeCamp.pdf" target="_blank">Click <b>here</b> to download or view the PDF.</a>
    </p>
    </object>
</div>
</body>

<p class="center"><a class="btn-detail" href="../articles/articles-list.php">Back to Articles Index</a></p>
<?php tng_footer( "" ); ?>





