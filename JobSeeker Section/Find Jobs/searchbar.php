
<html>
<head>
	<title> Search Bar Exp </title>
	<link href="search.css" rel="stylesheet">
	<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

        <!-- Optional theme -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>

        <script type="text/javascript" src="jquery.js"></script>
	    <script type="text/javascript" src="jquery-ui.js"></script>
	    <link rel="stylesheet" href="jquery-ui.css">
	    <link rel="stylesheet" href="styles.css">
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>


        
  
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js"></script>
        <script>
        function searchToggle(obj, evt){
    var container = $(obj).closest('.search-wrapper');
        if(!container.hasClass('active')){
            container.addClass('active');
            evt.preventDefault();     // prevent any types of action before applying styling
        }
        else if(container.hasClass('active') && $(obj).closest('.input-holder').length == 0){
            container.removeClass('active');
            // clear input
            container.find('.search-input').val('');
        }
}
	    $(document).ready(function(){
		  $("#search").keyup(function(){
			$.ajax({
				type: "POST",
				url: "autocomplete.php",
				data:'keyword='+$(this).val(),
				success: function(data){
					$("#suggestion-box").show();
					$("#suggestion-box").html(data);
				}
			});
		});
	});
	function selectJ(val) {
		$("#search").val(val);
		$("#suggestion-box").hide();	
	}
    </script>
</head>
<body>
<form method="POST">
<div class="search-wrapper">
    <div class="input-holder">
        <input type="text" class="search-input" id="search" name="search" placeholder="Search Jobs" />
        <button class="search-icon" onclick="searchToggle(this, event);"><span></span></button><br>
	</div>
    <span class="close" onclick="searchToggle(this, event);">
    </span><br>
    <div id="suggestion-box"><br>&nbsp;         
    </div>
     
</div>
</form>

<?php
$servername = 'localhost';
		$username = 'root';
		$dbase = 'searchbar';
		$pass = '';
		// Create connection
		$conn = new mysqli($servername, $username, $pass, $dbase);
if ($conn->connect_error) {
 die("Connection failed: " . $conn->connect_error);
} 
else{
	echo "Successfully Connected.";
}
$search = $_POST['search'];
		echo $search;
			$sql = "SELECT * FROM searchbar.searchtable WHERE J_name = ('$search') ";

		$result = $conn->query($sql);
		if($result->num_rows > 0){
			?>
			<table border=1>
					<tr align="center"> 
						<th> &nbsp; Job ID &nbsp;</th>
						<th> &nbsp; Job Company &nbsp;</th>
						<th> &nbsp; Job Name &nbsp;</th>
						<th> &nbsp; Job Type &nbsp;</th>
						<th> &nbsp; Job Duration &nbsp;</th>
						<th> &nbsp; Job Vacancy &nbsp;</th>
					</tr>
					<?php
			    // output data of each row
			    while($row = $result->fetch_assoc()) {
			        ?>
					<tr align="center">
						<td> <?php echo $row["J_id"]; ?> </td>
						<td> <?php echo $row["J_company"]; ?> </td>
						<td> &nbsp; <?php echo $row["J_name"]; ?> &nbsp;</td>
						<td> &nbsp; <?php echo $row["J_type"]; ?> &nbsp;</td>
						<td> &nbsp; <?php echo $row["J_duration"]; ?> &nbsp;</td>
						<td> &nbsp; <?php echo $row["J_vacancy"]; ?> &nbsp;</td>
					</tr>

				<?php
			    }
			    ?>
			</table>
			<?php
			   }
			else{
				echo "0 results.";
			}
			 
			
		//}



	$conn->close();
?> 


</body>
</html>