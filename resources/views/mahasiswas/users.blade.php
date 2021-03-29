@extends('mahasiswas.layout')   

@section('content')   
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Data Mahasiswa</title>
  </head>
  <body>
  <div class="row">         
        <div class="col-lg-12 margin-tb">
            <div class="pull-left mt-2">
                <h2 class="text-center"><p><p>JURUSAN TEKNOLOGI INFORMASI-POLITEKNIK NEGERI MALANG</h2><p><p><p><p><p>             
                </div>          
                <div class="float-left my-2">
                <br><br><br><a class="btn btn-success" href="{{ route('mahasiswas.create') }}"> Input Mahasiswa</a>             
                    </div>  

  <form action="{{ url('/') }}" method="GET">
            <div class="float-right my-2">
                 <br><br><br><input  value="{{ Request::get('keyword') }}" type="text" name="keyword" class="form-control" placeholder="Nama">
            </div>
            <div class="float-right my-2">
                 <br><br><br><button type="submit" class="btn btn-secondary">Cari Mahasiswa</button>
            </div>
        </form>
    
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>         
            </div>     
        @endif 

  <table class="table table-bordered table-striped" >
        <thead class="thead-dark">
            <tr> 
                <th class="text-center">No</th> 
                <th class="text-center">Nim</th>             
                <th class="text-center">Nama_Mahasiswa</th>  
                <th class="text-center">Tanggal_Lahir</th>   
                <th class="text-center">Email</th>        
                <th class="text-center">Kelas</th>             
                <th class="text-center">Jurusan</th>             
                <th class="text-center">No_Handphone</th>             
                <th class="text-center" width="280px">Action_Button_Mahasiswa_TI</th>
            </tr>  
        </thead>       
            <?php $no = -1;?>
            @foreach ($mahasiswas as $Mahasiswa)
            <?php $no++;?>
            <tr> 
                <td class="text-center">{{ $mahasiswas->firstItem()+$no}}</td>             
                <td class="text-center">{{ $Mahasiswa->Nim }}</td>
                <td class="text-center">{{ $Mahasiswa->Nama }}</td>
                <td class="text-center">{{ $Mahasiswa->Tanggal_Lahir }}</td>
                <td class="text-center">{{ $Mahasiswa->Email }}</td>
                <td class="text-center">{{ $Mahasiswa->Kelas }}</td>
                <td class="text-center">{{ $Mahasiswa->Jurusan }}</td>
                <td class="text-center">{{ $Mahasiswa->No_Handphone }}</td>             
                <td>             
                <form action="{{ route('mahasiswas.destroy',$Mahasiswa->Nim) }}" method="POST">                         
                
                <a class="btn btn-info" href="{{ route('mahasiswas.show',$Mahasiswa->Nim) }}">Show</a> 
                <a class="btn btn-primary" href="{{ route('mahasiswas.edit',$Mahasiswa->Nim) }}">Edit</a> 
 
                @csrf
                 
                @method('DELETE') 
                <button type="submit" class="btn btn-danger">Delete</button>
                </form>             
                </td>         
            </tr>      
        @endforeach  
    </table> 

<div>
    <!-- For Default pagination user -->
    <ul class="pagination justify-content-center">
   <div>{{ $mahasiswas->links() }}</div> 
    </ul>

    <!-- For Custom pagination User -->
    <!-- <div>{{ $mahasiswas->links('mahasiswas.pagination') }}</div> -->
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
@endsection 

