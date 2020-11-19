<?php include("navbar.php");
include("config.php");

$courses = array();
$temp="";
$sql = "SELECT * FROM courses";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()){
	$temp = $row['course_id'] . " - " . $row['course_name'];
	array_push($courses,$temp);
}
 // include 'filesLogic.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>Admission</title>
		<link href="https://fonts.googleapis.com/css2?family=Averia+Serif+Libre:wght@300&display=swap" rel="stylesheet">
		<style media="screen">
		body {
		    /* font-family: "Helvetica Neue",Helvetica,Arial,sans-serif; */
		    /* font-size: 14px; */
		    line-height: 1.42857143;
		    color: #333;
		    background-color: #f8f9fa;
		}
		.form-control {
    display: block;
    width: 100%;
    height: 34px;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
    background-color: #fff;
    border: 1px solid #ccc;
    border-radius: 4px;
		font-family: 'Averia Serif Libre', cursive;
		font-size: 18px;
	}
		.panel-default {
	border-color: #ddd;
}
.container{
	width: 80%;
	/* background: yellow; */
}
.panel {
    margin-bottom: 20px;
    background-color: #fff;
    border: 1px solid #e6e8e6;
    border-radius: 4px;
    -webkit-box-shadow: 0 1px 1px rgba(0,0,0,.05);
    box-shadow: 0 1px 1px rgba(0,0,0,.05);
}
.panel-heading {
    padding: 10px 15px;
    border-bottom: 1px solid #e6e8e6;
    border-top-left-radius: 3px;
    border-top-right-radius: 3px;
		background-color: #f0f5f0;
}
.panel-body {
    padding: 15px;
		/* background: pink; */
}
.row {
    margin-right: -15px;
    margin-left: -15px;
}
.col-lg-6,.col-lg-4,.col-lg-10,.col-lg-2{
	/* display: inline-block; */
	float:left;
	/* position: absolute; */
}
.center{
	margin: auto;
  width: 50%;
  /* border: 3px solid green; */
  padding: 5px;
}
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}
.page-header {
    padding-bottom: 5px;
    margin: auto;
    border-bottom: 1px solid #eee;
}
h4 {
	font-family: 'Helvetica Neue',Helvetica, Arial, cursive;
	font-size: 18px;
}
.btn{
	background-color: #7D9DA1;
	border-color: #7D9DA1;
	width: 100px;
	cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}
.btn:after {
  content: '»';
  position: absolute;
  opacity: 0;
  top: -10px;
  right: -20px;
  transition: 0.5s;
	font-size: 35px;
}
.btn:hover{
  padding-right: 24px;
  padding-left:8px;
	background-color: #567376;
	border-color: #567376;
}
.btn:hover:after {
  opacity: 1;
  right: 10px;
}
p
{
  margin:0;
  padding:0;
	line-height: 1.42857143;
	font-family: 'Averia Serif Libre', cursive;
	font-size: 15px;
}
		</style>
	</head>
	<body>
		<br><br>
		<form method="post" action="admission.php" enctype="multipart/form-data">
		<div class="container">

			<div class="row">
				<div class="col-lg-12">
					<h4 class="page-header"> STUDENT ENROLLMENT</h4>
				</div>
				<!-- /.col-lg-12 -->
			</div>
			<br>

			<div class="row">
			<div class="col-lg-10 center">
				<div class="panel panel-default">
					<div class="panel-heading">Course Details</div>
					<br>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-10 center">
								<div class="form-group">
									<div class="col-lg-4">
										<label>Select Course: </label>
									</div>
									<div class="col-lg-6">
									<select name="course" class="form-control">
									<option value="">Select</option>
									<?php
										foreach ($courses as $value) { ?>
								   	<option value="<?php echo $value; ?>"><?php echo $value; ?></option>
									<?php } ?>
									</select>
									</div>
									<br>
									<br>
									<br>
										<div class="col-lg-4">
											<label>Date of Enrollment: </label>
										</div>
										<div class="col-lg-6">
											<input id="date-field" type="date" class="form-control" name="date" >
											<script>
											document.getElementById('date-field').value = new Date().toISOString().slice(0, 10);
											</script>
									</div>
								</div>
							</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">Personal Details</div>
				<br>
				<div class="panel-body">
					<div class="row">
						<div class="col-lg-12">
							<div class="form-group">

								<div class="col-lg-2">
									<label>First Name: </label>
								</div>
								<div class="col-lg-4">
									<input class="form-control" type="text" name="fname" required="required">
								</div>
								<div class="col-lg-2">
									<label>Middle Name: </label>
								</div>
								<div class="col-lg-4">
									<input class="form-control" type="text" name="mname">
								</div>
							</div>
							<br><br>
						<div class="form-group">
							<div class="col-lg-2">
								<label>Last Name: </label>
							</div>
							<div class="col-lg-4">
								<input class="form-control" type="text" name="lname">
							</div>
							<div class="col-lg-2">
								<label>Gender: </label>
							</div>
							<div class="col-lg-4">
								<input type="radio" name="gender" id="male" value="Male">&nbsp;Male&nbsp;&nbsp;&nbsp;
								<input type="radio" name="gender" id="female" value="Female">&nbsp;Female&nbsp;&nbsp;&nbsp;
								<input type="radio" name="gender" id="other" value="Other">&nbsp;Other&nbsp;&nbsp;&nbsp;
							</div>
						</div>
						<br><br>
						<div class="form-group">
							<div class="col-lg-2">
								<label>Date of Birth:</label>
							</div>
							<div class="col-lg-4">
								<input type="date" name="dob" class="form-control" value="">
							</div>
							<div class="col-lg-2">
								<label>Education Level:</label>
							</div>
							<div class="col-lg-4">
								<select class="form-control" name="education">
									<option value="">Select</option>
									<option value="Primary (I-VIII)">Primary (I-VIII)</option>
									<option value="Secondary (IX-X)">Secondary (IX-X)</option>
									<option value="Higher Secondary 10+2">Higher Secondary 10+2</option>
									<option value="UnderGraduate">UnderGraduate</option>
									<option value="PostGraduate">PostGraduate</option>
									<option value="Ph.D">Ph.D</option>
									</optgroup>
									</optgroup>
								</select>
							</div>
						</div>
						<br><br>
						<div class="form-group">
							<div class="col-lg-2">
								<label>School/College: </label>
							</div>
							<div class="col-lg-4">
								<input class="form-control" name="school">
							</div>
							<div class="col-lg-2">
								<label>State: </label>
							</div>
							<div class="col-lg-4">
								<select class="form-control" name="state">
									<option value="">Select</option>
									<option value="Andhra Pradesh">Andhra Pradesh</option>
									<option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
									<option value="Arunachal Pradesh">Arunachal Pradesh</option>
									<option value="Assam">Assam</option>
									<option value="Bihar">Bihar</option>
									<option value="Chandigarh">Chandigarh</option>
									<option value="Chhattisgarh">Chhattisgarh</option>
									<option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
									<option value="Daman and Diu">Daman and Diu</option>
									<option value="Delhi">Delhi</option>
									<option value="Lakshadweep">Lakshadweep</option>
									<option value="Puducherry">Puducherry</option>
									<option value="Goa">Goa</option>
									<option value="Gujarat">Gujarat</option>
									<option value="Haryana">Haryana</option>
									<option value="Himachal Pradesh">Himachal Pradesh</option>
									<option value="Jammu and Kashmir">Jammu and Kashmir</option>
									<option value="Jharkhand">Jharkhand</option>
									<option value="Karnataka">Karnataka</option>
									<option value="Kerala">Kerala</option>
									<option value="Madhya Pradesh">Madhya Pradesh</option>
									<option value="Maharashtra">Maharashtra</option>
									<option value="Manipur">Manipur</option>
									<option value="Meghalaya">Meghalaya</option>
									<option value="Mizoram">Mizoram</option>
									<option value="Nagaland">Nagaland</option>
									<option value="Odisha">Odisha</option>
									<option value="Punjab">Punjab</option>
									<option value="Rajasthan">Rajasthan</option>
									<option value="Sikkim">Sikkim</option>
									<option value="Tamil Nadu">Tamil Nadu</option>
									<option value="Telangana">Telangana</option>
									<option value="Tripura">Tripura</option>
									<option value="Uttar Pradesh">Uttar Pradesh</option>
									<option value="Uttarakhand">Uttarakhand</option>
									<option value="West Bengal">West Bengal</option>
								</select>
							</div>
						</div>
						<br><br>
						<div class="form-group">
							<div class="col-lg-2">
								<label>Email ID: </label>
							</div>
							<div class="col-lg-4">
								<input class="form-control" type="email" name="emailid" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
							</div>
							<div class="col-lg-2">
								<label>Contact Number: </label>
							</div>
							<div class="col-lg-4">
								<input class="form-control" type="number" name="contact" value="" required>
							</div>
						</div>
					</div>

					</div>
					</div>
					</div>
				</div>

			<form action="admission-form.php" method="post" enctype="multipart/form-data" >
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Upload Documents</div>
					<br>
						<div class="panel-body">
							<div class="row">
								<div class="col-lg-12">
									<div class="form-group">
										<div class="col-lg-2">
											<label>Upload Photo: </label>
										</div>
										<div class="col-lg-4">
											<input type="file" name="photo">
										</div>
										<div class="col-lg-2"></div>
										<div class="col-lg-6">
											<p>*Please upload passport size photo in .jpg or .jpeg format.</p>
											<p>*Size < 1 MB</p>
										</div>
									</div>
									<br><br><br>
									<div class="form-group">
										<div class="col-lg-2">
											<label>Upload ID Proof: </label>
										</div>
										<div class="col-lg-4">
											<input type="file" name="id">
										</div>
										<div class="col-lg-2"></div>
										<div class="col-lg-6">
											<p>*Please upload a valid ID proof of 400x200 in .jpg or .jpeg format.</p>
											<p>*Size < 1 MB</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</form>
			<div class="row center">
				<div class="col-lg-12">
					<div class="form-group center">
						<div class="col-lg-4"></div>
						<div class="col-lg-4">
							<button type="submit" name="register" class="btn btn-primary"><span>Register&nbsp;&nbsp;</span></button>
						</div>
					</div>
				</div>
			</div>

		</div>
		</div>
	</form>
	</body>
</html>
