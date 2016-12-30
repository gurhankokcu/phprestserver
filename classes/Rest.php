<?php

class Handler
{
    private $method;
    private $path;
    private $functionNames;

    public function __construct($method, $path, $functionNames)
    {
        $this->method = $method;
        $this->path = $path;
        $this->functionNames = $functionNames;
    }

    public function getMethod()
    {
        return $this->method;
    }

    public function getPath()
    {
        return $this->path;
    }

    public function getFunctionNames()
    {
        return $this->functionNames;
    }
}

class Rest
{
    private $beforeFunction;
    private $afterFunction;
    private $handlers;

    public function __construct()
    {
        $this->handlers = array();
    }

    public function before($functionName)
    {
        $this->beforeFunction = $functionName;
    }

    public function after($functionName)
    {
        $this->afterFunction = $functionName;
    }

    public function get($path, ...$functionNames)
    {
        array_push($this->handlers, new Handler('get', $path, $functionNames));
    }

    public function post($path, ...$functionNames)
    {
        array_push($this->handlers, new Handler('post', $path, $functionNames));
    }

    public function put($path, ...$functionNames)
    {
        array_push($this->handlers, new Handler('put', $path, $functionNames));
    }

    public function delete($path, ...$functionNames)
    {
        array_push($this->handlers, new Handler('delete', $path, $functionNames));
    }

    public function process($requestMethod, $requestPath)
    {
        $result = null;

        $currentHandler = $this->getCurrentHandler($requestMethod, $requestPath);
        if ($currentHandler != null)
        {
            call_user_func($this->beforeFunction);

            $parameters = $this->getCurrentParameters($currentHandler->getPath(), $requestPath);

            $functionNames = $currentHandler->getFunctionNames();
            for ($i = 0; $i < count($functionNames); $i++)
            {
                $result = call_user_func_array($functionNames[$i], $parameters);
                if ($result->status != ResultStatus::success)
                {
                    break;
                }
            }

            call_user_func($this->afterFunction);
        }

        return $result;
    }

    private function getCurrentHandler($requestMethod, $requestPath)
    {
        $requestPath = substr($requestPath, -1) == '/' ? substr($requestPath, 0, -1) : $requestPath;
        $requestParams = explode('/', $requestPath);

        foreach ($this->handlers as $handler)
        {
            if ($handler->getMethod() == $requestMethod)
            {
                $error = false;
                $handlerParams = explode('/', $handler->getPath());
                if (count($requestParams) == count($handlerParams))
                {
                    for ($i = 0; $i < count($requestParams); $i++)
                    {
                        $handlerParam = $handlerParams[$i];
                        $requestParam = $requestParams[$i];
                        if (substr($handlerParam, 0, 1) != ':' && $handlerParam != $requestParam)
                        {
                            $error = true;
                        }
                    }
                    if (!$error)
                    {
                        return $handler;
                    }
                }
            }
        }
        return null;
    }

    private function getCurrentParameters($currentPath, $requestPath)
    {
        $parameters = array();
        $currentParams = explode('/', $currentPath);
        $requestParams = explode('/', $requestPath);
        for ($i = 0; $i < count($currentParams); $i++)
        {
            $currentParam = $currentParams[$i];
            $requestParam = $requestParams[$i];
            if (substr($currentParam, 0, 1) == ':')
            {
                array_push($parameters, $requestParam);
            }
        }
        return $parameters;
    }
}
