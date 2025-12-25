{{-- Registration Popup Component --}}
<div id="register-popup" class="register-popup-overlay" style="display: none;">
    <div class="register-popup-container">
        <button type="button" class="register-popup-close" id="register-popup-close">
            <i class="fa fa-times"></i>
        </button>
        
        <div class="register-popup-content">
            <h3 class="register-popup-title">ĐĂNG KÝ NGAY</h3>
            <h4 class="register-popup-offer">ƯU ĐÃI LIỀN TAY - VSTEP LẤY NGAY</h4>
            <p class="register-popup-details">Liên hệ để nhận tư vấn lộ trình học <strong>TỪ A2 - B2</strong></p>
            <p class="register-popup-benefits"><strong>NHANH CHÓNG - TIẾT KIỆM - DỄ DÀNG</strong></p>
            
            <form class="register-popup-form" id="register-popup-form" method="POST">
                <div class="form-group-popup">
                    <input type="text" name="name" class="form-control-popup" placeholder="Tên của bạn" required>
                </div>
                
                <div class="form-group-popup">
                    <input type="tel" name="phone" class="form-control-popup" placeholder="Số điện thoại /zalo *" required>
                </div>
                
                <div class="form-group-popup">
                    <textarea name="message" class="form-control-popup" rows="3" placeholder="Để lại lời nhắn cho chúng tôi"></textarea>
                </div>
                
                <button type="submit" class="btn-submit-popup">ĐĂNG KÝ NGAY</button>
                
                <p class="register-popup-note">*Chỉ có 100 suất dành cho 100 khách hàng đăng ký đầu tiên</p>
                
                <div class="register-popup-message" id="register-popup-message"></div>
            </form>
        </div>
    </div>
</div>
