<?php

namespace srt4rulez;

use Monolog\Handler\AbstractProcessingHandler;
use Tracy\Debugger;

class TracyBarDumpHandler extends AbstractProcessingHandler
{
    /**
     * @inheritDoc
     */
    protected function write(array $record): void
    {
        $title   = $record['message'];
        $context = $record['context'] ?: [];

        Debugger::barDump($context, $title);
    }
}
