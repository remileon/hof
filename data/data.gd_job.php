<?php
include_once(DATA_JOB);
?>
<div style="margin:15px">
<h4>岼匍(Job)</h4>
<ul>
<li><a href="#100">媾平</a></li>
<ul>
<li><a href="#101">司社寮平</a></li>

<ul>
<li><a href="#111">司社噴忖嘱</a></li>
<li><a href="#112">司社楠平</a></li>
</ul>

<li><a href="#102">髄媾平</a></li>

<ul>
<li><a href="#121">亙僮髄徴</a></li>
<li><a href="#122">僻僮州平</a></li>
</ul>

<li><a href="#103">徴溺癡</a></li>

<ul>
<li><a href="#131">徴州平</a></li>
<li><a href="#132">州釆玲宀</a></li>
</ul>

</ul>

<li><a href="#200">臨弗</a></li>
<ul>
<li><a href="#201">宝平</a></li>
<ul>
<li><a href="#211">寄徴擬弗</a></li>
<li><a href="#212">臨劑</a></li>
</ul>
<li><a href="#202">孰蚕弗</a></li>
<ul>
<li><a href="#221">徴霜孰蚕弗</a></li>
<li><a href="#222">徴寮</a></li>
</ul>
<li><a href="#203">棒痩隈弗</a></li>
<ul>
<li><a href="#231">帚宝弗</a></li>
<li><a href="#232">舒痩</a></li>
</ul>
</ul>

<li><a href="#300">珍弗</a></li>
<ul>
<li><a href="#301">麼縮</a></li>
<ul>
<li><a href="#311">縮司</a></li>
<li><a href="#312">舞聞</a></li>
</ul>
<li><a href="#302">蟻続卅</a></li>
<ul>
<li><a href="#321">徭隼便擦宀</a></li>
<li><a href="#322">伏痩支註宀</a></li>
</ul>
</ul>

<li><a href="#400">壮繁</a></li>
<ul>
<li><a href="#401">舞符返</a></li>
<ul>
<li><a href="#411">粧似返</a></li>
<li><a href="#412">符姫宀</a></li>
</ul>
<li><a href="#402">儕舗弗</a></li>
<ul>
<li><a href="#421">舗藍</a></li>
<li><a href="#422">義竒</a></li>
</ul>
<li><a href="#403">缶人</a></li>
<ul>
<li><a href="#431">圧姫宀</a></li>
<li><a href="#432">欠佩宀</a></li>
</ul>
</ul>
</ul>
<h4>Variety</h4>
<table cellspacing="0" style="width:740px">
<?php
$job	= array(
// ここでしか必要無いので 職データには書きません。
100 => "媾平狼児云岼匍<br />好契薦膿。",
101 => "媾平狼互雫岼匍<br />厚互雫議好契。",
102 => "媾平狼互雫岼匍<br />廨岼減夭好似議岼匍。<br />參聯復徭失悶薦議圭塀瞥慧膿薦室嬬。<br /><a href=\"?manual#sacrier\">Sacrier議好似</a>",
103 => "媾平狼互雫岼匍<br />近函斤返議徴薦��掲屎由吭吶貧議媾平。",
111 => "媾平狼恷互雫岼匍<br />厚互雫議契囮式指鹸嬬薦。",
112 => "媾平狼恷互雫岼匍<br />念朔喝傑式週詰斤圭好契議媾平。",
121 => "媾平狼恷互雫岼匍<br />厚互議僮楚厚互議彬墾。",
122 => "媾平狼恷互雫岼匍<br />簾僮好似。",
131 => "媾平狼恷互雫岼匍<br />麗尖式徴隈惹姥議媾平。",
132 => "媾平狼恷互雫岼匍<br />涙篇斤圭契囮議好似式痩試陣魁議媾平。",
200 => "隈弗狼児云岼匍。<br />好似薦樋徽辛聞喘膿薦議徴隈。",
201 => "隈弗狼互雫岼匍。<br />辛參聞喘厚紗膿寄議徴隈。",
202 => "隈弗狼互雫岼匍。<br />辛參雑継扮寂栖孰蚕膿薦議孰蚕舗。",
203 => "隈弗狼互雫岼匍。<br />週詰斤返議嬬薦��崙恬秋分。<br />聞蕎。",
211 => "隈弗狼恷互雫岼匍。<br />辛參聞喘恷膿寄議徴隈。",
212 => "隈弗狼恷互雫岼匍。<br />秒海陣魁議補竃徴隈。",
221 => "隈弗狼恷互雫岼匍。<br />辛參雑継扮寂栖孰蚕厚謹厚膿薦議孰蚕舗。",
222 => "隈弗狼恷互雫岼匍。<br />廨廣噐斤汽峪孰蚕舗議絹廁膿晒。",
231 => "隈弗狼恷互雫岼匍。<br />厚謹議減中徴隈��厚宴楯議蕎。",
232 => "隈弗狼恷互雫岼匍。<br />孰蚕厚膿寄議蘭痩��啜嗤鵬寂近函斤圭來凋議徴隈。",
300 => "珍弗狼児云岼匍。<br />指鹸厘圭議HP、SP。",
301 => "珍弗狼互雫岼匍。<br />戻互厘圭議嬬薦峙。",
302 => "珍弗狼互雫岼匍。<br />醤嗤匯乂蒙歩議屶址嬬薦。",
311 => "珍弗狼恷互雫岼匍。<br />厚膿議指鹸嬬薦旺嬬校鹸試錦嗔。",
312 => "珍弗狼恷互雫岼匍。<br />孰蚕爺順議伏麗逸廁嵶粗式恬媾。",
321 => "珍弗狼恷互雫岼匍。<br />厚膿議屶址嬬薦。",
322 => "珍弗狼恷互雫岼匍。<br />廣嶷好似來徴隈��斤孰蚕舗議篤撒嬬薦熟膿。",
400 => "壮繁児云岼匍。<br />啜嗤彭音氏瓜斤圭念寮唹�豕長セ�室嬬。",
401 => "壮繁互雫岼匍。<br />辛序佩膿薦議好似。",
402 => "壮繁互雫岼匍。<br />厚酔議孰蚕式秒海膿晒孰蚕舗。",
403 => "壮繁互雫岼匍。<br />鋲噐聞喘蕎議岼匍。",
411 => "壮繁恷互雫岼匍。<br />膿薦議謹肝麗尖好似。",
412 => "壮繁恷互雫岼匍。<br />膿薦議朔電汽悶泣姫嬬薦。",
421 => "壮繁恷互雫岼匍。<br />厚酔議孰蚕式秒海膿晒孰蚕舗。",
422 => "壮繁恷互雫岼匍。<br />秒海喘厭徨好似斤返旺嬬繍斤返耕協廖。",
431 => "壮繁恷互雫岼匍。<br />汽悶麗尖姫彬��音辛瓜隠擦。",
432 => "壮繁恷互雫岼匍。<br />熟膿議堀業戻幅嬬薦。",
);
$JobSkill	= array(
// ここでしか必要無いので 職データには書きません。
100 => array(1001,3110,3120),
101 => array(1012,1023,1019),
102 => array(1100,1114,1118),
103 => array(1020,2090,3215),
111 => array(3201,3114,3124),
112 => array(1031,1027,1026),
121 => array(2058,3206,1122),
122 => array(2033,2034),
131 => array(1030,1038,1029),
132 => array(3216,3115,1028),
200 => array(1002,2011,3011),
201 => array(2001,2024,2015),
202 => array(3020,2500,2501),
203 => array(2030,2050,2460),
211 => array(2046,2048,2047),
212 => array(2044,2045,2061),
221 => array(2505,2506,2507),
222 => array(3275,3313,3423),
231 => array(2064,3202,2072),
232 => array(2035,2467,2062),
300 => array(3000,3101,2100),
301 => array(2101,3220,2481),
302 => array(3050,3055,3060),
311 => array(3042,3404,3006),
312 => array(3104,2482,2483),
321 => array(2059,3136,3137),
322 => array(2063,3311,2103),
400 => array(2300,2301,2302),
401 => array(2305,2306,2307),
402 => array(2405,2406,3300),
403 => array(1200,1207,1204),
411 => array(2313,2315,2318),
412 => array(2311,2317,2312),
421 => array(2411,2412,2413),
422 => array(1245,1246),
431 => array(1221,1222,1223),
432 => array(3138,1224,1225),
);
include(DATA_SKILL);
foreach($job as $No => $exp) {
	$flag	= $flag ^ 1;
	$css	= $flag?' class="td6"':' style="padding:3px;"';
	$JobData	= LoadJobData($No);
	print("<tr>\n");
	print('<td'.$css.' valign="top"><a name="#'.$No.'"></a><span class="bold">');
	print($JobData["name_male"]);
	if($JobData["name_male"] !== $JobData["name_female"])
		print("<br />(".$JobData["name_female"].")");
	print('</span></td>'."\n");
	print("<td$css>");
	print('<img src="'.IMG_CHAR.$JobData["img_male"].'" />');
	print('<img src="'.IMG_CHAR.$JobData["img_female"].'" />');
	print("</td>");
	print("<td$css>$exp");
	print("</td>");
	print("<tr><td$css colspan=\"3\"><div style=\"margin-left:30px\">");
	$equip	= "廾姥 : ";
	foreach($JobData["equip"] as $item){
		$equip	.= $item.", "; 
	}
	print(substr($equip,0,-2));
	print("</div></td></tr>\n");
	print("<tr><td$css colspan=\"3\"><div style=\"padding-left:30px\">\n");
	foreach($JobSkill["$No"] as $SkillNo) {
		$skill	= LoadSkillData($SkillNo);
		ShowSkillDetail($skill);
		print("<br />\n");
	}
	print("</div></td></tr>");
	print("</tr>\n");
}/*
<tr>
<td><span class="bold">Warrior</span></td>
<td><img src="<?=IMG_CHAR?>mon_079.gif" /><img src="<?=IMG_CHAR?>mon_080r.gif" /></td>
</tr>
<tr><td colspan="2"></td></tr>*/
?>
</table>