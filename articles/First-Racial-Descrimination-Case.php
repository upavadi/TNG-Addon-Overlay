<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<?php
/************ First Racial case ******* */
$cms['tngpath'] = "../";
include( "../tng_begin.php");
if( !$cms['support'] )
	$cms['tngpath'] = "../";

$title = "Observer Article";
$description = "";
$path = $_SERVER['PHP_SELF'];

$logstring = "<a href=\"$path\">". $title. "</a>";
writelog($logstring);
preparebookmark($logstring);

$flags['noicons'] = true;
tng_header( "RRB JUdjement", $flags ); 
?>
<p class="center"><a class="btn-detail" href="../articles/articles-list.php">Back to Articles Index</a></p>

<div>
    <h1 class="article-title">50 years of Racial Descrimination Act in UK.</h1>
    <h4 class="article-description">A Newspaper Article by <a href="../getperson.php?personID=I926&tree=upavadi_1">Nikesh Shukla</a> about First Racial Discrimination Case brought by <a href="../getperson.php?personID=I695&tree=upavadi_1">Mahesh Upadhyaya</a>
<br>Please note that the last paragraph in the <a href="https://www.theguardian.com/lifeandstyle/2018/apr/29/i-want-to-stand-up-to-racists-as-my-uncle-did-nikesh-shukla">article</a> relates to the magazine. I am not soliciting for donation.<br>
</h4>

    <object class="pdf" 
            data= "../articles/First-Racial-Descrimination-Case.pdf"
            width="800"
            height="500">
    <p>
    This document cannot be displayed in your browser.
    <a href="../articles/First-Racial-Descrimination-Case.pdf" target="_blank">Click <b>here</b> to download or view the PDF.</a>
    </p>
    </object>
</div>
</body>

<p class="center"><a class="btn-detail" href="../articles/articles-list.php">Back to Articles Index</a></p>
<?php tng_footer( "" ); ?>





