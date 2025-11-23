<footer id="footer" class="footer-main">
    <div class="uk-container uk-container-center">
        <div class="footer-content">
            {{-- Left Column: Logo & Contact Info --}}
            <div class="footer-column footer-info">
                <div class="footer-logo">
                    @if(isset($system['homepage_logo']) && $system['homepage_logo'])
                        <img src="{{ $system['homepage_logo'] }}" alt="{{ $system['homepage_company'] ?? 'VSTEP' }}">
                    @else
                        <div class="logo-text">VSTEP</div>
                    @endif
                </div>
                <p class="footer-description">
                    {{ $system['homepage_description'] ?? 'Trung tâm luyện thi chứng chỉ tiếng Anh eVSTEP bậc 3/6 – đào tạo trực tuyến chuyên sâu, cam kết đầu ra bằng hợp đồng.' }}
                </p>
                <div class="footer-contact">
                    @if(isset($system['contact_email']) && $system['contact_email'])
                        <div class="contact-item">
                            <span class="contact-label">Email:</span>
                            <span class="contact-value">{{ $system['contact_email'] }}</span>
                        </div>
                    @endif
                    @if(isset($system['contact_hotline']) && $system['contact_hotline'])
                        <div class="contact-item">
                            <span class="contact-label">Hotline:</span>
                            <span class="contact-value">{{ $system['contact_hotline'] }}</span>
                        </div>
                    @endif
                    @if(isset($system['contact_office']) && $system['contact_office'])
                        <div class="contact-item">
                            <span class="contact-label">Địa chỉ:</span>
                            <span class="contact-value">{{ $system['contact_office'] }}</span>
                        </div>
                    @endif
                </div>
                <div class="footer-social">
                    @if(isset($system['social_facebook']) && $system['social_facebook'])
                        <a href="{{ $system['social_facebook'] }}" target="_blank" class="social-link" title="Facebook">
                            <span>Fb</span>
                        </a>
                    @endif
                    @if(isset($system['social_youtube']) && $system['social_youtube'])
                        <a href="{{ $system['social_youtube'] }}" target="_blank" class="social-link" title="YouTube">
                            <span>Yt</span>
                        </a>
                    @endif
                    @if(isset($system['social_zalo']) && $system['social_zalo'])
                        <a href="{{ $system['social_zalo'] }}" target="_blank" class="social-link" title="Zalo">
                            <span>Zalo</span>
                        </a>
                    @endif
                    @if(isset($system['social_tiktok']) && $system['social_tiktok'])
                        <a href="{{ $system['social_tiktok'] }}" target="_blank" class="social-link" title="TikTok">
                            <span>Tik</span>
                        </a>
                    @endif
                </div>
            </div>
            
            {{-- Menu Columns --}}
            @php
                $footerMenus = [];
                if(isset($menu) && is_array($menu)) {
                    foreach($menu as $key => $val) {
                        if(strpos($key, 'footer') !== false && is_array($val)) {
                            $footerMenus = $val;
                            break;
                        }
                    }
                }
            @endphp
            
            @if(!empty($footerMenus))
                @foreach($footerMenus as $menuItem)
                    @php
                        $menuName = $menuItem['item']->languages->first()->pivot->name ?? '';
                        $menuChildren = $menuItem['children'] ?? [];
                    @endphp
                    @if(!empty($menuChildren))
                        <div class="footer-column footer-menu">
                            <h3 class="footer-menu-title">{{ $menuName }}</h3>
                            <ul class="footer-menu-list">
                                @foreach($menuChildren as $child)
                                    @php
                                        $childName = $child['item']->languages->first()->pivot->name ?? '';
                                        $childCanonical = $child['item']->languages->first()->pivot->canonical ?? '';
                                        $childUrl = $childCanonical ? write_url($childCanonical) : '#';
                                    @endphp
                                    <li>
                                        <a href="{{ $childUrl }}">{{ $childName }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                @endforeach
            @endif
        </div>
        
        {{-- Copyright Section --}}
        <div class="footer-copyright">
            <p>{{ $system['homepage_copyright'] ?? '© CÔNG TY CỔ PHẦN TƯ VẤN DỊCH VỤ ĐÀO TẠO AUM VIỆT NAM' }}</p>
        </div>
    </div>
</footer>
