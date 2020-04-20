<?php

/* Connection to database */
	$conn =mysqli_connect("eu-cdbr-west-03.cleardb.net", "b79cec36b77084", "19516659", "heroku_16af6333e43605f");

	/* Check connection */
	if(mysqli_connect_error()) {
		echo "Connection failed";
		printf("Error : %s",mysqli_connect_error());
	}

?>
