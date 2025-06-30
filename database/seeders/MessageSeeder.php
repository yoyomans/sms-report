<?php

namespace Database\Seeders;

use app;
use Illuminate\Database\Seeder;
use App\Services\MessageIngestService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Because I ran out of time to optimise the ingestion of 10k messages need to override laravels time_limit
        set_time_limit(0);
        // Run the service that ingests the JSON to seed our db
        app(MessageIngestService::class)->ingestFromJson('app/data/messages.json');
    }
}
