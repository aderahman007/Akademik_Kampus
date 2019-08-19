<div class="form-group row">
    <label class="col-md-2 col-form-label text-md-right">Nama Dosen</label>

    <div class="col-md-8">
        {{ Form::text('nama',null,['class'=>'form-control','placeholder'=>'Nama Dosen']) }}
    </div>
</div>

<div class="form-group row">
    <label class="col-md-2 col-form-label text-md-right">Email</label>

    <div class="col-md-6">
        {{ Form::text('email',null,['class'=>'form-control','placeholder'=>'Email']) }}
    </div>
</div>

<div class="form-group row">
    <label class="col-md-2 col-form-label text-md-right">NO HP</label>

    <div class="col-md-2">
        {{ Form::text('no_hp',null,['class'=>'form-control','placeholder'=>'No HP']) }}
    </div>
</div>