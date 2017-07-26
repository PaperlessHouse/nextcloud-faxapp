<?php

namespace OCA\FaxApp\Service;
use OCP\ILogger;
use OCA\FaxApp\Db\FaxMapper;

/**
 * Class FaxService
 *
 * @package OCA\FaxApp\Service
 */
class FaxService {
    private $logger;
    private $faxMapper;

    /**
     * @param ILogger $logger
     * @param string $AppName
     * @param FaxMapper $faxMapper
     */
	public function __construct(ILogger $logger, $AppName, FaxMapper $faxMapper) {
        $this->logger = $logger;
        $this->appName = $AppName;
		$this->faxMapper = $faxMapper;
	}
	public function getAll($userId) {
		$faxes = $this->faxMapper->getAll($userId);
        // $this->logger->debug("FaxService", array('app' => $this->appName));
        // $this->logger->debug(implode($faxes, ","), array('app' => $this->appName));
		return $faxes;
	}
    public function get($userId, $id) {
		$fax = $this->faxMapper->get($userId, $id);
		return $fax;
	}
    public function updateFax($fax) {
		return $this->faxMapper->update($fax);
	}
}
