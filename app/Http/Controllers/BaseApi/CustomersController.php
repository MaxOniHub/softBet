<?php

namespace App\Http\Controllers\BaseApi;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCustomerRequest;
use App\Services\CustomerDataFetcherService;
use App\Services\CustomerService;
use App\Transformer\CustomerTransformer;
use App\Transformer\TransactionTransformer;
use App\User;
use EllipseSynergie\ApiResponse\Laravel\Response;
use Illuminate\Container\Container;
use JWTAuth;

/**
 * Class CustomersController
 * @package App\Http\Controllers\BaseApi
 */
class CustomersController extends Controller
{
    /**
     * @var CustomerService
     */
    protected $CustomerService;

    /**
     * @var Response $Response
     */
    protected $Response;

    /**
     * CustomersController constructor.
     * @param CustomerService $customerService
     * @param Response $response
     */
    public function __construct(CustomerService $customerService, Response $response)
    {
        $this->CustomerService = $customerService;
        $this->Response = $response;
    }

    /**
     * @param CreateCustomerRequest $request
     * @return mixed
     */
    public function store(CreateCustomerRequest $request)
    {
        $this->CustomerService->load($request);

        if ($this->CustomerService->create()) {
            return $this->Response->withItem($this->CustomerService->getEntity(), new CustomerTransformer());
        }

        return $this->Response->errorWrongArgs();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function show($id)
    {

        if (!$this->CustomerService->findById($id)) return $this->Response->errorNotFound();

        return $this->Response->withItem($this->CustomerService->getEntity(), new CustomerTransformer());
    }

    public function transactions($id)
    {
        /** @var User $entity */
        if (!$entity = $this->CustomerService->findById($id)) return $this->Response->errorNotFound();

        /** @var CustomerDataFetcherService $CustomerDataFetcher */
        $CustomerDataFetcher = Container::getInstance()->make(CustomerDataFetcherService::class);
        $CustomerDataFetcher->setRepository($entity);

        return $this->Response->withCollection($CustomerDataFetcher->getUsersTransactions(), new TransactionTransformer());
    }

    public function transaction($id, $transaction_id)
    {
        /** @var User $entity */
        if (!$entity = $this->CustomerService->findById($id)) return $this->Response->errorNotFound();

        /** @var CustomerDataFetcherService $CustomerDataFetcher */
        $CustomerDataFetcher = Container::getInstance()->make(CustomerDataFetcherService::class);
        $CustomerDataFetcher->setRepository($entity);

        if ($t = $CustomerDataFetcher->getUsersTransaction($transaction_id))
            return $this->Response->withItem($CustomerDataFetcher->getUsersTransaction($transaction_id), new TransactionTransformer());

        return $this->Response->errorNotFound();
    }

}
