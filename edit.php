<?php include_once('configdata.php');

if (isset($_REQUEST['editId']) and $_REQUEST['editId'] != "") {

	$row	=	$db->getAllRecords('data', '*', ' AND id="' . $_REQUEST['editId'] . '"');
}



if (isset($_REQUEST['submit']) and $_REQUEST['submit'] != "") {

	extract($_REQUEST);

	if ($sekolah == "") {

		header('location:' . $_SERVER['PHP_SELF'] . '?msg=un&editId=' . $_REQUEST['editId']);

		exit;
	} elseif ($alamat == "") {

		header('location:' . $_SERVER['PHP_SELF'] . '?msg=ue&editId=' . $_REQUEST['editId']);

		exit;
	} elseif ($akreditas == "") {

		header('location:' . $_SERVER['PHP_SELF'] . '?msg=up&editId=' . $_REQUEST['editId']);

		exit;
	}

	$data	=	array(

		'sekolah' => $sekolah,

		'alamat' => $alamat,

		'akreditas' => $akreditas,

		'jumlahsiswa' => $jumlahsiswa,

	);

	$update	=	$db->update('data', $data, array('id' => $editId));

	if ($update) {

		header('location: data.php?msg=rus');

		exit;
	} else {

		header('location: data.php?msg=rnu');

		exit;
	}
}

?>

<!doctype html>

<html lang="en-US">

<head>

	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<meta name="description" content="PHP CRUD with search and pagination in bootstrap 4">
	<meta name="keywords" content="PHP CRUD, CRUD with search and pagination, bootstrap 4, PHP">
	<meta name="robots" content="index,follow">
	<title>PHP CRUD with search and pagination in bootstrap 4</title>


	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->

	<!--[if lt IE 9]>

	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>

	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

	<![endif]-->


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

			echo	'<div class="alert alert-success"><i class="fa fa-thumbs-up"></i> Record added successfully!</div>';
		} elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "rna") {

			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Record not added <strong>Please try again!</strong></div>';
		}

		?>

		<div class="card">

			<div class="card-header">
				<h4 class="float-left">Edit Data Sekolah</h4> <a href="data.php" class="float-right btn btn-danger btn-sm-2"> Back</a>
			</div>

			<div class="card-body">



				<div class="col-sm-6">

					<form method="post">

						<div class="form-group">

							<label>Sekolah <span class="text-danger">*</span></label>

							<input type="text" name="sekolah" id="sekolah" class="form-control" value="<?php echo isset($row[0]['sekolah']) ? $row[0]['sekolah'] : ''; ?>" placeholder="Masukkan Nama Sekolah" required>

						</div>

						<div class="form-group">

							<label>Alamat <span class="text-danger">*</span></label>

							<input type="text" name="alamat" id="alamat" class="form-control" value="<?php echo isset($row[0]['alamat']) ? $row[0]['alamat'] : ''; ?>" placeholder="Masukkan Alamat Sekolah" required>

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
							<input type="tel" class="tel form-control" name="jumlahsiswa" id="jumlahsiswa" x-autocompletetype="tel" value="<?php echo isset($row[0]['jumlahsiswa']) ? $row[0]['jumlahsiswa'] : ''; ?>" placeholder="Masukkan Jumlah Siswa" required>

						</div>

						<div class="form-group">

							<input type="hidden" name="editId" id="editId" value="<?php echo isset($_REQUEST['editId']) ? $_REQUEST['editId'] : '' ?>">

							<button href="data.php" type="submit" name="submit" value="submit" id="submit" class="btn btn-primary"><i class="fa fa-fw fa-edit"></i> Update User</button>

						</div>

					</form>

				</div>

			</div>

		</div>

	</div>



	<div class="container my-4">

		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

		<!-- demo left sidebar -->

		<ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-6724419004010752" data-ad-slot="7706376079" data-ad-format="auto" data-full-width-responsive="true"></ins>

		<script>
			(adsbygoogle = window.adsbygoogle || []).push({});
		</script>

	</div>



	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>

	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/jquery.caret/0.1/jquery.caret.js"></script>
	<script src="https://www.solodev.com/_/assets/phone/jquery.mobilePhoneNumber.js"></script>
	<script>
		$(document).ready(function() {
			jQuery(function($) {
				var input = $('[type=tel]')
				input.mobilePhoneNumber({
					allowPhoneWithoutPrefix: '+1'
				});
				input.bind('country.mobilePhoneNumber', function(e, country) {
					$('.country').text(country || '')
				})
			});
		});
	</script>


</body>

</html>