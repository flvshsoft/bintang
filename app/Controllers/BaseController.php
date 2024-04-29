<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use Config\Services;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = [];

    /**
     * Be sure to declare properties for any property fetch you initialized.
     * The creation of dynamic property is deprecated in PHP 8.2.
     */
    // protected $session;

    /**
     * @return void
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);
        $this->req = Services::request();
        $this->session = Services::session();
        $this->calendar = Services::calendar();

        // Check session here
        if (!$this->session->has('userData')) {
            // Set the redirection header
            $response->setHeader('Location', base_url('/'), true);
            // Set the status code for redirection
            $response->setStatusCode(302);
            // Send the response
            $response->send();
            exit;
        }
        //$this->session = \Config\Service::session();
        $this->db = db_connect();
        $this->mdUser = model('userModel', true, $this->db);
        $this->mdBranch = model('branchModel', true, $this->db);

        $this->session = \Config\Services::session();
    }
}
