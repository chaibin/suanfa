<?php
/**
 * 兄弟连群里看到的一个 算法题
 *
 * 输出给定数字 下一个比它大的数字
 * 注意：给定数字，
 *      如 1234 输出  1243
 *      如 1243 输出 1324
 * 要求复杂度越优越好
 *
 * 测试 case 输入  1346531  输出 1356431
 *          输入  1351346
 */

function p(){
    echo "\n";
    foreach (func_get_args() as $value){
        print_r($value);
    }
}

/**
 *
 *
 * @param $number
 *
 * @return array
 *
 * @author   dongbin.chai@jiediankeji.com
 * @date     2021/4/29 6:15 下午
 */
function getNextLargeNumber($number)
{
    $nextNumber = [];
    $numberArr = str_split($number);
    $mid = $numberArr[0];
    $left = $right = [];
    foreach ($numberArr as $key => $value){

    }
    return $nextNumber;
}

function  v1($number)
{
    echo "输入number=> $number \n---------\n";
    $numberArr = str_split($number);
    $right = [];
    $str = '';
    for($i = count($numberArr)-1;$i>0;$i--){
        $right[] = $numberArr[$i];
        var_dump($i .'==>',$right);
        if($numberArr[$i] > $numberArr[$i-1]){
            $minNum = $right[] = $numberArr[$i-1];
            while (!in_array(++$minNum, $right));
            $numberArr[$i-1] = $minNum;
            var_dump($minNum);
            unset($right[array_search($minNum, $right)]);
            unset($numberArr[$i]);
            var_dump($numberArr, $right);
            sort($right);
            $str = implode($numberArr).implode($right);
            break;
        }else{
            unset($numberArr[$i]);
        }
    }
    echo "计算结果=> $str \n---------\n";
    return $str;
}
$number = [
    1351346,
//    5849163
//    1234,
//    1243,
//    12345567354326
];

foreach ($number as $value){
    printf("%d\n",v1($value));
}
 