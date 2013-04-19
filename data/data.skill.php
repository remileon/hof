<?php 
/**
"name"	=> "名前",
	"img"	=> "skill_042.png",//画像
	"exp"	=> "技の説明",
	"sp"	=> "消費sp",
	"type"	=> "0",//0=物理 1=魔法
	"target"=> array(friend/enemy/all/self,individual/multi/all,攻撃回数),
		----(例)----------------------------------------
			frien/enemy	= 味方/敵
			all			= 味方+敵 全体
			self		= 自身に
		enemy individual 1	= 敵一人に1回
		enemy individual 3	= 敵一人に3回
		enemy multi 3		= 敵(誰か3人)に1回づつ(重複の可能性有り)
		enemy all 1			= 敵全員に1回攻撃
		all individual 5	= 味方敵全体の誰か一人に5回
		all multi 5			= 味方敵全体の誰か5人に1回づつ(重複の可能性有り)
		all all 3			= 味方敵全員に3回づつ
		------------------------------------------------
	"pow"	=> "100",// 100で割った物が倍率になる... 130=1.3倍 100 が基本。
	// "hit"	=> "100",// (多分消した...技の成功率...?)
	"invalid"	=> "1",//後衛をかばう動作を無効化
	"support"	=> "1",//味方の支援魔法(↑と区別が必要)
	"priority"	=> "LowHpRate",//ターゲットの優先(LowHpRate,Dead,Summon,Charge)
	//"charge"	=> "",//いわゆる詠唱完了までの時間やら、力の貯め時間等(0=詠唱無し)
	//"stiff"	=> "",//行動後の硬直時間(0=硬直無し 100=待機時間2倍(待機時間=硬直時間) )
	"charge" => array(charge,stiff),//配列に変更。
	"learn"	=> "習得に必要なポイント数",
	"Up**"
	"Down**"
	"pierce"
	"delay"
	"knockback"
	"poison"
	"summon"
	"move"
	"strict" => array("Bow"=>true),//武器制限
	"umove" // 使用者が移動。
	"DownSTR"	=> "40",// IND DEX SPD LUK ATK MATK DEF MDEF HP SP
	"UpSTR"
	"PlusSTR"	=> 50,

*/
function LoadSkillData($no) {
	switch($no) {
		case "1000":
$skill	= array(
"name"	=> "攻击",
"img"	=> "skill_042.png",
"exp"	=> "通常攻击",
"sp"	=> "0",
"type"	=> "0",
"learn"	=> "0",
"target"=> array("enemy","individual",1),
"pow"	=> "100",
); break;
		case "1001":
$skill	= array(
"name"	=> "痛击",
"img"	=> "skill_032.png",
"exp"	=> "",
"sp"	=> "8",
"type"	=> "0",
"learn"	=> "0",
"target"=> array("enemy","individual",1),
"pow"	=> "160",
"charge"=> array(20,20),
); break;
		case "1002":
$skill	= array(
"name"	=> "火球术",
"img"	=> "skill_018.png",
"exp"	=> "",
"sp"	=> "20",
"type"	=> "1",
"learn"	=> "0",
"target"=> array("enemy","multi",4),
"pow"	=> "100",
"invalid"	=> "1",
"charge"=> array(60,0),
); break;
		case "1003":
$skill	= array(
"name"	=> "双重打击",
"img"	=> "skill_073.png",
"exp"	=> "",
"sp"	=> "15",
"type"	=> "0",
"learn"	=> "4",
"target"=> array("enemy","individual",2),
"pow"	=> "90",
); break;
//---------------------------------------------------//
//  1010 までは練習で作った技！                   //
//---------------------------------------------------//
		case "1011":
$skill	= array(
"name"	=> "破坏武器",
"img"	=> "skill_072.png",
"exp"	=> "攻击力低下",
"sp"	=> "30",
"type"	=> "0",
"learn"	=> "6",
"target"=> array("enemy","individual",1),
"pow"	=> "100",
"charge"=> array(0,0),
"DownATK" => "50",
"DownMATK" => "50",
); break;
		case "1012":
$skill	= array(
"name"	=> "破坏装备",
"img"	=> "skill_072.png",
"exp"	=> "防御力低下",
"sp"	=> "30",
"type"	=> "0",
"learn"	=> "6",
"target"=> array("enemy","individual",1),
"pow"	=> "100",
"charge"=> array(0,0),
"DownDEF" => "30",
"DownMDEF" => "30",
); break;
		case "1013":
$skill	= array(
"name"	=> "突刺",
"img"	=> "skill_074.png",
"exp"	=> "",
"sp"	=> "15",
"type"	=> "0",
"learn"	=> "4",
"target"=> array("enemy","individual",1),
"pow"	=> "190",
"charge"=> array(0,40),
); break;
		case "1014":
$skill	= array(
"name"	=> "致命突刺",
"img"	=> "skill_074z.png",
"exp"	=> "",
"sp"	=> "50",
"type"	=> "0",
"learn"	=> "8",
"target"=> array("enemy","individual",1),
"pow"	=> "360",
"charge"=> array(0,50),
); break;
		case "1015":
$skill	= array(
"name"	=> "推后",
"img"	=> "skill_075.png",
"exp"	=> "后卫化",
"sp"	=> "60",
"type"	=> "0",
"learn"	=> "10",
"target"=> array("enemy","individual",1),
"pow"	=> "150",
"charge"=> array(40,20),
"knockback"	=> "100",
); break;
		case "1016":
$skill	= array(
"name"	=> "刺穿装备",
"img"	=> "skill_077.png",
"exp"	=> "无视防御力",
"sp"	=> "30",
"type"	=> "0",
"learn"	=> "6",
"target"=> array("enemy","individual",1),
"pow"	=> "170",
"charge"=> array(40,40),
"pierce"=> true,
); break;
		case "1017":
$skill	= array(
"name"	=> "愤怒一击",
"img"	=> "skill_031.png",
"exp"	=> "",
"sp"	=> "40",
"type"	=> "0",
"learn"	=> "6",
"target"=> array("enemy","multi",5),
"pow"	=> "100",
"charge"=> array(40,60),
); break;
		case "1018":
$skill	= array(
"name"	=> "敌我乱打",
"img"	=> "skill_031z.png",
"exp"	=> "不分敌我的全员攻击",
"sp"	=> "65",
"type"	=> "0",
"learn"	=> "10",
"target"=> array("all","multi",8),
"pow"	=> "100",
"invalid"	=> true,
"charge"=> array(50,100),
); break;
		case "1019":
$skill	= array(
"name"	=> "穿刺",
"img"	=> "skill_077z.png",
"exp"	=> "无视防御力",
"sp"	=> "80",
"type"	=> "0",
"learn"	=> "10",
"target"=> array("enemy","multi",6),
"pow"	=> "60",
"charge"=> array(60,60),
"pierce"=> true,
); break;
		case "1020":
$skill	= array(
"name"	=> "破坏精神",
"img"	=> "skill_073z.png",
"exp"	=> "SP下降",
"sp"	=> "20",
"type"	=> "0",
"learn"	=> "2",
"target"=> array("enemy","individual",1),
"pow"	=> "120",
); break;
		case "1021":
$skill	= array(
"name"	=> "破坏灵魂",
"img"	=> "skill_072z.png",
"exp"	=> "SP+HP下降",
"sp"	=> "50",
"type"	=> "0",
"learn"	=> "6",
"target"=> array("enemy","individual",1),
"pow"	=> "160",
); break;
		case "1022":
$skill	= array(
"name"	=> "冲锋",
"img"	=> "skill_033.png",
"exp"	=> "后排时威力四倍+前进",
"sp"	=> "10",
"type"	=> "0",
"learn"	=> "4",
"target"=> array("enemy","individual",1),
"pow"	=> "100",
"charge"=> array(0,30),
); break;
		case "1023":
$skill	= array(
"name"	=> "一击脱离",
"img"	=> "skill_033z.png",
"exp"	=> "前排时威力三倍+后退",
"sp"	=> "10",
"type"	=> "0",
"learn"	=> "4",
"target"=> array("enemy","individual",1),
"pow"	=> "100",
"charge"=> array(0,10),
); break;
		case "1024":
$skill	= array(
"name"	=> "分裂生命",
"img"	=> "skill_073y.png",
"exp"	=> "对象的HP分裂",
"sp"	=> "100",
"type"	=> "0",
"learn"	=> "10",
"target"=> array("enemy","individual",1),
"charge"=> array(0,50),
); break;
		case "1025":
$skill	= array(
"name"	=> "分裂精神",
"img"	=> "skill_073x.png",
"exp"	=> "对象的SP分裂",
"sp"	=> "10",
"type"	=> "0",
"learn"	=> "3",
"target"=> array("enemy","individual",1),
); break;
		case "1026":
$skill	= array(
"name"	=> "奋勇冲锋",
"img"	=> "skill_033.png",
"exp"	=> "后排时威力三倍+前进",
"sp"	=> "30",
"type"	=> "0",
"learn"	=> "6",
"target"=> array("enemy","multi",5),
"pow"	=> "150",
"charge"=> array(0,30),
); break;
		case "1027":
$skill	= array(
"name"	=> "燕返",
"img"	=> "skill_033z.png",
"exp"	=> "前排时威力六倍+后退",
"sp"	=> "100",
"type"	=> "0",
"learn"	=> "6",
"target"=> array("enemy","individual",1),
"pow"	=> "150",
"charge"=> array(0,50),
); break;
		case "1028":
$skill	= array(
"name"	=> "剑气",
"img"	=> "skill_077z.png",
"exp"	=> "无视防御力",
"sp"	=> "150",
"type"	=> "0",
"learn"	=> "12",
"target"=> array("enemy","all",1),
"pow"	=> "100",
"charge"=> array(10,50),
"pierce"=> true,
); break;
		case "1029":
$skill	= array(
"name"	=> "灵魂葬送曲",
"img"	=> "skill_072z.png",
"exp"	=> "SP+HP下降",
"sp"	=> "100",
"type"	=> "1",
"learn"	=> "10",
"target"=> array("enemy","all",1),
"pow"	=> "120",
); break;
		case "1030":
$skill	= array(
"name"	=> "居合斩",
"img"	=> "skill_074z.png",
"exp"	=> "",
"sp"	=> "200",
"type"	=> "0",
"learn"	=> "10",
"target"=> array("enemy","individual",1),
"pow"	=> "600",
"charge"=> array(100,100),
"invalid"	=> "1",
); break;
		case "1031":
$skill	= array(
"name"	=> "横扫千军",
"img"	=> "skill_031.png",
"exp"	=> "",
"sp"	=> "110",
"type"	=> "0",
"learn"	=> "11",
"target"=> array("enemy","multi",11),
"pow"	=> "110",
"charge"=> array(10,100),
); break;
		case "1032":
$skill	= array(
"name"	=> "核弹",
"img"	=> "skill_077.png",
"exp"	=> "",
"sp"	=> "100",
"type"	=> "0",
"learn"	=> "10",
"target"=> array("enemy","individual",1),
"pow"	=> "1000",
"charge"=> array(100,100),
"pierce"=> true,
); break;
		case "1033":
$skill	= array(
"name"	=> "冲坏武器",
"img"	=> "skill_072.png",
"exp"	=> "攻击力低下",
"sp"	=> "60",
"type"	=> "0",
"learn"	=> "10",
"target"=> array("enemy","individual",1),
"pow"	=> "160",
"charge"=> array(10,30),
"DownATK" => "75",
"DownMATK" => "75",
); break;
		case "1034":
$skill	= array(
"name"	=> "冲破装备",
"img"	=> "skill_072.png",
"exp"	=> "防御力低下",
"sp"	=> "60",
"type"	=> "0",
"learn"	=> "10",
"target"=> array("enemy","individual",1),
"pow"	=> "160",
"charge"=> array(10,30),
"DownDEF" => "45",
"DownMDEF" => "45",
); break;
		case "1035":
$skill	= array(
"name"	=> "破防斩",
"img"	=> "skill_077.png",
"exp"	=> "无视防御力",
"sp"	=> "100",
"type"	=> "0",
"learn"	=> "12",
"target"=> array("enemy","individual",1),
"pow"	=> "250",
"charge"=> array(20,50),
"pierce"=> true,
); break;
		case "1036":
$skill	= array(
"name"	=> "剑刃狂舞",
"img"	=> "skill_077z.png",
"exp"	=> "无视防御力",
"sp"	=> "350",
"type"	=> "0",
"learn"	=> "20",
"target"=> array("enemy","multi",5),
"pow"	=> "150",
"charge"=> array(50,50),
"pierce"=> true,
); break;
		case "1037":
$skill	= array(
"name"	=> "剑刃风暴",
"img"	=> "skill_077z.png",
"exp"	=> "无视防御力",
"sp"	=> "400",
"type"	=> "0",
"learn"	=> "24",
"target"=> array("all","all",1),
"pow"	=> "400",
"charge"=> array(40,60),
"pierce"=> true,
); break;
		case "1038":
$skill	= array(
"name"	=> "魔封剑",
"img"	=> "skill_077.png",
"exp"	=> "",
"sp"	=> "100",
"type"	=> "1",
"learn"	=> "6",
"target"=> array("enemy","individual",1),
"pow"	=> "450",
"charge"=> array(40,50),
"DownMATK" => "50",
); break;
		case "1039":
$skill	= array(
"name"	=> "噬魂剑",
"img"	=> "skill_077z.png",
"exp"	=> "",
"sp"	=> "250",
"type"	=> "1",
"learn"	=> "12",
"target"=> array("enemy","multi",3),
"pow"	=> "350",
"charge"=> array(30,50),
"DownMDEF" => "30",
); break;
		case "1040":
$skill	= array(
"name"	=> "音波剑",
"img"	=> "skill_077z.png",
"exp"	=> "",
"sp"	=> "300",
"type"	=> "1",
"learn"	=> "20",
"target"=> array("enemy","all",1),
"pow"	=> "200",
"charge"=> array(60,0),
"DownSPD" => "25",
); break;
									// 1100 - 狂战士技能
		case "1100":
$skill	= array(
"name"	=> "力量上升",
"img"	=> "skill_057.png",
"exp"	=> "力量上升",
"sp"	=> "0",
"type"	=> "0",
"learn"	=> "2",
"target"=> array("self","individual",1),
"support"=> true,
"sacrifice"	=> "10",
"UpSTR"	=> "100",
); break;
		case "1101":
$skill	= array(
"name"	=> "速度上升",
"img"	=> "skill_057.png",
"exp"	=> "速度上升",
"sp"	=> "0",
"type"	=> "0",
"learn"	=> "2",
"target"=> array("self","individual",1),
"support"=> true,
"sacrifice"	=> "25",
"PlusSPD"	=> "100",
); break;
		case "1102":
$skill	= array(
"name"	=> "智力上升",
"img"	=> "skill_057.png",
"exp"	=> "智力上升",
"sp"	=> "0",
"type"	=> "0",
"learn"	=> "2",
"target"=> array("self","individual",1),
"support"=> true,
"sacrifice"	=> "10",
"UpINT"	=> "100",
); break;
		case "1113":
$skill	= array(
"name"	=> "痛苦",
"img"	=> "skill_057.png",
"exp"	=> "",
"sp"	=> "0",
"type"	=> "0",
"learn"	=> "2",
"target"=> array("enemy","individual",1),
"pow"	=> "200",
"sacrifice"	=> "5",
); break;
		case "1114":
$skill	= array(
"name"	=> "速攻",
"img"	=> "skill_057.png",
"exp"	=> "",
"sp"	=> "0",
"type"	=> "0",
"learn"	=> "4",
"target"=> array("enemy","multi",4),
"pow"	=> "100",
"sacrifice"	=> "15",
); break;
		case "1115":
$skill	= array(
"name"	=> "毁灭",
"img"	=> "skill_057.png",
"exp"	=> "",
"sp"	=> "1",
"type"	=> "0",
"learn"	=> "8",
"target"=> array("enemy","multi",4),
"pow"	=> "200",
"sacrifice"	=> "30",
); break;
		case "1116":
$skill	= array(
"name"	=> "惩罚",
"img"	=> "skill_057.png",
"exp"	=> "根据自己减少的HP来制造对敌人的伤害",
"sp"	=> "100",
"type"	=> "0",
"learn"	=> "12",
"target"=> array("enemy","individual",1),
"charge"=> array(100,100),
); break;
		case "1117":
$skill	= array(
"name"	=> "疾病",
"img"	=> "skill_057.png",
"exp"	=> "毒化",
"sp"	=> "32",
"type"	=> "0",
"learn"	=> "8",
"target"=> array("enemy","all",1),
"sacrifice"	=> "20",
"charge"=> array(0,50),
"poison"=> "100",
); break;
		case "1118":
$skill	= array(
"name"	=> "击退",
"img"	=> "skill_057.png",
"exp"	=> "敌后退",
"sp"	=> "50",
"type"	=> "0",
"learn"	=> "8",
"target"=> array("enemy","all",1),
"sacrifice"	=> "50",
"charge"=> array(100,100),
"knockback"=> "100",
); break;
		case "1119":
$skill	= array(
"name"	=> "友方强化",
"img"	=> "skill_057.png",
"exp"	=> "?",
"sp"	=> "100",
"type"	=> "0",
"learn"	=> "16",
"target"=> array("friend","all",1),
"sacrifice"	=> "200",
"charge"=> array(100,0),
"UpSTR"	=> "60",
"UpINT"	=> "60",
"UpSPD"	=> "60",
"UpATK"	=> "60",
"UpMATK"=> "60",
); break;
		case "1120":
$skill	= array(
"name"	=> "暴走",
"img"	=> "skill_057.png",
"exp"	=> "",
"sp"	=> "0",
"type"	=> "0",
"learn"	=> "6",
"target"=> array("self","individual",1),
"support"=> true,
"sacrifice"	=> "60",
"UpSTR"	=> "60",
"UpINT"	=> "60",
"UpSPD"	=> "60",
"UpATK"	=> "60",
"DownDEF"=> "60",
"DownMDEF"=> "60",
); break;
		case "1121":
$skill	= array(
"name"	=> "虐杀",
"img"	=> "skill_057.png",
"exp"	=> "",
"sp"	=> "0",
"type"	=> "0",
"learn"	=> "6",
"target"=> array("enemy","individual",1),
"pow"	=> "500",
"sacrifice"	=> "20",
); break;
		case "1122":
$skill	= array(
"name"	=> "血腥厮杀",
"img"	=> "skill_057.png",
"exp"	=> "",
"sp"	=> "0",
"type"	=> "0",
"learn"	=> "20",
"target"=> array("enemy","multi",5),
"pow"	=> "250",
"sacrifice"	=> "30",
); break;
		case "1123":
$skill	= array(
"name"	=> "疯狂屠戮",
"img"	=> "skill_057.png",
"exp"	=> "",
"sp"	=> "0",
"type"	=> "0",
"learn"	=> "16",
"target"=> array("all","all",1),
"pow"	=> "600",
"sacrifice"	=> "60",
); break;
		case "1124":
$skill	= array(
"name"	=> "无限斩",
"img"	=> "skill_057.png",
"exp"	=> "",
"sp"	=> "150",
"type"	=> "0",
"learn"	=> "15",
"target"=> array("enemy","multi",15),
"pow"	=> "150",
"charge"=> array(150,150),
); break;
		case "1125":
$skill	= array(
"name"	=> "同路人",
"img"	=> "skill_057.png",
"exp"	=> "根据自己减少的HP来制造对敌人的伤害",
"sp"	=> "0",
"type"	=> "0",
"learn"	=> "24",
"target"=> array("enemy","individual",1),
"charge"=> array(0,240),
"sacrifice"	=> "24",
); break;
//------------------------------------------------ 1200 暗杀者
		case "1200":
$skill	= array(
"name"	=> "毒之一击",
"img"	=> "skill_074y.png",
"exp"	=> "对方毒状态的话威力6倍",
"sp"	=> "10",
"type"	=> "0",
"learn"	=> "4",
"target"=> array("enemy","individual",1),
"pow"	=> "100",
"limit"=> array("匕首"=>true,),
); break;
		case "1203":
$skill	= array(
"name"	=> "掷匕首",
"img"	=> "we_sword001.png",
"sp"	=> "0",
"type"	=> "0",
"learn"	=> "1",
"target"=> array("enemy","individual",1),
"pow"	=> "140",
"invalid"	=> "1",
"limit"=> array("匕首"=>true,),
); break;
		case "1204":
$skill	= array(
"name"	=> "匕首乱打",
"img"	=> "we_sword001z.png",
"sp"	=> "30",
"type"	=> "0",
"learn"	=> "4",
"target"=> array("enemy","multi",4),
"pow"	=> "130",
"invalid"	=> "1",
"limit"=> array("匕首"=>true,),
); break;
		case "1205":
$skill	= array(
"name"	=> "酸化表面",
"img"	=> "item_027.png",
"exp"	=> "防御低下",
"sp"	=> "30",
"type"	=> "0",
"learn"	=> "4",
"target"=> array("enemy","individual",1),
"DownDEF"	=> "30",
"DownMDEF"	=> "30",
); break;
		case "1206":
$skill	= array(
"name"	=> "酸雾",
"img"	=> "skill_079z.png",
"exp"	=> "防御低下",
"sp"	=> "60",
"type"	=> "0",
"learn"	=> "4",
"target"=> array("enemy","all",1),
"DownDEF"	=> "15",
); break;
		case "1207":
$skill	= array(
"name"	=> "毒之气息",
"img"	=> "skill_005cz.png",
"exp"	=> "前卫化",
"sp"	=> "30",
"type"	=> "0",
"learn"	=> "4",
"target"=> array("enemy","all",1),
"umove"	=> "front",
"charge"=> array(30,30),
"poison"=> "80",
); break;
		case "1208":
$skill	= array(
"name"	=> "使毒",
"img"	=> "skill_024z.png",
"exp"	=> "毒状态的对方失血(int相关？？)",
"sp"	=> "60",
"type"	=> "0",
"learn"	=> "6",
"target"=> array("enemy","all",1),
); break;
		case "1209":
$skill	= array(
"name"	=> "传毒",
"img"	=> "item_031.png",
"exp"	=> "毒状态能力上升+解毒",
"sp"	=> "80",
"type"	=> "0",
"learn"	=> "8",
"target"=> array("friend","all",1),
"PlusSTR"	=> 50,
"PlusSPD"	=> 50,
"charge"=> array(0,100),
"CurePoison"	=> true,
); break;
		case "1210":
$skill	= array(
"name"	=> "前排致盲",
"img"	=> "skill_073x.png",
"exp"	=> "行动延迟",
"sp"	=> "100",
"type"	=> "0",
"learn"	=> "2",
"target"=> array("enemy","all",1),
); break;
		case "1211":
$skill	= array(
"name"	=> "后排致盲",
"img"	=> "skill_073x.png",
"exp"	=> "行动延迟",
"sp"	=> "100",
"type"	=> "0",
"learn"	=> "2",
"target"=> array("enemy","all",1),
); break;
		case "1220":
$skill	= array(
"name"	=> "抗毒",
"img"	=> "item_026b.png",
"exp"	=> "毒耐性+50%",
"sp"	=> "80",
"type"	=> "0",
"learn"	=> "5",
"target"=> array("friend","all",1),
); break;
		case "1221":
$skill	= array(
"name"	=> "暗杀",
"img"	=> "we_sword001.png",
"sp"	=> "200",
"type"	=> "0",
"learn"	=> "8",
"target"=> array("enemy","individual",1),
"pow"	=> "800",
"charge"=> array(40,0),
"invalid"	=> "1",
"limit"=> array("匕首"=>true,),
); break;
		case "1222":
$skill	= array(
"name"	=> "毒匕乱打",
"img"	=> "we_sword001z.png",
"sp"	=> "200",
"type"	=> "0",
"learn"	=> "12",
"target"=> array("enemy","multi",10),
"pow"	=> "100",
"invalid"	=> "1",
"poison"=> "100",
"limit"=> array("匕首"=>true,),
); break;
		case "1223":
$skill	= array(
"name"	=> "毒之冲击",
"img"	=> "skill_074y.png",
"exp"	=> "对方毒状态的话威力6倍",
"sp"	=> "240",
"type"	=> "0",
"learn"	=> "16",
"target"=> array("enemy","all",1),
"pow"	=> "80",
"limit"=> array("匕首"=>true,),
); break;
		case "1224":
$skill	= array(
"name"	=> "风沙阵",
"img"	=> "we_other007y.png",
"exp"	=> "",
"sp"	=> "360",
"type"	=> "0",
"learn"	=> "12",
"target"=> array("enemy","all",1),
"charge"=> array(0,200),
"pow"	=> "30",
"delay"	=> 60,
"limit"=> array("匕首"=>true,),
); break;
		case "1225":
$skill	= array(
"name"	=> "神风乱打",
"img"	=> "we_sword001z.png",
"sp"	=> "210",
"type"	=> "0",
"learn"	=> "18",
"target"=> array("enemy","all",1),
"pow"	=> "240",
"invalid"	=> "1",
"limit"=> array("匕首"=>true,),
); break;
		case "1226":
$skill	= array(
"name"	=> "风之刃",
"img"	=> "we_sword001.png",
"sp"	=> "0",
"type"	=> "0",
"learn"	=> "5",
"target"=> array("enemy","multi",2),
"pow"	=> "150",
"invalid"	=> "1",
"limit"=> array("匕首"=>true,),
); break;
//---------------------------------------------- 1240 驯兽师
		case "1240":
$skill	= array(
"name"	=> "抽打",
"img"	=> "we_other007y.png",
"exp"	=> "",
"sp"	=> "0",
"type"	=> "0",
"learn"	=> "0",
"target"=> array("enemy","multi",2),
"pow"	=> "90",
"limit"=> array("鞭"=>true,),
); break;
		case "1241":
$skill	= array(
"name"	=> "鞭打",
"img"	=> "we_other007y.png",
"exp"	=> "",
"sp"	=> "30",
"type"	=> "0",
"learn"	=> "2",
"target"=> array("enemy","multi",4),
"pow"	=> "90",
"limit"=> array("鞭"=>true,),
); break;
		case "1242":
$skill	= array(
"name"	=> "鞭子风暴",
"img"	=> "we_other007y.png",
"exp"	=> "",
"sp"	=> "40",
"type"	=> "0",
"learn"	=> "4",
"target"=> array("enemy","multi",6),
"pow"	=> "90",
"limit"=> array("鞭"=>true,),
); break;
		case "1243":
$skill	= array(
"name"	=> "鞭咬",
"img"	=> "we_other007y.png",
"exp"	=> "",
"sp"	=> "30",
"type"	=> "0",
"learn"	=> "4",
"target"=> array("enemy","multi",2),
"pow"	=> "80",
"delay"	=> 50,
"limit"=> array("鞭"=>true,),
); break;
		case "1244":
$skill	= array(
"name"	=> "身体固定",
"img"	=> "we_other007y.png",
"exp"	=> "",
"sp"	=> "40",
"type"	=> "0",
"learn"	=> "4",
"target"=> array("enemy","multi",2),
"pow"	=> "60",
"delay"	=> 30,
"DownSPD"	=> 30,
"limit"=> array("鞭"=>true,),
); break;
		case "1245":
$skill	= array(
"name"	=> "死亡蛇缚",
"img"	=> "we_other007y.png",
"exp"	=> "",
"sp"	=> "100",
"type"	=> "0",
"learn"	=> "10",
"target"=> array("enemy","multi",4),
"pow"	=> "100",
"charge"=> array(10,40),
"delay"	=> 40,
"limit"=> array("鞭"=>true,),
); break;
		case "1246":
$skill	= array(
"name"	=> "荆棘风暴",
"img"	=> "we_other007y.png",
"exp"	=> "",
"sp"	=> "300",
"type"	=> "0",
"learn"	=> "16",
"target"=> array("enemy","all",1),
"pow"	=> "200",
"charge"=> array(30,0),
"delay"	=> 30,
"limit"=> array("鞭"=>true,),
); break;
//------------------------------------------------ 
									// 2000 - 魔法系らしい
		case "2000":
$skill	= array(
"name"	=> "火焰风暴",
"img"	=> "skill_004a.png",
"exp"	=> "",
"sp"	=> "70",
"type"	=> "1",
"learn"	=> "4",
"target"=> array("enemy","multi",6),
"pow"	=> "100",
"invalid"	=> "1",
"charge"=> array(70,0),
); break;
		case "2001":
$skill	= array(
"name"	=> "地狱火",
"img"	=> "skill_006a.png",
"exp"	=> "",
"sp"	=> "320",
"type"	=> "1",
"learn"	=> "12",
"target"=> array("enemy","multi",12),
"pow"	=> "100",
"invalid"	=> "1",
"charge"=> array(120,0),
); break;
		case "2002":
$skill	= array(
"name"	=> "火柱",
"img"	=> "skill_007a.png",
"exp"	=> "力Down",
"sp"	=> "40",
"type"	=> "1",
"learn"	=> "4",
"target"=> array("enemy","multi",2),
"pow"	=> "140",
"invalid"	=> "1",
"charge"=> array(10,40),
"DownSTR"	=> "40",
); break;
		case "2003":
$skill	= array(
"name"	=> "爆炸",
"img"	=> "skill_005a.png",
"exp"	=> "力Down",
"sp"	=> "140",
"type"	=> "1",
"learn"	=> "14",
"target"=> array("all","all",1),
"pow"	=> "140",
"charge"=> array(100,40),
"DownSTR"	=> "40",
); break;
		case "2004":
$skill	= array(
"name"	=> "陨石风暴",
"img"	=> "skill_021z.png",
"exp"	=> "",
"sp"	=> "800",
"type"	=> "1",
"learn"	=> "12",
"target"=> array("enemy","multi",16),
"pow"	=> "160",
"charge"=> array(160,0),
); break;
		case "2010":
$skill	= array(
"name"	=> "冰之枪",
"img"	=> "skill_001b.png",
"exp"	=> "",
"sp"	=> "20",
"type"	=> "1",
"learn"	=> "1",
"target"=> array("enemy","individual",3),
"pow"	=> "100",
"charge"=> array(30,0),
); break;
		case "2011":
$skill	= array(
"name"	=> "冰标枪",
"img"	=> "skill_002b.png",
"exp"	=> "",
"sp"	=> "60",
"type"	=> "1",
"learn"	=> "4",
"target"=> array("enemy","individual",3),
"pow"	=> "150",
"charge"=> array(40,0),
); break;
		case "2012":
$skill	= array(
"name"	=> "暴风雪",
"img"	=> "skill_006b.png",
"exp"	=> "",
"sp"	=> "240",
"type"	=> "1",
"learn"	=> "12",
"target"=> array("enemy","multi",10),
"pow"	=> "90",
"charge"=> array(90,0),
); break;
		case "2013":
$skill	= array(
"name"	=> "冰柱",
"img"	=> "skill_034.png",
"exp"	=> "",
"sp"	=> "20",
"type"	=> "1",
"learn"	=> "0",
"target"=> array("enemy","individual",1),
"pow"	=> "100",
"charge"=> array(30,0),
); break;
		case "2014":
$skill	= array(
"name"	=> "冰狱",
"img"	=> "skill_055.png",
"exp"	=> "防御Down",
"sp"	=> "40",
"type"	=> "1",
"learn"	=> "4",
"target"=> array("enemy","individual",1),
"pow"	=> "180",
"invalid"	=> "1",
"charge"=> array(40,0),
"DownDEF"	=> "30",
"DownMDEF"	=> "30",
); break;
		case "2015":
$skill	= array(
"name"	=> "海浪",
"img"	=> "skill_056z.png",
"exp"	=> "后卫化",
"sp"	=> "520",
"type"	=> "1",
"learn"	=> "12",
"target"=> array("enemy","multi",24),
"pow"	=> "80",
"charge"=> array(170,100),
"knockback"	=> "100",
); break;
		case "2020":
$skill	= array(
"name"	=> "雷击",
"img"	=> "skill_030z.png",
"exp"	=> "",
"sp"	=> "30",
"type"	=> "1",
"learn"	=> "1",
"target"=> array("enemy","individual",1),
"pow"	=> "400",
"invalid"	=> "1",
"charge"=> array(50,0),
); break;
		case "2021":
$skill	= array(
"name"	=> "闪电球",
"img"	=> "skill_054z.png",
"exp"	=> "",
"sp"	=> "80",
"type"	=> "1",
"learn"	=> "6",
"target"=> array("enemy","multi",3),
"pow"	=> "220",
"invalid"	=> "1",
"charge"=> array(70,0),
); break;
		case "2022":
$skill	= array(
"name"	=> "闪光",
"img"	=> "skill_022z.png",
"exp"	=> "行动延迟",
"sp"	=> "30",
"type"	=> "1",
"learn"	=> "4",
"target"=> array("enemy","all",1),
"charge"=> array(30,0),
"delay"	=> "25",
); break;
		case "2023":
$skill	= array(
"name"	=> "麻痹",
"img"	=> "skill_025.png",
"exp"	=> "行动延迟",
"sp"	=> "15",
"type"	=> "1",
"learn"	=> "4",
"target"=> array("enemy","individual",1),
"pow"	=> "50",
"charge"=> array(30,0),
"delay"	=> "120",
); break;
		case "2024":
$skill	= array(
"name"	=> "雷暴",
"img"	=> "skill_006cz.png",
"exp"	=> "",
"sp"	=> "400",
"type"	=> "1",
"learn"	=> "12",
"target"=> array("enemy","multi",5),
"pow"	=> "300",
"charge"=> array(150,0),
"invalid"	=> "1",
); break;
		case "2025":
$skill	= array(
"name"	=> "白棺",
"img"	=> "skill_025.png",
"exp"	=> "行动延迟",
"sp"	=> "150",
"type"	=> "1",
"learn"	=> "15",
"target"=> array("enemy","individual",5),
"pow"	=> "150",
"charge"=> array(0,150),
"delay"	=> "150",
); break;
		case "2030":
$skill	= array(
"name"	=> "生命吸收",
"img"	=> "skill_062z.png",
"exp"	=> "HP吸收",
"sp"	=> "50",
"type"	=> "1",
"learn"	=> "4",
"target"=> array("enemy","individual",1),
"pow"	=> "230",
"invalid"	=> "1",
"charge"=> array(10,40),
); break;
		case "2031":
$skill	= array(
"name"	=> "生命挤压",
"img"	=> "skill_078.png",
"exp"	=> "HP吸收",
"sp"	=> "70",
"type"	=> "1",
"learn"	=> "8",
"target"=> array("enemy","all",1),
"pow"	=> "120",
"charge"=> array(30,80),
); break;
		case "2032":
$skill	= array(
"name"	=> "死亡之钟",
"img"	=> "skill_041z.png",
"exp"	=> "即死",
"sp"	=> "50",
"type"	=> "1",
"learn"	=> "8",
"target"=> array("enemy","individual",1),
"invalid"	=> "1",
"charge"=> array(100,0),
); break;
		case "2033":
$skill	= array(
"name"	=> "吞食",
"img"	=> "skill_062z.png",
"exp"	=> "",
"sp"	=> "10",
"type"	=> "0",
"learn"	=> "5",
"target"=> array("enemy","individual",1),
"pow"	=> "150",
"invalid"	=> "1",
"charge"=> array(10,50),
); break;
		case "2034":
$skill	= array(
"name"	=> "血气收集",
"img"	=> "skill_078.png",
"exp"	=> "",
"sp"	=> "80",
"type"	=> "0",
"learn"	=> "8",
"target"=> array("all","all",1),
"pow"	=> "80",
"charge"=> array(80,80),
); break;
		case "2035":
$skill	= array(
"name"	=> "灵魂收割",
"img"	=> "skill_041z.png",
"exp"	=> "10%即死",
"sp"	=> "200",
"type"	=> "0",
"learn"	=> "13",
"target"=> array("enemy","individual",1),
"invalid"	=> "1",
"charge"=> array(100,100),
); break;
		case "2036":
$skill	= array(
"name"	=> "怒气爆发",
"img"	=> "skill_062z.png",
"exp"	=> "",
"sp"	=> "100",
"type"	=> "0",
"learn"	=> "12",
"target"=> array("enemy","all",1),
"pow"	=> "200",
"invalid"	=> "1",
"charge"=> array(10,20),
); break;
		case "2040":
$skill	= array(
"name"	=> "沙漠风暴",
"img"	=> "skill_006d.png",
"exp"	=> "行动延迟",
"sp"	=> "200",
"type"	=> "1",
"learn"	=> "12",
"target"=> array("enemy","all",1),
"pow"	=> "80",
"charge"=> array(200,0),
"delay"	=> "80",
); break;
		case "2041":
$skill	= array(
"name"	=> "地震",
"img"	=> "skill_056y.png",
"exp"	=> "",
"sp"	=> "80",
"type"	=> "1",
"learn"	=> "6",
"target"=> array("all","all",1),
"pow"	=> "200",
"charge"=> array(100,30),
); break;
		case "2042":
$skill	= array(
"name"	=> "沉陷",
"img"	=> "skill_056.png",
"exp"	=> "",
"sp"	=> "150",
"type"	=> "1",
"learn"	=> "8",
"target"=> array("all","all",1),
"pow"	=> "350",
"charge"=> array(130,50),
); break;
		case "2043":
$skill	= array(
"name"	=> "沙风暴",
"img"	=> "skill_006d.png",
"exp"	=> "行动延迟",
"sp"	=> "200",
"type"	=> "1",
"learn"	=> "10",
"target"=> array("enemy","all",1),
"pow"	=> "180",
"charge"=> array(80,20),
"delay"	=> "180",
); break;
		case "2044":
$skill	= array(
"name"	=> "神沙风暴",
"img"	=> "skill_006d.png",
"exp"	=> "行动延迟",
"sp"	=> "600",
"type"	=> "1",
"learn"	=> "20",
"target"=> array("enemy","all",1),
"pow"	=> "150",
"charge"=> array(200,50),
"delay"	=> "100",
); break;
		case "2045":
$skill	= array(
"name"	=> "泥石流",
"img"	=> "skill_056.png",
"exp"	=> "",
"sp"	=> "500",
"type"	=> "1",
"learn"	=> "12",
"target"=> array("all","all",1),
"pow"	=> "500",
"charge"=> array(150,50),
); break;
		case "2046":
$skill	= array(
"name"	=> "连锁闪电",
"img"	=> "skill_006cz.png",
"exp"	=> "",
"sp"	=> "600",
"type"	=> "1",
"learn"	=> "18",
"target"=> array("enemy","all",1),
"pow"	=> "320",
"charge"=> array(160,0),
"invalid"	=> "1",
); break;
		case "2047":
$skill	= array(
"name"	=> "星云陨落",
"img"	=> "skill_021z.png",
"exp"	=> "",
"sp"	=> "1200",
"type"	=> "1",
"learn"	=> "18",
"target"=> array("enemy","multi",24),
"pow"	=> "200",
"charge"=> array(220,0),
); break;
		case "2048":
$skill	= array(
"name"	=> "寒冰炼狱",
"img"	=> "skill_002b.png",
"exp"	=> "",
"sp"	=> "360",
"type"	=> "1",
"learn"	=> "8",
"target"=> array("enemy","individual",9),
"pow"	=> "180",
"charge"=> array(90,0),
); break;
		case "2049":
$skill	= array(
"name"	=> "冰结界",
"img"	=> "skill_055.png",
"exp"	=> "攻击Down",
"sp"	=> "60",
"type"	=> "1",
"learn"	=> "6",
"target"=> array("enemy","individual",1),
"pow"	=> "180",
"invalid"	=> "1",
"charge"=> array(60,0),
"DownATK"	=> "30",
"DownMATK"	=> "30",
); break;

//-------------------------------- 2050
		case "2050":
$skill	= array(
"name"	=> "猛毒轰击",
"img"	=> "skill_024.png",
"exp"	=> "毒化",
"sp"	=> "30",
"type"	=> "1",
"learn"	=> "4",
"target"=> array("enemy","multi",2),
"pow"	=> "200",
"charge"=> array(40,0),
"poison"=> "100",
); break;
		case "2051":
$skill	= array(
"name"	=> "毒烟",
"img"	=> "skill_079.png",
"exp"	=> "毒化",
"sp"	=> "80",
"type"	=> "1",
"learn"	=> "8",
"target"=> array("enemy","all",1),
"pow"	=> "150",
"charge"=> array(70,0),
"poison"=> "100",
); break;
		case "2055":
$skill	= array(
"name"	=> "灵魂复仇",
"img"	=> "skill_065.png",
"exp"	=> "根据死者数伤害增加",
"sp"	=> "340",
"type"	=> "1",
"learn"	=> "8",
"target"=> array("enemy","all",1),
"pow"	=> "50",
"charge"=> array(0,60),
); break;
		case "2056":
$skill	= array(
"name"	=> "僵尸复活",
"img"	=> "skill_061.png",
"exp"	=> "我方复活",
"sp"	=> "300",
"type"	=> "1",
"learn"	=> "8",
"target"=> array("friend","all",1),
"charge"	=> array(50,100),
"DownMAXHP"=>"30",
"DownDEF"=>"100",
"DownMDEF"=>"100",
"DownSPD"=>"50",
"priority"	=> "Dead",
); break;
		case "2057":
$skill	= array(
"name"	=> "自我蜕变",
"img"	=> "skill_066.png",
"exp"	=> "HP60%以下可使用(1回限制)",
"sp"	=> "250",
"type"	=> "1",
"learn"	=> "8",
"target"=> array("self","individual",1),
"charge"=> array(0,50),
"UpMAXHP"=> 200,
"UpMATK"=> 100,
"UpINT"=> 100,
"UpSPD"=> 50,
); break;
		case "2058":
$skill	= array(
"name"	=> "血气界限",
"img"	=> "skill_066.png",
"exp"	=> "",
"sp"	=> "200",
"type"	=> "1",
"learn"	=> "20",
"target"=> array("self","individual",1),
"charge"=> array(20,10),
"UpMAXHP"=> 200,
"DownMAXSP"=> 100,
); break;
		case "2059":
$skill	= array(
"name"	=> "树灵变化",
"img"	=> "skill_066.png",
"exp"	=> "(1回限制)",
"sp"	=> "300",
"type"	=> "1",
"learn"	=> "20",
"target"=> array("self","individual",1),
"charge"=> array(0,100),
"UpMAXHP"=> 200,
"UpINT"=> 60,
"UpDEF"=> 35,
"UpMDEF"=> 35,
); break;
//-------------------------------- 2060
		case "2060":
$skill	= array(
"name"	=> "魔法爆炸",
"img"	=> "skill_020.png",
"exp"	=> "",
"sp"	=> "140",
"type"	=> "1",
"learn"	=> "6",
"target"=> array("enemy","individual",1),
"pow"	=> "500",
"charge"=> array(0,0),
); break;
		case "2061":
$skill	= array(
"name"	=> "雷电立场",
"img"	=> "skill_025.png",
"exp"	=> "行动延迟",
"sp"	=> "60",
"type"	=> "1",
"learn"	=> "8",
"target"=> array("enemy","multi",2),
"pow"	=> "40",
"charge"=> array(60,0),
"delay"	=> "80",
); break;
		case "2062":
$skill	= array(
"name"	=> "自爆",
"img"	=> "skill_005a.png",
"exp"	=> "",
"sp"	=> "1000",
"type"	=> "1",
"learn"	=> "20",
"target"=> array("all","all",1),
"pow"	=> "1000",
"charge"=> array(200,1000),
); break;
		case "2063":
$skill	= array(
"name"	=> "野性变化",
"img"	=> "skill_066.png",
"exp"	=> "(1回限制)",
"sp"	=> "300",
"type"	=> "1",
"learn"	=> "20",
"target"=> array("self","individual",1),
"charge"=> array(0,100),
"UpMAXHP"=> 200,
"UpSTR"=> 100,
"UpATK"=> 100,
"UpDEF"=> 100,
"DownINT"=> 100,
"DownMATK"=> 100,
"DownMDEF"=> 100,
); break;
		case "2064":
$skill	= array(
"name"	=> "衰老",
"img"	=> "skill_066.png",
"sp"	=> "240",
"type"	=> "0",
"learn"	=> "12",
"target"=> array("enemy","individual",1),
"DownMAXHP"	=> "20",
"charge"=> array(80,0),
"invalid"	=> true,
); break;
		case "2065":
$skill	= array(
"name"	=> "死亡符咒",
"img"	=> "skill_066.png",
"sp"	=> "600",
"type"	=> "0",
"learn"	=> "20",
"target"=> array("enemy","all",1),
"DownMAXHP"	=> "10",
"charge"=> array(150,0),
"invalid"	=> true,
); break;
		case "2066":
$skill	= array(
"name"	=> "次元刀",
"img"	=> "skill_077.png",
"exp"	=> "无视防御力",
"sp"	=> "160",
"type"	=> "1",
"learn"	=> "8",
"target"=> array("enemy","individual",1),
"pow"	=> "240",
"charge"=> array(40,20),
"pierce"=> true,
); break;
		case "2067":
$skill	= array(
"name"	=> "魔刃穿刺",
"img"	=> "skill_077z.png",
"exp"	=> "无视防御力",
"sp"	=> "320",
"type"	=> "1",
"learn"	=> "16",
"target"=> array("enemy","multi",4),
"pow"	=> "200",
"charge"=> array(80,20),
"pierce"=> true,
); break;
		case "2068":
$skill	= array(
"name"	=> "空间炸裂",
"img"	=> "skill_077z.png",
"exp"	=> "无视防御力",
"sp"	=> "600",
"type"	=> "1",
"learn"	=> "24",
"target"=> array("all","all",1),
"pow"	=> "160",
"charge"=> array(120,20),
"pierce"=> true,
); break;
		case "2069":
$skill	= array(
"name"	=> "迅雷直击",
"img"	=> "skill_030z.png",
"exp"	=> "",
"sp"	=> "60",
"type"	=> "1",
"learn"	=> "2",
"target"=> array("enemy","individual",1),
"pow"	=> "300",
"invalid"	=> "1",
"charge"=> array(20,0),
); break;
		case "2070":
$skill	= array(
"name"	=> "迅雷追击",
"img"	=> "skill_054z.png",
"exp"	=> "",
"sp"	=> "180",
"type"	=> "1",
"learn"	=> "6",
"target"=> array("enemy","multi",3),
"pow"	=> "240",
"invalid"	=> "1",
"charge"=> array(30,0),
); break;
		case "2071":
$skill	= array(
"name"	=> "电流震荡",
"img"	=> "skill_030z.png",
"exp"	=> "",
"sp"	=> "400",
"type"	=> "1",
"learn"	=> "12",
"target"=> array("enemy","all",1),
"pow"	=> "200",
"invalid"	=> "1",
"charge"=> array(60,0),
); break;
		case "2072":
$skill	= array(
"name"	=> "巨大化",
"img"	=> "skill_066.png",
"sp"	=> "400",
"type"	=> "0",
"learn"	=> "20",
"target"=> array("friend","individual",1),
"UpMAXHP"	=> "100",
"charge"=> array(100,0),
"invalid"	=> true,
); break;
//---------------------------------- 2090
		case "2090":
$skill	= array(
"name"	=> "能量抢夺",
"img"	=> "skill_037.png",
"exp"	=> "SP吸收",
"sp"	=> "10",
"type"	=> "1",
"learn"	=> "3",
"target"=> array("enemy","individual",1),
"pow"	=> "150",
"invalid"	=> "1",
"charge"=> array(30,0),
); break;
		case "2091":
$skill	= array(
"name"	=> "能量收集",
"img"	=> "skill_037.png",
"exp"	=> "SP吸收",
"sp"	=> "30",
"type"	=> "1",
"learn"	=> "6",
"target"=> array("enemy","all",1),
"pow"	=> "70",
"invalid"	=> "1",
"charge"=> array(100,0),
); break;
							// 2100
		case "2100":
$skill	= array(
"name"	=> "圣光",
"img"	=> "skill_022.png",
"exp"	=> "",
"sp"	=> "10",
"type"	=> "1",
"learn"	=> "1",
"target"=> array("enemy","individual",1),
"pow"	=> "100",
"invalid"	=> "1",
"charge"=> array(10,0),
); break;
		case "2101":
$skill	= array(
"name"	=> "圣光爆发",
"img"	=> "skill_010z.png",
"exp"	=> "",
"sp"	=> "40",
"type"	=> "1",
"learn"	=> "6",
"target"=> array("enemy","multi",3),
"pow"	=> "100",
"invalid"	=> "1",
"charge"=> array(40,0),
); break;
		case "2102":
$skill	= array(
"name"	=> "大十字",
"img"	=> "item_036b.png",
"exp"	=> "",
"sp"	=> "200",
"type"	=> "1",
"learn"	=> "8",
"target"=> array("enemy","all",1),
"pow"	=> "200",
"charge"=> array(70,30),
"MagicCircleDeleteTeam"	=> 1,
); break;
		case "2103":
$skill	= array(
"name"	=> "毁灭打击",
"img"	=> "skill_010z.png",
"exp"	=> "",
"sp"	=> "120",
"type"	=> "1",
"learn"	=> "8",
"target"=> array("enemy","individual",1),
"pow"	=> "400",
"invalid"	=> "1",
"charge"=> array(20,60),
); break;
		case "2104":
$skill	= array(
"name"	=> "毁灭冲击",
"img"	=> "skill_010z.png",
"exp"	=> "",
"sp"	=> "300",
"type"	=> "1",
"learn"	=> "12",
"target"=> array("enemy","all",1),
"pow"	=> "300",
"invalid"	=> "1",
"charge"=> array(30,90),
); break;
							// 2110
							// 詠唱中のキャラのみに適応する。
		case "2110":
$skill	= array(
"name"	=> "打扰咏唱",
"img"	=> "skill_016.png",
"exp"	=> "Charge（咏唱）妨害",
"sp"	=> "60",
"type"	=> "1",
"learn"	=> "6",
"target"=> array("enemy","individual",1),
"invalid"	=> "1",
"priority"	=> "Charge",
"delay"	=> "200",
"charge"	=> array(0,60),
); break;
		case "2111":
$skill	= array(
"name"	=> "打扰咏唱(全员)",
"img"	=> "skill_016.png",
"exp"	=> "Charge（咏唱）妨害(全)",
"sp"	=> "100",
"type"	=> "1",
"learn"	=> "6",
"target"=> array("enemy","all",1),
"invalid"	=> "1",
"priority"	=> "Charge",
"delay"	=> "100",
"charge"	=> array(0,60),
); break;
		case "2112":
$skill	= array(
"name"	=> "锁足",
"img"	=> "we_other007y.png",
"exp"	=> "",
"sp"	=> "300",
"type"	=> "1",
"learn"	=> "99",
"target"=> array("enemy","all",1),
"delay"	=> 100,
"invalid"	=> "1",
"charge"=> array(0,100),
); break;
/////////////////////// 2300-弓系列 "inf"	=> "dex",// 威力をdex依存にする
		case "2300":
$skill	= array(
"name"	=> "射击",
"img"	=> "item_042.png",
"exp"	=> "",
"sp"	=> "0",
"type"	=> "0",
"learn"	=> "0",
"target"=> array("enemy","individual",1),
"inf"	=> "dex",
"pow"	=> "100",
"invalid"	=> "1",
"priority"	=> "Back",
"charge"=> array(0,0),
"limit"=> array("弓"=>true,),
); break;
		case "2301":
$skill	= array(
"name"	=> "强力射击",
"img"	=> "item_042.png",
"exp"	=> "",
"sp"	=> "10",
"type"	=> "0",
"learn"	=> "6",
"target"=> array("enemy","individual",1),
"inf"	=> "dex",
"pow"	=> "200",
"invalid"	=> "1",
"charge"=> array(0,30),
"limit"=> array("弓"=>true),
); break;
		case "2302":
$skill	= array(
"name"	=> "箭雨",
"img"	=> "item_042.png",
"exp"	=> "",
"sp"	=> "20",
"type"	=> "0",
"learn"	=> "4",
"target"=> array("enemy","multi",6),
"inf"	=> "dex",
"pow"	=> "60",
"invalid"	=> "1",
"charge"=> array(0,0),
"limit"=> array("弓"=>true),
); break;
		case "2303":
$skill	= array(
"name"	=> "麻痹射击",
"img"	=> "item_042.png",
"exp"	=> "",
"sp"	=> "10",
"type"	=> "0",
"learn"	=> "4",
"target"=> array("enemy","individual",1),
"inf"	=> "dex",
"pow"	=> "80",
"invalid"	=> "1",
"priority"	=> "Back",
"charge"=> array(0,0),
"delay"	=> "80",
"limit"=> array("弓"=>true),
); break;
		case "2304":
$skill	= array(
"name"	=> "中毒攻击",
"img"	=> "item_042.png",
"exp"	=> "毒",
"sp"	=> "15",
"type"	=> "0",
"learn"	=> "2",
"target"=> array("enemy","multi",2),
"inf"	=> "dex",
"pow"	=> "50",
"invalid"	=> "1",
"charge"=> array(0,0),
"poison"=> "100",
"limit"=> array("弓"=>true),
); break;
		case "2305":
$skill	= array(
"name"	=> "换位射击",
"img"	=> "item_042.png",
"exp"	=> "后卫化",
"sp"	=> "30",
"type"	=> "0",
"learn"	=> "6",
"target"=> array("enemy","individual",1),
"inf"	=> "dex",
"pow"	=> "100",
"charge"=> array(30,0),
"knockback"	=> "100",
"limit"=> array("弓"=>true),
); break;
		case "2306":
$skill	= array(
"name"	=> "穿透射击",
"img"	=> "item_042.png",
"exp"	=> "无视防御",
"sp"	=> "90",
"type"	=> "0",
"learn"	=> "8",
"target"=> array("enemy","individual",1),
"inf"	=> "dex",
"pow"	=> "180",
"invalid"	=> "1",
"charge"=> array(60,0),
"pierce"=> true,
"limit"=> array("弓"=>true),
); break;
		case "2307":
$skill	= array(
"name"	=> "飓风射击",
"img"	=> "item_042.png",
"exp"	=> "",
"sp"	=> "180",
"type"	=> "0",
"learn"	=> "16",
"target"=> array("enemy","multi",16),
"inf"	=> "dex",
"pow"	=> "70",
"invalid"	=> "1",
"charge"=> array(50,80),
"limit"=> array("弓"=>true),
); break;
		case "2308":
$skill	= array(
"name"	=> "瞄准",
"img"	=> "item_042.png",
"exp"	=> "",
"sp"	=> "0",
"type"	=> "0",
"learn"	=> "4",
"target"=> array("enemy","individual",1),
"inf"	=> "dex",
"pow"	=> "130",
"invalid"	=> "1",
"priority"	=> "Back",
"charge"=> array(0,0),
"limit"=> array("弓"=>true),
); break;
		case "2309":
$skill	= array(
"name"	=> "解除武装",
"img"	=> "item_042.png",
"exp"	=> "",
"sp"	=> "20",
"type"	=> "0",
"learn"	=> "2",
"target"=> array("enemy","individual",1),
"inf"	=> "dex",
"pow"	=> "70",
"invalid"	=> "1",
"priority"	=> "Back",
"DownATK" => "70",
"DownMATK" => "70",
"limit"=> array("弓"=>true),
); break;
		case "2310":
$skill	= array(
"name"	=> "双重射击",
"img"	=> "item_042.png",
"exp"	=> "",
"sp"	=> "28",
"type"	=> "0",
"learn"	=> "0",
"target"=> array("enemy","multi",2),
"inf"	=> "dex",
"pow"	=> "80",
"invalid"	=> "1",
"priority"	=> "Back",
"limit"=> array("弓"=>true),
); break;
		case "2311":
$skill	= array(
"name"	=> "毒云箭",
"img"	=> "item_042.png",
"exp"	=> "毒",
"sp"	=> "60",
"type"	=> "0",
"learn"	=> "6",
"target"=> array("enemy","all",1),
"inf"	=> "dex",
"pow"	=> "60",
"invalid"	=> "1",
"charge"=> array(0,0),
"poison"=> "100",
"limit"=> array("弓"=>true),
); break;
		case "2312":
$skill	= array(
"name"	=> "麻痹散射",
"img"	=> "item_042.png",
"exp"	=> "",
"sp"	=> "240",
"type"	=> "0",
"learn"	=> "12",
"target"=> array("enemy","all",1),
"inf"	=> "dex",
"pow"	=> "150",
"invalid"	=> "1",
"charge"=> array(120,90),
"delay"	=> "60",
"limit"=> array("弓"=>true),
); break;
		case "2313":
$skill	= array(
"name"	=> "解除装甲",
"img"	=> "item_042.png",
"exp"	=> "",
"sp"	=> "50",
"type"	=> "0",
"learn"	=> "5",
"target"=> array("enemy","individual",1),
"inf"	=> "dex",
"pow"	=> "50",
"invalid"	=> "1",
"priority"	=> "Back",
"DownDEF" => "50",
"DownMDEF" => "50",
"limit"=> array("弓"=>true),
); break;
		case "2314":
$skill	= array(
"name"	=> "穿甲射击",
"img"	=> "item_042.png",
"exp"	=> "无视防御",
"sp"	=> "180",
"type"	=> "0",
"learn"	=> "16",
"target"=> array("enemy","multi",3),
"inf"	=> "dex",
"pow"	=> "160",
"invalid"	=> "1",
"charge"=> array(80,0),
"pierce"=> true,
"limit"=> array("弓"=>true),
); break;
		case "2315":
$skill	= array(
"name"	=> "扩散射击",
"img"	=> "item_042.png",
"exp"	=> "",
"sp"	=> "160",
"type"	=> "0",
"learn"	=> "12",
"target"=> array("enemy","all",1),
"inf"	=> "dex",
"pow"	=> "200",
"invalid"	=> "1",
"charge"=> array(40,80),
"limit"=> array("弓"=>true),
); break;
		case "2316":
$skill	= array(
"name"	=> "穿甲散射",
"img"	=> "item_042.png",
"exp"	=> "无视防御",
"sp"	=> "300",
"type"	=> "0",
"learn"	=> "20",
"target"=> array("enemy","all",1),
"inf"	=> "dex",
"pow"	=> "150",
"invalid"	=> "1",
"charge"=> array(100,0),
"pierce"=> true,
"limit"=> array("弓"=>true),
); break;
		case "2317":
$skill	= array(
"name"	=> "爆头一击",
"img"	=> "item_042.png",
"exp"	=> "",
"sp"	=> "150",
"type"	=> "0",
"learn"	=> "10",
"target"=> array("enemy","individual",1),
"inf"	=> "dex",
"pow"	=> "450",
"invalid"	=> "1",
"priority"	=> "Back",
"charge"=> array(30,50),
"limit"=> array("弓"=>true),
); break;
		case "2318":
$skill	= array(
"name"	=> "强弩推射",
"img"	=> "item_042.png",
"exp"	=> "后卫化",
"sp"	=> "60",
"type"	=> "0",
"learn"	=> "12",
"target"=> array("enemy","all",1),
"inf"	=> "dex",
"pow"	=> "80",
"charge"=> array(50,0),
"knockback"	=> "100",
"limit"=> array("弓"=>true),
); break;
		case "2319":
$skill	= array(
"name"	=> "爆破穿击",
"img"	=> "item_042.png",
"exp"	=> "无视防御",
"sp"	=> "240",
"type"	=> "0",
"learn"	=> "12",
"target"=> array("all","all",1),
"inf"	=> "dex",
"pow"	=> "360",
"invalid"	=> "1",
"charge"=> array(120,0),
"pierce"=> true,
"limit"=> array("弓"=>true),
); break;
								// 2400-召喚系
		case "2400":
$skill	= array(
"name"	=> "哥布林召唤",
"img"	=> "skill_066.png",
"exp"	=> "哥布林召唤",
"sp"	=> "100",
"type"	=> "1",
"learn"	=> "99",
"target"=> array("self","individual",1),
"charge"=> array(30,0),
"summon"	=> "1000",
); break;
		case "2401":
$skill	= array(
"name"	=> "召唤小猪",
"img"	=> "skill_028.png",
"exp"	=> "召唤小猪",
"sp"	=> "150",
"type"	=> "0",
"learn"	=> "4",
"target"=> array("self","individual",1),
"charge"=> array(0,100),
"summon"	=> "5008",
); break;
		case "2402":
$skill	= array(
"name"	=> "召唤疯猪",
"img"	=> "skill_028.png",
"exp"	=> "召唤疯猪",
"sp"	=> "250",
"type"	=> "0",
"learn"	=> "10",
"target"=> array("self","individual",1),
"charge"=> array(0,300),
"summon"	=> "5009",
); break;
		case "2403":
$skill	= array(
"name"	=> "大怪物召唤",
"img"	=> "skill_029.png",
"exp"	=> "大怪物召唤",
"sp"	=> "350",
"type"	=> "0",
"learn"	=> "20",
"target"=> array("self","individual",1),
"charge"=> array(0,500),
"summon"	=> "5010",
); break;
		case "2404":
$skill	= array(
"name"	=> "召唤狮子",
"img"	=> "skill_028.png",
"exp"	=> "召唤狮子",
"sp"	=> "150",
"type"	=> "0",
"learn"	=> "4",
"target"=> array("self","individual",1),
"charge"=> array(0,100),
"summon"	=> "5011",
"quick"	=> true,
); break;
		case "2405":
$skill	= array(
"name"	=> "召唤熊",
"img"	=> "skill_028.png",
"exp"	=> "召唤熊",
"sp"	=> "250",
"type"	=> "0",
"learn"	=> "10",
"target"=> array("self","individual",1),
"charge"=> array(0,300),
"summon"	=> "5012",
"quick"	=> true,
); break;
		case "2406":
$skill	= array(
"name"	=> "召唤合成兽",
"img"	=> "skill_029.png",
"exp"	=> "召唤合成兽",
"sp"	=> "350",
"type"	=> "0",
"learn"	=> "20",
"target"=> array("self","individual",1),
"charge"=> array(0,500),
"summon"	=> "5013",
"quick"	=> true,
); break;
		case "2407":
$skill	= array(
"name"	=> "召唤雪男",
"img"	=> "skill_028.png",
"exp"	=> "召唤雪男",
"sp"	=> "250",
"type"	=> "0",
"learn"	=> "10",
"target"=> array("self","individual",1),
"charge"=> array(0,300),
"summon"	=> "5014",
"quick"	=> true,
); break;
		case "2408":
$skill	= array(
"name"	=> "召唤小妖精",
"img"	=> "skill_028.png",
"exp"	=> "召唤小妖精",
"sp"	=> "150",
"type"	=> "0",
"learn"	=> "4",
"target"=> array("self","individual",1),
"charge"=> array(0,100),
"summon"	=> "5015",
"quick"	=> true,
); break;
		case "2409":
$skill	= array(
"name"	=> "召唤飞河马",
"img"	=> "skill_028.png",
"exp"	=> "召唤飞河马",
"sp"	=> "250",
"type"	=> "0",
"learn"	=> "10",
"target"=> array("self","individual",1),
"charge"=> array(0,300),
"summon"	=> "5016",
"quick"	=> true,
); break;
		case "2410":
$skill	= array(
"name"	=> "召唤龙",
"img"	=> "skill_029.png",
"exp"	=> "召唤龙",
"sp"	=> "350",
"type"	=> "0",
"learn"	=> "20",
"target"=> array("self","individual",1),
"charge"=> array(0,500),
"summon"	=> "5017",
"quick"	=> true,
); break;
		case "2411":
$skill	= array(
"name"	=> "召唤疯猪王",
"img"	=> "skill_029.png",
"exp"	=> "召唤疯猪王",
"sp"	=> "550",
"type"	=> "0",
"learn"	=> "30",
"target"=> array("self","individual",1),
"charge"=> array(0,800),
"summon"	=> "5018",
"quick"	=> true,
); break;
		case "2412":
$skill	= array(
"name"	=> "召唤地狱犬",
"img"	=> "skill_029.png",
"exp"	=> "召唤地狱犬",
"sp"	=> "550",
"type"	=> "0",
"learn"	=> "30",
"target"=> array("self","individual",1),
"charge"=> array(0,800),
"summon"	=> "5019",
"quick"	=> true,
); break;
		case "2413":
$skill	= array(
"name"	=> "召唤陨石龟",
"img"	=> "skill_029.png",
"exp"	=> "召唤陨石龟",
"sp"	=> "550",
"type"	=> "0",
"learn"	=> "30",
"target"=> array("self","individual",1),
"charge"=> array(0,800),
"summon"	=> "5020",
"quick"	=> true,
); break;
				// 2460 - 僵尸?
		case "2460":
$skill	= array(
"name"	=> "僵尸",
"img"	=> "skill_028.png",
"exp"	=> "僵尸",
"sp"	=> "60",
"type"	=> "1",
"learn"	=> "2",
"target"=> array("self","individual",1),
"charge"=> array(30,0),
"summon"	=> "5004",
); break;
		case "2461":
$skill	= array(
"name"	=> "食尸鬼",
"img"	=> "skill_028.png",
"exp"	=> "食尸鬼",
"sp"	=> "100",
"type"	=> "1",
"learn"	=> "4",
"target"=> array("self","individual",1),
"charge"=> array(40,0),
"summon"	=> "5005",
); break;
		case "2462":
$skill	= array(
"name"	=> "木乃伊",
"img"	=> "skill_028.png",
"exp"	=> "木乃伊",
"sp"	=> "120",
"type"	=> "1",
"learn"	=> "6",
"target"=> array("self","individual",1),
"charge"=> array(60,0),
"summon"	=> "5006",
); break;
		case "2463":
$skill	= array(
"name"	=> "僵尸控制",
"img"	=> "skill_028.png",
"exp"	=> "3体召唤",
"sp"	=> "200",
"type"	=> "1",
"learn"	=> "8",
"target"=> array("self","individual",1),
"charge"=> array(50,50),
"summon"	=> array(5004,5005,5004),
); break;
		case "2464":
$skill	= array(
"name"	=> "墓地",
"img"	=> "skill_028.png",
"exp"	=> "3体召唤",
"sp"	=> "360",
"type"	=> "1",
"learn"	=> "12",
"target"=> array("self","individual",1),
"charge"=> array(100,0),
"summon"	=> array(5006,5007,5006),
); break;
		case "2465":
$skill	= array(
"name"	=> "生化危机",
"img"	=> "skill_028.png",
"exp"	=> "5体召唤",
"sp"	=> "560",
"type"	=> "1",
"learn"	=> "16",
"target"=> array("self","individual",1),
"charge"=> array(160,0),
"summon"	=> array(5004,5006,5007,5006,5004),
); break;
		case "2466":
$skill	= array(
"name"	=> "红魔馆召唤",
"img"	=> "skill_028.png",
"exp"	=> "",
"sp"	=> "0",
"type"	=> "1",
"learn"	=> "99",
"target"=> array("self","individual",1),
"charge"=> array(0,1000),
"summon"	=> "5203",
); break;
		case "2467":
$skill	= array(
"name"	=> "木乃伊勇士",
"img"	=> "skill_028.png",
"exp"	=> "木乃伊",
"sp"	=> "240",
"type"	=> "1",
"learn"	=> "8",
"target"=> array("self","individual",1),
"charge"=> array(80,0),
"summon"	=> "5023",
); break;
		case "2468":
$skill	= array(
"name"	=> "木乃伊小队",
"img"	=> "skill_028.png",
"exp"	=> "3体召唤",
"sp"	=> "480",
"type"	=> "1",
"learn"	=> "16",
"target"=> array("self","individual",1),
"charge"=> array(120,0),
"summon"	=> array(5023,5023,5023),
); break;
		case "2469":
$skill	= array(
"name"	=> "木乃伊大军",
"img"	=> "skill_028.png",
"exp"	=> "5体召唤",
"sp"	=> "960",
"type"	=> "1",
"learn"	=> "24",
"target"=> array("self","individual",1),
"charge"=> array(180,0),
"summon"	=> array(5007,5023,5024,5023,5007),
); break;
								// 2480
		case "2480":
$skill	= array(
"name"	=> "治愈兔",
"img"	=> "skill_038.png",
"exp"	=> "召唤治疗兔子",
"sp"	=> "60",
"type"	=> "1",
"learn"	=> "4",
"target"=> array("self","individual",1),
"charge"=> array(0,0),
"summon"	=> "5000",
"quick"	=> true,
); break;
		case "2481":
$skill	= array(
"name"	=> "天使降临",
"img"	=> "skill_038.png",
"exp"	=> "天使降临",
"sp"	=> "160",
"type"	=> "1",
"learn"	=> "10",
"target"=> array("self","individual",1),
"charge"=> array(60,0),
"summon"	=> "5001",
"quick"	=> true,
); break;
		case "2482":
$skill	= array(
"name"	=> "天使精灵",
"img"	=> "skill_038.png",
"exp"	=> "",
"sp"	=> "360",
"type"	=> "1",
"learn"	=> "16",
"target"=> array("self","individual",1),
"charge"=> array(60,60),
"summon"	=> "5021",
"quick"	=> true,
); break;
		case "2483":
$skill	= array(
"name"	=> "神将降临",
"img"	=> "skill_038.png",
"exp"	=> "",
"sp"	=> "600",
"type"	=> "1",
"learn"	=> "24",
"target"=> array("self","individual",1),
"charge"=> array(60,120),
"summon"	=> "5022",
"quick"	=> true,
); break;
//-----------------------------------------	2500 まだ召喚系
		case "2500":
$skill	= array(
"name"	=> "伊弗里特",
"img"	=> "skill_029.png",
"exp"	=> "",
"sp"	=> "700",
"type"	=> "1",
"learn"	=> "20",
"target"=> array("self","individual",1),
"charge"=> array(100,300),
"summon"	=> "5103",
"quick"	=> true,
"MagicCircleDeleteTeam"	=> 4,
); break;
		case "2501":
$skill	= array(
"name"	=> "利维坦",
"img"	=> "skill_029.png",
"exp"	=> "",
"sp"	=> "700",
"type"	=> "1",
"learn"	=> "20",
"target"=> array("self","individual",1),
"charge"=> array(100,300),
"summon"	=> "5104",
"quick"	=> true,
"MagicCircleDeleteTeam"	=> 4,
); break;
		case "2502":
$skill	= array(
"name"	=> "天使长",
"img"	=> "skill_029.png",
"exp"	=> "",
"sp"	=> "900",
"type"	=> "1",
"learn"	=> "30",
"target"=> array("self","individual",1),
"charge"=> array(100,300),
"summon"	=> "5100",
"quick"	=> true,
"MagicCircleDeleteTeam"	=> 5,
); break;
		case "2503":
$skill	= array(
"name"	=> "堕落天使",
"img"	=> "skill_029.png",
"exp"	=> "",
"sp"	=> "900",
"type"	=> "1",
"learn"	=> "30",
"target"=> array("self","individual",1),
"charge"=> array(100,300),
"summon"	=> "5101",
"quick"	=> true,
"MagicCircleDeleteTeam"	=> 5,
); break;
		case "2504":
$skill	= array(
"name"	=> "托尔",
"img"	=> "skill_029.png",
"exp"	=> "",
"sp"	=> "1200",
"type"	=> "1",
"learn"	=> "35",
"target"=> array("self","individual",1),
"charge"=> array(100,500),
"summon"	=> "5102",
"quick"	=> true,
"MagicCircleDeleteTeam"	=> 5,
); break;
		case "2505":
$skill	= array(
"name"	=> "天空龙",
"img"	=> "skill_029.png",
"exp"	=> "",
"sp"	=> "1800",
"type"	=> "1",
"learn"	=> "50",
"target"=> array("self","individual",1),
"charge"=> array(100,1000),
"summon"	=> "5107",
"quick"	=> true,
"MagicCircleDeleteTeam"	=> 5,
); break;
		case "2506":
$skill	= array(
"name"	=> "翡翠龙",
"img"	=> "skill_029.png",
"exp"	=> "",
"sp"	=> "1800",
"type"	=> "1",
"learn"	=> "50",
"target"=> array("self","individual",1),
"charge"=> array(100,1000),
"summon"	=> "5108",
"quick"	=> true,
"MagicCircleDeleteTeam"	=> 5,
); break;
		case "2507":
$skill	= array(
"name"	=> "巨岩龙",
"img"	=> "skill_029.png",
"exp"	=> "",
"sp"	=> "1800",
"type"	=> "1",
"learn"	=> "50",
"target"=> array("self","individual",1),
"charge"=> array(100,1000),
"summon"	=> "5109",
"quick"	=> true,
"MagicCircleDeleteTeam"	=> 5,
); break;
////////////////////////////////////////
		case "3000"://	3000 - 其他
$skill	= array(
"name"	=> "治疗",
"img"	=> "skill_013a.png",
"exp"	=> "HP回复",
"sp"	=> "5",
"type"	=> "1",
"learn"	=> "0",
"target"=> array("friend","individual",1),
"pow"	=> "200",
"support"	=> "1",
"priority"	=> "LowHpRate",
"exp"	=> "",
"charge"=> array(30,0),
); break;
		case "3001":
$skill	= array(
"name"	=> "高级治疗",
"img"	=> "skill_013b.png",
"exp"	=> "HP回复",
"sp"	=> "20",
"type"	=> "1",
"learn"	=> "4",
"target"=> array("friend","multi",2),
"pow"	=> "300",
"support"	=> "1",
"priority"	=> "LowHpRate",
"charge"=> array(50,0),
); break;
		case "3002":
$skill	= array(
"name"	=> "群体回复",
"img"	=> "skill_013c.png",
"exp"	=> "HP回复",
"sp"	=> "30",
"type"	=> "1",
"learn"	=> "12",
"target"=> array("friend","all",1),
"pow"	=> "150",
"support"	=> "1",
"priority"	=> "LowHpRate",
"charge"=> array(50,0),
); break;
		case "3003":
$skill	= array(
"name"	=> "快速回复",
"img"	=> "skill_013b.png",
"exp"	=> "HP回复",
"sp"	=> "20",
"type"	=> "1",
"learn"	=> "4",
"target"=> array("friend","multi",2),
"pow"	=> "180",
"support"	=> "1",
"priority"	=> "LowHpRate",
); break;
		case "3004":
$skill	= array(
"name"	=> "整体回复",
"img"	=> "skill_013b.png",
"exp"	=> "HP回复",
"sp"	=> "30",
"type"	=> "1",
"learn"	=> "10",
"target"=> array("friend","multi",3),
"pow"	=> "200",
"support"	=> "1",
"priority"	=> "LowHpRate",
"charge"=> array(40,0),
); break;
		case "3005":
$skill	= array(
"name"	=> "渐渐回复",
"img"	=> "skill_013b.png",
"exp"	=> "对象HP30%以下时回复量2倍",
"sp"	=> "30",
"type"	=> "1",
"learn"	=> "4",
"target"=> array("friend","multi",3),
"pow"	=> "125",
"support"	=> "1",
"priority"	=> "LowHpRate",
"charge"=> array(20,0),
); break;
		case "3006":
$skill	= array(
"name"	=> "群体愈合",
"img"	=> "skill_013c.png",
"exp"	=> "HP回复",
"sp"	=> "60",
"type"	=> "1",
"learn"	=> "16",
"target"=> array("friend","all",1),
"pow"	=> "360",
"support"	=> "1",
"priority"	=> "LowHpRate",
"charge"=> array(60,30),
); break;
		case "3007":
$skill	= array(
"name"	=> "超级治疗",
"img"	=> "skill_013b.png",
"exp"	=> "HP回复",
"sp"	=> "60",
"type"	=> "1",
"learn"	=> "6",
"target"=> array("friend","multi",3),
"pow"	=> "360",
"support"	=> "1",
"priority"	=> "LowHpRate",
"charge"=> array(60,30),
); break;
		case "3008":
$skill	= array(
"name"	=> "快速治疗",
"img"	=> "skill_013a.png",
"exp"	=> "HP回复",
"sp"	=> "40",
"type"	=> "1",
"learn"	=> "8",
"target"=> array("friend","multi",2),
"pow"	=> "240",
"support"	=> "1",
"priority"	=> "LowHpRate",
); break;
		case "3009":
$skill	= array(
"name"	=> "渐渐愈合",
"img"	=> "skill_013b.png",
"exp"	=> "对象HP30%以下时回复量2倍",
"sp"	=> "60",
"type"	=> "1",
"learn"	=> "6",
"target"=> array("friend","multi",3),
"pow"	=> "160",
"support"	=> "1",
"priority"	=> "LowHpRate",
"charge"=> array(10,60),
); break;
		case "3010"://	3010
$skill	= array(
"name"	=> "恢复精神",
"img"	=> "skill_019.png",
"exp"	=> "SP回复",
"sp"	=> "0",
"type"	=> "1",
"learn"	=> "0",
"target"=> array("self","individual",1),
"support"	=> "1",
); break;
		case "3011":
$skill	= array(
"name"	=> "集中精神",
"img"	=> "skill_019z.png",
"exp"	=> "SP回复",
"sp"	=> "0",
"type"	=> "1",
"learn"	=> "2",
"target"=> array("self","individual",1),
"support"	=> "1",
"charge"	=> array(30,0),
); break;
		case "3012":
$skill	= array(
"name"	=> "血转魔",
"img"	=> "skill_019y.png",
"exp"	=> "SP回复",
"sp"	=> "0",
"type"	=> "1",
"learn"	=> "6",
"target"=> array("self","individual",1),
"pow"	=> "100",
"support"	=> "1",
"charge"	=> array(20,0),
); break;
		case "3013":
$skill	= array(
"name"	=> "魔转血",
"img"	=> "exchange.png",
"exp"	=> "HP,SP交换(%)",
"sp"	=> "10",
"type"	=> "1",
"learn"	=> "10",
"target"=> array("self","individual",1),
"support"	=> "1",
); break;
		case "3020":
$skill	= array(
"name"	=> "魔力上升",
"img"	=> "skill_019.png",
"exp"	=> "最大SP上升",
"sp"	=> "100",
"type"	=> "1",
"learn"	=> "2",
"target"=> array("self","individual",1),
"support"	=> "1",
); break;
		case "3021":
$skill	= array(
"name"	=> "精神集中",
"img"	=> "skill_019z.png",
"exp"	=> "SP回复",
"sp"	=> "0",
"type"	=> "1",
"learn"	=> "8",
"target"=> array("self","individual",1),
"support"	=> "1",
"charge"	=> array(30,0),
"UpSPD"	=> "50",
"UpMATK"	=> "25",
"UpATK"	=> "25",
); break;
					// 3030
		case "3030":
$skill	= array(
"name"	=> "异常恢复",
"img"	=> "skill_008.png",
"exp"	=> "状态异常恢复",
"sp"	=> "30",
"type"	=> "1",
"learn"	=> "2",
"target"=> array("friend","all",1),
"support"	=> "1",
"pow"	=> "70",
"charge"	=> array(50,0),
"CurePoison"	=> true,
); break;
					// 3040
		case "3040":
$skill	= array(
"name"	=> "复苏",
"img"	=> "mat_026.png",
"exp"	=> "复苏",
"sp"	=> "120",
"type"	=> "1",
"learn"	=> "10",
"target"=> array("friend","individual",1),
"support"	=> "1",
"charge"	=> array(40,30),
"pow"		=> "600",
"priority"	=> "Dead",
); break;
		case "3041":
$skill	= array(
"name"	=> "死者苏生",
"img"	=> "skill_008.png",
"exp"	=> "复苏",
"sp"	=> "500",
"type"	=> "1",
"learn"	=> "25",
"target"=> array("friend","multi",2),
"support"	=> "1",
"charge"	=> array(0,250),
"pow"		=> "250",
"priority"	=> "Dead",
); break;
		case "3042":
$skill	= array(
"name"	=> "死者转生",
"img"	=> "mat_026.png",
"exp"	=> "复苏",
"sp"	=> "350",
"type"	=> "1",
"learn"	=> "15",
"target"=> array("friend","individual",1),
"support"	=> "1",
"charge"	=> array(0,150),
"pow"		=> "150",
"priority"	=> "Dead",
); break;
//---------------------------------- 3050
		case "3050":
$skill	= array(
"name"	=> "立即行动",
"img"	=> "skill_015.png",
"exp"	=> "立即行动",
"sp"	=> "150",
"type"	=> "1",
"learn"	=> "10",
"target"=> array("friend","all",1),
"support"	=> "1",
"charge"	=> array(200,100),
); break;
		case "3051":
$skill	= array(
"name"	=> "时间跳跃",
"img"	=> "skill_015.png",
"exp"	=> "立即行动",
"sp"	=> "600",
"type"	=> "1",
"learn"	=> "30",
"target"=> array("friend","all",1),
"support"	=> "1",
"charge"	=> array(30,600),
); break;
		case "3052":
$skill	= array(
"name"	=> "不知道发生了什么",
"img"	=> "skill_015.png",
"exp"	=> "立即行动",
"sp"	=> "90",
"type"	=> "1",
"learn"	=> "99",
"target"=> array("friend","all",1),
"support"	=> "1",
"charge"	=> array(0,90),
); break;
//---------------------------------- 3055
		case "3055":
$skill	= array(
"name"	=> "加快咏唱",
"img"	=> "skill_016z.png",
"exp"	=> "加快咏唱",
"sp"	=> "150",
"type"	=> "1",
"learn"	=> "10",
"target"=> array("friend","all",1),
"support"	=> "1",
"charge"	=> array(0,100),
); break;
		case "3056":
$skill	= array(
"name"	=> "超快咏唱",
"img"	=> "skill_016z.png",
"exp"	=> "加快咏唱",
"sp"	=> "400",
"type"	=> "1",
"learn"	=> "20",
"target"=> array("friend","all",1),
"support"	=> "1",
"charge"	=> array(0,200),
); break;
//---------------------------------- 3060
		case "3060":
$skill	= array(
"name"	=> "圣光防护",
"img"	=> "skill_045z.png",
"exp"	=> "一回合受伤无效化",
"sp"	=> "100",
"type"	=> "1",
"learn"	=> "10",
"target"=> array("friend","all",1),
"support"	=> "1",
"charge"	=> array(0,100),
); break;
//-------------------------- 3101
		case "3101"://	3101
$skill	= array(
"name"	=> "祝福",
"img"	=> "skill_008.png",
"exp"	=> "SP回复",
"sp"	=> "0",
"type"	=> "1",
"learn"	=> "0",
"target"=> array("friend","all",1),
"SpRecoveryRate"	=> 3,
"support"	=> "1",
); break;
		case "3102":
$skill	= array(
"name"	=> "大祝福",
"img"	=> "skill_009.png",
"exp"	=> "SP回复",
"sp"	=> "20",
"type"	=> "1",
"learn"	=> "4",
"target"=> array("friend","all",1),
"SpRecoveryRate"	=> 5,
"support"	=> "1",
"charge"	=> array(40,0),
); break;
		case "3103":
$skill	= array(
"name"	=> "圣域",
"img"	=> "skill_010.png",
"exp"	=> "HP,SP回复",
"sp"	=> "150",
"type"	=> "1",
"learn"	=> "8",
"target"=> array("friend","all",1),
"pow"	=> "500",
"SpRecoveryRate"	=> 7,
"support"	=> "1",
"charge"	=> array(50,0),
"MagicCircleDeleteTeam"	=> 2,
"CurePoison"	=> true,
); break;
		case "3104":
$skill	= array(
"name"	=> "神界降临",
"img"	=> "skill_010.png",
"exp"	=> "HP,SP回复",
"sp"	=> "400",
"type"	=> "1",
"learn"	=> "14",
"target"=> array("friend","all",1),
"pow"	=> "1000",
"SpRecoveryRate"	=> 10,
"support"	=> "1",
"charge"	=> array(100,40),
"MagicCircleDeleteTeam"	=> 4,
"CurePoison"	=> true,
); break;
		case "3105":
$skill	= array(
"name"	=> "超祝福",
"img"	=> "skill_009.png",
"exp"	=> "SP回复",
"sp"	=> "80",
"type"	=> "1",
"learn"	=> "8",
"target"=> array("friend","all",1),
"SpRecoveryRate"	=> 8,
"support"	=> "1",
"charge"	=> array(80,0),
); break;
//----------------------------- 3110
		case "3110":
$skill	= array(
"name"	=> "强化",
"img"	=> "skill_059.png",
"exp"	=> "自己强化",
"sp"	=> "10",
"type"	=> "0",
"learn"	=> "2",
"target"=> array("self","individual",1),
"support"	=> "1",
"UpSTR"	=> "30",
); break;
		case "3111":
$skill	= array(
"name"	=> "超限",
"img"	=> "skill_059z.png",
"exp"	=> "自己强化·弱",
"sp"	=> "10",
"type"	=> "0",
"learn"	=> "8",
"target"=> array("self","individual",1),
"support"	=> "1",
"UpSTR"	=> "80",
"DownMAXHP"	=> "20",
); break;
		case "3112":
$skill	= array(
"name"	=> "防御",
"img"	=> "skill_059y.png",
"exp"	=> "自己强化·弱·前卫化",
"sp"	=> "10",
"type"	=> "0",
"learn"	=> "6",
"target"=> array("self","individual",1),
"support"	=> "1",
"UpDEF"=> "20",
"DownSTR"=> "20",
"move"	=> "front",
); break;
		case "3113":
$skill	= array(
"name"	=> "狂暴化",
"img"	=> "skill_058z.png",
"exp"	=> "狂暴化",
"sp"	=> "0",
"type"	=> "0",
"learn"	=> "12",
"target"=> array("self","individual",1),
"support"	=> "1",
); break;
		case "3114":
$skill	= array(
"name"	=> "迎击准备",
"img"	=> "skill_059y.png",
"exp"	=> "自己强化",
"sp"	=> "20",
"type"	=> "0",
"learn"	=> "8",
"target"=> array("self","individual",1),
"support"	=> "1",
"UpDEF"=> "80",
"UpMDEF"=> "80",
"DownSPD"=> "80",
"move"	=> "front",
); break;
		case "3115":
$skill	= array(
"name"	=> "气魄之力",
"img"	=> "skill_059.png",
"exp"	=> "自己强化",
"sp"	=> "150",
"type"	=> "0",
"learn"	=> "5",
"target"=> array("self","individual",1),
"charge"	=> array(50,0),
"support"	=> "1",
"UpSTR"	=> "50",
"UpATK"	=> "50",
); break;
		case "3116":
$skill	= array(
"name"	=> "魔力契约",
"img"	=> "skill_059.png",
"exp"	=> "自己强化",
"sp"	=> "180",
"type"	=> "1",
"learn"	=> "6",
"target"=> array("self","individual",1),
"charge"	=> array(60,0),
"support"	=> "1",
"UpINT"	=> "50",
"UpMATK"	=> "50",
); break;
		case "3120":
$skill	= array(
"name"	=> "急救",
"img"	=> "skill_014.png",
"exp"	=> "自己HP回复",
"sp"	=> "0",
"type"	=> "0",
"learn"	=> "1",
"target"=> array("self","individual",1),
"support"	=> "1",
); break;
		case "3121":
$skill	= array(
"name"	=> "自我回复",
"img"	=> "skill_062.png",
"exp"	=> "",
"sp"	=> "15",
"type"	=> "0",
"learn"	=> "4",
"target"=> array("self","individual",1),
"support"	=> "1",
); break;
		case "3122":
$skill	= array(
"name"	=> "超回复",
"img"	=> "skill_062y.png",
"exp"	=> "恢复自己损失掉的HP中的60%",
"sp"	=> "20",
"type"	=> "0",
"learn"	=> "4",
"target"=> array("self","individual",1),
"support"	=> "1",
"charge"=> array(0,30),
); break;
		case "3123":
$skill	= array(
"name"	=> "自我持续回复",
"img"	=> "skill_062x.png",
"exp"	=> "HP持续回复力+10%",
"sp"	=> "10",
"type"	=> "0",
"learn"	=> "5",
"target"=> array("self","individual",1),
"support"	=> "1",
"charge"=> array(10,10),
"HpRegen"	=> 10,
); break;
		case "3124":
$skill	= array(
"name"	=> "垂死挣扎",
"img"	=> "skill_062y.png",
"exp"	=> "血量20%以下使用，恢复自己损失掉的HP中的80%",
"sp"	=> "80",
"type"	=> "0",
"learn"	=> "8",
"target"=> array("self","individual",1),
"support"	=> "1",
"charge"=> array(0,80),
); break;
		case "3130":
$skill	= array(
"name"	=> "咏唱辅助",
"img"	=> "skill_062x.png",
"exp"	=> "咏唱辅助",
"sp"	=> "10",
"type"	=> "0",
"learn"	=> "3",
"target"=> array("self","individual",1),
"support"	=> "1",
"charge"=> array(0,30),
"HpRegen"	=> 10,
); break;
		case "3135":
$skill	= array(
"name"	=> "圣光盾",
"img"	=> "skill_062x.png",
"exp"	=> "一回合伤害无效化",
"sp"	=> "10",
"type"	=> "0",
"learn"	=> "3",
"target"=> array("self","individual",1),
"support"	=> "1",
"charge"=> array(0,30),
); break;
		case "3136":
$skill	= array(
"name"	=> "生命护盾",
"img"	=> "skill_057.png",
"exp"	=> "",
"sp"	=> "240",
"type"	=> "1",
"learn"	=> "12",
"target"=> array("friend","all",1),
"support"	=> "1",
"pow"	=> "120",
"charge"	=> array(40,20),
); break;
		case "3137":
$skill	= array(
"name"	=> "能量护盾",
"img"	=> "skill_009.png",
"exp"	=> "",
"sp"	=> "240",
"type"	=> "1",
"learn"	=> "12",
"target"=> array("friend","all",1),
"SpRecoveryRate"	=> 4,
"support"	=> "1",
"charge"	=> array(40,20),
); break;
		case "3138":
$skill	= array(
"name"	=> "风神附体",
"img"	=> "skill_059.png",
"exp"	=> "速度强化",
"sp"	=> "100",
"type"	=> "1",
"learn"	=> "10",
"target"=> array("self","individual",1),
"support"	=> "1",
"UpSPD"	=> "100",
); break;
		case "3139":
$skill	= array(
"name"	=> "风之加护",
"img"	=> "skill_044.png",
"sp"	=> "300",
"type"	=> "1",
"learn"	=> "20",
"target"=> array("friend","all",1),
"support"	=> "1",
"UpSPD"	=> "30",
); break;
//-----------------------------------------------// 3200
		case "3200":
$skill	= array(
"name"	=> "勇气",
"img"	=> "skill_044.png",
"sp"	=> "60",
"type"	=> "1",
"learn"	=> "6",
"target"=> array("friend","all",1),
"support"	=> "1",
"charge"	=> array(30,0),
"UpSTR"	=> "30",
); break;
		case "3201":
$skill	= array(
"name"	=> "休战增援",
"img"	=> "skill_044.png",
"sp"	=> "150",
"type"	=> "0",
"learn"	=> "6",
"target"=> array("friend","all",1),
"support"	=> "1",
"charge"	=> array(30,60),
"UpDEF"	=> "50",
); break;
		case "3202":
$skill	= array(
"name"	=> "抗魔结界",
"img"	=> "skill_044.png",
"sp"	=> "300",
"type"	=> "1",
"learn"	=> "6",
"target"=> array("friend","all",1),
"support"	=> "1",
"charge"	=> array(30,60),
"UpMDEF"	=> "50",
); break;
						// 3205
		case "3205":
$skill	= array(
"name"	=> "害怕",
"img"	=> "skill_048.png",
"sp"	=> "60",
"type"	=> "1",
"learn"	=> "6",
"target"=> array("enemy","all",1),
"support"	=> "1",
"charge"	=> array(30,0),
"DownSTR"	=> "40",
); break;
		case "3206":
$skill	= array(
"name"	=> "狂怒",
"img"	=> "skill_048.png",
"sp"	=> "80",
"type"	=> "1",
"learn"	=> "4",
"target"=> array("enemy","all",1),
"support"	=> "1",
"charge"	=> array(80,80),
"DownSTR"	=> "40",
"DownINT"	=> "40",
"DownSPD"	=> "40",
); break;
						// 3210
		case "3210":
$skill	= array(
"name"	=> "魅力",
"img"	=> "skill_046.png",
"sp"	=> "60",
"type"	=> "1",
"learn"	=> "6",
"target"=> array("friend","all",1),
"support"	=> "1",
"charge"	=> array(30,0),
"UpINT"	=> "30",
); break;
						// 3215
		case "3215":
$skill	= array(
"name"	=> "破坏智力",
"img"	=> "skill_050.png",
"sp"	=> "60",
"type"	=> "1",
"learn"	=> "6",
"target"=> array("enemy","all",1),
"support"	=> "1",
"charge"	=> array(30,0),
"DownINT"	=> "40",
); break;
		case "3216":
$skill	= array(
"name"	=> "白刃战",
"img"	=> "skill_050.png",
"sp"	=> "100",
"type"	=> "1",
"learn"	=> "10",
"target"=> array("all","all",1),
"support"	=> "1",
"charge"	=> array(100,100),
"DownINT"	=> "100",
"DowMATK"	=> "100",
); break;
		case "3217":
$skill	= array(
"name"	=> "肉体强化",
"img"	=> "skill_050.png",
"sp"	=> "200",
"type"	=> "1",
"learn"	=> "12",
"target"=> array("all","all",1),
"support"	=> "1",
"charge"	=> array(100,100),
"UpSTR"	=> "100",
); break;
						// 3220
		case "3220":
$skill	= array(
"name"	=> "防御地带",
"img"	=> "skill_045.png",
"sp"	=> "60",
"type"	=> "1",
"learn"	=> "6",
"target"=> array("friend","all",1),
"support"	=> "1",
"charge"	=> array(30,0),
"UpDEF"	=> "10",
); break;
		case "3221":
$skill	= array(
"name"	=> "防护+",
"img"	=> "skill_045.png",
"sp"	=> "90",
"type"	=> "1",
"learn"	=> "6",
"target"=> array("friend","all",1),
"support"	=> "1",
"charge"	=> array(90,0),
"UpDEF"	=> "15",
); break;
		case "3222":
$skill	= array(
"name"	=> "防护Q",
"img"	=> "skill_045.png",
"sp"	=> "70",
"type"	=> "1",
"learn"	=> "6",
"target"=> array("friend","all",1),
"support"	=> "1",
"charge"	=> array(0,0),
"UpDEF"	=> "5",
); break;
						// 3230
		case "3230":
$skill	= array(
"name"	=> "力量地带",
"img"	=> "skill_070.png",
"sp"	=> "60",
"type"	=> "1",
"learn"	=> "6",
"target"=> array("friend","all",1),
"support"	=> "1",
"charge"	=> array(30,0),
"UpMDEF"	=> "10",
); break;
		case "3231":
$skill	= array(
"name"	=> "力量地带[自我]",
"img"	=> "skill_070.png",
"sp"	=> "30",
"type"	=> "1",
"learn"	=> "6",
"target"=> array("self","individual",1),
"support"	=> "1",
"charge"	=> array(30,0),
"UpMDEF"	=> "30",
); break;
						// 3235
		case "3235":
$skill	= array(
"name"	=> "抗性降低",
"img"	=> "skill_071.png",
"sp"	=> "60",
"type"	=> "1",
"learn"	=> "6",
"target"=> array("enemy","all",1),
"support"	=> "1",
"charge"	=> array(30,10),
"DownMDEF"	=> "10",
); break;
//---------------------------- 3250
		case "3250":
$skill	= array(
"name"	=> "力量辅助",
"img"	=> "skill_044.png",
"sp"	=> "60",
"type"	=> "1",
"learn"	=> "6",
"target"=> array("friend","all",1),
"support"	=> "1",
"charge"	=> array(30,0),
"PlusSTR"	=> 30,
); break;
		case "3255":
$skill	= array(
"name"	=> "魔法辅助",
"img"	=> "skill_046.png",
"sp"	=> "60",
"type"	=> "1",
"learn"	=> "6",
"target"=> array("friend","all",1),
"support"	=> "1",
"charge"	=> array(30,0),
"PlusINT"	=> 30,
); break;
		case "3265":
$skill	= array(
"name"	=> "速度辅助",
"img"	=> "skill_015.png",
"sp"	=> "60",
"type"	=> "1",
"learn"	=> "6",
"target"=> array("friend","all",1),
"support"	=> "1",
"charge"	=> array(30,0),
"PlusSPD"	=> 20,
); break;
		case "3270":
$skill	= array(
"name"	=> "攻击辅助",
"img"	=> "skill_015.png",
"sp"	=> "300",
"type"	=> "1",
"learn"	=> "12",
"target"=> array("friend","all",1),
"support"	=> "1",
"charge"	=> array(60,0),
"UpATK"	=> "15",
"UpMATK"	=> "15",
); break;
		case "3275":
$skill	= array(
"name"	=> "控制力强化",
"img"	=> "skill_015.png",
"sp"	=> "200",
"type"	=> "1",
"learn"	=> "8",
"target"=> array("friend","all",1),
"support"	=> "1",
"charge"	=> array(60,40),
"UpLUK"	=> "100",
); break;
//------------------------------------------------// 3300 - 召唤物强化系
		case "3300":
$skill	= array(
"name"	=> "召唤物强化",
"img"	=> "we_other007.png",
"exp"	=> "召唤物强化",
"sp"	=> "60",
"type"	=> "0",
"learn"	=> "4",
"target"=> array("friend","all",1),
"support"	=> "1",
"charge"	=> array(0,50),
"UpSTR"	=> "80",
"limit"=> array("鞭"=>true,),
); break;
		case "3301":
$skill	= array(
"name"	=> "召唤物智力强化",
"img"	=> "we_other007.png",
"exp"	=> "召唤物强化",
"sp"	=> "60",
"type"	=> "0",
"learn"	=> "4",
"target"=> array("friend","all",1),
"support"	=> "1",
"charge"	=> array(0,50),
"UpINT"	=> "80",
"limit"=> array("鞭"=>true,),
); break;
		case "3302":
$skill	= array(
"name"	=> "召唤物速度强化",
"img"	=> "we_other007.png",
"exp"	=> "召唤物强化",
"sp"	=> "60",
"type"	=> "0",
"learn"	=> "4",
"target"=> array("friend","all",1),
"support"	=> "1",
"charge"	=> array(0,50),
"UpSPD"	=> "50",
"limit"=> array("鞭"=>true,),
); break;
		case "3303":
$skill	= array(
"name"	=> "召唤物防御强化",
"img"	=> "we_other007.png",
"exp"	=> "召唤物强化",
"sp"	=> "60",
"type"	=> "0",
"learn"	=> "4",
"target"=> array("friend","all",1),
"support"	=> "1",
"charge"	=> array(0,50),
"UpDEF"	=> "20",
"UpMDEF"	=> "20",
"limit"=> array("鞭"=>true,),
); break;
		case "3304":
$skill	= array(
"name"	=> "召唤物整体强化",
"img"	=> "we_other007z.png",
"exp"	=> "召唤物强化",
"sp"	=> "100",
"type"	=> "0",
"learn"	=> "6",
"target"=> array("friend","individual",1),
"support"	=> "1",
"charge"	=> array(0,50),
"UpSTR"	=> "150",
"priority"	=> "Summon",
"limit"=> array("鞭"=>true,),
); break;
		case "3305":
$skill	= array(
"name"	=> "愈合",
"img"	=> "we_other007z.png",
"exp"	=> "召唤物强化",
"sp"	=> "100",
"type"	=> "0",
"learn"	=> "6",
"target"=> array("friend","individual",1),
"support"	=> "1",
"charge"	=> array(0,50),
"UpINT"	=> "150",
"priority"	=> "Summon",
"limit"=> array("鞭"=>true,),
); break;
		case "3306":
$skill	= array(
"name"	=> "敏捷",
"img"	=> "we_other007z.png",
"exp"	=> "召唤物强化",
"sp"	=> "100",
"type"	=> "0",
"learn"	=> "6",
"target"=> array("friend","individual",1),
"support"	=> "1",
"charge"	=> array(0,100),
"UpSPD"	=> "100",
"priority"	=> "Summon",
"limit"=> array("鞭"=>true,),
); break;
		case "3307":
$skill	= array(
"name"	=> "增强",
"img"	=> "we_other007z.png",
"exp"	=> "召唤物强化",
"sp"	=> "100",
"type"	=> "0",
"learn"	=> "6",
"target"=> array("friend","individual",1),
"support"	=> "1",
"charge"	=> array(0,50),
"UpDEF"	=> "50",
"UpMDEF"	=> "50",
"priority"	=> "Summon",
"limit"=> array("鞭"=>true,),
); break;
		case "3308":
$skill	= array(
"name"	=> "全力支持",
"img"	=> "we_other007z.png",
"exp"	=> "召唤物强化",
"sp"	=> "200",
"type"	=> "0",
"learn"	=> "8",
"target"=> array("friend","individual",1),
"support"	=> "1",
"charge"	=> array(0,150),
"UpSTR"	=> "100",
"UpINT"	=> "100",
"UpSPD"	=> "100",
"priority"	=> "Summon",
"limit"=> array("鞭"=>true,),
); break;
		case "3309":
$skill	= array(
"name"	=> "全体支持",
"img"	=> "we_other007z.png",
"exp"	=> "召唤物强化",
"sp"	=> "400",
"type"	=> "0",
"learn"	=> "14",
"target"=> array("friend","all",1),
"support"	=> "1",
"charge"	=> array(0,400),
"UpSTR"	=> "100",
"UpINT"	=> "100",
"UpSPD"	=> "100",
"limit"=> array("鞭"=>true,),
); break;
		case "3310":
$skill	= array(
"name"	=> "野兽禁止",
"img"	=> "we_other007x.png",
"exp"	=> "召唤物弱化",
"sp"	=> "100",
"type"	=> "0",
"learn"	=> "6",
"target"=> array("enemy","individual",1),
"support"	=> "1",
"charge"	=> array(0,50),
"DownSTR"	=> "50",
"DownINT"	=> "50",
"DownSPD"	=> "50",
"DownDEF"	=> "20",
"DownMDEF"	=> "20",
"priority"	=> "Summon",
"limit"=> array("鞭"=>true,),
); break;
		case "3311":
$skill	= array(
"name"	=> "野兽击飞",
"img"	=> "we_other007x.png",
"exp"	=> "攻击召唤物",
"sp"	=> "100",
"type"	=> "0",
"learn"	=> "6",
"target"=> array("enemy","individual",1),
"pow"	=> "1500",
"charge"	=> array(0,30),
"priority"	=> "Summon",
); break;
		case "3312":
$skill	= array(
"name"	=> "野兽扑杀",
"img"	=> "we_other007x.png",
"exp"	=> "攻击召唤物",
"sp"	=> "300",
"type"	=> "0",
"learn"	=> "12",
"target"=> array("enemy","all",1),
"pow"	=> "1000",
"charge"	=> array(0,60),
); break;
		case "3313":
$skill	= array(
"name"	=> "魔兽强健",
"img"	=> "we_other007z.png",
"exp"	=> "召唤物强化",
"sp"	=> "200",
"type"	=> "0",
"learn"	=> "10",
"target"=> array("friend","individual",1),
"support"	=> "1",
"charge"	=> array(0,100),
"UpMAXHP"	=> "100",
"UpDEF"	=> "20",
"UpMDEF"	=> "20",
"priority"	=> "Summon",
"MagicCircleDeleteTeam"	=> 1,
); break;
		case "3314":
$skill	= array(
"name"	=> "魔兽暴走",
"img"	=> "we_other007z.png",
"exp"	=> "召唤物强化",
"sp"	=> "300",
"type"	=> "0",
"learn"	=> "15",
"target"=> array("friend","individual",1),
"support"	=> "1",
"charge"	=> array(0,100),
"UpATK"	=> "50",
"UpMATK"	=> "50",
"priority"	=> "Summon",
"MagicCircleDeleteTeam"	=> 2,
); break;
		case "3315":
$skill	= array(
"name"	=> "全魔兽强健",
"img"	=> "we_other007z.png",
"exp"	=> "召唤物强化",
"sp"	=> "400",
"type"	=> "0",
"learn"	=> "20",
"target"=> array("friend","all",1),
"support"	=> "1",
"charge"	=> array(0,200),
"UpMAXHP"	=> "100",
"UpDEF"		=> "20",
"UpMDEF"	=> "20",
"MagicCircleDeleteTeam"	=> 3,
); break;
		case "3316":
$skill	= array(
"name"	=> "全魔兽暴走",
"img"	=> "we_other007z.png",
"exp"	=> "召唤物强化",
"sp"	=> "500",
"type"	=> "0",
"learn"	=> "25",
"target"=> array("friend","all",1),
"support"	=> "1",
"charge"	=> array(0,200),
"UpATK"	=> "50",
"UpMATK"	=> "50",
"MagicCircleDeleteTeam"	=> 4,
); break;
		case "3317":
$skill	= array(
"name"	=> "魔兽附身",
"img"	=> "skill_066.png",
"exp"	=> "自身强化",
"sp"	=> "600",
"type"	=> "1",
"learn"	=> "30",
"target"=> array("self","individual",1),
"charge"=> array(0,150),
"UpMAXHP"=> 200,
"UpMATK"=> 100,
"UpINT"=> 100,
"UpDEF"	=> "25",
"UpMDEF"	=> "25",
"UpSPD"=> 50,
"MagicCircleDeleteTeam"	=> 5,
); break;
//----------------------------------------- 3400 持续回复系
		case "3400":
$skill	= array(
"name"	=> "持续回复",
"img"	=> "skill_062x.png",
"exp"	=> "HP持续回复+5%",
"sp"	=> "150",
"type"	=> "1",
"learn"	=> "8",
"target"=> array("friend","all",1),
"support"	=> "1",
"charge"	=> array(10,50),
"HpRegen"	=> 5,
); break;
		case "3401":
$skill	= array(
"name"	=> "魔力持续回复",
"img"	=> "skill_062x.png",
"exp"	=> "SP持续回复+5%",
"sp"	=> "150",
"type"	=> "1",
"learn"	=> "8",
"target"=> array("friend","all",1),
"support"	=> "1",
"charge"	=> array(10,50),
"SpRegen"	=> 5,
); break;
		case "3402":
$skill	= array(
"name"	=> "持续愈合",
"img"	=> "skill_062x.png",
"exp"	=> "HP持续回复+10%",
"sp"	=> "300",
"type"	=> "1",
"learn"	=> "12",
"target"=> array("friend","all",1),
"support"	=> "1",
"charge"	=> array(20,100),
"HpRegen"	=> 10,
); break;
		case "3403":
$skill	= array(
"name"	=> "魔力持续愈合",
"img"	=> "skill_062x.png",
"exp"	=> "SP持续回复+10%",
"sp"	=> "300",
"type"	=> "1",
"learn"	=> "12",
"target"=> array("friend","all",1),
"support"	=> "1",
"charge"	=> array(20,100),
"SpRegen"	=> 10,
); break;
		case "3404":
$skill	= array(
"name"	=> "双重持续愈合",
"img"	=> "skill_062x.png",
"exp"	=> "HP,SP持续回复+10%",
"sp"	=> "450",
"type"	=> "1",
"learn"	=> "18",
"target"=> array("friend","all",1),
"support"	=> "1",
"charge"	=> array(30,150),
"HpRegen"	=> 10,
"SpRegen"	=> 10,
); break;
//----------------------------------------- 3410 魔法阵を描く系
		case "3410":
$skill	= array(
"name"	=> "魔法阵",
"img"	=> "ms_01.png",
"exp"	=> "魔法阵+1",
"sp"	=> "100",
"type"	=> "1",
"learn"	=> "4",
"target"=> array("self","individual",1),
"charge"	=> array(0,0),
"MagicCircleAdd"	=> 1,
); break;
		case "3411":
$skill	= array(
"name"	=> "双重魔法阵",
"img"	=> "ms_01.png",
"exp"	=> "魔法阵+2",
"sp"	=> "300",
"type"	=> "1",
"learn"	=> "6",
"target"=> array("self","individual",1),
"charge"	=> array(60,0),
"MagicCircleAdd"	=> 2,
); break;
		case "3412":
$skill	= array(
"name"	=> "三重魔法阵",
"img"	=> "ms_01.png",
"exp"	=> "魔法阵+3",
"sp"	=> "500",
"type"	=> "1",
"learn"	=> "8",
"target"=> array("self","individual",1),
"charge"	=> array(80,0),
"MagicCircleAdd"	=> 3,
); break;
		case "3415":
$skill	= array(
"name"	=> "魔法阵",
"img"	=> "ms_01.png",
"exp"	=> "魔法阵+1",
"sp"	=> "200",
"type"	=> "1",
"learn"	=> "4",
"target"=> array("self","individual",1),
"charge"	=> array(30,0),
"MagicCircleAdd"	=> 1,
); break;
		case "3416":
$skill	= array(
"name"	=> "双重魔法阵",
"img"	=> "ms_01.png",
"exp"	=> "魔法阵+2",
"sp"	=> "500",
"type"	=> "1",
"learn"	=> "8",
"target"=> array("self","individual",1),
"charge"	=> array(80,50),
"MagicCircleAdd"	=> 2,
); break;
//----------------------------------------- 3420 魔法阵を消す系
		case "3420":
$skill	= array(
"name"	=> "魔法阵消除",
"img"	=> "ms_02.png",
"exp"	=> "对手魔法阵-1",
"sp"	=> "150",
"type"	=> "1",
"learn"	=> "4",
"target"=> array("self","individual",1),
"charge"	=> array(30,0),
"MagicCircleDeleteEnemy"	=> 1,
); break;
		case "3421"://消費大
$skill	= array(
"name"	=> "魔法阵消除",
"img"	=> "ms_02.png",
"exp"	=> "对手魔法阵-1",
"sp"	=> "240",
"type"	=> "1",
"learn"	=> "4",
"target"=> array("self","individual",1),
"charge"	=> array(40,0),
"MagicCircleDeleteEnemy"	=> 1,
); break;
		case "3422"://消費大
$skill	= array(
"name"	=> "魔法阵清空",
"img"	=> "ms_02.png",
"exp"	=> "对手魔法阵-5",
"sp"	=> "400",
"type"	=> "1",
"learn"	=> "12",
"target"=> array("self","individual",1),
"charge"	=> array(40,0),
"MagicCircleDeleteEnemy"	=> 5,
); break;
		case "3423":
$skill	= array(
"name"	=> "魔法阵抹消",
"img"	=> "ms_02.png",
"exp"	=> "对手魔法阵-2",
"sp"	=> "200",
"type"	=> "1",
"learn"	=> "8",
"target"=> array("self","individual",1),
"charge"	=> array(40,0),
"MagicCircleDeleteEnemy"	=> 2,
); break;
//----------------------------------------- 3900 テストに便利な技
		case "3900":
$skill	= array(
"name"	=> "中毒",
"img"	=> "acce_003c.png",
"exp"	=> "自己毒化",
"sp"	=> "20",
"type"	=> "0",
"learn"	=> "0",
"target"=> array("self","individual",1),
); break;
		case "3901":
$skill	= array(
"name"	=> "即死",
"img"	=> "acce_003c.png",
"exp"	=> "死亡",
"sp"	=> "20",
"type"	=> "0",
"learn"	=> "0",
"target"=> array("self","individual",1),
); break;
//////////////////////////////////////////////////
		case "4000":
$skill	= array(
"name"	=> "复原",
"img"	=> "inst_002.png",
"exp"	=> "队列修正",
"sp"	=> "0",
"type"	=> "0",
"learn"	=> "5",
"target"=> array("friend","all",1),
"support"	=> "1",
); break;
/*----------------------------------------------*
*   5000 - 5999 EnemySkills                     *
*-----------------------------------------------*/
		case "4999":
$skill	= array(
"name"	=> "---- 5000 ----------",
"img"	=> "skill_066.png",
"exp"	=> "",
"sp"	=> "20",
"type"	=> "0",
"learn"	=> "99",
"target"=> array("enemy","all",1),
); break;
		case "5000":
$skill	= array(
"name"	=> "地颤",
"img"	=> "skill_066.png",
"exp"	=> "",
"sp"	=> "20",
"type"	=> "0",
"learn"	=> "99",
"target"=> array("enemy","all",1),
"pow"	=> "70",
"charge"=> array(0,20),
); break;
		case "5001":
$skill	= array(
"name"	=> "超音波",
"img"	=> "skill_066.png",
"exp"	=> "",
"sp"	=> "0",
"type"	=> "0",
"learn"	=> "99",
"target"=> array("enemy","individual",1),
"invalid"	=> "1",
"pow"	=> "50",
"charge"=> array(0,0),
"delay"	=> "20",
); break;
		case "5002":
$skill	= array(
"name"	=> "吸血",
"img"	=> "skill_066.png",
"exp"	=> "",
"sp"	=> "0",
"type"	=> "0",
"learn"	=> "99",
"target"=> array("enemy","individual",1),
"pow"	=> "100",
"invalid"	=> "1",
"charge"=> array(0,0),
); break;
		case "5003":
$skill	= array(
"name"	=> "毒牙",
"img"	=> "skill_066.png",
"exp"	=> "",
"sp"	=> "0",
"type"	=> "0",
"learn"	=> "99",
"target"=> array("enemy","individual",1),
"pow"	=> "200",
"charge"=> array(0,0),
"poison"=> "100",
); break;
		case "5004":
$skill	= array(
"name"	=> "猛毒",
"img"	=> "skill_066.png",
"exp"	=> "",
"sp"	=> "0",
"type"	=> "1",
"learn"	=> "99",
"target"=> array("enemy","individual",1),
"pow"	=> "200",
"invalid"	=> "1",
"charge"=> array(0,0),
"poison"=> "100",
); break;
		case "5005":
$skill	= array(
"name"	=> "防御",
"img"	=> "skill_066.png",
"exp"	=> "",
"sp"	=> "10",
"type"	=> "0",
"learn"	=> "99",
"target"=> array("self","individual",1),
"support"	=> "1",
"charge"=> array(0,0),
"UpDEF"	=> "10",
"UpMDEF"=> "10",
); break;
		case "5006":
$skill	= array(
"name"	=> "突击!!!",
"img"	=> "skill_066.png",
"exp"	=> "突击命令",
"sp"	=> "0",
"type"	=> "0",
"learn"	=> "99",
"target"=> array("friend","all",1),
"support"	=> "1",
"charge"=> array(0,50),
"UpSTR"	=> "50",
); break;
		case "5007":
$skill	= array(
"name"	=> "治疗",// うさぎ 他 専用
"img"	=> "skill_066.png",
"exp"	=> "",
"sp"	=> "5",
"type"	=> "1",
"learn"	=> "99",
"target"=> array("friend","individual",1),
"pow"	=> "200",
"support"	=> "1",
"priority"	=> "LowHpRate",
"charge"=> array(0,0),
); break;
		case "5008":
$skill	= array(
"name"	=> "擒咬",
"img"	=> "skill_066.png",
"exp"	=> "",
"sp"	=> "0",
"type"	=> "0",
"learn"	=> "99",
"target"=> array("enemy","individual",1),
"pow"	=> "130",
); break;
		case "5009":
$skill	= array(
"name"	=> "爪击",
"img"	=> "skill_066.png",
"exp"	=> "",
"sp"	=> "0",
"type"	=> "0",
"learn"	=> "99",
"target"=> array("enemy","individual",1),
"pow"	=> "200",
); break;
		case "5010":
$skill	= array(
"name"	=> "咬",
"img"	=> "skill_066.png",
"exp"	=> "",
"sp"	=> "0",
"type"	=> "0",
"learn"	=> "99",
"target"=> array("enemy","individual",1),
"pow"	=> "90",
"pierce"=> true,
); break;
		case "5011":
$skill	= array(
"name"	=> "熊摔",
"img"	=> "skill_066.png",
"exp"	=> "",
"sp"	=> "0",
"type"	=> "0",
"learn"	=> "99",
"target"=> array("enemy","individual",1),
"pow"	=> "200",
"knockback"	=> "100",
); break;
		case "5012":
$skill	= array(
"name"	=> "掷石",
"img"	=> "skill_066.png",
"exp"	=> "",
"sp"	=> "0",
"type"	=> "0",
"learn"	=> "99",
"target"=> array("enemy","individual",1),
"pow"	=> "120",
"invalid"	=> "1",
); break;
		case "5013":
$skill	= array(
"name"	=> "空袭",
"img"	=> "skill_066.png",
"exp"	=> "",
"sp"	=> "50",
"type"	=> "1",
"learn"	=> "99",
"target"=> array("enemy","all",1),
"pow"	=> "180",
"invalid"	=> "1",
); break;
		case "5014":
$skill	= array(
"name"	=> "多重爪击",
"img"	=> "skill_066.png",
"exp"	=> "",
"sp"	=> "0",
"type"	=> "0",
"learn"	=> "99",
"target"=> array("enemy","multi",3),
"pow"	=> "70",
"pierce"=> true,
); break;
		case "5015":
$skill	= array(
"name"	=> "雪暴",
"img"	=> "skill_066.png",
"exp"	=> "",
"sp"	=> "50",
"type"	=> "1",
"learn"	=> "99",
"target"=> array("enemy","all",1),
"pow"	=> "100",
"invalid"	=> "1",
"DownSPD"	=> "10",
); break;
		case "5016":
$skill	= array(
"name"	=> "飞行",
"img"	=> "skill_066.png",
"exp"	=> "",
"sp"	=> "20",
"type"	=> "1",
"learn"	=> "99",
"target"=> array("friend","all",1),
"charge"	=> array(20,0),
"support"	=> "1",
"UpSPD"	=> "20",
); break;
		case "5017":
$skill	= array(
"name"	=> "幸运",
"img"	=> "skill_066.png",
"exp"	=> "",
"sp"	=> "0",
"type"	=> "1",
"learn"	=> "99",
"target"=> array("friend","all",1),
"charge"	=> array(0,30),
"support"	=> "1",
"UpSTR"	=> "30",
"UpINT"	=> "30",
"UpDEX"	=> "30",
"UpSPD"	=> "30",
); break;
		case "5018":
$skill	= array(
"name"	=> "火之气息",
"img"	=> "skill_066.png",
"exp"	=> "",
"sp"	=> "0",
"type"	=> "0",
"learn"	=> "99",
"target"=> array("enemy","all",1),
"pow"	=> "120",
"invalid"	=> "1",
); break;
		case "5019":
$skill	= array(
"name"	=> "砍翻",
"img"	=> "skill_066.png",
"exp"	=> "",
"sp"	=> "0",
"type"	=> "0",
"learn"	=> "99",
"target"=> array("enemy","individual",1),
"pow"	=> "300",
); break;
		case "5020":
$skill	= array(
"name"	=> "愤怒火焰",
"img"	=> "skill_066.png",
"exp"	=> "",
"sp"	=> "300",
"type"	=> "1",
"learn"	=> "99",
"target"=> array("enemy","all",1),
"pow"	=> "300",
); break;
		case "5021":
$skill	= array(
"name"	=> "水波",
"img"	=> "skill_066.png",
"exp"	=> "",
"sp"	=> "300",
"type"	=> "1",
"learn"	=> "99",
"target"=> array("enemy","all",1),
"pow"	=> "200",
"knockback"	=> "100",
); break;
		case "5022":
$skill	= array(
"name"	=> "命运女神",
"img"	=> "skill_066.png",
"exp"	=> "",
"sp"	=> "200",
"type"	=> "1",
"learn"	=> "99",
"target"=> array("friend","all",1),
"support"	=> "1",
"pow"	=> "200",
"UpSTR"	=> "20",
"UpINT"	=> "20",
"UpDEX"	=> "20",
"UpSPD"	=> "20",
"UpDEF"	=> "20",
"UpMDEF"	=> "20",
); break;
		case "5023":
$skill	= array(
"name"	=> "厄运",
"img"	=> "skill_066.png",
"exp"	=> "",
"sp"	=> "500",
"type"	=> "1",
"learn"	=> "99",
"target"=> array("enemy","all",1),
"DownMAXHP"	=> "70",
"invalid"	=> "1",
); break;
		case "5024":
$skill	= array(
"name"	=> "惩罚者",
"img"	=> "skill_066.png",
"exp"	=> "",
"sp"	=> "500",
"type"	=> "0",
"learn"	=> "99",
"target"=> array("enemy","all",1),
"pow"	=> "500",
); break;
		case "5025":
$skill	= array(
"name"	=> "圣光风暴",
"img"	=> "skill_066.png",
"exp"	=> "",
"sp"	=> "100",
"type"	=> "1",
"learn"	=> "99",
"target"=> array("enemy","all",1),
"pow"	=> "150",
"invalid"	=> "1",
); break;
		case "5026":
$skill	= array(
"name"	=> "销毁",
"img"	=> "skill_066.png",
"exp"	=> "",
"sp"	=> "50",
"type"	=> "0",
"learn"	=> "99",
"target"=> array("enemy","individual",1),
"pow"	=> "250",
); break;
		case "5027":
$skill	= array(
"name"	=> "涡流",
"img"	=> "skill_066.png",
"exp"	=> "",
"sp"	=> "50",
"type"	=> "0",
"learn"	=> "99",
"target"=> array("enemy","all",1),
"pow"	=> "150",
"DownSPD"	=> "10",
); break;
		case "5028":
$skill	= array(
"name"	=> "暗之光",
"img"	=> "skill_066.png",
"exp"	=> "",
"sp"	=> "50",
"type"	=> "1",
"learn"	=> "99",
"target"=> array("enemy","multi",3),
"pow"	=> "150",
"invalid"	=> "1",
); break;
		case "5029":
$skill	= array(
"name"	=> "雷神之锤",
"img"	=> "skill_066.png",
"exp"	=> "",
"sp"	=> "50",
"type"	=> "0",
"learn"	=> "99",
"target"=> array("enemy","individual",1),
"pow"	=> "600",
"invalid"	=> "1",
); break;
		case "5030":
$skill	= array(
"name"	=> "灵魂复苏",
"img"	=> "skill_008.png",
"exp"	=> "复苏",
"sp"	=> "400",
"type"	=> "1",
"learn"	=> "10",
"target"=> array("friend","multi",2),
"support"	=> "1",
"charge"	=> array(0,0),
"pow"		=> "400",
"priority"	=> "Dead",
); break;
		case "5031":
$skill	= array(
"name"	=> "锤击",
"img"	=> "skill_066.png",
"sp"	=> "0",
"type"	=> "0",
"learn"	=> "99",
"target"=> array("enemy","individual",1),
"charge"	=> array(0,30),
"pow"		=> "220",
); break;
		case "5032":
$skill	= array(
"name"	=> "地面攻击",
"img"	=> "skill_066.png",
"sp"	=> "50",
"type"	=> "0",
"learn"	=> "99",
"target"=> array("enemy","all",1),
"invalid"	=> true,
"charge"	=> array(0,50),
"pow"	=> "80",
"delay"	=> "50",
); break;
		case "5033":
$skill	= array(
"name"	=> "武器锻造",
"img"	=> "skill_066.png",
"sp"	=> "50",
"type"	=> "0",
"learn"	=> "99",
"target"=> array("friend","all",1),
"support"=> true,
"charge"	=> array(50,50),
"UpATK"	=> "50",
); break;
		case "5034":
$skill	= array(
"name"	=> "石像鬼召唤",
"img"	=> "skill_066.png",
"sp"	=> "50",
"type"	=> "0",
"learn"	=> "99",
"target"=> array("self","individual",1),
"charge"	=> array(0,100),
"summon"	=> array(1026),
); break;
		case "5035":
$skill	= array(
"name"	=> "火蛇",
"img"	=> "skill_066.png",
"sp"	=> "0",
"type"	=> "1",
"learn"	=> "99",
"target"=> array("enemy","all",1),
"invalid"	=> true,
"charge"	=> array(50,0),
"pow"	=> "80",
); break;
		case "5036":
$skill	= array(
"name"	=> "凝视",
"img"	=> "skill_066.png",
"sp"	=> "0",
"type"	=> "0",
"learn"	=> "99",
"target"=> array("enemy","all",1),
"invalid"	=> true,
"delay"	=> "30",
); break;
		case "5037":
$skill	= array(
"name"	=> "眼射线",
"img"	=> "skill_066.png",
"sp"	=> "0",
"type"	=> "1",
"learn"	=> "99",
"target"=> array("enemy","individual",1),
"invalid"	=> true,
"pow"	=> "200",
"DownSTR"	=> "20",
"DownDEF"	=> "20",
); break;
		case "5038":
$skill	= array(
"name"	=> "暗之气息",
"img"	=> "skill_066.png",
"sp"	=> "200",
"type"	=> "1",
"learn"	=> "99",
"target"=> array("enemy","all",1),
"invalid"	=> true,
"pow"	=> "150",
"DownINT"	=> "20",
"charge"	=> array(0,50),
); break;
		case "5039":
$skill	= array(
"name"	=> "毒气",
"img"	=> "skill_066.png",
"sp"	=> "100",
"type"	=> "0",
"learn"	=> "99",
"target"=> array("enemy","all",1),
"invalid"	=> true,
"poison"	=> "100",
); break;
		case "5040":
$skill	= array(
"name"	=> "黑暗圣光",
"img"	=> "skill_066.png",
"sp"	=> "300",
"type"	=> "1",
"learn"	=> "99",
"target"=> array("enemy","multi",6),
"invalid"	=> true,
"pow"	=> "150",
"charge"	=> array(70,0),
); break;
		case "5041":
$skill	= array(
"name"	=> "黑暗迷雾",
"img"	=> "skill_066.png",
"sp"	=> "300",
"type"	=> "1",
"learn"	=> "99",
"target"=> array("enemy","all",1),
"invalid"	=> true,
"charge"	=> array(60,30),
"DownMDEF"	=> "60",
); break;
		case "5042":
$skill	= array(
"name"	=> "雪球",
"img"	=> "skill_066.png",
"sp"	=> "0",
"type"	=> "0",
"learn"	=> "99",
"target"=> array("enemy","multi",2),
"invalid"	=> true,
"pow"	=> "70",
); break;
		case "5043":
$skill	= array(
"name"	=> "大雪球",
"img"	=> "skill_066.png",
"sp"	=> "0",
"type"	=> "0",
"learn"	=> "99",
"target"=> array("enemy","multi",4),
"invalid"	=> true,
"pow"	=> "50",
); break;
		case "5044":
$skill	= array(
"name"	=> "滑雪",
"img"	=> "skill_066.png",
"sp"	=> "150",
"type"	=> "1",
"learn"	=> "99",
"target"=> array("enemy","all",1),
"pow"	=> "150",
"DownSPD"=> "15",
); break;
		case "5045":
$skill	= array(
"name"	=> "冰之气息",
"img"	=> "skill_066.png",
"sp"	=> "40",
"type"	=> "0",
"learn"	=> "99",
"target"=> array("enemy","all",1),
"pow"	=> "140",
"DownDEF"=> "10",
); break;
		case "5046":
$skill	= array(
"name"	=> "冰装甲",
"img"	=> "skill_066.png",
"sp"	=> "100",
"type"	=> "1",
"learn"	=> "99",
"target"=> array("friend","all",1),
"support"	=> true,
"UpDEF"	=> "10",
"UpMDEF"=> "10",
"charge"=> array(10,10),
); break;
		case "5047":
$skill	= array(
"name"	=> "冰柱",
"img"	=> "skill_066.png",
"sp"	=> "30",
"type"	=> "1",
"learn"	=> "99",
"target"=> array("enemy","multi",3),
"pow"	=> "100",
"DownDEF"	=> "10",
"charge"=> array(30,0),
); break;
		case "5048":
$skill	= array(
"name"	=> "诅咒咆哮",
"img"	=> "skill_066.png",
"sp"	=> "120",
"type"	=> "0",
"learn"	=> "99",
"target"=> array("enemy","all",1),
"DownSTR"	=> "20",
"charge"=> array(10,20),
); break;
		case "5049":
$skill	= array(
"name"	=> "欢呼",
"img"	=> "skill_066.png",
"sp"	=> "40",
"type"	=> "0",
"learn"	=> "99",
"target"=> array("friend","all",1),
"UpSTR"	=> "40",
"UpINT"	=> "40",
"charge"=> array(40,40),
); break;
		case "5050":
$skill	= array(
"name"	=> "冰重击",
"img"	=> "skill_066.png",
"sp"	=> "100",
"type"	=> "1",
"learn"	=> "99",
"target"=> array("enemy","multi",2),
"pow"	=> "200",
"DownDEF"	=> "20",
"charge"	=> array(20,20),
); break;
		case "5051":
$skill	= array(
"name"	=> "雪暴",
"img"	=> "skill_066.png",
"sp"	=> "50",
"type"	=> "1",
"learn"	=> "99",
"target"=> array("enemy","all",1),
"charge"	=> array(50,0),
"delay"	=> "50",
); break;
		case "5052":
$skill	= array(
"name"	=> "即爆炸弹",
"img"	=> "skill_066.png",
"sp"	=> "0",
"type"	=> "0",
"learn"	=> "99",
"target"=> array("enemy","individual",1),
"DownMAXHP"	=> "50",
"invalid"	=> true,
); break;
		case "5053":
$skill	= array(
"name"	=> "冰墙",
"img"	=> "skill_066.png",
"sp"	=> "300",
"type"	=> "1",
"learn"	=> "99",
"target"=> array("friend","all",1),
"charge"	=> array(20,60),
"UpDEF"	=> "20",
"UpMDEF"	=> "60",
); break;
		case "5054":
$skill	= array(
"name"	=> "绝对零度",
"img"	=> "skill_066.png",
"sp"	=> "200",
"type"	=> "1",
"learn"	=> "99",
"target"=> array("all","all",1),
"charge"=> array(30,0),
"pow"	=> "250",
); break;
		case "5055":
$skill	= array(
"name"	=> "辐射加热",
"img"	=> "skill_066.png",
"sp"	=> "0",
"type"	=> "1",
"learn"	=> "99",
"target"=> array("self","individual",1),
"charge"=> array(40,10),
"pow"	=> "400",
"DownDEF"	=> "10",
); break;
		case "5056":
$skill	= array(
"name"	=> "咬",
"img"	=> "skill_066.png",
"sp"	=> "0",
"type"	=> "0",
"learn"	=> "99",
"target"=> array("enemy","individual",1),
"charge"=> array(0,0),
"pow"	=> "340",
); break;
		case "5057":
$skill	= array(
"name"	=> "爪击",
"img"	=> "skill_066.png",
"sp"	=> "0",
"type"	=> "0",
"learn"	=> "99",
"target"=> array("enemy","individual",2),
"charge"=> array(0,0),
"pow"	=> "100",
"pierce"	=> true,
"charge"	=> array(0,70),
); break;
		case "5058":
$skill	= array(
"name"	=> "嚎叫",
"img"	=> "skill_066.png",
"sp"	=> "0",
"type"	=> "0",
"learn"	=> "99",
"target"=> array("enemy","all",1),
"charge"=> array(0,30),
"DownSTR"	=> "30",
); break;
		case "5059":
$skill	= array(
"name"	=> "掠夺",
"img"	=> "skill_066.png",
"sp"	=> "0",
"type"	=> "0",
"learn"	=> "99",
"target"=> array("enemy","individual",1),
"charge"=> array(40,40),
"DownDEF"=> 40,
"DownATK"=> 40,
); break;
		case "5060":
$skill	= array(
"name"	=> "夺取装甲",
"img"	=> "skill_066.png",
"sp"	=> "0",
"type"	=> "0",
"learn"	=> "99",
"target"=> array("enemy","individual",1),
"charge"=> array(0,30),
"DownDEF"=> 30,
//"DownATK"=> 40,
); break;
		case "5061":
$skill	= array(
"name"	=> "强化掠夺",
"img"	=> "skill_066.png",
"sp"	=> "150",
"type"	=> "0",
"learn"	=> "99",
"target"=> array("enemy","all",1),
"charge"=> array(10,50),
"DownATK"=> 50,
"DownMATK"=> 50,
); break;
		case "5062":
$skill	= array(
"name"	=> "匕首暴徒",
"img"	=> "we_sword001z.png",
"sp"	=> "130",
"type"	=> "0",
"learn"	=> "99",
"target"=> array("enemy","multi",8),
"pow"	=> "100",
"charge"=> array(0,70),
"invalid"	=> "1",
); break;
		case "5063":
$skill	= array(
"name"	=> "清醒",
"img"	=> "skill_008.png",
"exp"	=> "复苏",
"sp"	=> "50",
"type"	=> "1",
"learn"	=> "10",
"target"=> array("friend","individual",1),
"support"	=> "1",
"charge"	=> array(0,0),
"pow"		=> "10",
"priority"	=> "Dead",
); break;
		case "5064":
$skill	= array(
"name"	=> "香蕉火箭",
"img"	=> "banana.png",
"exp"	=> "",
"sp"	=> "50",
"type"	=> "0",
"learn"	=> "99",
"target"=> array("enemy","individual",1),
"charge"	=> array(0,30),
"pow"		=> "300",
); break;
		case "5065":
$skill	= array(
"name"	=> "香蕉射击",
"img"	=> "banana.png",
"exp"	=> "",
"sp"	=> "50",
"type"	=> "0",
"learn"	=> "99",
"target"=> array("enemy","multi",3),
"invalid"	=> true,
"charge"	=> array(0,0),
"pow"		=> "70",
); break;
		case "5066":
$skill	= array(
"name"	=> "香蕉回复",
"img"	=> "banana.png",
"exp"	=> "",
"sp"	=> "0",
"type"	=> "1",
"learn"	=> "10",
"target"=> array("self","individual",1),
"support"	=> "1",
"charge"	=> array(0,0),
"pow"		=> "250",
"CurePoison"	=> true,
"SpRecoveryRate"	=> 4,
"support"	=> "1",
); break;
		case "5067":
$skill	= array(
"name"	=> "香蕉防护",
"img"	=> "banana.png",
"exp"	=> "",
"sp"	=> "50",
"type"	=> "1",
"learn"	=> "10",
"target"=> array("friend","all",1),
"charge"	=> array(0,0),
"support"	=> "1",
); break;
		case "5068":
$skill	= array(
"name"	=> "召唤奴隶",
"img"	=> "banana.png",
"exp"	=> "",
"sp"	=> "0",
"type"	=> "0",
"learn"	=> "99",
"target"=> array("self","individual",1),
"charge"=> array(0,50),
"summon"	=> array(1100),
); break;
		case "5069":
$skill	= array(
"name"	=> "召唤奴隶",
"img"	=> "banana.png",
"exp"	=> "",
"sp"	=> "0",
"type"	=> "0",
"learn"	=> "99",
"target"=> array("self","individual",1),
"charge"=> array(0,50),
"summon"	=> array(1101),
); break;
		case "5070":
$skill	= array(
"name"	=> "召唤奇美拉",
"img"	=> "skill_029.png",
"exp"	=> "合成兽召唤",
"sp"	=> "0",
"type"	=> "0",
"learn"	=> "20",
"target"=> array("self","individual",1),
"charge"=> array(0,0),
"summon"	=> "5013",
); break;
		case "5071":
$skill	= array(
"name"	=> "召唤雪男",
"img"	=> "skill_029.png",
"exp"	=> "合成兽召唤",
"sp"	=> "0",
"type"	=> "0",
"learn"	=> "20",
"target"=> array("self","individual",1),
"charge"=> array(0,0),
"summon"	=> "5014",
); break;
		case "5072":
$skill	= array(
"name"	=> "召唤野猪",
"img"	=> "skill_029.png",
"exp"	=> "合成兽召唤",
"sp"	=> "0",
"type"	=> "0",
"learn"	=> "20",
"target"=> array("self","individual",1),
"charge"=> array(0,0),
"summon"	=> "5014",
); break;
		case "5073":
$skill	= array(
"name"	=> "召唤狮子",
"img"	=> "skill_029.png",
"exp"	=> "合成兽召唤",
"sp"	=> "0",
"type"	=> "0",
"learn"	=> "20",
"target"=> array("self","individual",1),
"charge"=> array(0,0),
"summon"	=> "5011",
); break;
		case "5080":
$skill	= array(
"name"	=> "红炮",
"img"	=> "skill_057.png",
"exp"	=> "",
"sp"	=> "50",
"type"	=> "0",
"learn"	=> "99",
"target"=> array("enemy","individual",1),
"delay"	=> 50,
"charge"=> array(50,50),
"pow"	=> "500",
"pierce"=> true,
); break;
		case "5081":
$skill	= array(
"name"	=> "虎劲",
"img"	=> "skill_057.png",
"exp"	=> "",
"sp"	=> "0",
"type"	=> "0",
"learn"	=> "99",
"target"=> array("self","individual",1),
"support"	=> "1",
"charge"	=> array(0,0),
"pow"		=> "300",
"CurePoison"	=> true,
"SpRecoveryRate"	=> 9,
"UpATK"	=> "30",
"UpSTR"	=> "30",
"UpDEF"	=> "30",
"UpMDEF"=> "30",
"UpSPD"	=> "30",
); break;
		case "5082":
$skill	= array(
"name"	=> "彩光乱舞",
"img"	=> "skill_057.png",
"exp"	=> "",
"sp"	=> "250",
"type"	=> "0",
"learn"	=> "99",
"target"=> array("enemy","all",1),
"charge"=> array(10,50),
"pow"	=> "350",
); break;
		case "5083":
$skill	= array(
"name"	=> "崩山彩极炮",
"img"	=> "skill_057.png",
"exp"	=> "",
"sp"	=> "80",
"type"	=> "0",
"learn"	=> "99",
"target"=> array("enemy","multi",16),
"charge"=> array(20,40),
"pow"	=> "320",
"invalid"	=> "1",
); break;
		case "5084":
$skill	= array(
"name"	=> "火神闪光",
"img"	=> "skill_057.png",
"exp"	=> "",
"sp"	=> "60",
"type"	=> "1",
"learn"	=> "99",
"target"=> array("enemy","multi",6),
"charge"=> array(30,60),
"pow"	=> "360",
"invalid"	=> "1",
); break;
		case "5085":
$skill	= array(
"name"	=> "水精公主",
"img"	=> "skill_057.png",
"exp"	=> "",
"sp"	=> "180",
"type"	=> "1",
"learn"	=> "99",
"target"=> array("friend","all",1),
"support"	=> "1",
"pow"	=> "180",
"charge"	=> array(10,80),
); break;
		case "5086":
$skill	= array(
"name"	=> "风精的角笛",
"img"	=> "skill_016z.png",
"exp"	=> "",
"sp"	=> "100",
"type"	=> "1",
"learn"	=> "99",
"target"=> array("friend","all",1),
"charge"	=> array(100,100),
"UpSPD"	=> "100",
); break;
		case "5087":
$skill	= array(
"name"	=> "慵懒三石塔",
"img"	=> "skill_066.png",
"exp"	=> "",
"sp"	=> "30",
"type"	=> "1",
"learn"	=> "99",
"target"=> array("enemy","multi",3),
"delay"	=> 30,
"charge"=> array(30,0),
"pow"	=> "300",
"invalid"	=> "1",
"DownSPD"	=> "30",
"pierce"=> true,
); break;
		case "5088":
$skill	= array(
"name"	=> "金属疲劳",
"img"	=> "skill_057.png",
"exp"	=> "",
"sp"	=> "60",
"type"	=> "1",
"learn"	=> "99",
"target"=> array("enemy","individual",1),
"delay"	=> 60,
"charge"=> array(60,0),
"pow"	=> "600",
"DownDEF"	=> "60",
"DownMDEF"	=> "60",
); break;
		case "5089":
$skill	= array(
"name"	=> "皇家圣焰",
"img"	=> "skill_057.png",
"exp"	=> "",
"sp"	=> "600",
"type"	=> "1",
"learn"	=> "99",
"target"=> array("enemy","all",1),
"charge"=> array(50,0),
"pow"	=> "500",
); break;
		case "5090":
$skill	= array(
"name"	=> "静寂的小夜曲",
"img"	=> "skill_037.png",
"exp"	=> "",
"sp"	=> "0",
"type"	=> "1",
"learn"	=> "99",
"target"=> array("enemy","all",1),
"pow"	=> "100",
"invalid"	=> "1",
"charge"=> array(0,100),
); break;
		case "5091":
$skill	= array(
"name"	=> "The World!",
"img"	=> "we_other007y.png",
"exp"	=> "",
"sp"	=> "320",
"type"	=> "1",
"learn"	=> "99",
"target"=> array("all","all",1),
"delay"	=> 320,
"invalid"	=> "1",
"charge"=> array(160,160),
); break;
		case "5092":
$skill	= array(
"name"	=> "杀人木偶",
"img"	=> "skill_066.png",
"exp"	=> "",
"sp"	=> "60",
"type"	=> "0",
"learn"	=> "99",
"target"=> array("enemy","all",1),
"charge"=> array(10,60),
"pow"	=> "160",
"pierce"=> true,
); break;
		case "5093":
$skill	= array(
"name"	=> "刻写红魂",
"img"	=> "skill_066.png",
"exp"	=> "",
"sp"	=> "60",
"type"	=> "0",
"learn"	=> "99",
"target"=> array("enemy","multi",6),
"charge"=> array(10,60),
"pow"	=> "160",
"pierce"=> true,
); break;
		case "5094":
$skill	= array(
"name"	=> "夜雾中的幻影杀人鬼",
"img"	=> "skill_066.png",
"exp"	=> "",
"sp"	=> "160",
"type"	=> "1",
"learn"	=> "99",
"target"=> array("enemy","multi",16),
"charge"=> array(0,160),
"pow"	=> "160",
"invalid"	=> "1",
); break;
		case "5095":
$skill	= array(
"name"	=> "完美女仆",
"img"	=> "banana.png",
"exp"	=> "",
"sp"	=> "0",
"type"	=> "1",
"learn"	=> "99",
"target"=> array("self","individual",1),
"support"	=> "1",
"charge"	=> array(0,0),
"pow"		=> "160",
"CurePoison"	=> true,
"SpRecoveryRate"	=> 8,
"UpATK"	=> "16",
"UpMATK"=> "16",
"UpSTR"	=> "16",
"UpDEF"	=> "16",
"UpMDEF"=> "16",
"UpSPD"	=> "16",
"UpINT"	=> "16",
); break;
		case "5096":
$skill	= array(
"name"	=> "冈格尼尔之枪",
"img"	=> "skill_057.png",
"exp"	=> "",
"sp"	=> "0",
"type"	=> "1",
"learn"	=> "99",
"target"=> array("enemy","individual",1),
"charge"=> array(0,80),
"pow"	=> "800",
"invalid"	=> "1",
); break;
		case "5097":
$skill	= array(
"name"	=> "绯红色的恶魔",
"img"	=> "skill_078.png",
"exp"	=> "",
"sp"	=> "0",
"type"	=> "0",
"learn"	=> "99",
"target"=> array("enemy","multi",14),
"delay"	=> 40,
"pow"	=> "400",
"charge"=> array(10,40),
"invalid"	=> "1",
"pierce"=> true,
); break;
		case "5098":
$skill	= array(
"name"	=> "红色不夜城",
"img"	=> "skill_057.png",
"exp"	=> "",
"sp"	=> "0",
"type"	=> "1",
"learn"	=> "99",
"target"=> array("enemy","all",1),
"charge"=> array(0,30),
"pow"	=> "300",
"invalid"	=> "1",
); break;
		case "5099":
$skill	= array(
"name"	=> "子夜之女王",
"img"	=> "skill_066.png",
"exp"	=> "",
"sp"	=> "0",
"type"	=> "1",
"learn"	=> "99",
"target"=> array("self","individual",1),
"charge"=> array(0,0),
"UpMAXHP"=> 200,
"UpATK"=> 100,
"UpMATK"=> 100,
"UpSTR"=> 100,
"UpINT"=> 100,
"UpSPD"=> 100,
"UpDEF"=> 100,
"UpMDEF"=> 100,
); break;
		case "5100":
$skill	= array(
"name"	=> "贤者之石",
"img"	=> "skill_057.png",
"exp"	=> "",
"sp"	=> "100",
"type"	=> "1",
"learn"	=> "99",
"target"=> array("self","individual",1),
"charge"	=> array(10,0),
"UpMATK"=> "100",
"UpDEF"	=> "100",
"UpMDEF"=> "100",
"UpSPD"	=> "100",
"UpINT"	=> "100",
); break;
		case "5101":
$skill	= array(
"name"	=> "四重结界",
"img"	=> "skill_057.png",
"exp"	=> "",
"sp"	=> "40",
"type"	=> "1",
"learn"	=> "99",
"target"=> array("enemy","all",1),
"charge"=> array(40,0),
"pow"	=> "400",
"invalid"	=> "1",
); break;
		case "5102":
$skill	= array(
"name"	=> "客观结界",
"img"	=> "item_027.png",
"exp"	=> "",
"sp"	=> "180",
"type"	=> "1",
"learn"	=> "99",
"target"=> array("enemy","all",1),
"invalid"	=> "1",
"DownDEF"	=> "18",
"DownMDEF"	=> "18",
"DownATK"	=> "18",
"DownMATK"	=> "18",
"DownSTR"	=> "18",
"DownINT"	=> "18",
"DownSPD"	=> "18",
"DownLUK"	=> "18",
); break;
		case "5103":
$skill	= array(
"name"	=> "废弃车站下车之旅",
"img"	=> "skill_066.png",
"exp"	=> "",
"sp"	=> "200",
"type"	=> "1",
"learn"	=> "99",
"target"=> array("enemy","multi",20),
"delay"	=> 20,
"charge"=> array(200,200),
"pow"	=> "200",
"invalid"	=> "1",
"pierce"=> true,
); break;
		case "5104":
$skill	= array(
"name"	=> "轨道变异",
"img"	=> "skill_037.png",
"exp"	=> "",
"sp"	=> "0",
"type"	=> "1",
"learn"	=> "99",
"target"=> array("enemy","all",1),
"pow"	=> "180",
"invalid"	=> "1",
"charge"=> array(0,180),
); break;
		case "5105":
$skill	= array(
"name"	=> "尸解永远",
"img"	=> "item_027.png",
"exp"	=> "",
"sp"	=> "20",
"type"	=> "0",
"learn"	=> "99",
"target"=> array("enemy","individual",1),
"delay"	=> 20,
"pow"	=> "200",
"charge"=> array(20,0),
"pierce"=> true,
"UpATK"	=> "20",
"UpSTR"	=> "20",
); break;
		case "5106":
$skill	= array(
"name"	=> "奇门遁甲",
"img"	=> "item_027.png",
"exp"	=> "",
"sp"	=> "40",
"type"	=> "0",
"learn"	=> "99",
"target"=> array("self","individual",1),
"charge"=> array(40,40),
"UpDEF"	=> "40",
"UpMDEF"=> "40",
); break;
		case "5107":
$skill	= array(
"name"	=> "天仙鸣动",
"img"	=> "skill_066.png",
"exp"	=> "",
"sp"	=> "200",
"type"	=> "1",
"learn"	=> "99",
"target"=> array("enemy","all",1),
"charge"=> array(20,0),
"pow"	=> "200",
"DownSPD"	=> "20",
); break;
		case "5108":
$skill	= array(
"name"	=> "滚球",
"img"	=> "skill_066.png",
"exp"	=> "",
"sp"	=> "20",
"type"	=> "0",
"learn"	=> "99",
"target"=> array("enemy","multi",4),
"charge"=> array(20,40),
"pow"	=> "240",
"umove"	=> "front",
"invalid"	=> "1",
"pierce"=> true,
); break;
		case "5109":
$skill	= array(
"name"	=> "狐狸妖怪射线",
"img"	=> "skill_066.png",
"exp"	=> "",
"sp"	=> "100",
"type"	=> "1",
"learn"	=> "99",
"target"=> array("enemy","multi",8),
"charge"=> array(10,80),
"pow"	=> "180",
"invalid"	=> "1",
); break;
		case "5110":
$skill	= array(
"name"	=> "前鬼后鬼的守护",
"img"	=> "skill_062x.png",
"exp"	=> "",
"sp"	=> "80",
"type"	=> "1",
"learn"	=> "99",
"target"=> array("friend","all",1),
"support"	=> "1",
"charge"	=> array(0,80),
"HpRegen"	=> 8,
); break;
		case "5111":
$skill	= array(
"name"	=> "凭依荼吉尼天",
"img"	=> "skill_013c.png",
"exp"	=> "",
"sp"	=> "80",
"type"	=> "1",
"learn"	=> "99",
"target"=> array("friend","all",1),
"pow"	=> "800",
"support"	=> "1",
"priority"	=> "LowHpRate",
"charge"=> array(80,0),
); break;
		case "5112":
$skill	= array(
"name"	=> "岩壁防御",
"img"	=> "skill_066.png",
"sp"	=> "100",
"type"	=> "1",
"learn"	=> "99",
"target"=> array("friend","all",1),
"charge"	=> array(10,10),
"UpDEF"	=> "100",
"UpMDEF"	=> "100",
); break;
		case "5113":
$skill	= array(
"name"	=> "岩石冲击",
"img"	=> "skill_066.png",
"exp"	=> "",
"sp"	=> "300",
"type"	=> "1",
"learn"	=> "99",
"target"=> array("enemy","multi",12),
"charge"=> array(30,30),
"pow"	=> "300",
"invalid"	=> "1",
); break;
		case "5114":
$skill	= array(
"name"	=> "巨岩武装",
"img"	=> "skill_066.png",
"sp"	=> "100",
"type"	=> "1",
"learn"	=> "99",
"target"=> array("friend","all",1),
"charge"	=> array(10,10),
"UpATK"	=> "100",
"UpMATK"	=> "100",
); break;
		case "5115":
$skill	= array(
"name"	=> "翡翠冲击",
"img"	=> "skill_066.png",
"exp"	=> "",
"sp"	=> "350",
"type"	=> "1",
"learn"	=> "99",
"target"=> array("enemy","all",1),
"charge"=> array(30,50),
"pow"	=> "350",
"delay"	=> 30,
"invalid"	=> "1",
"DownDEF"	=> "30",
"DownMDEF"=> "30",
"pierce"=> true,
); break;
		case "5116":
$skill	= array(
"name"	=> "翡翠结晶",
"img"	=> "skill_057.png",
"exp"	=> "",
"sp"	=> "100",
"type"	=> "1",
"learn"	=> "99",
"target"=> array("self","individual",1),
"charge"	=> array(0,0),
"UpATK"	=> "100",
"UpMATK"	=> "100",
"UpSPD"	=> "100",
); break;
		case "5117":
$skill	= array(
"name"	=> "天罚",
"img"	=> "skill_057.png",
"exp"	=> "",
"sp"	=> "600",
"type"	=> "1",
"learn"	=> "99",
"target"=> array("enemy","individual",1),
"delay"	=> 60,
"charge"=> array(60,60),
"pow"	=> "600",
"pierce"=> true,
); break;
		case "5118":
$skill	= array(
"name"	=> "天谴飓风",
"img"	=> "skill_066.png",
"exp"	=> "",
"sp"	=> "500",
"type"	=> "1",
"learn"	=> "99",
"target"=> array("enemy","multi",10),
"charge"=> array(50,100),
"pow"	=> "500",
"invalid"	=> "1",
); break;
		case "5119":
$skill	= array(
"name"	=> "Master spark",
"img"	=> "skill_057.png",
"exp"	=> "",
"sp"	=> "300",
"type"	=> "1",
"learn"	=> "99",
"target"=> array("enemy","individual",1),
"charge"=> array(0,120),
"pow"	=> "900",
"invalid"	=> "1",
); break;
		case "5120":
$skill	= array(
"name"	=> "Final spark",
"img"	=> "skill_057.png",
"exp"	=> "",
"sp"	=> "400",
"type"	=> "1",
"learn"	=> "99",
"target"=> array("enemy","all",1),
"charge"=> array(20,120),
"pow"	=> "800",
"invalid"	=> "1",
); break;
		case "5121":
$skill	= array(
"name"	=> "萌杀",
"img"	=> "skill_041z.png",
"exp"	=> "即死",
"sp"	=> "100",
"type"	=> "1",
"learn"	=> "99",
"target"=> array("enemy","all",1),
"invalid"	=> "1",
"charge"=> array(100,0),
); break;
		case "5122":
$skill	= array(
"name"	=> "死蝶之舞",
"img"	=> "skill_041z.png",
"exp"	=> "即死",
"sp"	=> "100",
"type"	=> "1",
"learn"	=> "99",
"target"=> array("enemy","individual",1),
"invalid"	=> "1",
"charge"=> array(10,0),
); break;
		case "5123":
$skill	= array(
"name"	=> "幻想乡的黄泉归",
"img"	=> "skill_008.png",
"exp"	=> "复苏",
"sp"	=> "400",
"type"	=> "1",
"learn"	=> "99",
"target"=> array("friend","multi",2),
"support"	=> "1",
"charge"	=> array(0,0),
"pow"		=> "1000",
"priority"	=> "Dead",
); break;
		case "5124":
$skill	= array(
"name"	=> "胡蝶梦之舞",
"img"	=> "skill_066.png",
"exp"	=> "",
"sp"	=> "400",
"type"	=> "1",
"learn"	=> "99",
"target"=> array("enemy","multi",40),
"charge"=> array(40,0),
"pow"	=> "400",
"invalid"	=> "1",
); break;
		case "5125":
$skill	= array(
"name"	=> "未来永劫斩",
"img"	=> "skill_066.png",
"exp"	=> "",
"sp"	=> "330",
"type"	=> "0",
"learn"	=> "99",
"target"=> array("enemy","multi",11),
"charge"=> array(20,20),
"pow"	=> "440",
"invalid"	=> "1",
); break;
		case "5126":
$skill	= array(
"name"	=> "现世斩",
"img"	=> "skill_057.png",
"exp"	=> "",
"sp"	=> "140",
"type"	=> "0",
"learn"	=> "99",
"target"=> array("enemy","individual",1),
"charge"=> array(10,40),
"pow"	=> "1400",
"invalid"	=> "1",
); break;
		case "5127":
$skill	= array(
"name"	=> "六根清净斩",
"img"	=> "skill_057.png",
"exp"	=> "",
"sp"	=> "150",
"type"	=> "0",
"learn"	=> "99",
"target"=> array("enemy","all",1),
"charge"=> array(50,0),
"pow"	=> "250",
"pierce"=> true,
); break;
		case "5128":
$skill	= array(
"name"	=> "百万耀斑",
"img"	=> "skill_057.png",
"exp"	=> "",
"sp"	=> "200",
"type"	=> "1",
"learn"	=> "99",
"target"=> array("enemy","individual",1),
"charge"=> array(10,0),
"pow"	=> "400",
"pierce"=> true,
); break;
		case "5129":
$skill	= array(
"name"	=> "地狱的人造太阳",
"img"	=> "skill_057.png",
"exp"	=> "",
"sp"	=> "500",
"type"	=> "1",
"learn"	=> "99",
"target"=> array("enemy","all",1),
"charge"=> array(50,0),
"pow"	=> "500",
"invalid"	=> "1",
); break;
		case "5130":
$skill	= array(
"name"	=> "自动托卡马克装置",
"img"	=> "skill_062x.png",
"exp"	=> "HP,SP持续回复+10%",
"sp"	=> "100",
"type"	=> "1",
"learn"	=> "99",
"target"=> array("self","individual",1),
"support"	=> "1",
"charge"	=> array(10,0),
"HpRegen"	=> 10,
"SpRegen"	=> 10,
"UpATK"	=> "100",
"UpMATK"	=> "100",
"UpSPD"	=> "100",
); break;
		case "5131":
$skill	= array(
"name"	=> "梦想封印",
"img"	=> "skill_066.png",
"sp"	=> "500",
"type"	=> "0",
"learn"	=> "99",
"target"=> array("enemy","all",1),
"DownMAXHP"	=> "50",
"DownMAXSP"	=> "50",
"invalid"	=> true,
); break;
		case "5132":
$skill	= array(
"name"	=> "阴阳宝玉",
"img"	=> "skill_057.png",
"exp"	=> "",
"sp"	=> "200",
"type"	=> "0",
"learn"	=> "99",
"target"=> array("enemy","multi",2),
"charge"=> array(40,0),
"pow"	=> "400",
"pierce"=> true,
); break;
		case "5133":
$skill	= array(
"name"	=> "封魔阵",
"img"	=> "skill_037.png",
"exp"	=> "SP吸收",
"sp"	=> "0",
"type"	=> "1",
"learn"	=> "99",
"target"=> array("enemy","all",1),
"pow"	=> "300",
"invalid"	=> "1",
"charge"=> array(0,0),
); break;
		case "5134":
$skill	= array(
"name"	=> "梦想天生",
"img"	=> "skill_057.png",
"exp"	=> "",
"sp"	=> "100",
"type"	=> "1",
"learn"	=> "99",
"target"=> array("enemy","all",1),
"charge"=> array(10,0),
"pow"	=> "1000",
"invalid"	=> "1",
); break;
		case "5135":
$skill	= array(
"name"	=> "吸血鬼复苏",
"img"	=> "skill_008.png",
"exp"	=> "复苏",
"sp"	=> "0",
"type"	=> "1",
"learn"	=> "99",
"target"=> array("friend","multi",4),
"support"	=> "1",
"charge"	=> array(0,0),
"pow"		=> "800",
"priority"	=> "Dead",
); break;
		case "5136":
$skill	= array(
"name"	=> "间隙",
"img"	=> "skill_041z.png",
"exp"	=> "即死",
"sp"	=> "0",
"type"	=> "1",
"learn"	=> "99",
"target"=> array("enemy","all",1),
"invalid"	=> "1",
"charge"=> array(0,0),
); break;
		case "5799":
$skill	= array(
"name"	=> "----5799--------",
"img"	=> "skill_066.png",
"sp"	=> "0",
"type"	=> "1",
"learn"	=> "99",
"target"=> array("enemy","all",1),
"pow"	=> "0",
); break;

						// 敵専用召還狼技
		case "5800":
$skill	= array(
"name"	=> "群召唤",
"img"	=> "skill_066.png",
"exp"	=> "",
"sp"	=> "0",
"type"	=> "0",
"learn"	=> "99",
"target"=> array("self","individual",1),
"charge"=> array(0,0),
"summon"=> "1012",
); break;
		case "5801":
$skill	= array(
"name"	=> "召唤奴隶",
"img"	=> "skill_066.png",
"exp"	=> "",
"sp"	=> "0",
"type"	=> "0",
"learn"	=> "99",
"target"=> array("self","individual",1),
"charge"=> array(0,0),
"summon"	=> array(1012,1012,1012,1012,1012),
); break;
		case "5802":
$skill	= array(
"name"	=> "死者复生",
"img"	=> "skill_066.png",
"exp"	=> "",
"sp"	=> "80",
"type"	=> "0",
"learn"	=> "99",
"target"=> array("self","individual",1),
"charge"=> array(30,0),
"summon"	=> array(5003),
); break;
		case "5803":
$skill	= array(
"name"	=> "生育",
"img"	=> "skill_066.png",
"exp"	=> "",
"sp"	=> "0",
"type"	=> "0",
"learn"	=> "99",
"target"=> array("self","individual",1),
"charge"=> array(0,150),
); break;
		case "5804":
$skill	= array(
"name"	=> "召唤奴隶",
"img"	=> "skill_066.png",
"exp"	=> "",
"sp"	=> "200",
"type"	=> "0",
"learn"	=> "99",
"target"=> array("self","individual",1),
"summon"	=> array(1034,1034),
); break;
		case "5805":
$skill	= array(
"name"	=> "嚎叫",
"img"	=> "skill_066.png",
"exp"	=> "",
"sp"	=> "40",
"type"	=> "0",
"learn"	=> "99",
"target"=> array("self","individual",1),
"summon"	=> array(1038),
"charge"	=> array(0,30),
); break;
		case "5806":
$skill	= array(
"name"	=> "雪橇鹿",
"img"	=> "skill_066.png",
"exp"	=> "",
"sp"	=> "0",
"type"	=> "0",
"learn"	=> "99",
"target"=> array("self","individual",1),
"summon"	=> array(1047),
); break;
		case "5807":
$skill	= array(
"name"	=> "召唤猎手之狼",
"img"	=> "skill_066.png",
"exp"	=> "",
"sp"	=> "0",
"type"	=> "0",
"learn"	=> "99",
"target"=> array("self","individual",1),
"summon"	=> array(1091),
); break;
		case "5808":
$skill	= array(
"name"	=> "咳咳",
"img"	=> "skill_066.png",
"exp"	=> "",
"sp"	=> "0",
"type"	=> "0",
"learn"	=> "99",
"target"=> array("self","individual",1),
"summon"	=> array(5102),
); break;
		case "5809":
$skill	= array(
"name"	=> "召唤",
"img"	=> "skill_066.png",
"exp"	=> "",
"sp"	=> "0",
"type"	=> "0",
"learn"	=> "99",
"target"=> array("self","individual",1),
"summon"	=> array(1086),
); break;
		case "5810":
$skill	= array(
"name"	=> "咳咳",
"img"	=> "skill_066.png",
"exp"	=> "",
"sp"	=> "0",
"type"	=> "0",
"learn"	=> "99",
"target"=> array("self","individual",1),
"summon"	=> array(5103),
); break;
		case "5811":
$skill	= array(
"name"	=> "卷火重来",
"img"	=> "skill_066.png",
"exp"	=> "",
"sp"	=> "0",
"type"	=> "0",
"learn"	=> "99",
"target"=> array("self","individual",1),
"summon"	=> array(1076),
); break;
		case "5812":
$skill	= array(
"name"	=> "卷火重来",
"img"	=> "skill_066.png",
"exp"	=> "",
"sp"	=> "0",
"type"	=> "0",
"learn"	=> "99",
"target"=> array("self","individual",1),
"summon"	=> array(5101),
); break;
		case "5813":
$skill	= array(
"name"	=> "天使长",
"img"	=> "skill_066.png",
"exp"	=> "",
"sp"	=> "0",
"type"	=> "0",
"learn"	=> "99",
"target"=> array("self","individual",1),
"summon"	=> array(5100),
); break;
		case "5814":
$skill	= array(
"name"	=> "召唤水元素",
"img"	=> "skill_066.png",
"exp"	=> "",
"sp"	=> "200",
"type"	=> "0",
"learn"	=> "99",
"target"=> array("self","individual",1),
"summon"	=> array(1060),
); break;
		case "5815":
$skill	= array(
"name"	=> "孵化",
"img"	=> "skill_066.png",
"exp"	=> "",
"sp"	=> "0",
"type"	=> "0",
"learn"	=> "99",
"target"=> array("self","individual",1),
"summon"	=> array(1082),
); break;
		case "5816":
$skill	= array(
"name"	=> "火墙",
"img"	=> "skill_066.png",
"sp"	=> "300",
"type"	=> "1",
"learn"	=> "99",
"target"=> array("friend","all",1),
"charge"	=> array(60,30),
"UpDEF"	=> "60",
"UpMDEF"	=> "30",
); break;
		case "5817":
$skill	= array(
"name"	=> "八云蓝",
"img"	=> "skill_066.png",
"exp"	=> "",
"sp"	=> "0",
"type"	=> "0",
"learn"	=> "99",
"target"=> array("self","individual",1),
"summon"	=> array(5105),
); break;
		case "5818":
$skill	= array(
"name"	=> "橙",
"img"	=> "skill_066.png",
"exp"	=> "",
"sp"	=> "0",
"type"	=> "0",
"learn"	=> "99",
"target"=> array("self","individual",1),
"summon"	=> array(5106),
); break;
		case "5819":
$skill	= array(
"name"	=> "血蝙蝠",
"img"	=> "skill_066.png",
"exp"	=> "",
"sp"	=> "0",
"type"	=> "0",
"learn"	=> "99",
"target"=> array("self","individual",1),
"summon"	=> array(5110,5110,5110,5110,5110),
); break;

/*----------------------------------------------*
*   7000 - 7999 PassiveSkills                   *
*-----------------------------------------------*
	Passive 設定項目
"passive"	=> 1,//パッシブスキルであるということ
"p_maxhp"	=> "30",//最大HP+30
"p_maxsp"	=> "10",//最大SP+10
"p_str"	=> "1",//最大str+
"p_int"	=> "2",//最大int+
"p_dex"	=> "3",//最大dex+
"p_spd"	=> "4",//最大spd+
"p_luk"	=> "5",//最大luk+
*-----------------------------------------------*/
		case "7000":
$skill	= array(
"name"	=> "生命生化",
"img"	=> "acce_003c.png",
"exp"	=> "HP+30",
"learn"	=> "2",
"passive"	=> 1,
"p_maxhp"	=> "30",
); break;
		case "7001":
$skill	= array(
"name"	=> "生命洪流",
"img"	=> "acce_003c.png",
"exp"	=> "HP+80",
"learn"	=> "9",
"passive"	=> 1,
"p_maxhp"	=> "80",
); break;
		case "7002":
$skill	= array(
"name"	=> "生命超越",
"img"	=> "acce_003c.png",
"exp"	=> "HP+200",
"learn"	=> "21",
"passive"	=> 1,
"P_MAXHP"	=> "200",
); break;
		case "7003":
$skill	= array(
"name"	=> "生命辅助1",
"img"	=> "acce_003c.png",
"exp"	=> "HP+30",
"learn"	=> "4",
"passive"	=> 1,
"P_MAXHP"	=> "30",
); break;
		case "7004":
$skill	= array(
"name"	=> "生命辅助2",
"img"	=> "acce_003c.png",
"exp"	=> "HP+70",
"learn"	=> "9",
"passive"	=> 1,
"P_MAXHP"	=> "70",
); break;
		case "7005":
$skill	= array(
"name"	=> "生命辅助3",
"img"	=> "acce_003c.png",
"exp"	=> "HP+150",
"learn"	=> "21",
"passive"	=> 1,
"P_MAXHP"	=> "150",
); break;
							// HealBonus
		case "7005":
$skill	= array(
"name"	=> "生命辅助3",
"img"	=> "acce_003c.png",
"exp"	=> "HP+150",
"learn"	=> "21",
"passive"	=> 1,
"P_MAXHP"	=> "150",
); break;
//----------------------------------------------//
// 9999                                         //
//----------------------------------------------//
		case "9000":
$skill	= array(
"name"	=> "* 继续思考",
"name2"	=> "* 考虑一下（？）",
"exp"	=> "多重判定，引用 swto 的话就是and",
"img"	=> "skill_040.png",
"learn"	=> "4",
"type"	=> false,
"pow"	=> false,
); break;
//----------------------------------------------//
	}
	if(!$skill)
		return false;
	$skill	+= array("no"=>"$no");
	return $skill;
}
?>