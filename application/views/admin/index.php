<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Admin</title>
  </head>
  <body>

<section id="dashboard">
  <div class="container mt-3">
    <a href="<?= base_url('Admin/Tambah'); ?>" class="btn btn-primary me-3">Tambah Data</a>
    <a href="<?= base_url('Admin/Logout'); ?>" class="btn btn-primary">Logout</a>
    <table class="table mt-3">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Rack</th>
          <th scope="col">Book</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php $no=1; foreach($rack as $row) : ?>
        <tr>
          <th scope="row"><?= $no; ?></th>
          <td><?= $row->rack; ?></td>
          <td><?= $row->book; ?></td>
          <td>
            <a href="<?= base_url('Admin/Tambah?id=').$row->id; ?>" class="btn btn-primary me-3">Edit</a>
            <button type="button" data-id="<?= $row->id; ?>" class="btn btn-danger delete">Delete</button>
          </td>
        </tr>
        <?php 
          $no++;
          endforeach; 
        ?>
      </tbody>
    </table>
    </div>
</section>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        $('.delete').click(function(e){
          e.preventDefault();
          let id = $(this).attr('data-id');
          $.ajax({
            method: 'post',
            url: "<?= base_url('Admin/Delete'); ?>",
            data: {
              "id" : id
            },
            success: function(o) {
                alert(o);
                if (o == 'success') {
                    location.href = "<?= base_url('Admin'); ?>";
                }
            },
            error: function(a) {
                alert(a);
            }
          });
        });
      });
    </script>
  </body>
</html>