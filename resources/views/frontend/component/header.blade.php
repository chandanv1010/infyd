<header class="pc-header uk-visible-large"><!-- HEADER -->
	<x-top-search />
    <div class="header-top">
        <div class="uk-container uk-container-center">
            <div class="uk-flex uk-flex-middle uk-flex-space-between">
                <div class="logo">
                    <a href="/"><img src="{{ $system['homepage_logo'] }}" alt="logo"></a>
                </div>
                <div class="header-top__widget uk-flex uk-flex-middle">
                    @include('frontend.component.navigation')
                    <div class="hd-menu-search ml20 mr20">
						<a class="open-search icon no-hover" title="Tìm kiếm"><i class="fa fa-search" aria-hidden="true"></i></a>
						<div class="dropdown-search">
							<form action="<?php echo write_url('tim-kiem') ?>" method="get" class="uk-form form">
								<input type="text" name="keyword" class="uk-width-1-1 input-text" placeholder="Nhập nội dung tìm kiếm?">
								<button type="submit" name="" value="" class="btn-submit"><i class="fa fa-search" aria-hidden="true"></i></button>
							</form>
						</div>
					</div>
                </div>
            </div>
        </div>
    </div>
</header><!-- .header -->
<header class="mobile-header uk-hidden-large">
	<section class="upper">
		<a class="moblie-menu-btn skin-1" href="#offcanvas" class="offcanvas" data-uk-offcanvas="{target:'#offcanvas'}">
			<span>Menu</span>
		</a>
		<div class="logo"><a href="" title="Logo"><img src="<?php echo $system['homepage_logo']; ?>" alt="Logo" /></a></div>
		<div class="mobile-hotline">
			<a class="value" href="tel:<?php echo $system['contact_hotline']; ?>" title="Tư vấn bán hàng"><?php echo $system['contact_hotline']; ?></a>
		</div>
	</section><!-- .upper -->
	<section class="lower">
		<div class="mobile-search">
			<form action="<?php echo write_url('tim-kiem'); ?>" method="" class="uk-form form">
				<input type="text" name="keyword" class="uk-width-1-1 input-text" placeholder="Bạn muốn tìm gì hôm nay?" />
				<button type="submit" name="" value="" class="btn-submit">Tìm kiếm</button>
			</form>
		</div>
	</section>
</header><!-- .mobile-header -->
