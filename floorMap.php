<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Floor Map</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://use.fontawesome.com/a2d74ad2bb.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- <style >
          body{
      margin:0;
      padding:0;
      font-family:sans-serif;
      background-color:#17202A ;
      background-size:cover;
      }
      .container{
      width:230px;
      position:absolute;
      top:70%;
      left:30%;
      transform: translate(-60%,-50%);
      color:#00ffff;
      } -->
    </style>
  </head>
  <body style="background-color:#17202A ;">
    <div class="container">
      <div style="text-align: center;">
        <div class="card" style="display: inline-block; width: 900px; height: 600px; background-color:#e6e6e6;">
          <div>
              <a href="PowerController.html" class="btn btn-primary mt-2" style="float: left;">Go Back</a>
          </div>
          <div class="card-body">
            <h2>Floor 5 : Section 1</h2>
            <form action="lightController.php" method="post">
              <button type="submit" class="btn btn-primary m-4" name="AUTO_ON" value="AUTO_ON" id="AUTO_ON">Turn <strong>ON</strong> Automatic Mode</button>
              <div style="width: 100%; height: 100px;">
                <p>
                  <strong>
                    <span style="padding: 10px; margin: 50px 230px 50px 50px;">Light 1</span>
                    <span style="padding: 10px; margin: 40px">Light 2</span>
                  </strong>
                </p>
              </div>
              <div>
                <span style="padding: 30px; margin: 120px; width: 100px;"><i class="fa fa-lightbulb-o fa-5x" aria-hidden="true"></i></span>
                <span style="padding: 30px; margin: 120px; width: 100px;"><i class="fa fa-lightbulb-o fa-5x" aria-hidden="true"></i></span>
              </div>
              <div>
                <button type="submit" id="abcd" name="button" class="btn" style="padding: 10px; margin: 50px 240px 50px 50px;" disabled>State</button>
                <button type="submit" id="defg" name="button" class="btn" style="padding: 10px; margin: 50px;" disabled>afvvd</button>
              </div>
              <div>
                <span style="margin: 80px;">
                  <button type="submit" class="btn btn-success" name="button1on">Turn ON</button>
                  <button type="submit" class="btn btn-danger" name="button1off">Turn OFF</button>
                </span>
                <span style="margin: 80px;">
                  <button type="submit" class="btn btn-success" name="button2on">Turn ON</button>
                  <button type="submit" class="btn btn-danger" name="button2off">Turn OFF</button>
                </span>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <script type="text/javascript">
      var abcd = document.getElementById("abcd");
      abcd.style.backgroundColor = "<?php echo $_SESSION['status1'] ?>";
      if(abcd.style.backgroundColor == 'green'){
        abcd.innerHTML = "ON";
      }
      else{
        abcd.innerHTML = "OFF";
      }

      var defg = document.getElementById("defg");
      defg.style.backgroundColor = "<?php echo $_SESSION['status2'] ?>";
      if(defg.style.backgroundColor == 'green'){
        defg.innerHTML = "ON";
      }
      else{
        defg.innerHTML = "OFF";
      }
    </script>
  </body>
</html>
