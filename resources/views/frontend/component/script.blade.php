{{-- jQuery core --}}


{{-- Toastr --}}
<script src="{{ asset('vendor/backend/js/plugins/toastr/toastr.min.js') }}"></script>

{{-- Nice Select --}}
{{-- <script src="{{ asset('vendor/frontend/core/plugins/jquery-nice-select-1.1.0/js/jquery.nice-select.min.js') }}"></script> --}}

{{-- UIkit --}}
<script src="{{ asset('vendor/frontend/uikit/js/uikit.min.js') }}"></script>
<script src="{{ asset('vendor/frontend/uikit/js/components/sticky.min.js') }}"></script>
<script src="{{ asset('vendor/frontend/uikit/js/components/accordion.min.js') }}"></script>
<script src="{{ asset('vendor/frontend/uikit/js/components/lightbox.min.js') }}"></script>

{{-- Swiper từ CDN (hoặc copy về public/vendor/frontend/resources/swiper/js/) --}}
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>


<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v17.0&appId=103609027035330&autoLogAppEvents=1" nonce="E1aWx0Pa"></script>

{{-- Auth Scripts --}}
<script>
    // Toggle password visibility
    function togglePassword(fieldId) {
        const field = document.getElementById(fieldId);
        const eyeIcon = document.getElementById('eye-' + fieldId);
        const eyeSlashIcon = document.getElementById('eye-slash-' + fieldId);
        
        if (field.type === 'password') {
            field.type = 'text';
            if (eyeIcon) eyeIcon.style.display = 'none';
            if (eyeSlashIcon) eyeSlashIcon.style.display = 'block';
        } else {
            field.type = 'password';
            if (eyeIcon) eyeIcon.style.display = 'block';
            if (eyeSlashIcon) eyeSlashIcon.style.display = 'none';
        }
    }
    
    // Auto close modal on success
    @if(session('success'))
        setTimeout(function() {
            if (typeof UIkit !== 'undefined' && UIkit.modal) {
                UIkit.modal('#modal-login').hide();
            }
        }, 1000);
    @endif
    
    // Display toastr notifications
    @if(session('success'))
        toastr.success('{{ session('success') }}', 'Thành công', {
            timeOut: 5000,
            progressBar: true
        });
    @endif
    
    @if(session('error'))
        toastr.error('{{ session('error') }}', 'Lỗi', {
            timeOut: 5000,
            progressBar: true
        });
    @endif
</script>