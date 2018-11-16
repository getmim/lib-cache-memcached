<?php
/**
 * Memcached
 * @package lib-cache-memcached
 * @version 0.0.1
 */

namespace LibCacheMemcached\Driver;

use LibMemcached\Library\Memcached as DMemcached;

class Memcached implements \LibCache\Iface\Driver
{
    private $conn = 'cache';

    public function add(string $name, $value, int $expires): void{
        DMemcached::set($this->conn, $name, $value, $expires);
    }
    
    public function exists(string $name): bool{
        DMemcached::get($this->conn, $name);
        return !DMemcached::getResultCode($this->conn);
    }

    public function get(string $name){
        return DMemcached::get($this->conn, $name);
    }
    
    public function list(): array{
        return DMemcached::getAllKeys($this->conn);
    }
    
    public function remove(string $name): void{
        DMemcached::delete($this->conn, $name);
    }

    public function truncate(): void{
        DMemcached::flush($this->conn);
    }
}