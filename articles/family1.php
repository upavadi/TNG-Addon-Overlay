<?php
/*Purpose of this file: To allow you to make new family or feature pages that conform to the same look-and-feel and privacy settings as the rest of your site.

NOTE: The instructions below assume you will place your new page in one of your media subfolders (for example, "histories" or "documents", or create a extrapgs subfolder to your TNG root folder) 
and use copy and paste this file to your preferred subfolder and edit the file in that subfolder.

Instructions:
STEP 1: Make a copy of this file with a different name, keeping the .php extension (for example: myfamily1.php). Make the changes described below in the copy, not the original.
  */


$cms['tngpath'] = "../";
include( "../tng_begin.php");
if( !$cms['support'] )
	$cms['tngpath'] = "../";

/*  $logstring should contain the URL for your family stories
	writelog creates an entry in the Access Log
	preparebookmark creates the bookmark link on the page  */

$logstring = "<a href=\"histories/boudreaux.php\">Boudreaux</a>";
writelog($logstring);
preparebookmark($logstring);

// The following $flags can be passed on the family story pages.  The $flags can either be true or false 

$flags['noheader'] = false; // set to true to not include the template Custom Header
	// set to false to include the template Custom Header - normally topmenu.php
$flags['nobody'] = true;  	// set to true to not generate the <body> tag if the tag is in the topmenu.php
	// set to false to generate the <body> tag
$flags['noicons'] = false; 	// set to true to not generate the TNG menu bar 
	// set to false to generates the TNG menu bar
$flags['nologon'] = false; 	// set to true to bypass the checklogin and allow the page to be viewed by visitors even though your site requires Login 
	// set to false to require login to view the page

// for multi-language pages, you can use $text variables for your Feature Story Title

tng_header( "Family 1", $flags ); 


?>
<h1>Family 1</h1>
<p>The bones here are bones of my bone and flesh of my flesh. It goes to doing something about it. It goes to pride in what our ancestors were able to accomplish. 
<img class="img-round-right" alt="" src="img/boy1.jpg">How they contributed to what we are today. It goes to respecting their hardships and losses, their never giving in or giving up, their resoluteness to go on and build a life for their family.<p>
<p>It goes to deep pride that the fathers fought and some died to make and keep us a nation. It goes to a deep and immense understanding that they were doing it for us. 
It is of equal pride and love that our mothers struggled to give us birth, without them we could not exist, and so we love each one, as far back as we can reach. 
That we might be born who we are. That we might remember them. So we do. </p>
<p>With love and caring and scribing each fact of their existence, because we are they and they are the sum of who we are. So, as a scribe called, I tell the story of my family. 
It is up to that one called in the next generation to answer the call and take my place in the long line of family storytellers. That is why I do my family genealogy, and that 
is what calls those young and old to step up and restore the memory or greet those who we had never known before.</p>
<p><i>by Della M. Cummings Wright; Rewritten by her granddaughter Dell Jo Ann McGinnis Johnson; Edited and Reworded by Tom Dunn, 1943.</i></p>
<h2>Multi-language pages</h2>
<p>If you are creating a story that you will translate and want to display in the language the user has selected when viewing your site, 
  then you can place the content that starts with the heading 1 (< h1 >) line to everything in the line before the tng_footer.php function 
  call in your language folder and use a PHP </p>
<p>include($mylanguage/family1.php) to include the content from you language folder for each language you support on your site.    
<br />
For additional information see the TNG Wiki article on creating User Pages or histories using the 
historytemplate.php file at http://tng.lythgoes.net/wiki/index.php?title=User_Pages_-_Getting_Started and 
http://tng.lythgoes.net/wiki/index.php?title=User_Pages_-_Multi-Language</p>
<p class="center"><a class="btn-detail" href="home.php">Back to Histories Home</a></p>
<p>&nbsp;</p>
<?php tng_footer( "" ); ?>
