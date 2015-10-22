<!DOCTYPE html>
<html>

<head>
	<title>Test</title>
</head>

<body>
	<h1>Online Test</h1>
	<p>Question 1: What is guidos last name?</p>
	<p><input type="text" id="q1answer" /></p>
	
	<button onclick="gradeTest();" id="btnGradeTest">Grade My Test</button>
	
	<script>
		var gradeTest = function()
		{
			alert(document.getElementById("q1answer").value.toLowerCase());
		}
		
	</script>
</body>

</html>