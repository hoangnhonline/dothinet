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
      <li class="active">Thêm mới</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <a class="btn btn-default btn-sm" href="{{ route('product.index', ['estate_type_id' => $estate_type_id, 'type' => $type]) }}" style="margin-bottom:5px">Quay lại</a>    
    <form role="form" method="POST" action="{{ route('product.store') }}" id="dataForm">
    <div class="row">
      <!-- left column -->      
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
                                <option value="1" {{ old('type', $type) == 1 ? "selected" : "" }}>Bán</option>
                                <option value="2" {{ old('type', $type) == 2 ? "selected" : "" }}>Cho thuê</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6 none-padding">
                          <label for="email">Danh mục<span class="red-star">*</span></label>
                          <select class="form-control" name="estate_type_id" id="estate_type_id">
                            <option value="">--Chọn--</option>
                            @foreach( $estateTypeArr as $value )
                            <option value="{{ $value->id }}"
                            {{ old('estate_type_id') == $value->id ? "selected" : "" }}                           

                            >{{ $value->name }}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="form-group col-md-6  pleft-5">
                          <label for="email">Quận <span class="red-star">*</span></label>
                            <select class="form-control" name="district_id" id="district_id">
                                @foreach( $districtList as $value )
                                <option value="{{ $value->id }}"
                                {{ old('district_id', $district_id) == $value->id ? "selected" : "" }}                           

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
                            {{ old('ward_id') == $value->id ? "selected" : "" }}                           

                            >{{ $value->name }}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="form-group col-md-6  pleft-5">
                          <label for="email">Đường</label>
                            <select class="form-control" name="street_id" id="street_id">
                                @foreach( $streetList as $value )
                                <option value="{{ $value->id }}"
                                {{ old('street_id') == $value->id ? "selected" : "" }}                           

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
                            {{ old('project_id') == $value->id ? "selected" : "" }}
                            >{{ $value->name }}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="form-group" >                  
                          <label>Tên <span class="red-star">*</span></label>
                          <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}">
                        </div>
                        <div class="form-group">                  
                          <label>Slug <span class="red-star">*</span></label>                  
                          <input type="text" class="form-control" name="slug" id="slug" value="{{ old('slug') }}">
                        </div>
                        <div class="form-group col-md-6  pleft-5" >                  
                            <label>Giá<span class="red-star">*</span></label>
                            <input type="text" class="form-control" name="price" id="price" value="{{ old('price') }}">
                        </div>
                        <div class="form-group col-md-6 none-padding" >                  
                            <label>Đơn vị giá<span class="red-star">*</span></label>
                            <select class="form-control" name="price_unit_id" id="price_unit_id">
                              <option value="">--Chọn--</option>
                              @foreach( $priceUnitList as $value )
                              <option value="{{ $value->id }}"
                              {{ old('price_unit_id') == $value->id ? "selected" : "" }}                           

                              >{{ $value->name }}</option>
                              @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4 none-padding">
                          <label>Diện tích</label>                  
                          <input type="text" class="form-control" name="area" id="area" value="{{ old('area') }}">                        
                        </div>
                        <div class="form-group col-md-4 none-padding pleft-5">
                            <label>Địa điểm</label>
                             <input type="text" class="form-control" name="full_address" id="full_address" value="{{ old('full_address') }}">  
                        </div>
                        <div class=" form-group col-md-4 none-padding pleft-5">
                          <label>Mặt tiền<span class="red-star">*</span></label>                  
                          <input type="text" class="form-control" name="front_face" id="front_face" value="{{ old('front_face') }}">                        
                        </div>
                        <div class="form-group col-md-4 none-padding">
                          <label>Đường trước nhà<span class="red-star">*</span></label>                  
                          <input type="text" class="form-control" name="street_wide" id="street_wide" value="{{ old('street_wide') }}">                        
                        </div>
                        <div class="form-group col-md-4 none-padding pleft-5">
                          <label>Số tầng<span class="red-star">*</span></label>                  
                          <input type="text" class="form-control" name="no_floor" id="no_floor" value="{{ old('no_floor') }}">                        
                        </div>
                        <div class="form-group col-md-4 none-padding pleft-5">
                          <label>Số phòng<span class="red-star">*</span></label>                  
                          <input type="text" class="form-control" name="no_room" id="no_room" value="{{ old('no_room') }}">                        
                        </div>
                        <div class="input-group">
                        <label>Tags</label>
                        <select class="form-control select2" name="tags[]" id="tags" multiple="multiple">                  
                          @if( $tagArr->count() > 0)
                            @foreach( $tagArr as $value )
                            <option value="{{ $value->id }}" {{ (old('tags') && in_array($value->id, old('tags'))) ? "selected" : "" }}>{{ $value->name }}</option>
                            @endforeach
                          @endif
                        </select>
                        <span class="input-group-btn">
                          <button style="margin-top:24px" class="btn btn-primary" id="btnAddTag" type="button" data-value="3">
                            Tạo mới
                          </button>
                        </span>
                      </div>
                        <div class="form-group form-group col-md-12 none-padding">
                            <label>Mô tả</label>
                            <textarea class="form-control" rows="4" name="description" id="description">{{ old('description') }}</textarea>
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
                            <div id="div-image" style="margin-top:10px"></div>
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
              <a class="btn btn-default" class="btn btn-primary" href="{{ route('product.index', ['estate_type_id' => $estate_type_id, 'type' => $type])}}">Hủy</a>
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
              <div class="form-group">
                <label>Meta title </label>
                <input type="text" class="form-control" name="meta_title" id="meta_title" value="{{ old('meta_title') }}">
              </div>
              <!-- textarea -->
              <div class="form-group">
                <label>Meta desciption</label>
                <textarea class="form-control" rows="6" name="meta_description" id="meta_description">{{ old('meta_description') }}</textarea>
              </div>  

              <div class="form-group">
                <label>Meta keywords</label>
                <textarea class="form-control" rows="4" name="meta_keywords" id="meta_keywords">{{ old('meta_keywords') }}</textarea>
              </div>  
              <div class="form-group">
                <label>Custom text</label>
                <textarea class="form-control" rows="6" name="custom_text" id="custom_text">{{ old('custom_text') }}</textarea>
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
<!-- Modal -->
<div id="tagModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
    <form method="POST" action="{{ route('tag.ajax-save') }}" id="formAjaxTag">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tạo mới tag</h4>
      </div>
      <div class="modal-body" id="contentTag">
          <input type="hidden" name="type" value="1">
           <!-- text input -->
          <div class="col-md-12">
            <div class="form-group">
              <label>Tags<span class="red-star">*</span></label>
              <textarea class="form-control" name="str_tag" id="str_tag" rows="4" >{{ old('str_tag') }}</textarea>
            </div>
            
          </div>
          <div classs="clearfix"></div>
      </div>
      <div style="clear:both"></div>
      <div class="modal-footer" style="text-align:center">
        <button type="button" class="btn btn-primary" id="btnSaveTagAjax"> Save</button>
        <button type="button" class="btn btn-default" data-dismiss="modal" id="btnCloseModalTag">Close</button>
      </div>
      </form>
    </div>

  </div>
</div>
<input type="hidden" id="route_upload_tmp_image_multiple" value="{{ route('image.tmp-upload-multiple') }}">
<input type="hidden" id="route_upload_tmp_image" value="{{ route('image.tmp-upload') }}">
<style type="text/css">
  .nav-tabs>li.active>a{
    color:#FFF !important;
    background-color: #3C8DBC !important;
  }

</style>
@stop
@section('javascript_page')
<script type="text/javascript">
$(document).ready(function(){
  $('#btnAddTag').click(function(){
      $('#tagModal').modal('show');
  });
});
$(document).on('click', '.remove-image', function(){
  if( confirm ("Bạn có chắc chắn không ?")){
    $(this).parents('.col-md-3').remove();
  }
});
$(document).on('click', '#btnSaveTagAjax', function(){
    $.ajax({
      url : $('#formAjaxTag').attr('action'),
      data: $('#formAjaxTag').serialize(),
      type : "post", 
      success : function(str_id){          
        $('#btnCloseModalTag').click();
        $.ajax({
          url : "{{ route('tag.ajax-list') }}",
          data: { 
            type : 1 ,
            tagSelected : $('#tags').val(),
            str_id : str_id
          },
          type : "get", 
          success : function(data){
              $('#tags').html(data);
              $('#tags').select2('refresh');
              
          }
        });
      }
    });
 }); 
 $('#contentTag #name').change(function(){
       var name = $.trim( $(this).val() );
       if( name != '' && $('#contentTag #slug').val() == ''){
          $.ajax({
            url: $('#route_get_slug').val(),
            type: "POST",
            async: false,      
            data: {
              str : name
            },              
            success: function (response) {
              if( response.str ){                  
                $('#contentTag #slug').val( response.str );
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

$(document).on('click', '.checkSelect', function(){
  var type = $('#search_type').val();
  var obj = $(this);
  if( type == "phukien"){
    var str_sp_phukien = $('#str_sp_phukien').val();
    if(obj.prop('checked') == true){
      str_sp_phukien += obj.val() + ',';
    }else{
      var str = obj.val() + ',';
      str_sp_phukien = str_sp_phukien.replace(str, '');
    }
    $('#str_sp_phukien').val(str_sp_phukien);
  }else if( type == "tuongtu"){
    var str_sp_tuongtu = $('#str_sp_tuongtu').val();
    if(obj.prop('checked') == true){
      str_sp_tuongtu += obj.val() + ',';
    }else{
      var str = obj.val() + ',';
      str_sp_tuongtu = str_sp_tuongtu.replace(str, '');
    }
    $('#str_sp_tuongtu').val(str_sp_tuongtu);
  }else{ // so sanh
    var str_sp_sosanh = $('#str_sp_sosanh').val();
    if(obj.prop('checked') == true){
      str_sp_sosanh += obj.val() + ',';
    }else{
      var str = obj.val() + ',';
      str_sp_sosanh = str_sp_sosanh.replace(str, '');
    }
    $('#str_sp_sosanh').val(str_sp_sosanh);
  }
});
$(document).on('click', '.btnRemoveRelated', function(){
  if( confirm ("Bạn có chắc chắn không ?")){
    var obj = $(this);
    var type = obj.attr('data-type');
    var value = obj.attr('data-value');
    var str_sp = $('#str_sp_' + type).val();
    console.log(str_sp);
      var str = value + ',';
      console.log(value);
      console.log(str);
      str_sp = str_sp.replace(str, '');
    console.log(str_sp);
    $('#str_sp_' + type).val(str_sp);
    $('#row-'+ type + '-' + value).remove();
    



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
$(document).on('click', 'button.btnSaveSearch',function(){
  var type = $('#search_type').val();  
  if (type == "phukien"){
    str_value = $('#str_sp_phukien').val();
  }else if( type == "tuongtu"){
    str_value = $('#str_sp_tuongtu').val();
  }else{
    str_value = $('#str_sp_sosanh').val();
  }
  if( str_value != '' ){
    
    $.ajax({
          url: '{{ route("product.ajax-save-related") }}',
          type: "POST",
          async: true,      
          data: {          
            type : type,    
            str_value : str_value,
            _token: "{{ csrf_token() }}"
          },     
          success: function (response) {
            if (type == "phukien"){
              
              $('#dataPhuKien').html(response);

            }else if( type == "tuongtu"){

              $('#dataTuongTu').html(response);

            }else{

              $('#dataSoSanh').html(response);

            }
            $('#myModalSearch').modal('hide');
            
          }
    });
    
  }else{
    alert('Vui lòng chọn ít nhất 1 sản phẩm.');
    return false;
  }

});
    $(document).ready(function(){
      $('#btnUploadPro').click(function(){        
        $('#file-pro').click();
      });      
      var files = "";
      $('#file-pro').change(function(e){
         files = e.target.files;
         
         if(files != ''){
           var dataForm = new FormData();        
          $.each(files, function(key, value) {
             dataForm.append('file', value);
          });   
          
          dataForm.append('date_dir', 1);
          dataForm.append('folder', 'tmp');

          $.ajax({
            url: $('#route_upload_tmp_image').val(),
            type: "POST",
            async: false,      
            data: dataForm,
            processData: false,
            contentType: false,
            success: function (response) {
              if(response.image_path){
                $('#thumbnail_image_pro').attr('src',$('#upload_url').val() + response.image_path);
                $( '#image_pro' ).val( response.image_path );
                $( '#pro_name' ).val( response.image_name );
              }
              console.log(response.image_path);
                //window.location.reload();
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
        $('#btnSave').hide();
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
