<?php echo $__env->make('frontend.partials.meta', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('content'); ?>
<section class="block-content">
	<div class="block-common block-sale-products">
		<p class="block-page-name"><?php echo e($rs->name); ?></p>
		<div class="products">
			<ul class="row">
				<?php foreach( $productArr as $product ): ?>
				<li class="col-md-2 col-sm-4 col-xs-4">
					<div class="item">
						<!--<p class="trapezoid">-18%</p>-->
						<div class="pro-thumb">
							<a href="<?php echo e(route('chi-tiet', $product['slug'])); ?>" title="<?php echo e($product['name']); ?>">
								<img src="<?php echo e(Helper::showImage($product['image_url'])); ?>" alt="<?php echo e($product['name']); ?>">
							</a>
						</div>
						<div class="pro-info">
							<h2 class="pro-title"><a href="<?php echo e(route('chi-tiet', $product['slug'])); ?>"><?php echo e($product['name']); ?></a></h2>
							<div class="price-products">
								<p class="pro-price"><?php if($product['price'] > 0): ?>
					            <?php echo e($product['is_sale'] == 1 ? number_format($product['price_sale']) : number_format($product['price'])); ?>

					            <?php else: ?>
					            Liên hệ
					            <?php endif; ?> </p>
								<!-- <p class="pro-sale"><del>7,940,000đ</del></p> -->
							</div>
							<a href="<?php echo e(route('chi-tiet', $product['slug'])); ?>" title="" class="btn btn-select-buy">Chọn mua</a>
						</div>
					</div><!-- /item -->
				</li><!-- /col-sm-2 col-xs-6 -->	
				<?php endforeach; ?>			
			</ul>
		</div><!-- /products -->
		<!---<div class="sortPagiBar">
            <div class="bottom-pagination">
                <nav>
                  
                </nav>
            </div>                    
        </div>-->
	</div><!-- /block-common -->
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>