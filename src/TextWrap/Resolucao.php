<?php

namespace Galoa\ExerciciosPhp\TextWrap;

/**
 * Implemente sua resolução aqui.
 */
class Resolucao implements TextWrapInterface {

  /**
   * {@inheritdoc}
   */
  public function textWrap(string $text, int $length): array {
	$meuarray = [""];
	$palavra = "";
	
	if (strlen($text)>$length)
	{
				
		for ($i=0; $i<strlen($text);$i++)
		{
			if ($text[$i]!=" ")
			{
				$palavra = $palavra.$text[$i];
			}
			elseif ($text[$i] == " ")
			{
				if (strlen($palavra)<=$length)
				{
					if (strlen($meuarray[count($meuarray)-1]. " ". $palavra) <= $length)
					{
						$meuarray[count($meuarray)-1]=ltrim($meuarray[count($meuarray)-1].(strlen($palavra)==0?"":" "). $palavra);
					}
					else
					{
						$meuarray[]=$palavra;
					}
				}
				else
				{
					if (strlen($palavra)>$length)
					{					
						$aux = $length-1-strlen($meuarray[count($meuarray)-1]);
						$meuarray[count($meuarray)-1]=ltrim($meuarray[count($meuarray)-1]. " " . substr($palavra, 0, $aux));
						$meuarray[] = substr($palavra, $aux);
					}
				}
				$palavra = "";
			}
		}   
		
		if (strlen($palavra)>$length)
		{					
			$aux = $length-1-strlen($meuarray[count($meuarray)-1]);
			$meuarray[count($meuarray)-1]=ltrim($meuarray[count($meuarray)-1]. " " . substr($palavra, 0, $aux));
			$meuarray[] = substr($palavra, $aux);
		} 
		else 
		{
			$meuarray[] = $palavra;
		}
	}
		
	print_r($meuarray);
	return $meuarray;
  }
}

