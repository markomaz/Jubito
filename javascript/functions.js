var key = "AIzaSyD4MwS0OyDFgKYDnGI7lAb4M3n3mxFJ_WU"

var base_url = "https://www.googleapis.com/youtube/v3/search/?part=snippet&type=video";
var fields = "items(id,snippet),nextPageToken,pageInfo,prevPageToken,tokenPagination";
var resultsPerPage = 10; //max results that the YouTubeAPI allows is 50



function makeRequestURL(q, pageToken = "") {
	var url = base_url + 
			"&q=" + q +
			"&fields=" + fields +
			"&maxResults=" + resultsPerPage +
			"&key=" + key;
	if (pageToken !== "") {
		url += "&pageToken=" + pageToken;
	}
	return url;
}


function appendResultsToPage(container, contents) {
	var results_html = createVideoResultsHTML(contents);

	container.innerHTML += results_html;
}


function createVideoResultsHTML(contents) {
	var temp_results_html = '';

	for(var i = 0; i < resultsPerPage; i++) {
		var item = contents.items[i];

		temp_results_html += `<div class="media">
								<button class="btn btn-outline-primary favorite-button align-self-center mr-2">+</button>
								<a href="http://localhost/projects/Jubito/play_video.php?videoId=`+ item.id.videoId + `">
				        			<img class="align-self-center mr-3" src="` + item.snippet.thumbnails.default.url + `" style="width:200px" alt="Video">
				    			</a>
				        		<div class="media-body">
				          			<h5 class="mt-0">` + item.snippet.title + `</h5>
				          			<p>` + item.snippet.description + `</p>
				        		</div>
			    			</div>`;
	}
	return temp_results_html;
}