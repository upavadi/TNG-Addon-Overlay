<?php
include("tng_begin.php"); 

tng_db_connect($database_host,$database_name,$database_username,$database_password) or exit;	

$flags['noicons'] = true;
$flags['noheader'] = false;
tng_header( $text['mnuheader'], $flags );
$tng_url = $_SERVER['REQUEST_URI'];
$tng_login = $tngdomain."login.php";
$tng_contact = $tngdomain."suggest.php";
$tng_register = $tngdomain. "newacctform.php";

/** home page content text ********************************************************* */
$c1_notloggedin1 = "<strong>Welcome</strong> to the Genealogy Site of the Relatives of Upadhyaya, Travadi and Trivedi family. Here you may explore our eight distinct descendent charts and see how they are connected.";
$c2_notloggedin = "You will be able to see some genealogy data but all details of living individuals will be blocked.<br />
Do login to see all data and photos.<br />If you think you are part of our genealogy project, please do <a href=\"$tng_register\"><strong>Register </strong></a>
or <a href='/contact-us/'><b>Contact Me</b></strong></a> for more details";

$a_welcome = " to the Genealogy Site of the Relatives of Upadhyaya, Travadi and Trivedi family. Here you may explore our eight distinct descendent charts and see how they are connected.
If you have any additional information, please share by <a href=\"$tng_contact\">Contacting us.</a>";
$b_general = "We are tracking Descendents of 8 individuals.
<ul>
<li>Click a photo or name to visit that person’s page.</li>
<li>Click the earliest ancestor’s name to see their descendant chart.</li>
<li>Large charts may require scrolling.</li>
</ul>
";

$privacy = "<b>Privacy and Data integrity: </b>
<br/>To protect your data, we have a closed community. Access to information about living individuals requires approval. All changes are reviewed by administrators.";

$c2_loggedin = "Welcome to our Genealogy Map. Here you may explore our eight distinct descendent charts and see how they are connected.<br />
If suggest.php'><b>Contact Me</b></strong></a> ";

/*** Define ancestor variables ****/
$personAncestor1 = $tngdomain . "/getperson.php?personID=I577&tree=upavadi_1";
$imageAncestor1 = $tngdomain . "/photos/deceased/thumb_JatashankerBapuji.jpg";
$ancestorAncestor1 = $tngdomain . "/descend.php?personID=I176&tree=upavadi_1&display=standard&generations=6";

$personAncestor2 = $tngdomain . "/getperson.php?personID=I171&tree=upavadi_1";
$imageAncestor2= $tngdomain . "/photos/deceased/thumb_Rambhaben_Jatashanker_Upadhyaya.jpg";
$ancestorAncestor2 = $tngdomain . "/descend.php?personID=I374&tree=upavadi_1&display=standard&generations=3";

$personAncestor3 = $tngdomain . "/getperson.php?personID=I378&tree=upavadi_1";
$imageAncestor3 = $tngdomain . "/photos/deceased/thumb_Pranshankar_B_Joshi.jpg";
$ancestorAncestor3 = $tngdomain . "/descend.php?personID=I378&tree=upavadi_1&display=standard&generations=3";

$personAncestor4 = $tngdomain . "/getperson.php?personID=I581&tree=upavadi_1";
$imageAncestor4 = $tngdomain . "/photos/deceased/thumb_Dulerai_Pandya.jpg";
$ancestorAncestor4 = $tngdomain . "/descend.php?personID=I481&tree=upavadi_1&display=standard&generations=4";

$personAncestor5 = $tngdomain . "/getperson.php?personID=I580&tree=upavadi_1";
$imageAncestor5 = $tngdomain . "/photos/deceased/thumb_Bhai_KDT_03.jpg";
$ancestorAncestor5 = $tngdomain . "/descend.php?personID=I1589&tree=upavadi_1&display=standard&generations=12";

$personAncestor6 = $tngdomain . "/getperson.php?personID=I582&tree=upavadi_1";
$imageAncestor6 = $tngdomain . "/photos/deceased/thumb_dhankaurBaa.jpg";
$ancestorAncestor6 = $tngdomain . "/descend.php?personID=I152&tree=upavadi_1&display=standard&generations=4";

$personAncestor7 = $tngdomain . "/getperson.php?personID=I250&tree=upavadi_1";
$imageAncestor7 = $tngdomain . "/photos/deceased/thumb_DahyabhaiDesai.jpg";
$ancestorAncestor7 = $tngdomain . "/descend.php?personID=I1081&tree=upavadi_1&display=standard&generations=4";

$personAncestor8 = $tngdomain . "/getperson.php?personID=I592&tree=upavadi_1";
$imageAncestor8 = $tngdomain . "/photos/deceased/thumb_Shantagauri_Desai.jpg";
$ancestorAncestor8 = $tngdomain . "/descend.php?personID=I1366&tree=upavadi_1&display=standard&generations=4";
?>

<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/3.18.1/build/cssreset-context/cssreset-context-min.css">
<link rel="stylesheet" type="text/css" href="<?php echo $tngdomain. '/css/TngHomePage.css' ; ?>">
<link rel="stylesheet" type="text/css" href="<?php echo $tngdomain. '/css/mytngstyle.css' ; ?>">

</head><link rel="stylesheet" href="<?php echo $tngdomain; ?>/add_ons/custom-menu/topmenu-menu.css">
<li nk rel="stylesheet" type="text/css" href="<?php echo $tngdomain. '/css/tngmobile.css' ; ?>">

<!-- "Home Page" (the text for these messages can be found at near the bottom of text.php -->
<div style="padding: 5px; width: 50%;  margin: 0 auto; text-align: center;";>
<h2>A more Secure Docker Version 14.05 is Under Construction</h2>
<h3>It will replace current version. If you spot any errors OR you would like to suggest changes, please let me know, by clicking <a href="suggest.php" style="color: #446d87"><b>Here</b></a>. <br> Thank you!</h3>
</div>

<div class="Logo-for-mobile">
	<?php $topLogo = $tngdomain . "/img/logo_14.png"; ?>
        <a href="<?php echo $tngdomain; ?>"><img src="<?php echo $topLogo; ?>" alt="Logo" class="logo"></a>
        <div class="mobile-top-title">
        Upadhyaya Family & Relatives</div>
        <p class="mobile-top-description">Our Journey Through Time</p>
        </div>
</div>
<!-------------------------------------------------->
<!-- Add this before your first target div -->
<div class="flex-container">
	


	<!------------Welcome 1 - dv1------------------------------------->
	<div class = "welcomeText_1 dv1">
		<?php	
		/*** Current user message ***************************************************/
		if( $currentuser ) {		
			echo "<p><strong>Welcome ". $currentuserdesc. "</strong>". $a_welcome. "</p>";
		} else {
		echo $c1_notloggedin1;
		echo "<p> You are not logged In. Please <a href=\"$tng_login\">Log In</a> or <a href=\"$tng_register\"><strong>Register </strong></a> for a new account. </p> ";
		}
		?>			
	</div

	<!------------Tracking descendents - dv6 -------------------------------------->
	<div class = "welcomeText_1 dv6">
		<p><?php echo $b_general; ?></p>
		<p><?php echo $privacy; ?> </p>
	</div>
	
	<!------------On This Day - dv2 -------------------------------------->
	<div class = "welcomeText_gone dv2">
		<div class="gone_header">On This Day</div>
		<div><a href="add_ons/y_today_3.php">  More....</a></div>
		<?php include("add_ons/gone2.php"); ?>		
	</div>

	<!--------------add useful links dv2 ---------------------------------------->
	<div class="welcomeText_1 dv3">
		<p><span class="header">Useful Links</span></p>
		<ul>
		<?php 
		if( $currentuser ) {
			//this means you're logged in
			$personId = ($_SESSION['mypersonID']);
			echo "<li><a href=\"logout.php\">{$text['mnulogout']}</a></li>\n";
			echo "<li><a href=\"getperson.php?personID=$personId\">My Page</a></li>\n";
		}
		else {
			//this means you're logged out
			echo "<li><a href=\"login.php\">{$text['mnulogon']}</a></li>\n";
			echo "<li><a href=\"newacctform.php\">Register</a></li>\n";
		}

		echo "<li><a href=\"anniversaries.php\">Anniversaries</a></li>\n";
		echo "<li><a href=\"add_ons/search-names.php\">Quick Search</a></li>\n";
		//echo "<li><a href=\"add_ons/events-pending.php\">Any Other Special Event?</a></li>\n";
		echo "<li><a href=\"add_ons/y_today_t.php\">Yesterday - Today - Tomorrow</a></li>\n"; 
		echo "<li><a href=\"statistics.php\">{$text['mnustatistics']}</a></li>\n";
		echo "<li><a href=\"suggest.php\">Contact Us</a></li>\n";
		?>
		</ul>
	</div>
	
	<!-- --- Random Photo - dv5 ------------------------------------------ -->
	<div class="welcomeText_1 random-photo dv4" >		
		<div>
		<?php include("randomphoto.php"); ?>
		</div>
	</div>

	<!-- -------------Top Surnames dv6------------------------------------------------->
	<div class="top_surnames dv5">
		<span class="header">Top Surnames</span>
		<?php 
		include_once($rootpath."/add_ons/surnames-top10.php");
		?>
	</div>

<!-- ------------Ancestors-------------------------------------------------->
	
	<!-- -----------------Ancestors1--------------------------------------------->
	<div class="welcomeText_1 equalHMR eq dv7">
		<div>
		<p>
		<a href="<?php echo $personAncestor1 ?>">
		<img class="surname_image" src="<?php echo $imageAncestor1 ?>" alt="Jatashanker Juthabhai Upadhyaya"></a>
		</p>
		<p>Earliest known Ancestor of <br />
		<a style="color: #d77600;" href="<?php echo $personAncestor1 ?>"><h5>Jatashanker Juthabhai Upadhyaya</h5></a> is
		<a href="<?php echo $ancestorAncestor1 ?>"><h5>Popatbhai Upadhyaya</h5></a>
		</p>
		</div>
	</div>
	<!-- -----------------Ancestors2--------------------------------------------->
	<div class="welcomeText_1 equalHMR eq eq-female dv8 ">
		<div>
		<p>
		<a href="<?php echo $personAncestor2 ?>">
		<img class="surname_image" src="<?php echo $imageAncestor2 ?>" alt="Rambhaben Vireshwar Vyas"></a>
		</p>
		<p>Earliest known Ancestor of <br />
				<a style="color: #d77600;" href="<?php echo $personAncestor2 ?>"><h5>Rambhaben Vireshwar Vyas</h5></a> is
				<a style="text-decoration: underline;" href="<?php echo $ancestorAncestor2 ?>"><h5>Vireshvar Vyas</h5></a>
		</p>
		</div>
	</div>

	<!-- -----------------Ancestors3--------------------------------------------->
	<div class="welcomeText_1 equalHMR eq dv14">
		<div>
		<p>
		<a href="<?php echo $personAncestor3 ?>">
		<img class="surname_image" src="<?php echo $imageAncestor3 ?>" alt="Pranshanker B Joshi"></a>
		</p>
		<p>			 
		<a style="text-decoration: underline;" href="<?php echo $ancestorAncestor3 ?>"><h5>Pranshanker Bhawanishanker Joshi</h5></a><br />
		<br /> is father-in-law of 
		<a style="color: #d77600;" href="<?php echo $personAncestor1 ?>"><h5>Jatashanker Juthabhai Upadhyaya</h5></a>
		</p>
		</div>
	</div>

	<!-- -----------------Ancestors4-------------------------------------------->
	<div class="welcomeText_1 equalHMR eq dv13">
		<div>
		<p>
		<a href="<?php echo $personAncestor4 ?>">
		<img class="surname_image" src="<?php echo $imageAncestor4 ?>" alt="Dulerai Tribhovan Pandya"></a>
		</p>
		<p>Earliest known Ancestor of <br />
				<a style="color: #d77600;" href="<?php echo $personAncestor4 ?>"><h5>Dulerai Tribhovan Pandya</h5></a> is 
				<a style="text-decoration: underline;" href="<?php echo $ancestorAncestor4 ?>"><h5>Trikamji Pandya</h5></a>
		</p>
		</div>
	</div>

	<!-- -----------------Ancestors5--------------------------------------------->
	<div class="welcomeText_1 equalHMR eq dv9">
		<div>
		<p>
		<a href="<?php echo $personAncestor5 ?>">
		<img class="surname_image" src="<?php echo $imageAncestor5 ?>" alt="Karsanji Dahyabhai Travadi"></a>
		</p>
		<p>Earliest known Ancestor (12th generation) of <br />
				<a style="color: #d77600;" href="<?php echo $personAncestor5 ?>"><h5>Karsanji Dahyabhai Travadi</h5></a> is 
				<a style="text-decoration: underline;" href="<?php echo $ancestorAncestor5 ?>"><h5>Vithalji Travadi</h5></a>
		</p>
		</div>
	</div>

	<!-- -----------------Ancestors6--------------------------------------------->
	<div class="welcomeText_1 equalHMR eq eq-female dv10">
		<div>
		<p>
		<a href="<?php echo $personAncestor6 ?>">
		<img class="surname_image" src="<?php echo $imageAncestor6 ?>" alt="Dhankunver Shivshanker Travadi"></a>
		</p>
		<p>Earliest known Ancestor of <br />
				<a style="color: #d77600;" href="<?php echo $personAncestor6 ?>"><h5>Dhankunver Shivshanker Trivedi</h5></a> is 
				<a style="text-decoration: underline;" href="<?php echo $ancestorAncestor6 ?>"><h5>Ajramer Trivedi</h5></a>
		</p>
		</div>
	</div>

	<!-- -----------------Ancestors7--------------------------------------------->
	<div class="welcomeText_1 equalHMR eq dv11">
		<div>
		<p>
		<a href="<?php echo $personAncestor7 ?>">
		<img class="surname_image" src="<?php echo $imageAncestor7 ?>" alt="Dahyabhai Ranchhodji Desai"></a>
		</p>
		<p>Earliest known Ancestor of <br />
				<a style="color: #d77600;" href="<?php echo $personAncestor7 ?>"><h5>Dahyabhai Ranchhodji Desai</h5></a> is
				<a style="text-decoration: underline;" href="<?php echo $ancestorAncestor7 ?>"><h5>Saurambhai Dayalji Desai</h5></a>
		</p>
		</div>
	</div>

	<!-- -----------------Ancestors8-------------------------------------------->
	<div class="welcomeText_1 equalHMR eq eq-female dv12">
		<div>
		<p>
		<a href="<?php echo $personAncestor8 ?>">
		<img class="surname_image" src="<?php echo $imageAncestor8 ?>" alt="Shantagauri Bhikhabhai Naik"></a>
		</p>
		<p>Earliest known Ancestor of <br />
				<a style="color: #d77600;" href="<?php echo $personAncestor8 ?>"><h5>Shantagauri Bhikhabhai Naik</h5></a> is 
				<a style="text-decoration: underline;" href="<?php echo $ancestorAncestor8 ?>"><h5>Lallubhai Naik</h5></a>
		</p>
		</div>
	</div>
</div><!--end ancestors -->
</div>


<?php
tng_footer( "" );
?>