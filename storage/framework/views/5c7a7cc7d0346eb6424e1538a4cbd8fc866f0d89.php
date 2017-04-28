<?php echo $__env->make('frontend.partials.meta', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('content'); ?>
<?php foreach( $loaiSpHot as $loai): ?>
<?php if(count($productArr[$loai['id']]) > 0): ?>
<section class="block block-products products">
  <div class="block-title">
    <h2 class="title"><?php echo e($loai['name']); ?></h2>
    <a href="<?php echo e(route('danh-muc-cha', $loai['slug'])); ?>" title="<?php echo e($loai['name']); ?>" class="viewmore">Xem <?php echo e(count($productArr[$loai['id']])); ?> sản phẩm <i class="fa fa-angle-right"></i></a>
  </div>
  <div class="block-content">
    <ul class="owl-carousel owl-theme owl-style2" data-nav="true" data-dots="false" data-margin="30" data-responsive='{"0":{"items":1},"480":{"items":2},"600":{"items":2},"768":{"items":3},"800":{"items":3},"992":{"items":6}}'>
      <?php foreach( $productArr[$loai['id']] as $product ): ?>
      <li class="item">
        <div class="pro-thumb">
          <a href="<?php echo e(route('chi-tiet', $product['slug'])); ?>" title="<?php echo e($product['name']); ?>">
            <img src="<?php echo e(Helper::showImage($product['image_url'])); ?>" alt="<?php echo e($product['name']); ?>">
          </a>
        </div>
        <div class="pro-info">
          <h2 class="pro-title"><a href="<?php echo e(route('chi-tiet', $product['slug'])); ?>"><?php echo e($product['name']); ?></a></h2>
          <div class="price-products">
            <p class="pro-price"><?php echo e($product['is_sale'] == 1 ? number_format($product['price_sale']) : number_format($product['price'])); ?></p>
            <?php if( $product['is_sale'] == 1): ?>
            <p class="pro-sale"><del><?php echo e(number_format($product['price'])); ?></del> <span></span></p>
            <?php endif; ?>
          </div>
        </div>
      </li><!-- /item -->
      <?php endforeach; ?>
    </ul>
  </div>
</section><!-- /block-products products -->
<?php endif; ?>
<?php endforeach; ?>
<?php $__env->stopSection(); ?>