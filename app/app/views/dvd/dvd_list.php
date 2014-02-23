<!doctype html>
<html>
<head>
  <title<DVDS</title>
</head>
<body>

<h1>All Dvds</h1>
<?php
	echo "<table border='1'>
  		<tr>
	 	<th>Title</th>
	  	<th>Rating</th>
	  	<th>Genre</th>
	  	<th>Label</th>
	  	<th>Sound</th>
	  	<th>Format</th>
	  	<th>Release Date</th>
	  	</tr>";
	foreach ($dvds as $dvd) :  {
		echo "<tr>";
	    echo "<td>" . $dvd->title . "</td>";
	    echo "<td>" . $dvd->rating_name . "</td>";
	    echo "<td>" . $dvd->genre_name . "</td>";
	    echo "<td>" . $dvd->label_name . "</td>";
	    echo "<td>" . $dvd->sound_name . "</td>";
	    echo "<td>" . $dvd->format_name . "</td>";
	    echo "<td>" . $dvd->release_date . "</td>";
	    echo "</tr>";
	}
	endforeach;
  	echo "</table>";
  ?>

</body>
</html>