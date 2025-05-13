<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;


class MakeDomainStructure extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    // protected $signature = 'app:make-domain-structure';
    protected $signature = 'make:domain-structure';


    /**
     * The console command description.
     *
     * @var string
     */
    // protected $description = 'Command description';
    protected $description = 'Scaffold DDD folders for a given domain name';


    /**
     * Execute the console command.
     */
    public function handle()
    {
        $context = $this->ask('Enter the name of the domain (e.g., User, Product)');

        $basePath = app_path();
        $paths = [
            "/Domains/{$context}/Entities",
            "/Domains/{$context}/ValueObjects",
            "/Domains/{$context}/Services",
            "/Application/{$context}/UseCases",
            "/Application/{$context}/DTOs",
            "/Infrastructure/Persistence/{$context}/Repositories",
            "/Interfaces/Web/Controllers/{$context}",
        ];

        foreach ($paths as $path) {
            $fullPath = $basePath . $path;
            if (!File::exists($fullPath)) {
                File::makeDirectory($fullPath, 0755, true);
                $this->info("Created: {$fullPath}");
            } else {
                $this->warn("Already exists: {$fullPath}");
            }
        }

        $this->info("✅ DDD structure scaffolded for domain: {$context}");
    }

}
