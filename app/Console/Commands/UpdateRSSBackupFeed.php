<?php

namespace App\Console\Commands;
use App\Utilities\Constants;
use Illuminate\Console\Command;

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

            try {

                $key = "rss-backup-" . $jobTypes[$iterator]["backup_rss"];
                $rss_feed = $client->get($jobTypes[$iterator]["backup_rss"]);
                $rss_feed = $rss_feed->getBody();
                $xml = simplexml_load_string($rss_feed);
                $json = json_encode($xml);
                $json = json_decode($json, TRUE);

                foreach($json["channel"]['item'] as $key => $item) {
                    $json["channel"]['item'][$key]['description'] = stripslashes($json["channel"]['item'][$key]['description']);
                }

                Cache::put($key, $json, 120);
                $iterator++;

            } catch(\Exception $e) {

                \Log::info($e);

            }

        } while($iterator <= count($jobTypes));
    }
}
