<?php

/**
 * Nextcloud - Fax App
 */
namespace OCA\FaxApp\Settings;

use OCP\Settings\ISettings;
use OCP\IConfig;
use OCP\AppFramework\Http\TemplateResponse;
use OCA\FaxApp\Constants\FaxAppConstants;


class Admin implements ISettings {

    /** @var IConfig */
    private $config;

    /**
     *
     * @param IConfig $config
     */
    public function __construct(IConfig $config) {
        $this->config = $config;
    }

    /**
     *
     * @return TemplateResponse
     */
    public function getForm() {
        $twilioAccountSid = $this->config->getAppValue('faxapp', 'twilio_account_sid', "");
        $twilioAuthToken = $this->config->getAppValue('faxapp', 'twilio_auth_token', "");
        $parameters = [
            'twilio_account_sid' => $twilioAccountSid,
            'twilio_auth_token' => $twilioAuthToken
        ];

        return new TemplateResponse('faxapp', 'settings-admin', $parameters);
    }

    /**
     *
     * @return string the section ID, e.g. 'sharing'
     */
    public function getSection() {
        return 'faxapp';
    }

    /**
     *
     * @return int whether the form should be rather on the top or bottom of
     *         the admin section. The forms are arranged in ascending order of the
     *         priority values. It is required to return a value between 0 and 100.
     *         keep the server setting at the top, right after "server settings"
     */
    public function getPriority() {
        return 50;
    }
}
