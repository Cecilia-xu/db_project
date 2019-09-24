<?php
$servername = "localhost";
      $username = "root";
      $password = "mysql";
      $database = "shopping";
      $conn = new mysqli($servername, $username, $password, $database);
      // Check connection
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      } 
      $sql = "";
      switch($_GET[action]){
        

        case 'transaction_date_distribution': $sql = "select order_date as n, count(order_date) as t from transactions group by order_date;";
        break;

        case 'real_store_distribution': $sql = "select store_city as n,count(store_id) as t from stores group by store_city;";
        break;
        
        default: $sql = "select product_kind as n,AVG(product_unitprice) as t from products group by product_kind order by AVG(product_unitprice) desc limit 10 ; ";
        
        
      }
      $result = $conn->query($sql);
      $output = "letter\tfrequency\n";
      if ($result){
        while($row = $result->fetch_assoc())
        {
            $output .= $row['n']."\t".$row['t']."\n"; 
        }
      }
      $result->free();
      echo $output;
      // Close connection
      mysqli_close($conn);
?>