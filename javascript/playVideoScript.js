//////////////////////////////////////////////////////////////////////
// Ako autoplay implementiran u 'play_video-php' zakaže, koristiti kod 
// napisan u ovoj datoteci
//////////////////////////////////////////////////////////////////////


//asinkroni import youtube api iframe javascript biblioteke
var tag = document.createElement('script');
tag.src = 'https://www.youtube.com/iframe_api';

var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);


//ova funkcija se poziva kad je iframe api preuzet i učitan
var player;
function onYouTubeIframeAPIReady() {
	player = new YT.Player('videoPlayer', {		//'videoPlayer' je ID dan iframe elementu koji pokreće video u 'play_video.php'
		events: {
			'onReady': onPlayerReady
		},
		playerVars: {
			'autoplay': 1
		}
	});
}



function onPlayerReady(event) {
	event.target.playVideo();
}

function onError(event) {
	console.log("Error has occured!");
}