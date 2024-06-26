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
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Deskripsi</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data['books'] as $key => $book) : ?>
                                        <tr>
                                            <td><?= $key + 1 ?></td>
                                            <td><?= $book['nama'] ?></td>
                                            <td>
                                                <img src="<?= BASEURL . 'storage/' . $book['image'] ?>" width="200" />
                                            </td>
                                            <td><?= $book['deskripsi'] ?></td>
                                            <td>
                                                <a href="<?= BASEURL . '/books/edit/' . $book['id'] ?>" class="btn btn-warning">Edit</a>
                                                <a href="<?= BASEURL . '/books/delete/' . $book['id'] ?>" class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- DataTales Example -->
        </div>
    </div>
</div>
<?php require_once(__DIR__ . "/../layouts/dashboard/footer.php"); ?>