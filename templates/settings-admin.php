<?php
script('faxapp', 'faxappadmin');
?>
<div class="section" id="faxapp">
    <h2 class="icon-faxapp" data-anchor-name="faxapp"><?php p($l->t('Fax App Settings')) ?></h2>
	<label for="Twilio Account Sid"><?php p($l->t('Twilio Account Sid')) ?></label><br />
	<input placeholder="ACXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX" type="text"
		name="twilio_account_sid" id="twilio_account_sid" value="<?php p($_['twilio_account_sid'])?>"
		style="width: 300px;"> <br />
	<em><?php p($l->t('Get this value from your Twilio account settings.')) ?></em>
	<br />
    <label for="Twilio Auth Token"><?php p($l->t('Twilio Auth Token')) ?></label><br />
	<input placeholder="your_auth_token" type="text"
		name="twilio_auth_token" id="twilio_auth_token" value="<?php p($_['twilio_auth_token'])?>"
		style="width: 300px;"> <br />
	<em><?php p($l->t('Get this value from your Twilio account settings.')) ?></em>
	<br />
	<br />
	<button type="button" id="apply_settings"><?php p($l->t('Apply')) ?></button>
</div>
