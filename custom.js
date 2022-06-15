$('.card-question').on('click', function(event) {
    if (event.currentTarget.className.includes("active"))
        $(this).removeClass("active");
    else
        $(this).toggleClass('active');
})

$("#nav ul li a[href^='#']").on('click', function(e) {
    e.preventDefault();

    var hash = this.hash;

    $('html, body').animate(
        {
            scrollTop: $(hash).offset().top
        }, 500, function()
            {
                window.location.hash = hash;
            }
    );
});

window.addEventListener('scroll', function() {
    let scrollToTop = document.querySelector('.bi-arrow-up-circle-fill');

    if (pageYOffset > 600 && scrollToTop.style.opacity != .8)
        scrollToTop.style.opacity = .8;
    if (pageYOffset < 600 && scrollToTop.style.opacity != 0)
        scrollToTop.style.opacity = 0;
});