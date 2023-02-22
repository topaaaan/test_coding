<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <section id="tambah">
      <div class="container">
        <div class="border p-3 mt-3">
          <h1 class="m-3">Tambah Data</h1>
          <form id="form-tambah">
            <?php if($id != 'none') : ?>
              <input type="hidden" name="id" value="<?= $id; ?>">
            <?php endif; ?>
            <div class="row">
              <div class="col-lg-5 mb-3">
                <label for="rack" class="form-label">Rack</label>
                <select class="form-select" name="rack" id="rack">
                  <?php foreach($rack as $row) : 
                    if($target[0]->rack_id == $row->id) {
                  ?>
                    <option value="<?= $row->id; ?>" selected><?= $row->name; ?></option>
                  <?php } else { ?>
                    <option value="<?= $row->id; ?>"><?= $row->name; ?></option>
                  <?php } endforeach; ?>
                </select>
              </div>
              <div class="col-lg-5 mb-3">
                <label for="book" class="form-label">Book</label>
                <select class="form-select" name="book" id="book">
                  <?php foreach($book as $row1) : 
                    if($target[0]->book_id == $row1->id) {
                  ?>
                    <option value="<?= $row1->id; ?>" selected><?= $row1->name; ?></option>
                  <?php } else { ?>
                    <option value="<?= $row1->id; ?>"><?= $row1->name; ?></option>
                  <?php } endforeach; ?>
                </select>
              </div>
              <div class="col-lg-2 mb-3 d-flex">
                <?php if($id == 'none') { ?>
                <button class="btn btn-primary add" style="width: 100%;">Submit</button>
                <?php } else { ?>
                <button class="btn btn-primary edit" style="width: 100%;">Edit</button>
                <?php } ?>
              </div>
            </div>
          </form>
        </div>
      </div>
    </section>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        $('.add').click(function(e) {
          e.preventDefault();
          $.ajax({
            method: 'post',
            url: "<?= base_url('Admin/ActionTambah'); ?>",
            data: $('#form-tambah').serialize(),
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

        $('.edit').click(function(e) {
          e.preventDefault();
          $.ajax({
            method: 'post',
            url: "<?= base_url('Admin/ActionEdit'); ?>",
            data: $('#form-tambah').serialize(),
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