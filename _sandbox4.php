<?php

/*Tired from working on the DeathStar, you challenged the intern (let's call her "Morgan") to create a class that can reverse a string and upper case every other letter. "Ha!" Morgan says, "This is simple!". To show off, Morgan creates the StringTransformer class and even makes it cache the results to be super-performant.

But wait you say! Combining the string transformation and caching into the same class make StringTransformer responsible for two jobs. Help show Morgan the intern a better way.

Your Mission
Creating a new Cache class with two methods fetchFromCache($key) and saveToCache($key, $val).

Then, pass this into StringTransformer and use it to cache, instead of using your own logic.*/


/**
 * BEFORE
 */
class StringTransformerBefore
{
    public function transformString($str)
    {
        $cacheFile = __DIR__ . '/cache/' . md5($str);

        if (file_exists($cacheFile)) {
            return file_get_contents($cacheFile);
        }

        $newStr = '';
        foreach (str_split(strrev($str), 2) as $twoChars) {
            // capitalize the first of 2 characters
            $newStr .= ucfirst($twoChars);
        }

        if (!file_exists(dirname($cacheFile))) {
            mkdir(dirname($cacheFile));
        }
        file_put_contents($cacheFile, $newStr);

        return $newStr;
    }
}


$str = 'Judge me by my size, do you?';

$transformer = new StringTransformerBefore();
var_dump($transformer->transformString($str));


/**
 *
 * MY SOLUTION
 *
 */
class StringTransformer
{
    public function transformString(Cache $cache)
    {
        $cacheFile = $cache->fetchFromCache($cache->cacheFile);

        if ($cacheFile != '') {
            return $cacheFile;
        }

        $newStr = '';
        foreach (str_split(strrev($cache->str), 2) as $twoChars) {
            // capitalize the first of 2 characters
            $newStr .= ucfirst($twoChars);
        }

        $cache->saveToCache($cache->cacheFile, $newStr);

        return $newStr;
    }
}

class Cache
{

    /*
        "Your Mission:
            1. Creating a new Cache class with two methods fetchFromCache($key) and saveToCache($key, $val).
            2. Then, pass this into StringTransformer and use it to cache, instead of using your own logic.
        "*/
    public $cacheFile, $str;

    public function __construct($str)
    {
        $this->str = $str;
        $this->cacheFile = $this->getCacheFile($str);
    }

    public function fetchFromCache($key)
    {
        if (file_exists($key)) {
            return file_get_contents($key);
        }

        return false; // Put it here due to "Missing return statement" warning
    }

    public function saveToCache($key, $val)
    {
        if (!file_exists(dirname($key))) {
            mkdir(dirname($key));
        }
        file_put_contents($key, $val);
    }

    public function getCacheFile($str)
    {
        return __DIR__ . '/cache/' . md5($str);
    }

}

$cache = new Cache($str);
$newTransformer = new StringTransformer();
var_dump($newTransformer->transformString($cache));


/**
 *
 * OFFICIAL Symphonycast's Solution
 *
 */
class StringTransformerSolution
{
    private $cache;

    public function __construct(CacheSolution $cache)
    {
        $this->cache = $cache;
    }

    public function transformString($str)
    {
        if ($result = $this->cache->fetchFromCache($str)) {
            return $result;
        }

        $newStr = '';
        foreach (str_split(strrev($str), 2) as $twoChars) {
            // capitalize the first of 2 characters
            $newStr .= ucfirst($twoChars);
        }

        $this->cache->saveToCache($str, $newStr);

        return $newStr;
    }
}


class CacheSolution
{
    public function fetchFromCache($key)
    {
        $cacheFile = $this->getCacheFilename($key);

        if (file_exists($cacheFile)) {
            return file_get_contents($cacheFile);
        }

        return false;
    }

    public function saveToCache($key, $val)
    {
        $cacheFile = $this->getCacheFilename($key);

        if (!file_exists(dirname($cacheFile))) {
            mkdir(dirname($cacheFile));
        }

        return file_put_contents($cacheFile, $val);
    }

    /**
     * Extra credit private method to avoid duplication
     */
    private function getCacheFilename($key)
    {
        return __DIR__ . '/cache/' . md5($key);
    }
}

$transformerSolution = new StringTransformerSolution(new CacheSolution());
var_dump($transformerSolution->transformString($str));