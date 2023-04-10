<?php

$con5 = mysqli_connect("localhost", "root", "", "kisaan");

if (isset($_POST['sub'])) {


	$kishan_name = ($_POST['kishan_name']);
	$kishan_number = ($_POST['kishan_number']);
	$kishan_vill = ($_POST['kishan_vill']);

	$sql = mysqli_query($con5, "insert into kishan_data_record (kishan_name,kishan_number,kishan_vill,createat) values('$kishan_name','$kishan_number','$kishan_vill','" . date('Y-m-d') . "')");
	if ($sql) {
?>
		<script>
			alert("inserted");
			window.location = "index.php";
		</script>

<?php

	} else {
		echo mysqli_error();
	}
}

?>






<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>kishan Record</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>



</head>

<body>


	<section class="bg-light vh-100 d-flex">
		<div class="col-3 m-auto">
			<div class="card">
				<div class="card-body">
					<div class="border rounded-circle mx-auto d-flex mb-4" style="width:100px;height: 100px;">
						<i class="fa fa-user text-light fa-3x m-auto"></i>
					</div>
					<form action="" method="POST">
						<div class="md-form">
							<label for="kishan_name">Your Customer</label>
							<input type="text" id="kishan_name" name="kishan_name" class="form-control">
						</div>

						<div class="md-form">
							<label for="kishan_number">Your Number</label>
							<input type="number" id="kishan_number" name="kishan_number" class="form-control">
						</div>

						<div class="md-form">
							<label for="kishan_vill">Your Village</label>
							<input type="text" id="kishan_vill" name="kishan_vill" class="form-control">
						</div>

						<div class="text-center mt-3">
							<button class="btn btn-success" name="sub">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="col-lg-7 m-5">
			<table class="table table-bordered shadow">
				<thead>
					<tr>
						<td colspan="1">
							<select class="form-control" id="kishan_village">
								<option>All</option>
								<?php
								$i = 0;
								$a = mysqli_query($con5, "select * from  kishan_data_record order by id desc");
								while ($a1 = mysqli_fetch_array($a)) {
								?>
									<option><?php echo $a1['kishan_vill'] ?></option>
								<?php } ?>
							</select>
						</td>
					</tr>
					<tr class="text-center">
						<th>S.No.</th>
						<th>Customer Name</th>
						<th>Number</th>
						<th>Village</th>
						<th colspan="2">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$i = 0;
					$a = mysqli_query($con5, "select * from  kishan_data_record order by id desc");
					while ($a1 = mysqli_fetch_array($a)) {
					?>
						<tr class="text-center">
							<td><?php echo ++$i ?></td>
							<td><?php echo $a1['kishan_name'] ?></td>
							<td><?php echo $a1['kishan_number'] ?></td>

							<td><?php echo $a1['kishan_vill'] ?></td>

							<td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Add</button> </td>
							<td><button type="button" class="btn btn-dark" data-toggle="modal" data-target="#myView">View</button></td>
						</tr>


					<?php } ?>
				</tbody>
			</table>

		</div>
	</section>



	<!-- The Modal -->
	<div class="modal" id="myModal">
		<div class="modal-dialog">
			<div class="modal-content">

				<!-- Modal Header -->
				<div class="modal-header">
					<h4 class="modal-title"></h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>

				<!-- Modal body -->
				<div class="modal-body">
					<form action="" method="POST">

						<div class="md-form">
							<label for="new_kishan_number">Your Number</label>
							<input type="number" id="new_kishan_number" name="new_kishan_number" class="form-control">
						</div>

						<div class="text-center mt-3">
							<button class="btn btn-success" name="add">Add</button>
						</div>
					</form>
				</div>

				<!-- Modal footer -->
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				</div>

			</div>
		</div>
	</div>

	</div>



	<!-- The Modal -->
	<div class="modal" id="myView">
		<div class="modal-dialog">
			<div class="modal-content">

				<!-- Modal Header -->
				<div class="modal-header">
					<h4 class="modal-title"></h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>

				<!-- Modal body -->
				<div class="modal-body">

				</div>

				<!-- Modal footer -->
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				</div>

			</div>
		</div>
	</div>

	</div>

</body>

</html>