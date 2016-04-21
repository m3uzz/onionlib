<?php
/**
 * This file is part of Onion Library
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
 * @package    OnionLib
 * @author     Humberto Lourenço <betto@m3uzz.com>
 * @copyright  2014-2016 Humberto Lourenço <betto@m3uzz.com>
 * @license    http://www.opensource.org/licenses/BSD-3-Clause  The BSD 3-Clause License
 * @link       http://github.com/m3uzz/onionlib
 */

namespace OnionLib;

class String
{
	
	/**
	 * 
	 * @param string $psString
	 * @return string
	 */
	public static function clearStringToUrl ($psString)
	{
		$a = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿŔŕ/,._!"\'@#$%&*()+=[]{}~ºª;:><|\\';
		$b = 'aaaaaaaceeeeiiiidnoooooouuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr                              ';
		$psString = utf8_decode($psString);
		$psString = strtr($psString, utf8_decode($a), $b);
		$psString = trim($psString);
		$psString = preg_replace('/\s\s*/', '-', $psString);
		
		return $psString = strtolower($psString);
	}

	
	/**
	 * 
	 * @param string $a
	 * @return string
	 */
	public static function cyrStrToLower ($a)
	{
		// Função não se enquadra no encode ISO-8859-1. Utilizar
		// preferencialmente a função strtolower_iso8859_1
		$offset = 32;
		$m = array();
		
		for ($lnIdx = 192; $lnIdx < 224; $lnIdx ++)
		{
			$m[chr($lnIdx)] = chr($lnIdx + $offset);
		}
		
		return strtr($a, $m);
	}

	
	/**
	 * 
	 * @param string $psString
	 * @return string
	 */
	public static function strToLowerIso8859_1 ($psString)
	{
		$lnLength = strlen($psString);
		
		while ($lnLength > 0)
		{
			-- $lnLength;
			$c = ord($psString[$lnLength]);
			
			if (($c & 0xC0) == 0xC0)
			{
				// two most significante bits on
				if (($c != 215) and ($c != 223))
				{
					// two chars OK as is to get lowercase set 3. most
					// significante bit if needed:
					$psString[$lnLength] = chr($c | 0x20);
				}
			}
		}
		
		return strtolower($psString);
	}

	
	/**
	 * 
	 * @param string $psWord
	 * @return string
	 */
	public static function clearSignals ($psWord)
	{
		$laReplace = array(
			"\"" => "",
			"'" => "",
			"$" => "",
			"\\" => "",
			"/" => "",
			"#" => "",
			"!" => "",
			"%" => "",
			"&" => "",
			"*" => "",
			"(" => "",
			")" => "",
			"-" => "",
			"_" => "",
			"=" => "",
			"`" => "",
			"[" => "",
			"]" => "",
			"{" => "",
			"}" => "",
			"^" => "",
			"~" => "",
			"+" => "",
			"<" => "",
			">" => "",
			"," => "",
			"." => "",
			";" => "",
			":" => "",
			"?" => "",
			"|" => "",
			"@" => ""
		);
		
		return strtr($psWord, $laReplace);
	}

	
	/**
	 * 
	 * @param string $psWord
	 * @return string
	 */
	public static function removeAccentuation ($psWord)
	{
		$laReplace = array(
			"à" => "a",
			"â" => "a",
			"á" => "a",
			"ä" => "a",
			"ã" => "a",
			"À" => "A",
			"Â" => "A",
			"Á" => "A",
			"Ä" => "A",
			"Ã" => "A",
			"É" => "E",
			"Ê" => "E",
			"é" => "e",
			"ê" => "e",
			"Ü" => "U",
			"Í" => "I",
			"í" => "i",
			"Ú" => "U",
			"ú" => "u",
			"ü" => "u",
			"Ó" => "O",
			"Ô" => "O",
			"Õ" => "O",
			"ó" => "o",
			"ô" => "o",
			"õ" => "o"
		);
		
		return strtr($psWord, $laReplace);
	}

	
	/**
	 *
	 * @param string $lsStr        	
	 * @return string
	 */
	public static function removeISOAccentuation ($psStr)
	{
		$lsAux = self::strToLowerIso8859_1($psStr);
		
		for ($lnIdx = 0; $lnIdx < strlen($psStr); $lnIdx ++)
		{
			if ($lsAux[$lnIdx] == "á" || $lsAux[$lnIdx] == "à" || $lsAux[$lnIdx] == "ã" || $lsAux[$lnIdx] == "â" || $lsAux[$lnIdx] == "ä")
			{
				$lsAux[$lnIdx] = "a";
			}
			elseif ($lsAux[$lnIdx] == "é" || $lsAux[$lnIdx] == "ê" || $lsAux[$lnIdx] == "è")
			{
				$lsAux[$lnIdx] = "e";
			}
			elseif ($lsAux[$lnIdx] == "í" || $lsAux[$lnIdx] == "ì")
			{
				$lsAux[$lnIdx] = "i";
			}
			elseif ($lsAux[$lnIdx] == "õ" || $lsAux[$lnIdx] == "ó" || $lsAux[$lnIdx] == "ô" || $lsAux[$lnIdx] == "ö" || $lsAux[$lnIdx] == "ò")
			{
				$lsAux[$lnIdx] = "o";
			}
			elseif ($lsAux[$lnIdx] == "ú" || $lsAux[$lnIdx] == "ü" || $lsAux[$lnIdx] == "ù")
			{
				$lsAux[$lnIdx] = "u";
			}
			elseif ($lsAux[$lnIdx] == "ç")
			{
				$lsAux[$lnIdx] = "c";
			}
			elseif ($lsAux[$lnIdx] == "ñ")
			{
				$lsAux[$lnIdx] = "n";
			}
		}
		
		return $lsAux;
	}

	
	/**
	 * 
	 * @param array $paDados
	 * @return array
	 */
	public static function multArrayUtf8Decode ($paDados)
	{
		if (is_array($paDados))
		{
			foreach ($paDados as $lsCampo => $lsValor)
			{
				$paDados[$lsCampo] = self::multArrayUtf8Decode($lsValor);
			}
		}
		else
		{
			$lsEncode = mb_detect_encoding($paDados . 'x', 'UTF-8, ISO-8859-1');
			
			if ($lsEncode == 'UTF-8')
			{
				$paDados = iconv("UTF-8", "ISO-8859-1//TRANSLIT", $paDados);
			}
			else
			{
				$paDados = iconv("ISO-8859-1", "ISO-8859-1//TRANSLIT", $paDados);
			}
		}
		
		return $paDados;
	}
	

	/**
	 * Tratamento de entrada de dados para o mysql
	 *
	 * @param string $psString  
	 * @return string      	
	 */
	public static function escapeString ($psString)
	{
		$laSearch = array(
			"\\",
			"\0",
			"\n",
			"\r",
			"\x1a",
			"'",
			'"'
		);
		$laReplace = array(
			"\\\\",
			"\\0",
			"\\n",
			"\\r",
			"\Z",
			"\'",
			'\"'
		);
		
		return str_replace($laSearch, $laReplace, $psString);
	}


	/**
	 * 
	 * @param string $psString
	 * @return string
	 */
	public static function unHtmlEntities ($psString)
	{
		// replace numeric entities
		$psString = preg_replace('~&#x([0-9a-f]+);~ei', 'chr(hexdec("\\1"))', $psString);
		$psString = preg_replace('~&#([0-9]+);~e', 'chr("\\1")', $psString);
		
		// replace literal entities
		$laTransTbl = get_html_translation_table(HTML_ENTITIES);
		$laTransTbl = array_flip($laTransTbl);
		
		return strtr($psString, $laTransTbl);
	}
	
	
	/**
	 *
	 * @param string $psStr
	 * @param number $pnLen
	 * @return string
	 */
	public static function tagGenerator ($psStr, $pnLen = 10)
	{
		$laReplace = array(
			"\"" => "",
			"'" => "",
			"\$" => "",
			"\\" => "",
			"/" => "",
			"#" => "",
			"!" => "",
			"%" => "",
			"&" => "",
			"*" => "",
			"(" => "",
			")" => "",
			"_" => "",
			"=" => "",
			"`" => "",
			"~" => "",
			"[" => "",
			"]" => "",
			"{" => "",
			"}" => "",
			"^" => "",
			"<" => "",
			">" => "",
			"," => "",
			"." => "",
			";" => "",
			":" => "",
			"?" => "",
			"|" => "",
			"@" => "",
			" +" => " ",
			" -" => " "
		);
	
		//$psStr = self::unHtmlEntities($psStr);
		$psStr = strtr($psStr, $laReplace);
		$psStr = substr($psStr, "0", $pnLen);
		$psStr = self::removeAccentuation($psStr);
		$psStr = trim($psStr);
	
		$psStr = preg_replace(array(
			"/[\s]+/"
		), array(
			" "
		), $psStr);
	
		
		$psStr = strtoupper(str_replace(' ', '-', $psStr));
	
		return $psStr;
	}
	
	
	/**
	 *
	 * @param string $psString
	 * @return string
	 */
	public static function lcfirst ($psString)
	{
		$lsString = String::slugfy($psString);
		$laArray = explode("-", $lsString);
	
		if (is_array($laArray))
		{
			$lsString = $laArray[0];
			unset($laArray[0]);
				
			foreach($laArray as $lsValue)
			{
				$lsString .= ucfirst($lsValue);
			}
		}
	
		return $lsString;
	}
	
	
	/**
	 * 
	 * @param string $psText
	 * @return number
	 */
	public static function slugfy ($psText)
	{
		$psText = self::removeAccentuation($psText);
		$psText = preg_replace("/[^A-Za-z]/", "", $psText);
		$psText = preg_replace("/([A-Z])/", " $1", $psText);
		$psText = preg_replace("/\s\s/", " ", $psText);
		$psText = preg_replace("/\s/", "-", trim($psText));
		
		return strtolower($psText);
	}
}