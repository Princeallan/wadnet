<?php

namespace TypiCMS\Modules\Contacts\Models;

use Laracasts\Presenter\PresentableTrait;
use Spatie\Translatable\HasTranslations;
use TypiCMS\Modules\Core\Models\Base;
use TypiCMS\Modules\Files\Models\File;
use TypiCMS\Modules\History\Traits\Historable;
use TypiCMS\Modules\Contacts\Presenters\ModulePresenter;

class Contact extends Base
{
    use HasTranslations;
    use Historable;
    use PresentableTrait;

    protected $presenter = ModulePresenter::class;

    protected $guarded = ['id', 'exit'];

    public $translatable = [
        'title',
        'slug',
        'status',
        'summary',
        'body',
    ];

    protected $appends = ['image', 'thumb', 'title_translated', 'status_translated'];

    /**
     * Append title_translated attribute.
     *
     * @return string
     */
    public function getTitleTranslatedAttribute()
    {
        $locale = config('app.locale');

        return $this->translate('title', config('typicms.content_locale', $locale));
    }

    /**
     * Append status_translated attribute.
     *
     * @return string
     */
    public function getStatusTranslatedAttribute()
    {
        $locale = config('app.locale');

        return $this->translate('status', config('typicms.content_locale', $locale));
    }

    /**
     * Append image attribute.
     *
     * @return string
     */
    public function getImageAttribute()
    {
        return $this->files->first();
    }

    /**
     * Append thumb attribute.
     *
     * @return string
     */
    public function getThumbAttribute()
    {
        return $this->present()->thumbSrc(null, 22);
    }

    /**
     * Has many files.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function files()
    {
        return $this->morphToMany(File::class, 'model', 'model_has_files', 'model_id', 'file_id')
            ->orderBy('model_has_files.position');
    }
}
