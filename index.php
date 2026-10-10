<?php
include("tng_begin.php"); 

tng_db_connect($database_host,$database_name,$database_username,$database_password) or exit; 

$flags['noicons'] = true;
$flags['noheader'] = false;
$flags['css'] =
    "<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\n"
    ."<link rel=\"stylesheet\" type=\"text/css\" href=\"http://yui.yahooapis.com/3.18.1/build/cssreset-context/cssreset-context-min.css\">\n"
    ."<link rel=\"stylesheet\" type=\"text/css\" href=\"{$tngdomain}/css/TngHomePage.css\">\n"
    ."<link rel=\"stylesheet\" type=\"text/css\" href=\"{$tngdomain}/css/mytngstyle.css\">\n"
    ."<link rel=\"stylesheet\" type=\"text/css\" href=\"{$tngdomain}/add_ons/custom-menu/topmenu-menu.css\">\n"
    ."<link rel=\"stylesheet\" type=\"text/css\" href=\"{$tngdomain}/css/mytngmobile.css\">\n"
    ."<link rel=\"stylesheet\" type=\"text/css\" href=\"{$tngdomain}/css/tngmobile.css\">\n";

tng_header( $text['mnuheader'], $flags );
$tng_url = $_SERVER['REQUEST_URI'];
$tng_login = $tngdomain."login.php";
$tng_contact = $tngdomain."suggest.php";
$tng_register = $tngdomain. "newacctform.php";

/** home page content text ********************************************************* */
$c1_notloggedin1 = "<strong>Welcome.</strong><br />Explore the genealogy of the Upadhyaya, Travadi and Trivedi families. Choose one of the eight family members below. Select <strong>More</strong> to visit that card’s earliest known person.";
$c2_notloggedin = "You will be able to see some genealogy data but all details of living individuals will be blocked.<br />
Do login to see all data and photos.<br />If you think you are part of our genealogy project, please do <a href=\"$tng_register\"><strong>Request Access </strong></a>
or <a href='/contact-us/'><b>Contact Me</b></strong></a> for more details";

$a_welcome = " Explore one of the eight family members below. Select More to visit that their earliest known ancestor.
If you have any additional information, please share by <a href=\"$tng_contact\">Contacting us.</a>";
$b_general = "We are tracking Descendants of 8 individuals.
<ul>
<li>Click a photo or name to visit that person’s page.</li>
<li>Click the earliest ancestor’s name to see their descendant chart.</li>
<li>Large charts may require scrolling.</li>
</ul>
";

$privacy = "<b>Privacy and Data Protection: </b>
<br/>To protect your data, we have a closed community. Access to information about living individuals requires approval. All changes are reviewed by administrators.";

$c2_loggedin = "<strong>Welcome</strong>xplore the genealogy of the Upadhyaya, Travadi and Trivedi families..<br />
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

<!-- "Home Page" (the text for these messages can be found at near the bottom of text.php -->
<p> </p>

<div class="Logo-for-mobile">
	<?php $topLogo = $tngdomain . "/img/logo_14.png"; ?>
        <a href="<?php echo $tngdomain; ?>"><img src="<?php echo $topLogo; ?>" alt="Logo" class="logo"></a>
        <div class="mobile-top-title">
        Upadhyaya Family & Relatives</div>
        <p class="mobile-top-description">Our Journey Through Time</p>
	    <div class="search-section">
        
		<p class="search-guidance">For a complete name search, log in. For women, enter the maiden name as the last name.</p>
        <form action="search.php" method="get">
            <table border="0" cellspacing="5" cellpadding="0">
                <tr>
                    <td><span class="normal"><?php echo $text['mnufirstname']; ?>:</span><input type="text" name="myfirstname" size="14"></td>
                    <td><?php echo $text['mnulastname']; ?>:<input type="text" name="mylastname" size="14"></td>
				</tr>
				<tr>
                    <td><input type="hidden" name="mybool" value="AND" /><input type="hidden" name="offset" value="0" /><input type="submit" name="search" value="<?php echo $text['mnusearch']; ?>" /></td>
                </tr>
            </table>
        </form>
    </div>	
</div>






<!------------Welcome 1 - dv1------------------------------------->
	<div class = "welcomeText_1">
		<?php	
		/*** Current user message ***************************************************/
		if( $currentuser ) {		
			echo "<p><strong>Welcome ". $currentuserdesc. "</strong>". $a_welcome. "</p>"
			;
		} else {
		echo $c1_notloggedin1;
		echo "<p> You are not logged in. Please <a href=\"$tng_login\"><strong>Log in</strong></a> or <a href=\"$tng_register\"><strong>Request Access </strong></a> for a new account.</p>";
		}
		?>			
	</div>





<!-- Ancestors =====================================-->
<!-- Person 1A =====================================-->

<section class="family-charts">
  <h2 id="family-charts-title"style="text-align: center; padding-top: 10px; ">Explore our elders</h2>
  <br />
  

  <ul class="family-chart-list">
    <li>
	<!--person 1---->	
		<div class="ancestor-card">
			<a href="<?php echo $personAncestor1; ?>">
				<img class="ancestor_image" src="<?php echo $imageAncestor1; ?>" alt="">
				<span class="ancestor">Jatashanker Juthabhai Upadhyaya</span>
			</a>
			<details class="ancestor-details">
				<summary><span class="more-label">More</span><span class="less-label">Less</span></summary>
				<p>Earliest known Ancestor is <a href="<?php echo $ancestorAncestor1; ?>">Popatbhai Upadhyaya</a></p>
			</details>
		</div>
    </li>
<!--person 2---->
    <li>
    	<div class="ancestor-card">
			<a href="<?php echo $personAncestor2; ?>">
				<img class="ancestor_image" src="<?php echo $imageAncestor2; ?>" alt="">
				<span class="ancestor">Rambhaben Vireshwar Vyas
				
			</span>
			</a>
			
			<details class="ancestor-details">
				<summary><span class="more-label">More</span><span class="less-label">Less</span></summary>
				<p>Earliest known Ancestor is <a href="<?php echo $ancestorAncestor2; ?>">Vireshwar Vyas</a></p>
			</details>
		</div>
    </li>
    
	<li>
    <!--person 3---->	 
		<div class="ancestor-card">
			<a href="<?php echo $personAncestor3; ?>">
				<img class="ancestor_image" src="<?php echo $imageAncestor3; ?>" alt="">
				<span class="ancestor">Pranshanker Bhawanishanker Joshi
				</span>
			</a>
			<details class="ancestor-details">
				<summary><span class="more-label">More</span><span class="less-label">Less</span></summary>
				<p>is father-in-law of <a href="<?php echo $personAncestor1; ?>">Jatashanker Juthabhai Upadhyaya</a></p>
			</details>
		</div>
    </li>
	<li>
    <!--person 4---->	 
		<div class="ancestor-card">
			<a href="<?php echo $personAncestor4; ?>">
				<img class="ancestor_image" src="<?php echo $imageAncestor4; ?>" alt="">
				<span class="ancestor">Dulerai Tribhovan Pandya
				</span>
			</a>
			<details class="ancestor-details">
				<summary><span class="more-label">More</span><span class="less-label">Less</span></summary>
				<p>Earliest known Ancestor is <a href="<?php echo $ancestorAncestor4; ?>">Trikamji Pandya</a></p>
			</details>
		</div>
    </li>
	<li>
    <!--person 5---->	 
		<div class="ancestor-card">
			<a href="<?php echo $personAncestor5; ?>">
				<img class="ancestor_image" src="<?php echo $imageAncestor5; ?>" alt="">
				<span class="ancestor">Karsanji Dahyabhai Travadi
				</span>
			</a>
			<details class="ancestor-details">
				<summary><span class="more-label">More</span><span class="less-label">Less</span></summary>
				<p>Earliest known Ancestor is <a href="<?php echo $ancestorAncestor5; ?>">Vithalji Travadi</a></p>
			</details>
		</div>
    </li>
	<li>
    <!--person 6---->	 
		<div class="ancestor-card">
			<a href="<?php echo $personAncestor6; ?>">
				<img class="ancestor_image" src="<?php echo $imageAncestor6; ?>" alt="">
				<span class="ancestor">Dhankunver Shivshanker Trivedi

				</span>
			</a>
			<details class="ancestor-details">
				<summary><span class="more-label">More</span><span class="less-label">Less</span></summary>
				<p>Earliest known Ancestor is <a href="<?php echo $ancestorAncestor6; ?>">Ajramer Trivedi</a></p>
			</details>
		</div>
    </li>
	<li>
    <!--person 7---->	 
		<div class="ancestor-card">
			<a href="<?php echo $personAncestor7; ?>">
				<img class="ancestor_image" src="<?php echo $imageAncestor7; ?>" alt="">
				<span class="ancestor">Dahyabhai Ranchhodji Desai

				</span>
			</a>
			<details class="ancestor-details">
				<summary><span class="more-label">More</span><span class="less-label">Less</span></summary>
				<p>Earliest known Ancestor is <a href="<?php echo $ancestorAncestor7; ?>">Saurambhai Dayalji Desai</a></p>
			</details>
		</div>
    </li>
	<li>
    <!--person 8 ---->	 
		<div class="ancestor-card">
			<a href="<?php echo $personAncestor7; ?>">
				<img class="ancestor_image" src="<?php echo $imageAncestor8; ?>" alt="">
				<span class="ancestor">Shantagauri Bhikhabhai Naik

				</span>
			</a>
			<details class="ancestor-details">
				<summary><span class="more-label">More</span><span class="less-label">Less</span></summary>
				<p>Earliest known Ancestor is <a href="<?php echo $ancestorAncestor8; ?>">Lallubhai Naik</a></p>
			</details>
		</div>
    </li>

  </ul>
</section>
<!-------------------------------------------------->
<!-- Add this before your first target div -->
<div class="flex-container">
	
	
	<!------------On This Day - dv2 -------------------------------------->
	<div class = "welcomeText_gone">
		<div class="gone_header">On This Day</div>
		<div><a href="add_ons/y_today_3.php">  More....</a></div>
		<?php include("add_ons/gone2.php"); ?>		
	</div>

	<!--------------add useful links dv2 ---------------------------------------->
	<div class="welcomeText_1">
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
			echo "<li><a href=\"newacctform.php\">Request Access</a></li>\n";
		}
		echo "<li><a href=\"add_ons/y_today_3.php\">Yesterday - Today - Tomorrow</a></li>\n"; 
		echo "<li><a href=\"anniversaries.php\">Anniversaries</a></li>\n";
		echo "<li><a href=\"add_ons/search-names.php\">Quick Search</a></li>\n";
		echo "<li><a href=\"calendar.php\">Calendar</a></li>\n";
				echo "<li><a href=\"statistics.php\">{$text['mnustatistics']}</a></li>\n";
		echo "<li><a href=\"suggest.php\">Contact Us</a></li>\n";
		?>
		</ul>
	</div>
	
	<!-- --- Random Photo - dv5 ------------------------------------------ -->
	<div class="welcomeText_1 random-photo" >		
		<div>
		<?php include("randomphoto.php"); ?>
		</div>
	</div>

	<!-- -------------Top Surnames dv6------------------------------------------------->
	<div class="top_surnames">
		<span class="header">Top Surnames</span>
		<?php 
		include_once($rootpath."/add_ons/surnames-top10.php");
		?>
		<a href="surnames-all.php"><?php echo "Search All Surnames" ?></a>
	</div>
</div>

	<!------------Privacy-------------------------------------->
	<div class = "welcomeText_1" style="margin-bottom:">
		<p><?php echo ""; //$b_general; ?></p>
		<p><?php echo $privacy; ?> </p>
	</div>



<?php
tng_footer( "" );
?>