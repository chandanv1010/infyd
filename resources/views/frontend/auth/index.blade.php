<div class="uk-modal" id="modal-login">
    <div class="modal uk-modal-dialog">
        <div class="modal-header">
            <h2 class="modal-title">Đăng nhập</h2>
        </div>
        <div class="modal-body">
            @if(session('error'))
                <div class="error-message" id="errorMessage" style="display: block; color: red; margin-bottom: 15px;">
                    {{ session('error') }}
                </div>
            @endif
            @if(session('success'))
                <div class="success-message" id="successMessage" style="display: block; color: green; margin-bottom: 15px;">
                    {{ session('success') }}
                </div>
            @endif
            <div class="error-message" id="errorMessage" style="display: none;"></div>
            <div class="success-message" id="successMessage" style="display: none;"></div>
            <form action="{{ route('fe.auth.dologin') }}" method="POST" id="loginForm">
                @csrf
                <div class="form-group">
                    <label for="email">Email <span class="required">*</span></label>
                    <input type="text" id="email" name="email" required>
                    <div class="field-error" id="email"></div>
                </div>
                <div class="form-group">
                    <label for="password">Mật khẩu <span class="required">*</span></label>
                    <input type="password" id="password" name="password" required>
                    <div class="field-error" id="password"></div>
                </div>
                <div class="checkbox-group">
                    <input type="checkbox" id="rememberMe" name="rememberMe">
                    <label for="rememberMe">Ghi nhớ mật khẩu</label>
                </div>
                <button type="submit" class="login-btn" id="loginBtn">
                    Đăng nhập
                </button>
                <div class="forgot-password">
                    <a href="{{ route('forgot.customer.password') }}">Quên mật khẩu?</a>
                </div>
            </form>
        </div>
    </div>
</div>
