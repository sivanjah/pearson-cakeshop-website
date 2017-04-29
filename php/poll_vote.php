<?php
	$vote = $_REQUEST['vote'];

	//get content of textfile
	$filename = "../txt/poll_result.txt";
	$content = file($filename);

	//put content in array
	$array = explode("||", $content[0]);
	$birthdaycake = $array[0];
	$weddingcake = $array[1];
	$cupcake = $array[2];

	if ($vote == 0) {
		$birthdaycake = $birthdaycake + 1;
	}
	
	if ($vote == 1) {
		$weddingcake = $weddingcake + 1;
	}

	if ($vote == 2) {
		$cupcake = $cupcake + 1;
	}

	//insert votes to txt file
	$insertvote = $birthdaycake."||".$weddingcake."||".$cupcake;
	$fp = fopen($filename,"w");
	fputs($fp,$insertvote);
	fclose($fp);
?>

<h2>Result:</h2>
	<table>
	<tr>
	<td>Birthday Cake</td>
	<td>:</td>
	<td>
		<img src="../../images/poll/poll.gif"
		width='<?php echo(100*round($birthdaycake/($birthdaycake+$weddingcake+$cupcake),3)); ?>'
		height='20'>
		<?php echo(100*round($birthdaycake/($birthdaycake+$weddingcake+$cupcake),3)); ?>%
	</td>
	</tr>
	<tr>
	<td>Wedding Cake</td>
	<td>:</td>
	<td>
	<img src="poll.gif"
		width='<?php echo(100*round($weddingcake/($weddingcake+$birthdaycake+$cupcake),3)); ?>'
		height='20'>
	<?php echo(100*round($weddingcake/($weddingcake+$birthdaycake+$cupcake),3)); ?>%
	</td>
	</tr>
	<tr>
	<td>Cup Cake</td>
	<td>:</td>
	<td>
	<img src="poll.gif"
		width='<?php echo(100*round($cupcake/($birthdaycake+$weddingcake+$cupcake),3)); ?>'
		height='20'>
	<?php echo(100*round($cupcake/($birthdaycake+$weddingcake+$cupcake),3)); ?>%
	</td>
	</tr>
	</table>