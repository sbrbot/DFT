<?php
namespace StjepanBrbot;

use StjepanBrbot\Complex;

function compareComplex($A,$B)
{
  if(abs($A->getRe()-$B->getRe())>0.001) return false;
  if(abs($A->getIm()-$B->getIm())>0.001) return false;
  return true;
}

class ComplexTest extends \PHPUnit_Framework_TestCase
{

  protected $C;

  protected function setUp()
  {
    $this->C=new Complex(2,-1);
  }

  protected function tearDown()
  {

  }

  public function testGetRe()
  {
    $this->C=new Complex(2,-1);
    $this->assertEquals(2,$this->C->getRe());
  }

  public function testGetIm()
  {
    $this->C=new Complex(2,-1);
    $this->assertEquals(-1,$this->C->getIm());
  }

  public function testGetMagnitude()
  {
    $this->C=new Complex(2,-1);
    $this->assertEquals(2.236,$this->C->getMagnitude(),'',0.001);
  }

  public function testAdd()
  {
    $this->C=new Complex(2,-1);
    $c=new Complex(-1,2);
    $this->C->add($c);
    $this->assertTrue(compareComplex($this->C,new Complex(1,1)));
  }

  public function testSub()
  {
    $this->C=new Complex(2,-1);
    $c=new Complex(1,1);
    $this->C->sub($c);
    $this->assertTrue(compareComplex($this->C,new Complex(1,-2)));
  }

  public function testMultiply()
  {
    $this->C=new Complex(2,-1);
    $c=new Complex(1,1);
    $this->C->multiply($c);
    $this->assertTrue(compareComplex($this->C,new Complex(3,1)));
  }

  public function testDivide()
  {
    $this->C=new Complex(2,-1);
    $c=new Complex(1,1);
    $this->C->divide($c);
    $this->assertTrue(compareComplex($this->C,new Complex(0.5,-1.5)));
  }

  public function testPower()
  {
    $this->C=new Complex(2,-1);
    $this->C->power(3);
    $this->assertTrue(compareComplex($this->C,new Complex(2,-11)));
  }

}
