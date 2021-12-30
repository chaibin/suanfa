<?php

/**
 * LRU 简易实现  使用数组  性能太差了 使用
 *
 * @see      https://leetcode-cn.com/problems/lru-cache/
 *
 * @author   dongbin.chai@jiediankeji.com
 * @date     2021/12/13 3:05 下午
 */
class LRUCache
{
    public $length;

    public $data   = [];
    public $mapKey = [];

    /**
     * @param  Integer  $capacity
     */
    function __construct($capacity)
    {
        $this->length = $capacity;
    }

    /**
     * @param  Integer  $key
     *
     * @return Integer
     */
    function get($key)
    {
        if (!isset($this->mapKey[$key])) {
            return -1;
        }

        $this->rebuild($key);

        return $this->data[$this->mapKey[$key]]['value'];
    }

    /**
     * @param  Integer  $key
     * @param  Integer  $value
     *
     * @return NULL
     */
    function put($key, $value)
    {
        //未设置过
        if(!isset($this->mapKey[$key])){
            array_push($this->data,['key' => $key, 'value' => $value]);
        }else{
            array_push($this->data,['key' => $key, 'value' => $value]);
            unset($this->data[$this->mapKey[$key]]);
        }
        //超长了需要删除第一个
        if(count($this->data) > $this->length){
            array_shift($this->data);
        }
        $this->rebuild();
    }

    public function rebuild($key = null)
    {
        if(!is_null($key)){
            $dataIndex = $this->mapKey[$key];
            array_push($this->data, $this->data[$dataIndex]);
            unset($this->data[$dataIndex]);
        }
        $temp = [];
        foreach ($this->data as $key => $value){
            $temp[$value['key']] = $key;
        }
        $this->mapKey = $temp;
    }
}

/**
 * Your LRUCache object will be instantiated and called as such:
 * $obj = LRUCache($capacity);
 * $ret_1 = $obj->get($key);
 * $obj->put($key, $value);
 *
 * ["LRUCache","put","put","get","put","get","get"]
 * [[2],[2,1],[1,1],[2],[4,1],[1],[2]]
 */
$obj  = new LRUCache(2);
$res1 = $obj->put(2, 1);
$res1 = $obj->put(1, 1);
$res1 = $obj->get(2);
// var_dump($obj->mapKey, $obj->data,$res1);exit();
$res1 = $obj->put(4, 1);

$res1 = $obj->get(1);

$res1 = $obj->get(2);

var_dump($res1);exit();