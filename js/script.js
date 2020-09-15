function countUpGold() {
	var currentVal = document.getElementById("goldValue").innerHTML;
	var maxVal = jQuery(this).attr("name");
	var elements = document.getElementsByName ("goldValueUp");
	    newVal = currentVal;
		alert(this.value);
		newVal++;
	if (currentVal < maxVal) {
		newVal++;
	}
	document.getElementById("goldValue").innerHTML = newVal;
}
function countDownGold() {
	var currentVal = document.getElementById("goldValue").innerHTML;
		addVal = 1;
		var newVal = 0;
	if (currentVal > 0) {
		newVal = currentVal - addVal;
	}
	document.getElementById("goldValue").innerHTML = newVal;
}
function countUpSilver() {
	var currentVal = document.getElementById("silverValue").innerHTML;
	    newVal = currentVal;
		newVal++;
	document.getElementById("silverValue").innerHTML = newVal;
}
function countDownSilver() {
	var currentVal = document.getElementById("silverValue").innerHTML;
		addVal = 1;
		var newVal = 0;
	if (currentVal > 0) {
		newVal = currentVal - addVal;
	}
	document.getElementById("silverValue").innerHTML = newVal;
}