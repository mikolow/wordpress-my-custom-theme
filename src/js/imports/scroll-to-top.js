const button = document.getElementById("ScrollToTopBtn");

export default function () {

    function scrollFunction() {
        if ( document.body.scrollTop > 20 || document.documentElement.scrollTop > 20 ) {
            button.style.display = "block";
        }
        else {
            button.style.display = "none";
        }
    }

    window.onscroll = function () {
        scrollFunction()
    };

    button.addEventListener('click', () => {
        window.scrollTo(0, 0)
    })
}
