@if( !empty( $rsUpload ))
	<?php $i = 0; ?>
	@foreach( $rsUpload as $tmp)
	<?php $i++; ?>
	<div class="col-md-3" style="margin-top:5px">
		<div  style="position:relative">
			<img class="img-thumbnail" src="{{ Helper::showImage($tmp['image_path']) }}" style="width:100%">
			
			<input type="hidden" name="image_tmp_url[]" value="{{ $tmp['image_path'] }}">
			<input type="hidden" name="image_tmp_name[]" value="{{ $tmp['image_name'] }}">
		    
		    <input style="display:none" type="radio" name="thumbnail_id" class="thumb" value="{{ $tmp['image_path'] }}" {{ $i == 1 ? "checked" : "" }} >	    
	    </div>
	    <button class="btn btn-danger btn-sm remove-image" type="button" data-value="{{ $tmp['image_path'] }}" data-id="" style="position:absolute;right:0;top:0" ><span class="glyphicon glyphicon-trash"></span></button>
	 
	</div>
	@endforeach
@endif