<div class="form-group row">
    <label class="col-md-2 col-form-label text-md-right">Nama Tahun Akademik</label>

    <div class="col-md-8">
        {{ Form::text('nama_tahun_akademik',null,['class'=>'form-control','placeholder'=>'Nama Tahun Akademik']) }}
    </div>
</div>

<div class="form-group row">
    <label class="col-md-2 col-form-label text-md-right">Status</label>

    <div class="col-md-8">
        {{ Form::select('Status',['y'=>'Aktif','n'=>'Tidak Aktif'],null,['class'=>'form-control']) }}
    </div>
</div>
