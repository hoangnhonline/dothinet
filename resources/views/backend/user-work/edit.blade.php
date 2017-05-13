@extends('layout.backend')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Công việc    
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="{{ route('user-work.index') }}">Công việc</a></li>
      <li class="active">Chỉnh sửa</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <a class="btn btn-default" href="{{ route('user-work.index') }}" style="margin-bottom:5px">Quay lại</a>
    <form role="form" method="POST" action="{{ route('user-work.update') }}">
    <input type="hidden" name="id" value="{{ $detail->id }}">
    <div class="row">
      <!-- left column -->

      <div class="col-md-7">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Nội dung công việc : <span style="color:red">{{ $detailUser->full_name }}</span> ngày <span style="color:blue">{{ $detail->work_date }}</span></h3>
          </div>
          <!-- /.box-header -->               
            {!! csrf_field() !!}

            <div class="box-body">
              @if(Session::has('message'))
              <p class="alert alert-info" >{{ Session::get('message') }}</p>
              @endif
              @if (count($errors) > 0)
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif                 
                @if(Auth::user()->role > 1)
                <div class="form-group" style="border: 1px solid #CCC;padding: 10px; border-radius:5px">
                  <p><?php echo $detail->work_content; ?></p>
                </div>
                <div class="form-group">
                  <label>Trạng thái</label>
                  <select class="form-control" name="status" id="status">                                      
                    <option value="1" {{ old('status', $detail->status) == 1 ? "selected" : "" }}>Mới</option>                  
                    <option value="2" {{ old('status', $detail->status) == 2 ? "selected" : "" }}>Đã duyệt</option>  
                    <option value="3" {{ old('status', $detail->status) == 3 ? "selected" : "" }}>Không duyệt duyệt</option>                   
                  </select>
                </div>
                <div class="form-group">
                  <label>Nhận xét</label>
                  <textarea class="form-control" rows="4" name="leader_comment" id="leader_comment">{{ old('leader_comment', $detail->leader_comment) }}</textarea>
                </div>
                @else
                <div class="form-group" >
                  
                  <label>Ngày<span class="red-star">*</span></label>
                  <input type="text" class="form-control datepicker" name="work_date" id="work_date" value="{{ old('work_date', $detail->work_date) }}">
                </div>                
                
              
                <div class="form-group">
                  <label>Công việc</label>
                  <textarea class="form-control" rows="4" name="work_content" id="work_content">{{ old('work_content', $detail->work_content) }}</textarea>
                </div>
                @endif
                  
            </div>          
          
            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Lưu</button>
              <a class="btn btn-default" class="btn btn-primary" href="{{ route('user-work.index')}}">Hủy</a>
            </div>
                
            
        </div>
        <!-- /.box -->     

      </div>
      <div class="col-md-5">
       
         

      </div>
      <!--/.col (left) -->      
    </div>
    </form>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>


@stop
@section('javascript_page')
<script type="text/javascript">
    $(document).ready(function(){
      $('.datepicker').datepicker({ dateFormat: 'dd-mm-yy' });
      $(".select2").select2();      
      @if(Auth::user()->role > 1)
      var editor = CKEDITOR.replace( 'leader_comment',{
          language : 'vi',    
          height : 300
      });
      @else
      var editor = CKEDITOR.replace( 'work_content',{
          language : 'vi',    
          height : 300
      });
      @endif
    });
    
</script>
@stop