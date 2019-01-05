<?php

echo "<h2>PHP basic</h2>";

$var = 'Bob';
$Var = 'Joe';
echo "$var, $Var";      // outputs "Bob, Joe"

$site = 'not yet';     // invalid; starts with a number
$_4site = 'not yet';    // valid; starts with an underscore
$täyte = 'mansikka';    // valid; 'ä' is ASCII 228.

echo "<br/>"; /*-----------------------------------------------------*/

$foo = 'Bob';              // Assign the value 'Bob' to $foo
$bar = &$foo;              // Reference $foo via $bar.
$bar = "My name is $bar";  // Alter $bar...
echo $bar;
echo $foo;                 // $foo is altered too.


echo "<br/>"; /*-----------------------------------------------------*/

$foo = 25;
$bar = &$foo;      
/*
$bar = &(24 * 7);  

function test()
{
   return 25;
}

$bar = &test();    // Invalid.
*/



// 설정되지 않고 참조되지 않은 (사용되지 않은) 변수; NULL 출력
var_dump($unset_var);

// 논리 사용; 'false' 출력 (이 구문에 대한 설명은 3항 연산자를 참고하십시오)
echo($unset_bool ? "true\n" : "false\n");

// 문자열 사용; 'string(3) "abc"' 출력
$unset_str .= 'abc';
var_dump($unset_str);

// 정수 사용; 'int(25)' 출력
$unset_int += 25; // 0 + 25 => 25
var_dump($unset_int);

// 소수 사용; 'float(1.25)' 출력
$unset_float += 1.25;
var_dump($unset_float);

// 배열 사용; array(1) {  [3]=>  string(3) "def" } 출력
$unset_arr[3] = "def" // array() + array(3 => "def") => array(3 => "def")
var_dump($unset_arr);

// 객체 사용; 새 stdClass 객체 생성 (http://www.php.net/manual/kr/reserved.classes.php 참고)
// 출력: object(stdClass)#1 (1) {  ["foo"]=>  string(3) "bar" }
$unset_obj->foo = 'bar';
var_dump($unset_obj);



?>