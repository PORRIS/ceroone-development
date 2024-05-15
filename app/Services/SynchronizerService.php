<?php

namespace App\Services;

use App\Repositories\SyncAccountingAccountInterface;
use App\Repositories\SyncContactsInterface;
use App\Repositories\SyncInvoicesInterface;

class SynchronizerService
{

    private SyncInvoicesInterface $repositoryInvoices;
    private SyncContactsInterface $repositoryContacts;
    private SyncAccountingAccountInterface $repositoryAccounts;

    public function __construct(
        SyncContactsInterface $repositoryContacts,
        SyncInvoicesInterface $repositoryInvoices,
        SyncAccountingAccountInterface $repositoryAccounts
    )
    {
        $this->repositoryContacts = $repositoryContacts;
        $this->repositoryInvoices = $repositoryInvoices;
        $this->repositoryAccounts = $repositoryAccounts;

    }

    /**
     * @return array
     */
    public function syncContacts():array
    {
       return $this->repositoryContacts->getSyncContacts();
    }
    public function syncInvoices():array
    {
        return $this->repositoryInvoices->getSyncInvoices();
    }

    public function syncaccounts():array
    {
        return $this->repositoryAccounts->getSyncAccounts();
    }


}
