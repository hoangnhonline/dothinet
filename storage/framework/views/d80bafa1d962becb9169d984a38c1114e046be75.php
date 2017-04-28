<!-- END MANIN HEADER -->
<div id="nav-top-menu" class="nav-top-menu noprint">
    <div class="container">
        <div class="row">
            <div class="col-sm-3" id="box-vertical-megamenus">
                <div class="box-vertical-megamenus">
                    <h4 class="title">
                        <span class="title-menu">Danh mục</span>
                        <span class="btn-open-mobile pull-right home-page"><i class="fa fa-bars"></i></span>
                    </h4>
                    <div class="vertical-menu-content is-home">
                        <ul class="vertical-menu-list">                        
                            <?php $count = 0; ?>
                            <?php foreach( $menuDoc as $loai): ?>
                            <?php $count ++; ?>
                            <li <?php if($count > 11 ) echo 'class="cat-link-orther"'; ?>>
                                <a class="parent" href="<?php echo e(route('danh-muc-cha', $loai['slug'])); ?>"><img class="icon-menu" alt="icon <?php echo e($loai['name']); ?>" src="<?php echo e(Helper::showImage($loai['icon_mau'])); ?>" /><?php echo e($loai['name']); ?></a>
                                <?php if( !empty($loai['child']) ): ?>
                                 <?php $countSubMenu = 0;                                                            
                                            ?>
                                <div class="vertical-dropdown-menu">
                                    <div class="vertical-groups col-sm-12">
                                        <div class="mega-group col-sm-3">
                                            <h4 class="mega-group-header2"><span>Nổi bật<span></h4>
                                            <ul class="group-link-default">
                                                <li><a href="<?php echo e(route('ban-chay', $loai['slug'])); ?>">Bán chạy</a></li>
                                                <li><a href="<?php echo e(route('san-pham-moi', $loai['slug'])); ?>">Sản phẩm mới</a></li>
                                                <li><a href="<?php echo e(route('giam-gia', $loai['slug'])); ?>">Giảm giá</a></li>                                           
                                            </ul>
                                            <h4 class="mega-group-header2"><span><?php echo e($loai['name']); ?><span></h4>
                                            <ul class="group-link-default">
                                                <?php 
                                                $priceArr = DB::table('price_range')->where('loai_id', $loai['id'])->orderBy('id')->get();

                                                ?>
                                                <?php foreach($priceArr as $price): ?>
                                                <li><a href="<?php echo e(route('theo-gia-danh-muc-cha',['slugLoaiSp' => $loai['slug'], 'slugGia' => $price->alias])); ?>"><?php echo e($price->name); ?></a></li>
                                                <?php endforeach; ?>                                            
                                            </ul>
                                        </div>
                                        <div class="mega-group col-sm-3">
                                            <h4 class="mega-group-header2"><span>Danh mục sản phẩm<span></h4>
                                            
                                            <ul class="group-link-default">
                                                <?php foreach( $loai['child'] as $cate): ?>
                                                <?php $countSubMenu++; ?>
                                                <li>
                                                    <a href="<?php echo e(route('danh-muc-con',[ $loai['slug'], $cate['slug']])); ?>">
                                                        <?php echo e($cate['name']); ?>

                                                    </a>
                                                </li>                                            
                                                    <?php if($countSubMenu % 12 == 0): ?>
                                                            </ul></div>
                                                        <div class="mega-group col-sm-3">
                                                    <ul class="group-link-default" style="margin-top: 34px;">                                       
                                                        <?php endif; ?>                                                                                   
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>                                    
                                    </div>
                                    <div class="box-img-pos">
                                        <img src="<?php echo e(Helper::showImage($loai['banner_menu'])); ?>" alt="banner menu <?php echo e($loai['name']); ?>">
                                    </div>
                                </div>
                                <?php endif; ?>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                        <div class="all-category"><span class="open-cate">Xem tất cả</span></div>
                    </div>
            </div>
            </div>
            <div id="main-menu" class="col-sm-9 main-menu">
                <nav class="navbar navbar-default">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                <i class="fa fa-bars"></i>
                            </button>
                            <a class="navbar-brand" href="#">MENU</a>
                        </div>                        
                        <div id="navbar" class="navbar-collapse collapse">                        
                            <ul class="nav navbar-nav">
                                <li class="logo-on-menu" id="small_logo" style="display:none;"><a href="<?php echo e(route('home')); ?>"><img class="lazy" data-original="<?php echo e(URL::asset('assets/images/logo.png')); ?>"></a></li>   
                                <li <?php echo e(\Request::route()->getName() == 'home' ? "class=active" : ""); ?>><a href="<?php echo e(route('home')); ?>">Trang chủ</a></li>
                                <li <?php echo e(\Request::route()->getName() == 'chuong-trinh-khuyen-mai' || (isset($is_km) && $is_km == 1) ? "class=active" : ""); ?>><a href="<?php echo e(route('chuong-trinh-khuyen-mai')); ?>">Khuyến mãi</a></li>                                
                                <li <?php echo e((\Request::route()->getName() == 'news-list' && Request::path() == 'tin-tuc') || (isset($is_news) && $is_news == 1)? "class=active" : ""); ?>><a href="<?php echo e(route('news-list', 'tin-tuc')); ?>">Tin tức</a></li>
                                <!--<li <?php echo e(\Request::route()->getName() == 'lap-rap' ? "class=active" : ""); ?>><a href="<?php echo e(route('lap-rap')); ?>">Ráp máy tính online</a></li>-->
                               
                                <li <?php echo e((\Request::route()->getName() == 'news-list' && Request::path() == 'kinh-nghiem-hay') || (isset($is_kn) && $is_kn == 1)? "class=active" : ""); ?>><a href="<?php echo e(route('news-list', 'kinh-nghiem-hay')); ?>" >Kinh nghiệm hay</a></li>                                
                                <li <?php echo e(\Request::route()->getName() == 'contact' ? "class=active" : ""); ?>><a href="<?php echo e(route('contact')); ?>">Liên hệ</a></li>
                            </ul>
                        </div><!--/.nav-collapse -->
                    </div>
                </nav>
            </div>
        </div>
        <!-- userinfo on top-->
        <div id="form-search-opntop">
        </div>
        <!-- userinfo on top-->
        <div id="user-info-opntop">
        </div>
        <!-- CART ICON ON MMENU -->
        <div id="shopping-cart-box-ontop">
            <a href="<?php echo e(route('gio-hang')); ?>"><i class="fa fa-shopping-cart"></i></a>
            <div class="shopping-cart-box-ontop-content"></div>
        </div>
    </div>
</div>