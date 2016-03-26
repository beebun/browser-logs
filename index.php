<?php
require 'vendor/autoload.php';
$result = new WhichBrowser\Parser($_SERVER['HTTP_USER_AGENT']);
?>

<script src="js/jquery-2.2.1.min.js"></script>
<script src="js/google-spreadsheet.js"></script>
<script>

	function save_data_to_sheet(){
		var date = new Date();
		var hours = date.getHours();
		var minutes = date.getMinutes();
		var seconds = date.getSeconds()%60;
		hours = hours < 10 ? '0'+hours : hours;
		minutes = minutes < 10 ? '0'+minutes : minutes;
		seconds = seconds < 10 ? '0'+seconds : seconds;
		var strTime = hours + ':' + minutes + ':' + seconds;
		var month_names_short = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

		var d = date.getDate() + ' ' + month_names_short[date.getMonth()] + ' ' + date.getFullYear();
		var ft = strTime;
		var url = 'https://script.google.com/macros/s/AKfycby4_cpxO8GstE84NChXjd7J_je3Vz6HvszXH6eEBJQtrmPJtp8/exec';
		$.ajax({
			type: "POST",
			dataType: 'jsonp',
			url: url,
			data: {
				'Date': d,
				'Time': ft, 
				'Browser': '<?php echo $result->browser->toString(); ?>',
				'Device': '<?php echo $result->getType(); ?>',
				'OS': '<?php echo $result->os->toString(); ?>'
			},
			success: function(result){
				console.log(result);
			}
		});
	}
	save_data_to_sheet();
</script>
