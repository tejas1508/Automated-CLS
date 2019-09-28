<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1 id="val"></h1>
    <?php
      while (true){
      $fileName = "ldrData.txt";
      $fp = fopen($fileName,"r");
      if( $fp == false )
      {
        echo ( "Error in opening file" );
        exit();
      }

      $fileSize = filesize( $fileName );
      $fileData = fread( $fp, $fileSize );

      echo <<<EOF
      <script type="text/javascript">
          document.getElementById('val').innerHTML = '$fileData'
      </script>
      EOF;
    }
    ?>
  </body>
</html>
