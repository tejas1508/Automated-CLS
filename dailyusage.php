<!-- SELECT consumptioninfo.P_Date ,((consumptioninfo.P_hours * tubelightinfo.watts)) AS powerconsumed FROM consumptioninfo JOIN tubelightinfo on consumptioninfo.Lid1 = tubelightinfo.Lid GROUP BY consumptioninfo.P_id -->
<?php
  if(isset($_POST['Submit'])){
        $host = "localhost";
        $dbusername = "root";
        $dbpassword = "";
        $dbname = "iottest";

        $conn= new mysqli($host,$dbusername,$dbpassword,$dbname);

        if(mysqli_connect_error()){
            die('Connect Error('. mysql_connect_error().')'. mysqli_connect_error());
        }
        $date1 = $_POST['date1'];
        $sql = "SELECT L_id, P_Secs FROM consumptioninfo WHERE P_Date = '$date1'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
    // output data of each row
          while($row = $result->fetch_assoc()) {
              // echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
              echo "Lid :".$row['L_id']."\nTime (in secs) :".$row['P_Secs'];
          }
        } else {
            echo "0 results";
        }
        $conn->close();
  }

?>
