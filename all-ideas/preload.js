function preloadAudio (filename) {

    var sound = new Audio();
    sound.preload = 'auto';

    sound.addEventListener('canplaythrough', function () {
        // now the audio is ready to play through
    });

    document.body.appendChild(sound);

    sound.src = filename;
    sound.load();

}

const audioArray = ['audio1.mp3', 'audio2.mp3', 'audio3.mp3'];
let currentIndex = 0;

function preloadNextAudio() {
    // Create a new Audio object
    const audio = new Audio();

    // Set the src to the next audio in the array
    audio.src = audioArray[currentIndex + 1];

    // Start preloading the audio
    audio.load();
}

'https://stackoverflow.com/questions/29723089/preloading-the-next-song-in-a-playlist-a-bit-before-the-current-one-ends'