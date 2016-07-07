<?php
/**
 * Created by PhpStorm.
 * User: Milos
 * Date: 1.6.2016
 * Time: 0:02
 */
namespace XREmitter\Events;

class UserMoved extends Event {
    protected static $verb_display = [
        'en' => 'moved to'
    ];

    /**
     * Reads data for an event.
     * @param [String => Mixed] $opts
     * @return [String => Mixed]
     * @override Event
     */
    public function read(array $opts) {
        //$opts[app_name]="pera";
        return array_merge(parent::read($opts), [
            'verb' => [
                'id' => 'https://brindlewaye.com/xAPITerms/verbs/walked',
                'display' => $this->readVerbDisplay($opts),
            ],
            'object' => $this->readApp($opts),
        ]);
    }
}