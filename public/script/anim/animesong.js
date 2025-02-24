anime({
    targets: '.animeHeader',
    translateY: [-100, 0],
    opacity: 1,
    easing: 'easeInOutQuad'
});
anime({
    targets: '#dsd',
    translateY: [-1000, 0],
    opacity: 1,
    easing: 'easeInOutQuad'
});
let song = document.querySelectorAll('.song')
for (let i in song) {
    setInterval(() => {
        anime({
            targets: song[i],
            translateX: [-3500, 0],
            opacity: 1,
            easing: 'easeInOutQuad'
        });
        i++
    }, 150)
}
anime()