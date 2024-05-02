<?php

namespace App\Controllers\admin_kas_kecil\laporan;

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
        $this->mdSalesDetail = model('salesDetailModel', true, $this->db);
        $this->mdProduct = model('productModel', true, $this->db);
        $this->mdSupplier = model('supplierModel', true, $this->db);
        $this->mdCustomer = model('customerModel', true, $this->db);
        $this->mdNota = model('notaModel', true, $this->db);
        $this->mdNotaDetail = model('notadetailModel', true, $this->db);
        $this->mdKaryawan = model('karyawanModel', true, $this->db);
        $this->mdBranch = model('branchModel', true, $this->db);
        $this->mdBank = model('bankModel', true, $this->db);
        $this->mdClosingSales = model('closingSalesModel', true, $this->db);
        $this->mdClosingSalesBarang = model('closingSalesBarangModel', true, $this->db);
        $this->mdPiutangUsaha = model('piutangUsahaModel', true, $this->db);
        $this->mdNotaPutihSave = model('notaPutihSaveModel', true, $this->db);
        $this->mdPengeluaranSales = model('pengeluaranSalesModel', true, $this->db);
        $this->mdPurchaseOrder = model('purchaseOrderModel', true, $this->db);
        $this->mdWeek = model('weekModel', true, $this->db);
    }
}