<?php  
//export.php  
$connect = mysqli_connect("localhost", "root", "", "testing");
$output = '';
if(isset($_POST["export"]))
{
 $query = "SELECT * FROM tbl_customer";
 $result = mysqli_query($connect, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
                         <th>Name</th>  
                         <th>Address</th>  
                         <th>City</th>  
       <th>Postal Code</th>
       <th>Country</th>
                    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
                         <td>'.$row["CustomerName"].'</td>  
                         <td>'.$row["Address"].'</td>  
                         <td>'.$row["City"].'</td>  
       <td>'.$row["PostalCode"].'</td>  
       <td>'.$row["Country"].'</td>
                    </tr>
   ';
  }
  $output .= '</table>';
  // header('Content-Type: application/xls');
  // header('Content-Disposition: attachment; filename=download.xls');
  /**
   *  Using the applictaion/xls, returns an error when opening the spreadsheet with Excel 2016 
   *  Recommend the follwing instead.
   **/
  header('Content-type: application/octet-stream');
  header('Content-Disposition: attachment; filename=download.csv');
  echo $output;
 }
}
?>
