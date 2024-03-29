<?php

namespace TypiCMS\Modules\Contacts\Repositories;

use TypiCMS\Modules\Core\Repositories\EloquentRepository;
use TypiCMS\Modules\Contacts\Models\Contact;

class EloquentContact extends EloquentRepository
{
    protected $repositoryId = 'contacts';

    protected $model = Contact::class;
}
