<?php

class YouTubeAPI {
	
	private static $_base_url = 'https://www.googleapis.com/youtube/v3/search/?part=snippet';
	private static $_type = 'video';
	private static $_fields = 'items(id,snippet),nextPageToken,pageInfo,prevPageToken,tokenPagination';

	public static function search($q, $pageToken = null, $max_results = 10) {
		if ($q) {
			$request_url = self::$_base_url . 
							'&q=' . urlencode($q) .
							'&maxResults=' . $max_results .
							'&type=' . self::$_type . 
							'&fields=' . urlencode(self::$_fields) . 
							'&key=' . Config::get('YT_api/key');

			if($pageToken) {
				$request_url = $request_url . '&pageToken=' . $pageToken;
			}

			return json_decode(Request::get($request_url), true);
		}
	}
}