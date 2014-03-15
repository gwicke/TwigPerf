<?php
/**
 * Generated by build/gen_test on 2014-02-26 at 05:34:15.
 */
require_once('src/lightncandy.php');

class LCRun2Test extends PHPUnit_Framework_TestCase
{
    /**
     * @covers LCRun2::ifvar
     */
    public function testOn_ifvar() {
        $method = new ReflectionMethod('LCRun2', 'ifvar');
        $this->assertEquals(false, $method->invoke(null,
            null
        ));
        $this->assertEquals(false, $method->invoke(null,
            0
        ));
        $this->assertEquals(false, $method->invoke(null,
            false
        ));
        $this->assertEquals(true, $method->invoke(null,
            true
        ));
        $this->assertEquals(true, $method->invoke(null,
            1
        ));
        $this->assertEquals(false, $method->invoke(null,
            ''
        ));
        $this->assertEquals(false, $method->invoke(null,
            Array()
        ));
        $this->assertEquals(true, $method->invoke(null,
            Array('')
        ));
        $this->assertEquals(true, $method->invoke(null,
            Array(0)
        ));
    }
    /**
     * @covers LCRun2::ifv
     */
    public function testOn_ifv() {
        $method = new ReflectionMethod('LCRun2', 'ifv');
        $this->assertEquals('', $method->invoke(null,
            null, Array('scopes' => Array()), Array(), null
        ));
        $this->assertEquals('', $method->invoke(null,
            null, Array('scopes' => Array()), Array(), function () {return 'Y';}
        ));
        $this->assertEquals('Y', $method->invoke(null,
            1, Array('scopes' => Array()), Array(), function () {return 'Y';}
        ));
        $this->assertEquals('N', $method->invoke(null,
            null, Array('scopes' => Array()), Array(), function () {return 'Y';}, function () {return 'N';}
        ));
    }
    /**
     * @covers LCRun2::unl
     */
    public function testOn_unl() {
        $method = new ReflectionMethod('LCRun2', 'unl');
        $this->assertEquals('', $method->invoke(null,
            null, Array('scopes' => Array()), Array(), null
        ));
        $this->assertEquals('Y', $method->invoke(null,
            null, Array('scopes' => Array()), Array(), function () {return 'Y';}
        ));
        $this->assertEquals('', $method->invoke(null,
            1, Array('scopes' => Array()), Array(), function () {return 'Y';}
        ));
        $this->assertEquals('Y', $method->invoke(null,
            null, Array('scopes' => Array()), Array(), function () {return 'Y';}, function () {return 'N';}
        ));
        $this->assertEquals('N', $method->invoke(null,
            true, Array('scopes' => Array()), Array(), function () {return 'Y';}, function () {return 'N';}
        ));
    }
    /**
     * @covers LCRun2::isec
     */
    public function testOn_isec() {
        $method = new ReflectionMethod('LCRun2', 'isec');
        $this->assertEquals(true, $method->invoke(null,
            null
        ));
        $this->assertEquals(false, $method->invoke(null,
            0
        ));
        $this->assertEquals(true, $method->invoke(null,
            false
        ));
        $this->assertEquals(false, $method->invoke(null,
            'false'
        ));
    }
    /**
     * @covers LCRun2::raw
     */
    public function testOn_raw() {
        $method = new ReflectionMethod('LCRun2', 'raw');
        $this->assertEquals(true, $method->invoke(null,
            true, Array('flags' => Array('jstrue' => 0))
        ));
        $this->assertEquals('true', $method->invoke(null,
            true, Array('flags' => Array('jstrue' => 1))
        ));
        $this->assertEquals('', $method->invoke(null,
            false, Array('flags' => Array('jstrue' => 0))
        ));
        $this->assertEquals('', $method->invoke(null,
            false, Array('flags' => Array('jstrue' => 1))
        ));
        $this->assertEquals('false', $method->invoke(null,
            false, Array('flags' => Array('jstrue' => 1)), true
        ));
        $this->assertEquals(Array('a', 'b'), $method->invoke(null,
            Array('a', 'b'), Array('flags' => Array('jstrue' => 1, 'jsobj' => 0))
        ));
        $this->assertEquals('a,b', $method->invoke(null,
            Array('a','b'), Array('flags' => Array('jstrue' => 1, 'jsobj' => 1))
        ));
        $this->assertEquals('[object Object]', $method->invoke(null,
            Array('a', 'c' => 'b'), Array('flags' => Array('jstrue' => 1, 'jsobj' => 1))
        ));
        $this->assertEquals('[object Object]', $method->invoke(null,
            Array('c' => 'b'), Array('flags' => Array('jstrue' => 1, 'jsobj' => 1))
        ));
        $this->assertEquals('a,true', $method->invoke(null,
            Array('a', true), Array('flags' => Array('jstrue' => 1, 'jsobj' => 1))
        ));
        $this->assertEquals('a,1', $method->invoke(null,
            Array('a',true), Array('flags' => Array('jstrue' => 0, 'jsobj' => 1))
        ));
        $this->assertEquals('a,', $method->invoke(null,
            Array('a',false), Array('flags' => Array('jstrue' => 0, 'jsobj' => 1))
        ));
        $this->assertEquals('a,false', $method->invoke(null,
            Array('a',false), Array('flags' => Array('jstrue' => 1, 'jsobj' => 1))
        ));
    }
    /**
     * @covers LCRun2::enc
     */
    public function testOn_enc() {
        $method = new ReflectionMethod('LCRun2', 'enc');
        $this->assertEquals('a', $method->invoke(null,
            'a', Array()
        ));
        $this->assertEquals('a&amp;b', $method->invoke(null,
            'a&b', Array()
        ));
        $this->assertEquals('a&#039;b', $method->invoke(null,
            'a\'b', Array()
        ));
    }
    /**
     * @covers LCRun2::encq
     */
    public function testOn_encq() {
        $method = new ReflectionMethod('LCRun2', 'encq');
        $this->assertEquals('a', $method->invoke(null,
            'a', Array()
        ));
        $this->assertEquals('a&amp;b', $method->invoke(null,
            'a&b', Array()
        ));
        $this->assertEquals('a&#x27;b', $method->invoke(null,
            'a\'b', Array()
        ));
    }
    /**
     * @covers LCRun2::sec
     */
    public function testOn_sec() {
        $method = new ReflectionMethod('LCRun2', 'sec');
        $this->assertEquals('', $method->invoke(null,
            false, Array(), false, false, function () {return 'A';}
        ));
        $this->assertEquals('', $method->invoke(null,
            null, Array(), null, false, function () {return 'A';}
        ));
        $this->assertEquals('A', $method->invoke(null,
            true, Array(), true, false, function () {return 'A';}
        ));
        $this->assertEquals('A', $method->invoke(null,
            0, Array(), 0, false, function () {return 'A';}
        ));
        $this->assertEquals('-a=', $method->invoke(null,
            Array('a'), Array(), Array('a'), false, function ($c, $i) {return "-$i=";}
        ));
        $this->assertEquals('-a=-b=', $method->invoke(null,
            Array('a','b'), Array(), Array('a','b'), false, function ($c, $i) {return "-$i=";}
        ));
        $this->assertEquals('', $method->invoke(null,
            'abc', Array(), 'abc', true, function ($c, $i) {return "-$i=";}
        ));
        $this->assertEquals('-b=', $method->invoke(null,
            Array('a'=>'b'), Array(), Array('a' => 'b'), true, function ($c, $i) {return "-$i=";}
        ));
        $this->assertEquals(0, $method->invoke(null,
            'b', Array(), 'b', false, function ($c, $i) {return count($i);}
        ));
        $this->assertEquals('1', $method->invoke(null,
            1, Array(), 1, false, function ($c, $i) {return print_r($i, true);}
        ));
        $this->assertEquals('0', $method->invoke(null,
            0, Array(), 0, false, function ($c, $i) {return print_r($i, true);}
        ));
        $this->assertEquals('{"b":"c"}', $method->invoke(null,
            Array('b'=>'c'), Array(), Array('b' => 'c'), false, function ($c, $i) {return json_encode($i);}
        ));
    }
    /**
     * @covers LCRun2::wi
     */
    public function testOn_wi() {
        $method = new ReflectionMethod('LCRun2', 'wi');
        $this->assertEquals('', $method->invoke(null,
            false, Array(), false, function () {return 'A';}
        ));
        $this->assertEquals('', $method->invoke(null,
            null, Array(), null, function () {return 'A';}
        ));
        $this->assertEquals('-Array=', $method->invoke(null,
            Array('a'=>'b'), Array(), Array('a' => 'b'), function ($c, $i) {return "-$i=";}
        ));
        $this->assertEquals('-b=', $method->invoke(null,
            'b', Array(), Array('a' => 'b'), function ($c, $i) {return "-$i=";}
        ));
    }
    /**
     * @covers LCRun2::ch
     */
    public function testOn_ch() {
        $method = new ReflectionMethod('LCRun2', 'ch');
        $this->assertEquals('=-=', $method->invoke(null,
            'a', Array('-'), 'raw', Array('helpers' => Array('a' => function ($i) {return "=$i=";}))
        ));
        $this->assertEquals('=&amp;=', $method->invoke(null,
            'a', Array('&'), 'enc', Array('helpers' => Array('a' => function ($i) {return "=$i=";}))
        ));
        $this->assertEquals('=&#x27;=', $method->invoke(null,
            'a', Array('\''), 'encq', Array('helpers' => Array('a' => function ($i) {return "=$i=";}))
        ));
        $this->assertEquals('=b=', $method->invoke(null,
            'a', Array('a' => 'b'), 'raw', Array('helpers' => Array('a' => function ($i) {return "={$i['a']}=";})), true
        ));
    }
}
?>