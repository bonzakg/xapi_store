<?php
/**
 * Created by PhpStorm.
 * User: Milos
 * Date: 31.5.2016
 * Time: 23:56
 */
namespace MXTranslator\Events;

class UserMoved extends Event {
    /**
     * Reads data for an event.
     * @param [String => Mixed] $opts
     * @return [String => Mixed]
     * @override Event
     */
    public function read(array $opts) {
        return array_merge(parent::read($opts), [
            'recipe' => 'user_moved',
            'course_url' => $opts['course']->url,
            'course_name' => $opts['course']->fullname ?: 'A Moodle course',
            'course_description' => $opts['course']->summary ?: 'A Moodle course',
            'course_type' => static::$xapi_type.$opts['course']->type,
            'course_ext' => $opts['course'],
            'course_ext_key' => 'http://lrs.learninglocker.net/define/extensions/moodle_course',
        ]);
    }
}