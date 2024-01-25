<?php
	//***********************************************************************************************
	// AUTOR: Ricardo Erick Rebêlo
	// Objetivo: funções para tratar o CPF
	// Alterações:
	// 0.1   24/04/2023 - Começo da primeira conversão

	namespace jacknpoe;

	//***********************************************************************************************
	// Classe CPF

	class CPF
	{
		function validaCPF( $cpf = "")
		{
			$cpf = preg_replace('/[^0-9]/', '', $cpf);

			if ( strlen( $cpf) != 11)
			{
				return false;
			}
			
			if (preg_match('/(\d)\1{10}/', $cpf)) {
            		  return false;
       			 }
			 	
			for ($tempo = 9; $tempo <= 10; $tempo++)
			{
				for ($acumulador = 0, $contador = 0; $contador < $tempo; $contador++)
				{
					$acumulador += $cpf[ $contador] * (($tempo + 1) - $contador);
				}
				$acumulador = ((10 * $acumulador) % 11) % 10;
				if ( $cpf[ $contador] != $acumulador)
				{
					return false;
				}
			}
			return true;
		}
	}
?>
