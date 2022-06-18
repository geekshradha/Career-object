<?php 
include('header.php');
include('function.php');
?>
<script>
function myFunction() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>

<title>Student List|TechTrix</title>
<body>
        <div id="page-wrapper" >
          <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Student List</h2>
                        <h4>Enter the CO ID:</h4>
                        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Type the CO ID" title="Type in a name">
                       <br><br>
                       <table class="table table-striped table-bordered table-hover" id="myTable">
                            <thead>
                                <tr>
                                    <th>CO ID</th>
                                    <th>Team ID</th>
                                    <th>Name 1</th>
                                    <th>Name 2</th>
                                  	<th>Name 3</th>
                                  	<th>Name 4</th>
                                  	<th>Name 5</th>
                                  	<th>Phone</th>
                                  	<th>Email</th>
                                    <th>Password</th>
                                </tr>
                            </thead>
                          <?php
                              $sql="select * from team_data";
                              foreach ($GLOBALS['db']->query($sql) as $row) 
                              {
                          ?>
                            <tbody>
                                <tr>
                                    <td><?php echo $row['trix_id'];?></td>
                                    <td><?php echo $row['team_id'];?></td>
                                    <td><?php echo $row['name_1'];?></td>
                                    <td><?php echo $row['name_2'];?></td>
                                    <td><?php echo $row['name_3'];?></td>
                                    <td><?php echo $row['name_4'];?></td>
                                    <td><?php echo $row['name_5'];?></td>
                                    <td><?php echo $row['phone'];?></td>
                                    <td><?php echo $row['email'];?></td>
                                    <td><?php echo $row['password'];?></td>
                                </tr>
                            </tbody>
                           <?php }?> 
                        </table>
                 

                    </div>
                   </div>
              </div>                   
</body>
<?php include('footer.php');?>