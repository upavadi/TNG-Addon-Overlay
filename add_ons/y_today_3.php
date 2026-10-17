<meta name="viewport" content="width=device-width, initial-scale=1.0"> 

<?php
$cms['tngpath'] = "../";
include( "../tng_begin.php");
include ( "../config.php" );
if( !$cms['support'] )
	$cms['tngpath'] = "../";

$title = "Family events around today";

$logstring = "<a href=\"$path\">". $title. "</a>";
writelog($logstring);
preparebookmark($logstring);

$flags['noicons'] = true;
tng_header( "Family events around today", $flags ); 

$db = mysqli_connect($database_host, $database_username, $database_password, $database_name); 

$less10days = date('d-M-Y', strtotime('-10 days'));
$add10days = date('d-M-Y', strtotime('+10 days'));
$anniversaryDates = array();
$rangeStart = strtotime('-10 days');
$rangeEnd = strtotime('+10 days');
for ($eventDate = $rangeStart; $eventDate <= $rangeEnd; $eventDate = strtotime('+1 day', $eventDate)) {
	$anniversaryDates[] = date('m-d', $eventDate);
}
$anniversaryDateList = "'" . implode("','", $anniversaryDates) . "'";

/*****************Birth and Death ******************************************* */
$sql = "SELECT
			personid,
			firstname,
			lastname,
			gedcom,
			sex,
			living,
			birthdate,
			birthdatetr,
			deathdate,
			deathdatetr,
			FLOOR(DATEDIFF(CURDATE(), birthdatetr)) AS BirthAge,
			FLOOR(DATEDIFF(CURDATE(), birthdatetr)/365.25) AS BirthAge,
			FLOOR(DATEDIFF(deathdatetr, birthdatetr)/365.25) AS DeathAge,
			FLOOR(DATEDIFF(deathdatetr, birthdatetr)/365.25) AS DeathYears
	FROM $people_table
	
	WHERE
    (
        DATE_FORMAT(birthdatetr, '%m-%d') IN ($anniversaryDateList)
        OR DATE_FORMAT(deathdatetr, '%m-%d') IN ($anniversaryDateList)
    )
ORDER BY FIELD(
    DATE_FORMAT(
        CASE
            WHEN DATE_FORMAT(birthdatetr, '%m-%d') IN ($anniversaryDateList)
                THEN birthdatetr
            ELSE deathdatetr
        END,
        '%m-%d'
    ),
    $anniversaryDateList
)
	";
	$result = $db->query($sql);
	    $rows = array();
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }

/***********************marr annivesaries**************************************************** */
$db3 = mysqli_connect($database_host, $database_username, $database_password, $database_name); 
$sql3 = "SELECT
h.personid AS personid1,
       h.firstname AS firstname1,
       h.lastname AS lastname1,
	   h.gedcom AS gedcom1,
	   h.living as living1,
	   h.sex as sex1,
		h.birthdate as birthdat1,
		h.birthdatetr,
		h.deathdate,
		h.deathdatetr,
       w.personid AS personid2,
       w.firstname AS firstname2,
       w.lastname AS lastname2,
	   w.gedcom AS gedcom2,
	   h.birthdate as birthdate2,
	   w.living as living2,
	   w.sex as sex2,
	   f.familyID,
       f.marrdate AS marrdate,
	    f.marrdatetr AS marrdatetr,
       f.marrplace,
       f.private,
       f.divdate,
       Year(Now()) - Year(f.marrdatetr) AS MarrYears
FROM   {$families_table} as f
    LEFT JOIN {$people_table} AS h
              ON f.husband = h.personid
       LEFT JOIN {$people_table} AS w
              ON f.wife = w.personid
  WHERE DATE_FORMAT(f.marrdatetr, '%m-%d') IN ($anniversaryDateList)
ORDER  BY Day(f.marrdatetr)
";
$result3 = $db3->query($sql3);
 	    $rows3 = array();
        while ($row3 = $result3->fetch_assoc()) {
            $rows3[] = $row3;
        }

/******************************************************************************************** */
$NewArray = array_merge($rows, $rows3); // combined Array to include marr anni

?>

<link rel="stylesheet" type="text/css" href="<?php echo $tngdomain. '/css/TngHomePage.css' ; ?>">

<p>
<div class="article-text">
	<h1 class="article-title">Family events around today</h1>
</p>
<div class="info-bar">
<p>Births, marriages and deaths from <?php echo $less10days; ?> to <?php echo $add10days; ?> <br><b>

<?php 
if (!$currentuser) 		

echo "Living-person details are private. <a class='btn-detail' href='../login.php'>Log In </a>to view all available information.";
?>
</p>
</div>
<table class="born-article-table" >
    
    <th class="born-article-table " style="width: 240px; background-color: #EDEDED; text-align: center;">Person / couple</th>    
	<th class="born-article-table " style="background-color: #EDEDED; text-align: center;">Event</th>
    <th  class="born-article-table" style="background-color: #EDEDED; text-align: center;">Years ago</th>
	<th class="born-article-table" style="background-color: #EDEDED; text-align: center;">Age at Death</th>
	
    
<?php
/*********For loop  ******************************************************* */
$personIndex = array();
$suffixList = array('', '1', '2');
foreach ($NewArray as $event):
	foreach ($suffixList as $suffix):
		$personId = $event["personid{$suffix}"];
		if (!$personId) continue;
		$thumbPath = '';
		if(!$thumbPath && $event["sex{$suffix}"] == 'M') $thumbPath = $tngdomain. "img/male.jpg" ;
		if(!$thumbPath && $event["sex{$suffix}"] == 'F') $thumbPath = $tngdomain. "img/female.jpg" ;
		$living = "{$event["living{$suffix}"]}";
		$maskName = false;
		if (!$currentuser && $living == "1") {
			$maskName = true;
		}
		$personIndex[$personId] = array(
			'gedcom' => $event["gedcom{$suffix}"],
			'sex' => $event["sex{$suffix}"],
			'living' => $living,
			'firstname' => $maskName ? "Living" : $event["firstname{$suffix}"],
			'lastname' => $maskName ? "" :  $event["lastname{$suffix}"],
			'thumbPath' => $thumbPath
		);
	endforeach;
endforeach;
// echo "<pre>"; var_dump($personIndex); echo "</pre>";

foreach ($NewArray as $birthevent): 
		$personIds = array();
		if ($birthevent['personid']) {
        	array_push($personIds, $birthevent['personid']);
		}
		if ($birthevent['personid1']) {
			array_push($personIds, $birthevent['personid1']);
		}
		
		if ($birthevent['personid2']) {
			array_push($personIds,$birthevent['personid2']);
		}

		
		/*** Get Media ******************** */		
	$personList = "(" . join(',', array_map(function ($id) {
		return "'" . $id . "'";
		},
		$personIds
	)) . ")";
$sql2 = "
SELECT *
FROM   $media_table as ml
    LEFT JOIN $medialinks_table AS m
              ON ml.mediaID = m.mediaID
where personID IN {$personList} AND m.defphoto = 1";

        $result = $db->query($sql2); //var_dump($result);

        while ($row = $result->fetch_assoc()) {
			$thumbPath = Null;
			$personId = $row['personID'];
			$person = $personIndex[$personId];

        	if (isset($row['thumbpath'])) $thumbPath = $tngdomain. "photos/". $row['thumbpath'];
			
			if (!$currentuser && $person['living'] == "1") {
				if ($person['sex'] == "M") {
					$thumbPath = $tngdomain. "img/male.jpg" ;
				
				} else {
				$thumbPath = $tngdomain. "img/female.jpg" ;	
				}
			}

			if (!$thumbPath) {
				if ($birthevent['sex'] == "M") {
					$thumbPath = $tngdomain. "img/male.jpg" ;
				} else {
					$thumbPath = $tngdomain. "img/female.jpg" ;	
				}
			}
			if ($thumbPath) {
				$personIndex[$personId]['thumbPath'] = $thumbPath;
			}
	}

		if ($birthevent['birthdate'] == "") {
			$birthevent['DeathAge'] = "";
			$birthevent['BirthAge'] = "";
		}
		if ($birthevent['deathdate'] == "") {
			$birthevent['DeathYears'] = "";
			$birthevent['DeathAge'] = "";
		}

		$birthMd = $birthevent['birthdatetr'] ? substr($birthevent['birthdatetr'], -5) : '';
		$deathMd = $birthevent['deathdatetr'] ? substr($birthevent['deathdatetr'], -5) : '';
		$marrDateOrig = $birthevent['marrdatetr'];
		$marrMd = $marrDateOrig ? substr($marrDateOrig, -5) : '';

		$birthIsSelected = in_array($birthMd, $anniversaryDates, true);
		$deathIsSelected = in_array($deathMd, $anniversaryDates, true);
		$marrIsSelected = in_array($marrMd, $anniversaryDates, true);

		$event = "";
		$eventClass = "";
		$eventBirthday = "";
		$eventDeathday = "";
		$eventMarrday = "";
		$eventYears = "";
		$eventDeathYears = "";

		if ($birthIsSelected) {
			$event = "BIRTH";
			$eventClass = 'born-highlight';
			$eventBirthday = $birthevent['birthdate'];
			$eventDeathday = $birthevent['deathdate'];
			$eventYears = $birthevent['BirthAge'];
			$eventDeathYears = $birthevent['DeathAge'];
		} elseif ($deathIsSelected) {
			$event = "DEATH";
			$eventClass = 'death-highlight';
			$eventBirthday = $birthevent['birthdate'];
			$eventDeathday = $birthevent['deathdate'];
			$eventYears = $birthevent['BirthAge'];
			$eventDeathYears = $birthevent['DeathAge'];
		} elseif ($marrIsSelected) {
			$event = "MARRIAGE";
			$eventClass = 'marr-highlight';
			$eventMarrday = $birthevent['marrdate'];
			$eventYears = $birthevent['MarrYears'] ?? ($marrDateOrig ? (date('Y') - date('Y', strtotime($marrDateOrig))) : '');
		}

	if (!$currentuser && $birthevent['living'] == "1") {
		$eventBirthday = "";		
	}
	if (!$currentuser && $birthevent['living2'] == "1") {
		$eventMarrday = "";		
	}
	if ($birthIsSelected && $eventBirthday) {
		$event .= " " . $eventBirthday;
	} elseif ($deathIsSelected && $eventDeathday) {
		$event .= " " . $eventDeathday;
	}
	if ($marrIsSelected) {
		$event = $eventMarrday ? "Married " . $eventMarrday : "MARRIAGE";
	}


?>


        <tr>
            <td class="born-article-table">
				<div class="born-person-list">
				<?php
				foreach($personIds as $personId):
					$person = $personIndex[$personId]; 
					$personUrl = $tngdomain . 'getperson.php?personID=' . rawurlencode($personId) . '&tree=' . rawurlencode($person['gedcom']);
				?>
					<a class="born-person-link" href="<?php echo htmlspecialchars($personUrl, ENT_QUOTES, 'UTF-8'); ?>">
						<img src="<?php echo htmlspecialchars($person['thumbPath'], ENT_QUOTES, 'UTF-8'); ?>" class="profile-image" alt="" />
						<span><?php echo htmlspecialchars(trim($person['firstname'] . " " . $person['lastname']), ENT_QUOTES, 'UTF-8'); ?><?php if (!empty($birthevent['deathdate'])) echo " (" . htmlspecialchars('Died '.$birthevent['deathdate'], ENT_QUOTES, 'UTF-8') . ")"; ?></span>
				</a>
			<?php 
		endforeach; ?>
				</div>
			</td>
        <!--event -->    
			<td class="born-article-table <?php echo $eventClass; ?>" ><?php echo $event; ?>
			</td>
		<!---- Years ------->	
		<td class="born-article-table " style="text-align: center;"><?php echo $eventYears; ?>
		</td>
		<!---Age at Death  -------->
		<td class="born-article-table" style="text-align: center;"><?php echo $eventDeathYears; ?>
		</td>
			

        </tr>

<?php 

endforeach; 

?>


</table>

<div>
<p class="center"><a class="btn-detail" href="../index.php">Back to Home Page</a></p>
</div>


<?php
tng_footer( "" );
?>