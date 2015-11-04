$(document).ready(function() {
  $("html").click(function() {
    $(".p").css("background-color", colorChange());
  });

	//$("#test").playKeyframe({
  //  name: 'myfirst',
  //  duration: 2000
	//});

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

	$("#shape1").click(function() {
		var shape = shapeChange();
		var color = shapeColorChange();
		$(this).attr("src", shape + color);
	});

	$("#shape2").click(function() {
		var shape = shapeChange();
		var color = shapeColorChange();
		$(this).attr("src", shape + color);
	});

	$("#shape3").click(function() {
		var shape = shapeChange();
		var color = shapeColorChange();
		$(this).attr("src", shape + color);
	});

	$("#shape4").click(function() {
		var shape = shapeChange();
		var color = shapeColorChange();
		$(this).attr("src", shape + color);
	});

	$("#shape5").click(function() {
		var shape = shapeChange();
		var color = shapeColorChange();
		$(this).attr("src", shape + color);
	});
});

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
