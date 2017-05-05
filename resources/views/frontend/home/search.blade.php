@section('search')
<section class="block-search">
	<div class="container">
		<div class="block-title block-tab-customize">
			<!-- Nav tabs -->
			<ul class="nav nav-tabs" role="tablist">
				<li role="presentation" class="active"><a href="#home" >BẤT ĐỘNG SẢN BÁN</a></li>
				<li role="presentation"><a href="#profile" >BẤT ĐỘNG SẢN CHO THUÊ</a></li>
			</ul>
		</div>
		<div class="block-contents">
			<!-- Tab panes -->
			  <div class="tab-content">
			    <div role="tabpanel" class="tab-pane active" id="home">
			    	<form action="#" method="get" accept-charset="utf-8" class="search-content-input selectpicker-cus">
			    		<input type="hidden" id="type" value="1">
				    	<div class="form-group">
				    		<input type="text" name="" class="input-search" placeholder="Nhập địa điểm, vd: The Manor">
				    	</div>
				    	<div class="row-select">
							<div class="col-xs-2">
								<div class="form-group">
									<select class="selectpicker form-control" data-live-search="true">
										<option selected="selected">Loại bất động sản</option>
										@foreach($banList as $ban)
										<option value="{{ $ban->id }}">{{ $ban->name }}</option>
										@endforeach
									</select>
								</div>
							</div>								
							<div class="col-xs-2">
								<div class="form-group">
									<select class="selectpicker form-control" data-live-search="true" id="district_id">
										<option class="option-lv0" selected="selected">Quận/Huyện</option>
										@foreach($districtList as $district)
										<option value="{{ $district->id }}">{{ $district->name }}</option>
										@endforeach
									</select>
								</div>
							</div>
							<div class="col-xs-2">
								<div class="form-group">
									<select class="selectpicker form-control" data-live-search="true" id="ward_id">
										<option class="option-lv0" selected="selected">Phường/Xã</option>
										
									
									</select>
								</div>
							</div>
							<div class="col-xs-2">
								<div class="form-group">
									<select class="selectpicker form-control" id="street_id" name="str" data-live-search="true">
										<option class="option-lv0" selected="selected">Đường/Phố</option>
									</select>
								</div>
							</div>
							<div class="col-xs-2">
								<div class="form-group">
									<select class="selectpicker form-control" data-live-search="true" id="project_id">
										<option class="option-lv0" selected="selected">Dự án</option>
									</select>
								</div>
							</div>
							
							<div class="col-xs-2">
								<div class="form-group">
									<select class="selectpicker form-control" data-live-search="true">
										<option class="option-lv0" selected="selected">Mức giá</option>
									</select>
								</div>
							</div>
							
						</div>
						<div class="row-select">
							<div class="col-xs-2">
								<div class="form-group">
									<select class="selectpicker form-control" id="area" name="are" data-live-search="true">
										<option class="option-lv0" selected="selected">Diện tích</option>
										
									</select>
								</div>
							</div>
							<div class="col-xs-2">
								<div class="form-group">
									<select class="selectpicker form-control" data-live-search="true">
										<option class="option-lv0" selected="selected">Hướng nhà</option>
									</select>
								</div>
							</div>
							<div class="col-xs-2">
								<div class="form-group">
									<select class="selectpicker form-control" data-live-search="true">
										<option class="option-lv0" selected="selected">Số phòng ngủ</option>
									</select>
								</div>
							</div>								
							<div class="col-xs-2 col-button">
								<div class="form-group">
									<button type="button" class="btn btn-success btn-search-home"><i class="fa fa-search"></i> Tìm Kiếm</button>
								</div>
							</div>
						</div>
			    	</form>
			    </div>
			    <div role="tabpanel" class="tab-pane" id="profile">
			    	
			    </div>
			  </div>
		</div>
	</div>
</section><!-- /block-search -->
@endsection