<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>NoteMaker</title>
</head>
<script type="text/javascript" src="Materialize/jquery.min.js"></script>
<script type="text/javascript" src="Materialize/js/materialize.min.js"></script>
<link rel="stylesheet" type="text/css" href="Materialize/css/materialize.min.css">
<script type="text/javascript">
	$(document).ready(function() {
		$.get("/Notes/index_html", function(notes) {
					$("#notes").html(notes);
				}, "html");
		$("#add").submit(function() {
			var new_str = "";
			$.post($(this).attr("action"), $(this).serialize(), function(data) {
				$("#notes").html(data);
			}, "html");
			return false;
		});
		$(document).on("submit", ".update", function() {
			console.log("Form submitted");
			$.post($(this).attr("action"), $(this).serialize(), function(dater) {
				$("#notes").html(dater)
				console.log("finished");
			}, "html");
			return false;
		});
	})
</script>
<style type="text/css">
	#container {
		width: 500px;
		margin: 0 auto;
	}
	.butt {
		display: block;
		margin: 10px;
		margin: 0 auto;
	}
	textarea {
		height: 150px;
	}
	form {
		margin-bottom: 10px;
		padding: 10px;
	}
	form p {
		text-align: center;
	}
	#update {
		border-bottom: 4px solid lightgray;
	}


</style>
<body>
	<div id="container">
			<h1>Notes:</h1>
		<div id="notes">
			<!--====================BEGIN NOTES FEED====================-->
			<!--===================AJAX WILL POPULATE===================-->
			<!--====================END NOTES FEED======================-->
		</div>
		<form id="add" action="/Notes/add_note" method="post">
			<input type="text" name="title" placeholder="Insert note here...">
			<button type="submit" name="submit_note" class="btn butt">Add Note</button>
		</form>
	</div>
</body>
</html>