<?php

namespace App\Providers;

use App\Markdown\Hint\HintExtension;
use Illuminate\Support\ServiceProvider;
use League\CommonMark\Extension\DescriptionList\Node\DescriptionList;
use League\CommonMark\Extension\Attributes\AttributesExtension;
use Statamic\Facades\Markdown;
use Torchlight\Commonmark\V2\TorchlightExtension;

class AppServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Markdown::addExtensions(fn () => [new HintExtension, new AttributesExtension]);

        if (config('torchlight.token')) {
            Markdown::addExtensions(fn () => [new TorchlightExtension]);
        }
    }
}
