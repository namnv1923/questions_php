<?php

namespace App;

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
    public function fromMdFile(string $path)
    {
        $data = file_get_contents($path);
        $array = explode('######', $data);
        array_shift($array);

        $this->items = $array;
    }
}
