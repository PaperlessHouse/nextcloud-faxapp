<?php

/**
 * Nextcloud - FaxApp
 */
namespace OCA\FaxApp\Controller;

use OCP\AppFramework\Controller;
use OCP\IRequest;
use OCP\IL10N;
use OCA\FaxApp\Config\AppConfig;
use OCP\AppFramework\Http\DataResponse;
use OCA\FaxApp\Service\AppConfigService;
use OCA\FaxApp\Service\NotFoundException;
use OCA\FaxApp\Constants\OcrConstants;


class AdminSettingsController extends Controller {

    /** @var IL10N */
    private $l10n;

    /** @var AppConfigService */
    private $appConfig;
    use Errors;

    /**
     * Constructor
     *
     * @param string $appName
     * @param IRequest $request
     * @param IL10N $l10n
     * @param AppConfigService $appConfig
     * @param string $userId
     */
    public function __construct($appName, IRequest $request, IL10N $l10n, AppConfigService $appConfig, $userId) {
        parent::__construct($appName, $request);
        $this->l10n = $l10n;
        $this->appConfig = $appConfig;
    }

    /**
     * Sets the languages that are supported by the docker worker instance.
     *
     * @param string $languages
     * @return DataResponse
     */
    public function applySettings($twilio_account_sid, $twilio_auth_token) {
        return $this->handleNotFound(
                function () use ($twilio_account_sid, $twilio_auth_token) {
                    $this->appConfig->setAppValue("twilio_account_sid", $twilio_account_sid);
                    $this->appConfig->setAppValue("twilio_auth_token", $twilio_auth_token);
                    return $this->l10n->t('Saved');
                });
    }
