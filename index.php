<!DOCTYPE html>
<html lang="en">
<h<meta charset="UTF-8">
<title>Bootstrap Theam</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="style.css">
<link href="https://fonts.googleapis.com/css?family=Staatliches&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Anton&display=swap" rel="stylesheet">

</head>
<body>

  <?php include 'connection.php'; ?>

<div class="container">
    <h1 class="text-light text-center text-uppercase malik-head">AJAX CRUD OPERATION</h1><br>
    <h2 class=" for-record text-uppercase
      text-white text-center mb-5">all record</h2>
  <div id="records_content"> <!-- Data record Table --> </div>
</div>

<div class="container-fluid">

  <!-- Trigger the modal with a button -->
 <div class="main-button text-uppercase text-white  mb-5">
     <button type="button" class="btn btn-primary"
          data-toggle="modal" data-target="#myModal" ><i
              class="glyphicon glyphicon-plus"></i> Add Data</button>
 </div>

  <!-- Insert Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title text-center">Inset Data (Ajax)</h3>
        </div>
        <div class="modal-body">
           <form method="post" action="#" onsubmit="return validate()" class="bg-light">


    <div class="form-group">
      <label class="text-uppercase font-weight-bold">First Name:</label>
      <input type="text" class="form-control" id="fname" placeholder="first name" name="fname">
        <span id="fnames" class="text-danger font-weight-bold"></span>
    </div>
    <div class="form-group">
      <label class="text-uppercase font-weight-bold">Last Name:</label>
      <input type="text" class="form-control" id="lname" placeholder="last name" name="lname">
        <span id="lnames" class="text-danger font-weight-bold"></span>
    </div>
    <div class="form-group">
      <label class="text-uppercase font-weight-bold">Email Id:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
        <span id="emails" class="text-danger font-weight-bold"></span>
    </div>
    <div class="form-group">
      <label class="text-uppercase font-weight-bold">Contct Number:</label>
      <input type="text" class="form-control" id="cnum" placeholder="Enter contact number" name="cnum">
        <span id="cnums" class="text-danger font-weight-bold"></span>
    </div>

  </form>
        </div>
        <div class="modal-footer">
            <button onclick="addRecords();" type="button" name="submit"
                    id="submit" class="btn btn-success" onsubmit="" data-dismiss="modal">Submit Data</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>


    <!--Update Modal -->
  <div class="modal fade" id="myEditModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title text-center">Edit / Update Data (Ajax)</h3>
        </div>
        <div class="modal-body">
           <form action="" method="post">
    <div class="form-group">
      <label for="fname">First Name:</label>
      <input type="text" class="form-control" id="u_fname" placeholder="Enter first name" name="fname">
    </div>
    <div class="form-group">
      <label for="lname">Last Name:</label>
      <input type="text" class="form-control" id="u_lname" placeholder="Enter last name" name="lname">
    </div>
    <div class="form-group">
      <label for="email">Email Id:</label>
      <input type="email" class="form-control" id="u_email" placeholder="Enter email" name="email">
    </div>
    <div class="form-group">
      <label for="cnum">Contct Number:</label>
      <input type="text" class="form-control" id="u_cnum" placeholder="Enter contact number" name="cnum">
    </div>
    <div>
      <input type="hidden" name="u_id" id="u_id">
    </div>
    <button onclick="updateRecords();" type="button" name="submit" id="u_submit" class="btn btn-success">Submit Data</button>
  </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>

  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script type="text/javascript">
      function validate() {
          var fname= document.getElementById('fname').value;
          var lname= document.getElementById('lname').value;
         // var pass= document.getElementById('pass').value;
         // var conpass= document.getElementById('conpass').value;
          var email= document.getElementById('email').value;
          var cnum= document.getElementById('cnum').value;
          let regname = /^[a-zA-Z]{5,}$/g;
          let regpass = /^[a-zA-Z0-9]{6,12}$/g;
          let regnum = /^[0-9]{11}$/g;
          let regemail = /^[a-zA-Z0-9.\-\_]{5,}[@]{1}[A-Za-z]{5,10}[.][a-zA-Z]{3}$/g;


//===========   name validation    ==========

          if(regname.test(fname)==false){
              document.getElementById('#fnames').innerHTML="**Incorrect firs name: <br> name should " +
                  "be char and greater then 3 character";
              return false;
          }
          if(regname.test(lname)==false){
              document.getElementById('#lnames').innerHTML="**Incorrect firs name: <br> name should " +
                  "be char and greater then 3 character";
              return false;
          }


          //==============         password validation     ===============

          if(regpass.test(pass) ==false){
              document.getElementById('passwords').innerHTML="**Incorrect user password";
              return false;
          }

          if(conpass!=pass){
              document.getElementById('conpasswords').innerHTML=
                  "**passward are not matching";
              return false;
          }
          if(conpass==""){
              document.getElementById('conpasswards').innerHTML="**please  Fill please rematch the confrm pass";
              return false;
          }

          //=================== email validation    =============

          if(regemail.test(email)==false){
              document.getElementById('emails').innerHTML="**Incorrect email Account:";
              return false;
          }
          if(regnum.test(cnum)==false){
              document.getElementById('#cnums ').innerHTML="**Incorrect number :";
              return false;
          }

      }

    $(function(){
      readRecords(); 
    });


    function readRecords() {
      var readRecords = "readRecords";
      $.post({
        url: 'ajax.php',
        type: 'post',
        data: {readRecords:readRecords},
        success: function(data, status){
          $('#records_content').html(data)

        }
      })
    }


    function addRecords() {
      var fname = $('#fname').val();
      var lname = $('#lname').val();
      var email = $('#email').val();
      var cnum = $('#cnum').val();

      $.post({
        url: 'ajax.php',
        type: 'post',
        data: {fname:fname, lname:lname, email:email, cnum:cnum},
        success:function(data, status) {
          readRecords();
        }
      });
      
    }


    function deleteRecord(deleteId){
      var conf = confirm('Are you sure');
      if (conf == true) {
        $.post({
          url: 'ajax.php',
          type: 'post',
          data: {deleteId:deleteId},
          success: function(data, status){
            $('#records_content').html(data);
            readRecords();
          }
        });
      }
    }



    function editRecord(id){
      $('#u_id').val(id);
      $.post({
        url: 'ajax.php',
        type: 'post',
        data: {id:id},
        success: function(data, status) {
          var user = JSON.parse(data);

          $('#u_fname').val(user.fname);
            $('#u_lname').val(user.lname);
            $('#u_email').val(user.email);
            $('#u_cnum').val(user.cnum);
        }
      });

      $("#myEditModal").modal('show');
    }



    function updateRecords() {
      var u_fname = $('#u_fname').val();
      var u_lname = $('#u_lname').val();
      var u_email = $('#u_email').val();
      var u_cnum = $('#u_cnum').val();
      var u_id = $('#u_id').val();

      $.post({
        url: 'ajax.php',
        type: 'post',
        data: {u_fname:u_fname, u_lname:u_lname, u_email:u_email, u_cnum:u_cnum, updateId:u_id},
        success:function(data, status) {
          $("#myEditModal").modal('hide');
            readRecords();
        }
      });
    }


  </script>
</body>
</html>