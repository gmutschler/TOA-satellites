<p>Information about the user:</p>

<?php
$localUser = $sf_user->getMelody('eventbrite')->getUserData(null);
?>

<pre>
<?=print_r($localUser)?>
</pre>

<p>Email: <?=$localUser['user']['email']?></p>
