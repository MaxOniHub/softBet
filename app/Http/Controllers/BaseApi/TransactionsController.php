<?php

namespace App\Http\Controllers\BaseApi;

use App\Http\Requests\CreateTransactionRequest;
use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Services\TransactionDataFetcherService;
use App\Services\TransactionService;
use App\Transformer\CustomerTransformer;
use App\Transformer\TransactionTransformer;
use EllipseSynergie\ApiResponse\Laravel\Response;
use Illuminate\Container\Container;

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
     * @param Request $request
     * @return string
     */
    public function index(Request $request)
    {
        /** @var TransactionSearchFilter $TransactionSearchFilter */
        $TransactionSearchFilter = Container::getInstance()->make(TransactionSearchFilter::class);

        if ($res = $TransactionSearchFilter->search($request))

        return $this->Response->withCollection($res, new TransactionTransformer());

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
     * @param CreateTransactionRequest $request
     * @return mixed
     */
    public function update($id, CreateTransactionRequest $request)
    {
        if (!$this->TransactionService->findById($id)) return $this->Response->errorNotFound();

        $this->TransactionService->load($request);

        if ($isSaved = $this->TransactionService->update()) {
            return $this->Response->withItem($this->TransactionService->getEntity(), new TransactionTransformer());
        }
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


    public function showUser($id)
    {
        /** @var Transaction $entity */
        if (!$entity = $this->TransactionService->findById($id)) return $this->Response->errorNotFound();

        /** @var TransactionDataFetcherService $TransactionDataFetcherService */
        $TransactionDataFetcherService = Container::getInstance()->make(TransactionDataFetcherService::class);
        $TransactionDataFetcherService->setRepository($entity);

        return $this->Response->withCollection($TransactionDataFetcherService->getCustomer(), new CustomerTransformer());
    }


    /**
     * @param $id
     * @return \Illuminate\Contracts\Routing\ResponseFactory|mixed
     */
    public function delete($id)
    {
        /** @var Transaction $entity */
        if (!$entity = $this->TransactionService->findById($id)) return $this->Response->errorNotFound();

        if ($this->TransactionService->delete())
            return $this->Response->withArray(['message' => 'success']);

        return $this->Response->errorInternalError();
    }
}
