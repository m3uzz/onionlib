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

class SpellCheck
{

	public static function spellCheck ($psString, $psLink = null, $psTemplate = '<a href="#%LINK%#&q=#%QUERY%#">#%WORD%#</a>')
	{
		$psString = self::clearSignals($psString);
		$laWords = split(' ', $psString);
		
		$laSuggestions = array();
		
		foreach ($laWords as $lsValue)
		{
			$laSuggestions = pspell_suggest(pspell_new("pt"), $lsValue);
			
			if (count($laSuggestions) != 0)
			{
				foreach ($laSuggestions as $lsSuggestion)
				{
					if (! empty($lsSuggestion))
					{
						$laTmp = split(" ", $lsSuggestion);
						$lsTerm = substr($laTmp[4], 0, - 1);
						
						$lsTerm = self::removeAccentuation(strtolower($lsTerm));
						
						if (strtolower($lsValue) != strtolower($lsTerm))
						{
							$laTerm[$laTmp[1]] = substr($laTmp[4], 0, - 1);
							$lbCorrected = true;
						}
						else
						{
							$laTerm[$lsValue] = $lsValue;
						}
					}
				}
			}
		}
		
		if ($lbCorrected)
		{
			foreach ($laTerm as $lsOriginal => $lsSuggestion)
			{
				if (strtolower($lsOriginal) != strtolower($lsSuggestion))
				{
					$lsString .= "<strong>$lsSuggestion</strong> ";
				}
				else
				{
					$lsString .= "$lsSuggestion ";
				}
				
				$lsQuery .= "$lsSuggestion ";
			}
			
			$lsPattern = array(
				"/#%LINK%#/",
				"/#%QUERY%#/",
				"/#%WORD%#/"
			);
			
			$lsReplace = array(
				$psLink,
				$lsQuery,
				$lsString
			);
			
			$lsString = preg_replace($lsPattern, $lsReplace, $psTemplate);
		}
		
		return $lsString;
	}
}