<?php
/*
	どっかおかしくて画像表示されてないので必要ならば直して
*/
include_once(DATA_MONSTER);
?>
<div style="margin:0 15px">
<h4>モンスター</h4>
<table class="align-center" style="width:740px" cellspacing="0">
<?php
$List	= array(
1000	=> array("grass","SPがあるときは、��い好�弔鬚燭泙砲靴討�る殻業。"),
1001	=> array("grass","SPがあるときは、��い好�弔鬚燭泙砲靴討�る殻業。"),
1002	=> array("grass","瘁双に兀し竃す好�弔鬚垢襦�"),
1003	=> array("grass","そこそこな��さ。"),
1005	=> array("grass","レベルが詰いと��く湖じる。"),
1009	=> array("grass","HPが互い。"),
1012	=> array("cave","嶼�gを柵んで簾僮好�弔鬚靴討�る。"),
1014	=> array("cave","徴隈で好�弔靴覆い筏垢靴砲�い。"),
1017	=> array("cave","挟厨のボス。宜すと安に佩けるようになる。"),
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