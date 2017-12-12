<?php
namespace StjepanBrbot;

class DFT
{
  private $F=[];
  private $S=[];

  public function __construct(array $data)
  {
    $N=count($data);

    $re=round(cos(2*pi()/$N),2);
    $im=round(-sin(2*pi()/$N),2);

    for($i=0;$i<$N;$i++)
    {
      $this->F[$i]=new Complex(0,0);
      for($j=0;$j<$N;$j++)
      {
        $w=new Complex($re,$im);
        $w->power($i*$j);
        $w->multiply($data[$j],0);
        $this->F[$i]->add($w);
      }
      $this->S[$i]=$this->F[$i]->getMagnitude();
    }
  }

  public function getFactors()
  {
    return $this->F;
  }

  public function getSpectra()
  {
    return $this->S;
  }

}

