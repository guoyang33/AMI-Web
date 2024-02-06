function call_redirect_confirm_box(msg, ok_url, cancel_url) {
    if (confirm(msg)) {
        window.open(ok_url, '_blank');
    } else {
        window.open(cancel_url, '_blank');
    }
}

$(document).ready(function() {
    $('#prod-1-pro-btn-en').click(function() {
        call_redirect_confirm_box('This site is intended for healthcare professionals and patients, and its content involves medical expertise.\nBy clicking \"OK,\" you acknowledge this disclaimer and confirm that you are either a healthcare professional or a patient.', 'https://www.diurnal.com/NonUkResidents/HCP/home', 'https://www.diurnal.com/NonUkResidents/Non-HCP/home');
    });
    $('#prod-1-pro-btn-zh').click(function() {
        call_redirect_confirm_box('本網站專為醫療專業人員及病患而設計，其訊息涉及醫療專業知識。\n點擊「確定」，即表示您知曉左免責聲明，並承認您是醫療專業人員或病患。', 'https://www.diurnal.com/NonUkResidents/HCP/home', 'https://www.diurnal.com/NonUkResidents/Non-HCP/home');
    });
});