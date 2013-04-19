<?php 
/*
	职业性别名
	职业的图像
	可以装备物
	"coe"	=> array(HP系数 ,SP系数),
	"change"	=> array(可以转的职),
*/
function LoadJobData($no) {
	switch($no) {
		case "100":
$job	= array(
"name_male"		=> "战士",
"name_female"	=> "战士",
"img_male"		=> "mon_079.gif",
"img_female"	=> "mon_080r.gif",
"equip"			=> array("剑","双手剑","盾","甲","衣服","长袍","道具"),
"coe"			=> array(3, 0.5),
"change"		=> array(101,102,103),
); break;
		case "101":
$job	= array(
"name_male"		=> "皇家卫士",
"name_female"	=> "皇家卫士",
"img_male"		=> "mon_199r.gif",
"img_female"	=> "mon_234r.gif",
"equip"			=> array("剑","双手剑","盾","甲","衣服","长袍","道具"),
"coe"			=> array(4, 0.7),
"change"		=> array(111,112,113),
); break;
		case "111":
$job	= array(
"name_male"		=> "皇家十字军",
"name_female"	=> "皇家十字军",
"img_male"		=> "mon_111ma.gif",
"img_female"	=> "mon_111fe.gif",
"equip"			=> array("剑","盾","甲","衣服","长袍","道具"),
"coe"			=> array(6, 1),
); break;
		case "112":
$job	= array(
"name_male"		=> "皇家骑士",
"name_female"	=> "皇家骑士",
"img_male"		=> "mon_112ma.gif",
"img_female"	=> "mon_112fe.gif",
"equip"			=> array("剑","双手剑","盾","甲","衣服","长袍","道具"),
"coe"			=> array(5, 1.5),
); break;
		case "102":
$job	= array(
"name_male"		=> "狂战士",
"name_female"	=> "狂战士",
"img_male"		=> "mon_100r.gif",
"img_female"	=> "mon_012.gif",
"equip"			=> array("剑","双手剑","盾","衣服","长袍","道具"),
"coe"			=> array(5.0, 0.2),
"change"		=> array(121,122,123),
); break;
		case "121":
$job	= array(
"name_male"		=> "鲜血狂魔",
"name_female"	=> "鲜血狂魔",
"img_male"		=> "mon_121ma.gif",
"img_female"	=> "mon_121fe.gif",
"equip"			=> array("剑","双手剑","盾","衣服","长袍","道具"),
"coe"			=> array(7, 0.5),
); break;
		case "122":
$job	= array(
"name_male"		=> "嗜血剑士",
"name_female"	=> "嗜血骑士",
"img_male"		=> "mon_122ma.gif",
"img_female"	=> "mon_122fe.gif",
"equip"			=> array("剑","双手剑","盾","甲","衣服","长袍","道具"),
"coe"			=> array(6.5, 0.5),
); break;
		case "103":
$job	= array(
"name_male"		=> "魔女狩",
"name_female"	=> "魔女狩",
"img_male"		=> "mon_150.gif",
"img_female"	=> "mon_234.gif",
"equip"			=> array("剑","匕首","盾","甲","衣服","长袍","道具"),
"coe"			=> array(3.7, 1),
"change"		=> array(131,132,133),
); break;
		case "131":
$job	= array(
"name_male"		=> "魔剑士",
"name_female"	=> "魔剑士",
"img_male"		=> "mon_131ma.gif",
"img_female"	=> "mon_131fe.gif",
"equip"			=> array("剑","书","匕首","盾","衣服","长袍","道具"),
"coe"			=> array(4, 2),
); break;
		case "132":
$job	= array(
"name_male"		=> "剑刃舞者",
"name_female"	=> "剑刃舞者",
"img_male"		=> "mon_132ma.gif",
"img_female"	=> "mon_132fe.gif",
"equip"			=> array("剑","双手剑","匕首","盾","甲","衣服","长袍","道具"),
"coe"			=> array(4.5, 1.5),
); break;
		case "200":
$job	= array(
"name_male"		=> "巫师",
"name_female"	=> "巫师",
"img_male"		=> "mon_106.gif",
"img_female"	=> "mon_018.gif",
"equip"			=> array("魔杖","杖","书","衣服","长袍","道具"),
"coe"			=> array(1.5, 1),
"change"		=> array(201,202,203),
); break;
		case "201":
$job	= array(
"name_male"		=> "术士",
"name_female"	=> "术士",
"img_male"		=> "mon_196z.gif",
"img_female"	=> "mon_246r.gif",
"equip"			=> array("魔杖","杖","书","衣服","长袍","道具"),
"coe"			=> array(2.1, 2),
"change"		=> array(211,212,213),
); break;
		case "211":
$job	= array(
"name_male"		=> "大魔导师",
"name_female"	=> "大魔导师",
"img_male"		=> "mon_211ma.gif",
"img_female"	=> "mon_211fe.gif",
"equip"			=> array("魔杖","杖","书","衣服","长袍","道具"),
"coe"			=> array(2.5, 4),
); break;
		case "212":
$job	= array(
"name_male"		=> "巫妖",
"name_female"	=> "巫妖",
"img_male"		=> "mon_212ma.gif",
"img_female"	=> "mon_212fe.gif",
"equip"			=> array("魔杖","杖","书","衣服","长袍","道具"),
"coe"			=> array(3, 3),
); break;
		case "202":
$job	= array(
"name_male"		=> "召唤师",
"name_female"	=> "召唤师",
"img_male"		=> "mon_196y.gif",
"img_female"	=> "mon_246z.gif",
"equip"			=> array("魔杖","杖","书","长袍","道具"),
"coe"			=> array(1.5, 2.5),
"change"		=> array(221,222,223),
); break;
		case "221":
$job	= array(
"name_male"		=> "魔龙召唤师",
"name_female"	=> "魔龙召唤师",
"img_male"		=> "mon_221ma.gif",
"img_female"	=> "mon_221fe.gif",
"equip"			=> array("魔杖","杖","书","衣服","长袍","道具"),
"coe"			=> array(2, 4),
); break;
		case "222":
$job	= array(
"name_male"		=> "魔卫",
"name_female"	=> "魔卫",
"img_male"		=> "mon_222ma.gif",
"img_female"	=> "mon_222fe.gif",
"equip"			=> array("魔杖","书","衣服","长袍","道具"),
"coe"			=> array(3, 3),
); break;
		case "203":
$job	= array(
"name_male"		=> "死灵法师",
"name_female"	=> "死灵法师",
"img_male"		=> "mon_196x.gif",
"img_female"	=> "mon_246y.gif",
"equip"			=> array("魔杖","杖","书","衣服","长袍","道具"),
"coe"			=> array(2.1, 1.5),
"change"		=> array(231,232,233),
); break;
		case "231":
$job	= array(
"name_male"		=> "咒术师",
"name_female"	=> "咒术师",
"img_male"		=> "mon_231ma.gif",
"img_female"	=> "mon_231fe.gif",
"equip"			=> array("魔杖","杖","书","衣服","长袍","道具"),
"coe"			=> array(3, 2.5),
); break;
		case "232":
$job	= array(
"name_male"		=> "邪灵",
"name_female"	=> "邪灵",
"img_male"		=> "mon_232ma.gif",
"img_female"	=> "mon_232fe.gif",
"equip"			=> array("魔杖","杖","书","衣服","长袍","道具"),
"coe"			=> array(3.5, 2),
); break;
		case "300":
$job	= array(
"name_male"		=> "牧师",
"name_female"	=> "女祭司",
"img_male"		=> "mon_213.gif",
"img_female"	=> "mon_214.gif",
"equip"			=> array("魔杖","书","衣服","长袍","道具"),
"coe"			=> array(2, 0.8),
"change"		=> array(301,302),
); break;
		case "301":
$job	= array(
"name_male"		=> "主教",
"name_female"	=> "主教",
"img_male"		=> "mon_213r.gif",
"img_female"	=> "mon_214r.gif",
"equip"			=> array("魔杖","书","衣服","长袍","道具"),
"coe"			=> array(2.7, 1.4),
"change"		=> array(311,312,313),
); break;
		case "311":
$job	= array(
"name_male"		=> "教皇",
"name_female"	=> "教皇",
"img_male"		=> "mon_311ma.gif",
"img_female"	=> "mon_311fe.gif",
"equip"			=> array("魔杖","书","衣服","长袍","道具"),
"coe"			=> array(3.5, 2.5),
); break;
		case "312":
$job	= array(
"name_male"		=> "神使",
"name_female"	=> "神使",
"img_male"		=> "mon_312ma.gif",
"img_female"	=> "mon_312fe.gif",
"equip"			=> array("魔杖","书","衣服","长袍","道具"),
"coe"			=> array(3, 3),
); break;
		case "302":
$job	= array(
"name_male"		=> " 德鲁伊",
"name_female"	=> " 德鲁伊",
"img_male"		=> "mon_213rz.gif",
"img_female"	=> "mon_214rz.gif",
"equip"			=> array("魔杖","书","衣服","长袍","道具"),
"coe"			=> array(2.5, 1.2),
"change"		=> array(321,322,323),
); break;
		case "321":
$job	= array(
"name_male"		=> "自然守护者",
"name_female"	=> "自然守护者",
"img_male"		=> "mon_321ma.gif",
"img_female"	=> "mon_321fe.gif",
"equip"			=> array("魔杖","书","衣服","长袍","道具"),
"coe"			=> array(4, 1.5),
); break;
		case "322":
$job	= array(
"name_male"		=> "生灵毁灭者",
"name_female"	=> "生灵毁灭者",
"img_male"		=> "mon_322ma.gif",
"img_female"	=> "mon_322fe.gif",
"equip"			=> array("魔杖","匕首","书","衣服","长袍","道具"),
"coe"			=> array(3, 2.5),
); break;
		case "400":
$job	= array(
"name_male"		=> " 猎人",
"name_female"	=> " 猎人",
"img_male"		=> "mon_219rr.gif",
"img_female"	=> "mon_219r.gif",
"equip"			=> array("弓","衣服","长袍","道具"),
"coe"			=> array(2.2, 0.7),
"change"		=> array(401,402,403),
); break;
		case "401":
$job	= array(
"name_male"		=> "神射手",
"name_female"	=> "神射手",
"img_male"		=> "mon_076z.gif",
"img_female"	=> "mon_042z.gif",
"equip"			=> array("弓","衣服","长袍","道具"),
"coe"			=> array(3.0, 0.8),
"change"		=> array(411,412),
); break;
		case "411":
$job	= array(
"name_male"		=> "狙击手",
"name_female"	=> "狙击手",
"img_male"		=> "mon_411ma.gif",
"img_female"	=> "mon_411fe.gif",
"equip"			=> array("弓","衣服","长袍","道具"),
"coe"			=> array(4.5, 1),
); break;
		case "412":
$job	= array(
"name_male"		=> "射杀者",
"name_female"	=> "射杀者",
"img_male"		=> "mon_412ma.gif",
"img_female"	=> "mon_412fe.gif",
"equip"			=> array("弓","衣服","长袍","道具"),
"coe"			=> array(4, 1.5),
); break;
		case "402":
$job	= array(
"name_male"		=> "驯兽师",
"name_female"	=> "驯兽师",
"img_male"		=> "mon_216z.gif",
"img_female"	=> "mon_217z.gif",
"equip"			=> array("弓","鞭","衣服","长袍","道具"),
"coe"			=> array(3.2, 1.0),
"change"		=> array(421,422),
); break;
		case "421":
$job	= array(
"name_male"		=> "兽王",
"name_female"	=> "兽王",
"img_male"		=> "mon_421ma.gif",
"img_female"	=> "mon_421fe.gif",
"equip"			=> array("鞭","衣服","长袍","道具"),
"coe"			=> array(4, 2),
); break;
		case "422":
$job	= array(
"name_male"		=> "盗贼",
"name_female"	=> "盗贼",
"img_male"		=> "mon_422ma.gif",
"img_female"	=> "mon_422fe.gif",
"equip"			=> array("匕首","鞭","衣服","长袍","道具"),
"coe"			=> array(3.5, 1.5),
); break;
		case "403":
$job	= array(
"name_male"		=> "刺客",
"name_female"	=> "刺客",
"img_male"		=> "mon_216y.gif",
"img_female"	=> "mon_217rz.gif",
"equip"			=> array("匕首","弓","甲","衣服","道具"),
"coe"			=> array(3.6, 0.7),
"change"		=> array(431,432),
); break;
		case "431":
$job	= array(
"name_male"		=> "暗杀者",
"name_female"	=> "暗杀者",
"img_male"		=> "mon_431ma.gif",
"img_female"	=> "mon_431fe.gif",
"equip"			=> array("匕首","甲","衣服","道具"),
"coe"			=> array(4, 1.5),
); break;
		case "432":
$job	= array(
"name_male"		=> "风行者",
"name_female"	=> "风行者",
"img_male"		=> "mon_432ma.gif",
"img_female"	=> "mon_432fe.gif",
"equip"			=> array("匕首","弓","衣服","长袍","道具"),
"coe"			=> array(4.5, 1),
); break;
	}
	return $job;
}
?>