<?php
include_once(DATA_JOB);
?>
<div style="margin:15px">
<h4>职业(Job)</h4>
<ul>
<li><a href="#100">战士</a></li>
<ul>
<li><a href="#101">皇家卫士</a></li>

<ul>
<li><a href="#111">皇家十字军</a></li>
<li><a href="#112">皇家骑士</a></li>
</ul>

<li><a href="#102">狂战士</a></li>

<ul>
<li><a href="#121">鲜血狂魔</a></li>
<li><a href="#122">嗜血剑士</a></li>
</ul>

<li><a href="#103">魔女狩</a></li>

<ul>
<li><a href="#131">魔剑士</a></li>
<li><a href="#132">剑刃舞者</a></li>
</ul>

</ul>

<li><a href="#200">巫师</a></li>
<ul>
<li><a href="#201">术士</a></li>
<ul>
<li><a href="#211">大魔导师</a></li>
<li><a href="#212">巫妖</a></li>
</ul>
<li><a href="#202">召唤师</a></li>
<ul>
<li><a href="#221">魔龙召唤师</a></li>
<li><a href="#222">魔卫</a></li>
</ul>
<li><a href="#203">死灵法师</a></li>
<ul>
<li><a href="#231">咒术师</a></li>
<li><a href="#232">邪灵</a></li>
</ul>
</ul>

<li><a href="#300">牧师</a></li>
<ul>
<li><a href="#301">主教</a></li>
<ul>
<li><a href="#311">教皇</a></li>
<li><a href="#312">神使</a></li>
</ul>
<li><a href="#302">德鲁伊</a></li>
<ul>
<li><a href="#321">自然守护者</a></li>
<li><a href="#322">生灵毁灭者</a></li>
</ul>
</ul>

<li><a href="#400">猎人</a></li>
<ul>
<li><a href="#401">神射手</a></li>
<ul>
<li><a href="#411">狙击手</a></li>
<li><a href="#412">射杀者</a></li>
</ul>
<li><a href="#402">驯兽师</a></li>
<ul>
<li><a href="#421">兽王</a></li>
<li><a href="#422">盗贼</a></li>
</ul>
<li><a href="#403">刺客</a></li>
<ul>
<li><a href="#431">暗杀者</a></li>
<li><a href="#432">风行者</a></li>
</ul>
</ul>
</ul>
<h4>Variety</h4>
<table cellspacing="0" style="width:740px">
<?php
$job	= array(
// ここでしか涩妥痰いので 喀デ〖タには今きません。
100 => "战士系基本职业<br />攻防力强。",
101 => "战士系高级职业<br />更高级的攻防。",
102 => "战士系高级职业<br />专职负责攻击的职业。<br />以牺牲自己体力的方式释放强力技能。<br /><a href=\"?manual#sacrier\">Sacrier的攻击</a>",
103 => "战士系高级职业<br />夺取对手的魔力，非正统意义上的战士。",
111 => "战士系最高级职业<br />更高级的防御及回复能力。",
112 => "战士系最高级职业<br />前后冲锋及降低对方攻防的战士。",
121 => "战士系最高级职业<br />更高的血量更高的伤害。",
122 => "战士系最高级职业<br />吸血攻击。",
131 => "战士系最高级职业<br />物理及魔法兼备的战士。",
132 => "战士系最高级职业<br />无视对方防御的攻击及灵活控场的战士。",
200 => "法师系基本职业。<br />攻击力弱但可使用强力的魔法。",
201 => "法师系高级职业。<br />可以使用更加强大的魔法。",
202 => "法师系高级职业。<br />可以花费时间来召唤强力的召唤兽。",
203 => "法师系高级职业。<br />降低对手的能力，制作僵尸。<br />使毒。",
211 => "法师系最高级职业。<br />可以使用最强大的魔法。",
212 => "法师系最高级职业。<br />擅长控场的输出魔法。",
221 => "法师系最高级职业。<br />可以花费时间来召唤更多更强力的召唤兽。",
222 => "法师系最高级职业。<br />专注于对单只召唤兽的辅助强化。",
231 => "法师系最高级职业。<br />更多的负面魔法，更便捷的毒。",
232 => "法师系最高级职业。<br />召唤更强大的亡灵，拥有瞬间夺取对方性命的魔法。",
300 => "牧师系基本职业。<br />回复我方的HP、SP。",
301 => "牧师系高级职业。<br />提高我方的能力值。",
302 => "牧师系高级职业。<br />具有一些特殊的支援能力。",
311 => "牧师系最高级职业。<br />更强的回复能力并能够复活队友。",
312 => "牧师系最高级职业。<br />召唤天界的生物帮助治疗及作战。",
321 => "牧师系最高级职业。<br />更强的支援能力。",
322 => "牧师系最高级职业。<br />注重攻击性魔法，对召唤兽的破坏能力较强。",
400 => "猎人基本职业。<br />拥有着不会被对方前卫影响的攻击技能。",
401 => "猎人高级职业。<br />可进行强力的攻击。",
402 => "猎人高级职业。<br />更快的召唤及擅长强化召唤兽。",
403 => "猎人高级职业。<br />善于使用毒的职业。",
411 => "猎人最高级职业。<br />强力的多次物理攻击。",
412 => "猎人最高级职业。<br />强力的后排单体点杀能力。",
421 => "猎人最高级职业。<br />更快的召唤及擅长强化召唤兽。",
422 => "猎人最高级职业。<br />擅长用鞭子攻击对手并能将对手固定住。",
431 => "猎人最高级职业。<br />单体物理杀伤，不可被保护。",
432 => "猎人最高级职业。<br />较强的速度提升能力。",
);
$JobSkill	= array(
// ここでしか涩妥痰いので 喀デ〖タには今きません。
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
	$equip	= "装备 : ";
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