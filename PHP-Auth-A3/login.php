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


use Carbon\Carbon;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\Session\Session;

$session = new Session();
foreach ($session->getFlashBag()->get('loginFailMessage', array()) as $message) {
    echo '<div class="flash-notice">'.$message.'</div><br>';
}

foreach ($session->getFlashBag()->get('invalid', array()) as $message) {
    echo '<div class="flash-notice">'.$message.'</div><br>';
}
?>

<form action="login-process.php">
  Username: <input type="text" name="username"><br>
  Password: <input type="password" name="password"><br>
  <input type="submit" value="Submit">
</form>

