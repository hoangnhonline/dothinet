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
      <li class="active"><span class="glyphicon glyphicon-pencil"></span></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <a class="btn btn-default btn-sm" href="{{ route('product.index', ['estate_type_id' => $detail->estate_type_id, 'cate_id' => $detail->cate_id]) }}" style="margin-bottom:5px">Quay lại</a>
    <a class="btn btn-primary btn-sm" href="{{ route('chi-tiet', [$detailEstate->slug, $detail->slug, $detail->id] ) }}" target="_blank" style="margin-top:-6px"><i class="fa fa-eye" aria-hidden="true"></i> Xem</a>
    <form role="form" method="POST" action="{{ route('product.update') }}" id="dataForm">
    <div class="row">
      <!-- left column -->
      <input type="hidden" name="id" value="{{ $detail->id }}">
      <div class="col-md-8">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title"><span class="glyphicon glyphicon-pencil"></span></h3>
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
                    <li role="presentation"><a href="#lien-he" aria-controls="tien-ich" role="tab" data-toggle="tab">Thông tin liên hệ</a></li>
                    <li role="presentation"><a href="#tien-ich" aria-controls="tien-ich" role="tab" data-toggle="tab">Tiện ích</a></li>
                    <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Hình ảnh</a></li>
                    <li role="presentation"><a href="#ban-do" aria-controls="ban-do" role="tab" data-toggle="tab">Bản đồ</a></li>
                                    
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
                        <div class="form-group col-md-12 none-padding">
                            <label>Địa chỉ</label>
                             <input type="text" class="form-control" name="full_address" id="full_address" value="{{ old('full_address', $detail->full_address) }}">  
                        </div>
                        <div class="form-group col-md-4 none-padding">
                          <label>Diện tích</label>                  
                          <input type="text" class="form-control" name="area" id="area" value="{{ old('area', $detail->area) }}">                        
                        </div>
                        
                        <div class=" form-group col-md-4 none-padding pleft-5">
                          <label>Mặt tiền</label>                  
                          <input type="text" class="form-control" name="front_face" id="front_face" value="{{ old('front_face', $detail->front_face) }}">                        
                        </div>
                        <div class="form-group col-md-4 none-padding pleft-5">
                          <label>Đường trước nhà</label>                  
                          <input type="text" class="form-control" name="street_wide" id="street_wide" value="{{ old('street_wide', $detail->street_wide) }}">                        
                        </div>
                        <div class="form-group col-md-3 none-padding pleft-5">
                          <label>Số tầng</label>                  
                          <input type="text" class="form-control" name="no_floor" id="no_floor" value="{{ old('no_floor', $detail->no_floor) }}">                        
                        </div>
                        <div class="form-group col-md-3 none-padding pleft-5">
                          <label>Số phòng</label>                  
                          <input type="text" class="form-control" name="no_room" id="no_room" value="{{ old('no_room', $detail->no_room) }}">                        
                        </div>
                        <div class="form-group col-md-3 none-padding pleft-5">
                          <label>Số WC</label>                  
                          <input type="text" class="form-control" name="no_room" id="no_room" value="{{ old('no_room', $detail->no_room) }}">                        
                        </div>
                        <div class="form-group col-md-3 none-padding pleft-5">
                          <label>Hướng</label>                  
                          <select class="form-control" name="direction_id" id="direction_id">
                            @if( $directionArr->count() > 0)
                              @foreach( $directionArr as $value )
                              <option value="{{ $value->id }}" {{ old('direction_id', $detail->direction_id) == $value->id  ? "selected" : "" }}>{{ $value->name }}</option>
                              @endforeach
                            @endif
                          </select>                       
                        </div>
                        <div class="form-group col-md-12 none-padding" >                  
                            <label>Trạng thái<span class="red-star">*</span></label>
                            <select class="form-control" name="cart_status" id="cart_status">
                              <option value="1" {{ old('cart_status', $detail->cart_status) == 1 ? "selected" : "" }}>
                                {{ $detail->type == 1 ? "Chưa bán" : "Còn trống" }}
                              </option>
                              <option value="2" {{ old('cart_status', $detail->cart_status) == 2 ? "selected" : "" }}>
                                {{ $detail->type == 1 ? "Đã bán" : "Đã thuê" }}
                              </option>                              
                            </select>
                        </div>
                        <div class="input-group">
                          <label>Tags</label>
                          <select class="form-control select2" name="tags[]" id="tags" multiple="multiple">                  
                            @if( $tagArr->count() > 0)
                              @foreach( $tagArr as $value )
                              <option value="{{ $value->id }}" {{ in_array($value->id, $tagSelected) || (old('tags') && in_array($value->id, old('tags'))) ? "selected" : "" }}>{{ $value->name }}</option>
                              @endforeach
                            @endif
                          </select>
                          <span class="input-group-btn">
                            <button style="margin-top:24px" class="btn btn-primary" id="btnAddTag" type="button" data-value="3">
                              Tạo mới
                            </button>
                          </span>
                        </div>
                        <div class="form-group form-group col-md-12 none-padding" style="margin-top:10px">
                            <label>Mô tả</label>
                            <textarea class="form-control" rows="4" name="description" id="description">{{ old('description', $detail->description) }}</textarea>
                          </div>
                          <div class="clearfix"></div>
                        <div class="clearfix"></div>
                    </div><!--end thong tin co ban--> 
                    <div role="tabpanel" class="tab-pane" id="lien-he">
                        <div class="form-group col-md-6 " >                  
                            <label>Họ tên</label>
                            <input type="text" class="form-control" name="contact_name" id="contact_name" value="{{ old('contact_name', $detail->contact_name) }}">
                        </div>
                        <div class="form-group col-md-6 none-padding pleft-5" >                  
                            <label>Địa chỉ</label>
                            <input type="text" class="form-control" name="contact_address" id="contact_address" value="{{ old('contact_address', $detail->contact_address) }}">
                        </div>                        
                        <div class="form-group col-md-6 " >                  
                            <label>Điện thoại</label>
                            <input type="text" class="form-control" name="contact_phone" id="contact_phone" value="{{ old('contact_phone', $detail->contact_phone) }}">
                        </div>
                        <div class="form-group col-md-6 none-padding pleft-5" >                  
                            <label>Di động</label>
                            <input type="text" class="form-control" name="contact_mobile" id="contact_mobile" value="{{ old('contact_mobile', $detail->contact_mobile) }}">
                        </div>
                        <div class="form-group col-md-12 " >                  
                            <label>Email</label>
                            <input type="text" class="form-control" name="contact_email" id="contact_email" value="{{ old('contact_email', $detail->contact_email) }}">
                        </div>
                        <div class="clearfix"></div>
                     </div><!--end lien he -->                       
                      <div role="tabpanel" class="tab-pane" id="tien-ich">
                        <div class="form-group" style="margin-top:10px;margin-bottom:10px" id="load-tien-ich"> 
                              @if($tienIchLists)
                                <?php $i_ti = 0; ?>
                                @foreach($tienIchLists as $ti)
                                <?php $i_ti++; ?>
                                <div class="col-md-4">
                                  <input type="checkbox" value="{{ $ti->id }}" {{ in_array($value->id, $tienIchSelected) || (old('tien_ich') && in_array($value->id, old('tien_ich'))) ? "selected" : "" }} name="tien_ich[]" id="tien_ich_{{ $i_ti }}"> 
                                  <label style="cursor:poiter;text-transform:uppercase; font-weight:normal" for="tien_ich_{{ $i_ti }}">{{ $ti->name }}</label>
                                </div>
                                @endforeach 
                              @else
                              <p>Chưa có tiện ích nào.</p>
                              @endif
                              <div class="clearfix"></div>
                        </div>

                     </div><!--end tien ich-->
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
                                      <button class="btn btn-danger btn-sm remove-image" type="button" data-value="{{  $hinh }}" data-id="{{ $k }}" ><span class="glyphicon glyphicon-trash"></span></button>
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
                     <div role="tabpanel" class="tab-pane" id="ban-do">
                        <div class="form-group" style="margin-top:10px;margin-bottom:10px"> 
                         <div id="panel" style="margin-left: -260px" style="line-height: normal">
                              <input id="searchTextField" type="text" size="50" style="height: 20px;">
                          </div>
                          <div id="map-canvas"></div>
                        </div>

                     </div><!--end ban do-->
                  </div>

                </div>
                  
            </div>
            <div class="box-footer">
              <input type="hidden" name="latt" id="latitude" value="{{ old('latt', $detail->latt) }}" />
              <input type="hidden" name="longt" id="longitude" value="{{ old('longt', $detail->longt) }}" />
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
<style>
      #map-canvas, #map_canvas {
        height: 350px;
        width:100%;
    }

    @media print {
        html, body {
            height: auto;
        }

        #map-canvas, #map_canvas {
            height: 350px;
            width:100%;
        }
    }

    #panel {
        position: absolute;
        left: 60%;
        margin-left: -100px;
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
    }
    input {
        border: 1px solid  rgba(0, 0, 0, 0.5);
    }
    input.notfound {
        border: 2px solid  rgba(255, 0, 0, 0.4);
    }
</style>
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
@stop

@section('javascript_page')
<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAhxs7FQ3DcyDm8Mt7nCGD05BjUskp_k7w&amp;libraries=places"></script>
<script type="text/javascript">


$(document).ready(function(){
  var geocoder = new google.maps.Geocoder();

    function geocodePosition(pos) {
        geocoder.geocode({
            latLng: pos
        }, function(responses) {
        });
    }
    function initialize() {
        @if($detail->longt && $detail->latt)
        var latLng = new google.maps.LatLng({{ $detail->longt }}, {{ $detail->latt }});        
        @else
        var latLng = new google.maps.LatLng(10.753151, 106.73088499999994);
        @endif
        
        var mapOptions = {
            center: latLng,
            zoom: 17,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map = new google.maps.Map(document.getElementById('map-canvas'),
                mapOptions);
        var input = /** @type {HTMLInputElement} */(document.getElementById('searchTextField'));
        var autocomplete = new google.maps.places.Autocomplete(input);

        autocomplete.bindTo('bounds', map);

        var marker = new google.maps.Marker({
            map: map,
            position: latLng
        });
        geocodePosition(marker.getPosition());
            pos = marker.getPosition();

            var latitude = 0;
            var longitude = 0;
            var countIndex = 0;
            $.each(pos, function(index, value) {
                countIndex++;
                if(countIndex==1) latitude = value;
                if(countIndex==2) {longitude = value;return;}
            });

            geocoder.geocode({
                latLng: pos
            }, function(responses) {
                if (responses && responses.length > 0) {
                    $('#latitude').val(latitude);
                    $('#longitude').val(longitude);
                }
            });
        marker.setDraggable(true);
        geocodePosition(latLng);

        google.maps.event.addListener(marker, 'dragend', function() {
            geocodePosition(marker.getPosition());
            pos = marker.getPosition();


            var latitude = 0;
            var longitude = 0;
            var countIndex = 0;
            $.each(pos, function(index, value) {
                countIndex++;
                if(countIndex==1) latitude = value;
                if(countIndex==2) {longitude = value;return;}
            });


            geocoder.geocode({
                latLng: pos
            }, function(responses) {
                if (responses && responses.length > 0) {
                    $('#latitude').val(latitude);
                    $('#longitude').val(longitude);
                }
            });
        });

        google.maps.event.addListener(autocomplete, 'place_changed', function() {
            marker.setVisible(false);
            input.className = '';
            var place = autocomplete.getPlace();
            if (!place.geometry) {
                // Inform the user that the place was not found and return.
                input.className = 'notfound';
                return;
            }

            // If the place has a geometry, then present it on a map.
            if (place.geometry.viewport) {
                map.fitBounds(place.geometry.viewport);
            } else {
                map.setCenter(place.geometry.location);
                map.setZoom(17);  // Why 17? Because it looks good.
            }
            marker.setPosition(place.geometry.location);
            marker.setVisible(true);

            // geocodePosition(marker.getPosition());
            pos = marker.getPosition();

            var latitude = 0;
            var longitude = 0;
            var countIndex = 0;
            $.each(pos, function(index, value) {
                    countIndex++;
                    if(countIndex==1) latitude = value;
                    if(countIndex==2) {longitude = value;return;}
            });


            geocoder.geocode({
                latLng: pos
            }, function(responses) {
                if (responses && responses.length > 0) {
                    $('#latitude').val(latitude);
                    $('#longitude').val(longitude);
                }
            });
        });
    }
    google.maps.event.addDomListener(window, 'load', initialize);
$('#searchTextField').on('keypress', function(e) {
        return e.which !== 13;
    });
  $('#btnAddTag').click(function(){
      $('#tagModal').modal('show');
  });
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
