<?php

namespace App\Console\Commands;

use App\Abstractions\AbstractFileStorage;
use App\Services\JSONFileStorageService;
use App\Services\ReportDataFetcherService;
use App\Services\TransactionsReportsFileExporter;
use Illuminate\Console\Command;
use Illuminate\Container\Container;

/**
 * Class TransactionsSummary
 * @package App\Console\Commands
 */
class TransactionsSummary extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'transactions:summary';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * @var ReportDataFetcherService
     */
    private $FileExporter;


    /**
     * Create a new command instance.
     *
     */
    public function __construct()
    {
        parent::__construct();

        $container = Container::getInstance();
        $container->bind(AbstractFileStorage::class, JSONFileStorageService::class);

        $this->FileExporter = $container->make(TransactionsReportsFileExporter::class);

    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        if ($this->FileExporter->export()) {
            $this->line('Success! Visit /storage/app/' . $this->FileExporter::DIR . ' folder');
        } else {
            $this->line('Fail!');
        }

    }
}
