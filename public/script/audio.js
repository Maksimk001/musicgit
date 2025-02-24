const track = new Audio()
let music_start = document.querySelector('#music-start')
let music_block = document.querySelectorAll('.song')
let musicstate = false;
let musicplayershow = false;
let music_id = ''

function getFormattedDuration(durationInSeconds) {
    const minutes = Math.floor(durationInSeconds / 60); // Получаем минуты
    const seconds = Math.floor(durationInSeconds % 60); // Получаем секунды
    return `${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;
}
for (let i in songs) {
    document.querySelectorAll('div.time')[i].textContent = getFormattedDuration(songs[i].duration)
}

for (let i in music_block) {
    music_block[i].onclick = () => {
        if (songs[i].id === music_id) {
            music_play_pause()
        } else {
            music_start.src = '/image/pause.svg'
            musicplayershow = true
            musicstate = true
            document.querySelector('#imagetrack').src = `/${songs[i].image_path}`
            document.querySelector('.nametrack').textContent = songs[i].name
            document.querySelector('.authortrack').textContent = songs[i].author
            document.querySelector('div.time p:last-child').textContent = Duration(songs[i].duration)
            track.src = `/${songs[i].music_path}`;    
            setTimeout(() => {
                fetch(`/song/increment-listen/${songs[i].id}`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Content-Type': 'application/json'
                    }
                })
            }, 1000)
            track.ontimeupdate = function() {
                const currentTime = track.currentTime; 
                document.querySelector('div.time p:first-child').textContent = Duration(currentTime)
            };
    
            track.play()
            track.onended = function() {
                music_start.src = '/image/play.svg'
                musicstate = false
            }
            showMedia()
            music_id = songs[i].id
        }
    }    
}
function Duration(durationInSeconds) {
    const minutes = Math.floor(durationInSeconds / 60);
    const seconds = Math.floor(durationInSeconds % 60); 
    return `${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;
}
music_start.onclick = function() {
    music_play_pause()
} 
function music_play_pause() {
    if (!musicstate) {
        music_start.src = '/image/pause.svg'
        track.play()
        musicstate = true
    } else {
        music_start.src = '/image/play.svg'
        track.pause()
        musicstate = false
    }
}
function showMedia() {
    if (musicplayershow) {
        document.querySelector('.backmedia').style.bottom = '10px'
    }
}




let blockError = document.querySelector('.errorlist')
let errorText = document.querySelectorAll('.errorText')

animErrorOpen()
function animErrorOpen() {
    anime({
        targets: '.errorlist',
        left: '10px',
        easing: 'easeInOutQuad',
        duration: 1000,
    })
    animError()
}
function animError() {
    anime({
        targets: '.errorLine',
        width: '0%',
        easing: 'easeInOutQuad',
        duration: 4000,
    })
    setTimeout(() => {
        animErrorClose()
    }, 4000)
}
function animErrorClose() {
    anime({
        targets: '.errorlist',
        left: '-1000px',
        easing: 'easeInOutQuad',
        duration: 1000,
    })
}