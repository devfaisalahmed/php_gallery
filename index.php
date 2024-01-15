<?php
require 'filereader.php';

$images = dirreader( 'images' );
if ( is_null( $images ) ) {
    echo 'No folder found';
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>

  <body>
    <div class="input">
      <div class="container">
        <div class="row">
          <div class="col-5">
            <h3 class="text-transform-uppercase" style="text-transform: capitalize;">php Gallery</h3>
          </div>
          <div class="col-7 mt-2">
            <form class="row g-3" method="POST" enctype="multipart/form-data">
              <div class="col-auto">
                <input class="form-control" type="file" name="formFile[]" multiple>
              </div>
              <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-3">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="gallery mt-3">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <?php
foreach ( $images as $image ) {
    printf( "<img src = '%s' width = '250px'> ", $image );
}
?>
          </div>
        </div>
      </div>
    </div>

  </body>

</html>