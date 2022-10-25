<?php 
include("../vendor/autoload.php");
use Libs\Databases\MySQL;
use Libs\Databases\PostTable;
use Libs\Databases\CategoryTable;

$categories = new CategoryTable(new MySQL);
$posts_category = $categories->GetCategoryAllData();
$table = new PostTable(new MySQL());
$posts = $table->getAllPosts();
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
     <h1 class="mt-4">Post List Dashboard</h1>
     <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item active">PostDashboard</li>
     </ol>
     <!-- display session alert -->
     <?php if(isset($_GET['success']) && $_GET['success'] == true){ ?>
     <div class="alert alert-success">
      <strong>Success!</strong> Post has been updated.
     </div>
     <?php } else if(isset($_GET['error']) && $_GET['error'] == true){ ?>
     <div class="alert alert-danger">
      <strong>Error!</strong> Post has not been updated.
     </div>
     <?php } ?>


     <div class="card mb-4">
      <div class="card-header">
       <i class="fas fa-table me-1"></i>
       Post List <span class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">+ Add
        Post</span>
      </div>
      <div class="card-body">
       <!-- add to datatable -->
       <table id="datatablesSimple">
        <thead>
         <tr>
          <th>ID</th>
          <th>Title</th>
          <th>Category</th>
          <th>Description</th>
          <th>Image</th>
          <th>Action</th>
         </tr>
        <tbody>
         <?php
          foreach ($posts as $post) :
          ?>
         <tr>
          <td><?= $post->id ?></td>
          <td><?= $post->title ?></td>
          <td><?= $post->category_id ?></td>
          <td><?= substr($post->description,0,50) ?></td>
          <td>
           <img src="../_actions/post_img/<?= $post->file_name; ?>" width="50px" height="70px" alt="">
          </td>
          <td>
           <a href="post_edit.php?id=<?= $post->id; ?>" class="btn btn-outline-primary">Edit</a>
           <a href="post_file_edit.php?id=<?= $post->id; ?>" class="btn btn-outline-primary">FileUpdate</a>
           <a href="post_detail.php?id=<?= $post->id; ?>" class="btn btn-outline-primary">Detail</a>
           <a href="../_actions/post_delete.php?id=<?= $post->id; ?>" class="btn btn-outline-danger">Delete</a>

          </td>
         </tr>
         <?php endforeach; ?>
        </tbody>
        </thead>
       </table>
      </div>
     </div>
     <!-- Modal -->
     <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
       <div class="modal-content">
        <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLabel">
          post Create</h5>
         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
         <form id="RegisterValidation" action="../_actions/create_post.php" method="post" enctype="multipart/form-data">
          <div class="card ">
           <div class="card-header card-header-rose card-header-icon">

            <h4 class="card-title">Post Form</h4>
           </div>
           <div class="card-body ">
            <div class="form-group">
             <label for="Category" class="bmd-label-floating"> Post Title</label>
             <input type="text" name="title" class="form-control" required="true">
            </div>
            <div class="form-group">
             <select name="category_id" class="selectpicker col-md-12" data-size="7"
              data-style="btn btn-primary btn-round" title="Single Select">
              <option disabled selected>Select Category</option>
              <?php 
            foreach($posts_category as $category) : ?>
              <option value="<?php echo $category->id; ?>"><?php echo $category->category_name; ?></option>
              <?php endforeach; ?>
             </select>
            </div>
            <div class="form-group">
             <textarea id="description" name="description" class="form-control "></textarea>
            </div>
            <div class="form-group">
             <div class="fileinput fileinput-new text-center" data-provides="fileinput">
              <div class="fileinput-new thumbnail">
               <img src="../assets/img/image_placeholder.jpg" alt="...">
              </div>
              <div class="fileinput-preview fileinput-exists thumbnail"></div>
              <div>
               <span class="btn btn-rose btn-round btn-file">
                <span class="fileinput-new">Select image</span>
                <span class="fileinput-exists">Change</span>
                <input type="file" name="file_name" />
               </span>
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