<?php

namespace Nichozuo\LaravelCommonDev\Commands;

use Illuminate\Console\Command;
use Nichozuo\LaravelCommonDev\Helpers\TableHelper;
use Psr\SimpleCache\InvalidArgumentException;

class ClearDBCacheCommand extends Command
{
    protected $signature = 'db:cache';
    protected $description = 'clean the db cache files';

    /**
     * @throws InvalidArgumentException
     */
    public function handle()
    {
        TableHelper::ReCache();
    }

}