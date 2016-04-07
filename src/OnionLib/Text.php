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

class Text
{
	
	/**
	 * Retorna a string com a quantidade de palavras desejadas, eliminando o
	 * restante
	 *
	 * @param string $psText
	 *        	string a ser analisada
	 * @param int $pnLimit
	 *        	número de palavras a retornar
	 * @return string
	 */
	public static function limitWords ($psText, $pnLimit)
	{
		$laWords = explode(" ", $psText);
		$lsString = "";
		
		for ($lnIdx = 0; ($lnIdx < count($laWords) && $lnIdx < $pnLimit); $lnIdx ++)
		{
			$lsString .= $laWords[$lnIdx] . " ";
		}
		
		return trim($lsString) . '...';
	}

	/**
	 * Retorna a string com o numero de caracteres desejados, mantendo as
	 * palavras inteiras;
	 *
	 * @param string $psText
	 *        	string a ser analisada
	 * @param int $pnSize
	 *        	número de caracteres a serem retornados
	 * @return string
	 */
	public static function limitChars ($psText, $pnSize)
	{
		if (strlen($psText) > 0)
		{
			if (strlen($psText) > intval($pnSize))
			{
				$lsTxt = substr($psText, 0, $pnSize) . '...';
				
				// Evitar que corte a palavra a meio
				$lnPosition = strrpos($psText, " ");
				
				if ($lnPosition !== false)
				{
					$psText = substr($lsTxt, 0, $lnPosition);
				}
			}
		}
		
		return trim($psText);
	}

	/**
	 * Trata string longa, quebrando em espaços e cortando de acordo com o
	 * tamanho da linha
	 *
	 * @param string $psTexto
	 *        	Texto a ser analisado
	 * @param int $pnLineSize
	 *        	Tamanho da linha em caracteres
	 *        	$param int $pnRows Numero de linhas
	 * @return string
	 */
	public static function previa ($psTexto, $pnLineSize, $pnRows = 1)
	{
		return self::cutString(self::lineBreak($psTexto, $pnLineSize), $pnLineSize * $pnRows);
	}

	/**
	 * Trata texto longo
	 *
	 * @param string $psTexto
	 *        	Texto a ser analisado
	 * @param int $pnLineSize
	 *        	Tamanho da linha em caracteres
	 * @return string
	 */
	public static function cutString ($psTexto, $pnLineSize)
	{
		$lnLineSize = $pnLineSize;
		
		if (strlen($psTexto) > $pnLineSize)
		{
			while ($psTexto[$pnLineSize] != " " && $pnLineSize > 5)
			{
				$pnLineSize --;
			}
			
			if ($pnLineSize == 0)
			{
				$pnLineSize = $lnLineSize;
			}
			
			$lsTexto = substr($psTexto, 0, $pnLineSize - 4) . " ...";
		}
		else
		{
			$lsTexto = $psTexto;
		}
		
		return $lsTexto;
	}

	/**
	 * Trata texto longo sem espaçamento
	 *
	 * @param string $psTexto
	 *        	Texto a ser analisado
	 * @param int $pnLineSize
	 *        	Tamanho da linha em caracteres
	 * @return string
	 */
	public static function lineBreak ($psTexto, $pnLineSize)
	{
		if (strlen($psTexto) > $pnLineSize)
		{
			$lsString = "";
			
			for ($x = 0; $x <= strlen($psTexto); $x = $x + $pnLineSize)
			{
				$lsLinha = substr($psTexto, $x, $pnLineSize);
				
				if (strstr($lsLinha, ' ') == '')
				{
					$lsLinha .= " ";
				}
				
				$lsString .= $lsLinha;
			}
			
			$psTexto = $lsString;
		}
		
		return $psTexto;
	}

	public static function linksTexto ($psTexto)
	{
		if (empty($psTexto))
		{
			return $psTexto;
		}
		
		$lsLinhas = split("\n", $psTexto);
		
		if (strpos($psTexto, "<html>"))
		{
			return $psTexto;
		}
		
		foreach ($lsLinhas as $lsLinha)
		{
			$lsLinha = eregi_replace("([ \t]|^)www.", " http://www.", $lsLinha);
			$lsLinha = eregi_replace("([ \t]|^)ftp.", " ftp://ftp.", $lsLinha);
			$lsLinha = eregi_replace("(http://[^ )\t\r\n]+)", "<a class=\"texto\" href=\"\\\\1\" target=\"_blank\">\\\\1</a>", $lsLinha);
			$lsLinha = eregi_replace("(https://[^ )\t\r\n]+)", "<a class=\"texto\" href=\"\\\\1\" target=\"_blank\">\\\\1</a>", $lsLinha);
			$lsLinha = eregi_replace("(ftp://[^ )\t\r\n]+)", "<a class=\"texto\" href=\"\\\\1\" target=\"_blank\">\\\\1</a>", $lsLinha);
			$lsLinha = eregi_replace("(^[-a-z0-9_]+(.[_a-z0-9-]+)*@([a-z0-9-]+(.[a-z0-9-_]+))$)", "<a class=\"texto\" href=\"mailto:\\\\1\">\\\\1</a>", $lsLinha);
			$lsNovoTexto .= $lsLinha . "\n";
		}
		
		return $lsNovoTexto;
	}
}