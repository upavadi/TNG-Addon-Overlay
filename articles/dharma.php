<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">

<?php
/************ Dharma ******* */
$cms['tngpath'] = "../";
include( "../tng_begin.php");
if( !$cms['support'] )
	$cms['tngpath'] = "../";

$title = "Dharma - A Short History";
$description = 'by Swami Krishnanand Saraswati dedicated to the memory of <a href="../getperson.php?personID=I595&tree=upavadi_1">Mansukhlal J Upadhyaya</a>';
$path = $_SERVER['PHP_SELF'];

$logstring = "<a href=\"$path\">". $title. "</a>";
writelog($logstring);
preparebookmark($logstring);


$flags['noicons'] = true;
tng_header( "Dharma", $flags ); 

?>
<div>
    <h1 class="article-title">Dharma</h1>
    <h4 class="article-description">by Swami Krishnanand Saraswati,  dedicated to the memory of Mansukhlal J Upadhyaya</h4>
    <p class="center"><a class="btn-detail" href="../articles/articles-list.php">Back to Articles Index</a></p>
    <object class="pdf" 
            data= "../articles/Dharma-ShortHidtory.pdf"
            width="800"
            height="500">
    <p>
    This document cannot be displayed in your browser.
    <a href="../articles/Dharma-ShortHidtory.pdf" target="_blank">Click <b>here</b> to download or view the PDF.</a>
    </p>
    </object>
</div>
</body>

<p class="center"><a class="btn-detail" href="../articles/articles-list.php">Back to Articles Index</a></p>
<?php tng_footer( "" ); ?>


