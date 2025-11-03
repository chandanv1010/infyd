<footer class="footer">
    <div class="uk-container uk-container-center">
        <div class="uk-grid uk-grid-medium">
            <div class="uk-width-large-1-3">
                <div class="uk-text-center">
                    <div class="footer-logo">
                        <img src="{{ $system['homepage_logo'] }}" alt="">
                    </div>
                    <div class="company uk-text-center">
                        {!! $system['homepage_company'] !!}
                    </div>
                    <div class="social-list uk-flex uk-flex-center">
                        <a href="{{ $system['social_facebook'] }}" class="social-item"><i class="fa fa-facebook"></i></a>
                        <a href="{{ $system['social_youtube'] }}" class="social-item"><i class="fa fa-youtube"></i></a>
                        <a href="{{ $system['social_twitter'] }}" class="social-item"><i class="fa fa-twitter"></i></a>
                    </div>
                </div>
            </div>
            <div class="uk-width-large-2-3">
                <div class="footer-widget">
                    <div class="uk-grid uk-grid-medium">
                        <div class="uk-width-large-2-5">
                            @if(isset($menu['footer-menu']) && is_array($menu['footer-menu']) && count($menu['footer-menu']))
                            @foreach($menu['footer-menu'] as $key => $val)
                            @php
                                $name = $val['item']->languages->first()->pivot->name;
                                $canonical = write_url($val['item']->languages->first()->pivot->canonical);
                            @endphp
                                <div class="uk-width-large-1-1">
                                    <div class="ft-panel">
                                        @if($val['children'])
                                            <ul class="uk-list uk-clearfix">
                                                @foreach($val['children'] as $children)
                                                @php
                                                    $nameC = $children['item']->languages->first()->pivot->name;
                                                    $canonicalC = write_url($children['item']->languages->first()->pivot->canonical);
                                                @endphp
                                                <li class="uk-flex">
                                                    <svg fill="#fff" height="18px" width="18px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 330 330" xml:space="preserve">
                                                        <path id="XMLID_222_" d="M250.606,154.389l-150-149.996c-5.857-5.858-15.355-5.858-21.213,0.001
                                                            c-5.857,5.858-5.857,15.355,0.001,21.213l139.393,139.39L79.393,304.394c-5.857,5.858-5.857,15.355,0.001,21.213
                                                            C82.322,328.536,86.161,330,90,330s7.678-1.464,10.607-4.394l149.999-150.004c2.814-2.813,4.394-6.628,4.394-10.606
                                                            C255,161.018,253.42,157.202,250.606,154.389z"></path>
                                                    </svg>
                                                    <a href="{{ $canonicalC }}" title="{{ $nameC }}" >{{ $nameC }}</a>
                                                </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        @endif
                        </div>
                        <div class="uk-width-large-3-5">
                            <div class="ft-panel">
                                <ul class="uk-list uk-clearfix">
                                    <li class="uk-flex">
                                        <svg fill="#fff" height="18px" width="18px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 330 330" xml:space="preserve">
                                            <path id="XMLID_222_" d="M250.606,154.389l-150-149.996c-5.857-5.858-15.355-5.858-21.213,0.001
                                                c-5.857,5.858-5.857,15.355,0.001,21.213l139.393,139.39L79.393,304.394c-5.857,5.858-5.857,15.355,0.001,21.213
                                                C82.322,328.536,86.161,330,90,330s7.678-1.464,10.607-4.394l149.999-150.004c2.814-2.813,4.394-6.628,4.394-10.606
                                                C255,161.018,253.42,157.202,250.606,154.389z"></path>
                                        </svg>
                                        <a onclick="return false;">Trụ sở: {{ $system['contact_office'] }}</a>
                                    </li>
                                    <li class="uk-flex">
                                        <svg fill="#fff" height="18px" width="18px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 330 330" xml:space="preserve">
                                            <path id="XMLID_222_" d="M250.606,154.389l-150-149.996c-5.857-5.858-15.355-5.858-21.213,0.001
                                                c-5.857,5.858-5.857,15.355,0.001,21.213l139.393,139.39L79.393,304.394c-5.857,5.858-5.857,15.355,0.001,21.213
                                                C82.322,328.536,86.161,330,90,330s7.678-1.464,10.607-4.394l149.999-150.004c2.814-2.813,4.394-6.628,4.394-10.606
                                                C255,161.018,253.42,157.202,250.606,154.389z"></path>
                                        </svg>
                                        <a onclick="return false;">Email: {{ $system['contact_email'] }}</a>
                                    </li>
                                    <li class="uk-flex">
                                        <svg fill="#fff" height="18px" width="18px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 330 330" xml:space="preserve">
                                            <path id="XMLID_222_" d="M250.606,154.389l-150-149.996c-5.857-5.858-15.355-5.858-21.213,0.001
                                                c-5.857,5.858-5.857,15.355,0.001,21.213l139.393,139.39L79.393,304.394c-5.857,5.858-5.857,15.355,0.001,21.213
                                                C82.322,328.536,86.161,330,90,330s7.678-1.464,10.607-4.394l149.999-150.004c2.814-2.813,4.394-6.628,4.394-10.606
                                                C255,161.018,253.42,157.202,250.606,154.389z"></path>
                                        </svg>
                                        <a onclick="return false;">Số điện thoại: {{ $system['contact_phone'] }} - Hotline: {{ $system['contact_hotline'] }}</a>
                                    </li>
                                    <li class="uk-flex">
                                        <svg fill="#fff" height="18px" width="18px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 330 330" xml:space="preserve">
                                            <path id="XMLID_222_" d="M250.606,154.389l-150-149.996c-5.857-5.858-15.355-5.858-21.213,0.001
                                                c-5.857,5.858-5.857,15.355,0.001,21.213l139.393,139.39L79.393,304.394c-5.857,5.858-5.857,15.355,0.001,21.213
                                                C82.322,328.536,86.161,330,90,330s7.678-1.464,10.607-4.394l149.999-150.004c2.814-2.813,4.394-6.628,4.394-10.606
                                                C255,161.018,253.42,157.202,250.606,154.389z"></path>
                                        </svg>
                                        <a onclick="return false;">Website: {{ $system['contact_website'] }} </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<div class="copyright">
    <div class="uk-container uk-container-center">
        <div class="uk-text-right">
            Copyright © 2025 HTVIETNAM. Design by HT VIETNAM
        </div>
    </div>
</div>

<div id="fb-root"></div>
<script async defer crossorigin="anonymous"
    src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v5.0&appId=103609027035330&autoLogAppEvents=1">
</script>

