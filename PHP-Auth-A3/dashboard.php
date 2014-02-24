<?php

require '../../Carbon-master/src/Carbon/Carbon.php';
require '../../HttpFoundation/Request.php';
require '../../HttpFoundation/HeaderBag.php';
require '../../HttpFoundation/ResponseHeaderBag.php';
require '../../HttpFoundation/Response.php';
require '../../HttpFoundation/RedirectResponse.php';
require '../../HttpFoundation/ParameterBag.php';
require '../../HttpFoundation/FileBag.php';
require '../../HttpFoundation/ServerBag.php';
require '../../HttpFoundation/Session/SessionBagInterface.php';
require '../../HttpFoundation/Session/SessionInterface.php';
require '../../HttpFoundation/Session/Storage/SessionStorageInterface.php';
require '../../HttpFoundation/Session/Storage/Proxy/AbstractProxy.php';
require '../../HttpFoundation/Session//Storage/Proxy/SessionHandlerProxy.php';
require '../../HttpFoundation/Session/Storage/NativeSessionStorage.php';
require '../../HttpFoundation/Session/Storage/MetadataBag.php';
require '../../HttpFoundation/Session/Session.php';
require '../../HttpFoundation/Session/Attribute/AttributeBagInterface.php';
require '../../HttpFoundation/Session/Attribute/AttributeBag.php';
require '../../HttpFoundation/Session/Flash/FlashBagInterface.php';
require '../../HttpFoundation/Session/Flash/FlashBag.php';
require_once '../classes/SongQuery.php';
require_once '../db.php';




use Carbon\Carbon;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\Session\Session;

// $request = Request::createFromGlobals();
// $username = $session->getallheaders('username');


$session = new Session();
$session->start();

$username = $session->get('username');
$email = $session->get('email');

if (!$username) {
	$session->getFlashBag()->add('invalid', 'Please log in');
	$response = new RedirectResponse('login.php');
	$response->send();
} else {
	foreach ($session->getFlashBag()->get('loginSuccessMessage', array()) as $message) {
    	echo '<div class="flash-notice">'.$message.'</div><br>';
	}	
	$loginTime = $session->get('loginDate');
	$timeElapsed = $loginTime->diffInSeconds(Carbon::now('America/Vancouver'));
	$songQuery = new SongQuery($pdo);
	$songs = $songQuery->all();

	echo "<div style='float:right'>
			Username: " . $username . "
			<br>
			Email: " . $email . "
			<br>
			Last login: <b>" . $timeElapsed . " </b> seconds ago
			<br>
			<a href='logout.php'>Logout</a>
		  </div>";
	echo "<table border='1'>
  		<tr>
	 	<th>Title</th>
	  	<th>Artist</th>
	  	<th>Genre</th>
	  	<th>Price</th>
	  	</tr>";
	for ($i = 0; $i < count($songs); $i++) {
		echo "<tr>";
	    echo "<td>" . $songs[$i]['title'] . "</td>";
	    echo "<td>" . $songs[$i]['artist_name'] . "</td>";
	    echo "<td>" . $songs[$i]['genre'] . "</td>";
	    echo "<td>" . $songs[$i]['price'] . "</td>";
	    echo "</tr>";
	}
  	echo "</table>";
}

?>


