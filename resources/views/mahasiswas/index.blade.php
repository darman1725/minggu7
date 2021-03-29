@extends('mahasiswas.layout')   

@section('content')      
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
            <?php $no = 0;?>
            @foreach ($mahasiswas as $Mahasiswa)
            <?php $no++;?>
            <tr> 
                <td class="text-center">{{ $no }}</td>             
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
    <ul class="pagination justify-content-center">
    <a class="btn btn-success mt-3" href="{{ route('mahasiswas.index') }}">Kembali</a> 
@endsection 



