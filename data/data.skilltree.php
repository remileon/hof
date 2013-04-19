<?php
function LoadSkillTree($char) {
/*
	Á•µÃ¿ÉÄÜ¤Ê¼¼¤ò·µ¤¹¡£
*/
	// Á•µÃœg¤ß¥¹¥­¥ë¡£
	// array_search() ¤Ç¤Ê¤¯ ¥Ï¥Ã¥·¥å¤òÊ¹¤Ã¤Æš°»ØÅÐ¶¨¤¹¤ë¡£
	// ¤É¤Ã¤Á¤Î„IÀí¤¬ËÙ¤¤¤«¤Ï¡¢Öª¤é¤ó¡£
	$lnd	= array_flip($char->skill);
	$lnd[key($lnd)]++;//ÅäÁÐ¤ÎÏÈî^¤Î‚Ž¤¬"0"¤Ê¤Î¤Ç1¤Ë¤¹¤ë(issetÊ¹¤ï¤º¤Ëtrue¤Ë¤¹¤ë¤¿¤á)
	$list	= array();//¿ÕÅäÁÐ
	//////////////////////////////////// „‡¼¼
	if(	$char->job == 100
	 ||	$char->job == 101
	 ||	$char->job == 102
	 ||	$char->job == 103
	 ||	$char->job == 111
	 ||	$char->job == 112
	 ||	$char->job == 121
	 ||	$char->job == 122
	 ||	$char->job == 131
	 ||	$char->job == 132) {
		if($lnd["1001"])//Bash
			$list[]	= "1003";//DowbleAttack
		if($lnd["1001"])
			$list[]	= "1013";//Stab
		if($lnd["1001"])
			$list[]	= "3110";//Reinforce
		if($lnd["1001"])
			$list[]	= "3120";//FirstAid
		if($lnd["1003"])//DowbleAttack
			$list[]	= "1017";//RagingBlow
		if($lnd["1003"])
			$list[]	= "1011";//WeaponBreak
		if($lnd["1013"])//Stab
			$list[]	= "1014";//FatalStab
		if($lnd["1013"])
			$list[]	= "1016";//ArmorPierce
		if($lnd["3120"])//FirstAid
			$list[]	= "3121";//SelfRecovery
	}
	// RoyalGuard
	if($char->job == 101
	 ||	$char->job == 111
	 ||	$char->job == 112) {
		if($lnd["1003"])//DowbleAttack
			$list[]	= "1012";//ArmorBreak
		if($lnd["1017"]) {//RagingBlow
			$list[]	= "1018";//Indiscriminate
			$list[]	= "1022";//ChargeAttack
		}
		if($lnd["1013"]) {//Stab
			$list[]	= "1015";//KnockBack
			$list[]	= "1023";//Hit&Away
		}
		if($lnd["1016"])//ArmorPierce
			$list[]	= "1019";//PierceRush
		if($lnd["3110"]){ // Reinforce
			$list[]	= "3111";//OverLimit
			$list[]	= "3112";//Deffensive
		}
		if($lnd["3121"]){ // SelfRecovery
			$list[]	= "3122";//HyperRecovery
			$list[]	= "3123";//SelfRegeneration
		}
	}
	// Sacrier
	if($char->job == 102
	 ||	$char->job == 121
	 ||	$char->job == 122) {
		$list[]	= "1100";// ObtainPower
		if($lnd["1100"])// ObtainPower
			$list[]	= "1101";// ObtainSpeed
		if($lnd["1101"])// ObtainSpeed
			$list[]	= "1102";// ObtainMind
		$list[]	= "1113";// Pain
		if($lnd["1113"]) {// Pain
			$list[]	= "1114";// Rush
			$list[]	= "1117";// illness
		}
		if($lnd["1114"]) {// Rush
			$list[]	= "1115";// Ruin
			$list[]	= "1118";// Pressure
		}
		if($lnd["1115"])// Ruin
			$list[]	= "1116";// Punish
		// Rush + illness + ObtainMaind
		if($lnd["1114"] && $lnd["1117"] && $lnd["1102"])
			$list[]	= "1119";// Possession
	}
	// WitchHunt
	if($char->job == 103
	 ||	$char->job == 131
	 ||	$char->job == 132) {
		if($lnd["1003"])//DowbleAttack
			$list[]	= "1020";//ManaBreak
		if($lnd["1020"]) {//ManaBreak
			$list[]	= "1021";//SoulBreak
			$list[]	= "1025";//ManaDivision
		}
		if($lnd["1021"])//SoulBreak
			$list[]	= "1024";//LifeDivision
		// –³ðŒ
		$list[]	= "2090";//EnergyRob
		$list[]	= "3231";//ForceShield(self)
		if($lnd["2090"]) {//EnergyRob
			$list[]	= "2091";//EnergyCollect
			$list[]	= "2110";//ChargeDisturb
			$list[]	= "2111";//ChargeDisturb(all)
		}
		if($lnd["2091"])//EnergyCollect
			$list[]	= "3421";//CircleErase
		if($lnd["3231"]) {//ForceShield(self)
			$list[]	= "3215";//MindBreak
			$list[]	= "3230";//ForceShield
			$list[]	= "3235";//MindBreak
		}
	}
	// »Ê¼ÒÊ®×Ö¾ü
	if($char->job == 111) {
		if($lnd["3122"]) //³¬»Ø¸´
			$list[]	= "3124";//´¹ËÀÕõÔú
		$list[]	= "3201";//ÐÝÕ½ÔöÔ®
		$list[]	= "3114";//Ó­»÷×¼±¸
	}
	// »Ê¼ÒÆïÊ¿
	if($char->job == 112) {
		if($lnd["1011"])//ÆÆ»µÎäÆ÷
			$list[]	= "1033";//³å»µÎäÆ÷
		if($lnd["1012"])//ÆÆ»µ×°±¸
			$list[]	= "1034";//³åÆÆ×°±¸
		if($lnd["1022"])//³å·æ
			$list[]	= "1026";//·ÜÓÂ³å·æ
		if($lnd["1023"])//Ò»»÷ÍÑÀë
			$list[]	= "1027";//Ñà·µ
		if($lnd["1017"])//·ßÅ­Ò»»÷
			$list[]	= "1031";//ºáÉ¨Ç§¾ü
	}
	// ÏÊÑª¿ñÄ§
	if($char->job == 121) {
		if($lnd["1100"] && $lnd["1101"] && $lnd["1102"]) //
			$list[]	= "1120";//±©×ß
		if($lnd["1113"]) //Í´¿à
			$list[]	= "1121";//Å°É±
		if($lnd["1115"]) //»ÙÃð
			$list[]	= "1122";//ÑªÐÈØËÉ±
		if($lnd["1122"]) //ÑªÐÈØËÉ±
			$list[]	= "1123";//·è¿ñÍÀÂ¾
		$list[]	= "2058";//ÑªÆø½çÏÞ
		$list[]	= "3206";//¿ñÅ­
	}
	// ÊÈÑª½£Ê¿
	if($char->job == 122) {
		if($lnd["2033"]) //ÍÌÊ³
			$list[]	= "2034";//ÑªÆøÊÕ¼¯
		$list[]	= "2033";//ÍÌÊ³
	}
	// Ä§½£Ê¿
	if($char->job == 131) {
		if($lnd["1021"]) //ÆÆ»µÁé»ê
			$list[]	= "1029";//Áé»êÔáËÍÇú
		$list[]	= "1030";//¾ÓºÏÕ¶
		$list[]	= "1038";//Ä§·â½£
		if($lnd["1038"]) //Ä§·â½£
			$list[]	= "1039";//ÊÉ»ê½£
		if($lnd["1039"]) //ÊÉ»ê½£
			$list[]	= "1040";//Òô²¨½£
		if($lnd["3421"]) //Ä§·¨ÕóÏû³ý
			$list[]	= "3422";//Ä§·¨ÕóÇå¿Õ
	}
	// ½£ÈÐÎèÕß
	if($char->job == 132) {
		if($lnd["1016"]) //´Ì´©×°±¸
			$list[]	= "1028";//½£Æø
		if($lnd["1013"]) //Í»´Ì
			$list[]	= "1124";//ÎÞÏÞÕ¶
		if($lnd["3110"]) //Ç¿»¯
			$list[]	= "3115";//ÆøÆÇÖ®Á¦
		if($lnd["1028"]) //½£Æø
			$list[]	= "1035";//ÆÆ·ÀÕ¶
		if($lnd["1035"]) //ÆÆ·ÀÕ¶
			$list[]	= "1036";//½£ÈÐ¿ñÎè
		if($lnd["1036"]) //½£ÈÐ¿ñÎè
			$list[]	= "1037";//½£ÈÐ·ç±©
		$list[]	= "3216";//°×ÈÐÕ½
		if($lnd["3216"]) //°×ÈÐÕ½
			$list[]	= "3217";//ÈâÌåÇ¿»¯
	}
	//////////////////////////////////// Ä§·¨Ïµ
	if(	$char->job == 200
	||	$char->job == 201
	||	$char->job == 202
	||	$char->job == 203
	||	$char->job == 211
	||	$char->job == 212
	||	$char->job == 221
	||	$char->job == 222
	||	$char->job == 231
	||	$char->job == 232) {
		$list[]	= "3011";//HiManaRecharge
		if($lnd["1002"])//FireBall
			$list[]	= "2000";//FireStorm
		if($lnd["2000"])//FireStorm
			$list[]	= "2002";//FirePillar
		if($lnd["1002"])//FireBall
			$list[]	= "2010";//IceSpear
		if($lnd["2010"])//IceSpear
			$list[]	= "2011";//IceJavelin
		if($lnd["2011"])//IceSpear
			$list[]	= "2014";//IcePrison
		if($lnd["1002"])//FireBall
			$list[]	= "2020";//ThunderBolt
		if($lnd["2020"])//ThunderBolt
			$list[]	= "2021";//LightningBall
		if($lnd["2021"])//LightningBall
			$list[]	= "2022";//Flash
		if($lnd["2021"])
			$list[]	= "2023";//Paralysis
	}
	// Warlock
	if($char->job == 201
	||	$char->job == 211
	||	$char->job == 212) {
		if($lnd["2000"])//FireStorm
			$list[]	= "2001";//HellFire
		if($lnd["2001"])//HellFire
			$list[]	= "2004";//MeteoStorm
		if($lnd["2002"])
			$list[]	= "2003";//Explosion
		if($lnd["2011"])//IceSpear
			$list[]	= "2012";//Blizzard
		if($lnd["2011"] && $lnd["2014"])//IceSpear + IcePrison
			$list[]	= "2015";//TidalWave
		if($lnd["2021"])//LightningBall
			$list[]	= "2024";//ThunderStorm
		if($lnd["3011"])//HiManaRecharge
			$list[]	= "3012";//LifeConvert
		if($lnd["3012"])//LifeConvert
			$list[]	= "3013";//EnergyExchange
		if($lnd["2000"] && $lnd["2021"])//FireStorm + LightningBall
			$list[]	= "2041";//EarthQuake
		if($lnd["2041"])//EarthQuake
			$list[]	= "2042";//Subsidence
		if($lnd["2011"] && $lnd["2021"])//IceSpear + LightningBall
			$list[]	= "2040";//SandStorm
	}
	// Summoner
	if($char->job == 202
	||	$char->job == 221
	||	$char->job == 222) {
		$list[]	= "3020";//ManaExtend
		$list[]	= "2500";//SummonIfrit
		$list[]	= "2501";//SummonLeviathan
		$list[]	= "2502";//SummonArchAngel
		$list[]	= "2503";//SummonFallenAngel
		$list[]	= "2504";//SummonThor
		if($lnd["3011"])//HiManaRecharge
			$list[]	= "3012";//LifeConvert
		$list[]	= "3410";//MagicCircle
		if($lnd["3410"]) {
			$list[]	= "3411";//DoubleMagicCircle
			$list[]	= "3420";//CircleErace
		}
	}
	// Necromancer
	if($char->job == 203
	||	$char->job == 231
	||	$char->job == 232) {
		$list[]	= "2030";//LifeDrain
		if($lnd["2030"]) {//LifeDrain
			$list[]	= "2031";//LifeSqueeze
			$list[]	= "2050";//VenomBlast
			$list[]	= "3205";//Fear
			$list[]	= "3215";//MindBreak
		}
		if($lnd["2050"])//VenomBlast
			$list[]	= "2051";//PoisonSmog
		/* // ÔO¶¨¤¬º†…g¤¹¤®¤ë
		if($lnd["2031"])//LifeSqueeze
			$list[]	= "2032";//DeathKnell
		*/
		$list[]	= "2460";//RaiseDead(Zombie)
		if($lnd["2460"]) {//RaiseDead(Zombie)
			$list[]	= "2461";// Ghoul
			$list[]	= "2462";// RaiseMummy
		}
		if($lnd["2461"] && $lnd["2462"])// Ghoul + RaiseMummy
			$list[]	= "2055";// SoulRevenge
		if($lnd["2461"])// Ghoul
			$list[]	= "2463";// ZombieControl
		if($lnd["2463"])
			$list[]	= "2057";// SelfMetamorphose
		if($lnd["2462"])// RaiseMummy
			$list[]	= "2464";// GraveYard
		if($lnd["2464"])
			$list[]	= "2056";// ZombieRevival
		// ZombieControl + GraveYard
		if($lnd["2463"] && $lnd["2464"])
			$list[]	= "2465";// Biohazard
	}
	// ´óÄ§µ¼Ê¦
	if($char->job == 211) {
		$list[]	= "3116";//Ä§Á¦ÆõÔ¼
		if($lnd["2024"]) //À×±©
			$list[]	= "2046";//Á¬ËøÉÁµç
		if($lnd["2004"]) //ÔÉÊ¯·ç±©
			$list[]	= "2047";//ÐÇÔÆÔÉÂä
		if($lnd["2011"]) //±ù±êÇ¹
			$list[]	= "2048";//º®±ùÁ¶Óü
		if($lnd["2014"]) //
			$list[]	= "2049";//±ù½á½ç
	}
	// Î×Ñý
	if($char->job == 212) {
		$list[]	= "2069";//Ñ¸À×Ö±»÷
		if($lnd["2069"]) //Ñ¸À×Ö±»÷
			$list[]	= "2070";//Ñ¸À××·»÷
		if($lnd["2070"]) //Ñ¸À××·»÷
			$list[]	= "2071";//µçÁ÷Õðµ´
		if($lnd["2040"]) //É³Ä®·ç±©
			$list[]	= "2044";//ÉñÉ³·ç±©
		if($lnd["2042"]) //³ÁÏÝ
			$list[]	= "2045";//ÄàÊ¯Á÷
		if($lnd["2023"]) //Âé±Ô
			$list[]	= "2061";//À×µçÁ¢³¡
	}
	// Ä§ÁúÕÙ»½Ê¦
	if($char->job == 221) {
		if($lnd["3411"]) //Ë«ÖØÄ§·¨Õó
			$list[]	= "3412";//ÈýÖØÄ§·¨Õó
		$list[]	= "2505";//Ìì¿ÕÁú
		$list[]	= "2506";//ôä´äÁú
		$list[]	= "2507";//¾ÞÑÒÁú
	}
	// Ä§ÎÀ
	if($char->job == 222) {
		$list[]	= "3275";//¿ØÖÆÁ¦Ç¿»¯
		$list[]	= "3313";//Ä§ÊÞÇ¿½¡
		if($lnd["3313"]) //Ä§ÊÞÇ¿½¡
			$list[]	= "3314";//Ä§ÊÞ±©×ß
		if($lnd["3314"]) //Ä§ÊÞ±©×ß
			$list[]	= "3315";//È«Ä§ÊÞÇ¿½¡
		if($lnd["3315"]) //È«Ä§ÊÞÇ¿½¡
			$list[]	= "3316";//È«Ä§ÊÞ±©×ß
		if($lnd["3316"]) //È«Ä§ÊÞ±©×ß
			$list[]	= "3317";//Ä§ÊÞ¸½Éí
		if($lnd["3420"]) //Ä§·¨ÕóÏû³ý
			$list[]	= "3423";//Ä§·¨ÕóÄ¨Ïû
	}
	// ÖäÊõÊ¦
	if($char->job == 231) {
		$list[]	= "3202";//¿¹Ä§½á½ç
		$list[]	= "2064";//Ë¥ÀÏ
		if($lnd["2064"]) //Ë¥ÀÏ
			$list[]	= "2065";//ËÀÍö·ûÖä
		if($lnd["2064"]) //Ë¥ÀÏ
			$list[]	= "2072";//¾Þ´ó»¯
	}
	// Ð°Áé
	if($char->job == 232) {
		$list[]	= "2066";//´ÎÔªµ¶
		if($lnd["2066"]) //´ÎÔªµ¶
			$list[]	= "2067";//Ä§ÈÐ´©´Ì
		if($lnd["2067"]) //Ä§ÈÐ´©´Ì
			$list[]	= "2068";//¿Õ¼äÕ¨ÁÑ
		if($lnd["2003"]) //±¬Õ¨
			$list[]	= "2062";//×Ô±¬
		if($lnd["2465"]) //Éú»¯Î£»ú
			$list[]	= "2467";//Ä¾ÄËÒÁÓÂÊ¿
		if($lnd["2467"]) //Ä¾ÄËÒÁÓÂÊ¿
			$list[]	= "2468";//Ä¾ÄËÒÁÐ¡¶Ó
		if($lnd["2468"]) //Ä¾ÄËÒÁÐ¡¶Ó
			$list[]	= "2469";//Ä¾ÄËÒÁ´ó¾ü
		$list[]	= "2035";//Áé»êÊÕ¸î
	}
	//////////////////////////////////// Ö§Ô®Ïµ
	if(	$char->job == 300
	 ||	$char->job == 301
	 ||	$char->job == 302
	 ||	$char->job == 311
	 ||	$char->job == 312
	 ||	$char->job == 321
	 ||	$char->job == 322) {
		if($lnd["3000"]) {//Healing
			$list[]	= "2100";//Holy
			$list[]	= "3001";//PowerHeal
			$list[]	= "3003";//QuickHeal
		}
		if($lnd["3001"] || $lnd["3003"]) {// Power || QuickHeal
			$list[]	= "3002";//PartyHeal
			$list[]	= "3004";//SmartHeal
			$list[]	= "3030";//Reflesh
		}
		if($lnd["2100"])//Holy
			$list[]	= "2480";//HealRabbit

		if($lnd["3101"])//Blessing
			$list[]	= "3102";//Benediction
	}
	// Bishop
	if($char->job == 301
	 ||	$char->job == 311
	 ||	$char->job == 312) {
		if($lnd["2100"]) {//Holy
			$list[]	= "2101";//HolyBurst
			$list[]	= "3200";//Encourage
			$list[]	= "3210";//Charm
			$list[]	= "3220";//ProtectionField
			$list[]	= "3230";//ForceShield
		}
		if($lnd["2101"])//HolyBurst
			$list[]	= "2102";//GrandCross
		if($lnd["3220"])//ProtectionField
			$list[]	= "3400";//Regeneration
		if($lnd["3230"])//ForceShield
			$list[]	= "3401";//ManaRegen
		if($lnd["2480"])//HealRabbit
			$list[]	= "2481";//AdventAngel

		if($lnd["3102"] && $lnd["3220"] && $lnd["3230"])
			$list[]	= "3103";//Sanctuary
		$list[]	= "3415";//MagicCircle
	}
	// Druid
	if($char->job == 302
	 ||	$char->job == 321
	 ||	$char->job == 322) {
		if($lnd["3004"]) {//SmartHeal
			$list[]	= "3005";//ProgressiveHeal
			$list[]	= "3060";//HolyShield
		}
		if($lnd["3060"]) {
			$list[]	= "3050";//Quick
			$list[]	= "3055";//CastAsist
		}
		$list[]	= "3250";//PowerAsist
		$list[]	= "3255";//MagicAsist
		if($lnd["3250"] or $lnd["3255"])
			$list[]	= "3265";//SpeedAsist
		$list[]	= "3415";//MagicCircle
	}
	// ½Ì»Ê
	if($char->job == 311) {
		if($lnd["3400"]) //³ÖÐø»Ø¸´
			$list[]	= "3402";//³ÖÐøÓúºÏ
		if($lnd["3401"]) //Ä§Á¦³ÖÐø»Ø¸´
			$list[]	= "3403";//Ä§Á¦³ÖÐøÓúºÏ
		if($lnd["3402"] && $lnd["3403"])
			$list[]	= "3404";//Ë«ÖØ³ÖÐøÓúºÏ
		if($lnd["3102"]) //´ó×£¸£
			$list[]	= "3105";//³¬×£¸£
		if($lnd["3001"]) //¸ß¼¶ÖÎÁÆ
			$list[]	= "3007";//³¬¼¶ÖÎÁÆ
		if($lnd["3003"]) //¿ìËÙ»Ø¸´
			$list[]	= "3008";//¿ìËÙÖÎÁÆ
		if($lnd["3002"]) //ÈºÌå»Ø¸´
			$list[]	= "3006";//ÈºÌåÓúºÏ
		$list[]	= "3042";//ËÀÕß×ªÉú
		if($lnd["3042"]) //ËÀÕß×ªÉú
			$list[]	= "3041";//ËÀÕßËÕÉú
	}
	// ÉñÊ¹
	if($char->job == 312) {
		if($lnd["3415"]) //Ä§·¨Õó
			$list[]	= "3416";//Ë«ÖØÄ§·¨Õó
		if($lnd["3103"]) //Ê¥Óò
			$list[]	= "3104";//Éñ½ç½µÁÙ
		if($lnd["2481"]) //ÌìÊ¹½µÁÙ
			$list[]	= "2482";//ÌìÊ¹¾«Áé
		if($lnd["2482"]) //ÌìÊ¹¾«Áé
			$list[]	= "2483";//Éñ½«½µÁÙ
	}
	// ×ÔÈ»ÊØ»¤Õß
	if($char->job == 321) {
		if($lnd["3060"]) {//Ê¥¹â·À»¤
			$list[]	= "3136";//ÉúÃü»¤¶Ü
			$list[]	= "3137";//ÄÜÁ¿»¤¶Ü
		}
		$list[]	= "2059";//Ê÷Áé±ä»¯
		if($lnd["3005"]) //½¥½¥»Ø¸´
			$list[]	= "3009";//½¥½¥ÓúºÏ
		if($lnd["3055"]) //¼Ó¿ìÓ½³ª
			$list[]	= "3056";//³¬¿ìÓ½³ª
		if($lnd["3265"]) //ËÙ¶È¸¨Öú
			$list[]	= "3270";//¹¥»÷¸¨Öú
	}
	// ÉúÁé»ÙÃðÕß
	if($char->job == 322) {
		$list[]	= "2063";//Ò°ÐÔ±ä»¯
		if($lnd["2063"]) //Ò°ÐÔ±ä»¯
			$list[]	= "3311";//Ò°ÊÞ»÷·É
		if($lnd["3311"]) //Ò°ÊÞ»÷·É
			$list[]	= "3312";//Ò°ÊÞÆËÉ±
		if($lnd["2100"]) //Ê¥¹â
			$list[]	= "2103";//»ÙÃð´ò»÷
		if($lnd["2103"]) //»ÙÃð´ò»÷
			$list[]	= "2104";//»ÙÃð³å»÷
	}
	//////////////////////////////////// ¹­Ïµ
	if( $char->job == 400
	||	$char->job == 401
	||	$char->job == 402
	||	$char->job == 403
	||	$char->job == 411
	||	$char->job == 412
	||	$char->job == 421
	||	$char->job == 422
	||	$char->job == 431
	||	$char->job == 432) {
		$list[]	= "2310";//DoubleShot
		if(!$lnd["2300"])
			$list[]	= "2300";//Shoot
		if($lnd["2300"]) {//Shoot
			$list[]	= "2301";//PowerShoot
			$list[]	= "2302";//ArrowShower
			$list[]	= "2303";//PalsyShot
		}
	}
	// Sniper
	if($char->job == 401
	||	$char->job == 411
	||	$char->job == 412) {
		if($lnd["2303"])//PalsyShot
			$list[]	= "2304";//PoisonShot
		if($lnd["2301"]){ //PowerShoot
			$list[]	= "2305";//ChargeShot
			$list[]	= "2306";//PierceShot
		}
		if($lnd["2306"]) {//PierceShot
			$list[]	= "2308";//Aiming
			$list[]	= "2309";//Disarm
		}
		// ArrowShower + ChargeShot + PierceShot
		if($lnd["2302"] && $lnd["2305"] && $lnd["2306"])
			$list[]	= "2307";//HurricaneShot
	}
	// BeastTamer
	if($char->job == 402
	||	$char->job == 421
	||	$char->job == 422) {

		$list[]	= "1240";//Whip
		if($lnd["1240"]) {
			$list[]	= "1241";//Lashing
			$list[]	= "1243";//WhipBite
		}
		if($lnd["1241"]) {
			$list[]	= "1242";//WhipStorm
			$list[]	= "1244";//BodyBind
		}
		$list[]	= "2401";//CallPookie
		$list[]	= "2404";//CallTrainedLion
		$list[]	= "2408";//CallSprite
		if($lnd["2401"])//CallPookie
			$list[]	= "2402";//CallWildBoar
		if($lnd["2402"])//Call
			$list[]	= "2403";//CallGrandDino
		if($lnd["2404"])//CallTrainedLion
			$list[]	= "2405";//CallBear
		if($lnd["2405"])//CallBear
			$list[]	= "2406";//CallChimera
		if($lnd["2408"])//CallSprite
			$list[]	= "2409";//CallFlyHippo
		if($lnd["2409"])//Call
			$list[]	= "2410";//CallDragon
		if($lnd["2408"] && $lnd["2405"])//CallSprite+Bear
			$list[]	= "2407";//CallSnowMan
		$list[]	= "3300";//PowerTrain
		$list[]	= "3301";//MindTrain
		$list[]	= "3302";//SpeedTrain
		$list[]	= "3303";//DefenceTrain
		if($lnd["3300"])//
			$list[]	= "3304";//BuildUp
		if($lnd["3301"])//
			$list[]	= "3305";//Intention
		if($lnd["3302"])//
			$list[]	= "3306";//Nimble
		if($lnd["3303"])//
			$list[]	= "3307";//Fortify
		// `Train 4Ží—Þ
		if($lnd["3300"] && $lnd["3301"] && $lnd["3302"] && $lnd["3303"]) {
			$list[]	= "3308";//FullSupport
			$list[]	= "3310";//SuppressBeast
		}
	}
	// Murderer
	if($char->job == 403
	||	$char->job == 431
	||	$char->job == 432) {
		$list[]	= "1200";//PoisonBlow
		if($lnd["1200"]) {
			$list[]	= "1207";//PoisonBreath
			$list[]	= "1208";//PoisonInvasion
			$list[]	= "1220";//AntiPoisoning
		}
		if($lnd["1208"])
			$list[]	= "1209";//TransPoison
		$list[]	= "1203";//KnifeThrow
		if($lnd["1203"])
			$list[]	= "1204";//ScatterKnife
		$list[]	= "1205";//SulfaricAcid
		if($lnd["1205"])
			$list[]	= "1206";//AcidMist
	}
	// ¾Ñ»÷ÊÖ
	if($char->job == 411) {
		if($lnd["2309"]) //½â³ýÎä×°
			$list[]	= "2313";//½â³ý×°¼×
		if($lnd["2306"]) //´©Í¸Éä»÷
			$list[]	= "2314";//´©¼×Éä»÷
		if($lnd["2307"]) //ì«·çÉä»÷
			$list[]	= "2315";//À©É¢Éä»÷
		if($lnd["2314"]) //´©Í¸Éä»÷
			$list[]	= "2316";//´©¼×É¢Éä
		if($lnd["2305"]) //»»Î»Éä»÷
			$list[]	= "2318";//Ç¿åóÍÆÉä
	}
	// ÉäÉ±Õß
	if($char->job == 412) {
		if($lnd["2304"]) //ÖÐ¶¾¹¥»÷
			$list[]	= "2311";//¶¾ÔÆ¼ý
		if($lnd["2303"]) //Âé±ÔÉä»÷
			$list[]	= "2312";//Âé±ÔÉ¢Éä
		if($lnd["2301"]) //Ç¿Á¦Éä»÷
			$list[]	= "2317";//±¬Í·Ò»»÷
		if($lnd["2317"]) //±¬Í·Ò»»÷
			$list[]	= "2319";//±¬ÆÆ´©»÷
	}
	// ÊÞÍõ
	if($char->job == 421) {
		if($lnd["3308"]) //È«Á¦Ö§³Ö
			$list[]	= "3309";//È«ÌåÖ§³Ö
		if($lnd["2403"]) //´ó¹ÖÎïÕÙ»½
			$list[]	= "2411";//ÕÙ»½·èÖíÍõ
		if($lnd["2406"]) //ÕÙ»½ºÏ³ÉÊÞ
			$list[]	= "2412";//ÕÙ»½µØÓüÈ®
		if($lnd["2410"]) //ÕÙ»½Áú
			$list[]	= "2413";//ÕÙ»½ÔÉÊ¯¹ê
	}
	// µÁÔô
	if($char->job == 422) {
		if($lnd["1242"]) //±ÞÒ§
			$list[]	= "1245";//ËÀÍöÉß¸¿
		if($lnd["1245"]) //ËÀÍöÉß¸¿
			$list[]	= "1246";//¾£¼¬·ç±©
	}
	// °µÉ±Õß
	if($char->job == 431) {
		$list[]	= "1221";//°µÉ±
		if($lnd["1221"]) //°µÉ±
			$list[]	= "1222";//¶¾Ø°ÂÒ´ò
		if($lnd["1200"]) //¶¾Ö®Ò»»÷
			$list[]	= "1223";//¶¾Ö®³å»÷
	}
	// ·çÐÐÕß
	if($char->job == 432) {
		$list[]	= "3138";//·çÉñ¸½Ìå
		if($lnd["3138"]) //·çÉñ¸½Ìå
			$list[]	= "3139";//·çÖ®¼Ó»¤
		if($lnd["1206"]) //ËáÎí
			$list[]	= "1224";//·çÉ³Õó
		if($lnd["1204"]) //Ø°Ê×ÂÒ´ò
			$list[]	= "1225";//Éñ·çÂÒ´ò
	}
	//////////////////////////////////// ¤½¤ÎËû
	if(!$lnd["3010"] && $char->job == "200")//ManaRecharge
		$list[]	= "3010";
	//////////////////////////////////// ¹²Í¨Ïµ
	if(19 < $char->level)
		$list[]	= "4000";//ÅR‘é‘B„Ý
	if(4 < $char->level)
		$list[]	= "9000";//Ñ}ÊýÅÐ¶¨(* think over)
	asort($list);
	return $list;
}
?>