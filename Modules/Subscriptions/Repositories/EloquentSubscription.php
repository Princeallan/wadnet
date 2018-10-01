<?php

namespace TypiCMS\Modules\Subscriptions\Repositories;

use TypiCMS\Modules\Core\Repositories\EloquentRepository;
use TypiCMS\Modules\Subscriptions\Models\Subscription;

class EloquentSubscription extends EloquentRepository
{
    protected $repositoryId = 'subscriptions';

    protected $model = Subscription::class;
}
