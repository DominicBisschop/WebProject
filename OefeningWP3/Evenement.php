<!DOCTYPE html>
<html lang="en">
<head>
    <link href="css/style.css" rel="stylesheet">
</head>
	<body>
		<img src="img/monkey_logo.png" width="100px" class="logo">
		<h1>Monkey Bussiness</h1>
		<br><br><br>
		<h2>Evenementen</h2>
		<input type="text" id="getID">
		<button type="button" class="btn" id="searchButton">get ID</button>
		<br>
		<input type="text" id="delID">
		<button type="button" class="btn" id="deleteButton">delete ID</button>
		<br>
		<br>
		<table class="table">
			<tr>
				<th>Event ID</th>
				<th>User Creator ID</th>
				<th>Event Naam</th>
				<th>Locatie</th>
				<th>Datum</th>
			</tr>
		</table>
    </body>
<script>
    var container = document.getElementById("table");
    var getID = document.getElementById("getID").value;
    var delID = document.getElementById("delID").value;
    var url = "http://192.168.217.134/~user/monkey/api/events/";//todo

    document.getElementById("searchButton").addEventListener("click",myFunction);
    function myFunction(){
        var getID = document.getElementById("getID").value;
        fetch('url + getID', {
            method: 'GET'
        }).then(function(response) {
            renderHTML(response);
        }).catch(function(err) {
            //error
        });
    };

    document.getElementById("deleteButton").addEventListener("click",deleteID);
    function deleteID() {
        var delID = document.getElementById("delID").value;
        if (confirm('Wil je evenement ' + delID + ' verwijderen?')) {
            fetch('url + delID', {
                method: 'DELETE'
            }).then(function(response) {
                alert("het evenement is verwijderd")
            }).catch(function(err) {
                //error
            });
        }
    };

    function renderHTML(data){
        for(i = 0; i<data.length; i++){
            $('.table tbody').append('<tr><th>' + data[i].EventID + '</th><th>' + data[i].UserCreatorID + '</th><th>' + data[i].EventName + '</th><th>' + data[i].Location + '</th><th>' + data[i].DateOfEvent + '</th></tr>');
        }
    }

</script>
</html>