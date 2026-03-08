<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<link rel="stylesheet" href="./mytngstyle.css">
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>Articles</title>
<style>
ul.list1 li {list-style-type: none; position: relative; margin-left: -10px; padding-left: 20px;}
ul.list1 li:before {position: absolute; font-family: 'FontAwesome'; font-size: 14px; top: 1px; left: 0; content: "\f0a9"; color: #1f2159;}
</style>
<?php
$cms['tngpath'] = "../";
include( "../tng_begin.php");
if( !$cms['support'] )
	$cms['tngpath'] = "../";

/*  $logstring should contain the URL for your family stories
	writelog creates an entry in the Access Log
	preparebookmark creates the bookmark link on the page  */

$logstring = "<a href=\"articles/errorLog.php\">article list</a>";
writelog($logstring);
preparebookmark($logstring);

// The following $flags can be passed on the family story pages.  The $flags can either be true or false 

$flags['noheader'] = false; // set to true to not include the template Custom Header
	// set to false to include the template Custom Header - normally topmenu.php
$flags['nobody'] = true;  	// set to true to not generate the <body> tag if the tag is in the topmenu.php
	// set to false to generate the <body> tag
$flags['noicons'] = true; 	// set to true to not generate the TNG menu bar 
	// set to false to generates the TNG menu bar
$flags['nologon'] = false; 	// set to true to bypass the checklogin and allow the page to be viewed by visitors even though your site requires Login 
	// set to false to require login to view the page

// for multi-language pages, you can use $text variables for your Feature Story Title

tng_header( "Articles", $flags ); 
?>
<h4 class="header2">Articles</h4>
	<ul class="list1">
		<li><a href="faq1.php">FAQs</a></li>
		<li><a href="dharma.php">Dharma</a></li>
		<li>Jatashanker Upadhyaya
			<ul>
				<li><a href="Roots-Jatashanker-Condensed.php">Our Roots</a> </li>				
			</ul>
		</li>
			<li>Karsanji D Travadi
			<ul>
				<li><a href="../articles/K_D_Travadi_A_Radical_Visionary.php">A Radical Visionary</a>
				</li>				
			</ul>
		</li>
				</li>
			<li>Bhuvan Thaker
			<ul>
				<li><a href="../articles/Conscious-Humans+Final(House+of+Sai)_PDFA1A-1.php">Conscious Humans</a> 
				</li>				
			</ul>
		</li>
		<li>Mahesh Upadhyaya
			<ul>
				<li><a href="../articles/noBlacks-nocontent.php">No Blacks-No Dogs-No Irish</a>
				<li><a href="../articles/Judgement_R.R.B's_first_prosecution.php">Judjement in 1st Procecution</a>
				<li><a href="../articles/First-Racial-Descrimination-Case.php">First Descrimination Case</a>
				<li><a href="../articles/The_Observer_Editorial_Opinion_The Guardian.php">Observer Editorial</a>
				<li><a href="../articles/radio-interview.php">Radio Interview-Racism</a>
				<li><a href="../articles/Greater_expectations.php">Greater_expectations</a>
				<li><a href="../articles/411days-codeCamp.php">Learning To Code</a>
				</li>				
			</ul>
		</li>

	</ul>
	<h4 class="header2">History</h4>
	<ul class="list1">
		<li><a href="../histories/anavil.php">Anavil</a></li>
		<li><a href="../histories/modh.php">Modh Brahmins</a></li>
		<li><a href="../histories/valam.php">Valam (in Gujarati)</a></li>
		<li><a href="../histories/girnarguju.php">Girnar Gujarati</a></li>
		<li>Pranshanker Joshi
			<ul>
			<li><a href="../histories/Pranshankar_B.Joshi_1.php">Gujarati Newspaper 1</a></li>
			<li><a href="../histories/Pranshankar_B.Joshi_2.php">Gujarati Newspaper 2</a></li>
			</ul>
		</li>
		<li><a href="../histories/chitralekha-Bakula-Pandya.php">Bakuladevi Pandya (Gujarati)</a></li>
	</ul>
	<h4 class="header2">Documents</h4>
	<ul class="list1">
		<li><a href="faq1.php">FAQs</a></li>
		<li><a href="../showmedia.php?mediaID=648">Award of Appreciation (	Yashwant Desai)</a></li>
		<li><a href="../documents/Eulogy-Mansukh-Upadhyaya.php">Eulogy (Mansukh J. Upadhyaya)</a></li>
		<li><a href="../documents/Mansukhlal_Service_certificate.php">Service Cert (Mansukh J. Upadhyaya)</a></li>
		<li><a href="../documents/K-D-Travadi-memory-Utsav.php">Modh Honour Cert (Karsanji D Travadi)</a></li>
		
	</ul>
	
	
	<ul class="list1">
		<li><a href="articles-list.php">Articles Index</a></li>
		<!-- <li><a href="../index.php">Return to TNG</a></li> -->
	</ul>
<p> &nbsp;</p>
</body><p>&nbsp;</p>
<?php tng_footer( "" ); ?>
