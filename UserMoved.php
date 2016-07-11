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
        'en' => 'moved in'
    ];

    /**
     * Reads data for an event.
     * @param [String => Mixed] $opts
     * @return [String => Mixed]
     * @override Event
     */
    public function read(array $opts) {
        return array_replace(parent::read($opts), [
            'verb' => [
                'id' => 'http://localhost/moved.html',
                'display' => $this->readVerbDisplay($opts),
            ],
            'object' => $this->readQuestion($opts),
            'context' => [
                'platform' => $opts['context_platform'],
                'extensions' => [
                    $opts['context_ext_key'] => [
                        'coords' =>$opts['context_ext']['other']
                    ],
                ],
                'contextActivities' => [
                    'grouping' => [
                        $this->readCourse($opts),
                        $this->readModule($opts)
                    ]

                ]
            ],

        ]);
    }
   /* protected function readUser(array $opts, $key) {   //ako zelimo da identifikaciju aktora vrsimo preko email adrese
        return [
            'name' => $opts[$key.'_name'],
            'mbox' => $_SESSION['USER']->email,
        ];
    }

*/
    protected function readQuestion($opts){
        return $this->readActivity($opts, 'question');
    }
}