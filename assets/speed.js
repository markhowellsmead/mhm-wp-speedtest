var startTime = (new Date()).getTime(), 
	endTime,
	imageAddr = '/wp-content/plugins/mhm-wp-speedtest/assets/speed.png?n=' + Math.random(),
	downloadSize = 1441,
	download = new Image();

download.src = imageAddr;

function showResults() {
    var duration = (endTime - startTime) / 1000;
    var bitsLoaded = downloadSize * 8;
    var speedBps = Math.round(bitsLoaded / duration);
    try{
		var request = new XMLHttpRequest();
		request.open('POST', ajax_object.ajax_url, true);
		request.setRequestHeader('Content-type','application/x-www-form-urlencoded');
		request.send('action=log_speed&bps='+speedBps);
	}catch(e){}
}

//////////////////////////////////////////////////

download.onload = function () {
    endTime = (new Date()).getTime();
    showResults();
};
