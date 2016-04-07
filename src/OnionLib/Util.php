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

class Util
{
	/**
	 *
	 * @param
	 *        	string &$psSubject
	 * @param string $psPattern        	
	 * @param string $psReplace        	
	 * @param string $psMod        	
	 * @return void
	 */
	public static function parse (&$psSubject, $psPattern, $psReplace, $psMod = "")
	{
		$lsP = "/" . $psPattern . "/" . $psMod;
		$psSubject = preg_replace($lsP, $psReplace, $psSubject);
	}

	/**
	 *
	 * @param string $psCookie_name        	
	 * @param string $psCookie_value        	
	 * @param int $pnTempo        	
	 */
	public static function storeCookie ($psCookie_name, $psCookie_value, $pnTempo)
	{
		setcookie("$psCookie_name", "$psCookie_value", "$pnTempo", "$SCRIPT_FILENAME", "$HTTP_HOST");
	}

	/**
	 *
	 * @return number
	 */
	public static function getMicrotime ()
	{
		list ($lnUsec, $lnSec) = explode(" ", microtime());
		return ((float) $lnUsec + (float) $lnSec);
	}

	/**
	 * Setar data no formato para inserção no BD
	 *
	 * @param string $psData        	
	 */
	public static function setDateBD ($psData)
	{
		$lsData = implode("-", array_reverse(explode("/", $psData)));
		return $lsData;
	}

	/**
	 * Verifica se o valor de uma variável é true ou false e retorna booleano
	 *
	 * @param string|int|boolean $psVar        	
	 * @return boolean
	 */
	public static function toBoolean ($psVar)
	{
		if ($psVar === "0" || $psVar === 0 || $psVar === false || $psVar === "false" || $psVar === "")
		{
			return false;
		}
		else
		{
			return true;
		}
	}
}