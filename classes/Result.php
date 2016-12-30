<?php

class ResultStatus
{
    const success = 0;
    const failure = 1;
    const unauthorized = 2;
}

class Result
{
    public $status;
    public $result;

    public function __construct($status, $result = null)
    {
        $this->status = $status;
        $this->result = $result;
    }
}

class ResultProvider
{
    public static function success($result = null)
    {
        return new Result(ResultStatus::success, $result);
    }

    public static function failure($result = null)
    {
        return new Result(ResultStatus::failure, $result);
    }

    public static function unauthorized($result = null)
    {
        return new Result(ResultStatus::unauthorized, $result);
    }
}
