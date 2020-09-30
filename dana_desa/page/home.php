
<?php
$query = "SELECT COUNT(*) AS total FROM keluarga"; 
$result = mysqli_query($connection,$query); 
$values = mysqli_fetch_assoc($result); 
$num_rows1 = $values['total']; 

$query_bantuan = "SELECT COUNT(*) AS total FROM bantuan"; 
$result_bantuan = mysqli_query($connection,$query_bantuan); 
$values_bantuan = mysqli_fetch_assoc($result_bantuan); 
$num_rows_bantuan = $values_bantuan['total']; 

$query_hitung = "SELECT COUNT(*) AS total FROM hasil"; 
$result_hitung = mysqli_query($connection,$query_hitung); 
$values_hitung = mysqli_fetch_assoc($result_hitung); 
$num_rows_hitung = $values_hitung['total']; 

$query_akun = "SELECT COUNT(*) AS total FROM pengguna"; 
$result_akun = mysqli_query($connection,$query_akun); 
$values_akun = mysqli_fetch_assoc($result_akun); 
$num_rows_akun = $values_akun['total']; 


?>
<hr class="my-3"/>
  <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3><?=  $num_rows_bantuan ?></h3>

                  <p>Banyak Bantuan</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
				<a href="#" class="small-box-footer"></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3><?= $num_rows1 ?><sup style="font-size: 20px">%</sup></h3>

                  <p>Banyak Keluarga</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
				<a href="#" class="small-box-footer"></a>
              </div>
            </div>
            
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3><?= $num_rows_hitung  ?></h3>

                  <p>Hasil Perhitungan</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer"></a>
              </div>
            </div>
            <!-- ./col -->

			<!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3><?=  $num_rows_akun ?></h3>

                  <p>Total Akun</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
				<a href="#" class="small-box-footer"></a>
              </div>
            </div>
          </div>


	 <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Title</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
				 <p>
				  Metode SAW sering dikenal dengan istilah metode penjumlahan terbobot. 
		  Konsep dasar metode SAW (Simple Additive Weighting) adalah mencari
		   penjumlahan terbobot dari rating kinerja pada setiap alternatif pada semua atribut.
		    Metode SAW dapat membantu dalam pengambilan keputusan suatu kasus, akan tetapi perhitungan
			 dengan menggunakan metode SAW ini hanya yang menghasilkan nilai terbesar yang akan terpilih
			  sebagai alternatif yang terbaik. Perhitungan akan sesuai dengan metode ini apabila alternatif
			   yang terpilih memenuhi kriteria yang telah ditentukan. Metode SAW ini lebih efisien karena waktu
			    yang dibutuhkan dalam perhitungan lebih singkat. Metode SAW membutuhkan proses normalisasi matriks
				 keputusan (X) ke suatu skala yang dapat diperbandingkan dengan semua rating alternatif yang ada.
				 </p>
				 <p>http://join.if.uinsgd.ac.id/index.php/join/article/viewFile/v2i23/70</p>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          Footer
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->