<?php
namespace OCA\FaxApp\Controller;

use OCP\AppFramework\Controller;
use OCP\AppFramework\Http\TemplateResponse;
use OCP\AppFramework\Http\DataResponse;
use OCP\IConfig;
use OCP\ILogger;
use OCP\IRequest;
use OCP\IURLGenerator;


class FaxController extends Controller {

    private $logger;
    private $userId;
    private $db;
    private $UserId;
    /** @var FaxService */
    private $faxService;
    /** @var pdfm */
    private $pdfm;
    private $urlGenerator;
    private $config;

    /**
     * @param ILogger $logger
     * @param string $AppName
     * @param IRequest $request
     * @param FaxService $faxService
     * @param string $UserId
     */
    public function __construct(ILogger $logger, $AppName, IRequest $request, $faxService, $UserId, IConfig $config){
		parent::__construct($AppName, $request);
        $this->logger = $logger;
        $this->appName = $AppName;
        $this->faxService = $faxService;
        $this->userId = $UserId;
        $this->config = $config;

        $this->logger->debug("FaxController:main", array('app' => $this->appName));

	}
    // public function __construct($AppName, IRequest $request, FaxService $faxService, $UserId){
	// 	parent::__construct($AppName, $request);
    //     $this->userId = $UserId;
    //     $this->faxService = $faxService;
    //     $this->appName = $AppName;
    //     $this->db = $db;
	// }

	/**
	* CAUTION: the @Stuff turns off security checks; for this page no admin is
	*          required and no CSRF check. If you don't know what CSRF is, read
	*          it up in the docs or you might create a security hole. This is
	*          basically the only required method to add this exemption, don't
	*          add it to any other method if you don't exactly know what it does
	*
	* @NoAdminRequired
	* @NoCSRFRequired
	*/
    public function index() {
        $templateName = 'index';  // will use templates/main.php
        $parameters = array('faxes' => $this->faxService->getAll($this->userId));
        // $this->logger->debug("FaxController", array('app' => $this->appName));
        // $this->logger->debug(implode($this->faxService->getAll($this->userId), ","), array('app' => $this->appName));
        return new TemplateResponse($this->appName, $templateName, $parameters);
	}
    /**
	*
	* @NoAdminRequired
    * @NoCSRFRequired
	*/
    public function show($id) {
        $templateName = 'show';  // will use templates/main.php
        $parameters = array('fax' => $this->faxService->get($this->userId, $id),'faxes' => $this->faxService->getAll($this->userId));
        return new TemplateResponse($this->appName, $templateName, $parameters);
	}
    /**
	*
	* @NoAdminRequired
    * @NoCSRFRequired
	*/
    public function update($id, $subject, $to_name, $to_fax, $fax_message) {
        $this->logger->debug("FaxController:Update", array('app' => $this->appName));
        $fax = $this->faxService->get($this->userId, $id);
        $fax->setSubject($subject);
        $fax->setToName($to_name);
        $fax->setToFax($to_fax);
        $fax->setFaxMessage($fax_message);
        $updateResult = $this->faxService->updateFax($fax);
        // $this->logger->debug(implode($this->faxService->getAll($this->userId), ","), array('app' => $this->appName));
        $templateName = 'show';
        $parameters = array('fax' => $this->faxService->get($this->userId, $id),'faxes' => $this->faxService->getAll($this->userId));
        return new TemplateResponse($this->appName, $templateName, $parameters);
	}

    /**
	*
	* @NoAdminRequired
    * @NoCSRFRequired
	*/
    public function send($id) {

        $this->logger->debug("FaxController:Send", array('app' => $this->appName));
        // include '../../Vendor/PDFMergerxxxx/PDFMerger.php';

        // $temp_dir = $this->config->getSystemValue('tempdirectory');

        // $pdf = new PDFMerger;
        $pdf->addPDF('../../data/Curtis/pdf1.pdf', 'all');
        $pdf->addPDF('../../data/Curtis/pdf2.pdf', 'all');

        $pdf->merge('file', $temp_dir+'/combined.pdf'); // generate the file

        // $pdf->merge('download', 'samplepdfs/test.pdf');

        $templateName = 'show';
        return new TemplateResponse($this->appName, $templateName);
	}


}
