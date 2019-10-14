<?php

namespace App\Observers;

use App\Models\Job;
use Elasticsearch\ClientBuilder;

class JobObserver
{

    private $client = ClientBuilder::create()->build();
    /**
     * Handle the job "created" event.
     *
     * @param  \App\Job  $job
     * @return void
     */
    public function created(Job $job)
    {
        \Log::info($job);
        $params = [
            'index' => 'job',
            'id' => $job->id,
            'body' => $job
        ];
        
        $response = $this->client->index($params);
    }

    /**
     * Handle the job "updated" event.
     *
     * @param  \App\Job  $job
     * @return void
     */
    public function updated(Job $job)
    {
        $params = [
            'index' => 'job',
            'id' => $job->id,
            'body' => $job
        ];
        
        $response = $this->client->index($params);
    }

    /**
     * Handle the job "deleted" event.
     *
     * @param  \App\Job  $job
     * @return void
     */
    public function deleted(Job $job)
    {
        //
    }

    /**
     * Handle the job "restored" event.
     *
     * @param  \App\Job  $job
     * @return void
     */
    public function restored(Job $job)
    {
        //
    }

    /**
     * Handle the job "force deleted" event.
     *
     * @param  \App\Job  $job
     * @return void
     */
    public function forceDeleted(Job $job)
    {
        //
    }
}
