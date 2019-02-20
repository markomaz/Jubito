var currentPage;
var nextPageToken;

const VIDEO_RESULTS_OFFSET = 215;

var results_container = document.getElementById("results_div");
var searchForm = document.getElementById("searchForm");

//isprazni search box pri povratku na stranicu
searchForm.value = '';
searchForm.focus();


//postavi event handler za search input
searchForm.addEventListener("input", function(e) {
	var searchPhrase = searchForm.value;
	if(searchPhrase) {
		var url = makeRequestURL(searchPhrase);
		currentPage = 1;

		loadYouTubeData(url, initialSearch = true);
	}
});


//postavi event handler za infinite scroll
var request_in_progress = false;
window.onscroll = function() {
	var current_y = window.innerHeight + window.pageYOffset;
	var treshold = results_container.offsetHeight + VIDEO_RESULTS_OFFSET;

	if(current_y >= treshold) {
		if(request_in_progress) return;

		request_in_progress = true;

		var searchPhrase = searchForm.value;
		var url = makeRequestURL(searchPhrase, nextPageToken);

		loadYouTubeData(url);
	}
}




function loadYouTubeData(url, initialSearch = false) {
	var xhr = new XMLHttpRequest();
	xhr.open('GET', url); 

	xhr.onload = function() {
		var data = JSON.parse(xhr.responseText);

		nextPageToken = data.nextPageToken;

		if(initialSearch) {
			results_container.innerHTML = '';
			currentPage = 1;
		} else {
			currentPage++;
		}

		appendResultsToPage(results_container, data);
		setFavButtonEventHandler();

		request_in_progress = false;
	}
	xhr.send();
}


function setFavButtonEventHandler() {
	var fav_buttons = document.querySelectorAll(".favorite-button");

	for (var i = 0; i < fav_buttons.length; i++) {
			fav_buttons[i].addEventListener("click", function(e) {
				handleFavButtonClick(e)
			});
	}
}


function handleFavButtonClick(e) {
	console.log("Klik!");
}

