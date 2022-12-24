<?php 
include("../vendor/autoload.php");
use Libs\Databases\MySQL;
use Libs\Databases\EventTable;

$table = new EventTable(new MySQL());
$events = $table->GetEventAllData();

echo json_encode($events);
?>
<?php
include("includes/head.php"); 
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
<style>
body {
 margin-top: 40px;
 text-align: center;
 font-size: 14px;
 font-family: "Lucida Grande", Helvetica, Arial, Verdana, sans-serif;
}

#calendar {
 width: 650px;
 margin: 0 auto;
}
</style>

<body class="sb-nav-fixed">
 <?php //include("includes/top_navbar.php"); ?>
 <div id="layoutSidenav">

  <?php include("includes/sidebar.php"); ?>

  <div id="layoutSidenav_content">
   <main>
    <div class="container-fluid px-4">
     <h1 class="mt-4">Event List Dashboard</h1>
     <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item active">Dashboard</li>
     </ol>
     <?php //include("includes/top_card.php"); ?>
     <div class="card mb-4">
      <div class="card-header">
       <i class="fas fa-table me-1"></i>
       Event List <span class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">+ Add
        New Event</span>
      </div>
      <div class="card-body">
       <!-- add to datatable -->
       <div id='calendar'></div>
      </div>
     </div>
     <!-- Modal -->
     <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
       <div class="modal-content">
        <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLabel">Role Create</h5>
         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
         <form action="../_actions/role_create.php" method="POST">
          <div class="mb-3">
           <label for="exampleInputEmail1" class="form-label">Role Name</label>
           <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter Role Name">
          </div>
          <div class="mb-3">
           <label for="value" class="form-label">Role Value</label>
           <input type="number" name="value" class="form-control" id="value">
          </div>
          <div class="modal-footer">
           <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
           <input type="submit" class="btn btn-primary" value="Create New Role">
          </div>
         </form>
        </div>
       </div>
      </div>
     </div>
    </div>
   </main>
   <?php include("includes/footer.php"); ?>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
   <script>
   $(document).ready(function() {
    var date = new Date();
    var d = date.getDate();
    var m = date.getMonth();
    var y = date.getFullYear();

    var calendar = $('#calendar').fullCalendar({
     editable: true,
     header: {
      left: 'prev,next today',
      center: 'title',
      right: 'month,agendaWeek,agendaDay'
     },
     events: '../_actions/event_load.php',
     eventRender: function(event, element, view) {
      if (event.allDay === 'true') {
       event.allDay = true;
      } else {
       event.allDay = false;
      }
     },
     selectable: true,
     selectHelper: true,
     select: function(start, end, allDay) {
      var title = prompt('Event Title:');
      if (title) {
       var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
       var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
       $.ajax({
        url: '../_actions/event_create.php',
        data: 'title=' + title + '&start=' + start + '&end=' + end,
        type: "POST",
        success: function(json) {
         alert('Added Successfully');
        }
       });
       calendar.fullCalendar('renderEvent', {
         title: title,
         start: start,
         end: end,
         allDay: allDay
        },
        true
       );
      }
      calendar.fullCalendar('unselect');
     },
     editable: true,
     eventDrop: function(event, delta) {
      var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
      var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
      $.ajax({
       url: '../_actions/event_update.php',
       data: 'title=' + event.title + '&start=' + start + '&end=' + end + '&id=' + event.id,
       type: "POST",
       success: function(json) {
        alert("Updated Successfully");
       }
      });
     },
     eventClick: function(event) {
      var deleteMsg = confirm("Do you really want to delete?");
      if (deleteMsg) {
       $.ajax({
        type: "POST",
        url: "../_actions/event_delete.php",
        data: "&id=" + event.id,
        success: function(json) {
         $('#calendar').fullCalendar('removeEvents', event.id);
         alert("Updated Successfully");
        }
       });
      }
     }
    });
   });
   </script>