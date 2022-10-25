<?php 
include("../vendor/autoload.php");
use Libs\Databases\MySQL;
use Libs\Databases\PostTable;
use Libs\Databases\CategoryTable;

$categories = new CategoryTable(new MySQL);
$posts_category = $categories->GetCategoryAllData();
$table = new PostTable(new MySQL());
$id = $_GET['id'];
$posts = $table->getPostById($id);
// echo "<pre>";
// print_r($posts);
// echo "</pre>";

include("includes/head.php"); ?>
<?php include("includes/extra_head.php"); ?>


<body class="sb-nav-fixed">
 <?php //include("includes/top_navbar.php"); ?>
 <div id="layoutSidenav">

  <?php include("includes/sidebar.php"); ?>

  <div id="layoutSidenav_content">
   <main>
    <div class="container-fluid px-4">
     <h1 class="mt-4">Post Update Dashboard</h1>
     <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item active">Post Update Dashboard</li>
     </ol>
     <!-- display session alert -->



     <div class="card mb-4">
      <div class="card-header">
       <i class="fas fa-table me-1"></i>
       Post Edit <span><a href="post_index.php" class="btn btn-primary">Back</a></span>
      </div>
      <div class="card-body">
       <!-- add to datatable -->
       <form id="RegisterValidation" action="../_actions/post_update.php" method="post" enctype="multipart/form-data">
        <div class="card ">
         <div class="card-header card-header-rose card-header-icon">

          <h4 class="card-title">Post Edit Form</h4>
         </div>
         <div class="card-body ">
          <input type="hidden" name="id" value="<?= $id ?>">
          <div class="form-group">
           <label for="Category" class="bmd-label-floating"> Post Title</label>
           <input type="text" name="title" class="form-control" required="true" value="<?= $posts->title; ?>">
          </div>
          <div class="form-group">
           <select name="category_id" class="selectpicker col-md-12" data-size="7"
            data-style="btn btn-primary btn-round" title="Single Select">
            <option disabled selected>Select Category</option>
            <?php 
            foreach($posts_category as $category) : ?>
            <option value="<?php echo $category->id; ?>" selected><?php echo $category->category_name; ?></option>
            <?php endforeach; ?>
           </select>
          </div>
          <div class="form-group">
           <textarea id="description" name="description" class="form-control "><?= $posts->description; ?></textarea>
          </div>
          <div class="form-group">
           <div class="fileinput fileinput-new text-center" data-provides="fileinput">
            <div class="fileinput-new thumbnail">
             <img src="../_actions/post_img/<?= $posts->file_name?>" selected alt="...">
            </div>
            <div class="fileinput-preview fileinput-exists thumbnail"></div>
            <div>
             <span class="btn btn-rose btn-round btn-file">
              <span class="fileinput-new">Select image</span>
              <span class="fileinput-exists">Change</span>
              <?php 
              // if select image then show image
              if ($posts->file_name) {
               echo "<input type='file' name='file_name' value='$posts->file_name' />";
              } else {
               echo "<input type='file' name='old_file' />";
              }
              // return to old image if not select image


              ?>
             </span>

             <!-- <input type="file" name="file_name"/>
             </span> -->
             <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i
               class="fa fa-times"></i> Remove</a>
            </div>
           </div>
           <input type="hidden" name="user_id" value="<?= $auth->id; ?>">
          </div>
         </div>
         <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <input type="submit" value="New Create Post" class="btn btn-primary">
         </div>
        </div>
       </form>
      </div>
     </div>

    </div>
   </main>
   <?php include("includes/footer.php"); ?>


   <?php include("includes/extra_js.php"); ?>


   <script>
   $(function() {
    CKEDITOR.replace('description');
    $(".textarea");
   });
   </script>
   <script>
   // replace existing image with new image
   $(document).ready(function() {
    $('.fileinput').on('change.bs.fileinput', function(e) {
     var file = e.target.files[0];
     var reader = new FileReader();
     reader.onload = function(e) {
      $('.fileinput-preview').attr('src', e.target.result);
     }
     reader.readAsDataURL(file);
    });
   });
   </script>