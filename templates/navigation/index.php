<h3> Fax List (newest first)</h3>
<ul>
    <?php foreach($_['faxes'] as $fax){ ?>
        <li><a href="<?php p('/index.php/apps/faxapp/fax/'.$fax->getId()) ?>"><?php p($fax->getSubject()) ?></a></li>
    <?php } ?>
</ul>
