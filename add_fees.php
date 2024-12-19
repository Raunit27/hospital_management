<?php
    include "include/auth_session.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Fee Deposit</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
 
  <?php 
  include "include/links.php";
 ?>
  
</head>
<?php 


  $fetch = $fun->admittedStudents();
  if(isset($_POST['submit'])){
    $d_id = $_POST['id'];
    $balance = $_POST['balance'];
    $remain = $_POST['deposit'];
    $course = $_POST['course'];
    if($balance>=$remain){
        $update = $balance-$remain;
        $query = $fun->updateBalanceFees($update,$d_id);
        if($query){
            echo "Done!";
            
        }
        else{
            echo"Not Done!";
        }
       
        
        $fun->insertTransactionHistory($d_id,$_POST['name'],$remain,$course,$_POST['date']);
        $am = $fun->getLastEarningMonth();
        $row_earn = mysqli_num_rows($am);
        $earn  = mysqli_fetch_assoc($am);
        $month = date('m');
        $year = date('y');
        $date = "".$month."-".$year."";
        if($row_earn > 0){
            
            
            if($earn['month_year'] != $date){
                
                 
                
                if($fun->insertEarning($remain,$date)){
                    echo "done".$date;
                }
            }
            else{

                    $remain += $earn['earning'];
                    $fun->updateEarning($remain,$earn['id']);
                
            }
        }
        else{
            
                
                if($fun->insertEarning($remain,$date)){
                    echo "done".$date;
                }
        }
        
    }
    header("Location: add_fees.php");
  }

  

?>
<body>

  <!-- ======= Header ======= -->
  <?php 
  include "include/header.php";
 ?>
 <!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <?php 
  include "include/navBar.php";
 ?><!-- End Sidebar-->

  <main id="main" class="main">
    <div class="pagetitle">
        <h1>Fee Deposit</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item">Payment</li>
            <li class="breadcrumb-item active">Fee Deposit</li>
          </ol>
        </nav>
      </div>
      <p class="text-center text-danger"><?php 
          if(isset($_GET['msg'])){
            echo $_GET['msg'];
          }
      ?></p>
      <section class="section">
        <div class="row">
          <div class="col-lg-12">
  
            <div class="card">
            <div class="card-body">
                <h5 class="card-title">Fee Deposit Table</h5>
  
                <!-- Table with stripped rows -->
                <div class="table-responsive">
                  <div>

                    <input type="text" class="cd-search table-filter form-control w-25 mb-2 border border-dark rounded-xl" data-table="order-table" placeholder="Item to filter.." />
                  </div>

                    <table class="table  cd-table order-table">
                        <thead>
                        
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">StId</th>
                            <th scope="col">StName</th>
                            <th scope="col">Age</th>
                            <th scope="col">Contact</th>
                            <th scope="col">Course</th>
                           
                           
                            <th scope="col">Balance</th>
                            <th scope="col">Deposit</th>
                            <th scope="col">TimeStamp</th>
                            <th scope="col"  >Action</th>
                            
                            
                          </tr>
                        </thead>
                        <tbody>
                        <?php 
                            if(mysqli_num_rows($fetch)>0){
                                $sr = 1;
                                while($res = mysqli_fetch_assoc($fetch)){

                                   // print_r($course_taken);
                                
                        ?>
                        <tr>
                          <form action="add_fees.php" method="POST">
                          
                            <th scope="row"><?php echo $sr?></th>
                            <td><?php $res['id']?>
                                <input type="text" name="id" id="<?php echo $res['id']?>" value="<?php echo $res['id']?>" hidden>
                            </td>
                            <td>
                            <input type="text" name="name" id="<?php echo $res['name']?>" value="<?php echo $res['name']?>" hidden>
                              <?php echo $res['name']?>
                            </td>
                            <td><?php echo $res['age']?></td>
                            <td><?php echo $res['phone']?></td>
                            <td>
                              <input type="text" name="course" id="<?php echo $res['course']?>" value="<?php echo $res['course']?>" hidden>
                              <?php echo $res['course']?>
                            </td>
                           
                            <td><?php echo $res['fee']?>
                                <input type="text" name="balance"  value="<?php echo $res['fee']?>" hidden>
                                    
                            </td>
                            
                            <td> 
                                <input type="text" name="deposit" id="deposit" class="form-control">
                            </td>
                            <td> 
                                <input type="date" name="date" id="date"  class="form-control">
                            </td>
                            <td  >
                              <button type="submit" name="submit" class="btn w-auto btn-info">Deposit</button>
                            </td>
                            
                          </form>
                        </tr>
                            <?php 
                            $sr++;
                        }
                    }
                    ?>
                    
                        </tbody>
                      </table>
                </div>
               
                <!-- End Table with stripped rows -->
  
              </div>
            </div>
  
          </div>
        </div>
      </section>

      


  </main><!-- End #main -->
  <script>
    (function() {
	'use strict';

var TableFilter = (function() {
 var Arr = Array.prototype;
		var input;
  
		function onInputEvent(e) {
			input = e.target;
			var table1 = document.getElementsByClassName(input.getAttribute('data-table'));
			Arr.forEach.call(table1, function(table) {
				Arr.forEach.call(table.tBodies, function(tbody) {
					Arr.forEach.call(tbody.rows, filter);
				});
			});
		}

		function filter(row) {
			var text = row.textContent.toLowerCase();
       //console.log(text);
      var val = input.value.toLowerCase();
      //console.log(val);
			row.style.display = text.indexOf(val) === -1 ? 'none' : 'table-row';
		}

		return {
			init: function() {
				var inputs = document.getElementsByClassName('table-filter');
				Arr.forEach.call(inputs, function(input) {
					input.oninput = onInputEvent;
				});
			}
		};
 
	})();

  /*console.log(document.readyState);
	document.addEventListener('readystatechange', function() {
		if (document.readyState === 'complete') {
      console.log(document.readyState);
			TableFilter.init();
		}
	}); */
  
 TableFilter.init(); 
})();
  </script>
  <!-- ======= Footer ======= -->
  <?php 
  include "include/footer.php";
 ?>

</body>

</html>