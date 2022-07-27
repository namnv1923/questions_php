<?php

namespace App;
use App\Question;

class QuestionCollection
{
    /** @var array|Question[]  */
    protected array $items = [];

    public function __construct($items = [])
    {
        $this->items = $items;
    }

    public function get() {
        return $this->items;
    }

    /**
     * @param string $path
     * @return QuestionCollection
     */
    public static function fromMdFile(string $path) : object
    {
        $data = file_get_contents($path);
        $QuestionCollection = explode('######', $data);
        array_shift($QuestionCollection);

        foreach ($QuestionCollection as $key => $item) {

            $answer = explode('####', $item);
            array_shift($answer);
            $answer = implode("", $answer);

            $question = explode('####', $item);
            array_pop($question);
            $question = implode("", $question);

            $question = strip_tags($question);
            $question = trim(preg_replace('/\s+/', ' ', $question));
            $question = str_replace("Đáp án", '', $question);
            $answer = strip_tags($answer);
            $answer = trim(preg_replace('/\s+/', ' ', $answer));

            $obj[$key] = new Question($question, $answer);

        }
        return new QuestionCollection($obj);

    }
    public function display($number) {
        if(count($this->items) != 0 && $number < count($this->items)) {
            return $this->items[$number];
        } else {
            return "No found";
        }
    }

    public function fuzzySearch(string $string) {
        foreach ($this->items as $item) {
            foreach ((array)$item as $value) {
                if(stristr($value, $string)) {
                    return stristr($value, $string);
                }
            }
        }
    }
}
