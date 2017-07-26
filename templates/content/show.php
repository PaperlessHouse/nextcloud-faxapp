
<?php if ($_['fax']->getStatus() === "draft") { ?>
    <div class="section" id="fax">
    	<h2 data-anchor-name="fax"><div class="icon-fax"></div><div><?php p($l->t('FAX')) ?></div></h2>
        <label for="subject"><?php p($l->t('Subject')) ?></label><br />
    	<input placeholder="Purpose of fax" type="text"
    		name="subject" id="subject" value="<?php p($_['fax']->getSubject())?>"
    		style="width: 300px;"> <br />
        <label for="toName"><?php p($l->t('To Name')) ?></label><br />
    	<input placeholder="First & Last Name" type="text"
    		name="toName" id="toName" value="<?php p($_['fax']->getToName())?>"
    		style="width: 300px;"> <br />
        <label for="toFax"><?php p($l->t('To Fax')) ?></label><br />
    	<input placeholder="999-999-99999" type="text"
    		name="toFax" id="toFax" value="<?php p($_['fax']->getToFax())?>"
    		style="width: 300px;"> <br />
        <label for="faxMessage"><?php p($l->t('Message')) ?></label><br />
    	<input placeholder="Note to recipient" type="textarea"
    		name="faxMessage" id="faxMessage" value="<?php p($_['fax']->getFaxMessage())?>"
    		style="width: 300px;"> <br />
        <button type="button"  id="save_draft" onclick="save_draft();"><?php p($l->t('Save Draft')) ?></button>
        <button type="button" id="send_fax"><?php p($l->t('Send Fax')) ?></button>
        <input type="text" name="faxId" id="faxId" hidden value="<?php p($_['fax']->getId())?>">
        <ul>
            <li>From Name: <?php p($_['fax']->getFromName()) ?></li>
            <li>From Address: <?php p($_['fax']->getFromAddress()) ?></li>
            <li>From City: <?php p($_['fax']->getFromCity()) ?></li>
            <li>From State: <?php p($_['fax']->getFromState()) ?></li>
            <li>From Zip: <?php p($_['fax']->getFromZip()) ?></li>
            <li>From Phone: <?php p($_['fax']->getFromPhone()) ?></li>
            <li>From Email: <?php p($_['fax']->getFromEmail()) ?></li>
            <li>Status: <?php p($_['fax']->getStatus()) ?></li>
        </ul>
    </div>
<?php } else { ?>
    <div class="section" id="fax">
    	<h2 data-anchor-name="fax"><div class="icon-fax"></div><div><?php p($l->t('FAX')) ?></div></h2>
        <ul>
            <li>Subject: <?php p($_['fax']->getSubject()) ?></li>
            <li>To Name: <?php p($_['fax']->getToName()) ?></li>
            <li>To Fax: <?php p($_['fax']->getToFax()) ?></li>
            <li>From Name: <?php p($_['fax']->getFromName()) ?></li>
            <li>From Address: <?php p($_['fax']->getFromAddress()) ?></li>
            <li>From City: <?php p($_['fax']->getFromCity()) ?></li>
            <li>From State: <?php p($_['fax']->getFromState()) ?></li>
            <li>From Zip: <?php p($_['fax']->getFromZip()) ?></li>
            <li>From Phone: <?php p($_['fax']->getFromPhone()) ?></li>
            <li>From Email: <?php p($_['fax']->getFromEmail()) ?></li>
            <li>Fax Message: <?php p($_['fax']->getFaxMessage()) ?></li>
            <li>Status: <?php p($_['fax']->getStatus()) ?></li>
        </ul>
    </div>
<?php } ?>
