<?php

namespace App\Services;

use App\Abstractions\AbstractEntityService;
use App\Http\Requests\CreateCustomerRequest;
use App\User;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class TransactionService
 * @package App\Services
 */
class CustomerService extends AbstractEntityService
{
    /**
     * @var User $entity
     */
    protected $entity;

    /**
     * @var SecurityService
     */
    private $SecurityService;

    /**
     * TransactionService constructor.
     * @param User $user
     * @param SecurityService $securityService
     */
    public function __construct(User $user, SecurityService $securityService)
    {
        parent::__construct($user);
        $this->SecurityService = $securityService;
    }

    /**
     * @param CreateCustomerRequest $request
     */
    public function load($request)
    {
        $this->entity->fill($this->collectRequestData($request));
        $this->encryptSensitiveData();
    }

    public function create()
    {
         $this->entity->setPasswordAttribute($this->generatePass());

         return $this->store();
    }

    public function update()
    {
        return $this->store();
    }

    protected function store()
    {
        return $this->entity->save();
    }

    /**
     * @param FormRequest $request
     * @return array
     */
    private function collectRequestData(FormRequest $request)
    {
        $cnp = $request->get("cnp");
        $personal_info = array_merge($cnp["billing_info"], $cnp["card_payment_info"]);
        $personal_info["email"] = $request->get("email");
        $personal_info["name"] = $request->get("name");

        return $personal_info;
    }

    private function encryptSensitiveData()
    {
        $encrypted_card_number = $this->SecurityService->encrypt($this->entity->getCardNumberAttribute());
        $encrypted_exp_date = $this->SecurityService->encrypt($this->entity->getExpirationDateAttribute());
        $encrypted_security_code = $this->SecurityService->encrypt($this->entity->getSecurityCodeAttribute());

        $this->entity->setCardNumberHashAttribute($encrypted_card_number);
        $this->entity->setExpirationDateHashAttribute($encrypted_exp_date);
        $this->entity->setSecurityCodeAttributeHash($encrypted_security_code);
    }

    private function generatePass()
    {
        return $this->SecurityService->useArgon2WorkFactor()->makeHash(str_random(16));
    }
}