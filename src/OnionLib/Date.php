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

class Date
{

	/**
	 * Retorna um formato de data solicitado
	 *
	 * @param string $psDate data no formato Y/m/d (H|h):i:s ou Y-m-d (H|h):i:s
	 * @param int $pnType indicação de formato de retorno, padrão 0 d/m/Y -
	 *        	H:i:s
	 * @return string
	 */
	public static function getDateTimeFormatPtBr ($psDate, $pnType = 0)
	{
		$lnDia = (int) substr($psDate, 8, 2);
		$lnMes = (int) substr($psDate, 5, 2);
		$lnAno = substr($psDate, 0, 4);
		$lsHora = substr($psDate, 11, 8);
		
		switch ($pnType)
		{
			case 1: // d/m/Y
				return $lnDia . "/" . $lnMes . "/" . $lnAno;
			break;
			case 2: // H:i:s
				return $lsHora;
			break;
			case 3: // d de M de Y
				$lsMes = self::getMonthNamePtBr($lnMes);
				return $lnDia . " de " . $lsMes . " de " . $lnAno;
			break;
			case 4: // d de m de Y
				$lsMes = self::getMonthNamePtBr($lnMes, 2);
				return $lnDia . " de " . $lsMes . " de " . $lnAno;
			break;
			case 5: // d/m
				return $lnDia . "/" . $lnMes;
			break;
			case 6: // d/m - H:i:s
				return $lnDia . "/" . $lnMes . ($lsHora ? " - " . $lsHora : "");
			break;
			case 7: // H:i
				return substr($lsHora, 0, 5);
			break;
			case 8:
				return $lnAno . "/" . $lnMes . "/" . $lnDia . ($lsHora ? " - " . $lsHora : "");
			break;
			default: // d/m/Y - H:i:s
				return $lnDia . "/" . $lnMes . "/" . $lnAno . ($lsHora ? " - " . $lsHora : "");
		}
	}

	
	/**
	 * Retorna o nome do mês em 3 formatos quando passado seu número
	 *
	 * @param int $pnMonth Número do mês no calendário
	 * @param int $pnType Formato: 0 = primeira letra; 1 = Abreviação 3 letras;
	 *        	2 =
	 *        padrão nome completo
	 *       
	 * @return string nome do mês
	 */
	public static function getMonthNamePtBr ($pnMonth, $pnType = 2)
	{
		$laMonths = array(
			array(
				"J",
				"Jan",
				"Janeiro"
			),
			array(
				"F",
				"Fev",
				"Fevereiro"
			),
			array(
				"M",
				"Mar",
				"Março"
			),
			array(
				"A",
				"Abr",
				"Abril"
			),
			array(
				"M",
				"Mai",
				"Maio"
			),
			array(
				"J",
				"Jun",
				"Junho"
			),
			array(
				"J",
				"Jul",
				"Julho"
			),
			array(
				"A",
				"Ago",
				"Agosto"
			),
			array(
				"S",
				"Set",
				"Setembro"
			),
			array(
				"O",
				"Out",
				"Outubro"
			),
			array(
				"N",
				"Nov",
				"Novembro"
			),
			array(
				"D",
				"Dez",
				"Dezembro"
			)
		);
		
		return $laMonths[$pnMonth - 1][$pnType];
	}

	
	/**
	 * Retorna o nome do mês em 3 formatos quando passado seu número
	 *
	 * @param int $pnMonth Número do mês no calendário
	 * @param int $pnType Formato: 0 = primeira letra; 1 = Abreviação 3 letras;
	 *        	2 =
	 *        padrão nome completo
	 *       
	 * @return string nome do mês
	 */
	public static function getMonthsPtBr ()
	{
		$laMonths = array(
			"1" => "Janeiro",
			"2" => "Fevereiro",
			"3" => "Março",
			"4" => "Abril",
			"5" => "Maio",
			"6" => "Junho",
			"7" => "Julho",
			"8" => "Agosto",
			"9" => "Setembro",
			"10" => "Outubro",
			"11" => "Novembro",
			"12" => "Dezembro"
		);
		
		return $laMonths;
	}

	
	/**
	 * Retorna o nome da semana em 4 formatos quando passado seu número
	 *
	 * @param int $pnWeek Número da semana no calendário
	 * @param int $pnType Formato: 0 = primeira letra; 1 = Abreviação 3 letras;
	 *        	2 = nome
	 *        simples; 3 = padrão nome completo
	 *       
	 * @return string nome do mês
	 */
	public static function getWeekNamePtBr ($pnWeek, $pnType = 3)
	{
		$laMonths = array(
			array(
				"D",
				"Dom",
				"Domingo",
				"Domingo"
			),
			array(
				"S",
				"Seg",
				"Segunda",
				"Segunda-feira"
			),
			array(
				"T",
				"Ter",
				"Terça",
				"Terça-feira"
			),
			array(
				"Q",
				"Qua",
				"Quarta",
				"Quarta-feira"
			),
			array(
				"Q",
				"Qui",
				"Quinta",
				"Quinta-feira"
			),
			array(
				"S",
				"Sex",
				"Sexta",
				"Sexta-feira"
			),
			array(
				"S",
				"Sab",
				"Sábado",
				"Sábado"
			)
		);
		
		return $laMonths[$pnMonth - 1][$pnType];
	}

	
	/**
	 * Calcula e retornar a data de fechamento de um período de ciclo mensal
	 * (dia anterior ao corte até 23:59:59)
	 * Com o dia de início do período ($pnDay), é calculada a data um dia antes,
	 * levando em conta
	 * que os meses tem quantidade de dias diferentes, além de tratar o dia 1 do
	 * mês e do ano.
	 * Ou seja, se $pnDay for 1 o dia anterior pode ser 31, 30, 29 ou 28 além do
	 * ano que pode mudar se for 1 de janeiro.
	 *
	 * Ex.: se $pnDay for 10 e o $psDate ou a data atual for 2014-09-20 será
	 * retornado '2014-09-09 23:59:59'
	 *
	 * @param int $pnDay - dia de corte, dia no mês que define o início de um
	 *        	período
	 * @param string $psDate - data de referência, se null utiliza a data atual
	 *        	gerada por time()
	 * @return string
	 */
	public static function getPeriodEnd ($pnDay, $psDate = null)
	{
		if ($psDate == null)
		{
			$laToday = explode('-', date('Y-m-d', time()));
		}
		else
		{
			$laToday = explode('-', date('Y-m-d', strtotime($psDate)));
		}
		
		$lnDay = $laToday[2];
		
		if ($pnDay == 1 || $pnDay > $lnDay)
		{
			$lnMonth = ($laToday[1] > 1 ? $laToday[1] - 1 : 12);
			$lnYear = ($lnMonth == 12 ? $laToday[0] - 1 : $laToday[0]);
			$lnLastMonthTotalDays = date('t', strtotime("{$lnYear}-{$lnMonth}-01"));
		}
		else
		{
			$lnMonth = $laToday[1];
			$lnYear = $laToday[0];
			$lnLastMonthTotalDays = date('t', strtotime("{$lnYear}-{$lnMonth}-01"));
		}
		
		$lnDayBefore = $pnDay - 1;
		
		if ($lnDayBefore < 1)
		{
			$lsDate = sprintf('%d-%02d-%02d 23:59:59', $lnYear, $lnMonth, $lnLastMonthTotalDays);
		}
		else
		{
			$lsDate = sprintf('%d-%02d-%02d 23:59:59', $lnYear, $lnMonth, $lnDayBefore);
		}
		
		return $lsDate;
	}

	
	/**
	 * Calcular e retornar a data de início de um período de ciclo mensal
	 * (iniciando as 00:00:00)
	 *
	 * @param string $psDate - data a ser definida o dia do mês anterior
	 * @return string
	 */
	public static function getPeriodStart ($psDate, $pnDay)
	{
		$lnMonthEnd = date('m', strtotime($psDate));
		$lnMonthTotalDays = date('t', strtotime($psDate));
		$lnDay = date('d', strtotime($psDate));
		
		if ($pnDay == 1 && $lnDay == $lnMonthTotalDays)
		{
			$lnLastMonthTotalDays = $lnMonthTotalDays;
		}
		else
		{
			$laDate = explode("-", $psDate);
			$lnMonth = ($laDate[1] > 1 ? $laDate[1] - 1 : 12);
			$lnYear = ($lnMonth == 12 ? $laDate[0] - 1 : $laDate[0]);
			$lnLastMonthTotalDays = date('t', strtotime("{$lnYear}-{$lnMonth}-01"));
		}
		
		$lnMinus = 1;
		
		if ($lnMonthEnd == 2 && $lnLastMonthTotalDays < 30 && $pnDay == 1)
		{
			$lnMinus = 0;
		}
		elseif ($lnMonthEnd == 2 && $lnLastMonthTotalDays == 31 && ($pnDay == 28 || $pnDay == 29))
		{
			$lnMinus = 0;
		}
		elseif ($lnMonthEnd == 2 && $lnLastMonthTotalDays == 31 && $pnDay == 30 && $lnMonthTotalDays == 29)
		{
			$lnMinus = 0;
		}
		elseif ($lnMonthEnd == 2 && $lnLastMonthTotalDays == 31 && $pnDay == 31 && $lnMonthTotalDays == 28)
		{
			$lnMinus = 2;
		}
		elseif ($lnMonthEnd == 3 && $lnLastMonthTotalDays == 28 && $pnDay == 30)
		{
			$lnMinus = 0;
		}
		elseif ($lnMonthEnd == 3 && $lnLastMonthTotalDays == 28 && $pnDay == 31)
		{
			$lnMinus = - 1;
		}
		elseif ($lnMonthEnd == 3 && $lnLastMonthTotalDays == 28 && $pnDay < 28)
		{
			$lnMinus = 0;
		}
		elseif ($lnMonthEnd == 3 && $lnLastMonthTotalDays == 29 && $pnDay == 31)
		{
			$lnMinus = 0;
		}
		elseif ($lnMonthEnd == 3 && $lnLastMonthTotalDays == 29 && $pnDay < 28)
		{
			$lnMinus = 0;
		}
		
		$lsDate = date('Y-m-d 00:00:00', strtotime($psDate) - (($lnLastMonthTotalDays - $lnMinus) * 24 * 60 * 60));
		
		return $lsDate;
	}
}