<?php

/* Connection to database */
	$conn =mysqli_connect("b79cec36b77084","19516659","","blog");

	/* Check connection */
	if(mysqli_connect_error()) {
		echo "Connection failed";
		printf("Error : %s",mysqli_connect_error());
	}

?>
