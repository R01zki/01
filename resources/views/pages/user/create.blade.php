@extends('layouts.app')
@section('content')
<h5>Tambah User</h5>
<div class="row">
    <div class="col-md-6">


        <div id="card-advance" class="card card-default">

            <div class="card-body">
                <form action="">
                    <div class="form-group">
                        <label>Nama</label>
                        <span class="help">e.g. "Mas Joko"</span>
                        <input type="text" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <span class="help">e.g. "Mas Joko"</span>
                        <input type="email" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <span class="help">e.g. "Mas Joko"</span>
                        <input type="password" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <span class="help">e.g. "Mas Joko"</span>
                        <textarea class="form-control" required=""> </textarea>
                    </div>

                    <button class="btn btn-success btn-con">Simpan</button>
                    <button class="btn btn-default btn-con">Batal</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection