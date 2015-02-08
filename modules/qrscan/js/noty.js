 function msg_success(msg) {
        var n = noty({
            text        : msg,
            type        : 'success',
            dismissQueue: false,
            layout      : 'top',
            theme       : 'defaultTheme'
        });
        return n;
    }
	    function msg_error(msg) {
        var n = noty({
            text        : msg,
            type        : 'error',
            dismissQueue: false,
            layout      : 'top',
            theme       : 'defaultTheme'
        });
        return n;
    }
	    function msg_warning(msg) {
        var n = noty({
            text        : msg,
            type        : 'warning',
            dismissQueue: false,
            layout      : 'top',
            theme       : 'defaultTheme'
        });
        return n;
    }
	function beeplay(){
		soundManager.play('Beep','beep.ogg');
}	function beepbeeplay(){
		soundManager.play('BeepBeep','beepbeep.ogg');
}
function affMsg(e, m){
	navigator.vibrate = navigator.vibrate || navigator.webkitVibrate || navigator.mozVibrate || navigator.msVibrate;
	if(e=='success'){
		var notif = msg_success('<b>Billet enregistr&eacute; avec succ&egrave;s !</b><br />'+m);
		beeplay();
if (navigator.vibrate) {
    navigator.vibrate(500);
}
		setTimeout(function () {
            $.noty.close(notif.options.id);
        }, 10000);
	}else if(e=='warning'){
		var notif = msg_warning('<b>Billet d&eacute;j&agrave; enregistr&eacute; !</b><br />'+m);
		beeplay();
		if (navigator.vibrate) {
			navigator.vibrate([300, 300, 300, 300, 300]);
}
		setTimeout(function () {
            $.noty.close(notif.options.id);
        }, 10000);
	}else{
		var notif = msg_error('<b>Billet erronn&eacute; !</b>');
		beepbeeplay();
		if (navigator.vibrate) {
	navigator.vibrate(2000);
}
		setTimeout(function () {
            $.noty.close(notif.options.id);
        }, 10000);
	}
}