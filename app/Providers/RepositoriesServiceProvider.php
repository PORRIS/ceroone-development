<?php

namespace App\Providers;

use App\Repositories\SyncAccountingAccountInterface;
use App\Repositories\SyncAccountingAccountRepository;
use App\Repositories\SyncContactsInterface;
use App\Repositories\SyncContactsRepository;
use App\Repositories\SyncInvoicesInterface;
use App\Repositories\SyncInvoicesRepository;
use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider
{
    public array $bindings = [
        SyncAccountingAccountInterface::class => SyncAccountingAccountRepository::class,
        SyncInvoicesInterface::class => SyncInvoicesRepository::class,
        SyncContactsInterface::class => SyncContactsRepository::class,
    ];
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
