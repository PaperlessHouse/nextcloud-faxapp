<?php

/**
 * Nextcloud - FaxApp`
 */
namespace OCA\FaxApp\Settings;

use OCP\IL10N;
use OCP\Settings\ISection;


class Section implements ISection {

    /** @var IL10N */
    private $l;

    /**
     *
     * @param IL10N $l
     */
    public function __construct(IL10N $l) {
        $this->l = $l;
    }

    /**
     *
     * {@inheritdoc}
     *
     */
    public function getID() {
        return 'faxapp';
    }

    /**
     *
     * {@inheritdoc}
     *
     */
    public function getName() {
        return $this->l->t('Fax App');
    }

    /**
     *
     * {@inheritdoc}
     *
     */
    public function getPriority() {
        return 75;
    }

    /**
     *
     * {@inheritdoc}
     *
     */
    public function getIcon() {
        return '/apps/faxapp/img/icon/app.svg';
    }
}
