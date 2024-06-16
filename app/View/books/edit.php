<?php require_once(__DIR__ . "/../layouts/dashboard/header.php"); ?>
<!-- Page Wrapper -->
<div id="wrapper">
    <?php require_once(__DIR__ . "/../layouts/dashboard/sidebar.php"); ?>
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
            <?php require_once(__DIR__ . "/../layouts/dashboard/navbar.php"); ?>
            <!-- Begin Page Content -->
            <div class="container-fluid">
                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-gray-800">Tables</h1>
                <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                    For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>
                <form method="POST" action=<?= BASEURL . "/books/update/" . $data['book']['id'] ?> enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $data['book']['nama'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="<?= $data['book']['deskripsi'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" class="form-control" id="image" name="image">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <!-- DataTales Example -->
        </div>
    </div>
</div>
<?php require_once(__DIR__ . "/../layouts/dashboard/footer.php"); ?>