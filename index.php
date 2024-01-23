<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Chart.js + php et sql</title>
     <link rel="stylesheet" href="style.css">
     <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

     <script src="chart.js/Chart.js"></script>

</head>
<body>
    
<div>
     <canvas id="myChart"></canvas>
</div>
     
<?php 

     // connexion avec la base de données

     $con = mysqli_connect("localhost","root","root","chartjs_graphe");

     // varifications de la connexion

     if(!$con) {
          echo "erreur";
     }

     // requete pour afficher les mois et les nombres

     $req = mysqli_query($con, "SELECT nombres, mois FROM infos");

     // boucler pour mettre

     foreach($req as $data) {
          $mois[] = $data['mois'];
          $nombres[] = $data['nombres'];
     }

     // var_dump($nombres);
     // var_dump($mois);

?>
      
<script>
    const ctx = document.getElementById('myChart');
  
    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: <?php echo json_encode($mois)?>,
        datasets: [{
          label: '# of Votes',
          data: <?php echo json_encode($nombres)?>,
          backgroundColor: ['red','gray','yellow','green','orange'],
          borderWidth: 3
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        },
        
      }
    });

</script>

<!-- Chart.js fichiers js -->

<script src="chart.js/demo/chart-area-demo.js"></script>
<script src="chart.js/demo/chart-pie-demo.js"></script>
<script src="chart.js/demo/chart-bar-demo.js  "></script>

</body>
</html>