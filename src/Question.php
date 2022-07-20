<?php

namespace App;

class Question
{
    protected string $content;

    protected string $answer;

    public function __construct(string $content, string $answer)
    {
        $this->content = $content;
        $this->answer = $answer;
    }

    /**
     * @return string
     */
    public function getContent() : string
    {
        return $this->content;
    }

    /**
     * @return string
     */
    public function getAnswer(): string
    {
        return $this->answer;
    }
}
