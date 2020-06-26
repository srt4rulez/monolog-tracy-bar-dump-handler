<?php

namespace srt4rulez;

use Monolog\Handler\AbstractProcessingHandler;
use Monolog\Logger;
use Tracy\Debugger;

class TracyBarDumpHandler extends AbstractProcessingHandler
{
    /**
     * @var array
     */
    private $options;

    /**
     * TracyBarDumpHandler constructor.
     *
     * @param int   $level
     * @param bool  $bubble
     * @param array $options Options for barDump method.
     */
    public function __construct($level = Logger::DEBUG, bool $bubble = true, array $options = [])
    {
        parent::__construct($level, $bubble);

        $this->options = $options;
    }

    /**
     * @inheritDoc
     */
    protected function write(array $record): void
    {
        $title   = $record['message'];
        $context = $record['context'] ?: [];

        Debugger::barDump($context, $title, $this->options);
    }
}
