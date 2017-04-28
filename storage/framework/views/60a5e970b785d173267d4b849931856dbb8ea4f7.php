<?php $__env->startSection('content'); ?>
<?php echo $__env->make('frontend.partials.meta', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<article class="block block-breadcrumb">
	<ul class="breadcrumb">	
		<li><a href="<?php echo e(route('home')); ?>" title="Trở về trang chủ">Trang chủ</a></li>
		<li><a href="<?php echo e(route('danh-muc-cha', $rsLoai->slug)); ?>" title="<?php echo e($rsCate->name); ?>"><?php echo e($rsLoai->name); ?></a></li>
		<li> <a href="<?php echo e(route('danh-muc-con', [$rsLoai->slug, $rsCate->slug])); ?>" title="<?php echo e($rsCate->name); ?>"><?php echo e($rsCate->name); ?></a>    </li>
		<li class="active"><a href="#"><?php echo e($detail->name); ?></a></li>
	</ul>
</article><!-- /block-breadcrumb -->

<section class="block-content">
	<div class="row">
		<div class="col-md-9 col-sm-8 col-xs-12 page-pl0">
			<div class="block-left">
				<div class="product">
					<div class="primary-box row">
						<div class="pb-left-column col-sm-6">
							<div class="product-image">
	                            <div class="bxslider product-img-gallery">
	                            	<?php foreach( $hinhArr as $hinh ): ?>
	                                <div class="item">
	                                    <img src="<?php echo e(Helper::showImage($hinh['image_url'])); ?>" alt="#" />
	                                </div>
	                                <?php endforeach; ?>	                                
	                            </div>
	                            <div class="product-img-thumb">
	                                <div id="gallery_01" class="pro-thumb-img">
	                                	<?php $i = -1; ?>
		                                <?php foreach( $hinhArr as $hinh ): ?>
		                                <?php $i++; ?>
	                                    <div class="item">
	                                        <a href="#" data-slide-index="<?php echo e($i); ?>">
	                                            <img src="<?php echo e(Helper::showImage($hinh['image_url'])); ?>" alt="#" />
	                                        </a>
	                                    </div>	    
	                                    <?php endforeach; ?>                                
	                                </div>
	                            </div>
							</div>
						</div>
						<div class="pb-right-column col-sm-6">
							<h1 class="product-name"><?php echo e($detail->name); ?></h1>
							<div class="rowprice">
								<?php if($detail->price > 0): ?>
                                  <?php if( $detail->is_sale == 1): ?>
                                  <strong><?php echo e(number_format($detail->price_sale)); ?></strong>
                                  <span><?php echo e(number_format($detail->price)); ?></span>
                                  <label>-<?php echo e($detail->sale_percent ? $detail->sale_percent : 
                                                              100-round($detail->price_sale*100/$detail->price)); ?>%</label>
                                  <?php else: ?>
                                  <strong><?php echo e(number_format($detail->price)); ?></strong>
                                  <?php endif; ?>
                                <?php else: ?>
                                <strong>Liên hệ</strong>
                                <?php endif; ?>
                                <span class="status">
								Còn hàng
								</span>
							</div>							
							<?php if( $detail->khuyen_mai != ''): ?>
							<div class="panel panel-default block-panel-products">
								<div class="panel-heading">Khuyến Mãi</div>
								<div class="panel-body">
									<?php echo $detail->khuyen_mai; ?>    									
								</div>
							</div>
							<?php endif; ?>
							<div class="block-buy">								
                                <?php if( $detail->mo_ta != ''): ?>
                                <div class="block block-colpolicy">                                    
                                    <?php echo $detail->mo_ta ; ?>                                    
                                </div>
                                <?php endif; ?>				                
				            </div>
				            <div class="dt-buynow">
				            	<!--<span>Số lượng:</span>
				            	<label>
				            		<span class="down">-</span>
				            		<input type="text" min="1" max="50" maxlength="2" name="txtQuantity" value="1">
				            		<span class="up">+</span>
				            	</label>-->
				            	<button class="buy buynow btn-add-cart-on-product-detail btnMuaDetail" product-id="<?php echo e($detail->id); ?>" >Chọn Mua</button>
				            	<span class="error hide">Số lượng sản phẩm hiện tại chỉ còn 16 sản phẩm</span>
				            </div>
						</div>
					</div>
				</div><!-- /block-page-news -->
			</div><!-- /block-left -->
			<div class="block-left">
				<div class="block-details-info">
					<p class="block-page-name">Thông tin chi tiết</p>
					<?php echo ($detail->chi_tiet); ?>
					<br>
					<?php if( !empty( $thuocTinhArr )): ?>
	                  <div id="thongtinkythuat" class="tab-panel">  
	                      <div id="content-thongso">                    
	                     <table class="table table-responsive table-bordered">
	                      <?php foreach($thuocTinhArr as $loaithuoctinh): ?>
	                        <tr style="background-color:#CCC">
	                          <td colspan="2"><?php echo e($loaithuoctinh['name']); ?></td>
	                        </tr>
	                        <?php if( !empty($loaithuoctinh['child'])): ?>
	                          <?php foreach( $loaithuoctinh['child'] as $thuoctinh): ?>
	                          <tr>
	                            <td width="150"><?php echo e($thuoctinh['name']); ?></td>
	                            <td><span><?php echo e(isset($spThuocTinhArr[$thuoctinh['id']]) ?  $spThuocTinhArr[$thuoctinh['id']] : ""); ?></span></td>
	                          </tr>
	                          <?php endforeach; ?>
	                        <?php endif; ?>
	                      <?php endforeach; ?>
	                      </table>  
	                      </div>                  
	                  </div>
	                  <?php endif; ?>
				</div>
			</div>
		</div><!-- /col-md-9 col-sm-8 col-xs-12 page-pl0 -->

		<div class="col-md-3 col-sm-4 col-xs-12">
			<?php if( $lienquanArr->count() > 0): ?>
			<div class="block-right">
				<div class="block-cate">
					<p class="block-cate-title text-center">Sản phẩm liên quan</p>
					<div class="block-productrelate">
						<div class="products">
							<?php foreach( $lienquanArr as $product): ?>						
							<div class="item">
								<div class="pro-thumb">
									<a href="<?php echo e(route('chi-tiet', $product->slug )); ?>" title="<?php echo e($product->name); ?>">
										<img src="<?php echo e(Helper::showImage( $product->image_url)); ?>" alt="<?php echo e($product->name); ?>">
									</a>
								</div>
								<div class="pro-info">
									<h2 class="pro-title"><a href="<?php echo e(route('chi-tiet', $product->slug )); ?>"><?php echo e($product->name); ?></a></h2>
									<div class="price-products">
										<?php if($product->is_sale == 1): ?>
										<p class="pro-price"><?php echo e(number_format($product->price_sale)); ?></p>
										<p class="pro-sale"><del><?php echo e(number_format($product->price)); ?></del> <span>(<?php echo e($product->sale_percent ? $product->sale_percent : 
                                                                100-round($product->price_sale*100/$product->price)); ?>%)</span></p>
										<?php else: ?>
										<p class="pro-price"><?php echo e(number_format($product->price)); ?></p>
										<?php endif; ?>
										</div>
									<?php if($rsLoai->is_hover == 1): ?>
	                                <?php $str_sosanh = $detail->id.'-'.$product->sp_id; ?>
	                                <a href="<?php echo e(route('so-sanh', ['id' => $str_sosanh])); ?>" class="compare"> So sánh chi tiết</a>
	                                <?php endif; ?>									
								</div>
							</div><!-- /item -->				
							<?php endforeach; ?>		
						</div>
					</div>
				</div>
			</div><!-- /block-right -->
			<?php endif; ?>
		</div><!-- /col-md-3 col-sm-4 col-xs-12 -->
	</div>
</section><!-- /block-content -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript_page'); ?>
<script src="<?php echo e(URL::asset('assets/vendor/zoom/jquery.zoom.min.js')); ?>"></script>
<!-- Js bxslider -->
<script src="<?php echo e(URL::asset('assets/vendor/bx-slider/jquery.bxslider.min.js')); ?>"></script>
<!-- Countdown -->
<script src="<?php echo e(URL::asset('assets/vendor/countdown/jquery.countdown.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/js/updown.js')); ?>"></script>
<script type="text/javascript">
 $(document).ready(function () {
    $('.bxslider .item').each(function () {
        $(this).zoom();
    });

    $(".bxslider").bxSlider({
    	controls: false,
        pagerCustom: '.pro-thumb-img',
        nextText: '<i class="fa fa-angle-right"></i>',
        prevText: '<i class="fa fa-angle-left"></i>'
    });

    $(".pro-thumb-img").bxSlider({
        slideMargin: 20,
        maxSlides: 4,
        pager: false,
        controls: true,
        slideWidth: 80,
        infiniteLoop: false,
        nextText: '<i class="fa fa-angle-right"></i>',
        prevText: '<i class="fa fa-angle-left"></i>'
    });
    /** COUNT DOWN **/
	$('[data-countdown]').each(function() {
		var $this = $(this), finalDate = $(this).data('countdown');
		$this.countdown(finalDate, function(event) {
			var fomat ='<i class="fa fa-clock-o"></i> <b>Thời gian còn lại:</b> <span>%D ngày,</span> <span>%H</span> : %M<span class="minute"></span> : %S<span class="seconds"></span>';
			$this.html(event.strftime(fomat));
		});
	});
});

</script>
<?php $__env->stopSection(); ?>