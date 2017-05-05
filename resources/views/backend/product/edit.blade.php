@extends('layout.backend')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Sản phẩm    
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="{{ route('product.index') }}">Sản phẩm</a></li>
      <li class="active">Chỉnh sửa</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <a class="btn btn-default btn-sm" href="{{ route('product.index', ['estate_type_id' => $detail->estate_type_id, 'cate_id' => $detail->cate_id]) }}" style="margin-bottom:5px">Quay lại</a>
    <a class="btn btn-primary btn-sm" href="{{ route('chi-tiet', $detail->slug ) }}" target="_blank" style="margin-top:-6px"><i class="fa fa-eye" aria-hidden="true"></i> Xem</a>
    <form role="form" method="POST" action="{{ route('product.update') }}" id="dataForm">
    <div class="row">
      <!-- left column -->
      <input type="hidden" name="id" value="{{ $detail->id }}">
      <div class="col-md-8">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Chỉnh sửa</h3>
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
                <div>

                  <!-- Nav tabs -->
                  <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Thông tin chi tiết</a></li>
                    <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Hình ảnh</a></li>
                                    
                  </ul>

                  <!-- Tab panes -->
                  <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="home">
                      <div class="form-group col-md-6  pleft-5">
                          <label for="email">Loại <span class="red-star">*</span></label>
                            <select class="form-control" name="type" id="type">
                                <option value="1" {{ old('type', $detail->type) == 1 ? "selected" : "" }}>Bán</option>
                                <option value="2" {{ old('type', $detail->type) == 2 ? "selected" : "" }}>Cho thuê</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6 none-padding">
                          <label for="email">Danh mục<span class="red-star">*</span></label>
                          <select class="form-control" name="estate_type_id" id="estate_type_id">
                            <option value="">--Chọn--</option>
                            @foreach( $estateTypeArr as $value )
                            <option value="{{ $value->id }}"
                            {{ old('estate_type_id', $detail->estate_type_id) == $value->id ? "selected" : "" }}                           

                            >{{ $value->name }}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="form-group col-md-6  pleft-5">
                          <label for="email">Quận <span class="red-star">*</span></label>
                            <select class="form-control" name="district_id" id="district_id">
                                @foreach( $districtList as $value )
                                <option value="{{ $value->id }}"
                                {{ old('district_id', $detail->district_id) == $value->id ? "selected" : "" }}                           

                                >{{ $value->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6 none-padding">
                          <label for="email">Phường</label>
                          <select class="form-control" name="ward_id" id="ward_id">
                            <option value="">--Chọn--</option>
                            @foreach( $wardList as $value )
                            <option value="{{ $value->id }}"
                            {{ old('ward_id', $detail->ward_id) == $value->id ? "selected" : "" }}                           

                            >{{ $value->name }}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="form-group col-md-6  pleft-5">
                          <label for="email">Đường</label>
                            <select class="form-control" name="street_id" id="street_id">
                                @foreach( $streetList as $value )
                                <option value="{{ $value->id }}"
                                {{ old('street_id', $detail->street_id) == $value->id ? "selected" : "" }}                           

                                >{{ $value->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6 none-padding">
                          <label for="email">Dự án</label>
                          <select class="form-control" name="project_id" id="project_id">
                            <option value="">--Chọn--</option>
                            @foreach( $projectList as $value )
                            <option value="{{ $value->id }}"
                            {{ old('project_id', $detail->project_id) == $value->id ? "selected" : "" }}
                            >{{ $value->name }}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="form-group" >                  
                          <label>Tên <span class="red-star">*</span></label>
                          <input type="text" class="form-control" name="title" id="title" value="{{ old('title', $detail->title) }}">
                        </div>
                        <div class="form-group">                  
                          <label>Slug <span class="red-star">*</span></label>                  
                          <input type="text" class="form-control" name="slug" id="slug" value="{{ old('slug', $detail->slug) }}">
                        </div>
                        <div class="form-group col-md-6  pleft-5" >                  
                            <label>Giá<span class="red-star">*</span></label>
                            <input type="text" class="form-control" name="price" id="price" value="{{ old('price', $detail->price) }}">
                        </div>
                        <div class="form-group col-md-6 none-padding" >                  
                            <label>Đơn vị giá<span class="red-star">*</span></label>
                            <select class="form-control" name="price_unit_id" id="price_unit_id">
                              <option value="">--Chọn--</option>
                              @foreach( $priceUnitList as $value )
                              <option value="{{ $value->id }}"
                              {{ old('price_unit_id', $detail->price_unit_id) == $value->id ? "selected" : "" }}                           

                              >{{ $value->name }}</option>
                              @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4 none-padding">
                          <label>Diện tích</label>                  
                          <input type="text" class="form-control" name="area" id="area" value="{{ old('area', $detail->area) }}">                        
                        </div>
                        <div class="form-group col-md-4 none-padding pleft-5">
                            <label>Địa điểm</label>
                             <input type="text" class="form-control" name="full_address" id="full_address" value="{{ old('full_address', $detail->full_address) }}">  
                        </div>
                        <div class=" form-group col-md-4 none-padding pleft-5">
                          <label>Mặt tiền<span class="red-star">*</span></label>                  
                          <input type="text" class="form-control" name="front_face" id="front_face" value="{{ old('front_face', $detail->front_face) }}">                        
                        </div>
                        <div class="form-group col-md-4 none-padding">
                          <label>Đường trước nhà<span class="red-star">*</span></label>                  
                          <input type="text" class="form-control" name="street_wide" id="street_wide" value="{{ old('street_wide', $detail->street_wide) }}">                        
                        </div>
                        <div class="form-group col-md-4 none-padding pleft-5">
                          <label>Số tầng<span class="red-star">*</span></label>                  
                          <input type="text" class="form-control" name="no_floor" id="no_floor" value="{{ old('no_floor', $detail->no_floor) }}">                        
                        </div>
                        <div class="form-group col-md-4 none-padding pleft-5">
                          <label>Số phòng<span class="red-star">*</span></label>                  
                          <input type="text" class="form-control" name="no_room" id="no_room" value="{{ old('no_room', $detail->no_room) }}">                        
                        </div>
                        <div class="form-group form-group col-md-12 none-padding">
                            <label>Mô tả</label>
                            <textarea class="form-control" rows="4" name="description" id="description">{{ old('description', $detail->description) }}</textarea>
                          </div>
                          <div class="clearfix"></div>
                        <div class="clearfix"></div>
                    </div><!--end thong tin co ban-->                    
                      
                     <div role="tabpanel" class="tab-pane" id="settings">
                        <div class="form-group" style="margin-top:10px;margin-bottom:10px">  
                         
                          <div class="col-md-12" style="text-align:center">                            
                            
                            <input type="file" id="file-image"  style="display:none" multiple/>
                         
                            <button class="btn btn-primary" id="btnUploadImage" type="button"><span class="glyphicon glyphicon-upload" aria-hidden="true"></span> Upload</button>
                            <div class="clearfix"></div>
                            <div id="div-image" style="margin-top:10px">                              
                              @if( $hinhArr )
                                @foreach( $hinhArr as $k => $hinh)
                                  <div class="col-md-3">
                                    <img class="img-thumbnail" src="{{ Helper::showImage($hinh) }}" style="width:100%">
                                    <div class="checkbox">                                   
                                      <label><input type="radio" name="thumbnail_id" class="thumb" value="{{ $k }}" {{ $detail->thumbnail_id == $k ? "checked" : "" }}> Ảnh đại diện </label>
                                      <button class="btn btn-danger btn-sm remove-image" type="button" data-value="{{  $hinh }}" data-id="{{ $k }}" >Xóa</button>
                                    </div>
                                    <input type="hidden" name="image_id[]" value="{{ $k }}">
                                  </div>
                                @endforeach
                              @endif

                            </div>
                          </div>
                          <div style="clear:both"></div>
                        </div>

                     </div><!--end hinh anh-->
                     
                  </div>

                </div>
                  
            </div>
            <div class="box-footer">
             
              <button type="button" class="btn btn-default" id="btnLoading" style="display:none"><i class="fa fa-spin fa-spinner"></i></button>
              <button type="submit" class="btn btn-primary" id="btnSave">Lưu</button>
              <a class="btn btn-default" class="btn btn-primary" href="{{ route('product.index', ['estate_type_id' => $detail->estate_type_id])}}">Hủy</a>
            </div>
            
        </div>
        <!-- /.box -->     

      </div>
      <div class="col-md-4">      
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Thông tin SEO</h3>
          </div>

          <!-- /.box-header -->
            <div class="box-body">
              <input type="hidden" name="meta_id" value="{{ $detail->meta_id }}">
              <div class="form-group">
                <label>Meta title </label>
                <input type="text" class="form-control" name="meta_title" id="meta_title" value="{{ !empty((array)$meta) ? $meta->title : "" }}">
              </div>
              <!-- textarea -->
              <div class="form-group">
                <label>Meta desciption</label>
                <textarea class="form-control" rows="6" name="meta_description" id="meta_description">{{ !empty((array)$meta) ? $meta->description : "" }}</textarea>
              </div>  

              <div class="form-group">
                <label>Meta keywords</label>
                <textarea class="form-control" rows="4" name="meta_keywords" id="meta_keywords">{{ !empty((array)$meta) ? $meta->keywords : "" }}</textarea>
              </div>  
              <div class="form-group">
                <label>Custom text</label>
                <textarea class="form-control" rows="6" name="custom_text" id="custom_text">{{ !empty((array)$meta) ? $meta->custom_text : ""  }}</textarea>
              </div>
            
          </div>
        <!-- /.box -->     

      </div>
      <!--/.col (left) -->      
    </div>

    </form>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>

<style type="text/css">
  .nav-tabs>li.active>a{
    color:#FFF !important;
    background-color: #3C8DBC !important;
  }

</style>
<input type="hidden" id="route_upload_tmp_image_multiple" value="{{ route('image.tmp-upload-multiple') }}">
<input type="hidden" id="route_upload_tmp_image" value="{{ route('image.tmp-upload') }}">
@stop

@section('javascript_page')
<script type="text/javascript">

$(document).on('click', '.remove-image', function(){
/*  var obj = $(this);
  var is_thumbnail = obj.parents('col-md-3').find("input[name=thumbnail_id]").is(":checked");
  console.log(is_thumbnail);
  */
  if( confirm ("Bạn có chắc chắn không ?")){
    $(this).parents('.col-md-3').remove();
  }
});

$(document).on('click', '#btnSearchAjax', function(){
  filterAjax($('#search_type').val());
});
$(document).on('keypress', '#name_search', function(e){
  if(e.which == 13) {
      e.preventDefault();
      filterAjax($('#search_type').val());
  }
});

    $(document).ready(function(){
     
      
      $('#type').change(function(){
        location.href="{{ route('product.create') }}?type=" + $(this).val();
      })
      $(".select2").select2();
      $('#dataForm').submit(function(){
        /*var no_cate = $('input[name="category_id[]"]:checked').length;
        if( no_cate == 0){
          swal("Lỗi!", "Chọn ít nhất 1 thể loại!", "error");
          return false;
        }
        var no_country = $('input[name="country_id[]"]:checked').length;
        if( no_country == 0){
          swal("Lỗi!", "Chọn ít nhất 1 quốc gia!", "error");
          return false;
        }        
        */
        //$('#btnSave').hide();
        $('#btnLoading').show();
      });
    
      var editor3 = CKEDITOR.replace( 'description',{
          language : 'vi',
          height : 300,
          toolbarGroups : [
            
            { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
            { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
            { name: 'links', groups: [ 'links' ] },           
            '/',
            
          ]
      });
      $('#btnUploadImage').click(function(){        
        $('#file-image').click();
      }); 
     
      var files = "";
      $('#file-image').change(function(e){
         files = e.target.files;
         
         if(files != ''){
           var dataForm = new FormData();        
          $.each(files, function(key, value) {
             dataForm.append('file[]', value);
          });   
          
          dataForm.append('date_dir', 0);
          dataForm.append('folder', 'tmp');

          $.ajax({
            url: $('#route_upload_tmp_image_multiple').val(),
            type: "POST",
            async: false,      
            data: dataForm,
            processData: false,
            contentType: false,
            success: function (response) {
                $('#div-image').append(response);
                if( $('input.thumb:checked').length == 0){
                  $('input.thumb').eq(0).prop('checked', true);
                }
            },
            error: function(response){                             
                var errors = response.responseJSON;
                for (var key in errors) {
                  
                }
                //$('#btnLoading').hide();
                //$('#btnSave').show();
            }
          });
        }
      });
     

      $('#title').change(function(){
         var name = $.trim( $(this).val() );
         if( name != '' && $('#slug').val() == ''){
            $.ajax({
              url: $('#route_get_slug').val(),
              type: "POST",
              async: false,      
              data: {
                str : name
              },              
              success: function (response) {
                if( response.str ){                  
                  $('#slug').val( response.str );
                }                
              },
              error: function(response){                             
                  var errors = response.responseJSON;
                  for (var key in errors) {
                    
                  }
                  //$('#btnLoading').hide();
                  //$('#btnSave').show();
              }
            });
         }
      }); 
      
    });
    
</script>
@stop
