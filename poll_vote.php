<?php
$vote = $_REQUEST['vote'];

//get content of textfile
$filename = "poll_result.txt";
$content = file($filename);

//put content in array
$array = explode("||", $content[0]);
$buy = $array[0];
$sell = $array[1];
$hold = $array[2];

if ($vote == 0) {
  $buy = $buy + 1;
}
if ($vote == 1) {
  $sell = $sell + 1;
}
if ($vote == 2) {
  $hold = $hold + 1;
}

//insert votes to txt file
$insertvote = $buy."||".$sell."||".$hold
$fp = fopen($filename,"w");
fputs($fp,$insertvote);
fclose($fp);
?>

<h2>Result:</h2>
<table>
<tr>
<td>Buy:</td>
<td><img src=""
width='<?php echo(100*round($buy/($sell+$buy+$hold),3)); ?>'
height='20'>
<?php echo(100*round($buy/($sell+$buy+$hold),3)); ?>%
</td>
</tr>
<tr>
<td>Sell:</td>
<td><img src=""
width='<?php echo(100*round($sell/($sell+$buy+$hold),3)); ?>'
height='20'>
<?php echo(100*round($sell/($sell+$buy+$hold),3)); ?>%
</td>
</tr>
<tr>
<td>Hold:</td>
<td><img src=""
width='<?php echo(100*round($hold/($hold+$buy+$sell),3)); ?>'
height='20'>
<?php echo(100*round($hold/($hold+$buy+$sell),3)); ?>%
</td>
</tr>
</table>