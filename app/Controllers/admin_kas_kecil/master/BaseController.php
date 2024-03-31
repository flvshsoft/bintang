<?php

namespace App\Controllers\admin_kas_kecil\master;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use Config\Services;
use CodeIgniter\HTTP\Response;

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

        // Preload any models, libraries, etc, here.
        $this->db = db_connect();
        $this->mdUser = model('userModel', true, $this->db);
        $this->mdArea = model('areaModel', true, $this->db);
        $this->mdAsset = model('assetModel', true, $this->db);
        $this->mdPartner = model('partnerModel', true, $this->db);
        $this->mdSales = model('salesModel', true, $this->db);
        $this->mdProduct = model('productModel', true, $this->db);
        $this->mdSupplier = model('supplierModel', true, $this->db);
        $this->mdStock = model('stockModel', true, $this->db);
        $this->mdCustomer = model('customerModel', true, $this->db);
        $this->mdBank = model('bankModel', true, $this->db);
        $this->mdLokasi = model('lokasiModel', true, $this->db);
        $this->mdCuti = model('cutiModel', true, $this->db);
        $this->mdIzin = model('izinModel', true, $this->db);
        $this->mdJenisHarga = model('jenishargaModel', true, $this->db);
        $this->mdPrice = model('priceModel', true, $this->db);
        $this->mdPriceDetail = model('pricedetailModel', true, $this->db);
        $this->mdBarangHarga = model('barangHargaModel', true, $this->db);
        $this->mdBranch = model('branchModel', true, $this->db);
        // $this->session = \Config\Services::session();
    }
}
