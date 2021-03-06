<?php

class Ranking {

	var $fp;

	var $Ranking	= array();
	var $UserName;
	var $UserRecord;

//////////////////////////////////////////////
// ファイルから�iみ�zんでランキングを塘双にする
/*

	$this->Ranking[0][0]= *********;// 遍了

	$this->Ranking[1][0]= *********;// 揖匯 2了
	$this->Ranking[1][1]= *********;

	$this->Ranking[2][0]= *********;// 揖匯 3了
	$this->Ranking[2][1]= *********;
	$this->Ranking[2][2]= *********;

	$this->Ranking[3][0]= *********;// 揖匯 4了
	$this->Ranking[3][1]= *********;
	$this->Ranking[3][2]= *********;
	$this->Ranking[3][3]= *********;

	...........

*/
	function Ranking() {
		$file	= RANKING;
		if(!file_exists($file)) return 0;
		$this->fp=FileLock($file);
		$Place	= 0;
		while($line = fgets($this->fp) ) {
			$line	= trim($line);
			if($line == "") continue;
			if(count($this->Ranking[$Place]) === $this->SamePlaceAmount($Place))
				$Place++;
			$this->Ranking[$Place][]	= $line;
		}
		if(!$this->Ranking) return 0;
		foreach($this->Ranking as $Rank => $SamePlaces) {
			if(!is_array($SamePlaces))
				continue;
			foreach($SamePlaces as $key => $val) {
				$list	= explode("<>", $val);
				$this->Ranking["$Rank"]["$key"]	= array();
				$this->Ranking["$Rank"]["$key"]["id"]	= $list["0"];
			}
		}
	}
//////////////////////////////////////////////
// ランキング�蕕垢襦��蕕Α�
	function Challenge(&$user) {
		// ランキングが�oいとき(1了になる)
		if(!$this->Ranking) {
			$this->JoinRanking($user->id);
			$this->SaveRanking();
			print("Rank starts.");
			//return array($message,true);
			return false;
		}
		//徭蛍の��了
		$MyRank	= $this->SearchID($user->id);

		// 1了の��栽。
		if($MyRank["0"] === 0) {
			SHowError("及匯兆音辛壅薬媾.");
			//return array($message,true);
			return false;
		}

		// 徭蛍がランク翌なら ////////////////////////////////////
		if(!$MyRank)
		{
			$this->JoinRanking($user->id);//徭蛍を恷和了にする。
			$MyPlace	= count($this->Ranking) - 1;//徭蛍のランク(恷和了)
			$RivalPlace	= (int)($MyPlace - 1);

			// �猜屬�遍了なのかどうか
			if($RivalPlace === 0)
				$DefendMatch	= true;
			else
				$DefendMatch	= false;

			//$MyID	= $id;

			//徭蛍より1��貧の繁が�猜屐�
			$RivalRankKey	= array_rand($this->Ranking[$RivalPlace]);
			$RivalID	= $this->Ranking[$RivalPlace][$RivalRankKey]["id"];//���蕕垢誅猜屬�ID
			$Rival	= new user($RivalID);

			/*
			dump($this->Ranking);
			dump($RivalID);
			dump($MyID);
			dump($MyRank);//エラ�`でたら�B��れ
			return 0;
			*/

			$Result	= $this->RankBattle($user,$Rival,$MyPlace,$RivalPlace);
			$Return	= $this->ProcessByResult($Result,&$user,&$Rival,$DefendMatch);
			
			return $Return;
			// �拈�なら��了住旗
			//if($message == "Battle" && $result === 0) {
			//	$this->ChangePlace($user,$Rival);
			//}

			//$this->SaveRanking();
			//return array($message,$result);
		}

		// 2了-恷和了の繁の�I尖。////////////////////////////////
		if($MyRank) {
			$RivalPlace	= (int)($MyRank["0"] - 1);//徭蛍より��了が1��貧の繁。

			// �猜屬�遍了なのかどうか
			if($RivalPlace === 0)
				$DefendMatch	= true;
			else
				$DefendMatch	= false;

			//徭蛍より1��貧の繁が�猜�
			$RivalRankKey	= array_rand($this->Ranking[$RivalPlace]);
			$RivalID	= $this->Ranking[$RivalPlace][$RivalRankKey]["id"];
			$Rival	= new user($RivalID);
			//$MyID		= $this->Ranking[$MyRank["0"]][$MyRank["1"]]["id"];
			//$MyID		= $id;
			//list($message,$result)	= $this->RankBattle($MyID,$RivalID);
			$Result	= $this->RankBattle($user,$Rival,$MyRank["0"],$RivalPlace);
			$Return	= $this->ProcessByResult($Result,&$user,&$Rival,$DefendMatch);
			
			return $Return;
			//if($message != "Battle")
			//	return array($message,$result);

			// �蜉Lを佩って�拈�なら��了住旗
			/*
			if($message == "Battle" && $result === 0) {
				$this->ChangePlace($MyID,$RivalID);
				//dump($this->Ranking);
				$this->SaveRanking();
			}
			return array($message,$result);
			*/
		}
	}

//////////////////////////////////////////////
// �蕕錣擦�
	function RankBattle(&$user,&$Rival,$UserPlace,$RivalPlace) {

		$UserPlace	= "[".($UserPlace+1)."了]";
		$RivalPlace	= "[".($RivalPlace+1)."了]";

		/*
			＊ �猜屬離罘`ザ徭悶が屡に贋壓しない��栽の�I尖
			アカウントが��茅�I尖された�rにランキングからも��えるようにしたから
			云栖竃ないエラ�`かもしれない。
		*/
		if($Rival->is_exist() == false) {
			ShowError("斤返音贋壓(音媾遇覆)");
			$this->DeleteRank($DefendID);
			$this->SaveRanking();
			//return array(true);
			return "DEFENDER_NO_ID";
		}

		// お札いのランキンぐ喘のパ�`ティ�`を�iみ�zむ
		$Party_Challenger	= $user->RankParty();
		$Party_Defender		= $Rival->RankParty();


		// ランク喘パ�`ティ�`がありません�。。�
		if($Party_Challenger === false) {
			ShowError("�蕕Ε瓮鵐乂`がいません�┌殖�。");
			return "CHALLENGER_NO_PARTY";
		}

		// ランク喘パ�`ティ�`がありません�。。�
		if($Party_Defender === false) {
			//$defender->RankRecord(0,"DEFEND",$DefendMatch);
			//$defender->SaveData();
			ShowError($Rival->name." 斤媾議繁麗珊隆畳協<br />(音媾遇覆)");
			return "DEFENDER_NO_PARTY";//音媾遇覆とする
		}

		//dump($Party_Challenger);
		//dump($Party_Defender);
		include(CLASS_BATTLE);
		$battle	= new battle($Party_Challenger,$Party_Defender);
		$battle->SetBackGround("colosseum");
		$battle->SetResultType(1);// �Q彭つかない��栽は伏贋宀の方で�Qめるようにする
		$battle->SetTeamName($user->name.$UserPlace,$Rival->name.$RivalPlace);
		$battle->Process();//�蜉L�_兵
		$battle->RecordLog("RANK");
		$Result	= $battle->ReturnBattleResult();// �蜉L�Y惚

		// �蜉Lを鞭けて羨った�箸粒豹�はここで�笋┐襦�
		//$defender->RankRecord($Result,"DEFEND",$DefendMatch);
		//$defender->SaveData();

		//return array("Battle",$Result);
		if($Result === TEAM_0) {
			return "CHALLENGER_WIN";
		} else if ($Result === TEAM_1) {
			return "DEFENDER_WIN";
		} else if ($Result === DRAW) {
			return "DRAW_GAME";
		} else {
			return "DRAW_GAME";//(エラ�`)嚠協では竃ないエラ�`(指閲喘)
		}
	}
//////////////////////////////////////////////////
//	�Y惚によって�I尖を�笋┐�
	function ProcessByResult($Result,&$user,&$Rival,$DefendMatch) {
		switch($Result) {

			// 鞭けた�箸�IDが贋壓しない
			case "DEFENDER_NO_ID":
				$this->ChangePlace($user->id,$Rival->id);
				$this->DeleteRank($Rival->id);
				$this->SaveRanking();
				return false;
				break;

			// 薬����PT�oし
			case "CHALLENGER_NO_PARTY":
				return false;
				break;

			// 鞭けた��PT�oし
			case "DEFENDER_NO_PARTY":
				$this->ChangePlace($user->id,$Rival->id);
				$this->SaveRanking();
				//$user->RankRecord(0,"CHALLENGER",$DefendMatch);
				$user->SetRankBattleTime(time() + RANK_BATTLE_NEXT_WIN);
				$Rival->RankRecord(0,"DEFEND",$DefendMatch);
				$Rival->SaveData();
				return true;
				break;

			// 薬�蚯��戮�
			case "CHALLENGER_WIN":
				$this->ChangePlace($user->id,$Rival->id);
				$this->SaveRanking();
				$user->RankRecord(0,"CHALLENGER",$DefendMatch);
				$user->SetRankBattleTime(time() + RANK_BATTLE_NEXT_WIN);
				$Rival->RankRecord(0,"DEFEND",$DefendMatch);
				$Rival->SaveData();
				return "BATTLE";
				break;

			// 鞭けた���戮�
			case "DEFENDER_WIN":
				//$this->SaveRanking();
				$user->RankRecord(1,"CHALLENGER",$DefendMatch);
				$user->SetRankBattleTime(time() + RANK_BATTLE_NEXT_LOSE);
				$Rival->RankRecord(1,"DEFEND",$DefendMatch);
				$Rival->SaveData();
				return "BATTLE";
				break;

			// 哈蛍け
			case "DRAW_GAME":
				//$this->SaveRanking();
				$user->RankRecord("d","CHALLENGER",$DefendMatch);
				$user->SetRankBattleTime(time() + RANK_BATTLE_NEXT_LOSE);
				$Rival->RankRecord("d","DEFEND",$DefendMatch);
				$Rival->SaveData();
				return "BATTLE";
				break;
			default:
				return true;
				break;
		}
	}
//////////////////////////////////////////////////
//	哈方の��了 と 揖じ��了の繁方
	function SamePlaceAmount($Place) {
		switch(true) {
			case ($Place == 0): return 1;//1了
			case ($Place == 1): return 2;//2了
			case ($Place == 2): return 3;//3了
			case (2 < $Place):
				return 3;
		}
	}
//////////////////////////////////////////////
// ランキングの恷和了に歌紗させる
	function JoinRanking($id) {
		$last	= count($this->Ranking) - 1;
		// ランキングが贋壓しない��栽
		if(!$this->Ranking) {
			$this->Ranking["0"]["0"]["id"]	= $id;
		// 恷和了の��了が協�Tオ�`バ�`になる��栽
		} else if(count($this->Ranking[$last]) == $this->SamePlaceAmount($last)) {
			$this->Ranking[$last+1]["0"]["id"]	= $id;
		// ならない��栽
		} else {
			$this->Ranking[$last][]["id"]	= $id;
		}
	}
//////////////////////////////////////////////////
// ランキングから��す
	function DeleteRank($id) {
		$place	= $this->SearchID($id);
		if($place === false) return false;//��茅払��
		unset($this->Ranking[$place[0]][$place[1]]);
		return true;//��茅撹孔
	}
//////////////////////////////////////////////////
// ランキングを隠贋する
	function SaveRanking() {
		foreach($this->Ranking as $rank => $val) {
			foreach($val as $key => $val2) {
				$ranking	.= $val2["id"]."\n";
			}
		}

		WriteFileFP($this->fp,$ranking);
		$this->fpclose();
	}
//////////////////////////////////////////////////
//	
	function fpclose() {
		if($this->fp) {
			fclose($this->fp);
			unset($this->fp);
		}
	}
//////////////////////////////////////////////////
//	��了を秘れ紋える
	function ChangePlace($id_0,$id_1) {
		$Place_0	= $this->SearchID($id_0);
		$Place_1	= $this->SearchID($id_1);
		$temp	= $this->Ranking[$Place_0["0"]][$Place_0["1"]];
		$this->Ranking[$Place_0["0"]][$Place_0["1"]]	= $this->Ranking[$Place_1["0"]][$Place_1["1"]];
		$this->Ranking[$Place_1["0"]][$Place_1["1"]]	= $temp;
	}
//////////////////////////////////////////////////
// $id のランク了崔を冥す
	function SearchID($id) {
		foreach($this->Ranking as $rank => $val) {
			foreach($val as $key => $val2) {
				if($val2["id"] == $id)
					return array((int)$rank,(int)$key);// ��了�oいの採桑朕か。
			}
		}
		return false;
	}
//////////////////////////////////////////////////
// ランキングの燕幣
	function ShowRanking($from=false,$to=false,$bold_id=false) {
		// ���譴��oい��栽は畠ランキングを燕幣
		if($from === false or $to === false) {
			$from	= 0;//遍了
			$to		= count($this->Ranking);//恷和了
		}

		// 湊忖にするランク
		if($bold_id)
			$BoldRank	= $this->SearchID($bold_id);

		$LastPlace	= count($this->Ranking) - 1;// 恷和了

		print("<table cellspacing=\"0\">\n");
		print("<tr><td class=\"td6\" style=\"text-align:center\">電了</td><td  class=\"td6\" style=\"text-align:center\">錦礼</td></tr>\n");
		for($Place=$from; $Place<$to + 1; $Place++) {
			if(!$this->Ranking["$Place"])
				break;
			print("<tr><td class=\"td7\" valign=\"middle\" style=\"text-align:center\">\n");
			// ��了アイコン
			switch($Place) {
				case 0:
					print('<img src="'.IMG_ICON.'crown01.png" class="vcent" />'); break;
				case 1:
					print('<img src="'.IMG_ICON.'crown02.png" class="vcent" />'); break;
				case 2:
					print('<img src="'.IMG_ICON.'crown03.png" class="vcent" />'); break;
				default:
					if($Place == $LastPlace)
						print("久");
					else
						print(($Place+1)."了");
			}
			print("</td><td class=\"td8\">\n");
			foreach($this->Ranking["$Place"] as $SubRank => $data) {
				list($Name,$R)	= $this->LoadUserName($data["id"],true);//撹��も�iみ�zむ
				$WinProb	= $R[all]?sprintf("%0.0f",($R[win]/$R[all])*100):"--";
				$Record	= "(".($R[all]?$R[all]:"0")."媾 ".
						($R[win]?$R[win]:"0")."覆".
						($R[lose]?$R[lose]:"0")."移 ".
						($R[all]-$R[win]-$R[lose])."哈 ".
						($R[defend]?$R[defend]:"0")."契 ".
						"覆楕".$WinProb.'%'.
						")";
				if(isset($BoldRank) && $BoldRank["0"] == $Place && $BoldRank["1"] == $SubRank) {
					print('<span class="bold u">'.$Name."</span> {$Record}");
				} else {
					print($Name." ".$Record);
				}
				print("<br />\n");
			}
			print("</td></tr>\n");
		}
		print("</table>\n");
	}
//////////////////////////////////////////////
//	＼ランク ����ID
	function ShowRankingRange($id,$Amount) {
		$RankAmount	= count($this->Ranking);
		$Last	= $RankAmount - 1;
		do {
			// ランキングがAmount參貧ないとき
			if($RankAmount <= $Amount) {
				$start	= 0;
				$end	= $Last;
				break;
			}

			$Rank	= $this->SearchID($id);
			if($Rank === false) {
				print("電兆隆岑");
				return 0;
			}
			$Range	= floor($Amount/2);
			// 遍了に除いか遍了
			if( ($Rank[0] - $Range) <= 0 ) {
				$start	= 0;
				$end	= $Amount - 1;
			// 恷和了にちかいか恷和了
			} else if( $Last < ($Rank[0] + $Range) ) {
				$start	= $RankAmount - $Amount;
				$end	= $RankAmount;
			// ���貭擇砲�さまる
			} else {
				$start	= $Rank[0]-$Range;
				$end	= $Rank[0]+$Range;
			}
		} while(0);

		$this->ShowRanking($start,$end,$id);
	}
//////////////////////////////////////////////
//	ユ�`ザの兆念を柵び竃す
	function LoadUserName($id,$rank=false) {

		if(!$this->UserName["$id"]) {
			$User	= new user($id);
			$Name	= $User->Name();
			$Record	= $User->RankRecordLoad();
			if($Name !== false) {
				$this->UserName["$id"]	= $Name;
				$this->UserRecord["$id"]	= $Record;
			} else {
				$this->UserName["$id"]	= "-";

				$this->DeleteRank($id);

				foreach($this->Ranking as $rank => $val) {
					foreach($val as $key => $val2) {
						$ranking	.= $val2["id"]."\n";
					}
				}
		
				WriteFileFP($this->fp,$ranking);
			}
		}

		if($rank)
			return array($this->UserName["$id"],$this->UserRecord["$id"]);
		else
			return $this->UserName["$id"];
	}
//////////////////////////////////////////////////
//	
	function dump() {
		print("<pre>".print_r($this,1)."</pre>\n");
	}
// end of class
}
?>
