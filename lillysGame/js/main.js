$(document).ready(function() {
  $("html").click(function() {
    $(".p").css("background-color", colorChange());
  });

	$("#pinWheel").click(function() {
		if ($(this).css("animation-name") == "rotate") {
			$(this).css("animation-name", "rotate-reverse");
		}
		else {
			$(this).css("animation-name", "rotate");
		}
	});

	$("#target1").click(function() {
		var target1 = $(this).attr("src");
		if (target1 === "img/randomShapes/target1.png") {
			$(this).attr("src", "img/randomShapes/target2.png");
		}
		else if (target1 === "img/randomShapes/target2.png") {
			$(this).attr("src", "img/randomShapes/target1.png");
		}
	});

	$(".shapes").click(function() {
		var shape = shapeChange();
		var color = shapeColorChange();
		$(this).attr("src", shape + color);
	});
	$(".numbers").click(function() {
		var number = numberChange();
		$(this).attr("src", number);
	});
});

function numberChange() {
	var num = pickNum(Math.floor(Math.random() * 5));
	function pickNum(numVar) {
		var numNum;
		switch(numVar) {
			case 0: {
				numNum = "img/numbers/comicSans/1.png";
				break;
			}
			case 1: {
				numNum = "img/numbers/comicSans/2.png";
				break;
			}
			case 2: {
				numNum = "img/numbers/comicSans/3.png";
				break;
			}
			case 3: {
				numNum = "img/numbers/comicSans/4.png";
				break;
			}
			case 4:{
				numNum = "img/numbers/comicSans/5.png";
				break;
			}
			default: {
				alert("Error number switch");
				break;
			}
		}
		return numNum;
	}
	return num;
}

function shapeChange() {
	var shape = pickShape(Math.floor(Math.random() * 5));
	function pickShape(shapeVar) {
		var shapeName;
		switch(shapeVar) {
			case 0: {
				shapeName = "Circle";
				break;
			}
			case 1: {
				shapeName = "Triangle";
				break;
			}
			case 2: {
				shapeName = "Square";
				break;
			}
			case 3: {
				shapeName = "Pentagon";
				break;
			}
			case 4: {
				shapeName = "Hexagon";
				break;
			}
			default: {
				alert("Error Shape");
				break;
			}
		}
		return shapeName;
	};
	var shapeString = "img/shapes/" + shape + "/";
	return shapeString;
};

function shapeColorChange() {

	var color = pickColor(Math.floor(Math.random() * 7));

	function pickColor(color) {
		var colorName;
		switch(color) {
			case 0: {
				colorName = "red";
				break;
			}
			case 1: {
				colorName = "orange";
				break;
			}
			case 2: {
				colorName = "yellow";
				break;
			}
			case 3: {
				colorName = "green";
				break;
			}
			case 4: {
				colorName = "turquoise";
				break;
			}
			case 5: {
				colorName = "indigo";
				break;
			}
			case 6: {
				colorName = "purple";
				break;
			}
			default: {
				alert("Error Color");
				break;
			}
		}
		return colorName;
	};
	var colorString = color + ".png";
	return colorString;
};

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
