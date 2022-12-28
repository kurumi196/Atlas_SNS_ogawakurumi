$('.a_btn').click(function () {
    $(this).toggleClass('is-open');
    // $(this).siblings('.a_menu').toggleClass('is-open');
    $('.a_menu').toggleClass('is-open');
});


let modalMenu = false;

let editModal = function (id) {
    let checkForm = document.querySelector('.editModal_' + id);
    // scrollTo(0, 0);
    if (modalMenu === false) {
        checkForm.style.display = "flex";
        modalMenu = true;
    }
    else if (modalMenu === true) {
        checkForm.style.display = "none";
        modalMenu = false;
    }
}
