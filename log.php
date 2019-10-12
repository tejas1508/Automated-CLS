<?php
  session_start();

  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "iottest";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: ".$conn->connect_error);
  }
  // $username = $_SESSION['currentUser'];
  // $sql = "select id from users where username='$username'";
  // $result = $conn->query($sql);
  // $r = $result->fetch_array();
  // $user_id = $r['id'];

  $sql2 = "SELECT * FROM consumptioninfo";
  $result2 = $conn->query($sql2);

  $conn->close();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style media="screen">
    .table {
font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
border-collapse: collapse;
width: 100%;
}

.table td, .table th {
border: 1px solid #ddd;
padding: 8px;
}

.table tr:nth-child(even){background-color: #f2f2f2;}

.table tr:hover {background-color: #ddd;}

.table th {
padding-top: 12px;
padding-bottom: 12px;
text-align: left;
background-color: #4CAF50;
color: white;
}
    </style>
  </head>
  <body>
    <a href="PowerController.html" class="btn btn-primary">Go Back</a>
    <div class="card shadow1" id="abcd">
      <h2>Your daily log</h2>
      <table class="table">
        <tr>
          <th>Lid</th>
          <th>time</th>
          <th>date</th>
        </tr>
          <?php foreach ($result2 as $res) { ?>
            <tr>
            <td>
              <?php echo $res['L_id']; ?>
            </td>
            <td>
              <?php echo $res['P_Secs']; ?>
            </td>
            <td>
              <?php echo $res['P_Date']; ?>
            </td>
          </tr>
          <?php } ?>
      </table>
    </div>

  </body>
</html>
