<?php
    $server = "localhost";
    $user = "root";
    $pass = "";
    $database = "spk_karyawan";

    $koneksi = mysqli_connect($server, $user, $pass, $database) or DIE ("koneksi gagal");

function nilaiVektorS($id_karyawan, $vektors, $id) {
    global $koneksi;

    $query = "SELECT * from perhitungan where id_karyawan='$id_karyawan' and id_dataset='$id'";
    $result = mysqli_query($koneksi, $query);

    if(!$result) {
        echo "error!";
        exit();
    }

    if($result->num_rows==0){
        $query = "INSERT INTO perhitungan values ('', $vektors, $id_karyawan, $id)";

    }else {
        $query = "UPDATE perhitungan set vektor_s = $vektors where id_karyawan='$id_karyawan' and id_dataset='$id'";
    }

    $result = mysqli_query($koneksi, $query);
    if(!$result) {
        echo "Gagal memasukkan data";
        exit();
    }
}

function nilaiVektorV($id_karyawan, $vektorv) {
    global $koneksi;

    $query = "SELECT * from vektor_v where id_karyawan='$id_karyawan'";
    $result = mysqli_query($koneksi, $query);

    if(!$result) {
        echo "error!";
        exit();
    }

    if($result->num_rows==0){
        $query = "INSERT INTO vektor_v values ('', $vektorv, $id_karyawan)";

    }else {
        $query = "UPDATE vektor_v set vektor_v = $vektorv where id_karyawan='$id_karyawan'";
    }

    $result = mysqli_query($koneksi, $query);
    if(!$result) {
        echo "Gagal memasukkan data";
        exit();
    }
}

//   $query2=mysqli_query($koneksi, "SELECT DISTINCT vektor_v, nama, Gelar from vektor_v LEFT JOIN data_karyawan USING (id_karyawan) where vektor_v.id_karyawan = data_karyawan.id_karyawan");
                    //   while($data2=mysqli_fetch_array($query2)) {
                    //   $no = 1;
                    //   $query=mysqli_query($koneksi, "SELECT vektor_v, nama, id_karyawan, Gelar from vektor_v LEFT JOIN data_karyawan USING (id_karyawan) where data_karyawan.tanggal_dataset='$id' and posisi_lamar='$id1' order by vektor_v desc");
                    
                    //   while($data=mysqli_fetch_array($query)) {
                    //     echo "<tr><td>$no </td>";
                    //     echo "<td>$data[nama] </td>";

                    //     echo "<td>$data[vektor_v] </td>";
                    //     $no++;
                        
                    //   }
                    //   break;
                    // }
