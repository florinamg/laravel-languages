<?php

declare(strict_types=1);

/*
 * This file is part of Laravel Languages.
 *
 * (c) Brian Faust <hello@brianfaust.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BrianFaust\Languages\Console\Commands;

use Illuminate\Console\Command;
use BrianFaust\Languages\Language;

class SeedLanguages extends Command
{
    /**
     * @var string
     */
    protected $signature = 'languages:seed';

    /**
     * @var string
     */
    protected $description = 'Command description.';

    public function fire()
    {
        $data = base_path('vendor/faustbrian/laravel-languages/resources/languages.json');
        $data = json_decode(file_get_contents($data), true);

        foreach ($data as $language) {
            Language::create([
                'code' => $language['code'],
                'name' => $language['name'],
                'native_name' => $language['nativeName'],
            ]);
        }

        $this->getOutput()->writeln('<info>Seeded:</info> Languages');
    }
}
