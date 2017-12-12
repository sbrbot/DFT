<?php
namespace StjepanBrbot;

use StjepanBrbot\DFT;
use StjepanBrbot\Complex;

function compare1DArrays($a,$b)
{
  foreach($a as $i => $val)
  {
    if(abs($val-$b[$i]) > 0.001) return false;
  }
  return true;
}

function compareComplexArrays($a,$b)
{
  foreach($a as $i => $C)
  {
    if(abs($C->getRe()-$b[$i]->getRe())>0.001) return false;
    if(abs($C->getIm()-$b[$i]->getIm())>0.001) return false;
  }
  return true;
}

class DFTTest extends \PHPUnit_Framework_TestCase
{

  protected $DFT;

  protected function setUp()
  {
    $this->DFT=new DFT([2,3,-1,1]);
  }

  protected function tearDown()
  {

  }

  public function testGetFactors()
  {
    $F=[new Complex(5,0),new Complex(3,-2),new Complex(-3,0),new Complex(3,2)];
    $this->assertTrue(compareComplexArrays($F,$this->DFT->getFactors()));
  }

  public function testGetSpectra()
  {
    $S=[5,3.606,3,3.606];
    $this->assertTrue(compare1DArrays($S,$this->DFT->getSpectra()));
  }

}
