<meta name="viewport" content="width=device-width, initial-scale=1.0"> 

<?php
$cms['tngpath'] = "../";
include( "../tng_begin.php");
include ( "../config.php" );
if( !$cms['support'] )
	$cms['tngpath'] = "../";

$title = "Yesterday-Today-Tomorrow";

$logstring = "<a href=\"$path\">". $title. "</a>";
writelog($logstring);
preparebookmark($logstring);

$flags['noicons'] = true;
tng_header( "Yesterday-Today-Tomorrow", $flags ); 

$db = mysqli_connect($database_host, $database_username, $database_password, $database_name); 

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
	   ( DATE_FORMAT(birthdatetr, '%m-%d') IN (
			DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY), '%m-%d'), 
			DATE_FORMAT(CURDATE(), '%m-%d'), 
			DATE_FORMAT(DATE_ADD(CURDATE(), INTERVAL 1 DAY), '%m-%d')
			)
)
	OR
	( DATE_FORMAT(deathdatetr, '%m-%d') IN (
			DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY), '%m-%d'), 
			DATE_FORMAT(CURDATE(), '%m-%d'), 
			DATE_FORMAT(DATE_ADD(CURDATE(), INTERVAL 1 DAY), '%m-%d')
			)
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
	   h.living as living1,
	   h.sex as sex1,
		h.birthdate as birthdat1,
		h.birthdatetr,
		h.deathdate,
		h.deathdatetr,
       w.personid AS personid2,
       w.firstname AS firstname2,
       w.lastname AS lastname2,
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
# WHERE  Month(f.marrdatetr) = MONTH(ADDDATE(now(), INTERVAL 3 month))
  WHERE  DATE(CONCAT(YEAR(CURDATE()), RIGHT(f.marrdatetr, 6)))
          BETWEEN 
              DATE_SUB(CURDATE(), INTERVAL 10 DAY)
          AND
              DATE_ADD(CURDATE(), INTERVAL 10 DAY)     
ORDER  BY Day(f.marrdatetr)
";
$result3 = $db3->query($sql3);
 	    $rows3 = array();
        while ($row3 = $result3->fetch_assoc()) {
            $rows3[] = $row3;
        }

/******************************************************************************************** */
$NewArray = array_merge($rows, $rows3); // combined Array to include marr anni
//var_dump($NewArray);
?>

<link rel="stylesheet" type="text/css" href="<?php echo $tngdomain. '/css/TngHomePage.css' ; ?>">

<p>
<div class="article-text">
	<h1 class="article-title">yesterday TODAY tomorrow</h1>
</p>
<div class="info-bar">
<b>Under construction<br><i>
To help us evaluate this software I have increased the date range to 10 days before & 10 Days after, Today.</i></b>
</div>
<p>Birth, Death and Marriage events for Yesterday, Today and Tomorrow.<br><b>
<?php 
if (!$currentuser) 		

echo "<a class='btn-detail' href='../login.php'>Log In </a>required to view all data.";
?>
</p>
<table class="born-article-table" >
    
    <th class="born-article-table " style="width: 100px; background-color: #EDEDED; text-align: center;"></th>    
	<th class="born-article-table " style="background-color: #EDEDED; text-align: center;">Event</th>
    <th  class="born-article-table" style="background-color: #EDEDED;text-align: center;">Birth Date</th>
	<th  class="born-article-table" style="background-color: #EDEDED;text-align: center;">Marr Date</th>
    <th  class="born-article-table" style="background-color: #EDEDED; text-align: center;">Years</th>
	<th  class="born-article-table" style="background-color: #EDEDED;text-align: center;">Death Date</th>
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

		$yesterdayMd = date('m-d', strtotime('-1 day'));
		$todayMd = date('m-d');
		$tomorrowMd = date('m-d', strtotime('+1 day'));
		$birthMd = substr($birthevent['birthdatetr'], -5);
		$deathMd = substr($birthevent['deathdatetr'], -5);
		$marrDateOrig = $birthevent['marrdatetr'];
		$marrDate = $marrDateOrig ? date('Y') . '-' . substr($marrDateOrig, 5) : '';
		$marrTimestamp = $marrDate ? strtotime($marrDate) : false;
		$marrStart = strtotime('-10 days');
		$marrEnd = strtotime('+10 days');

		$birthIsSelected = $birthMd && in_array($birthMd, [$yesterdayMd, $todayMd, $tomorrowMd]);
		$deathIsSelected = $deathMd && in_array($deathMd, [$yesterdayMd, $todayMd, $tomorrowMd]);
		$marrIsSelected = $marrTimestamp !== false && $marrTimestamp >= $marrStart && $marrTimestamp <= $marrEnd;

		$event = "";
		$eventClass = "";
		$bornClass = "";
		$deathClass = "";
		$marrClass = "";
		$eventBirthday = "";
		$eventDeathday = "";
		$eventMarrday = "";
		$eventYears = "";
		$eventDeathYears = "";

		if ($birthIsSelected) {
			$event = "BIRTH";
			$bornClass = 'born-highlight';
			$eventClass = $bornClass;
			$eventBirthday = $birthevent['birthdate'];
			$eventDeathday = $birthevent['deathdate'];
			$eventYears = $birthevent['BirthAge'];
			$eventDeathYears = $birthevent['DeathAge'];
		} elseif ($deathIsSelected) {
			$event = "DEATH";
			$deathClass = 'death-highlight';
			$eventClass = $deathClass;
			$eventBirthday = $birthevent['birthdate'];
			$eventDeathday = $birthevent['deathdate'];
			$eventYears = $birthevent['BirthAge'];
			$eventDeathYears = $birthevent['DeathAge'];
		} elseif ($marrIsSelected) {
			$event = "MARRIAGE";
			$marrClass = 'marr-highlight';
			$eventClass = $marrClass;
			$eventMarrday = $birthevent['marrdate'];
			$eventYears = $birthevent['MarrYears'] ?? ($marrDateOrig ? (date('Y') - date('Y', strtotime($marrDateOrig))) : '');
		}

	if (!$currentuser && $birthevent['living'] == "1") {
		$eventBirthday = "";		
	}
	if (!$currentuser && $birthevent['living2'] == "1") {
		$eventMarrday = "";		
	}


?>


        <tr>
            <td class="born-article-table" ><a href="<?php echo $tngdomain; ?>getperson.php?personID=<?php echo $birthevent['personid'];?>&tree=?>">
				<?php
				foreach($personIds as $personId):
					$person = $personIndex[$personId]; 
				?>
				<img src="<?php echo $person['thumbPath']; ?>" class='profile-image' style="width: 80px; padding: 5px"; />
				<div>
					<a href="<?php echo "../" ?>getperson.php?personID=<?php echo $personId;?>&tree=?>">
					<?php echo $person['firstname'] . " "; ?><?php echo $person['lastname']; ?>
				</a>
				</div>
			<?php endforeach; ?>
			</td>
        <!--event -->    
			<td class="born-article-table <?php echo $eventClass; ?>" ><?php echo $event; ?>
			</td>
        <!--Birth date--->
			<td class="born-article-table <?php echo $bornClass; ?>" style="text-align: center;"><?php echo $eventBirthday; ?>
	   		</td>
		<!--Marr date--->
			<td class="born-article-table <?php echo $marrClass; ?>" style="text-align: center;"><?php echo $eventMarrday; ?>
	   		</td>
		<!---- Years ------->	
		<td class="born-article-table " style="text-align: center;"><?php echo $eventYears; ?>
		</td>
		<!---Death Date -------->
        <td class="born-article-table <?php echo $deathClass; ?>" style="text-align: center;"><?php echo $eventDeathday; ?>
		</td>
		<!---Age at Death  -------->
		<td class="born-article-table" style="text-align: center;"><?php echo $eventDeathYears; ?>
		</td>
			

        </tr>

<?php 

endforeach; 

?>


</table>

<div
<p class="center"><a class="btn-detail" href="../index.php">Back to Home Page</a></p>


<?php
tng_footer( "" );
?>