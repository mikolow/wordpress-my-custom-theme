import Glide from '@glidejs/glide'

export default function () {

    if ( !document.querySelector('.slider') ) {
        return;
    }
    const slider = new Glide('.glide-front', {
        autoplay: false,
        type: 'carousel',
        animationDuration: 800
    })

    slider.mount()

    const prevBtn = document.querySelector('.prev-js')
    const nextBtn = document.querySelector('.next-js')

    prevBtn.addEventListener('click', (e) => {
        e.preventDefault()
        slider.go('<')
    })

    nextBtn.addEventListener('click', (e) => {
        e.preventDefault()
        slider.go('>')
    })
    
}