<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Home</title>
  </head>
  <body>
    <section id="racks">
      <div class="container">
        <a class="btn btn-primary m-3" href="<?= base_url('Admin/Login'); ?>">Login</a>
        <div class="row">
          <?php foreach ($rack as $row) : ?>
          <div class="col-lg-6">
            <div class="border m-3 p-3">
              <h1 class="text-center"><?= $row->name; ?></h1>
              <div class="row">
                <?php 
                  foreach($book as $row1) : 
                    if($row->id == $row1->rack_id) :
                ?>
                <div class="col-lg-6">
                  <div class="border m-3 p-3">
                    <?= $row1->book; ?>
                  </div>
                </div>
                <?php
                    endif; 
                  endforeach; 
                ?>
              </div>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
    </section>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>