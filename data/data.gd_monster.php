<?php
/*
	¤É¤Ã¤«¤ª¤«¤·¤¯¤Æ²èÁüÉ½¼¨¤µ¤ì¤Æ¤Ê¤¤¤Î¤ÇÉ¬Í×¤Ê¤é¤ÐÄ¾¤·¤Æ
*/
include_once(DATA_MONSTER);
?>
<div style="margin:0 15px">
<h4>¥â¥ó¥¹¥¿¡¼</h4>
<table class="align-center" style="width:740px" cellspacing="0">
<?php
$List	= array(
1000	=> array("grass","SP¤¬¤¢¤ë¤È¤­¤Ï¡¢Š¤¤¹¥“Ä¤ò¤¿¤Þ¤Ë¤·¤Æ¤¯¤ë³Ì¶È¡£"),
1001	=> array("grass","SP¤¬¤¢¤ë¤È¤­¤Ï¡¢Š¤¤¹¥“Ä¤ò¤¿¤Þ¤Ë¤·¤Æ¤¯¤ë³Ì¶È¡£"),
1002	=> array("grass","ááÁÐ¤ËÑº¤·³ö¤¹¹¥“Ä¤ò¤¹¤ë¡£"),
1003	=> array("grass","¤½¤³¤½¤³¤ÊŠ¤µ¡£"),
1005	=> array("grass","¥ì¥Ù¥ë¤¬µÍ¤¤¤ÈŠ¤¯¸Ð¤¸¤ë¡£"),
1009	=> array("grass","HP¤¬¸ß¤¤¡£"),
1012	=> array("cave","ÖÙég¤òºô¤ó¤ÇÎüÑª¹¥“Ä¤ò¤·¤Æ¤¯¤ë¡£"),
1014	=> array("cave","Ä§·¨¤Ç¹¥“Ä¤·¤Ê¤¤¤Èµ¹¤·¤Ë¤¯¤¤¡£"),
1017	=> array("cave","¶´¿ß¤Î¥Ü¥¹¡£µ¹¤¹¤È°Â¤ËÐÐ¤±¤ë¤è¤¦¤Ë¤Ê¤ë¡£"),
);
$Detail	= "<tr>
<td class=\"td6\">Image</td>
<td class=\"td6\">EXP</td>
<td class=\"td6\">MONEY</td>
<td class=\"td6\">HP</td>
<td class=\"td6\">SP</td>
<td class=\"td6\">STR</td>
<td class=\"td6\">INT</td>
<td class=\"td6\">DEX</td>
<td class=\"td6\">SPD</td>
<td class=\"td6\">LUK</td>
</tr>";
foreach($List as $No => $exp) {
	$monster	= CreateMonster($No);
	$char	= new char($monster);
	print($Detail);
	print("</td><td class=\"td7\">\n");
	//print('<img src="'.IMG_CHAR.$monster["img"].'" />'."\n");
	$char->ShowCharWithLand($exp[0]);
	print("</td><td class=\"td7\">\n");
	print("{$monster[exphold]}\n");
	print("</td><td class=\"td7\">\n");
	print("{$monster[moneyhold]}\n");
	print("</td><td class=\"td7\">\n");
	print("{$monster[maxhp]}\n");
	print("</td><td class=\"td7\">\n");
	print("{$monster[maxsp]}\n");
	print("</td><td class=\"td7\">\n");
	print("{$monster[str]}\n");
	print("</td><td class=\"td7\">\n");
	print("{$monster[int]}\n");
	print("</td><td class=\"td7\">\n");
	print("{$monster[dex]}\n");
	print("</td><td class=\"td7\">\n");
	print("{$monster[spd]}\n");
	print("</td><td class=\"td8\">\n");
	print("{$monster[luk]}\n");
	print("</td></tr>\n");
	print("<tr><td class=\"td7\" colspan=\"11\">\n");
	print("$exp[1]");
	print("</td></tr>\n");
}
?>
</table>
</div>