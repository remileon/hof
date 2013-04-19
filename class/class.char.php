<?php 

include(DATA_JOB);

class char{

	// ファイルポインタ
	var $fp;
	var $file;
	var $Number;

	// �lのキャラか?
	var $user;

	/*
		児云議な秤��
		$gender	= (0=male 1=female)
	*/
	var $name, $gender, $job, $job_name, $img, $birth, $level, $exp;
	// ステ�`タス
	var $maxhp, $hp, $maxsp, $sp, $str, $int, $dex, $spd, $luk;
	// ステ�`タスポイントとか
	var $statuspoint;
	var $skillpoint;
	// 廾��
	var $weapon, $shield, $armor, $item;
	// �蜉Lその麿
	var $position, $guard;
	// スキル
	var $skill;
	// 佩��(登協、聞うスキル)
	var $Pattern;
	var $PatternMemo;
	var $judge, $quantity, $action;

	// �蜉L喘�篳�(BattleVariable) デ�`タには隠贋されない。
	var $team;
	var $IMG;
	var $MAXHP, $HP, $MAXSP, $SP, $STR, $INT, $DEX, $SPD, $LUK;
	var $STATE;//彜�B(0=伏贋 1=しぼ�` 2=蕎彜�B)
	var $POSITION;
	var $P_MAXHP, $P_MAXSP, $P_STR, $P_INT, $P_DEX, $P_SPD,$P_LUK;//�g��なステ�`タス�a屎(plus)
	var $M_MAXHP, $M_MAXSP;//�g��なステ�`タス�a屎(multipication)
	var $SPECIAL;// 蒙歩室嬬
	/*
		PoisonResist 蕎丘森
		HealBonus .
		Barrier
		Undead
	*/
	var $WEAPON;//冷匂タイプ
	var $atk, $def;// $atk=array(麗尖,徴隈); $def=array(麗尖/,麗尖-,徴隈/,徴隈-);
	var $delay;//佩�咾泙任��r�g
	var $expect = false;//��蟹頼阻�rに聞うスキル
	var $expect_type;//��蟹頼阻�rに聞うスキルのタイプ(麗尖/徴隈)
	var $expect_target;//●のタ�`ゲット

	var $ActCount;//栽��佩�啝慂�
	var $JdgCount;//�Q協した登僅の指方=array()
//////////////////////////////////////////////////
	function char($file=false) {

		if(!$file)
			return 0;

		$this->Number	= basename($file,".dat");
		$this->file	= $file;
		$this->fp	= FileLock($file);

		$data	= ParseFileFP($this->fp);
		$this->SetCharData($data);
	}
//////////////////////////////////////////////////
//	ファイルポインタが�_かれていれば�]じる
	function fpclose() {
		if(is_resource($this->fp)) {
			//print("who?.".$this->Name()."<br />\n");
			//print("FP�]じた");
			fclose($this->fp);
			unset($this->fp);
		}
	}
//////////////////////////////////////////////////
//	孰�樵�?孰�召靴��rの孰�哨皀鵐好食`の��さ
	function SummonPower() {
		$DEX_PART	= sqrt($this->DEX) * 5;// DEX蛍の��晒蛍
		$Strength	= 1 + ($DEX_PART + $this->LUK)/250;
		if($this->SPECIAL["Summon"])
			$Strength	*= (100+$this->SPECIAL["Summon"])/100;
		return $Strength;
	}
//////////////////////////////////////////////////
//	HPの�徂�
	function SacrificeHp($rate) {
		if(!$rate) return false;

		$SelfDamage	= ceil( $this->MAXHP*($rate/100) );
		if($this->POSITION != "front")
			$SelfDamage	*= 2;
		print("<span class=\"dmg\">".$this->Name(bold)." sacrifice ");
		print("<span class=\"bold\">$SelfDamage</span> HP</span>\n");
		$this->HpDamage($SelfDamage);
		print("</span><br />\n");
	}
//////////////////////////////////////////////////
//	蒙歩室嬬?の弖紗
	function GetSpecial($name,$value) {
		if(is_bool($value)) {
			$this->SPECIAL["$name"]	= $value;
		} else if (is_array($value)) {
			foreach($value as $key => $val) {
				$this->SPECIAL["$name"]["$key"]	+= $val;
			}
		} else {
			$this->SPECIAL["$name"]	+= $value;
		}
	}
//////////////////////////////////////////////////
//	HPSP隔�A指��
	function AutoRegeneration() {
		// HP指��
		if($this->SPECIAL["HpRegen"]) {
			$Regen	= round($this->MAXHP * $this->SPECIAL["HpRegen"]/100);
			print('<span class="recover">* </span>'.$this->Name(bold)."<span class=\"recover\"> 徭強指鹸 <span class=\"bold\">".$Regen." HP</span></span> ");
			$this->HpRecover($Regen);
			print("<br />\n");
		}
		// SP指��
		if($this->SPECIAL["SpRegen"]) {
			$Regen	= round($this->MAXSP * $this->SPECIAL["SpRegen"]/100);
			print('<span class="support">* </span>'.$this->Name(bold)."<span class=\"support\"> 徭強指鹸 <span class=\"bold\">".$Regen." SP</span></span> ");
			$this->SpRecover($Regen);
			print("<br />\n");
		}
	}
//////////////////////////////////////////////////
//	キャラステ�`タスの匯桑貧のやつ。
	function ShowCharDetail() {
		$P_MAXHP	= round($this->maxhp * $this->M_MAXHP/100) + $this->P_MAXHP;
		$P_MAXSP	= round($this->maxsp * $this->M_MAXSP/100) + $this->P_MAXSP;
		?>
<table>
<tr><td valign="top" style="width:180px"><?php $this->ShowCharLink();?>
</td><td valign="top" style="padding-right:20px">
<table border="0" cellpadding="0" cellspacing="0">
<tr><td style="text-align:right">Exp : </td><td><?php print $this->exp?>/<?php print $this->CalcExpNeed()?></td></tr>
<tr><td style="text-align:right">HP : </td><td><?php print $this->maxhp?><?php if($P_MAXHP) print(" + {$P_MAXHP}");?></td></tr>
<tr><td style="text-align:right">SP : </td><td><?php print $this->maxsp?><?php if($P_MAXSP) print(" + {$P_MAXSP}");?></td></tr>
<tr><td style="text-align:right">STR : </td><td><?php print $this->str?><?php if($this->P_STR) print(" + {$this->P_STR}");?></td></tr>
<tr><td style="text-align:right">INT : </td><td><?php print $this->int?><?php if($this->P_INT) print(" + {$this->P_INT}");?></td></tr>
<tr><td style="text-align:right">DEX : </td><td><?php print $this->dex?><?php if($this->P_DEX) print(" + {$this->P_DEX}");?></td></tr>
<tr><td style="text-align:right">SPD : </td><td><?php print $this->spd?><?php if($this->P_SPD) print(" + {$this->P_SPD}");?></td></tr>
<tr><td style="text-align:right">LUK : </td><td><?php print $this->luk?><?php if($this->P_LUK) print(" + {$this->P_LUK}");?></td></tr>
</table>
</td><td valign="top">
<?php 
	if($this->SPECIAL["PoisonResist"])
		print("蕎丘森 +".$this->SPECIAL["PoisonResist"]."%<br />\n");
	if($this->SPECIAL["Pierce"]["0"])
		print("涙篇麗尖契囮彬墾 +".$this->SPECIAL["Pierce"]["0"]."<br />\n");
	if($this->SPECIAL["Pierce"]["1"])
		print("涙篇徴隈契囮彬墾 +".$this->SPECIAL["Pierce"]["1"]."<br />\n");
	if($this->SPECIAL["Summon"])
		print("孰�樵� +".$this->SPECIAL["Summon"]."%<br />\n");
?>
</td></tr></table>
<?php 
	}
//////////////////////////////////////////////////
//	�lのキャラか�O協する
	function SetUser($user) {
		$this->user	= $user;
	}
//////////////////////////////////////////////////
//	チャ�`ジ(��蟹)嶄の盾茅
	function ResetExpect() {
		$this->expect	= false;
		$this->expect_type	= false;
		$this->expect_target	= false;
	}
//////////////////////////////////////////////////
//	念双瘁双の卞��
	function Move($posi) {
		//print($this->POSITION."->".$posi."<br />\n");
		if($posi == "front") {
			if($this->POSITION == "front")
				return false;
			$this->POSITION = "front";
			print($this->Name(bold)." 卞欺念電.<br />\n");
		} else {
			if($this->POSITION != "front")
				return false;
			$this->POSITION = "back";
			print($this->Name(bold)." 卞欺朔電.<br />\n");
		}
	}

//////////////////////////////////////////////////
//	佩�咾泙任両琺x�y協
	function nextDis() {
		if($this->STATE === DEAD)
			return 100;
		$distance	= (100 - $this->delay)/$this->DelayValue();
		return $distance;
	}
//////////////////////////////////////////////////
//	佩�嚶�リセット
	function DelayReset() {
		if(DELAY_TYPE === 0) {
			$this->delay	= $this->SPD;
		} else if(DELAY_TYPE === 1) {
			$this->delay	= 0;
		}
	}
//////////////////////////////////////////////////
//	佩�咾鮟�づかせる。
	function Delay($no) {
		// 棒蘭嶄は��えないようにする
		if($this->STATE === DEAD){
			return false;
    }
		if(DELAY_TYPE === 0) {
			$this->delay	+= $no;
		} else if(DELAY_TYPE === 1) {
			$this->delay	+= $no * $this->DelayValue();
			//print("DELAY".$this->delay."<br />\n");
		}
	}
//////////////////////////////////////////////////
//	
	function DelayValue() {
		return sqrt($this->SPD) + DELAY_BASE;
	}
//////////////////////////////////////////////////
//	佩�咾鰡Wらせる(Rate)
	function DelayByRate($No,$BaseDelay,$Show=false) {
		if(DELAY_TYPE === 0) {
			if($Show) {
				print("(".sprintf("%0.1f",$this->delay));
				print('<span style="font-size:80%"> >>> </span>');
			}
			$Delay	= ($BaseDelay - $this->SPD) * ($No/100);//�Wらせる�g侯
			$this->delay	-= $Delay;
			if($Show) {
				print(sprintf("%0.1f",$this->delay)."/".sprintf("%0.1f",$BaseDelay).")");
			}
		} else if(DELAY_TYPE === 1) {
			if($Show) {
				print("(".sprintf("%0.0f",$this->delay));
				print('<span style="font-size:80%"> >>> </span>');
			}
			$Delay	= $No;//�Wらせる�g侯
			$this->delay	-= $Delay;
			if($Show) {
				print(sprintf("%0.0f",floor($this->delay))."/".sprintf("%d",100).")");
			}
		}
	}
//////////////////////////////////////////////////
//	佩�咾鰓臻佑蠅垢�(%)
	function DelayCut($No,$BaseDelay,$Show=false) {
		if(DELAY_TYPE === 0) {
			$Delay	= ($BaseDelay - $this->delay) * ($No/100);//壼まらせる�g侯
			if($Show) {
				print("(".sprintf("%0.1f",$this->delay));
				print('<span style="font-size:80%"> >>> </span>');
			}
			$this->delay	+= $Delay;
			if($Show) {
				print(sprintf("%0.1f",$this->delay)."/".sprintf("%0.1f",$BaseDelay).")");
			}
		} else if(DELAY_TYPE === 1) {
			$Delay	= (100 - $this->delay) * ($No/100);//壼まらせる�g侯
			if($Show) {
				print("(".sprintf("%0.1f",$this->delay));
				print('<span style="font-size:80%"> >>> </span>');
			}
			$this->delay	+= $Delay;
			if($Show) {
				print(sprintf("%0.0f",floor($this->delay))."/".sprintf("%d",100).")");
			}
		}
	}
//////////////////////////////////////////////////
//	軸�r佩�咾気擦襦�
	function Quick($delay) {
		if(DELAY_TYPE === 0)
			$this->delay	= $delay;
		else if(DELAY_TYPE === 1)
			$this->delay	= 100.1;
	}
//////////////////////////////////////////////////
//	兆念を�笋┐襦�
	function ChangeName($new) {
		$this->name	= $new;
	}
//////////////////////////////////////////////////
//	佩�咼僖食`ンに弖紗する。
	function AddPattern($no) {
		if(!is_int($no) && $no < 0) return false;

		$this->PatternExplode();
		array_splice($this->judge,$no,0,"1000");
		array_pop($this->judge);
		array_splice($this->quantity,$no,0,"0");
		array_pop($this->quantity);
		array_splice($this->action,$no,0,"1000");
		array_pop($this->action);
		$this->CutPatterns();
		$this->PatternSave($this->judge,$this->quantity,$this->action);
		return true;
	}
//////////////////////////////////////////////////
//	佩�咼僖食`ンを��茅。
	function DeletePattern($no) {
		if(!is_int($no) && $no < 0) return false;

		$this->PatternExplode();
		array_splice($this->judge,$no,1);
		array_push($this->judge,"1000");
		array_splice($this->quantity,$no,1);
		array_push($this->quantity,"0");
		array_splice($this->action,$no,1);
		array_push($this->action,"1000");
		$this->CutPatterns();
		$this->PatternSave($this->judge,$this->quantity,$this->action);
		return true;
	}
//////////////////////////////////////////////////
//	�渊舖O協方を階えていないか伉塘なので恬った。。
	function CutPatterns() {
		$No	= $this->MaxPatterns();
		while($No < count($this->judge)) {
			array_pop($this->judge);
		}
		while($No < count($this->quantity)) {
			array_pop($this->quantity);
		}
		while($No < count($this->action)) {
			array_pop($this->action);
		}
	}
//////////////////////////////////////////////////
//	メモってあるパタ�`ンと住�Q
	function ChangePatternMemo() {
		$temp	= $this->Pattern;
		$this->Pattern	= $this->PatternMemo;
		$this->PatternMemo	= $temp;
	/*
		//$serial	= serialize(array("judge"=>$this->judge,"action"=>$this->action));
		$serial	= implode("<>",$this->judge)."|".implode("<>",$this->action);

		if(!$this->PatternMemo) {
			$No	= $this->MaxPatterns();
			$judge	= array_fill(0,$No,"1000");
			$action	= array_fill(0,$No,"1000");
		} else {
			list($judge,$action)	= explode("|",$this->PatternMemo);
			$judge	= explode("<>",$judge);
			$action	= explode("<>",$action);
		}
		$this->PatternMemo	= $serial;
		$this->judge	= $judge;
		$this->action	= $action;
	*/
		return true;
	}
//////////////////////////////////////////////////
//	キャラを瘁�l晒させる。
	function KnockBack($no=1) {
		if($this->POSITION == "front") {
			$this->POSITION = "back";
			print($this->Name(bold)."巴欺朔電!<br />\n");
		}
	}
//////////////////////////////////////////////////
//	
//	ステ�`タス��晒(+)
	function PlusSTR($no) {
		$this->STR	+= $no;
		print($this->Name(bold)." STR 戻幅 {$no}<br />\n");
	}
	function PlusINT($no) {
		$this->INT	+= $no;
		print($this->Name(bold)." INT 戻幅 {$no}<br />\n");
	}
	function PlusDEX($no) {
		$this->DEX	+= $no;
		print($this->Name(bold)." DEX 戻幅 {$no}<br />\n");
	}
	function PlusSPD($no) {
		$this->SPD	+= $no;
		print($this->Name(bold)." SPD 戻幅 {$no}<br />\n");
	}
	function PlusLUK($no) {
		$this->LUK	+= $no;
		print($this->Name(bold)." LUK 戻幅 {$no}<br />\n");
	}
//////////////////////////////////////////////////
//	ステ�`タス��晒(%)
	function UpMAXHP($no) {
		print($this->Name(bold)." MAXHP({$this->MAXHP}) 戻幅欺 ");
		$this->MAXHP	= round($this->MAXHP * (1 + $no/100));
		print("{$this->MAXHP}<br />\n");
	}
	function UpMAXSP($no) {
		print($this->Name(bold)." MAXSP({$this->MAXSP}) 戻幅欺 ");
		$this->MAXSP	= round($this->MAXSP * (1 + $no/100));
		print("{$this->MAXSP}<br />\n");
	}
	function UpSTR($no) {
		$this->STR	= round($this->STR * (1 + $no/100));
		if(($this->str * MAX_STATUS_MAXIMUM/100) < $this->STR) {
			print($this->Name(bold)." STR 戻幅欺恷寄 (".MAX_STATUS_MAXIMUM."%).<br />\n");
			$this->STR = round($this->str * MAX_STATUS_MAXIMUM/100);
		} else {
			print($this->Name(bold)." STR 戻幅 {$no}%<br />\n");
		}
	}
	function UpINT($no) {
		$this->INT	= round($this->INT * (1 + $no/100));
		if(($this->int * MAX_STATUS_MAXIMUM/100) < $this->INT) {
			print($this->Name(bold)." INT 戻幅欺恷寄(".MAX_STATUS_MAXIMUM."%).<br />\n");
			$this->INT = round($this->int * MAX_STATUS_MAXIMUM/100);
		} else {
			print($this->Name(bold)." INT 戻幅 {$no}%<br />\n");
		}
	}
	function UpDEX($no) {
		$this->DEX	= round($this->DEX * (1 + $no/100));
		if(($this->dex * MAX_STATUS_MAXIMUM/100) < $this->DEX) {
			print($this->Name(bold)." DEX 戻幅欺恷寄(".MAX_STATUS_MAXIMUM."%).<br />\n");
			$this->DEX = round($this->dex * MAX_STATUS_MAXIMUM/100);
		} else {
			print($this->Name(bold)." DEX 戻幅 {$no}%<br />\n");
		}
	}
	function UpSPD($no) {
		$this->SPD	= round($this->SPD * (1 + $no/100));
		if(($this->spd * MAX_STATUS_MAXIMUM/100) < $this->SPD) {
			print($this->Name(bold)." SPD 戻幅欺恷寄(".MAX_STATUS_MAXIMUM."%).<br />\n");
			$this->SPD = round($this->spd * MAX_STATUS_MAXIMUM/100);
		} else {
			print($this->Name(bold)." SPD 戻幅 {$no}%<br />\n");
		}
	}
	function UpATK($no) {
		$this->atk["0"]	= round($this->atk["0"] * (1 + $no/100));
		print($this->Name(bold)." ATK 戻幅 {$no}%<br />\n");
	}
	function UpMATK($no) {
		$this->atk["1"]	= round($this->atk["1"] * (1 + $no/100));
		print($this->Name(bold)." MATK 戻幅 {$no}%<br />\n");
	}
	function UpDEF($no) {
		$up	= floor((100 - $this->def["0"]) * ($no/100) );
		$this->def["0"]	+= $up;
		print($this->Name(bold)." DEF 戻幅 {$no}%<br />\n");
	}
	function UpMDEF($no) {
		$up	= floor((100 - $this->def["2"]) * ($no/100) );
		print($this->Name(bold)." MDEF 戻幅 {$no}%<br />\n");
		$this->def["2"]	+= $up;
	}
//	ステ�`タス樋悶晒(%)
	function DownMAXHP($no) {
		print($this->Name(bold)." MAXHP({$this->MAXHP}) 和週欺 ");
		$this->MAXHP	= round($this->MAXHP * (1 - $no/100));
		if($this->MAXHP < $this->HP)
			$this->HP	= $this->MAXHP;
		print("{$this->MAXHP}<br />\n");
	}
	function DownMAXSP($no) {
		print($this->Name(bold)." MAXSP({$this->MAXSP}) 和週欺 ");
		$this->MAXSP	= round($this->MAXSP * (1 - $no/100));
		if($this->MAXSP < $this->SP)
			$this->SP	= $this->MAXSP;
		print("{$this->MAXSP}<br />\n");
	}
	function DownSTR($no) {
		$this->STR	= round($this->STR * (1 - $no/100));
		print($this->Name(bold)." STR 和週 {$no}%<br />\n");
	}
	function DownINT($no) {
		$this->INT	= round($this->INT * (1 - $no/100));
		print($this->Name(bold)." INT 和週 {$no}%<br />\n");
	}
	function DownDEX($no) {
		$this->DEX	= round($this->DEX * (1 - $no/100));
		print($this->Name(bold)." DEX 和週 {$no}%<br />\n");
	}
	function DownSPD($no) {
		$this->SPD	= round($this->SPD * (1 - $no/100));
		print($this->Name(bold)." SPD 和週 {$no}%<br />\n");
	}
	function DownATK($no) {
		$this->atk["0"]	= round($this->atk["0"] * (1 - $no/100));
		print($this->Name(bold)." ATK 和週 {$no}%<br />\n");
	}
	function DownMATK($no) {
		$this->atk["1"]	= round($this->atk["1"] * (1 - $no/100));
		print($this->Name(bold)." MATK 和週 {$no}%<br />\n");
	}
	function DownDEF($no) {
		$this->def["0"]	= round($this->def["0"] * (1 - $no/100));
		print($this->Name(bold)." DEF 和週 {$no}%<br />\n");
	}
	function DownMDEF($no) {
		$this->def["2"]	= round($this->def["2"] * (1 - $no/100));
		print($this->Name(bold)." MDEF 和週 {$no}%<br />\n");
	}
//////////////////////////////////////////////////
//	キャラの峺幣の方
	function MaxPatterns() {
		if($this->int < 10)//1-9
			$no	= 2;
		else if($this->int < 15)//10-14
			$no	= 3;
		else if($this->int < 30)//15-29
			$no	= 4;
		else if($this->int < 50)//30-49
			$no	= 5;
		else if($this->int < 80)//50-79
			$no	= 6;
		else if($this->int < 120)//80-119
			$no	= 7;
		else if($this->int < 160)//120-159
			$no	= 8;
		else if($this->int < 200)//160-199
			$no	= 9;
		else if($this->int < 250)//
			$no	= 10;
		else if($this->int < 300)//
			$no	= 11;
		else if($this->int < 350)//
			$no	= 12;
		else if($this->int < 400)//
			$no	= 13;
		else if($this->int < 450)//
			$no	= 14;
		else if($this->int < 500)//
			$no	= 15;
		if(29 < $this->level)
			$no++;
		else if(59 < $this->level)
			$no++;
		else if(89 < $this->level)
			$no++;
		return $no;
	}

//////////////////////////////////////////////////
//	佩�咼僖食`ンの�筝�。
	function ChangePattern($judge,$action) {
		$this->judge	= array();
		$this->action	= array();
		$max	= $this->MaxPatterns();//恷詰登僅方
		$judge_list	= array_flip(JudgeList());
		$skill_list	= array_flip($this->skill);
		for($i=0; $i<$max; $i++) {//登僅��に����
			if(!$judge["$i"])	$this->judge[$i]	= 1000;
			if(!$action["$i"])	$this->action[$i]	= 1000;

			if( isset($judge_list[$judge[$i]]) && isset($skill_list[$action[$i]]) ) {
				$this->judge[$i]	= $judge[$i];
				$this->action[$i]	= $action[$i];
			}
		}
		if($max < count($this->judge))
			return false;
		return true;
	}
//////////////////////////////////////////////////
//	蕎ダメ�`ジ
	function PoisonDamage($multiply=1) {
		if($this->STATE !== 2) return false;

		$poison	= $this->PoisonDamageFormula($multiply);
		print("<span class=\"spdmg\">".$this->Name(bold)." 喇噐嶄蕎鞭欺 ");
		print("<span class=\"bold\">$poison</span> 彬墾.\n");
		$this->HpDamage2($poison);
		print("</span><br />\n");
	}
//////////////////////////////////////////////////
//	蕎ダメ�`ジの巷塀
	function PoisonDamageFormula($multiply=1) {
		$damage	= round($this->MAXHP * 0.10) + ceil($this->level/2);
		$damage	*= $multiply;
		return round($damage);
	}
//////////////////////////////////////////////////
//	蕎の彜�B ��械晒 �I尖
	function GetPoison($BePoison) {
		if($this->STATE === 2)
			return false;
		if($this->SPECIAL["PoisonResist"]) {
			$prob	= mt_rand(0,99);
			$BePoison	*= (1 - $this->SPECIAL["PoisonResist"]/100);
			if($prob < $BePoison) {
				$this->STATE = 2;
				return true;
			} else {
				return "BLOCK";
			}
		}
		$this->STATE = 2;
		return true;
	}
//////////////////////////////////////////////////
//	蕎塚來を誼る
	function GetPoisonResist($no) {
		$Add	= (100 - $this->SPECIAL["PoisonResist"]) * ($no/100);
		$Add	= round($Add);
		$this->SPECIAL["PoisonResist"]	+= $Add;
		print('<span class="support">');
		print($this->Name(bold)." got PoisonResist!(".$this->SPECIAL["PoisonResist"]."%)");
		print("</span><br />\n");
	}
//////////////////////////////////////////////////
//	兆念を卦す
	function Name($string=false) {
		if($string)
			return "<span class=\"{$string}\">{$this->name}</span>";
		else
			return $this->name;
	}
//////////////////////////////////////////////////
//	駅勣�U�Y��
	function CalcExpNeed() {
		switch($this->level) {
			case 40:	$no	= 30000; break;
			case 41:	$no	= 40000; break;
			case 42:	$no	= 50000; break;
			case 43:	$no	= 60000; break;
			case 44:	$no	= 70000; break;
			case 45:	$no	= 80000; break;
			case 46:	$no	= 90000; break;
			case 47:	$no	= 100000; break;
			case 48:	$no	= 120000; break;
			case 49:	$no	= 140000; break;
			case 50:	$no	= 160000; break;
			case 51:	$no	= 180000; break;
			case 52:	$no	= 200000; break;
			case 53:	$no	= 220000; break;
			case 54:	$no	= 240000; break;
			case 55:	$no	= 260000; break;
			case 56:	$no	= 280000; break;
			case 57:	$no	= 300000; break;
			case 58:	$no	= 320000; break;
			case 59:	$no	= 340000; break;
			case 60:	$no	= 360000; break;
			case 61:	$no	= 380000; break;
			case 62:	$no	= 400000; break;
			case 63:	$no	= 420000; break;
			case 64:	$no	= 440000; break;
			case 65:	$no	= 460000; break;
			case 66:	$no	= 480000; break;
			case 67:	$no	= 500000; break;
			case 68:	$no	= 520000; break;
			case 69:	$no	= 540000; break;
			case 70:	$no	= 560000; break;
			case 71:	$no	= 580000; break;
			case 72:	$no	= 600000; break;
			case 73:	$no	= 620000; break;
			case 74:	$no	= 640000; break;
			case 75:	$no	= 660000; break;
			case 76:	$no	= 680000; break;
			case 77:	$no	= 700000; break;
			case 78:	$no	= 720000; break;
			case 79:	$no	= 740000; break;
			case 80:	$no	= 760000; break;
			case 81:	$no	= 780000; break;
			case 82:	$no	= 800000; break;
			case 83:	$no	= 820000; break;
			case 84:	$no	= 840000; break;
			case 85:	$no	= 860000; break;
			case 86:	$no	= 880000; break;
			case 87:	$no	= 900000; break;
			case 88:	$no	= 920000; break;
			case 89:	$no	= 940000; break;
			case 90:	$no	= 960000; break;
			case 91:	$no	= 980000; break;
			case 92:	$no	= 1000000; break;
			case 93:	$no	= 1100000; break;
			case 94:	$no	= 1200000; break;
			case 95:	$no	= 1300000; break;
			case 96:	$no	= 1400000; break;
			case 97:	$no	= 1500000; break;
			case 98:	$no	= 2000000; break;
			case 99:	$no	= 3000000; break;
			case 100:

			case (100 <= $this->level):
				$no	= "MAX"; break;
			case(21 < $this->level):
				$no	= 2*pow($this->level,3)+100*$this->level+100;
				$no	-= substr($no,-2);
				$no /= 5;
				break;
			default:
				$no	= pow($this->level-1,2)/2*100+100;
				$no /= 5;
				break;
		}
		return $no;
	}
//////////////////////////////////////////////////
//	�U�Y�､魑辰�
	function GetExp($exp) {
		if($this->monster) return false;//モンスタ�`は�U�Y�､魑辰覆�
		if(MAX_LEVEL <= $this->level) return false;//恷寄レベルの��栽�U�Y�､魑辰覆�

		$this->exp	+= $exp;
		$need	= $this->CalcExpNeed($this->level);// 駅勣な�U�Y��
		if($need <= $this->exp) {
			$this->LevelUp();
			return true;
		}
	}
//////////////////////////////////////////////////
//	レベルあげる�rの�I尖
	function LevelUp() {
		$this->exp	= 0;
		$this->level++;
		$this->statuspoint	+= GET_STATUS_POINT;//ステポをもらえる。
		$this->skillpoint	+= GET_SKILL_POINT;
	}
//////////////////////////////////////////////////
//	クラスチェンジ(����)
//	廾�笋鬚呂困后�
	function ClassChange($job) {
		include_once(DATA_CLASSCHANGE);
		if(CanClassChange($this,$job)) {
			$this->job = $job;
			$this->SetJobData();
			$this->SetHpSp();
			//廾�笋鮟盂�
			return true;
		}
		return false;
	}
//////////////////////////////////////////////////
//	アイテムを廾�笋垢�(��が廾�篆苗椶蔑錣�どうかは�{べない)
	function Equip($item) {
		$old	= array(//�F壓の廾�笋��△鳳４罎靴討�く。
			"weapon"=> $this->weapon,
			"shield"=> $this->shield,
			"armor"	=> $this->armor,
			"item"	=> $this->item
			);

		$return	= array();//はずした廾�筺�

		switch($item["type"]) {//�N���e
			case "州"://頭返冷匂
			case "悵遍":
			case "狸":
			case "玉凹見":
			case "徴嬌":
			case "憾":
			case "褒返州"://�I返冷匂
			case "嚢":
			case "見":
			case "嬌":
			case "広":
			case "噴忖広":
			case "厭":
				// 屡に廾�笋靴討△詢籠�ははずす。
				if($this->weapon)
					$return[]	= $this->weapon;
				if($item["dh"] && $this->shield) {//�I返隔ちの冷匂の��栽。
					//芹を廾�笋靴討い燭蕕呂困后�
					$return[]	= $this->shield;
					$this->shield	= NULL;
				}
				$this->weapon	= $item["no"];
				break;
			case "芹"://芹
			case "MainGauche":
			case "慕":
				if($this->weapon) {//�I返冷匂ならそれははずす
					$weapon	= LoadItemData($this->weapon);
					if($weapon["dh"]) {
						$return[]	= $this->weapon;
						$this->weapon	= NULL;
					}
				}
				if($this->shield)//芹廾�笋靴討い譴亞屬僧錣房咾┐�
					$return[]	= $this->shield;
				$this->shield	= $item["no"];
				break;
			case "遮"://�z
			case "丗捲":
			case "海奴":
				if($this->armor)
					$return[]	= $this->armor;
				$this->armor	= $item["no"];
				break;
			case "祇醤":
				if($this->item)
					$return[]	= $this->item;
				$this->item	= $item["no"];
				break;
			default: return false;
		}

		// handleの��麻。
		$weapon	= LoadItemData($this->weapon);
		$shield	= LoadItemData($this->shield);
		$armor	= LoadItemData($this->armor);
		$item2	= LoadItemData($this->item);// item2*

		$handle	= 0;
		$handle	= $weapon["handle"] + $shield["handle"] + $armor["handle"] + $item2["handle"];
		if($this->GetHandle() < $handle) {//handle over
			foreach($old as $key => $val)//圷に��す。
				$this->{$key}	= $val;
			return false;
		}

		return $return;
	}
//////////////////////////////////////////////////
//	しぼ�`してるかどうか�_�Jする。
	function CharJudgeDead() {
		if($this->HP < 1 && $this->STATE !== DEAD) {//しぼ�`
			$this->STATE	= DEAD;
			$this->HP	= 0;
			$this->ResetExpect();

			return true;
		}
	}
//////////////////////////////////////////////////
//	伏贋彜�Bにする。
	function GetNormal($mes=false) {
		if($this->STATE === ALIVE)
			return true;
		if($this->STATE === DEAD) {//棒蘭彜�B
			if($mes)
				print($this->Name(bold).' <span class="recover">鹸試</span>!<br />'."\n");
			$this->STATE = 0;
			return true;
		}
		if($this->STATE === POISON) {//蕎彜�B
			if($mes)
				print($this->Name(bold)."議 <span class=\"spdmg\">嶄蕎</span> 瓜嵶囹.<br />\n");
			$this->STATE = 0;
			return true;
		}
	}
//////////////////////////////////////////////////
//	�蜉L嶄のキャラ兆,HP,SP を弼を蛍けて燕幣する
//	それ參翌にも駅勣な麗があれば燕幣するようにした。
	function ShowHpSp() {
		if($this->STATE === 1)
			$sub	= " dmg";
		else if($this->STATE === 2)
			$sub	= " spdmg";
		//兆念
		print("<span class=\"bold{$sub}\">{$this->name}</span>\n");
		// チャ�`ジor��蟹
		if($this->expect_type === 0)
			print('<span class="charge">(們薦)</span>'."\n");
		else if($this->expect_type === 1)
			print('<span class="charge">(喀蟹)</span>'."\n");
		// HP,SP
		print("<div class=\"hpsp\">\n");
		$sub	= $this->STATE === 1 ? "dmg":"recover";
		print("<span class=\"{$sub}\">HP : {$this->HP}/{$this->MAXHP}</span><br />\n");//HP
		$sub	= $this->STATE === 1 ? "dmg":"support";
		print("<span class=\"{$sub}\">SP : {$this->SP}/{$this->MAXSP}</span>\n");
		print("</div>\n");//SP
	}
//////////////////////////////////////////////////
//	�､��篁�を燕幣する(ダメ�`ジ鞭けた�rとか)
	function ShowValueChange($from,$to) {
		print("({$from} > {$to})");
	}
//////////////////////////////////////////////////
//	HPへのダメ�`ジ
	function HpDamage($damage,$show=true) {
		$Before	= $this->HP;
		$this->HP	-= $damage;// HPを�pらす。
		if($show)
			$this->ShowValueChange($Before,$this->HP);
	}
//////////////////////////////////////////////////
//	HPへのダメ�`ジ(0參和になるなら1になる。)
	function HpDamage2($damage) {
		$Before	= $this->HP;
		$this->HP	-= $damage;
		// $DoNotDie=true ならHPが1を和指った��栽1にする。
		if($this->HP < 1)
			$this->HP	= 1;
		$this->ShowValueChange($Before,$this->HP);
	}
//////////////////////////////////////////////////
//	HPのパ�`セント
	function HpPercent() {
		if($this->MAXHP == 0)
			return 0;
		$p	= ($this->HP/$this->MAXHP)*100;
		return $p;
	}
//////////////////////////////////////////////////
//	SPのパ�`セント
	function SpPercent() {
		if($this->MAXSP == 0)
			return 0;
		$p	= ($this->SP/$this->MAXSP)*100;
		return $p;
	}
//////////////////////////////////////////////////
//	SPへのダメ�`ジ(���M)
	function SpDamage($damage,$show=true) {
		$Before	= $this->SP;
		$this->SP	-= $damage;
		if($this->SP < 1)
			$this->SP	= 0;
		if($show)
		$this->ShowValueChange($Before,$this->SP);
	}
//////////////////////////////////////////////////
//	HP指��
	function HpRecover($recover) {
		$Before	= $this->HP;
		$this->HP	+= $recover;
		if($this->MAXHP < $this->HP) {
			$this->HP	= $this->MAXHP;
		}
		$this->ShowValueChange($Before,$this->HP);
	}
//////////////////////////////////////////////////
//	SP指��
	function SpRecover($recover) {
		$Before	= $this->SP;
		$this->SP	+= $recover;
		if($this->MAXSP < $this->SP) {
			$this->SP	= $this->MAXSP;
		}
		$this->ShowValueChange($Before,$this->SP);
	}
//////////////////////////////////////////////////
//	パッシブスキルを�iみ�zむ
	function LoadPassiveSkills() {
		// PassiveSkill
		foreach($this->skill as $no) {
			if($no < 7000 || 8000 <= $no) continue;

			$skill	= LoadSkillData($no);
			//	嬬薦�ﾉ��N狼
			if($skill["P_MAXHP"])
				$this->P_MAXHP	+= $skill["P_MAXHP"];
			if($skill["P_MAXSP"])
				$this->P_MAXSP	+= $skill["P_MAXSP"];
			if($skill["P_STR"])
				$this->P_STR	+= $skill["P_STR"];
			if($skill["P_INT"])
				$this->P_INT	+= $skill["P_INT"];
			if($skill["P_DEX"])
				$this->P_DEX	+= $skill["P_DEX"];
			if($skill["P_SPD"])
				$this->P_SPD	+= $skill["P_SPD"];
			if($skill["P_LUK"])
				$this->P_LUK	+= $skill["P_LUK"];

			//	蒙歩室嬬など($this->SPECIAL)
			if($skill["HealBonus"])
				$this->SPECIAL["HealBonus"]	+= $skill["HealBonus"];//....
		}
	}
//////////////////////////////////////////////////
	function SetBattleVariable($team=false) {
		// 壅�iみ�zみを契峭できるか?
		if(isset($this->IMG))
			return false;

		$this->PatternExplode();
		$this->CutPatterns();

		// パッシブスキルを�iむ
		$this->LoadPassiveSkills();
		$this->CalcEquips();

		$this->team		= $team;
		$this->IMG		= $this->img;
		$maxhp	+= $this->maxhp * (1 + ($this->M_MAXHP/100)) + $this->P_MAXHP;
		$this->MAXHP	= round($maxhp);
		$hp		+= $this->hp * (1 + ($this->M_MAXHP/100)) + $this->P_MAXHP;
		$this->HP		= round($hp);
		$maxsp	+= $this->maxsp * (1 + ($this->M_MAXSP/100)) + $this->P_MAXSP;
		$this->MAXSP	= round($maxsp);
		$sp		+= $this->sp * (1 + ($this->M_MAXSP/100)) + $this->P_MAXSP;
		$this->SP		= round($sp);
		$this->STR		= $this->str + $this->P_STR;
		$this->INT		= $this->int + $this->P_INT;
		$this->DEX		= $this->dex + $this->P_DEX;
		$this->SPD		= $this->spd + $this->P_SPD;
		$this->LUK		= $this->luk + $this->P_LUK;
		$this->POSITION	= $this->position;
		$this->STATE	= 0;//伏贋彜�Bにする

		$this->expect	= false;//(方��=��蟹嶄 false=棋�C嶄)
		$this->ActCount	= 0;//佩�啝慂�
		$this->JdgCount	= array();//�Q協した登僅の指方
	}
//////////////////////////////////////////////////
//	キャラの好�珍Δ鳩績�薦,廾�簧堋椶鰉�麻する
	function CalcEquips() {
		if($this->monster) return false;//mobは�O協せんでいい
		$equip	= array("weapon","shield","armor","item");//廾�箙w侭
		$this->atk	= array(0,0);
		$this->def	= array(0,0,0,0);
		foreach($equip as $place) {
			if(!$this->{$place}) continue;
			// 冷匂タイプの����

			$item	= LoadItemData($this->{$place});
			if($place == "weapon")
					$this->WEAPON	= $item["type"];
			$this->atk[0]	+= $item[atk][0];//麗尖好�珍�
			$this->atk[1]	+= $item[atk][1];//徴隈；
			$this->def[0]	+= $item[def][0];//麗尖契囮(‖)
			$this->def[1]	+= $item[def][1];//；(��)
			$this->def[2]	+= $item[def][2];//徴隈契囮(‖)
			$this->def[3]	+= $item[def][3];//；(��)

			$this->P_MAXHP	+= $item["P_MAXHP"];
			$this->M_MAXHP	+= $item["M_MAXHP"];
			$this->P_MAXSP	+= $item["P_MAXSP"];
			$this->M_MAXSP	+= $item["M_MAXSP"];

			$this->P_STR	+= $item["P_STR"];
			$this->P_INT	+= $item["P_INT"];
			$this->P_DEX	+= $item["P_DEX"];
			$this->P_SPD	+= $item["P_SPD"];
			$this->P_LUK	+= $item["P_LUK"];

			if($item["P_SUMMON"])
				$this->GetSpecial("Summon",$item["P_SUMMON"]);
			// 契囮�o��の好�珍�
			if($item["P_PIERCE"])
				$this->GetSpecial("Pierce",$item["P_PIERCE"]);
		}
	}
//////////////////////////////////////////////////
	function ShowCharWithLand($land) {
		?>
	<div class="carpet_frame">
	<div class="land" style="background-image : url(<?php print IMG_OTHER."land_".$land.".gif"?>);">
	<?php $this->ShowImage()?>
	</div>
	<?php print $this->name?><br>Lv.<?php print $this->level?>
	</div><?php 
	}

//////////////////////////////////////////////////
//	キャラデ�`タの隠贋
	function SaveCharData($id=false) {
		// モンスタ�`は隠贋しない。
		//if($this->monster)	return false;

		if($id) {
			$dir	= USER.$id;
		} else {
			if(!$this->user) return false;
			$dir	= USER.$this->user;
		}
		// ユ�`ザ�`が贋壓しない��栽隠贋しない
		if(!file_exists($dir))
			return false;

		if(isset($this->file))
			$file	= $this->file;
		else
			$file	= $dir."/".$this->birth.".dat";

		if(file_exists($file) && $this->fp) {
			//sleep(10);//ファイルロック�_�J喘
			WriteFileFP($this->fp,$this->DataSavingFormat());
			$this->fpclose();
		} else {
			WriteFile($file,$this->DataSavingFormat());
		}

	}

//////////////////////////////////////////////////
	function DataSavingFormat() {
		$Save	= array("name","gender","job","birth","level","exp",
		"statuspoint","skillpoint",
		//"maxhp","hp","maxsp","sp",// (2007/9/30 隠贋しなくなった)
		"str","int","dex","spd","luk",
		"weapon","shield","armor","item",
		"position","guard",
		"skill",
		//"judge","action",
		"Pattern",
		"PatternMemo",
		//モンスタ�`��喘
		//"monster","land","family","monster_message"//隠贋する駅勣�oくなった
		);
		//$Save	= get_object_vars($this);
		foreach($Save as $val) {
			if (!isset($this->{$val})) continue;
			$text	.= "$val=".(is_array($this->{$val}) ? implode("<>",$this->{$val}) : $this->{$val})."\n";
		}
		return $text;
	}

//////////////////////////////////////////////////
	function ShowChar() {
		static $flag = 0;

		$flag++;
		if( CHAR_ROW%2==0 && $flag%(CHAR_ROW+1)==0 )//carpetの�Kびを住札にする
			$flag++;
		?>
<div class="carpet_frame">
<div class="carpet<?php print $flag%2?>"><?php $this->ShowImage();?></div>
<?php print $this->name?><br>Lv.<?php print $this->level?> <?php print $this->job_name?>
</div><?php 
	}

//////////////////////////////////////////////////
	function ShowCharLink() {//$array=弼？
		static $flag = 0;

		$flag++;
		if( CHAR_ROW%2==0 && $flag%(CHAR_ROW+1)==0 )//carpetの�Kびを住札にする
			$flag++;
		?>
<div class="carpet_frame">
<div class="carpet<?php print $flag%2?>">
<a href="?char=<?php print $this->Number?>"><?php $this->ShowImage();?></a></div>
<?php print $this->name?><?php if($this->statuspoint)print('<span class="bold charge">*</span>');?><br>Lv.<?php print $this->level?> <?php print $this->job_name?>
</div><?php 
	}

//////////////////////////////////////////////////
//	checkboxも燕幣する
	function ShowCharRadio($birth,$checked=null) {
		static $flag = 0;

		$flag++;
		if( CHAR_ROW%2==0 && $flag%(CHAR_ROW+1)==0 )//carpetの�Kびを住札にする
			$flag++;

// onclick="Element.toggleClassName(this,'unselect')"

		?>
<div class="carpet_frame">
<div class="carpet<?php print $flag%2?>">
<a href="?char=<?php print $this->birth?>"><?php $this->ShowImage();?></a>
</div>

<div onClick="toggleCheckBox('<?php print $flag?>')" id="text<?php print $flag?>" <?php print($checked?null:' class="unselect"');?>>
<?php print $this->name?>
<?php if($this->statuspoint)print('<span class="bold charge">*</span>');?><br />
Lv.<?php print $this->level?> <?php print $this->job_name?>

</div>
<input type="checkbox" onclick="Element.toggleClassName('text<?php print $flag?>','unselect')" id="box<?php print $flag?>" name="char_<?php print $birth?>" value="1"<?php print $checked?>>

</div><?php 
	}
//////////////////////////////////////////////////
//	�蜉L�rのチ�`ムを�O協(あんまり聞ってない)
	function SetTeam($no) {
		$this->team	= $no;
	}
//////////////////////////////////////////////////
//	IMGタグで鮫�颪魃輅召垢襪里�
	function GetImageURL($dir) {
		if(file_exists(IMG_CHAR.$this->img)) {
			if($this->STATE === DEAD) {
				$img = $dir.$this->img;
				if(!file_exists($img)) {
					return $dir.CHAR_NO_IMAGE;
				}
			}
			return $dir.$this->img;
		} else {
			return $dir.CHAR_NO_IMAGE;
		}
	}
//////////////////////////////////////////////////
//	IMGタグで鮫�颪魃輅召垢襪里�
	function ShowImage($class=false) {
		$url = $this->GetImageURL(IMG_CHAR);
		if($class)
			print('<img src="'.$url.'" class="'.$class.'">');
		else
			print('<img src="'.$url.'">');
	}
//////////////////////////////////////////////////
//	HPとSPを��麻して�O協する
	function SetHpSp()
	// $coe=array(HP,SP�S方);
	{
		$MaxStatus	= MAX_STATUS;//恷互ステ�`タス(じゃなくてもいいです)

		$jobdata		= LoadJobData($this->job);// 2指�iみ�zんでるから岷すべき
		$coe	= $jobdata["coe"];

		$div		= $MaxStatus * $MaxStatus;
		$RevStr		= $MaxStatus - $this->str;
		$RevInt		= $MaxStatus - $this->int;

		$this->maxhp	= 100 * $coe[0] * (1 + ($this->level - 1)/49) * (1 + ($div - $RevStr*$RevStr)/$div);
		$this->maxsp	= 100 * $coe[1] * (1 + ($this->level - 1)/49) * (1 + ($div - $RevInt*$RevInt)/$div);

		$this->maxhp	= round($this->maxhp);
		$this->maxsp	= round($this->maxsp);
	}
//////////////////////////////////////////////////
//	handle��麻
	function GetHandle() {
		$handle	= 5 + floor($this->level / 10) + floor($this->dex / 5);
		return $handle;
	}
//////////////////////////////////////////////////
//	ポイントを���Mして室を��える。
	function LearnNewSkill($no) {
		include_once(DATA_SKILL_TREE);
		$tree	= LoadSkillTree($this);

		//��誼辛嬬室に��えようとしてるヤツなけりゃ�K阻
		if(!in_array($_POST["newskill"],$tree))
			return array(false,"短嗤室嬬峯");
		$skill	= LoadSKillData($no);
		//もし��誼�gみなら?
		if(in_array($no,$this->skill))
			return array(false,"{$skill[name]} 厮将楼誼.");
		if($this->UseSkillPoint($skill["learn"])) {
			$this->GetNewSkill($skill["no"]);
			//$this->SaveCharData();
			return array(true,$this->Name()."  {$skill[name]} 厮将楼誼。");
		} else
			return array(false,"室嬬泣方音怎");
	}
//////////////////////////////////////////////////
//	仟ワザを弖紗する。
	function GetNewSkill($no) {
		$this->skill[]	= $no;
		asort($this->skill);
	}
//////////////////////////////////////////////////
//	スキルポイントを���Mする
	function UseSKillPoint($no) {
		if($no <= $this->skillpoint) {
			$this->skillpoint	-= $no;
			return true;
		}
		return false;
	}
//////////////////////////////////////////////////
//	�U�Y�､魍�す(モンスタ�`だけ?)
	function DropExp() {
		if(isset($this->exphold)) {
			$exp	= $this->exphold;
			$this->exphold	= round($exp/2);
			return $exp;
		} else {
			return false;
		}
	}
//////////////////////////////////////////////////
//	お署を竃す(モンスタ�`だけ?)
	function DropMoney() {
		if(isset($this->moneyhold)) {
			$money	= $this->moneyhold;
			$this->moneyhold	= 0;
			return $money;
		} else {
			return false;
		}
	}
//////////////////////////////////////////////////
//	アイテムを鯛とす(モンスタ�`だけ?)
	function DropItem() {
		if($this->itemdrop) {
			$item	= $this->itemdrop;
			// 匯業鯛としたアイテムは��す
			$this->itemdrop	= false;
			return $item;
		} else {
			return false;
		}
	}
//////////////////////////////////////////////////
//	
	function SetJobData() {
		if($this->job) {
			$jobdata		= LoadJobData($this->job);
			$this->job_name	= ($this->gender ? $jobdata["name_female"] : $jobdata["name_male"]);
			$this->img		= ($this->gender ? $jobdata["img_female"] : $jobdata["img_male"]);
		}
	}
//////////////////////////////////////////////////
//	パタ�`ン猟忖双を塘双にする。
//	****<>****<>****|****<>****<>****|****<>****<>****
	function PatternExplode() {
		//dump($this->judge);
		if($this->judge)
			return false;
		$Pattern	= explode("|",$this->Pattern);
		$this->judge	= explode("<>",$Pattern["0"]);
		$this->quantity	= explode("<>",$Pattern["1"]);
		$this->action	= explode("<>",$Pattern["2"]);
	}
//////////////////////////////////////////////////
//	パタ�`ン塘双を隠贋する。
	function PatternSave($judge,$quantity,$action) {
		$this->Pattern	= implode("<>",$judge)."|".implode("<>",$quantity)."|".implode("<>",$action);
		return true;
	}
//////////////////////////////////////////////////
//	キャラクタ�`を��す
	function DeleteChar() {
		if(!file_exists($this->file))
			return false;
		if($this->fp) {
			fclose($this->fp);
			unset($this->fp);
		}
		unlink($this->file);
	}
//////////////////////////////////////////////////
//	キャラの�篳�をセットする。
	function SetCharData(&$data) {
		$this->name	= $data["name"];
		$this->gender	= $data["gender"];
		$this->birth	= $data["birth"];
		$this->level	= $data["level"];
		$this->exp		= $data["exp"];
		$this->statuspoint	= $data["statuspoint"];
		$this->skillpoint	= $data["skillpoint"];

		$this->job		= $data["job"];
		$this->SetJobData();

		if ($data["img"])
			$this->img		= $data["img"];

		$this->str		= $data["str"];
		$this->int		= $data["int"];
		$this->dex		= $data["dex"];
		$this->spd		= $data["spd"];
		$this->luk		= $data["luk"];

		if (isset($data["maxhp"]) &&
			isset($data["hp"]) &&
			isset($data["maxsp"]) &&
			isset($data["sp"]) ) {
			$this->maxhp	= $data["maxhp"];
			$this->hp		= $data["hp"];
			$this->maxsp	= $data["maxsp"];
			$this->sp		= $data["sp"];
		} else {
			// HPSPを�O協。HPSPを指甒�そういうゲ�`ムだから´
			$this->SetHpSp();
			$this->hp		= $this->maxhp;
			$this->sp		= $this->maxsp;
		}

		$this->weapon	= $data["weapon"];
		$this->shield	= $data["shield"];
		$this->armor	= $data["armor"];
		$this->item		= $data["item"];

		$this->position	= $data["position"];
		$this->guard	= $data["guard"];

		$this->skill	= (is_array($data["skill"]) ? $data["skill"] : explode("<>",$data["skill"]) );

		$this->Pattern	= $data["Pattern"];

		if($data["PatternMemo"])
			$this->PatternMemo	= $data["PatternMemo"];

		// モンスタ�`のため��
		if(is_array($data["judge"]))
			$this->judge	= $data["judge"];
		//else
		//	$this->judge	= explode("<>",$data["judge"]);
		if(is_array($data["quantity"]))
			$this->quantity	= $data["quantity"];
		//else
		//	$this->quantity	= explode("<>",$data["quantity"]);
		if(is_array($data["action"]))
			$this->action	= $data["action"];
		//else
		//	$this->action	= explode("<>",$data["action"]);

		//モンスタ�`��喘
		if($this->monster	= $data["monster"]) {
			$this->exphold		= $data["exphold"];
			$this->moneyhold	= $data["moneyhold"];
			$this->itemdrop		= $data["itemdrop"];
			$this->atk	= $data["atk"];
			$this->def	= $data["def"];
			$this->SPECIAL	= $data["SPECIAL"];
		}
		if($data["summon"])
			$this->summon		= $data["summon"];
	}
}
?>
