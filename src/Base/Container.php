<?php

namespace Academy\Servicecontainer\Base;

use Psr\Container\ContainerInterface;
use ReflectionClass;

class Container implements ContainerInterface
{
    protected array $services = [
        'id' => 'class'
    ];

    public function get(string $id): mixed
    {
        $service = $this->resolve($id);

        return $this->getInstance($service);

    }

    public function has(string $id): bool
    {
        return array_key_exists($id, $this->services);

    }

    public function register(string $key, string $target = null): void
    {
        $target = $target ?? $key;
        $this->services[$key] = new ReflectionClass($target);
    }

    private function resolve(string $key): ReflectionClass
    {
        if ($this->has($key)) {
            var_dump('loaded class.');
            $service = $this->services[$key];

            if (is_callable($service)) {
                return $service();
            }

            return $service;
        }
        var_dump('new class.');

        $this->services[$key] = new ReflectionClass($key);

        return $this->services[$key];

    }

    private function getInstance(ReflectionClass $service)
    {
        $constructor = $service->getConstructor();

        if (is_null($constructor) || $constructor->getNumberOfRequiredParameters() === 0) {
            return $service->newInstance();
        }

        $params = [];

        foreach($constructor->getParameters() as $parameter) {
            if ($paramType = $parameter->getType()) {
                $params [] = $this->get($paramType->getName());
            }
        }

        return $service->newInstanceArgs($params);
    }
}

