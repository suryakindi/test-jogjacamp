<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Tambah Category</title>
  </head>
  <body>
    @if(session()->has('errorinput'))
    <script>
        alert('Pastikan Semua Inputan Terisi!')
    </script>
    @endif
     @if(session()->has('errorpublish'))
    <script>
        alert('Inputan Publish Yang Anda Masukkan Tidak Sesuai!')
    </script>
    @endif
    <form action="" method="POST">
        @csrf
        <div class="form-group" style="margin-left: 20px; margin-top:10px">
          <label for="namacategory">Nama Category</label>
          <input type="text" class="form-control" id="namacategory" placeholder="Masukkan Nama Category" name="nama_category" style="width:250px">
        </div>
        <div class="form-group" style="margin-left: 20px; margin-top:10px">
            <label for="namacategory">Publish</label>
            <input type="text" class="form-control" id="namacategory" placeholder="0 / 1" name="is_publish" style="width:250px">
          </div>
        <button type="submit" class="btn btn-primary" style="margin-left:20px">Submit</button>
        
      </form>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>