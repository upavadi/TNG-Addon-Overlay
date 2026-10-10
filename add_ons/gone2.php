<?php
include ( "../config.php" );

$db = mysqli_connect($database_host, $database_username, $database_password, $database_name); 
$sql = "SELECT
			personid,
			firstname,
			lastname,
			gedcom,
			sex,
			birthdate,
			birthdatetr,
			deathdate,
			deathdatetr,
			FLOOR(DATEDIFF(CURDATE(), birthdatetr)/365.25) AS BirthAge,
			FLOOR(DATEDIFF(deathdatetr, birthdatetr)/365.25) AS DeathAge,
			IFNULL(FLOOR(DATEDIFF(CURDATE(), deathdatetr)/365.25), '') AS DeathYears
	FROM $people_table
	
	WHERE
	   ( DATE_FORMAT(birthdatetr, '%m-%d') IN (
			DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY), '%m-%d'), 
			DATE_FORMAT(CURDATE(), '%m-%d'), 
			DATE_FORMAT(DATE_ADD(CURDATE(), INTERVAL 1 DAY), '%m-%d')
			)
		AND
	living = 0)
	OR
	( DATE_FORMAT(deathdatetr, '%m-%d') IN (
			DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY), '%m-%d'), 
			DATE_FORMAT(CURDATE(), '%m-%d'), 
			DATE_FORMAT(DATE_ADD(CURDATE(), INTERVAL 1 DAY), '%m-%d')
			)
		AND
	living = 0)
	";
	$result = $db->query($sql);
		$rows = array();
		while ($row = $result->fetch_assoc()) {
			$rows[] = $row; 
		}

		// If SQL didn't return death age/years, compute them in PHP as a fallback
		foreach ($rows as &$r) {
			if ((empty($r['DeathYears']) || $r['DeathYears'] === '') && !empty($r['deathdatetr'])) {
				$dy = (int)substr($r['deathdatetr'], 0, 4);
				$dm = (int)substr($r['deathdatetr'], 5, 2);
				$dd = (int)substr($r['deathdatetr'], 8, 2);
				$cy = (int)date('Y');
				$cm = (int)date('m');
				$cd = (int)date('d');

				$yearsSinceDeath = $cy - $dy;
				if ($cm < $dm || ($cm == $dm && $cd < $dd)) {
					$yearsSinceDeath--;
				}
				$r['DeathYears'] = (string)$yearsSinceDeath;
			}

			if ((empty($r['DeathAge']) || $r['DeathAge'] === '') && !empty($r['birthdatetr']) && !empty($r['deathdatetr'])) {
				$by = (int)substr($r['birthdatetr'], 0, 4);
				$bm = (int)substr($r['birthdatetr'], 5, 2);
				$bd = (int)substr($r['birthdatetr'], 8, 2);

				$dy = (int)substr($r['deathdatetr'], 0, 4);
				$dm = (int)substr($r['deathdatetr'], 5, 2);
				$dd = (int)substr($r['deathdatetr'], 8, 2);

				$ageAtDeath = $dy - $by;
				if ($dm < $bm || ($dm == $bm && $dd < $bd)) {
					$ageAtDeath--;
				}
				$r['DeathAge'] = (string)$ageAtDeath;
			}
		}
		unset($r);
	if (!$rows) { ?>
<span style="font-size:12pt; color: blue;"><br /> There are no events for yesterday, today or tomorrow.</span>
<?php
} else {
?>	<div style="overflow-x:auto;">
<table class="born-article-table" >
    <tbody>
	<th class="born-article-table " style="background-color: #EDEDED; text-align: center;">Name</th>
    <th class="born-article-table" style="background-color: #EDEDED; text-align: center;">Event</th>
	<th class="born-article-table" style="background-color: #EDEDED; text-align: center;">Years ago</th>
	<th class="born-article-table" style="background-color: #EDEDED; text-align: center;">Age at Death</th>
<?php	
$eventDates = array(
	date('m-d', strtotime('-1 day')),
	date('m-d'),
	date('m-d', strtotime('+1 day'))
);
foreach ($rows as $birthday): 
        $personId = $birthday['personid'];
		
$sql2 = "
SELECT *
FROM   $media_table as ml
    LEFT JOIN $medialinks_table AS m
              ON ml.mediaID = m.mediaID
where personID = '{$personId}' AND m.defphoto = 1";

        $result = $db->query($sql2);
		$thumbPath = Null;
        $row = $result->fetch_assoc();
        if (isset($row['thumbpath'])) $thumbPath = $tngdomain. "photos/". $row['thumbpath'];
		if($thumbPath == null && $birthday['sex'] == 'M') $thumbPath = $tngdomain. "img/male.jpg" ;
		if($thumbPath == null && $birthday['sex'] == 'F') $thumbPath = $tngdomain. "img/female.jpg" ;
		if ($birthday['birthdate'] == "")
			{
			$birthday['DeathAge'] = "";
			$birthday['BirthAge'] = "";
			}
		if ($birthday['deathdate'] == "") {
		$birthday['DeathYears'] = "";
		$birthday['DeathAge'] = "";
	}
	/**********/
	$birthmonth = substr($birthday['birthdatetr'], -5, 2);
	$deathmonth = substr($birthday['deathdatetr'], -5, 2);
	$currentmonth = date("m");
	If ($currentmonth == $birthmonth) {
			$bornClass = 'born-highlight';
		} else {
			$bornClass = "";
	}
	If ($currentmonth == $deathmonth) {
			$deathClass = 'death-highlight';
		} else {
			$deathClass = "";
	}
	$deathEvent = !empty($birthday['deathdatetr'])
		&& in_array(date('m-d', strtotime($birthday['deathdatetr'])), $eventDates, true);
	if ($deathEvent) {
		$event = 'DEATH ' . $birthday['deathdate'];
		$eventClass = $deathClass;
		$eventYears = $birthday['DeathYears'];
		$eventDeathAge = $birthday['DeathAge'];
	} else {
		$event = 'BIRTH ' . $birthday['birthdate'];
		$eventClass = $bornClass;
		$eventYears = $birthday['BirthAge'];
		$eventDeathAge = $birthday['DeathAge'];
	}

	?>

        <tr>
            <td class="born-article-table" ><a href="<?php echo $tngdomain; ?>getperson.php?personID=<?php echo $birthday['personid'];?>&tree=<?php echo $birthday['gedcom'];?>">
			<img src="<?php echo $thumbPath; ?>" class='profile-image' style="width: 125x; padding: 5px"; />
			<div>
                <a href="<?php echo $tngdomain; ?>getperson.php?personID=<?php echo $birthday['personid'];?>&tree=<?php echo $birthday['gedcom'];?>">
                    <?php echo $birthday['firstname'] . " "; ?><?php echo $birthday['lastname']; ?>
                </a></div>
            </td>
            <td class="born-article-table <?php echo $eventClass; ?>" style="text-align: center;"><?php echo $event; ?></td>
			<td class="born-article-table" style="text-align: center;"><?php echo $eventYears; ?></td>
            <td class="born-article-table" style="text-align: center;"><?php echo $eventDeathAge; ?></td>
        </tr>


    <?php endforeach; 

?>
</table></div>
<?php
}