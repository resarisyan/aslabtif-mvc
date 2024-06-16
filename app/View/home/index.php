<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once(__DIR__ . "/../layouts/header.php"); ?>

<body>
    <div class="container">
        <h2 class="text-center">Data Product</h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Price</th>
                    <th scope="col">Image</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data['products'] as $key => $product) : ?>
                    <tr>
                        <th scope="row"><?= $key + 1; ?></th>
                        <td><?= $product['name']; ?></td>
                        <td><?= $product['stock']; ?></td>
                        <td><?= $product['price']; ?></td>
                        <td></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <?php require_once(__DIR__ . "/../layouts/footer.php"); ?>
</body>

</html>