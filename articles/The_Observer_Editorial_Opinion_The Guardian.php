<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<?php
/************ Observer Editorial ******* */
$cms['tngpath'] = "../";
include( "../tng_begin.php");
if( !$cms['support'] )
	$cms['tngpath'] = "../";

$title = "Observer Editorial";
$description = "";
$path = $_SERVER['PHP_SELF'];

$logstring = "<a href=\"$path\">". $title. "</a>";
writelog($logstring);
preparebookmark($logstring);
var_dump($tngdomain);
$flags['noicons'] = true;
tng_header( "RRB JUdjement", $flags ); 
?>
<p class="center"><a class="btn-detail" href="../articles/articles-list.php">Back to Articles Index</a></p>

<div>
    <h1 class="article-title">The Observer view on the UK's right to rent shame.</h1>
    <h4 class="article-description">First paragraph in this<a href="https://www.theguardian.com/profile/observer-editorials">Observer Editorial</a> refers to an article in<a href="https://rightsinfo.org/rhpacism-1960s-britain/"> rightsinfo.com</a> describing racial discrimination experienced by<a href="<?php echo $tngdomain. 'getperson.php?personID=I695';?>"> Mahesh Upadhyaya</a>
<br><i>Note: Only first 2 pages of the article are reproduced, below.
https://www.theguardian.com/commentisfree/2019/mar/03/the-observer-view-on-the-uk-right-to-rent-shame</i></h4>

    <object class="pdf" 
            data= "../articles/The_Observer_Editorial_Opinion_The Guardian.pdf"
            width="800"
            height="500">
    <p>
    This document cannot be displayed in your browser.
    <a href="../articles/The_Observer_Editorial_Opinion_The Guardian.pdf" target="_blank">Click <b>here</b> to download or view the PDF.</a>
    </p>
    </object>
</div>
</body>

<p class="center"><a class="btn-detail" href="../articles/articles-list.php">Back to Articles Index</a></p>
<?php tng_footer( "" ); ?>





