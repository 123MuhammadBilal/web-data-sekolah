<?php include_once('configdata.php');

if (isset($_REQUEST['submit']) and $_REQUEST['submit'] != "") {

	extract($_REQUEST);

	if ($sekolah == "") {

		header('location:' . $_SERVER['PHP_SELF'] . '?msg=un');

		exit;
	} elseif ($alamat == "") {

		header('location:' . $_SERVER['PHP_SELF'] . '?msg=ue');

		exit;
	} elseif ($akreditas == "") {

		header('location:' . $_SERVER['PHP_SELF'] . '?msg=up');

		exit;
	} else {



		$userCount	=	$db->getQueryCount('data', 'id');

		if ($userCount[0]['total'] < 100) {

			$data	=	array(

				'sekolah' => $sekolah,

				'alamat' => $alamat,

				'akreditas' => $akreditas,

				'jumlahsiswa' => $jumlahsiswa,

			);

			$insert	=	$db->insert('data', $data);

			if ($insert) {

				header('location:data.php?msg=ras');

				exit;
			} else {

				header('location:data.php?msg=rna');

				exit;
			}
		} else {

			header('location:' . $_SERVER['PHP_SELF'] . '?msg=dsd');

			exit;
		}
	}
}

?>

<!doctype html>
<html lang="en-US">

<head>

	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<meta name="description" content="Address Book">
	<meta name="keywords" content="PHP CRUD, CRUD with search and pagination, bootstrap 4, PHP">
	<meta name="robots" content="index,follow">
	<title>Address Book</title>



	<link rel="shortcut icon" href="https://demo.learncodeweb.com/favicon.ico">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->

	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>

	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>



</head>



<body>


	<div class="container mt-5">

		<?php

		if (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "un") {

			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Sekolah is mandatory field!</div>';
		} elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "ue") {

			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Alamat is mandatory field!</div>';
		} elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "up") {

			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Akreditas is mandatory field!</div>';
		} elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "ras") {

			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Jumlah Siswa is mandatory field!</div>';
		} elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "ras") {

			echo	'<div class="alert alert-success"><i class="fa fa-thumbs-up"></i> Record added successfully!</div>';
		} elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "rna") {

			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Record not added <strong>Please try again!</strong></div>';
		} elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "dsd") {

			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Please delete a user and then try again <strong>We set limit for security reasons!</strong></div>';
		}

		?>

		<div class="card">

			<div class="card-header">
				<h4 class="float-left">Tambah Data Sekolah</h4> <a href="data.php" class="float-right btn btn-danger btn-sm-2"> Back</a>
			</div>

			<div class="card-body">

				<div class="col-sm-6">

					<form method="post">

						<div class="form-group">

							<label>Sekolah <span class="text-danger">*</span></label>

							<input type="text" name="sekolah" id="sekolah" class="form-control" placeholder="Masukkan Nama Sekolah" required>

						</div>

						<div class="form-group">

							<label>Alamat <span class="text-danger">*</span></label>

							<input type="text" name="alamat" id="alamat" class="form-control" placeholder="Masukkan Alamat Sekolah" required>

						</div>

						<div class="form-group">

							<label>Akreditas <span class="text-danger">*</span></label>

							<select name="akreditas" id="akreditas" class="tel form-control" required>
								<option value="A">A</option>
								<option value="B">B</option>
								<option value="C">C</option>
								<option value="D">D</option>
							</select>

						</div>

						<div class="form-group">

							<label>Jumlah Siswa <span class="text-danger">*</span></label>

							<input type="tel" class="tel form-control" name="jumlahsiswa" id="jumlahsiswa" x-autocompletetype="tel" placeholder="Masukkan Jumlah Siswa" required>

						</div>

						<div class="form-group">

							<button type="submit" href="data.php" name="submit" value="submit" id="submit" class="btn btn-success"><i class="fa fa-fw fa-plus-circle"></i> Add Sekolah</button>

						</div>

					</form>

				</div>

			</div>

		</div>

	</div>



	<div class="container my-4">

	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>


</body>

</html>