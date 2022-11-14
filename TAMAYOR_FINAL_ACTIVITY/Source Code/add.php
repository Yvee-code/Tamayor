<?php
include_once("config.php");
?>

<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<title>Add Country</title>
</head>

<body
	style="background-image: url('image/back.jpg'); background-repeat: no-repeat; background-attachment: fixed; background-size: 100% 100%;">

	<div class="container mx-auto rounded pl-5 pr-5 pt-5 pb-5 ml-5 mr-5 mb-5 mt-5"
		style="background-color: white; opacity: 60%;"><br>
		<?php
        if (isset($_POST['submit'])) {
	        $id = mysqli_real_escape_string($mysqli, $_POST['id']);
	        $iso = mysqli_real_escape_string($mysqli, $_POST['iso']);
	        $name = mysqli_real_escape_string($mysqli, $_POST['name']);
	        $nicename = mysqli_real_escape_string($mysqli, $_POST['nicename']);
	        $iso3 = mysqli_real_escape_string($mysqli, $_POST['iso3']);
	        $numcode = mysqli_real_escape_string($mysqli, $_POST['numcode']);
	        $phonecode = mysqli_real_escape_string($mysqli, $_POST['phonecode']);
	        $created_at = mysqli_real_escape_string($mysqli, $_POST['created_at']);

	        if (empty($id) || empty($iso) || empty($name) || empty($nicename) || empty($iso3) || empty($numcode) || empty($phonecode) || empty($created_at)) {

		        if (empty($id)) {
			        echo "<font color='red'> Id field is empty. </font><br/>";
		        }
		        if (empty($iso)) {
			        echo "<font color='red'> Iso field is empty. </font><br/>";
		        }
		        if (empty($name)) {
			        echo "<font color='red'> Name field is empty. </font><br/>";
		        }
		        if (empty($nicename)) {
			        echo "<font color='red'> Nicename field is empty. </font><br/>";
		        }
		        if (empty($iso3)) {
			        echo "<font color='red'> Iso3 field is empty. </font><br/>";
		        }
		        if (empty($numcode)) {
			        echo "<font color='red'> Numcode field is empty. </font><br/>";
		        }
		        if (empty($phonecode)) {
			        echo "<font color='red'> Phonecode field is empty. </font><br/>";
		        }
		        if (empty($created_at)) {
			        echo "<font color='red'> Create_at field is empty. </font><br/>";
		        }


		        echo "<br/><a href='javascript:self.history.back();'>Go Back</a></br></br>";

	        } else {

		        $result = mysqli_query($mysqli, "INSERT INTO country(id, iso, name, nicename, iso3, numcode, phonecode, created_at) VALUES ('$id', '$iso', '$name', '$nicename', '$iso3', '$numcode', '$phonecode', '$created_at')");
		        echo "<font color='green'> Data Added Successfully.";
		        echo "<br/><a href='indexfq.php'> View Result </a>";
	        }


        }
        ?>

	</div>

	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
		integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
		crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
		integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
		crossorigin="anonymous"></script>

</body>

</html>