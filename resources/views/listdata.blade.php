<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">
        
    </head>
    <body>
        @if(session()->has('suksestambahdata'))
        <script>
            alert('Data Berhasil Ditambahkan')
        </script>
        @endif
        @if(session()->has('suksesdeletdata'))
        <script>
            alert('Data Berhasil Dihapus')
        </script>
        @endif
       <a href="/listdata/tambah-category"> <button class="btn btn-info btn-sm" style=" margin-top:10px; margin-left:10px">Tambah Category</button></a>
        <br><br>
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>is_publish</th>
                    <th>created_at</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $no=1;
                ?>
                @foreach ($listdatacategory as $itemcategory)    
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$itemcategory->id}}</td>
                    <td>{{$itemcategory->name}}</td>
                    @if($itemcategory->is_publish == "1")
                    <td style="color:white"><span class="badge bg-success"> YES </span></td>  
                    @endif
                    @if($itemcategory->is_publish == "0")
                    <td style="color:white"><span class="badge bg-danger"> No </span></td>  
                    @endif
                    <td>{{$itemcategory->created_at}} ({{$itemcategory->created_at->diffForHumans()}})</td>
                    <td>
                        <a href="/listdata/edit/{{$itemcategory->id}}"><button class="btn btn-warning btn-sm">Edit</button></a>
                        <a href="/listdata/hapus/{{$itemcategory->id}}" onclick="return confirm('Yakin Hapus Data?')"><button class="btn btn-danger btn-sm">Hapus</button></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>is_publish</th>
                    <th>created_at</th>
                    <th>Aksi</th>
                </tr>
            </tfoot>
        </table>

        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>
        <script>
            $(document).ready(function () {
    $('#example').DataTable();
});
        </script>
    </body>
</html>