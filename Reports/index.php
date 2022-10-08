    <!-- For header -->
    <?php include '../includes/header.php';?>

    <!-- For tab active styling -->
    <style> #rep {color: #fff;background-color: #007bff;}</style>

    <!-- For sidebar -->
    <?php include '../includes/sideBar.php';?>

   <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper" style="margin-top:1%">
  <!-- Main content -->
  <section class="content">
      <div class="container-fluid">
        <br><div class="row">
          <div class="col-12"  <?php if($username!="Admin"){echo"hidden";}else{echo "";}?>>
                 <button class="btn btn-xs btn-primary" onclick="showDaily()">Daily</button>
                  <button class="btn btn-xs btn-primary" style="margin-left:20%" onclick="showMonthly()">Monthly</button>
                  <button style="margin-left:20%" class="btn btn-xs btn-primary" onclick="ca()">Cash Advance</button><br><br>
           <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped" id="daily">
                  <thead>
                  <tr>
                    <th >Name</th>
                    <th>Rate/Hr</th>
                    <th>Work</th>
                    <th>Time In</th>
                    <th>Time Out</th>
                    <th>Hours Work</th>
                    <th>Income</th>
                    <th>Date</th>
                  </tr>
                  </thead>
                  <tbody>
                      <!-- Show employee-->
                       <?php
                        $Employee = "SELECT a.*,b.* FROM worker a JOIN attendance b on a.w_id = b.worker ORDER BY a.lname,b.Time_out ASC";
                        $result = mysqli_query($con, $Employee);
                        if (mysqli_num_rows($result)> 0 ) 
                        {
                           while($row = mysqli_fetch_assoc($result)) {
                             echo ' 
                             <tr><td>'.$row['lname'],', ',$row['fname'],' ', $row['mname'],' ',$row['ext'].'</td>  
                             <td>'.number_format($row['salary'],2).'</td>   
                             <td>'.$row['position'].'</td>   
                             <td>'.substr($row['Time_In'],11,5).' A.M.</td>   
                             <td>'.substr($row['Time_out'],11,5).' P.M.</td>   
                             <td>'.date_diff(date_create($row['Time_In']),date_create($row['Time_out']))->h.'</td>    
                             <td>'.number_format($row['salary'] * date_diff(date_create($row['Time_In']),date_create($row['Time_out']))->h,2).'</td>     
                             <td>'.substr($row['Time_In'],0,7).'</td>     
                             </tr>
                            '  ;
                        }}
                        ?>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            </div>
            </div>



   <div class="col-12"  <?php if($username!="Admin"){echo"";}else{echo "hidden";}?>>
          <br><br>
           <div class="card">
              <!-- /.card-header -->
                <div class="card-header" style="background-color:#28a745"><b><?php echo $username;?></b>, This you Daily work Report </div>
                <div class="card-body">
                <table id="example1" class="table table-bordered table-striped" id="daily">
                  <thead>
                  <tr>
                    <th >Name</th>
                    <th>Rate/Hr</th>
                    <th>Work</th>
                    <th>Time In</th>
                    <th>Time Out</th>
                    <th>Hours Work</th>
                    <th>Income</th>
                    <th>Date</th>
                  </tr>
                  </thead>
                  <tbody>
                      <!-- Show employee-->
                       <?php
                        $Employee = "SELECT a.*,b.* FROM worker a JOIN attendance b on a.w_id = b.worker WHERE a.fname='$username'";
                        $result = mysqli_query($con, $Employee);
                        if (mysqli_num_rows($result)> 0 ) 
                        {
                           while($row = mysqli_fetch_assoc($result)) {
                             echo ' 
                             <tr><td>'.$row['lname'],', ',$row['fname'],' ', $row['mname'],' ',$row['ext'].'</td>  
                             <td>'.number_format($row['salary'],2).'</td>   
                             <td>'.$row['position'].'</td>   
                             <td>'.substr($row['Time_In'],11,5).' A.M.</td>   
                             <td>'.substr($row['Time_out'],11,5).' P.M.</td>   
                             <td>'.date_diff(date_create($row['Time_In']),date_create($row['Time_out']))->h.'</td>    
                             <td>'.number_format($row['salary'] * date_diff(date_create($row['Time_In']),date_create($row['Time_out']))->h,2).'</td>     
                             <td>'.substr($row['Time_In'],0,7).'</td>     
                             </tr>
                            '  ;
                        }}
                        ?>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>

           
     <?php include '../includes/footer.php';?>
     <!-- For home body -->
    <?php include '../includes/footerScripts.php';?>
    <script>
       function showDaily(){
          location.href="index.php";
       }
       function showWeekly(){
        location.href="weekly.php";
       }
       function showMonthly(){
        location.href="monthly.php";
       }
       function ca(){
        location.href="ca.php";
       }
     $("input").keypress(function(e){
    var charCode = !e.charCode ? e.which : e.charCode;

    if(/* Test for special character */ )
        e.preventDefault();
    })    
      </script>





