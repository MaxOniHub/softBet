<?php

namespace App\Http\Controllers\BaseApi;

use App\Http\Controllers\Controller;
use App\Services\ReportDataFetcherService;;
use App\Transformer\TransactionsSummaryTransformer;
use EllipseSynergie\ApiResponse\Laravel\Response;

/**
 * Class ReportsController
 * @package App\Http\Controllers\BaseApi
 */
class ReportsController extends Controller
{
    /**
     * @var Response
     */
    protected $Response;


    /** @var  ReportDataFetcherService **/
    protected $dataFetcherService;

    /**
     * @param ReportDataFetcherService $reportDataFetcherService
     * @param Response $response
     */
    public function __construct(ReportDataFetcherService $reportDataFetcherService, Response $response)
    {
        $this->dataFetcherService = $reportDataFetcherService;
        $this->Response = $response;
    }

    public function getTransactionsSummary()
    {
        return $this->Response->withCollection($this->dataFetcherService->fetch(), new TransactionsSummaryTransformer());
    }

}
