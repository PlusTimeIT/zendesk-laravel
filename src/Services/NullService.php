<?php
namespace PlusTimeIT\Zendesk\Services;

use Illuminate\Support\Facades\Log;

class NullService
{
    /**
     * @var bool
     */
    private $logCalls;

    public function __construct(bool $logCalls = FALSE)
    {
        $this->logCalls = $logCalls;
    }

    public function __call($name, $arguments)
    {
        if ($this->logCalls) {
            Log::debug('Called PlusTimeIT Zendesk facade method: ' . $name . ' with:', $arguments);

            return new self();
        }

        return $this;
    }
}
