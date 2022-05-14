import AOS from 'aos';

export default function () {
    AOS.init({
        offset: 0,
        duration: 800,
        easing: 'ease-in-sine',
        delay: 50,
    });
}