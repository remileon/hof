<?php 
function CanClassChange($char,$class) {
	switch($class) {
		case "101":// 皇家卫士
			if(19 < $char->level && $char->job == 100)
				return true;
			return false;
		case "102":// 狂战士
			if(24 < $char->level && $char->job == 100)
				return true;
			return false;
		case "103":// 魔女狩
			if(22 < $char->level && $char->job == 100)
				return true;
			return false;
		case "201":// 术士
			if(19 < $char->level && $char->job == 200)
				return true;
			return false;
		case "202":// 召唤师
			if(24 < $char->level && $char->job == 200)
				return true;
			return false;
		case "203":// 死灵法师
			if(21 < $char->level && $char->job == 200)
				return true;
			return false;
		case "301":// 主教
			if(24 < $char->level && $char->job == 300)
				return true;
			return false;
		case "302":// 德鲁伊
			if(19 < $char->level && $char->job == 300)
				return true;
			return false;
		case "401":// 狙击手
			if(19 < $char->level && $char->job == 400)
				return true;
			return false;
		case "402":// 驯兽师
			if(24 < $char->level && $char->job == 400)
				return true;
			return false;
		case "403":// 刺客
			if(21 < $char->level && $char->job == 400)
				return true;
			return false;
		case "111":// 皇家十字军
			if(54 < $char->level && $char->job == 101)
				return true;
			return false;
		case "112":// 皇家骑士
			if(59 < $char->level && $char->job == 101)
				return true;
			return false;
		case "121":// 鲜血狂魔
			if(54 < $char->level && $char->job == 102)
				return true;
			return false;
		case "122":// 嗜血剑士
			if(59 < $char->level && $char->job == 102)
				return true;
			return false;
		case "131":// 魔剑士
			if(54 < $char->level && $char->job == 103)
				return true;
			return false;
		case "132":// 剑刃舞者
			if(59 < $char->level && $char->job == 103)
				return true;
			return false;
		case "211":// 大魔导师
			if(54 < $char->level && $char->job == 201)
				return true;
			return false;
		case "212":// 巫妖
			if(59 < $char->level && $char->job == 201)
				return true;
			return false;
		case "221":// 魔龙召唤师
			if(54 < $char->level && $char->job == 202)
				return true;
			return false;
		case "222":// 魔卫
			if(59 < $char->level && $char->job == 202)
				return true;
			return false;
		case "231":// 咒术师
			if(54 < $char->level && $char->job == 203)
				return true;
			return false;
		case "232":// 邪灵
			if(59 < $char->level && $char->job == 203)
				return true;
			return false;
		case "311":// 教皇
			if(54 < $char->level && $char->job == 301)
				return true;
			return false;
		case "312":// 神使
			if(59 < $char->level && $char->job == 301)
				return true;
			return false;
		case "321":// 自然守护者
			if(54 < $char->level && $char->job == 302)
				return true;
			return false;
		case "322":// 生灵毁灭者
			if(59 < $char->level && $char->job == 302)
				return true;
			return false;
		case "411":// 狙击手
			if(54 < $char->level && $char->job == 401)
				return true;
			return false;
		case "412":// 射杀者
			if(59 < $char->level && $char->job == 401)
				return true;
			return false;
		case "421":// 兽王
			if(54 < $char->level && $char->job == 402)
				return true;
			return false;
		case "422":// 盗贼
			if(59 < $char->level && $char->job == 402)
				return true;
			return false;
		case "431":// 暗杀者
			if(54 < $char->level && $char->job == 403)
				return true;
			return false;
		case "432":// 风行者
			if(59 < $char->level && $char->job == 403)
				return true;
			return false;
		default:
			return false;
	}
}
?>