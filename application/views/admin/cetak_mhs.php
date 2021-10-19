<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SI Akademik Data Mahasiswa</title>
</head>
<body>
    <section>
    <h3><center>LAPORAN DATA MAHASISWA</center></h3>
    <h3><center>SISTEM INFORMASI PERPUSTAKAAN POLSUB</center></h3>
    <br>
    <table border="1" style="border-collapse:collapse;">
        <thead>
        <tr style="background: #CCC;" bordercolor="#000000">
                <th width="10%" height="58" align="center">Username</th>
                <th width="10%" align="center">Password</th>
                <th width="10%">Tempat</th>
                <th width="10%" align="center">Tanggal Lahir</th>
                <th width="11%" align="center">Fakultas</th>
                <th width="15%" align="center">Jurusan</th>
                <th width="10%" align="center">Tahun</th>
                <th width="11%" align="center">Alamat </th>
                <th width="13%" >Email</th>
            </tr>
        </thead>
        <tbody>
        <?php 
            $no = +1;
            foreach($data_user->result_array() as $dp)
            {
        ?>
            <tr>
                <td align="center"><?php echo $dp['username']; ?></td>
                <td><?php echo $dp['password']; ?></td>
                <td align="center"><?php echo $dp['tempat']; ?></td>
                <td align="center"><?php echo $dp['lahir']; ?></td>
                <td align="center"><?php echo $dp['fakultas']; ?></td>
                <td align="center"><?php echo $dp['jurusan']; ?></td>
                <td align="center"><?php echo $dp['tahun']; ?></td>
                <td align="center"><?php echo $dp['alamat']; ?></td>
                <td align="center"><?php echo $dp['email']; ?></td>
            </tr>
            <?php 
             $no++;
             } ?>
        </tbody>
    </table>

    </section>
    <script>
        window.print();
    </script>
</body>
</html>