<?php include 'includes/header.php'; ?>
<?php include_once('configdata.php'); ?>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">


<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>

<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>



<!-- Section Data Start -->
<section class="data">
    <div class="card-data">

        <?php
        error_reporting(0);

        $condition    =    '';
        if (isset($_REQUEST['sekolah']) and $_REQUEST['sekolah'] != "") {
            $condition    .=    ' AND sekolah LIKE "%' . $_REQUEST['sekolah'] . '%" ';
        }
        if (isset($_REQUEST['alamat']) and $_REQUEST['alamat'] != "") {
            $condition    .=    ' AND alamat LIKE "%' . $_REQUEST['alamat'] . '%" ';
        }
        if (isset($_REQUEST['akreditas']) and $_REQUEST['akreditas'] != "") {
            $condition    .=    ' AND akreditas LIKE "%' . $_REQUEST['akreditas'] . '%" ';
        }
        if (isset($_REQUEST['jumlahsiswa']) and $_REQUEST['jumlahsiswa'] != "") {
            $condition    .=    ' AND jumlahsiswa LIKE "%' . $_REQUEST['jumlahsiswa'] . '%" ';
        }

        //Main queries
        $pages->default_ipp    =    5;
        $sql     = $db->getRecFrmQry("SELECT * FROM data WHERE 1 " . $condition . "");
        $pages->items_total    =    count($sql);
        $pages->mid_range    =    9;
        $pages->paginate();

        $userData    =   $db->getRecFrmQry("SELECT * FROM data WHERE 1 " . $condition . " ORDER BY id DESC " . $pages->limit . "");

        ?>




        <div class="container mt-5">

            <?php

            if (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "rds") {

                echo    '<div class="alert alert-warning"><i class="fa fa-thumbs-up"></i> Data Sekolah Telah Dihapus!</div>';
            } elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "rus") {

                echo    '<div class="alert alert-primary"><i class="fa fa-thumbs-up"></i> Data Sekolah Berhasil Diupdate </div>';
            } elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "rnu") {

                echo    '<div class="alert alert-warning"><i class="fa fa-exclamation-triangle"></i> You did not change any thing!</div>';
            } elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "ras") {

                echo    '<div class="alert alert-success"><i class="fa fa-thumbs-up"></i> Data Sekolah Berhasil Ditambahkan </div>';
            } elseif (isset($_REQUEST['msg']) and $_REQUEST['msg'] == "rna") {

                echo    '<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Record not added <strong>Please try again!</strong></div>';
            }

            ?>

            <div class="col-sm-12">

                <form method="get">

                    <div class="row">

                        <div class="col-sm-2">

                            <div class="form-group">

                                <label>Sekolah</label>

                                <input type="text" name="sekolah" id="sekolah" class="form-control" value="<?php echo isset($_REQUEST['sekolah']) ? $_REQUEST['sekolah'] : '' ?>" placeholder="cari...">

                            </div>

                        </div>

                        <div class="col-sm-2">

                            <div class="form-group">

                                <label>Alamat</label>

                                <input type="text" name="alamat" id="alamat" class="form-control" value="<?php echo isset($_REQUEST['alamat']) ? $_REQUEST['alamat'] : '' ?>" placeholder="cari...">

                            </div>

                        </div>

                        <div class="col-sm-2">

                            <div class="form-group">

                                <label>Akreditas</label>

                                <input type="text" class="form-control" name="akreditas" id="akreditas" value="<?php echo isset($_REQUEST['akreditas']) ? $_REQUEST['akreditas'] : '' ?>" placeholder="cari...">

                            </div>

                        </div>

                        <div class="col-sm-2">

                            <div class="form-group">

                                <label>Jumlah Siswa</label>

                                <input type="text" class="form-control" name="jumlahsiswa" id="jumlahsiswa" value="<?php echo isset($_REQUEST['jumlahsiswa']) ? $_REQUEST['jumlahsiswa'] : '' ?>" placeholder="cari...">

                            </div>

                        </div>

                        <div class="col-sm-4">

                            <div class="form-group">

                                <label>&nbsp;</label>

                                <div>

                                    <button type="submit" name="submit" value="search" id="submit" class="btn btn-primary"><i class="fa fa-fw fa-search"></i> Search</button>

                                    <a href="<?php echo $_SERVER['PHP_SELF']; ?>" class="btn btn-danger"><i class="fa fa-fw fa-sync"></i> Clear</a>

                                </div>

                            </div>

                        </div>

                    </div>

            </div>

            </form>



            <a href="add.php" class="btn btn-success btn-sm-4 mt-3"><i class="fa fa-fw fa-plus-circle"></i> Tambah Data</a>

            <hr>


            <div class="clearfix"></div>

            <div class="row marginTop">
                <div class="col-sm-12 paddingLeft pagerfwt">
                    <?php if ($pages->items_total > 0) { ?>
                        <?php echo $pages->display_pages(); ?>
                        <?php echo $pages->display_items_per_page(); ?>
                        <?php echo $pages->display_jump_menu(); ?>
                    <?php } ?>
                </div>
                <div class="clearfix"></div>
            </div>

            <div class="clearfix"></div>


            <div>

                <table class="table table-bordered">
                    <thead class="thead-dark">
                        <tr class="bg-primary text-white">
                            <th>No</th>
                            <th>Sekolah</th>
                            <th>Alamat</th>
                            <th>Akreditas</th>
                            <th>Jumlah Siswa</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (count($userData) > 0) {
                            $s    =    '';
                            foreach ($userData as $val) {
                                $s++;
                        ?>
                                <tr>
                                    <td><?php echo $s; ?></td>
                                    <td><?php echo $val['sekolah']; ?></td>
                                    <td><?php echo $val['alamat']; ?></td>
                                    <td><?php echo $val['akreditas']; ?></td>
                                    <td><?php echo $val['jumlahsiswa']; ?></td>
                                    <td align="center">
                                        <a href="edit.php?editId=<?php echo $val['id']; ?>" class="text-primary"><i class="fa fa-fw fa-edit"></i> Edit</a> |
                                        <a href="delete.php?delId=<?php echo $val['id']; ?>" class="text-danger" onClick="return confirm('Are you sure to delete this user?');"><i class="fa fa-fw fa-trash"></i> Delete</a>
                                    </td>

                                </tr>
                            <?php
                            }
                        } else {
                            ?>
                            <tr>
                                <td colspan="5" align="center">Data Tidak Ada</td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <!--/.col-sm-12-->

            <div class="clearfix"></div>

            <div class="row marginTop">
                <div class="col-sm-12 paddingLeft pagerfwt">
                    <?php if ($pages->items_total > 0) { ?>
                        <?php echo $pages->display_pages(); ?>
                        <?php echo $pages->display_items_per_page(); ?>
                        <?php echo $pages->display_jump_menu(); ?>
                    <?php } ?>
                </div>
                <div class="clearfix"></div>
            </div>

            <div class="clearfix"></div>

        </div>

        <div class="container my-4">

            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

            <!-- demo left sidebar -->

            <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-6724419004010752" data-ad-slot="7706376079" data-ad-format="auto" data-full-width-responsive="true"></ins>

            <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
            </script>

        </div>
    </div>
</section>
<!-- Section Data End -->








<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

<?php include 'includes/footer.php'; ?>