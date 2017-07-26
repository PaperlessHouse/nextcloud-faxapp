<?php

namespace OCA\FaxApp\AppInfo;

use OCP\AppFramework\App;

use OCA\FaxApp\Controller\AdminSettings;
use OCA\FaxApp\Controller\FaxController;
use OCA\FaxApp\Service\FaxService;
use OCA\FaxApp\Db\FaxMapper;
use OCA\FaxApp\Vendor\PDFMerger\PDFMerger;


/**
 * Class Application
 *
 * @package OCA\FaxApp\AppInfo
 */
class Application extends App {


    /**
     * Application constructor.
     *
     * @param array $urlParams
     */
    public function __construct(array $urlParams=array()){
        parent::__construct('faxapp', $urlParams);

        $container = $this->getContainer();

        /**
         * Add the js and style if OCA\Files app is loaded
         */
        // $eventDispatcher = \OC::$server->getEventDispatcher();
        // $eventDispatcher->addListener('OCA\Files::loadAdditionalScripts',
        //         function () {
        //             script('ocr', 'dist/ocrapp');
        //             style('ocr', 'ocrstyle');
        //             // if not loaded before - load select2 for multi select languages
        //             vendor_script('select2/select2');
        //             vendor_style('select2/select2');
        //         });
        /**
         * Register core services
         */
         $container->registerService('UserSession', function($c) {
             return $c->query('ServerContainer')->getUserSession();
         });
         $container->registerService('Config', function($c) {
             return $c->query('ServerContainer')->getConfig();
         });
        /**
         * Controllers
         */
        $container->registerService('AdminSettings', function ($c) {
            return new AdminSettings(
                $c->query('AppName'),
                $c->query('Request')
            );
        });

        $container->registerService('FaxController', function($c){
            return new FaxController(
                $c->query('Logger'),
                $c->query('AppName'),
                $c->query('Request'),
                $c->query('FaxService'),
                $c->query('PDFMerger'),
                $c->query('UserSession')->getUser()->getUID(),
                $c->query('Config')
            );
        });

        /**
         * Services
         */

        $container->registerService('FaxService', function($c){
            return new FaxService(
                $c->query('Logger'),
                $c->query('AppName'),
                $c->query('FaxMapper')
            );
        });

        /**
         * Mappers
         */

        $container->registerService('FaxMapper', function($c){
            return new FaxMapper(
                $c->query('ServerContainer')->getDatabaseConnection()
            );
        });

        $container->registerService('Logger', function($c) {
            return $c->query('ServerContainer')->getLogger();
        });

        /**
         * Vendor Classes
         */

        $container->registerService('PDFMerger', function($c){
            return new PDFMerger(
            );
        });










    }
}
