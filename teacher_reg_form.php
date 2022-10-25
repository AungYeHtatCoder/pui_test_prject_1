<?php include("layouts/head.php"); ?>

<body>
 <!-- Responsive navbar-->
 <?php include("layouts/navbar.php"); ?>
 <!-- Page header with logo and tagline-->
 <?php include("layouts/header.php"); ?>
 <!-- Page content-->
 <div class="container">
  <div class="row">
   <!-- Blog entries-->
   <div class="col-lg-8">
    <!-- Featured blog post-->
    <h1>Teacher Register Page</h1>
    <!-- Nested row for non-featured blog posts-->
    <form action="_actions/teacher_reg_process.php" method="POST">
     <div class="mb-3">
      <label for="username" class="form-label">Teacher Name</label>
      <input type="text" name="teacher_name" class="form-control" id="exampleInputEmail1" placeholder="Enter Your Name"
       required>
     </div>
     <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Email address</label>
      <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
       required>
      <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
     </div>
     <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Password</label>
      <input type="password" name="password" class="form-control" id="exampleInputPassword1" required>
     </div>
     <div class="mb-3">
      <label for="phone" class="form-label">Phone</label>
      <input type="text" name="phone" class="form-control" id="exampleInputEmail1" placeholder="Enter Your Phone"
       required>
     </div>
     <div class="mb-3">
      <label for="address" class="form-label">Address</label>
      <input type="text" name="address" class="form-control" id="exampleInputEmail1" placeholder="Enter Your Address"
       required>
     </div>
     <div class="mb-3">
      <label for="address" class="form-label">Education Info</label>
      <input type="text" name="edu_info" class="form-control" id="exampleInputEmail1"
       placeholder="Enter Your Education Info" required>
     </div>

     <div class="mb-3">
      <select name="programm" class="form-select" aria-label="Default select example">
       <option selected>Select Your Programm</option>
       <option value="Tourism">Tourism</option>
       <option value="Education">Education</option>
       <option value="Pali">Pali</option>
       <option value="Bridging">Bridging</option>
      </select>
     </div>
     <div class="mb-3">
      <select name="subject" class="form-select" aria-label="Default select example">
       <option selected>Select Your Subject</option>
       <option value="English">English</option>
       <option value="Math">Math</option>
       <option value="Bio">Bio</option>
       <option value="Physic">Physic</option>
      </select>
     </div>

     <div class="mb-3">
      <select name="class_name" class="form-select" aria-label="Default select example">
       <option selected>Select Your Class</option>
       <option value="Grade1">Grade1</option>
       <option value="Grade2">Grade2</option>
       <option value="Grade3">Grade3</option>
       <option value="Grade4">Grade4</option>
      </select>
     </div>


     <input type="submit" class="btn btn-primary" value="Teacher Register">
    </form>
    <!-- Pagination-->

   </div>
   <!-- Side widgets-->
   <div class="col-lg-4">
    <!-- Search widget-->
    <?php include("layouts/search.php"); ?>
    <!-- Categories widget-->
    <?php include("layouts/category_sidebar.php") ;?>
    <!-- Side widget-->
    <?php include("layouts/side_widget.php"); ?>
   </div>
  </div>
 </div>
 <!-- Footer-->
 <?php include("layouts/footer.php"); ?>