var btnComments = document.querySelectorAll('.btn-add-comment');

for(var btnComment of btnComments){
        if (btnComment.dataset.guest === 'true') {
            btnComment.dataset.bsToggle = 'modal';
            btnComment.dataset.bsTarget = '#exampleModalLogin';
        }

}


$(document).on('click', '.scrollButton', function(){
        if($(this).data('guest') == false) {
            var scrollToId = $(this).data("scroll");
            console.log(scrollToId);
            $('html, body').animate({
                scrollTop: $("#" + scrollToId).offset().top
            }, 1000); // Скорость прокрутки
        }
    });