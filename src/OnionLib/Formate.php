<?php
/**
 * This file is part of Onion Service
 *
 * Copyright (c) 2014-2016, Humberto Lourenço <betto@m3uzz.com>.
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions
 * are met:
 *
 *   * Redistributions of source code must retain the above copyright
 *     notice, this list of conditions and the following disclaimer.
 *
 *   * Redistributions in binary form must reproduce the above copyright
 *     notice, this list of conditions and the following disclaimer in
 *     the documentation and/or other materials provided with the
 *     distribution.
 *
 *   * Neither the name of Humberto Lourenço nor the names of his
 *     contributors may be used to endorse or promote products derived
 *     from this software without specific prior written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS
 * FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE
 * COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT,
 * INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING,
 * BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
 * LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER
 * CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT
 * LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN
 * ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 *
 * @category   PHP
 * @package    Onion Service
 * @author     Humberto Lourenço <betto@m3uzz.com>
 * @copyright  2014-2016 Humberto Lourenço <betto@m3uzz.com>
 * @license    http://www.opensource.org/licenses/BSD-3-Clause  The BSD 3-Clause License
 * @link       http://github.com/m3uzz/onionsrv
 */

namespace OnionLib;

class Formate
{
	
	/**
	 * 
	 * @param int $pnValue
	 * @param int $pnDec
	 * @param bool $pbRound
	 * @return string
	 */
	public static function currenceFormat ($pnValue, $pnDec = 2, $pbRound = false)
	{
		preg_match("/([\d\.,]+)/", $pnValue, $laValue);
		$lsValue = preg_replace("/,/", "", $laValue[0]);
		
		if ($pbRound)
		{
			$lsValue = round($lsValue, $pnDec);
		}
		
		$laValue = explode(".", $lsValue);
		$lsInt = $laValue[0];
		$lsDec = isset($laValue[1]) ? $laValue[1] : "00";
		
		$laInt = str_split($lsInt);
		$lsIntX = "";
		
		if (is_array($laInt))
		{
			$laInt = array_reverse($laInt);
			$lsPonto = "";
			$lnCount = 0;
			
			foreach ($laInt as $lnV)
			{
				$lsIntX .= $lsPonto . $lnV;
				$lnCount ++;
				$lsPonto = "";
				
				if ($lnCount == 3)
				{
					$lsPonto = ".";
					$lnCount = 0;
				}
			}
			
			$laValueX = str_split($lsIntX);
			$laValueX = array_reverse($laValueX);
			$lsInt = implode("", $laValueX);
			
			$lsValue = $lsInt . "," . substr($lsDec, 0, $pnDec);
		}
		
		return $lsValue;
	}

	
	/**
	 * 
	 * @param string $psTelefone
	 * @return string
	 */
	public static function formatarTelefone ($psTelefone)
	{
		$psTelefone = self::formatPhone($psTelefone);
		
		if (strlen($psTelefone) >= 12 && substr($psTelefone, 0, 2) == "55")
		{
			$psTelefone = substr($psTelefone, 2, strlen($psTelefone));
		}
		
		if (substr($psTelefone, 0, 4) == "0800")
		{
			$psTelefone = substr($psTelefone, 0, 4) . "-" . substr($psTelefone, 4, 3) . "-" . substr($psTelefone, 7, 4);
		}
		else 
			if (strlen($psTelefone) == 10)
			{
				$psTelefone = "(" . substr($psTelefone, 0, 2) . ") " . substr($psTelefone, 2, 4) . "-" . substr($psTelefone, 6, 4);
			}
		
		return $psTelefone;
	}
	
	
	/**
	 * Limpa e adiciona o nono digito caso ainda não tenha
	 *
	 * @param string $psNumber
	 * @param string $psCarrier
	 * @return string|null
	 */
	public static function validPhone ($psNumber, $psCarrier = "")
	{
		$lsNumber = preg_replace("/[^0-9]/", "", $psNumber);
		
		if (strlen($lsNumber) == 11 || strlen($lsNumber) == 10)
		{
			$lsDDD = substr($lsNumber, 0, 2);
		
			$la9Digit = array(
				11 => 1,
				12 => 1,
				13 => 1,
				14 => 1,
				15 => 1,
				16 => 1,
				17 => 1,
				18 => 1,
				19 => 1,
				21 => 1,
				22 => 1,
				24 => 1,
				27 => 1,
				28 => 1,
				31 => 1,
				32 => 1,
				33 => 1,
				34 => 1,
				35 => 1,
				37 => 1,
				38 => 1,
				71 => 1,
				73 => 1,
				74 => 1,
				75 => 1,
				77 => 1,
				79 => 1,
				81 => 1,
				82 => 1,
				83 => 1,
				84 => 1,
				85 => 1,
				86 => 1,
				87 => 1,
				88 => 1,
				89 => 1,
				91 => 1,
				92 => 1,
				93 => 1,
				94 => 1,
				95 => 1,
				96 => 1,
				97 => 1,
				98 => 1,
				99 => 1
			);
		
			if (isset($la9Digit[$lsDDD]))
			{
				$lsNumber = substr($lsNumber, 2);
				$ls9 = '';
					
				if (strlen($lsNumber) == 8)
				{
					$ls9 = '9';
				}
					
				$lsNumber = $psCarrier . $lsDDD . $ls9 . $lsNumber;
			}
			else
			{
				$lsNumber = $psCarrier . $lsNumber;
			}
			
			return $lsNumber;
		}
			
		return null;
	}
	
	
	/**
	 * Transforma valor monetário para formato americano ou computacional
	 * usando o ponto como divisor de decimal
	 * 
	 * @param string $psValue
	 * @return string
	 */
	public static function cleanCurrence ($psValue)
	{
		preg_match("/([\d\.,-]+)/", $psValue, $laValue);
		$lsValue = 0;
	
		if (is_array($laValue))
		{
			$lsValue = preg_replace("/\./", "", $laValue[0]);
			$lsValue = preg_replace("/,/", ".", $lsValue);
		}
	
		return $lsValue;
	}
	
	
	/**
	 * Limpa ou formata CNPJ
	 * 
	 * @param string $psRegistry
	 * @param number $pnType (0 limpa, 1 formata)
	 * @return string
	 */
	public static function formatCompanyRegistry ($psRegistry, $pnType = 0)
	{
		switch ($pnType)
		{
			case 1:
				return preg_replace('/^([0-9]{2})([0-9]{3})([0-9]{3})([0-9]{4})([0-9]{2})$/', '$1.$2.$3/$4-$5', $psRegistry);
				break;
			default:
				return preg_replace("/[^0-9]/", "", $psRegistry);
		}
	}
	
	
	/**
	 * Limpa ou formata CPF
	 * 
	 * @param string $psId
	 * @param number $pnType (0 limpa, 1 formata)
	 * @return string
	 */
	public static function formatCitizenId ($psId, $pnType = 0)
	{
		switch ($pnType)
		{
			case 1:
				return preg_replace('/^([0-9]{3})([0-9]{3})([0-9]{3})([0-9]{2})$/', '$1.$2.$3-$4', $psId);
				break;
			default:
				return preg_replace("/[^0-9]/", "", $psId);
		}
	}
	
	
	/**
	 * Valida CPF retornando true ou false
	 * 
	 * @param string $psCpf
	 * @return boolean
	 */
	public static function validCPF ($psCpf = null)
	{
		$laCpfFalse = array(
			'00000000000' => false,
			'11111111111' => false,
			'22222222222' => false,
			'33333333333' => false,
			'44444444444' => false,
			'55555555555' => false,
			'66666666666' => false,
			'77777777777' => false,
			'88888888888' => false,
			'99999999999' => false,
		);
	
		// Verifica se um número foi informado
		if (empty($psCpf))
		{
			return false;
		}
	
		// Elimina possivel mascara
		$psCpf = preg_replace('/[^0-9]/', '', $psCpf);
		$psCpf = str_pad($psCpf, 11, '0', STR_PAD_LEFT);
			
		// Verifica se o numero de digitos informados é igual a 11
		if (strlen($psCpf) != 11)
		{
			return false;
		}
		// Verifica se nenhuma das sequências invalidas abaixo foi digitada. Caso afirmativo, retorna falso
		else if (isset($laCpfFalse[$psCpf]))
		{
			return false;
		}
		else // Calcula os digitos verificadores para verificar se o CPF é válido
		{
			for ($lnT = 9; $lnT < 11; $lnT++)
			{
				for ($lnD = 0, $lnC = 0; $lnC < $lnT; $lnC++)
				{
					$lnD += $psCpf{$lnC} * (($lnT + 1) - $lnC);
				}
	
				$lnD = ((10 * $lnD) % 11) % 10;
	
				if ($psCpf{$lnC} != $lnD)
				{
					return false;
				}
			}
	
			return true;
		}
	}
	
	
	/**
	 * Limpa ou formata um numero telefonico
	 * 
	 * @param string $psPhone
	 * @param number $pnType (0 limpa, 1 formata)
	 * @return string
	 */
	public static function formatPhone ($psPhone, $pnType = 0)
	{
		switch ($pnType)
		{
			case 1:
				return preg_replace('/^([0-9]{2})([0-9]{4,5})([0-9]{4})$/', '($1) $2-$3', $psPhone);
				break;
			default:
				return preg_replace("/[^0-9]/", "", $psPhone);
		}
	}
}