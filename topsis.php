<?php

class topsis
{   
    public $alternatif = array();
    public $kriteria = array();

    public function __construct(){
        require 'koneksi.php';
        $kriteria = mysqli_query($koneksi, "SELECT * FROM kriteria");
        

        while ($row = $kriteria->fetch_assoc()) {
        //data kriteria
        array_push($this->kriteria, array($row['kode'], $row['nama_kriteria'], $row['bobot'], $row['atribut']));

        }
        
        $query=mysqli_query($koneksi, "SELECT DISTINCT nilai.id_karyawan from nilai, data_karyawan where nilai.id_karyawan = data_karyawan.id_karyawan order by kode asc");
            $no =0;             
            while($data = mysqli_fetch_array($query)) {
                $query2 = mysqli_query($koneksi, "SELECT DISTINCT nama from nilai, data_karyawan where nilai.id_karyawan = data_karyawan.id_karyawan and nilai.id_karyawan = '$data[id_karyawan]'");


                $alternatif = mysqli_query($koneksi, "SELECT * from nilai where nilai.id_karyawan='$data[id_karyawan]' and nilai.id_kriteria='[id_kriteria]'");
                //data alternatif
                while ($row=$alternatif->fetch_assoc()) {
                array_push($this->alternatif, array($row['nilai[]'], $row['id_kriteria'], $row['id_karyawan']));
            }
        
         
        }
        $this->pembagi();
        $this->normalisasi();
        $this->bobot();
        $this->atribut();
        $this->normxbobot();
        $this->cmin();
        $this->cmax();
        $this->ymaxmin();
        $this->dplusmin();
    }   

        public function pembagi() 
        {
            $this->pembagi = array(0,0,0,0,0,0);
            foreach($this->alternatif as $a) 
            {
                for ($i=0; $i<count($this->kriteria); $i++) 
                {
                    $this->pembagi[$i] += pow((int)$a[$i+1], 2);
                }
            }
            for ($i=0; $i<count($this->pembagi); $i++) {
                $this->pembagi[$i] = round(sqrt($this->pembagi[$i]), 3);
            }
        }
        public function normalisasi()
        {
            $this->normalisasi = array();
            foreach($this->alternatif as $a) {
                for($i=2; $i<count($this->pembagi); $i++) {
                    $a[$i+1] = (int)$a[$i+1]/$this->pembagi[$i];
                    $a[$i+1] = round($a[$i+1], 3);
                }
                array_push($this->normalisasi,$a);
            }      
        }

        public function bobot()
        {
            $this->bobot = array();
            foreach($this->kriteria as $k) {
                array_push($this->bobot, $k[2]);
            }
        }

        public function atribut()
        {
            $this->atribut = array();
            foreach($this->kriteria as $k) {
                array_push($this->atribut, $k[3]);
            }
        }

        public function normxbobot() {
            $this->normxbobot = array();
            foreach($this->normalisasi as $n) {
                for($i=1;$i<count($this->bobot);$i++) {
                    (int)$n[$i+1] = round((float)$n[$i+1] * $this->bobot[$i], 3);
                }
                array_push($this->normxbobot, $n);
            }
        }
        public function cmin() {
            $this->cmin = array(10,10,10,10,10,10);
            foreach($this->normxbobot as $nb) {
                if($this->cmin[2] > $nb[3]) $this->cmin[2] = $nb[3];
                if($this->cmin[3] > $nb[4]) $this->cmin[3] = $nb[4];
                if($this->cmin[4] > $nb[5]) $this->cmin[4] = $nb[5];
                if($this->cmin[5] > $nb[6]) $this->cmin[5] = $nb[6];
            }
        }
        public function cmax() {
            $this->cmax = array(0,0,0,0,0,0);
            foreach($this->normxbobot as $nb) {
                if($this->cmax[2] < $nb[3]) $this->cmax[2] = $nb[3];
                if($this->cmax[3] < $nb[4]) $this->cmax[3] = $nb[4];
                if($this->cmax[4] < $nb[5]) $this->cmax[4] = $nb[5];
                if($this->cmax[5] < $nb[6]) $this->cmax[5] = $nb[6];
            }
        }
        public function ymaxmin() {
            $this->ymax = array();
            $this->ymin = array();

            for($i=0;$i<count($this->atribut);$i++) {
                if($this->atribut[$i] == 'Benefit')
                {
                    array_push($this->ymax, $this->cmax[$i]);
                    array_push($this->ymin, $this->cmin[$i]);
                }
                else if ($this->atribut[$i] == 'Cost') 
                {
                    array_push($this->ymax, $this->cmin[$i]);
                    array_push($this->ymin, $this->cmax[$i]);
                }
            }
        }
        public function dplusmin() {
            $this->dplusmin = array();
            foreach($this->normxbobot as $nb) 
            {
                $this->dplus = 0;
                $this->dmin = 0;
                for($i=1;$i<count($this->ymax);$i++) {
                    $this->dplus += pow($this->ymax[$i] - $nb[$i+2], 2);
                    $this->dmin += pow($nb[$i+2] - $this->ymin[$i], 2);
                }
                $nb[7] = round(sqrt($this->dplus), 4);
                $nb[8] = round(sqrt($this->dmin), 4);
                array_push($this->dplusmin, $nb);
            }
        }
}

<section>
        <div class="container py-4 px-5">
          <div class="row g-0">
            <div class="col-6 col-md-4 text-end">
            </div>
          </div>
          <div class="row g-0"> Bidan </div>
          <table class="table table-striped">
            <thead>
              <tr>
                <th class="col-lg-1">No</th>
                <th class="col-lg-3">Nama</th>
                <th class="col-lg-2">Gelar</th>
               <th class="col-lg-1"> Nilai Vi </th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    $query2=mysqli_query($koneksi, "SELECT DISTINCT vektor_v, nama, Gelar from vektor_v LEFT JOIN data_karyawan USING (id_karyawan) where vektor_v.id_karyawan = data_karyawan.id_karyawan");
                    while($data2=mysqli_fetch_array($query2)) {
                    $no = 1;
                    $query=mysqli_query($koneksi, "SELECT DIStinct vektor_v, nama, Gelar from vektor_v LEFT JOIN data_karyawan USING (id_karyawan) where data_karyawan.tanggal_dataset='$id' and (Gelar='S.Tr.Keb.' or Gelar='A.Md.Keb.') order by vektor_v desc");
                  
                    while($data=mysqli_fetch_array($query)) {
                      echo "<tr><td>$no </td>";
                      echo "<td>$data[nama] </td>";
                      echo "<td>$data[Gelar] </td>";
                      echo "<td>$data[vektor_v] </td>";
                      $no++;
                      
                    }
                    break;
                  }
                  
                      
                      ?>
            </tbody>
          </table>
          <a class="btn btn-dark" href="cetakHasil.php" role="button" target="_blank"> Cetak </a>
        </div>
    </section>
    <section>
        <div class="container py-4 px-5">
          <div class="row g-0">
            <div class="col-6 col-md-4 text-end">
            </div>
          </div>
          <div class="row g-0"> Kesehatan Lingkungan </div>
          <table class="table table-striped">
            <thead>
              <tr>
                <th class="col-lg-1">No</th>
                <th class="col-lg-3">Nama</th>
                <th class="col-lg-2">Gelar</th>
               <th class="col-lg-1"> Nilai Vi </th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                      $query2=mysqli_query($koneksi, "SELECT DISTINCT vektor_v, nama, Gelar from vektor_v LEFT JOIN data_karyawan USING (id_karyawan) where vektor_v.id_karyawan = data_karyawan.id_karyawan");
                      while($data2=mysqli_fetch_array($query2)) {
                      $no = 1;
                      $query=mysqli_query($koneksi, "SELECT vektor_v, nama, id_karyawan, Gelar from vektor_v LEFT JOIN data_karyawan USING (id_karyawan) where data_karyawan.tanggal_dataset='$id' and Gelar='S.K.M.' order by vektor_v desc");
                    
                      while($data=mysqli_fetch_array($query)) {
                        echo "<tr><td>$no </td>";
                        echo "<td>$data[nama] </td>";
                        echo "<td>$data[Gelar] </td>";
                        echo "<td>$data[vektor_v] </td>";
                        $no++;
                        
                      }
                      break;
                    }
                      ?>
            </tbody>
          </table>
          <a class="btn btn-dark" href="cetakHasil.php" role="button" target="_blank"> Cetak </a>
        </div>
    </section>
    <section>
        <div class="container py-4 px-5">
          <div class="row g-0">
            <div class="col-6 col-md-4 text-end">
            </div>
          </div>
          <div class="row g-0"> Hukum </div>
          <table class="table table-striped">
            <thead>
              <tr>
                <th class="col-lg-1">No</th>
                <th class="col-lg-3">Nama</th>
                <th class="col-lg-2">Gelar</th>
               <th class="col-lg-1"> Nilai Vi </th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                      $query2=mysqli_query($koneksi, "SELECT DISTINCT vektor_v, nama, Gelar from vektor_v LEFT JOIN data_karyawan USING (id_karyawan) where vektor_v.id_karyawan = data_karyawan.id_karyawan");
                      while($data2=mysqli_fetch_array($query2)) {
                      $no = 1;
                      $query=mysqli_query($koneksi, "SELECT vektor_v, nama, id_karyawan, Gelar from vektor_v LEFT JOIN data_karyawan USING (id_karyawan) where data_karyawan.tanggal_dataset='$id' and Gelar='S.H.' order by vektor_v desc");
                    
                      while($data=mysqli_fetch_array($query)) {
                        echo "<tr><td>$no </td>";
                        echo "<td>$data[nama] </td>";
                        echo "<td>$data[Gelar] </td>";
                        echo "<td>$data[vektor_v] </td>";
                        $no++;
                        
                      }
                      break;
                    }
                      ?>
            </tbody>
          </table>
          <a class="btn btn-dark" href="cetakHasil.php" role="button" target="_blank"> Cetak </a>
        </div>
    </section>