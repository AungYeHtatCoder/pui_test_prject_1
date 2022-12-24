<?php 
include("../vendor/autoload.php");
use Libs\Databases\MySQL;
use Libs\Databases\UsersTable;
use Libs\Databases\TrInfoTable;
use Libs\Databases\StudentTable;
$student_table = new StudentTable(new MySQL());
$students = $student_table->GetAllStudentData();

$table = new TrInfoTable(new MySQL());
$users = $table->GetTrInfoAllData();

$user_table = new UsersTable(new MySQL());
$user_count = $user_table->UserAllData();

?>
<?php include("includes/head.php"); ?>

<body class="sb-nav-fixed">
 <?php include("includes/top_navbar.php"); ?>
 <div id="layoutSidenav">
  <div id="layoutSidenav_nav">
   <?php include("includes/sidebar.php"); ?>
  </div>
  <div id="layoutSidenav_content">
   <main>
    <div class="container-fluid px-4">
     <h1 class="mt-4">Dashboard</h1>
     <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item active">Dashboard</li>

     </ol>

     <!-- top card start  -->
     <div class="row">
     </div>
     <!-- top card end -->
     <div class="card mb-4">
      <div class="card-header">
       <i class="fas fa-table me-1"></i>
       Examination Result Line Chart
      </div>
      <div class="card-body">
       <!-- add to datatable -->
       <div id="chart-container">
        <canvas id="graphCanvas"></canvas>
       </div>
      </div>
     </div>
    </div>
   </main>
   <?php include("includes/footer.php"); ?>
   <script src="chart_js/jquery.min.js"></script>
   <script src="chart_js/Chart.min.js"></script>

   <script>
   $(document).ready(function() {
    showGraph();
   });

   // line chart
   function showGraph() {
    {
     $.post("../_actions/exam_result_chart_js_test.php",
      function(data) {
       console.log(data);
       var name = [];
       var marks = [];

       for (var i in data) {
        name.push(data[i].student_name);
        marks.push(data[i].total);
       }

       var chartdata = {
        labels: name,
        datasets: [{
         fill: false,
         label: 'Examination Result',
         backgroundColor: '#49e2ff',
         borderColor: '#46d5f1',
         borderColor: 'rgb(75, 192, 192)',
         tension: 0.1,
         hoverBackgroundColor: '#CCCCCC',
         hoverBorderColor: '#666666',
         data: marks
        }]
       };

       var graphTarget = $("#graphCanvas");

       var barGraph = new Chart(graphTarget, {
        type: 'line',
        data: chartdata
       });
      });
    }
   }
   </script>