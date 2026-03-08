 <meta name="viewport" content="width=device-width, initial-scale=1.0"> 

<link rel="stylesheet" type="text/css" href="<?php echo $tngdomain. '/css/TngHomePage.css' ; ?>">

<?php
$cms['tngpath'] = "../";
include( "../tng_begin.php");
include ( "../config.php" );
if( !$cms['support'] )
	$cms['tngpath'] = "../";

$title = "Name Pending";

$logstring = "<a href=\"$path\">". $title. "</a>";
writelog($logstring);
preparebookmark($logstring);

$flags['noicons'] = true;
tng_header( "Events - Pending", $flags ); 


$db = mysqli_connect($database_host, $database_username, $database_password, $database_name); 
$sql = "SELECT
       h.firstname         AS firstname1,
       h.lastname          AS lastname1,
       h.living,
       h.sex,
       h.birthdate         AS birthdate,
       h.birthdatetr       AS birthdatetr3,
       h.deathdate,
       h.deathdatetr       AS deathdatetr4,
       w.personid          AS personid2,
       w.firstname         AS firstname2,
       w.lastname          AS lastname2,
       w.birthdate         AS birthdate2,
       w.birthdatetr       AS birthdatetr2,
       w.deathdate         AS deathdate2,
       w.deathdatetr       AS deathdatetr2,
       f.familyID,
       f.marrdate          AS marrdate,
       f.marrdatetr        AS marrdatetr,
       f.marrplace,
       f.private,
       f.divdate,
       Year(Now()) - Year(f.marrdatetr) AS Years
    FROM   {$families_table} as f
    LEFT JOIN {$people_table} AS h
              ON f.husband = h.personid
    LEFT JOIN {$people_table} AS w
              ON f.wife = w.personid

    WHERE
       (
           DATE_FORMAT(h.birthdatetr, '%m-%d') IN (
                DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY), '%m-%d'), 
                DATE_FORMAT(CURDATE(), '%m-%d'), 
                DATE_FORMAT(DATE_ADD(CURDATE(), INTERVAL 1 DAY), '%m-%d')
            )
        )
      OR
       (
           DATE_FORMAT(h.deathdatetr, '%m-%d') IN (
                DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY), '%m-%d'), 
                DATE_FORMAT(CURDATE(), '%m-%d'), 
                DATE_FORMAT(DATE_ADD(CURDATE(), INTERVAL 1 DAY), '%m-%d')
            )
        )
      OR
       (
           DATE_FORMAT(f.marrdatetr, '%m-%d') IN (
                DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY), '%m-%d'), 
                DATE_FORMAT(CURDATE(), '%m-%d'), 
                DATE_FORMAT(DATE_ADD(CURDATE(), INTERVAL 1 DAY), '%m-%d')
            )
        )
    
";

// include individuals who are not spouses in any family
$sql .= "
UNION
SELECT
       p.firstname AS firstname1,
       p.lastname AS lastname1,
       p.living,
       p.sex,
       p.birthdate AS birthdate3,
       p.birthdatetr AS birthdatetr3,
       p.deathdate,
       p.deathdatetr AS deathdatetr4,
       NULL AS personid2,
       NULL AS firstname2,
       NULL AS lastname2,
       NULL AS birthdate2,
       NULL AS birthdatetr2,
       NULL AS deathdate2,
       NULL AS deathdatetr2,
       NULL AS familyID,
       NULL AS marrdate,
       NULL AS marrdatetr,
       NULL AS marrplace,
       NULL AS private,
       NULL AS divdate,
       NULL AS Years
FROM {$people_table} AS p
LEFT JOIN {$families_table} AS f1 ON p.personid = f1.husband
LEFT JOIN {$families_table} AS f2 ON p.personid = f2.wife
WHERE f1.familyID IS NULL AND f2.familyID IS NULL
  AND (
        DATE_FORMAT(p.birthdatetr, '%m-%d') IN (
            DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY), '%m-%d'),
            DATE_FORMAT(CURDATE(), '%m-%d'),
            DATE_FORMAT(DATE_ADD(CURDATE(), INTERVAL 1 DAY), '%m-%d')
        )
     OR DATE_FORMAT(p.deathdatetr, '%m-%d') IN (
            DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY), '%m-%d'),
            DATE_FORMAT(CURDATE(), '%m-%d'),
            DATE_FORMAT(DATE_ADD(CURDATE(), INTERVAL 1 DAY), '%m-%d')
        )
    )";
	$result = $db->query($sql);
	    $rows = array();
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row; 
        }
/*************END SQL *************************** */
?>

<p>
<div class="article-text">
	<h1 class="article-title">yesterday TODAY tomorrow</h1>
</p>
<p>
<b>Under construction</b>
<p>LogIn required to view all data</p>
</p>
<!--------- Table header ---------------->
<table class="born-article-table" >
    
    <th class="born-article-table " style="width: 100px; background-color: #EDEDED; text-align: center;"></th>    
	<th class="born-article-table " style="background-color: #EDEDED; text-align: center;">Event</th>
    <th  class="born-article-table" style="background-color: #EDEDED;text-align: center;">Date</th>
    <th  class="born-article-table" style="background-color: #EDEDED; text-align: center;">Years</th>
	<th  class="born-article-table" style="background-color: #EDEDED;text-align: center;">Death Date</th>
	<th class="born-article-table" style="background-color: #EDEDED; text-align: center;">Age at Death</th>

<?php
/*********For loop ***************/
// helper to check whether a datetr value falls in the y/t/t window
function inWindow($datetr) {
    if (!$datetr || $datetr === '0000-00-00') return false;
    $md = substr($datetr,5,5); // MM-DD
    $check = [
        date('m-d', strtotime('-1 day')),
        date('m-d'),
        date('m-d', strtotime('+1 day'))
    ];
    return in_array($md, $check, true);
}

var_dump($rows);
foreach ($rows as $row):
    // determine event type and associated date
    $event = '';
    $eventDate = '';
    $years = '';

echo ($row['firstname1']. " ". $row['birthdatetr3']). "<br/>";
    if (inWindow($row['birthdatetr3'])) {
        $event = 'BIRTH';
        $eventDate = $row['birthdatetr3'];
    } elseif (inWindow($row['deathdatetr4'])) {
        $event = 'DEATH';
        $eventDate = $row['deathdatetr4'];
    } elseif (inWindow($row['marrdatetr'])) {
        $event = 'MARRIAGE';
        $eventDate = $row['marrdatetr'];
        $years = $row['Years'];
    }
?>
<tr>
    <td class="born-article-table"><?php echo htmlspecialchars($row['firstname1']); ?></td>
    <td class="born-article-table"><?php echo $event; ?></td>
    <td class="born-article-table"><?php echo $eventDate; ?></td>
    <td class="born-article-table"><?php echo $years; ?></td>
    <td class="born-article-table"><?php echo htmlspecialchars($row['deathdate']); ?></td>
    <td class="born-article-table"><?php // age at death could be computed here if needed ?></td>
</tr>
<?php endforeach;

?>
</table>
<!----------------FOOTER ----------------->
<div>
<p class="center"><a class="btn-detail" href="../articles/articles-list.php">Back to Articles Index</a></p>
</div>
<?php 
tng_footer( "" ); 

/*********** HOLD **********************
  husband's information
    if ($birthday['firstname1'] || $birthday['lastname1']) {
        echo $birthday['firstname1'] . " " . $birthday['lastname1'] .
             " birthdate=" . $birthday['birthdate'] . "<br>";
        echo $birthday['firstname1'] . " " . $birthday['lastname1'] .
             " deathdate=" . $birthday['deathdate'] . "<br>";
    }
    // wife's information
    if ($birthday['firstname2'] || $birthday['lastname2']) {
        echo $birthday['firstname2'] . " " . $birthday['lastname2'] .
             " birthdate=" . $birthday['birthdate2'] . "<br>";
        echo $birthday['firstname2'] . " " . $birthday['lastname2'] .
             " deathdate=" . $birthday['deathdate2'] . "<br>";
    }
    // marriage date
    echo "Marr Date = " . $birthday['marrdate'] . "<br>";
***************/
