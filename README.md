Discrete Fourier Transform
==========================

This is a simple <b>Discrete Fourier Transform</b> library implemented in PHP.

<pre>
require 'DFT.php';

// input discrete values
$Y=[[2,3,-1,1];

// instantiate and calculate factors
$DFT=new DFT($Y);

// get Fourier factors (Complex)
$Factors=$DFT->getFactors();

// get Magnitudes (float)
$Magnitudes=$DFT->getMagnitudes();
</pre>

As simple as that!