<?php
// 隨でいける糾とかの竃�F訳周とか...
// 晩原�eでいける��侭を�笋┐譴襪箸�、
// あるアイテムがないと佩けないとかできる
// �eファイルにする駅勣があったのかどうか裏虫
function TownAppear($user) {
	$place	= array();

	// �o訳周で佩ける
	$place["Shop"]	= true;
	$place["Recruit"]	= true;
	$place["Smithy"]	= true;
	$place["Auction"]	= true;
	$place["Colosseum"]	= true;

	// 蒙協のアイテムがないと佩けない仏�O
	//if($user->item[****])
	//	$place["****"]	= true;

	return $place;
}
?>