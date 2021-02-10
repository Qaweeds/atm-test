<?php
$q = array(5, 10, 20, 50, 100, 200, 500, 1000); //banknotes
$w=25840; //summ
$cash = [
 	'1000' => 234,
 	'500' => 4354,
 	'200' => 3453,
 	'100' => 2602,      // номинал и кол-во
 	'50' => 2536,
 	'20' => 4132,
    '10' => 1763,
]; 						

$euro_bankomat = new Bankomat_from_net;
$ukr_bankomat = new My_bankomat;

// $euro_bankomat ->give_money($q, $w);
$ukr_bankomat ->give_money($w, $cash);
/**
 *												 
 */
class Bankomat_from_net
{
	function give_money($banknots, $summ)
	{	
		$INF=PHP_INT_MAX;
		$F=Array();
		$F[0]=0;
		$this->banknots_count = count($banknots);
		$this->summ = (int) $summ;
		if (is_array($banknots)) {
			$this->banknots = $banknots;
		}else{
			$this->banknots = array(5, 10, 20, 50, 100, 200, 500, 1000);
		}
		$INF=PHP_INT_MAX;
		$F=Array();
		$F[0]=0;
		for($m=1; $m<=$this->summ; $m++) {
		    $F[$m]=$INF;
		    for($i=0; $i<$this->banknots_count; $i++){
		        if($m>=$this->banknots[$i] && $F[$m-$this->banknots[$i]]+1<$F[$m]) {
		            $F[$m] = $F[$m-$this->banknots[$i]]+1;
		        }                       
		    }
		}
		if($F[$this->summ]==$INF) {
		    echo "Требуемую сумму выдать невозможно\r\n";
		}
		else {
		    while($this->summ>0) {
		        for($j=0;$j<$this->banknots_count;$j++) {
		            if ($F[$this->summ-$banknots[$j]]==$F[$this->summ]-1) { 
		                echo $this->banknots[$j]."<br> ";
		                $this->summ-=$this->banknots[$j];
		                break;
		            }
		        }
		    }
		}
	}
}
/**
 * 										
 */
class My_bankomat
{
	
	function give_money($summ, $obj)
	{
		if (!gettype($obj)) {
			echo "wrong type. put object";
		}else{
			$this->money = $obj;
			$this->summa = $summ;
			$query = 0;
			foreach ($this->money as $key => $value) {
				$query+=$key*$value;
			}
			if ($summ>$query) {
				echo "no money";
			}else if($summ%10){
				echo "put correct number. mupliple 10";
			}else {
				foreach ($this->money as $key => $value) {
					while ($this->summa > 0) {
						if (intdiv($this->summa, $key)) {
							echo $key.'<br>';                 
							$this->summa-=$key;
							$value--;
							$this->money[$key] = $value;
						}else{
							break;
						}
					}
				}
			}

		}
		// return $this->money; // возвращает объект. номинал и кол-во купюр, остаток 
	}
}

?>

