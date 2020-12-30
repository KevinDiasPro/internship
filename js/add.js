function addContent() {

	var title = document.getElementById("title").value;
	if (title.length < 2) {
		alert("Problem with the title!");
		return;
	}
	var year = document.getElementById("year").value;
	if (isNaN(year) || (year < 1900 || year > 2020)) {
		alert("Problem with the year!");
		return;
	}
	var studio = document.getElementById("studio").value;

	var imdb_id = document.getElementById("imdb_id").value;

	if (isNaN(imdb_id) || imdb_id.length > 11 || imdb_id.length < 1) {
		alert("Problem with imdb!");
		return;
	}

	var url = "php/addContent.php";
	var params = "title=" + encodeURIComponent(title) + "&year=" + encodeURIComponent(year) + "&studio=" + encodeURIComponent(studio) + "&imdb_id=" + encodeURIComponent(imdb_id);
	var xhr = getXHR();
	xhr.onreadystatechange = function () {
		if (xhr.readyState == 4) {
			if (xhr.status == 200) {
				add_message_me(xhr.responseText);
			}
		}
	};
	xhr.open("POST", url, true);
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xhr.send(params);
}

function add_message_me(message) {
	alert("The content has been added!");
}

function refreshPage() {
	window.location.reload();
} 
