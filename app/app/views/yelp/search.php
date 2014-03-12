<?php
	echo "<table border='1'>
  		<tr>
	 	<th>Restaurant Name</th>
	  	<th>Facebook Page</th>
	  	<th>Type</th>
	  	<th>City</th>
	  	<th> Reviews </th>
	  	</tr>";
	foreach ($restaurants as $res) :  {
		echo "<tr>";
	    echo "<td>" . $res->restaurant_name . "</td>";
	    $page = '';
	    if ($res->facebook_page) {
	    	$page = 'Facebook Page <a href="http://facebook.com/'.	$res->facebook_page.'">here </a>';
	    } else {
	    	$page = "Not on Facebook";
	    }
	    echo "<td>" . $page . "</td>";	
	    echo "<td>" . $res->type . "</td>";
	    echo "<td>" . $res->city . "</td>";
	    echo "<td> <a href='/restaurants/".$res->id."/reviews'> View Reviews </a> </td>";
	    echo "</tr>";
	}
	endforeach;
  	echo "</table>";