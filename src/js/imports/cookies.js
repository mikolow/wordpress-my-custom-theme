export default function () {
    const closeCookie = document.querySelector('.cookies__close'),
        cookies = document.querySelector('.cookies')

    if ( localStorage.getItem('cookies') === 'closed' ) {
        cookies.style.display = 'none'
    }
    else {
        cookies.style.display = 'block'
    }

    closeCookie.addEventListener('click', () => {
        cookies.style.display = 'none'
        localStorage.setItem('cookies', 'closed')
    })
}