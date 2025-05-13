<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class DeleteDomainStructure extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:domain-structure';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remove DDD folder structure for a given domain name';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $context = $this->ask('Enter the name of the domain to delete (e.g., User, Product)');

        $basePath = app_path();
        $paths = [
            "/Domains/{$context}",
            "/Application/{$context}",
            "/Infrastructure/Persistence/{$context}",
            "/Interfaces/Web/Controllers/{$context}",
        ];

        foreach ($paths as $path) {
            $fullPath = $basePath . $path;
            if (File::exists($fullPath)) {
                File::deleteDirectory($fullPath);
                $this->info("🗑️ Deleted: {$fullPath}");
            } else {
                $this->warn("❌ Not found: {$fullPath}");
            }
        }

        $this->info("✅ DDD structure removed for domain: {$context}");
    }

}
