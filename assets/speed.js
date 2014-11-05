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
		request.open('GET', '/wp-content/plugins/mhm-wp-speedtest/speed.php?bps='+speedBps+'&_'+ Math.random(), true);
		request.send();
	}catch(e){}
}

//////////////////////////////////////////////////

download.onload = function () {
    endTime = (new Date()).getTime();
    showResults();
};
