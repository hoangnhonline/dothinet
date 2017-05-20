@section('search')
<section class="block-search">
	<div class="container">
		<div class="block-title block-tab-customize">
			<!-- Nav tabs -->
			<ul class="nav nav-tabs" role="tablist" id="tab-search">
				<li role="presentation" class="active"><a href="javascript:void(0)" >BẤT ĐỘNG SẢN BÁN</a></li>
				<li role="presentation"><a href="javascript:void(0)" >BẤT ĐỘNG SẢN CHO THUÊ</a></li>
			</ul>
		</div>
		<div class="block-contents">
			<!-- Tab panes -->
			  <div class="tab-content">
			    <div role="tabpanel" class="tab-pane active" id="home">
			    	<form action="{{ route('search') }}" method="GET" accept-charset="utf-8" class="search-content-input selectpicker-cus">
			    		<input type="hidden" id="type" value="1" name="type">				    	
				    	<div class="row-select">
							<div class="col-xs-2">
								<div class="form-group">
									<select class="selectpicker form-control" data-live-search="true" name="estate_type_id">
										<option selected="selected" value="">Loại bất động sản</option>
										@foreach($banList as $ban)
										<option value="{{ $ban->id }}">{{ $ban->name }}</option>
										@endforeach
									</select>
								</div>
							</div>								
							<div class="col-xs-2">
								<div class="form-group">
									<select class="selectpicker form-control" data-live-search="true" id="district_id" name="district_id">
										<option value="">Quận/Huyện</option>
										@foreach($districtList as $district)
										<option value="{{ $district->id }}">{{ $district->name }}</option>
										@endforeach
									</select>
								</div>
							</div>
							<div class="col-xs-2">
								<div class="form-group">
									<select class="selectpicker form-control" data-live-search="true" id="ward_id" name="ward_id">
										<option value="">Phường/Xã</option>
										
									
									</select>
								</div>
							</div>
							<div class="col-xs-2">
								<div class="form-group">
									<select class="selectpicker form-control" id="street_id" name="street_id" data-live-search="true">
										<option value="">Đường/Phố</option>
									</select>
								</div>
							</div>
							<div class="col-xs-2">
								<div class="form-group">
									<select class="selectpicker form-control" data-live-search="true" id="project_id" name="project_id">
										<option value="">Dự án</option>
									</select>
								</div>
							</div>
							
							<div class="col-xs-2">
								<div class="form-group">
									<select class="selectpicker form-control" data-live-search="true" name="price_id">
										<option value="">Mức giá</option>
									</select>
								</div>
							</div>
							
						</div>
						<div class="row-select">
							<div class="col-xs-2">
								<div class="form-group">
									<select class="selectpicker form-control" id="area_id" name="area_id" data-live-search="true">
										<option value="">Diện tích</option>
										
									</select>
								</div>
							</div>
							<div class="col-xs-2">
								<div class="form-group">
									<select class="selectpicker form-control" data-live-search="true" name="direction_id">
										<option value="">Hướng nhà</option>
									</select>
								</div>
							</div>
							<div class="col-xs-2">
								<div class="form-group">
									<select class="selectpicker form-control" data-live-search="true" name="no_room">
										<option value="">Số phòng ngủ</option>
									</select>
								</div>
							</div>								
							<div class="col-xs-2 col-button">
								<div class="form-group">
									<button type="submit" class="btn btn-success btn-search-home"><i class="fa fa-search"></i> Tìm Kiếm</button>
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
<style type="text/css">
	.bootstrap-select>.dropdown-toggle.bs-placeholder, .bootstrap-select>.dropdown-toggle.bs-placeholder:active, .bootstrap-select>.dropdown-toggle.bs-placeholder:focus, .bootstrap-select>.dropdown-toggle.bs-placeholder:hover{
		color:#444 !important;
	}
</style>
@endsection
@section('javascript_page')
<script type="text/javascript">
	$(document).ready(function(){
		$('#tab-search li a').click(function(){
			obj = $(this);
			$('#tab-search li').removeClass('active');
			obj.parents('li').addClass('active');
		});
	});

</script>
@endsection