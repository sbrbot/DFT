<?php
namespace StjepanBrbot;

class Complex
{
  protected $r,$i;

  public function __construct($r,$i)
  {
    $this->r=$r;
    $this->i=$i;
  }

  public function getRe()
  {
    return $this->r;
  }

  public function getIm()
  {
    return $this->i;
  }

  public function getMagnitude()
  {
    return sqrt($this->getRe()**2+$this->getIm()**2);
  }

  public function add($r,$i=0)
  {
    if($r instanceof self)
    {
      $i=$r->getIm();
      $r=$r->getRe();
    }
    $this->r+=$r;
    $this->i+=$i;
  }

  public function sub($r,$i=0)
  {
    if($r instanceof self)
    {
      $i=$r->getIm();
      $r=$r->getRe();
    }
    $this->r-=$r;
    $this->i-=$i;
  }

  public function multiply($r,$i=0)
  {
    if($r instanceof self)
    {
      $i=$r->getIm();
      $r=$r->getRe();
    }
    $re=$this->r*$r-$this->i*$i;
    $im=$this->r*$i+$this->i*$r;
    $this->r=$re;
    $this->i=$im;
  }

  public function divide($r,$i=0)
  {
    if($r instanceof self)
    {
      $i=$r->getIm();
      $r=$r->getRe();
    }
    $d=$r**2+$i**2;
    $re=($this->r*$r+$this->i*$i)/$d;
    $im=($this->i*$r-$this->r*$i)/$d;
    $this->r=$re;
    $this->i=$im;
  }

  public function power(int $n)
  {
    if($n==0)
    {
      $this->r=1;
      $this->i=0;
    }
    elseif($n>1)
    {
      $re=$this->r;
      $im=$this->i;
      for($i=1;$i<$n;$i++) $this->multiply($re,$im);
    }
  }

}