<?php


function BinarySearch( $array, $key, $low, $high, $konci_tampil_perhitungan, $urutan_perhitungan )  
{  
    
	
	$middle = ceil( ( $low+$high )/2 ); // gets the middle of the array 
	if($konci_tampil_perhitungan) {
		echo "
			Perhitungan Ke - $urutan_perhitungan <br>
			middle = intval( ( $low+$high )/2 ) = $middle <br>
			key = $key <br>
		";
	}
	
	$urutan_perhitungan++;
	
	
    if ( $array[$middle] == $array[$key] ) // if the middle is our key  
    {  
		if($konci_tampil_perhitungan) {
			echo " if ( $array[$middle] == $array[$key] ) <br><br>"; 
		}
		
		return $key;		
    }  
    elseif ( $middle > $key) // our key might be in the left sub-array  
    {  
		if($konci_tampil_perhitungan) {
			echo "
				elseif ( $middle > $key) <br>
				middle = $middle - 1 = ".($middle-1)." <br><br>
			";
		}
		
		return BinarySearch( $array, $key, $low, ($middle-1), $konci_tampil_perhitungan, $urutan_perhitungan );
    }     
  	elseif ( $middle < $key)
	{
		if($konci_tampil_perhitungan) {
			echo "
				elseif ( $middle < $key) <br>
				middle = $middle + 1 = ".($middle+1)." <br><br>
			";			
		}
		
		return BinarySearch( $array, $key, $high, ($middle+1), $konci_tampil_perhitungan, $urutan_perhitungan ); // our key might be in the right sub-array
	}
	
}
?>