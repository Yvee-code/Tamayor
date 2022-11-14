<?php

include_once("config.php");

if (isset($_POST['update'])) {
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
			echo "<font color='red'> id field is empty. </font><br/>";
		}
		if (empty($iso)) {
			echo "<font color='red'> iso field is empty. </font><br/>";
		}
		if (empty($name)) {
			echo "<font color='red'> name field is empty. </font><br/>";
		}
		if (empty($nicename)) {
			echo "<font color='red'> nicename field is empty. </font><br/>";
		}
		if (empty($iso3)) {
			echo "<font color='red'> iso3 field is empty. </font><br/>";
		}
		if (empty($numcode)) {
			echo "<font color='red'> numcode field is empty. </font><br/>";
		}
		if (empty($phonecode)) {
			echo "<font color='red'> phonecode field is empty. </font><br/>";
		}
		if (empty($created_at)) {
			echo "<font color='red'> created_at field is empty. </font><br/>";
		}

		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";

	} else {

		$result = mysqli_query($mysqli, "UPDATE country set id='$id', iso='$iso', name='$name', nicename='$nicename', iso3='$iso3', numcode='$numcode', phonecode='$phonecode', created_at='$created_at' WHERE id=$id");
		header("Location: indexfq.php");

	}

}
?>

<?php

$id = $_GET['id'];

$result = mysqli_query($mysqli, "SELECT * from country where id=$id");

while ($res = mysqli_fetch_array($result)) {
	$id = $res['id'];
	$iso = $res['iso'];
	$name = $res['name'];
	$nicename = $res['nicename'];
	$iso3 = $res['iso3'];
	$numcode = $res['numcode'];
	$phonecode = $res['phonecode'];
	$created_at = $res['created_at'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="wIDth=device-wIDth, initial-scale=1.0">
	<link id="theme-style" rel="stylesheet" href="css/edit.css">
	<title>Edit data</title>
	<style>
		body {
			margin-top: 150px;
			margin-right: 500px;
			margin-left: 450px;
			background-image: url("image/back.jpg");
			background-attachment: fixed;
			background-position: center;
			background-repeat: no-repeat;
			background-size: cover;

		}
	</style>
</head>

<body>
	<div class="card">
		<div class="container">
			<div>
				<form action="edit.php" method="post" name="form1">


					<table>
						<th>
							<p>
							<h3><label for="code">id</label></p>
							</h3>
						</th>
						<tr>
							<td><input type="text" name="id" rows="4" cols="50" value="<?php echo $id; ?>">
							</td>
						</tr>
						<th>
							<p>
							<h3><label for="code">iso</label></p>
							</h3>
						</th>
						<tr>
							<td><input type="text" name="iso" rows="4" cols="50" value="<?php echo $iso; ?>">
							</td>
						</tr>
						<th>
							<p>
							<h3><label for="code">name</label></p>
							</h3>
						</th>
						<tr>
							<td><input type="text" name="name" rows="4" cols="50" value="<?php echo $name; ?>">
							</td>
						</tr>
						<th>
							<p>
							<h3><label for="code">nicename</label></p>
							</h3>
						</th>
						<tr>
							<td><input type="text" name="nicename" rows="4" cols="50" value="<?php echo $nicename; ?>">
							</td>
						</tr>
						<th>
							<p>
							<h3><label for="code">iso3</label></p>
							</h3>
						</th>
						<tr>
							<td><input type="text" name="iso3" rows="4" cols="50" value="<?php echo $iso3; ?>">
							</td>
						</tr>
						<th>
							<p>
							<h3><label for="code">numcode</label></p>
							</h3>
						</th>
						<tr>
							<td><input type="text" name="numcode" rows="4" cols="50" value="<?php echo $numcode; ?>">
							</td>
						</tr>
						<th>
							<p>
							<h3><label for="code">phonecode</label></p>
							</h3>
						</th>
						<tr>
							<td><input type="text" name="phonecode" rows="4" cols="50"
									value="<?php echo $phonecode; ?>">
							</td>
						</tr>
						<th>
							<p>
							<h3><label for="code">created_at</label></p>
							</h3>
						</th>
						<tr>
							<td><input type="text" name="created_at" rows="4" cols="50"
									value="<?php echo $created_at; ?>">
							</td>
						</tr>
						<tr>
							<br>

							<td><input type="submit" name="update" value="Update"></td>
							<td><input type="hIDden" name="id" value="<?php echo $_GET['id']; ?>"></td>
						</tr>
					</table>
			</div>
		</div>
	</div>
	</div>
	</form>
	<div class="col-sm-12 border border-bottom-dark mt-3"></div>

	<div class="col-sm-12 border border-bottom-dark mt-3">
		<h5 class="col-sm-1"><a href="indexfq.php" class="mt-3 btn btn-success">Back</a></h5>
	</div>
	</div>


	<div class="container-fluid bg-secondary text-md-center m-sm-0 p-sm-1">
		<div></div>
	</div>

</body>

</html>