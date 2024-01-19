<head>
    <script type="text/javascript" src="chartjs/Chart.bundle.min.js"></script>
    <title></title>
</head>
 
<body>
 
<?php
    $tahun=date("Y");
    $sql1 = "SELECT * FROM net_flow, alternatif WHERE net_flow.id_alternatif=alternatif.id_alternatif";
    $data = mysqli_query($koneksi, $sql1);
    //$b1 = mysqli_fetch_array($data);
    
?>
 
<div style="height: 75%; width: 75%;">
    <canvas id="myChart" class="chart"></canvas>
</div>
 
<script>
var ctx = document.getElementById("myChart").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'line',        //Tipe tampilan grafik, sobat bisa menggunakan tampilan bar, pie, line, radar dan sebagainya
    data: {
        labels: [<?php while($b = mysqli_fetch_array($data)) { 
        
        

        echo '"' . $b['nama_alternatif'] . '",'; } ?>], //keterangan nama-nama label
        datasets: [{
            label: 'GRAFIK HASIL PERHITUNGAN METODE PROMETHEE', //Judul Grafik
            data: [<?php 
            $sql2 = "SELECT * FROM net_flow";
            $data2 = mysqli_query($koneksi,$sql2);
            while($b2=mysqli_fetch_array($data2)){
            $sql3 = "SELECT nilai_nf FROM net_flow WHERE id_nf='$b2[id_nf]'";
            $data3 = mysqli_query($koneksi, $sql3);
            while($a = mysqli_fetch_array($data3)) { echo $a['nilai_nf'] . ', '; }} ?>], //Data Grafik
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)', //Warna Background Data Grafik
                'rgba(54, 162, 235, 0.2)', //Warna Background Data Grafik
                'rgba(255, 206, 86, 0.2)', //Warna Background Data Grafik
                'rgba(75, 192, 192, 0.2)', //Warna Background Data Grafik
                'rgba(153, 102, 255, 0.2)', //Warna Background Data Grafik
                'rgba(255, 159, 64, 0.2)' //Warna Background Data Grafik
            ],
            borderColor: [
                'rgba(255,99,132,1)', //Warna Garis Data Grafik
                'rgba(54, 162, 235, 1)', //Warna Garis Data Grafik
                'rgba(255, 206, 86, 1)', //Warna Garis Data Grafik
                'rgba(75, 192, 192, 1)', //Warna Garis Data Grafik
                'rgba(153, 102, 255, 1)', //Warna Garis Data Grafik
                'rgba(255, 159, 64, 1)' //Warna Garis Data Grafik
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
</script>
 
 
</body>
</html>