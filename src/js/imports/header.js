const hamburgerBtn = document.querySelector('#hamburger');
const hamburgerBtnClose = document.querySelector('#hamburger-close');
const mainNav = document.querySelector('.main-nav-wrap');
const page = document.querySelector('#page')

const $ = jQuery.noConflict()

function handleMenuhamburger() {
    hamburgerBtn.addEventListener('click', function () {
        mainNav.classList.add('active');
        hamburgerBtn.classList.add('is-active');
        hamburgerBtnClose.classList.add('is-active');
        page.classList.toggle('am-mobile-scroll');
        $('body').attr('data-mobile-menu-active', '1')
    })
}

function closeMenu() {
    mainNav.classList.remove('active');
    hamburgerBtn.classList.remove('is-active');
    hamburgerBtnClose.classList.remove('is-active');
    page.classList.remove('am-mobile-scroll');
    $('body').attr('data-mobile-menu-active', '0')
}


function handleMenuhamburgerMobileClose() {
    hamburgerBtnClose.addEventListener('click', function () {
        closeMenu()
    })
}


function hideMobileMenuOnClickLink() {
    $('.menu-item:not(.menu-item-has-children) > a').on('click', function (ev) {
        closeMenu()
    })
}

function hideMobileMenuOnClickOutside() {
    shutter.addEventListener('click', function () {
        closeMenu()
    })
}

function handleSubMenu() {

    $('.offer-item > a').on('click', function (ev) {
        ev.preventDefault()
        const screenWidth = window.innerWidth;

        if ( screenWidth < 768 ) {
            $(this).closest('.menu-item-has-children').find('.sub-menu').slideToggle();
        }

    })

}

function coloredMenuItem() {
    const menuItems = document.querySelectorAll('.menu-item-colored > a');

    menuItems.forEach(function (menuItem) {
        menuItem.addEventListener('mouseenter', function (e) {
            menuItems.forEach(function (menuItem) {
                menuItem.classList.add('active-a-link')
            })
            e.target.classList.remove('active-a-link')
        })
        menuItem.addEventListener('mouseout', function (e) {
            menuItems.forEach(function (menuItem) {
                menuItem.classList.remove('active-a-link')
            })
        })
    })

}

export default function () {
    handleMenuhamburger()
    handleMenuhamburgerMobileClose()
    // handleSubMenu()
    // coloredMenuItem()
    hideMobileMenuOnClickLink()
    hideMobileMenuOnClickOutside()
}



