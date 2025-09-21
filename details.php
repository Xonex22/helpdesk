<?php foreach($viewticket as $view2){?>
<dl>
<?php
$datecreated=$view2['date_created'];
$originalDateTimeString = "datetime";
$dateTime = new DateTime($datecreated);
$created = $dateTime->format('F j, Y h:i A');
?>
<dt><h5><small><strong><?= $view2['createdby'] . '</strong> - ' . $created . ' '; ?></small></h5></dt>
<dd><?= $view2['desc_request'];?></dd><br>