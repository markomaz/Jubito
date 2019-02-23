<?php

function redirectTo($location = null) {
		if ($location) {
			header("Location: {$location}");
			exit();	
		}
}