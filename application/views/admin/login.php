<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Login</title>
  </head>
  <body>
    <section id="login">
      <div class="container p-5">
        <h1>Login</h1>
        <form id="form-login">
          <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="username" name="username" class="form-control" id="username">
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password">
          </div>
          <button type="button" class="btn btn-primary submit">Submit</button>
        </form>
      </div>
    </section>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        $('.submit').click(function(e){
          e.preventDefault();
          let id = $(this).attr('data-id');
          $.ajax({
            method: 'post',
            url: "<?= base_url('Admin/ActionLogin'); ?>",
            data: $('#form-login').serialize(),
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