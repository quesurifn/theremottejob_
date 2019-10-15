<?php

namespace App\Console\Commands;
use App\Utilities\Constants;
use Illuminate\Console\Command;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class UpdateRSSBackupFeed extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:rss-backup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update the RSS backup feeds';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $constants = new Constants();
        $client = new Client(); //GuzzleHttp\Client
        $jobTypes = $constants->job_types;
        $iterator = 0;

        do {
            $key = "rss-backup-" . $jobTypes[$iterator]["backup_rss"];
            $rss_feed = $client->get($jobTypes[$iterator]["backup_rss"]);
            $rss_feed = $rss_feed->getBody();
            $xml = simplexml_load_string($rss_feed);
            $json = json_encode($xml);
            Cache::put($key, $json, 120);
            $iterator++;
        } while($iterator <= count($jobTypes));
    }
}
