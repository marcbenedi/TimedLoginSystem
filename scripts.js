var d;
var n;
var timer = [];
var it = 0;
var base = 0;
var min = [];
var max = [];
function log_in(){
	document.getElementById('timer_').value = timer;
	//This way we can read it from php
}
function keyPress(){
	d = new Date();
	n = d.getTime();
	if(it == 0) base = n;
	document.getElementById(it).innerHTML = n-base;
	timer.push(n-base);
	base = n;
	it = it +1;
}
function niceSpeed(){
	var i;
	for (i = 0; i < timer.length; i++){
		if(max[i]< timer[i] || timer[i]<min[i]) return i;
	}
return 'Si';
}
