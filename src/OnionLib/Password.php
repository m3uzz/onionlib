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

class Password
{
	
	/**
	 * 
	 * @return string
	 */
	public static function generateDynamicSalt ()
	{
		$lsDynamicSalt = '';
	
		for ($i = 0; $i < 50; $i ++)
		{
			$lsDynamicSalt .= chr(rand(33, 126));
		}
	
		return $lsDynamicSalt;
	}	

	
	/**
	 * 
	 * @param string $psPassword
	 * @param string $psDynamicSalt
	 * @param string $psStaticSalt
	 * @return string
	 */
	public static function encriptPassword ($psPassword, $psDynamicSalt, $psStaticSalt="aFGQ475SDsdfsaf2342")
	{
		$psPassword = md5($lsStaticSalt . $psPassword . $psDynamicSalt);
		
		return $psPassword;
	}

	
	/**
	 * geraSenha: gera uma senha aleatória de 6 digitos, contendo numeros e
	 * letras maiúsculas e minúsculas
	 *
	 * @return string
	 */
	public static function generatePassword ()
	{
		// Caracteres de cada tipo
		$lsLower = 'abcdefghijklmnopqrstuvwxyz';
		$lsUpper = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$lsNum = '1234567890';
		
		$lnRand = mt_rand(1, 26);
		$laReturn[] = $lsLower[$lnRand - 1];
		$lnRand = mt_rand(1, 26);
		$laReturn[] = $lsLower[$lnRand - 1];
		$lnRand = mt_rand(1, 26);
		$laReturn[] = $lsUpper[$lnRand - 1];
		$lnRand = mt_rand(1, 26);
		$laReturn[] = $lsUpper[$lnRand - 1];
		$lnRand = mt_rand(1, 10);
		$laReturn[] = $lsNum[$lnRand - 1];
		$lnRand = mt_rand(1, 10);
		$laReturn[] = $lsNum[$lnRand - 1];
		
		shuffle($laReturn);
		$lsReturn = implode("", $laReturn);
		
		return $lsReturn;
	}
}