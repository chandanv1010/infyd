@if(isset($customerAuth) && $customerAuth)
    <div class="header-top__widget">
        <div class="uk-flex uk-flex-middle">
            <i class="fi-rs-user"></i>
            <a href="{{ route('customer.profile') }}" title="Tài khoản của tôi" class="widget-link">Xin chào: {{ $customerAuth->name }}</a>
            <span class="ml10 mr10">|</span>
            <a href="{{ route('customer.logout') }}" title="Đăng xuất" class="widget-link">Đăng xuất</a>
        </div>
    </div>
@else
    <div class="header-top__widget">
        <div class="uk-flex uk-flex-middle">
            <i class="fi-rs-user"></i>
            <a href="#modal-login" data-uk-modal title="Đăng nhập" class="widget-link">Đăng nhập</a>
            <span class="ml10 mr10">hoặc</span>
            <a href="{{ route('customer.register') }}" title="Đăng ký" class="widget-link">Tạo tài khoản</a>
        </div>
    </div>
@endif