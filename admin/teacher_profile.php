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
     <h1 class="mt-4">Teacher Profile Dashboard</h1>
     <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item active"><?= $auth->name ?></li>
     </ol>
     <?php //include("includes/top_card.php"); ?>
     <div class="card mb-4">
      <div class="card-header">
       <i class="fas fa-table me-1"></i>
       If you are a teacher, you must fill to complete your information.
       <span><a href="tr_info_index.php" class="btn btn-outline-warning">View Your Information</a></span>
       <span><a href="" class="btn btn-outline-primary float-end" data-bs-toggle="modal"
         data-bs-target="#exampleModal">Teacher Info
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
          <li class="breadcrumb-item"><a href="javascript:void(0)">Teacher</a></li>
          <li class="breadcrumb-item active" aria-current="page">Teacher Profile</li>
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
         <!-- video lesson upload start -->

         <!-- video lesson upload end -->
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
        <!-- lesson video upload start -->
        <div class="col-md-4 mb-3">
         <div class="card">
          <div class="card-header">
           <h1>Upload New Lesson For Your Students </h1>
          </div>
          <div class="card-body">
           <div class="d-flex flex-column align-items-center text-center">
            <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#upload_lesson">Upload Lesson </a>
            <div class="mt-3">
             <!-- Modal -->
             <div class="modal fade" id="upload_lesson" tabindex="-1" aria-labelledby="exampleModalLabel"
              aria-hidden="true">
              <div class="modal-dialog">
               <div class="modal-content">
                <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Upload New Lesson Video</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                 <form action="tr_upload_lesson_video_create.php" method="POST" enctype="multipart/form-data"
                  id="form-data">
                  <div class="mb-3">
                   <label for="teacher name" class="form-label">Lesson Title</label>
                   <input type="text" name="title" class="form-control" id="title">
                  </div>
                  <select name="program_id" class="form-select mt-3" aria-label="Default select example"
                   id="program_id">
                   <option selected>Open this select program</option>
                   <?php 
           $table = new ProgramTable(new MySQL());
            $programs = $table->GetProgramAllData();
            foreach ($programs as $program) :
           ?>
                   <option value="<?= $program->id ?>"><?= $program->program_name; ?></option>
                   <?php endforeach; ?>
                  </select>

                  <select name="class_id" class="form-select mt-3" aria-label="Default select example" id="class_id">
                   <option selected>Open this select class</option>
                   <?php
            $table = new ClassTable(new MySQL());
            $classes = $table->GetClassAllData();
            foreach ($classes as $class) :
            ?>
                   <option value="<?= $class->id ?>"><?= $class->class_name ?></option>
                   <?php endforeach; ?>
                  </select>

                  <select name="subject_id" id="subject_id" class="form-select mt-3"
                   aria-label="Default select example">
                   <option selected>Open this select subject</option>
                   <?php
              $table = new SubjectTable(new MySQL());
              $subjects = $table->GetSubjectAllData();
              foreach ($subjects as $subject) :
              ?>
                   <option value="<?= $subject->id ?>"><?= $subject->subject_name ?></option>
                   <?php endforeach; ?>
                  </select>
                  <div class="mb-3">
                   <label for="Description">Description</label>
                   <textarea id="description" name="description" class="form-control" id="" cols="30"
                    rows="10"></textarea>
                  </div>
                  <div class="mb-3">
                   <label for="Academic_Year" class="form-label">Acdeemic_Year</label>
                   <input type="text" name="academic_year" class="form-control" id="exampleInputPassword1"
                    id="academic_year">
                  </div>
                  <div class="mb-3">
                   <label for="exampleInputPassword1" class="form-label">Video</label>
                   <input type="file" name="file_name" class="form-control" id="file_name">
                  </div>
                  <input type="hidden" name="user_id" value="<?= $auth->id; ?>" id="user_id">
                  <div class="modal-footer">
                   <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                   <input type="submit" class="btn btn-primary" value="Upload New Video Lesson">
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
        <!-- lesson video upload end -->
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
         <form action="../_actions/tr_info_create.php" method="POST">
          <div class="mb-3">
           <label for="teacher name" class="form-label">Teacher Name</label>
           <input type="text" name="tr_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          </div>
          <div class="mb-3">
           <label for="phone" class="form-label">Phone</label>
           <input type="text" name="phone" class="form-control" id="exampleInputPassword1">
          </div>
          <div class="mb-3">
           <label for="phone" class="form-label">Secondary Phone</label>
           <input type="text" name="secondary_phone" class="form-control" id="exampleInputPassword1">
          </div>

          <div class="mb-3">
           <label for="adress" class="form-label">Adress</label>
           <input type="text" name="address" class="form-control" id="exampleInputPassword1">
          </div>
          <div class="mb-3">
           <label for="FixedAddress" class="form-label">FixedAddress</label>
           <input type="text" name="fix_address" class="form-control" id="exampleInputPassword1">
          </div>
          <div class="mb-3">
           <label for="experience" class="form-label">Experience</label>
           <input type="text" name="experience" class="form-control" id="exampleInputPassword1">
          </div>
          <div class="mb-3">
           <label for="Academic_Year" class="form-label">Acdeemic_Year</label>
           <input type="text" name="academic_year" class="form-control" id="exampleInputPassword1">
          </div>
          <select name="program_id" class="form-select mt-3" aria-label="Default select example">
           <option selected>Open this select program</option>
           <?php 
           $table = new ProgramTable(new MySQL());
            $programs = $table->GetProgramAllData();
            foreach ($programs as $program) :
           ?>
           <option value="<?= $program->id ?>"><?= $program->program_name; ?></option>
           <?php endforeach; ?>
          </select>

          <select name="class_id" class="form-select mt-3" aria-label="Default select example">
           <option selected>Open this select class</option>
           <?php
            $table = new ClassTable(new MySQL());
            $classes = $table->GetClassAllData();
            foreach ($classes as $class) :
            ?>
           <option value="<?= $class->id ?>"><?= $class->class_name ?></option>
           <?php endforeach; ?>
          </select>

          <select name="subject_id" class="form-select mt-3" aria-label="Default select example">
           <option selected>Open this select subject</option>
           <?php
              $table = new SubjectTable(new MySQL());
              $subjects = $table->GetSubjectAllData();
              foreach ($subjects as $subject) :
              ?>
           <option value="<?= $subject->id ?>"><?= $subject->subject_name ?></option>
           <?php endforeach; ?>
          </select>
          <input type="hidden" name="user_id" value="<?= $auth->id; ?>">
          <div class="modal-footer">
           <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
           <button type="submit" class="btn btn-primary">Update Tr Info</button>
          </div>
         </form>
        </div>

       </div>
      </div>
     </div>
     <!-- tr info modal end -->
   </main>
   <?php include("includes/footer.php"); ?>

   <script>
   // tr video upload 
   // ajax request
   //  $(document).ready(function() {
   //   $('#form-data').on('submit', function(e) {
   //    e.preventDefault();
   //    $.ajax({
   //     url: "../_actions/tr_upload_lesson_video_create.php",
   //     type: "POST",
   //     data: new FormData(this),
   //     contentType: false,
   //     cache: false,
   //     processData: false,
   //     success: function(data) {
   //      $('#form-data')[0].reset();
   //      $('#upload_lesson').modal('hide');
   //      $('#video_table').html(data);
   //     }
   //    });
   //   });
   //  });
   </script>