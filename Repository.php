<?php namespace LogExpander;
use \stdClass as PhpObj;

class Repository extends PhpObj {
    protected $store;
    protected $cfg;

    /**
     * Constructs a new Repository.
     * @param $store
     * @param PhpObj $cfg
     */
    public function __construct($store, PhpObj $cfg) {
        $this->store = $store;
        $this->cfg = $cfg;
    }

    /**
     * Reads an object from the store with the given id.
     * @param String $type
     * @param [String => Mixed] $query
     * @return PhpObj
     */
    protected function readStore($type, array $query) {
        $model = $this->store->get_record($type, $query);
        return $model;
    }

    /**
     * Reads an object from the store with the given id.
     * @param String $id
     * @param String $type
     * @return PhpObj
     */
    public function readObject($id, $type) {
        $model = $this->readStore($type, ['id' => $id]);
        $model->type = $type;
        return $model;
    }

    /**
     * Reads an object from the store with the given id.
     * @param String $id
     * @param String $type
     * @return PhpObj
     */
    public function readModule($id, $type) {
        $model = $this->readObject($id, $type);
        $module = $this->readStore('modules', ['name' => $type]);
        $course_module = $this->readStore('course_modules', [
            'instance' => $id,
            'module' => $module->id,
            'course' => $model->course
        ]);
        $model->url = $this->cfg->wwwroot . '/mod/'.$type.'/view.php?id=' . $course_module->id;
        return $model;
    }

    /**
     * Reads a quiz attempt from the store with the given id.
     * @param String $id
     * @return PhpObj
     */
    public function readAttempt($id) {
        $model = $this->readObject($id, 'quiz_attempts');
        $model->url = $this->cfg->wwwroot . '/mod/quiz/attempt.php?attempt='.$id;
        $model->name = 'Attempt '.$id;
        return $model;
    }

    /**
     * Reads a course from the store with the given id.
     * @param String $id
     * @return PhpObj
     */
    public function readCourse($id) {
        $model = $this->readObject($id, 'course');
        $model->url = $this->cfg->wwwroot.($id > 0 ? '/course/view.php?id=' . $id : '');
        return $model;
    }

    /**
     * Reads a user from the store with the given id.
     * @param String $id
     * @return PhpObj
     */
    public function readUser($id) {
        $model = $this->readObject($id, 'user');
        $model->url = $this->cfg->wwwroot;
        return $model;
    }

    /**
     * Reads a discussion from the store with the given id.
     * @param String $id
     * @return PhpObj
     */
    public function readDiscussion($id) {
        $model = $this->readObject($id, 'forum_discussions');
        $model->url = $this->cfg->wwwroot . '/mod/forum/discuss.php?d=' . $id;
        return $model;
    }

    /**
     * Reads the Moodle release number.
     * @return String
     */
    public function readRelease() {
        return $this->cfg->release;
    }

    public function readQuestionAtempt($attemptid,$uniqueid,$slot) {
    $model = $this->readStore('question_attempts',['questionusageid'=>$uniqueid,'slot'=>$slot]);
        $model->url = $this->cfg->wwwroot . '/mod/quiz/attempt.php?attempt='.$attemptid.($slot==1?'':'&page='.($slot-1));
       $model->name = 'QuestionAttempt '.$model->id;
    return $model;
}
    public function readQuestion($id,$url) {
        $model = $this->readObject($id,'question');
          $model->url = $url;
           $model->name = 'Question '.$id;
        return $model;
    }
}
