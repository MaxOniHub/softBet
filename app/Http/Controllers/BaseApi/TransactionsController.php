<?php

namespace App\Http\Controllers\BaseApi;

use App\Http\Requests\CreateTransactionRequest;
use App\Http\Controllers\Controller;
use App\Services\TransactionService;
use App\Transformer\TransactionTransformer;
use EllipseSynergie\ApiResponse\Laravel\Response;

/**
 * Class TransactionsController
 * @package App\Http\Controllers\BaseApi
 */
class TransactionsController extends Controller
{
    /**
     * @var Response
     */
    protected $Response;

    /**
     * @var TransactionService
     */
    protected $TransactionService;

    /**
     * @param TransactionService $transactionService
     * @param Response $response
     */
    public function __construct(TransactionService $transactionService, Response $response)
    {
        $this->TransactionService = $transactionService;
        $this->Response = $response;
    }

    /**
     * @param CreateTransactionRequest $request
     * @return mixed
     */
    public function store(CreateTransactionRequest $request)
    {
        $this->TransactionService->load($request);

        if ($isSaved = $this->TransactionService->create()) {
            return $this->Response->withItem($this->TransactionService->getEntity(), new TransactionTransformer());
        }

        return $this->Response->errorWrongArgs();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        if (!$this->TransactionService->findById($id)) return $this->Response->errorNotFound();

        return $this->Response->withItem($this->TransactionService->getEntity(), new TransactionTransformer());
    }

}
