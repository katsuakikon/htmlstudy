"use strict";

$(function() {
	var qtotal = nowCookie('CakeCookie[q_count]');
	$("#q_count").append(qindex + '問目 / 全' + qtotal + '問');
	if (Number(qindex) >= Number(qtotal)) {
		$("#next_button").append('<a class="result" href="/htmlstudy/Question/result">結果を見る</a>');
	} else {
		$("#next_button").append('<a class="next" href="/htmlstudy/Question/input/' + qindex + '">次の問題へ</a>');
	}
});



