@extends('layout.backend')
@section('content')
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Thông báo
  </h1>
  
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">		  
		  <div class="panel-body"><?php echo $settingArr['thong_bao_chung']; ?></div>
		</div>
      <!-- /.box -->     
    </div>
    <!-- /.col -->  
  </div> 
</section>
<!-- /.content -->
</div>
<div class="col-md-12">
@if($settingArr['thong_bao_chung'])
	
@endif
</div>

@stop