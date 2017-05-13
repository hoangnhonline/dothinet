@extends('frontend.layout')

@section('header')
  @include('frontend.partials.main-header')
  @include('frontend.partials.home-menu')
@endsection
@section('content')
<section class="main" id="site-main">
	<section class="container">
		<section class="row">
			<section class="col-sm-3 col-xs-12 block-sitebar">
				<article class="block-sidebar block-news-sidebar">
					<div class="block-title-common">
						<h3>
							<span class="icon-tile"><i class="fa fa-star"></i></span>
							<a href="#" title="">Hướng Dẫn Sử Dụng</a>
						</h3>
					</div>
					<div class="block-contents">
						<ul class="block-list-sidebar block-icon-title">
							<li><h4><a href="#" title="">Hướng dẫn đăng kí tài khoản</a></h4></li>
							<li><h4><a href="#" title="">Hướng dẫn quản lý tài khoản</a></h4></li>
							<li><h4><a href="#" title="">Hướng dẫn đăng tin</a></h4></li>
							<li><h4><a href="#" title="">Hướng dẫn nạp tiền</a></h4></li>
						</ul>
					</div>
				</article><!-- /block-news-sidebar -->
			</section><!-- /block-site-right -->

			<section class="col-sm-9 col-xs-12 block-sitemain">
					<article class="block-post-news">
						<div class="block-title-common">
							<h3>
								<span class="icon-tile"><i class="fa fa-star"></i></span>
								ĐĂNG TIN RAO BÁN, CHO THUÊ NHÀ ĐẤT
							</h3>
						</div>
						<div class="block-contents">
							<div class="block-post-news">
								<h4 class="titile-post-news">THÔNG TIN CƠ BẢN</h4>
								<form method="" action="" class="block-hover-selectpicker">
									<div class="form-horizontal">
										<div class="form-group">
											<label class="col-sm-3 control-label" style="padding-top: 3px;">Loại tin <span>(*)</span>:</label>
											<div class="col-sm-9">

										  		<input type="radio" name="type" value="1" id="type_1" {{ old('type', $type) == 1 ? "checked" : "" }}>
										  		<label for="type_1">BĐS bán</label>
										  		&nbsp;&nbsp;&nbsp;
										  		<input type="radio" name="type" value="2" id="type_2" {{ old('type', $type) == 2 ? "checked" : "" }}>
										  		<label for="type_1">BĐS cho thuê</label>
											</div>
										</div><!-- /form-group -->
										<div class="form-group">
											<label class="col-sm-3 control-label">Loại nhà đất <span>(*)</span>:</label>
											<div class="col-sm-4">
										  		<select class="selectpicker form-control" name="estate_type_id" id="estate_type_id">
													<option selected="selected">-- Chọn Loại bất động sản --</option>
													@foreach( $estateTypeArr as $value )
						                            <option value="{{ $value->id }}"
						                            {{ old('estate_type_id') == $value->id ? "selected" : "" }}                           

						                            >{{ $value->name }}</option>
						                            @endforeach
												</select>
											</div>
										</div><!-- /form-group -->
										<div class="form-group">
											<label class="col-sm-3 control-label">Vị trí <span>(*)</span>:</label>
											<div class="col-sm-4">
										  		<select class="selectpicker form-control">
													<option class="option-lv0" selected="selected">Quận/Huyện</option>
												</select>
											<div class="col-sm-4">
										  		<select class="selectpicker form-control">
													<option class="option-lv0" selected="selected">Phường/Xã</option>
													<option class="option-lv0" value="1">Bàu Hàm 2</option>
													<option class="option-lv0" value="2">Dầu Giây</option>
													<option class="option-lv0" value="3">Gia Kiệm</option>
													<option class="option-lv0" value="4">Gia Tân 1</option>
													<option class="option-lv0" value="5">Gia Tân 2</option>
													<option class="option-lv0" value="6">Gia Tân 3</option>
													<option class="option-lv0" value="7">Hưng Lộc</option>
													<option class="option-lv0" value="7">Lộ 25</option>
													<option class="option-lv0" value="9">Quang Trung</option>
													</select>
												</select>
											</div>
										</div><!-- /form-group -->
										<div class="form-group">
											<label class="col-sm-3 control-label"></label>
											<div class="col-sm-4">
										  		<select class="selectpicker form-control">
													<option class="option-lv0" selected="selected">Đường/Phố</option>
												</select>
											</div>
											<div class="col-sm-4">
										  		<select class="selectpicker form-control">
													<option class="option-lv0" selected="selected">Du an</option>
												</select>
											</div>
										</div><!-- /form-group -->
										<div class="form-group">
											<label class="col-sm-3 control-label">Giá:</label>
											<div class="col-sm-4">
										  		<input type="text" name="" class="form-control inline-block form-control2">
											</div>
											<div class="col-sm-4 w158">
												<span style="margin-right: 25px;">Đơn vị:</span>
												<select class="selectpicker form-control">
													<option class="option-lv0" selected="selected">Quận/Huyện</option>
												</select>
											</div>
										</div><!-- /form-group -->
										<div class="form-group">
											<label class="col-sm-3 control-label">Diện tích:</label>
											<div class="col-sm-4">
												<input type="text" name="" class="form-control inline-block form-control2" style="width: 90%;">
												<span class="inline-block" style="margin: 8px 0 0 5px;">m2</span>
											</div>
										</div><!-- /form-group -->
										<div class="form-group">
											<label class="col-sm-3 control-label">Địa điểm <span>(*)</span>:</label>
											<div class="col-sm-8">
												<input type="text" name="" class="form-control inline-block form-control2">
											</div>
										</div><!-- /form-group -->

										<hr>

										<h4 class="titile-post-news">THÔNG TIN KHÁC</h4>
										<div class="form-group">
											<label class="col-sm-3 control-label">Mặt tiền:</label>
											<div class="col-sm-4 block-col-width-left">
										  		<input type="text" name="" class="form-control inline-block form-control2">
										  		<span class="inline-block" style="margin: 8px 0 0 5px;">m</span>
											</div>
											<div class="col-sm-5 block-col-width-right">
												<span>Đường trước nhà:</span>
												<input type="text" name="" class="form-control inline-block form-control2">
												<span class="inline-block" style="margin: 8px 0 0 5px;">m</span>
											</div>
										</div><!-- /form-group -->
										<div class="form-group">
											<label class="col-sm-3 control-label">Số tầng:</label>
											<div class="col-sm-4 block-col-width-left">
										  		<input type="text" name="" class="form-control inline-block form-control2">
											</div>
											<div class="col-sm-4 block-col-width-right">
												<span>Số phòng:</span>
												<input type="text" name="" class="form-control inline-block form-control2">
											</div>
										</div><!-- /form-group -->
										<div class="form-group">
											<label class="col-sm-3 control-label">Hướng BĐS:</label>
											<div class="col-sm-4 block-col-width-left">
										  		<select class="selectpicker form-control">
													<option value="-1" selected="selected">Chọn Hướng nhà</option>
													<option value="0">Không xác định</option>
													<option value="1">Đông</option>
													<option value="2">Tây</option>
													<option value="3">Nam</option>
													<option value="4">Bắc</option>
													<option value="5">Đông-Bắc</option>
													<option value="6">Tây-Bắc</option>
													<option value="7">Tây-Nam</option>
													<option value="8">Đông-Nam</option>
												</select>
											</div>
											<div class="col-sm-4 block-col-width-right">
												<span>Số toilet:</span>
												<input type="text" name="" class="form-control inline-block form-control2">
											</div>
										</div><!-- /form-group -->

										<hr>

										<h4 class="titile-post-news">MÔ TẢ CHI TIẾT</h4>
										<div class="form-group">
											<label class="col-sm-3 control-label">Tiêu đề <span>(*)</span>:</label>
											<div class="col-sm-8">
												<input type="email" class="form-control form-control2" placeholder="Vui lòng gõ tiếng Việt có dấu để tin đăng được kiểm duyệt nhanh hơn">
											</div>
										</div><!-- /form-group -->
										<div class="form-group">
											<label class="col-sm-3 control-label">Nội dung mô tả <span>(*)</span>:</label>
											<div class="col-sm-8">
												<textarea rows="5" class="form-control form-control2"></textarea>
											</div>
										</div><!-- /form-group -->
										<div class="form-group">
											<label class="col-sm-3 control-label">Cập nhật hình ảnh:</label>
											<div class="col-sm-8">
												<p class="text-red" style="padding-top: 12px; padding-bottom: 5px;">(Bạn có thể tải 16 ảnh và mỗi ảnh dung lượng không quá 4mb!)</p>
												<input type="file" name="file-6[]" id="file-6" class="inputfile inputfile-5" data-multiple-caption="{count} files selected" multiple="">
												<label for="file-6"></label>
											</div>
										</div><!-- /form-group -->
										<div class="form-group">
											<label class="col-sm-3 control-label">Cập nhật Video:</label>
											<div class="col-sm-8">
												<p style="padding-top: 12px;">Nếu bạn có nhu cầu Upload video, hãy liên hệ với chúng tôi để được hỗ trợ</p>
											</div>
										</div><!-- /form-group -->

										<hr>
										<h4 class="titile-post-news">THÔNG TIN BẢN ĐỒ</h4>
										<div class="block-map">
											<object class="mymap" data="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126263.60819855973!2d-84.44808690325613!3d33.735934882617194!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMzPCsDQ0JzQ1LjQiTiA4NMKwMjMnMzUuMyJX!5e0!3m2!1svi!2s!4v1475105845390"></object>
										</div>

										<hr>
										<h4 class="titile-post-news">THÔNG TIN LIÊN HỆ</h4>
										<div class="form-group">
											<label class="col-sm-3 control-label">Họ tên <span>(*)</span>:</label>
											<div class="col-sm-8">
												<input type="text" class="form-control form-control2" placeholder="">
											</div>
										</div><!-- /form-group -->
										<div class="form-group">
											<label class="col-sm-3 control-label">Địa chỉ:</label>
											<div class="col-sm-8">
												<input type="text" class="form-control form-control2" placeholder="">
											</div>
										</div><!-- /form-group -->
										<div class="form-group">
											<label class="col-sm-3 control-label">Điện thoại:</label>
											<div class="col-sm-8">
												<input type="text" class="form-control form-control2" placeholder="">
											</div>
										</div><!-- /form-group -->
										<div class="form-group">
											<label class="col-sm-3 control-label">Di động <span>(*)</span>:</label>
											<div class="col-sm-8">
												<input type="text" class="form-control form-control2" placeholder="">
											</div>
										</div><!-- /form-group -->
										<div class="form-group">
											<label class="col-sm-3 control-label">Email:</label>
											<div class="col-sm-8">
												<input type="text" class="form-contro form-control2" placeholder="">
											</div>
										</div><!-- /form-group -->
										<div class="form-group text-center">
											<button type="button" class="btn btn-success"><i class="fa fa-eye"></i> XEM TRƯỚC</button>
											<button type="button" class="btn btn-success"><i class="fa fa-check"></i> ĐĂNG TIN</button>
											<button type="button" class="btn btn-primary"><i class="fa fa-times"></i> HỦY BỎ</button>
										</div><!-- /form-group -->
									</div>
								</form>
							</div>
						</div>
					</article><!-- /block-news-sidebar -->
				</section><!-- /block-site-left -->
		</section>
	</section>
</section><!-- /main -->
@endsection
@section('javascript_page')


	<script type="text/javascript">
		$(document).ready(function() {
      $('.btnMuaDetail').click(function() {
        var product_id = $(this).attr('product-id');
        add_product_to_cart(product_id);
      });

      function add_product_to_cart(product_id) {
        $.ajax({
          url: "{{route('them-sanpham')}}",
          method: "POST",
          data : {
            id: product_id
          },
          success : function(data){
            location.href = '{{route("gio-hang")}}';
          },
          error : function(e) {
            alert( JSON.stringify(e));
          }
        });
      }

		});
	</script>
@endsection
