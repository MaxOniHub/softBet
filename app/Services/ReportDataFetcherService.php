<?php

namespace App\Services;

use App\Abstractions\AbstractDataFetcher;
use App\Models\TransactionReportView;

/**
 * Class ReportDataFetcherService
 * @package App\Services
 */
class ReportDataFetcherService extends AbstractDataFetcher
{
    /**
     * TransactionDataFetcherService constructor.
     * @param TransactionReportView $repository
     */
    public function __construct(TransactionReportView $repository)
    {
        parent::__construct($repository);
    }

}