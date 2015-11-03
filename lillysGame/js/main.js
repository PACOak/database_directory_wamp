//document.getElementById("body").onclick = function(){
  //alert("blah");
  //document.getElementsByClassName("p").style.background = "green";
//};



function colorChange() {
	var char1 = fixLetters(Math.floor(Math.random() * 16));
	var char2 = fixLetters(Math.floor(Math.random() * 16));
	var char3 = fixLetters(Math.floor(Math.random() * 16));
	var char4 = fixLetters(Math.floor(Math.random() * 16));
	var char5 = fixLetters(Math.floor(Math.random() * 16));
	var char6 = fixLetters(Math.floor(Math.random() * 16));

	function fixLetters(charX) {
		switch(charX) {
			case 10: {
				charX = "A";
			}
			case 11: {
				charX = "B";
			}
			case 12: {
				charX = "C";
			}
			case 13: {
				charX = "D";
			}
			case 14: {
				charX = "E";
			}
			case 15: {
				charX = "F";
			}
		}
		return charX;
	};

	var colorString = ("#"+char1+char2+char3+char4+char5+char6);
	return colorString;
};
