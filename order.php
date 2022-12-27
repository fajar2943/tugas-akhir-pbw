<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Buah Fajar</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">
                <h2>Toko Buah Fajar</h2>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="produk.php">List Product</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="bukutamu.php">Buku Tamu</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-5">
        <div class="row">
            <div class="col-8">
                <h4>Halaman Order</h4>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Produk</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $harga = 0; foreach($_POST['produk'] as $key => $produk) : $harga+=$_POST['harga'][$key]?>
                            <tr>
                                <th scope="row"><?php echo $key + 1 ?></th>
                                <td class="produk"><?php echo $produk ?></td>
                                <td class="harga"><?php echo $_POST['harga'][$key] ?></td>
                                <td><a href="#!" class="btnHapus btn btn-danger" data-harga="<?php echo $_POST['harga'][$key]?>">Hapus</a></td>
                            </tr>
                        <?php endforeach ?>
                        <tr>
                            <th scope="col" colspan="2">Total Bayar:</th>
                            <th scope="col" class="total">Rp. <?php echo $harga ?></th>
                        </tr>
                    </tbody>
                </table>
                <div class="mt3">
                    <button class="btn btn-dark btnBayar">Bayar Sekarang</button>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js"
        integrity="sha512-tWHlutFnuG0C6nQRlpvrEhE4QpkG1nn2MOUMWmUeRePl4e3Aki0VB6W1v3oLjFtd0hVOtRQ9PHpSfN6u6/QXkQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $(document).ready(function () {
            let totalHarga = <?php echo $harga ?>;
            $('.btnHapus').on("click", function () {
                let harga = $(this).data('harga');
                totalHarga = totalHarga - harga
                $('.total').text(`Rp. ${totalHarga}`)
                $(this).parent().parent().remove()

                if(totalHarga == 0){
                    $('.btnBayar').hide()
                }
            })
        })
    </script>
</body>

</html>