<?php

namespace App\Services;

use App\Abstractions\AbstractFileStorage;

/**
 * Class TransactionsReportsWriter
 * @package App\Services
 */
class TransactionsReportsFileExporter
{
    const DIR = "reports";

    /**
     * @var ReportDataFetcherService
     */
    private $dataFetcherService;

    /**
     * @var JSONFileStorageService
     */
    private $fileStorageService;


    /**
     * TransactionsReportsWriter constructor.
     * @param ReportDataFetcherService $reportDataFetcherService
     * @param AbstractFileStorage $storageService
     */
    public function __construct(ReportDataFetcherService $reportDataFetcherService, AbstractFileStorage $storageService)
    {
        $this->dataFetcherService = $reportDataFetcherService;
        $this->fileStorageService = $storageService;
    }

    public function export()
    {
        if ($res = $this->dataFetcherService->fetch()) {
            $this->fileStorageService->setTargetFolder(self::DIR);
            $this->fileStorageService->setPrefixFileName("transactions-summary-report-");

            return $this->fileStorageService->toFile($res->toJson());
        }
        return false;
    }
}