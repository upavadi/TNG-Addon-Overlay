<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">

<?php

/************ Girnar Gujarati ******* */
$cms['tngpath'] = "../";
include( "../tng_begin.php");
if( !$cms['support'] )
	$cms['tngpath'] = "../";

$title = "Girnar Brahmins";
$path = $_SERVER['PHP_SELF'];

$logstring = "<a href=\"$path\">". $title. "</a>";
writelog($logstring);
preparebookmark($logstring);
var_dump($logstring);

$flags['noicons'] = true;
tng_header( "Girnar Gujju", $flags ); 
?>

<p>
<div class="article-text">
	<h1 class="article-title"> Girnar Brahmins</h1>
The Girnar Brahmins get their name from the town of Girinagar, now Junagadh, where they lived before the arrival of the Audichya Brahmin.
</p>
<p>
  Another interpretation of their name is that it was acquired on the fact that they lived on the foothills of the Girnar hills. The community is said to have originated in the Himalayas, and settled in the Girnar hills, which is considered as sacred by both the Hindus and Jains of Saurashtra. They are now found mainly in the districts of Junagadh, Jamnagar and Kutch. The Girnara are a Gujarati speaking community.   
</p>
<p>
In present day, the Girnara have five sub-groups, the Madhavpura, Chorwadia, Ajakia, Panai and Bardai. These subgroups are named after the villages where they first settled. For example, Madhavpur and Chorwad are situated near Junagadhand Ajaka near Porbander.
All these groups are of equal status. The community is further divided into gotras, the main ones being the Bharadwaj, Kashyap, Kauchchas, Kaurvas, Maundas, Saudamas, Kaushas, Krishnatri, Sandilya, Vats, Bhaginas, Vashsist and Gargwa.    
</p>
<p>
Like other Hindu communities, they are endogamous and practice clan exogamy.</b>
</p>
<i>Excerpt from wikipedia Girnara Brahmin</i>
</div>
<div>
<p class="center"><a class="btn-detail" href="../articles/articles-list.php">Back to Articles Index</a></p>
<?php tng_footer( "" ); ?>

