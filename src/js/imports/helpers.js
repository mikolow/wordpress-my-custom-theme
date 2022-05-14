export default function isMobile() {
    return window.matchMedia('(max-width: 768px)').matches;
}