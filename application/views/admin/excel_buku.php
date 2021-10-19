<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SI Akademik</title>
</head>
<body>
    <section>
    <h3><center>LAPORAN DATA BUKU</center></h3>
    <h3><center>SISTEM INFORMASI PERPUSTAKAAN POLSUB</center></h3>
    <table border="1" style="border-collapse:collapse;">
        <thead>
            <tr style="background: #CCC;" bordercolor="#000000">
                <th width="4%" height="58" align="center">No</th>
                <th width="6%" align="center">ID Buku</th>
                <th width="20%">Judul</th>
                <th width="10%" align="center">Tanggal Terbit</th>
                <th width="11%" align="center">Tahun Terbit</th>
                <th width="15%" align="center">Penerbit</th>
                <th width="10%" align="center">Jumlah Halaman</th>
                <th width="11%" align="center">Jumlah Buku</th>
                <th width="13%" >Seller</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        header("Content-type: application/vnd-ms-excel");
        header("Content-Disposition: attachment; filename=Laporan Data Buku Sistem Informasi Perpustakaan Polsub.xls");
            $no = +1;
            foreach($data_buku->result_array() as $dp)
            {
        ?>
            <tr>
                <td align="center"><?php $no; ?></td>
                <td align="center"><?php echo $dp['id_buku']; ?></td>
                <td><?php echo $dp['judul']; ?></td>
                <td align="center"><?php echo $dp['tanggal']; ?></td>
                <td align="center"><?php echo $dp['terbit']; ?></td>
                <td align="center"><?php echo $dp['penerbit']; ?></td>
                <td align="center"><?php echo $dp['halaman']; ?></td>
                <td align="center"><?php echo $dp['jumlah']; ?></td>
                <td align="center"><?php echo $dp['peroleh']; ?></td>
            </tr>
            <?php 
             $no++;
             } ?>
        </tbody>
    </table>

    </section>
</body>
</html>