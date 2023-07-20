<?php
include "koneksi.php";


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashbord</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

</head>

<body>
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Active</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item">
            <a class="nav-link disabled">Disabled</a>
        </li>
    </ul>
    <table class="table">
        <form method='post' action='index.php'>
            <thead>
                <tr>
                    <th scope="col">Toko</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Harga</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td><input type='text' name='nama_barang' size='20'></td>
                    <td><input type='text' name='jumlah' size='20'></td>
                    <td><input type='text' name='harga' size='20'></td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td><input type='text' name='nama_barang' size='20'></td>
                    <td><input type='text' name='jumlah' size='20'></td>
                    <td><input type='text' name='harga' size='20'></td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td><input type='text' name='nama_barang' size='20'></td>
                    <td><input type='text' name='jumlah' size='20'></td>
                    <td><input type='text' name='harga' size='20'></td>
                </tr>
            </tbody>
        </form>
    </table>
    <input type='submit' value='Tambah' name='submit'>
    <?php
    error_reporting(E_ALL ^ E_NOTICE);
    $nama_barang = isset($_POST['nama_barang']) ? $_POST['nama_barang'] : '';
    $jumlah = isset($_POST['jumlah']) ? $_POST['jumlah'] : '';
    $harga = isset($_POST['harga']) ? $_POST['harga'] : '';
    $submit = isset($_POST['submit']) ? $_POST['submit'] : '';

    if ($submit && $nama_barang && $jumlah && $harga) {
        $input = "INSERT INTO barang (nama_barang, jumlah, harga) VALUES ('$nama_barang','$jumlah', $harga)";
        if (mysqli_query($conn, $input)) {
            echo '</br>Data berhasil dimasukkan';
        } else {
            echo "Error: " . $input . "<br>" . mysqli_error($conn);
        }
    }
    ?>
    <br>
    <br>
    <h2>View</h2>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Toko</th>
                <th scope="col">Nama Barang</th>
                <th scope="col">Jumlah</th>
                <th scope="col">Harga</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $cari = "SELECT * FROM barang ORDER BY id_toko";
            $hasil_cari = mysqli_query($conn, $cari);
            while ($data = mysqli_fetch_array($hasil_cari)) {
                echo "
            <tr>
                <td>{$data['id_toko']}</td>
                <td>{$data['nama_barang']}</td>
                <td>{$data['jumlah']}</td>
                <td>{$data['harga']}</td>
            </tr>";
            }
            ?>
        </tbody>
    </table>




    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>

</html>
