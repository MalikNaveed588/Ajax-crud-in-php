<?php include 'connection.php'; ?>

<?php 
	
	extract($_POST);

    // Insert records 

    if (isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['email']) && isset($_POST['cnum'])) {

        $q = "INSERT INTO `records`(`fname`, `lname`, `email`, `cnum`) VALUES ('$fname','$lname','$email','$cnum')";
        $res = mysqli_query($con,$q);       
    }

    // View records

	if (isset($_POST['readRecords'])) {
		
		$data = '<table class="table table-bordered table-hover table-striped  " 
                    style="margin-top: -3rem">
    				<thead class="text-dark text-uppercase text-center" 
    				style="background: -webkit-linear-gradient(left,aqua,lightcoral)">
    				  <tr>
    				    <th>S.No.</th>
    				    <th>First Name</th>
    				    <th>Last Name</th>
    				    <th>Email Address</th>
    				    <th>Contact Number</th>
    				    <th>Actions</th>
				
    				  </tr>
    				</thead>';

    	$q = "SELECT * FROM `records` ";
    	$res = mysqli_query($con,$q);
    	 if (mysqli_num_rows($res) > 0 ) {
    	 	$s_no = 1;
    	 	while ($row = mysqli_fetch_array($res)) {
    	 		$data.='<tbody>
    					  <tr>
    					    <td>'.$s_no.'</td>
    					    <td>'.$row['fname'].'</td>
    					    <td>'.$row['lname'].'</td>
    					    <td>'.$row['email'].'</td>
    					    <td>'.$row['cnum'].'</td>
    					    <td><a href="javascript:void(0);"  onclick="editRecord('.$row['id'].')" class="btn btn-info"><i class="glyphicon glyphicon-edit"></i> Edit</a> &nbsp; 
    					        <a href="javascript:void(0);" onclick="deleteRecord('.$row['id'].')"  class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i> Delete</a></td>
    					  </tr>     
    					</tbody>';
    					$s_no++;
    	 	}
    	 }
    	 $data.='</table>';

    	 echo $data;
	}

// Delete records

    if (isset($_POST['deleteId'])) {
        $deleteId = $_POST['deleteId'];

        $q = "DELETE FROM `records` WHERE id = $deleteId";
        $res = mysqli_query($con, $q);
    }


// Get data id for update

    if (isset($_POST['id']) && isset($_POST['id']) != "") {
        $u_id = $_POST['id'];

        $q = "SELECT * FROM `records` WHERE id = $u_id";
        if (!$result = mysqli_query($con,$q)) {
            exit(mysqli_error());
        }

        $response = array();

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $response = $row;
            }
        }else{
            $response['status'] = 200;
            $response['message'] = "Data not found";
        }

        echo json_encode($response);

    }else{
        $response['status'] = 200;
        $response['message'] = "Invalid request";
    }



// update / edit record data

    if (isset($_POST['updateId'])) {
        $u_id = $_POST['updateId'];
        $u_fname = $_POST['u_fname'];
        $u_lname = $_POST['u_lname'];
        $u_email = $_POST['u_email'];
        $u_cnum = $_POST['u_cnum'];

        $query = "UPDATE `records` SET `fname`='$u_fname',`lname`='$u_lname',`email`='$u_email',`cnum`='$u_cnum' WHERE id = '$u_id' ";

        $result = mysqli_query($con,$query);

    }

 ?>