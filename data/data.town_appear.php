<?php
// 町でいける店とかの出現条件とか...
// 日付別でいける場所を変えれるとか、
// あるアイテムがないと行けないとかできる
// 別ファイルにする必要があったのかどうか微妙
function TownAppear($user) {
	$place	= array();

	// 無条件で行ける
	$place["Shop"]	= true;
	$place["Recruit"]	= true;
	$place["Smithy"]	= true;
	$place["Auction"]	= true;
	$place["Colosseum"]	= true;

	// 特定のアイテムがないと行けない施設
	//if($user->item[****])
	//	$place["****"]	= true;

	return $place;
}
?>