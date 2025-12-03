{{-- Fixed Contact Buttons --}}
<div class="fixed-contact-buttons">
    <a href="{{ $system['contact_zalo'] ?? '' }}" target="_blank" class="contact-btn btn-zalo" title="Chat Zalo">
        <i class="fa fa-comments"></i>
        <span class="btn-text">Nhắn tin</span>
        <span class="btn-label">Zalo</span>
    </a>
    
    <a href="{{ $system['social_facebook'] ?? '' }}" target="_blank" class="contact-btn btn-facebook" title="Facebook">
        <i class="fa fa-facebook"></i>
        <span class="btn-text">Facebook</span>
        <span class="btn-label">Fanpage</span>
    </a>
    
    <a href="{{ $system['contact_mess'] ?? '' }}" target="_blank" class="contact-btn btn-messenger" title="Messenger">
        <i class="fa fa-facebook-messenger"></i>
        <span class="btn-text">Nhắn tin</span>
        <span class="btn-label">Messenger</span>
    </a>
    
    <a href="tel:{{ $system['contact_hotline'] ?? '' }}" class="contact-btn btn-phone" title="Hotline">
        <i class="fa fa-phone"></i>
        <span class="btn-text">Liên hệ</span>
        <span class="btn-label">Hotline</span>
    </a>
</div>

