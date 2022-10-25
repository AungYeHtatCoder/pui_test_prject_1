<?php 
// include("../vendor/autoload.php");
// use Helpers\Auth;
// $auth = Auth::check();
include("../vendor/autoload.php");
use Libs\Databases\MySQL;
use Libs\Databases\ProgramTable;
use Libs\Databases\SubjectTable;
use Libs\Databases\ClassTable;
?>
<?php include("includes/head.php"); ?>

<body class="sb-nav-fixed">
 <?php //include("includes/top_navbar.php"); ?>
 <div id="layoutSidenav">

  <?php include("includes/sidebar.php"); ?>

  <div id="layoutSidenav_content">
   <main>
    <div class="container-fluid px-4">
     <h1 class="mt-4">Student Profile Dashboard</h1>
     <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item active"><?= $auth->name ?></li>
     </ol>
     <?php //include("includes/top_card.php"); ?>
     <div class="card mb-4">
      <div class="card-header">
       <i class="fas fa-table me-1"></i>
       If you are a student, you must fill to complete your information.
       <span><a href="tr_info_index.php" class="btn btn-outline-warning">View Your Information</a></span>
       <span><a href="" class="btn btn-outline-primary float-end" data-bs-toggle="modal"
         data-bs-target="#exampleModal">Student Info
         Fill</a></span>
      </div>
      <div class="card-body">
       <!-- add to datatable -->
      </div>
      <div class="container">
       <div class="main-body">

        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="main-breadcrumb">
         <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item"><a href="javascript:void(0)">Student</a></li>
          <li class="breadcrumb-item active" aria-current="page">Student Profile</li>
         </ol>
        </nav>
        <!-- /Breadcrumb -->
        <?php 
        if(isset($_GET['success']))
        {
         echo '<div class="alert alert-success">
         <strong>Success!</strong> Profile has been updated.
         </div>';
        }
        ?>


        <div class="row gutters-sm">
         <div class="col-md-4 mb-3">
          <div class="card">
           <div class="card-body">
            <div class="d-flex flex-column align-items-center text-center">
             <img src="../_actions/photos/<?= $auth->photo ?>" alt="Admin" class="rounded-circle" width="150">
             <div class="mt-3">
              <h4><?= $auth->name ?></h4>
              <p class="text-muted font-size-sm"><?= $auth->address ?></p>
              <form action="../_actions/user_update.php" method="POST" enctype="multipart/form-data">
               <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                <input type="file" class="from-control" name="photo">
               </div>
               <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                <input type="submit" value="Update Profile" class="btn btn-primary">
               </div>
              </form>
             </div>
            </div>
           </div>
          </div>
         </div>
         <div class="col-md-8">
          <div class="card mb-3">
           <div class="card-body">
            <div class="row">
             <div class="col-sm-3">
              <h6 class="mb-0">Full Name</h6>
             </div>
             <div class="col-sm-9 text-secondary">
              <?= $auth->name ?>
             </div>
            </div>
            <hr>
            <div class="row">
             <div class="col-sm-3">
              <h6 class="mb-0">Email</h6>
             </div>
             <div class="col-sm-9 text-secondary">
              <?= $auth->email ?>
             </div>
            </div>
            <hr>
            <div class="row">
             <div class="col-sm-3">
              <h6 class="mb-0">Phone</h6>
             </div>
             <div class="col-sm-9 text-secondary">
              <?= $auth->phone ?>
             </div>
            </div>
            <hr>

            <hr>
            <div class="row">
             <div class="col-sm-3">
              <h6 class="mb-0">Address</h6>
             </div>
             <div class="col-sm-9 text-secondary">
              <?= $auth->address ?>
             </div>
            </div>
            <hr>
            <div class="row">

             <div class="row mt-3">
              <div class="col-sm-3">
               <h6 class="mb-0 badge bg-secondary">Change Password</h6>
              </div>
              <div class="col-sm-9 text-secondary">
               <form action="../_actions/change_pw.php" method="POST">
                <div class="mb-3">
                 <label for="exampleInputEmail1" class="form-label">Email address</label>
                 <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                  aria-describedby="emailHelp" value="<?php echo $auth->email; ?>">
                 <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                 <label for="exampleInputPassword1" class="form-label">Password</label>
                 <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                  value="<?php //echo $auth->password; ?>" placeholder="Enter Your Change Password">
                </div>
                <div class="mb-3">
                 <input type="submit" class="btn btn-primary" value="Update Password">
                </div>
               </form>
              </div>
             </div>
            </div>
           </div>
          </div>
         </div>
        </div>
       </div>
      </div>
     </div>
     <!-- tr info modal start  -->


     <!-- Modal -->
     <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
       <div class="modal-content">
        <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
         <form action="../_actions/student_info_create.php" method="POST" enctype="multipart/form-data">
          <div class="mb-3">
           <label for="TeacherName" class="form-label">StudentName</label>
           <input type="text" name="student_name" class="form-control" placeholder="Enter Your Name" require>
          </div>
          <div class="mb-3">
           <label for="Father" class="form-label">Fahter Name</label>
           <input type="text" name="father_name" class="form-control" placeholder="Enter Your Father Name">
          </div>
          <div class="mb-3">
           <label for="mother name" class="form-label">Mother Name</label>
           <input type="text" name="mother_name" class="form-control" placeholder="Enter Your Mother Name">
          </div>
          <div class="mb-3">
           <label for="Father" class="form-label">Fahter ID Card No</label>
           <input type="text" name="father_id_card_no" class="form-control" placeholder="Enter Your Father ID Card No">
          </div>
          <div class="mb-3">
           <label for="mother name" class="form-label">Mother ID Card No</label>
           <input type="text" name="mother_id_card_no" class="form-control" placeholder="Enter Your Mother ID Card No">
          </div>
          <div class="mb-3">
           <label for="mother name" class="form-label">Phone</label>
           <input type="text" name="phone" class="form-control" placeholder="Enter Your Phone No">
          </div>
          <div class="form-floating">
           <textarea name="address" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2"
            style="height: 100px"></textarea>
           <label for="floatingTextarea2">Address</label>
          </div>

          <div class="mb-3">
           <label for="mother name" class="form-label">Academic Year</label>
           <input type="text" name="academic_year" class="form-control" placeholder="Enter Your Academic Year">
          </div>
          <select name="class_id" class="form-select mt-3" aria-label="Default select example">
           <option selected>Open this select Your Class</option>
           <?php  
            $table = new ClassTable(new MySQL());
            $class_data = $table->GetClassAllData();
            foreach($class_data as $class) :
            ?>
           <option value="<?= $class->id ?>"><?= $class->class_name; ?></option>
           <?php endforeach; ?>
          </select>
          <div class="mb-3">
           <input type="file" name="attach_file" class="form-control">
          </div>

          <input type="hidden" name="user_id" value="<?= $auth->id; ?>">
          <div class="modal-footer">
           <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
           <button type="submit" class="btn btn-primary">Update Student Info</button>
          </div>
         </form>
        </div>

       </div>
      </div>
     </div>
     <!-- tr info modal end -->
   </main>
   <?php include("includes/footer.php"); ?>