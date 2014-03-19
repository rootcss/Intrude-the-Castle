<script type="text/javascript">
$(document).ready(function(){
	$("#answer_btn").click(function(){		
		var answer = $("#ans").val();
		$("#start_btn").hide();
		$.ajax({
			type: "POST",
			url: "submit.php",
			data: { main: answer}
		}).done(function( data ) {
			$("#data_content").html(data);
		});
	})
});
</script>
<?php
	echo'<div id="user_answer">
			<center>
				<input id="ans" type="text" name="answer" placeholder=" Write your answer here" required>
				<input id="answer_btn" type="submit" value="Submit">
			</center>
		</div>';
?>