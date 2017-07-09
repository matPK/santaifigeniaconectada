<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http;

class CnpjValidator {
	
	public function validateCnpj($attribute, $value, $parameters)
	{
		// Deixa o CNPJ com apenas números
		$value = preg_replace('/[^0-9]/', '', $value);
		
		// Garante que o CNPJ é uma string
		$value = (string)$value;
		
		switch($value){
			case "00000000000000":
			case "11111111111111":
			case "22222222222222":
			case "33333333333333":
			case "44444444444444":
			case "55555555555555":
			case "66666666666666":
			case "77777777777777":
			case "88888888888888":
			case "99999999999999":
				return false;
		}

		
		// O valor original
		$cnpj_original = $value;
		
		// Captura os primeiros 12 números do CNPJ
		$primeiros_numeros_cnpj = substr($value, 0, 12);
		
		/**
		 * Multiplicação do CNPJ
		 *
		 * @param string $value Os digitos do CNPJ
		 * @param int $posicoes A posição que vai iniciar a regressão
		 * @return int O
		 *
		 */
		if (!function_exists('multiplica_cnpj')) {
			function multiplica_cnpj($value, $posicao = 5) {
				// Variável para o cálculo
				$calculo = 0;
				
				// Laço para percorrer os item do cnpj
				for ($i = 0; $i < strlen( $value ); $i++) {
					// Cálculo mais posição do CNPJ * a posição
					$calculo = $calculo + ($value[$i] * $posicao);
					
					// Decrementa a posição a cada volta do laço
					$posicao--;
					
					// Se a posição for menor que 2, ela se torna 9
					if ($posicao < 2) {
						$posicao = 9;
					}
				}
				// Retorna o cálculo
				return $calculo;
			}
		}
		
		// Faz o primeiro cálculo
		$primeiro_calculo = multiplica_cnpj($primeiros_numeros_cnpj);
		
		// Se o resto da divisão entre o primeiro cálculo e 11 for menor que 2, o primeiro
		// Dígito é zero (0), caso contrário é 11 - o resto da divisão entre o cálculo e 11
		$primeiro_digito = ($primeiro_calculo % 11) < 2 ? 0 :  11 - ($primeiro_calculo % 11);
		
		// Concatena o primeiro dígito nos 12 primeiros números do CNPJ
		// Agora temos 13 números aqui
		$primeiros_numeros_cnpj .= $primeiro_digito;
		
		// O segundo cálculo é a mesma coisa do primeiro, porém, começa na posição 6
		$segundo_calculo = multiplica_cnpj($primeiros_numeros_cnpj, 6);
		$segundo_digito = ($segundo_calculo % 11) < 2 ? 0 :  11 - ($segundo_calculo % 11);
		
		// Concatena o segundo dígito ao CNPJ
		$value = $primeiros_numeros_cnpj . $segundo_digito;
		
		// Verifica se o CNPJ gerado é idêntico ao enviado
		return ($value === $cnpj_original);
	}
	
}