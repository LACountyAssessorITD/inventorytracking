<?php
include 'Conn.php';

	function searchForAsset() {
		$assetNum = $_POST["assetNumInput"];
		$serialNum = $_POST["serialNumInput"];
		$category = $_POST["categoryInput"];
		$model = $_POST["modelInput"];
		$location= $_POST["locationInput"];
		
		$val = array($assetNum, $serialNum, $category, $model, $location);
		$result = search($val);
		
		return $result;
	}

	function assetDetail($tag) {
		$val = array($tag);
		return search($val);
	}

	function assetHistory($tag) {
		$val = array($tag);
		return searchHistory($val);
	}
?>