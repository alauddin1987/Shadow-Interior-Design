<?php
foreach($_GET AS $key => $value) {
	${$key} = $value;
} 
foreach($_POST AS $key => $value) {
	${$key} = $value;
} 
include ("../settings.php");

$db=mysql_connect(HOST,DB_USER,DB_PASS) or die("<b>MySQL Error:</b> Unable to connect to database please check that you have provided the correct <li>Database Login username<li>Database Login Password");	//Connect to database or give error if failed
$link = mysql_select_db(DATABASE,$db)or die("<b>MySQL Error:</b> Unable to select database please check that you have provided the correct <li>Database name");
mysql_query('SET CHARACTER SET utf8');
if($action=="showpoll" && $id!=""){
	$mpi=mysql_query("SELECT * FROM ".POLL_PREFIX."cust");
	$col=mysql_fetch_array($mpi);
	$pc=mysql_query("SELECT * FROM ".POLL_PREFIX."quiz WHERE tm='$id'");
	if(mysql_num_rows($pc)==1){
		$now=mysql_fetch_array($pc);
		echo "<form onsubmit=\"javascript: return false;\">
		<table width=\"$col[pw]\"  style='border:$col[boc] 2px solid;'  align='right' cellpadding=0 cellspacing=0 bgcolor=\"$col[bbc]\">
		<TR bgcolor=\"$col[hlc]\" height=\"25\"><TD style='padding:4px;font-size:$col[hls]px;color:$col[ttc];' valign=middle><B>$now[title]</B></TD></TR><TR height=10><td><img src='images/space.gif' height=1 width=1></td></TR>";
		$nx=mysql_query("SELECT * FROM ".POLL_PREFIX."answer WHERE tm='$id'");
		while($row=mysql_fetch_array($nx)){
			echo "<TR height=\"25\"><td style='padding:2px; color:$col[btc]; text-align:left;' valign=top><input type=radio name=note value=\"$row[qid]\" onclick=\"begen($row[qid]);\"> $row[answer]</td></TR>";
		}
		echo "<input type=hidden name=\"option\" id=\"option\" value=\"\">";
		echo "<TR height=\"25\"><TD align=\"center\"><input type=\"submit\" onclick=\"javascript:fetch($id);\" style='color:$col[buc]' value=".GIVE_VOTE."><BR><BR><a href=\"#showr\" onclick=\"javascript:result($id);\"><font size='2' color=\"$col[btc]\">".SEE_RESULT."</a></font></TD></TR><TR height=10><td><img src='images/space.gif' height=1 width=1></td></TR></Table><BR><table border=0 cellspacing=0 width=\"$col[pw]\"></table>";
		echo "</form>";
	}else{
		echo "<table border=0 cellspacing=0 width=\"$col[pw]\"><TR height=\"25\"><td width='100%' style='padding:2px;font:10px verdana, tahoma; color:#330000; text-align:center;' valign=top>This poll has been deleted.</td></TR></table>";
	}
}
if($action=="post_result" && $id!=""){
	$ip=getenv(remote_addr);
	$ip=rand(1,1000);
	$option=trim($option);
	$mpi=mysql_query("SELECT * FROM ".POLL_PREFIX."cust");
	$col=mysql_fetch_array($mpi);
	$pc=mysql_query("SELECT * FROM ".POLL_PREFIX."quiz WHERE tm='$id'");
	if(mysql_num_rows($pc)==1){
	$now=mysql_fetch_array($pc);
	echo "<table width=\"$col[pw]\" style='border:$col[boc] 1px solid;' cellpadding=0 cellspacing=0 bgcolor=\"$col[bbc]\"><TR bgcolor=\"$col[hlc]\" height=\"25\"><TD style='padding:4px;font-size:$col[hls]px;color:$col[ttc];' valign=middle><B>$now[title]</B></TD></TR><TR height=10><td><img src='images/space.gif' height=1 width=1></td></TR>";
	$prog=mysql_query("SELECT * FROM ".POLL_PREFIX."result WHERE tm='$id' AND ip='$ip'");
	if(mysql_num_rows($prog)>0){
		echo "<TR height=\"25\"><td style='padding:2px;font:$col[bts]px verdana, tahoma; color:$col[btc]; text-align:left;' valign=top><b>You have already voted</b></td></TR>";
	}else{
	if($option!=""){
		$ins=mysql_query("INSERT INTO ".POLL_PREFIX."result SET point='$option',ip='$ip', tm='$id'");
	}else{
		echo "<TR height=\"25\"><td style='padding:2px;font:$col[bts]px verdana, tahoma; color:$col[btc]; text-align:left;' valign=top><b>Please select an option.</b></td></TR>";
	}
}
$nx=mysql_query("SELECT * FROM ".POLL_PREFIX."answer WHERE tm='$id'");
$total_results=mysql_query("SELECT * FROM ".POLL_PREFIX."result WHERE tm='$id'");
$total_re=mysql_num_rows($total_results);
while($row=mysql_fetch_array($nx)){
$opt=$row[qid];
$prong=mysql_query("SELECT * FROM ".POLL_PREFIX."result WHERE tm='$id' AND point='$row[qid]'");
$tse=mysql_num_rows($prong);
$result[$opt]=$tse;
if($total_re>0){
$percentage=round(($tse/$total_re)*100,2);
}else{
$percentage=0;
}
$wt=100-$percentage;
if($percentage==0){
$tdw=1;
}else{
$tdw=$percentage;
}
echo "<TR height=\"18\"><td style='padding:2px;font:$col[bts]px verdana, tahoma; color:$col[btc]; text-align:left;' valign=top>$row[answer]</td></TR>";
echo "<TR height=\"18\"><td style=\"padding-left:2px;\"><table width=\"80%\" align=left cellspacing=0 cellpadding=0><tr height=\"10\"><td bgcolor=\"$col[hlc]\" width=\"$tdw%\"><img src=\"images/spacer.gif\" width=\"0\" height=\"1\"></td><td width=\"$wt\"  style=\"font:$col[bts]px verdana, tahoma; color:$col[btc]; text-align:left;\"><img src=\"images/spacer.gif\" width=\"1\" height=\"1\">$percentage%</td></tr></table></td></TR>";
echo "<tr height=\"10\"><td width=100%><img src=\"images/spacer.gif\" width=\"1\" height=\"1\"></td></tr>";
}
echo "<tr height=\"5\"><td width=100%><img src=\"images/spacer.gif\" width=\"1\" height=\"1\"></td></tr>";

echo "<TR height=\"18\"><td style='padding:2px;font:$col[bts]px verdana, tahoma; color:$col[btc]; text-align:left;' valign=top>Total Votes: $total_re</td></TR>";
echo "<TR height=10><td><img src='images/space.gif' height=1 width=1></td></TR></Table><BR><table border=0 cellspacing=0 width=\"$col[pw]\"></table>";
}
}
if($action=="see_result" && $id!=""){
$option=trim($option);
$mpi=mysql_query("SELECT * FROM ".POLL_PREFIX."cust");
$col=mysql_fetch_array($mpi);
$pc=mysql_query("SELECT * FROM ".POLL_PREFIX."quiz WHERE tm='$id'");
if(mysql_num_rows($pc)==1){
$now=mysql_fetch_array($pc);
echo "<table width=\"$col[pw]\" style='border:$col[boc] 1px solid;' cellpadding=0 cellspacing=0 bgcolor=\"$col[bbc]\"><TR bgcolor=\"$col[hlc]\" height=\"25\"><TD style='padding:4px;font-size:$col[hls]px;color:$col[ttc];' valign=middle><B>$now[title]</B></TD></TR><TR height=10><td><img src='images/space.gif' height=1 width=1></td></TR>";
$nx=mysql_query("SELECT * FROM ".POLL_PREFIX."answer WHERE tm='$id'");
$total_results=mysql_query("SELECT * FROM ".POLL_PREFIX."result WHERE tm='$id'");
$total_re=mysql_num_rows($total_results);
while($row=mysql_fetch_array($nx)){
$opt=$row[qid];
$prong=mysql_query("SELECT * FROM ".POLL_PREFIX."result WHERE tm='$id' AND point='$row[qid]'");
$tse=mysql_num_rows($prong);
$result[$opt]=$tse;
if($total_re>0){
$percentage=round(($tse/$total_re)*100,2);
}else{
$percentage=0;
}
if($percentage==0){
$tdw=1;
}else{
$tdw=$percentage;
}
$wt=100-$percentage;
echo "<TR height=\"18\"><td style='padding:2px;font:$col[bts]px verdana, tahoma; color:$col[btc]; text-align:left;' valign=top>$row[answer]</td></TR>";
echo "<TR height=\"18\"><td style=\"padding-left:2px;\">
<table width=\"80%\" align=left cellspacing=0 cellpadding=0><tr height=\"10\"><td bgcolor=\"#003366\" width=\"$tdw%\"><img src=\"images/spacer.gif\" width=\"0\" height=\"1\"></td><td width=\"$wt\" style=\"font:$col[bts]px verdana, tahoma; color:$col[btc]; text-align:left;\"><img src=\"images/spacer.gif\" width=\"1\" height=\"1\">".Common::convertToBanglaNumber($percentage)."%</td></tr></table></td></TR>";
echo "<tr height=\"10\"><td width=100%><img src=\"images/spacer.gif\" width=\"1\" height=\"1\"></td></tr>";
}
echo "<tr height=\"5\"><td width=100%><img src=\"images/spacer.gif\" width=\"1\" height=\"1\"></td></tr>";
echo "<TR height=\"18\"><td style='padding:2px;font:$col[bts]px verdana, tahoma; color:$col[btc]; text-align:left;' valign=top>".TOTAL_VOTE.": ".Common::convertToBanglaNumber($total_re)."</td></TR>";
echo "<TR height=10><td><img src='images/space.gif' height=1 width=1></td></TR></Table><BR><table border=0 cellspacing=0 width=\"$col[pw]\"></table>";
}
}
?>