<?php 
include("../vendor/autoload.php");
use Helpers\Auth;
$auth = Auth::check();
?>

<?php include("top_navbar.php") ?>
<div id="layoutSidenav_nav">
 <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
  <div class="sb-sidenav-menu">
   <div class="nav">
    <div class="sb-sidenav-menu-heading">Core</div>
    <a class="nav-link" href="../index.php">
     <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
     Back To User
    </a>
    <div class="sb-sidenav-menu-heading">Interface</div>
    <?php if($auth->value == '3'){ ?>
    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts"
     aria-expanded="false" aria-controls="collapseLayouts">
     <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
     User Management
     <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
    </a>
    <?php } ?>
    <?php if($auth->value == '3'){ ?>
    <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
     <nav class="sb-sidenav-menu-nested nav">
      <a class="nav-link" href="user_index.php">User</a>
      <a class="nav-link" href="role_index.php">Role</a>

     </nav>
    </div>
    <?php } ?>
    <!-- post managemet start -->
    <?php if($auth->value == '3'){ ?>
    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts_post"
     aria-expanded="false" aria-controls="collapseLayouts_post">
     <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
     Post Management
     <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
    </a>
    <?php } ?>
    <?php if($auth->value == '3'){ ?>
    <div class="collapse" id="collapseLayouts_post" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
     <nav class="sb-sidenav-menu-nested nav">
      <a class="nav-link" href="category_index.php">Post Category</a>
      <a class="nav-link" href="post_index.php">Post</a>

     </nav>
    </div>
    <?php } ?>
    <!-- post namagement end -->
    <?php if($auth->value == '3'){ ?>
    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts"
     aria-expanded="false" aria-controls="collapseLayouts">
     <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
     Student Management
     <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
    </a>
    <?php } ?>
    <?php if($auth->value == '3'){ ?>
    <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
     <nav class="sb-sidenav-menu-nested nav">
      <a class="nav-link" href="st_index.php">Student List</a>
      <a class="nav-link" href="kg_st_info_index.php">KG Student List</a>
      <a class="nav-link" href="role_index.php">Role</a>
     </nav>
    </div>
    <?php } ?>

    <?php //if($auth->value == '3'){ ?>
    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages"
     aria-expanded="false" aria-controls="collapsePages">
     <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
     Schoole Management
     <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
    </a>
    <?php //} ?>
    <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
     <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
      <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth"
       aria-expanded="false" aria-controls="pagesCollapseAuth">
       School
       <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
      </a>
      <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
       <nav class="sb-sidenav-menu-nested nav">
        <a class="nav-link" href="program_index.php">Programm</a>
        <a class="nav-link" href="class_index.php">Classes</a>
        <a class="nav-link" href="subject_index.php">Subject</a>
        <a class="nav-link" href="tr_index.php">Teacher List</a>
        <a class="nav-link" href="tr_info_index.php">TR Info</a>
        <a class="nav-link" href="tr_video_lesson_index.php">Video Lesson</a>
       </nav>

      </div>

      <?php if($auth->value == '3'){ ?>
      <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapse_Error"
       aria-expanded="false" aria-controls="pagesCollapseError">
       Primary Department TR
       <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
      </a>
      <?php } ?>
      <div class="collapse" id="pagesCollapse_Error" aria-labelledby="headingOne"
       data-bs-parent="#sidenavAccordionPages">
       <nav class="sb-sidenav-menu-nested nav">
        <a class="nav-link" href="kg_tr_index.php">KG Teacher</a>
        <a class="nav-link" href="404.html">404 Page</a>
        <a class="nav-link" href="500.html">500 Page</a>
       </nav>
      </div>
      <?php if($auth->value == '3'){ ?>
      <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError"
       aria-expanded="false" aria-controls="pagesCollapseError">
       Exam Result
       <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
      </a>
      <?php } ?>
      <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne"
       data-bs-parent="#sidenavAccordionPages">
       <nav class="sb-sidenav-menu-nested nav">
        <a class="nav-link" href="exam_name_index.php">Exam Name</a>
        <a class="nav-link" href="exam_result_index.php">KG Exam Result</a>
        <a class="nav-link" href="404.html">404 Page</a>
        <a class="nav-link" href="500.html">500 Page</a>
       </nav>
      </div>
     </nav>
    </div>
    <div class="sb-sidenav-menu-heading">Addons</div>
    <a class="nav-link" href="charts.html">
     <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
     Charts
    </a>
    <a class="nav-link" href="tables.html">
     <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
     Tables
    </a>
   </div>
  </div>
  <div class="sb-sidenav-footer">
   <div class="small">Logged in as:</div>
   Start Bootstrap
  </div>
 </nav>
</div>