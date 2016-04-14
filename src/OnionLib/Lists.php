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

class Lists
{

	/**
	 * 
	 * @param string $psEstado
	 * @return string
	 */
	public static function retornaSigla ($psEstado)
	{
		if (strlen($psEstado) == 2)
		{
			return strtoupper($psEstado);
		}
		else
		{
			$laSigla = array(
				"ACRE" => "AC",
				"ALAGOAS" => "AL",
				"AMAZONAS" => "AM",
				"AMAPA" => "AP",
				"BAHIA" => "BA",
				"CEARA" => "CE",
				"DISTRITO FEDERAL" => "DF",
				"ESPIRITO SANTO" => "ES",
				"GOIAS" => "GO",
				"MARANHAO" => "MA",
				"MATO GROSSO" => "MT",
				"MATO GROSSO DO SUL" => "MS",
				"MINAS GERAIS" => "MG",
				"PARA" => "PA",
				"PARAIBA" => "PB",
				"PARANA" => "PR",
				"PERNAMBUCO" => "PE",
				"PIAUI" => "PI",
				"RIO DE JANEIRO" => "RJ",
				"NORTH RIO GRANDE" => "RN",
				"RIO GRANDE DO NORTE" => "RN",
				"SOUTH RIO GRANDE" => "RS",
				"RIO GRANDE DO SUL" => "RS",
				"RONDONIA" => "RO",
				"RORAIMA" => "RR",
				"SANTA CATARINA" => "SC",
				"SAO PAULO" => "SP",
				"SERGIPE" => "SE",
				"TOCANTINS" => "TO"
			);
			
			return $laSigla[strtoupper($psEstado)];
		}
	}

	
	/**
	 *
	 * @return array
	 */
	public static function getEstadosBrasil ()
	{
		return array(
			"" => "Selecione um estado",
			"AC" => "Acre",
			"AL" => "Alagoas",
			"AM" => "Amazonas",
			"AP" => "Amapá",
			"BA" => "Bahia",
			"CE" => "Ceará",
			"DF" => "Distrito Federal",
			"ES" => "Espírito Santo",
			"GO" => "Goiás",
			"MA" => "Maranhão",
			"MT" => "Mato Grosso",
			"MS" => "Mato Grosso do Sul",
			"MG" => "Minas Gerais",
			"PA" => "Pará",
			"PB" => "Paraíba",
			"PR" => "Paraná",
			"PE" => "Pernambuco",
			"PI" => "Piauí",
			"RJ" => "Rio de Janeiro",
			"RN" => "Rio Grande do Norte",
			"RS" => "Rio Grande do Sul",
			"RO" => "Rondônia",
			"RR" => "Roraima",
			"SC" => "Santa Catarina",
			"SP" => "São Paulo",
			"SE" => "Sergipe",
			"TO" => "Tocantins"
		);
	}

	
	/**
	 *
	 * @return array
	 */
	public static function getBancosBrasil ()
	{
		return array(
			"000" => "Controle Interno",
			"001" => "Banco do Brasil S/A",
			"002" => "Banco Central do Brasil",
			"003" => "Banco da Amazonia S/A",
			"004" => "Banco do Nordeste do Brasil S/A",
			"008" => "Banco Santander Meridional S/A",
			"021" => "BANESTES S/A - Banco Est.Esp.Santo",
			"022" => "CREDIREAL",
			"024" => "Banco de Pernambuco S/A - BANDEPE",
			"025" => "Banco Alfa S/A",
			"027" => "Banco Estado Santa Catarina S/A",
			"028" => "BANEB",
			"029" => "Banco BANERJ S/A",
			"030" => "PARAIBAN - Banco da Paraiba S/A",
			"031" => "Banco BEG S/A",
			"033" => "Banco Est.São Paulo S/A - BANESPA",
			"034" => "Banco BEA S/A",
			"035" => "Banco do Estado do Cear  S/A - BEC",
			"036" => "Banco do Estado do Maranhão S/A",
			"037" => "Banco do Estado do Par  S/A",
			"038" => "Banco BANESTADO S/A",
			"039" => "Banco do Estado do Piaui S/A",
			"040" => "Banco Cargill S/A",
			"041" => "Banco Est. Rio Grande do Sul S/A",
			"044" => "Banco BVA S/A",
			"045" => "Banco OPPORTUNITY S/A",
			"047" => "Banco Est. de Sergipe S/A",
			"048" => "Banco BENGE S/A",
			"063" => "IBIBANK S/A - Banco Multiplo",
			"065" => "LEMON BANK Banco Multiplo S/A",
			"066" => "Banco MORGAN S. D. Witter S/A",
			"067" => "Banco BANEB S/A",
			"068" => "Banco BEA S/A",
			"070" => "BRB-Banco de Brasilia S/A",
			"104" => "Caixa Economica Federal",
			"106" => "Banco Itabanco S/A",
			"107" => "Banco BBM S/A",
			"109" => "CREDIBANCO S/A",
			"116" => "Banco BNL do Brasil S/A",
			"148" => "Bank Of America Brasil S/A(BM)",
			"151" => "Banco Nossa Caixa S/A",
			"175" => "Banco Finasa S/A",
			"184" => "Banco BBA Creditanstalt S/A",
			"204" => "BCO Inter American Express S/A",
			"208" => "Banco Pactual S/A",
			"210" => "DRESDNER Bank Lateinamerika A.",
			"212" => "Banco Matone S/A",
			"213" => "Banco ARBI S/A",
			"214" => "Banco DIBENS S/A",
			"215" => "Banco Com e Invest Sudameris",
			"216" => "Banco Regional MALCON S/A",
			"217" => "Banco JOHN DEERE S/A",
			"218" => "Banco Bonsucesso S/A",
			"219" => "Banco ZOGBI S/A",
			"222" => "BCO Credit Lyonnais Brasil S/A",
			"224" => "Banco Fibra S/A",
			"225" => "Banco Brascan S/A",
			"229" => "Banco Cruzeiro do Sul S/A",
			"230" => "Banco Bandeirantes S/A",
			"231" => "Banco Boavista interatlantico S/A",
			"233" => "Banco GE Capital S/A",
			"237" => "Banco Bradesco S/A",
			"240" => "Banco de Credito Real de M.G. S/A",
			"241" => "Banco Classico S/A",
			"243" => "Banco STOCK Maxima S/A",
			"244" => "Banco Cidade S/A",
			"246" => "Banco ABC-Brasil S/A",
			"247" => "UBS WARBURG S/A",
			"249" => "Banco Investcred UNIBANCO S/A",
			"250" => "Banco SCHAHIN S/A",
			"252" => "Banco FININVEST S/A",
			"254" => "PARANA Banco S/A",
			"263" => "Banco CACIQUE S/A",
			"265" => "Banco Fator S/A",
			"266" => "Banco Cedula S/A",
			"275" => "Banco ABN AMRO Real S/A",
			"291" => "Banco de Cred. Nacional S/A",
			"294" => "BCR",
			"300" => "Banco de LA Nacion Argentina",
			"318" => "Banco BMG S/A",
			"320" => "Banco Ind. e Com. S/A",
			"341" => "Banco Itau S/A",
			"346" => "Banco BFB",
			"347" => "Banco Sudameris Brasil S/A",
			"351" => "Banco Bozano Simonsen S/A",
			"353" => "Banco Santander S/A",
			"356" => "Banco ABN AMRO S/A",
			"366" => "Banco Societe Generale Bras. S/A",
			"370" => "Banco Westlb do Brasil S/A",
			"376" => "Banco CHASE Manhattan S/A",
			"389" => "Banco Mercantil do Brasil S/A",
			"392" => "Banco Mercantil de Sao Paulo S/A",
			"394" => "Banco BMC S/A",
			"399" => "HSBC Bank Brasil S/A (BM)",
			"409" => "Unibanco Uniao de Bancos Bras. S/A",
			"412" => "Banco Capital S/A",
			"422" => "Banco Safra S/A",
			"424" => "Banco Santander Nordeste S/A",
			"453" => "Banco Rural S/A",
			"456" => "Banco de Tokio Mitsubishi BR S/A",
			"464" => "Banco Sumitomo Mitsui Bras. S/A",
			"472" => "LLOYDS Bank PLC",
			"473" => "Banco Financial Portugues S/A",
			"477" => "Banco Citibank N/A",
			"479" => "Bankboston Banco M Ltiplo S/A",
			"487" => "Deutsche Bank S/A- Banco Alemão",
			"488" => "Morgan G. Trust Companyof NY",
			"492" => "ING Bank N. V.",
			"493" => "Banco Union - Brasil S/A",
			"494" => "Banco de La Rep. Or.Del Uruguai",
			"495" => "Banco de La Provinc.Buenos Aires",
			"496" => "Banco Uno-E Brasil S/A",
			"505" => "Banco Credit S. F. Boston S/A",
			"600" => "Banco Luso Brasileiro S/A",
			"604" => "Banco Industrial Brasileiro S/A",
			"610" => "Banco VR S/A",
			"611" => "Banco Paulista S/A",
			"612" => "Banco Guanabara S/A",
			"613" => "Banco Pecunia S/A<",
			"623" => "Banco Panamericano S/A",
			"626" => "Banco FICSA S/A",
			"630" => "Banco Intercap S/A",
			"633" => "Banco Rendimento S/A",
			"634" => "Banco Triangulo S/A",
			"637" => "Banco SOFISA S/A",
			"638" => "Banco Prosper S/A",
			"641" => "Banco Bilbao Vizc.Arg.Brasil S/A",
			"643" => "Banco Pine S/A",
			"650" => "Banco PEBB S/A",
			"652" => "Banco Frances e Brasileiro S/A",
			"653" => "Banco Indusval S/A",
			"654" => "Banco A. J. RENNER S/A",
			"655" => "Banco Votorantim S/A",
			"702" => "Banco Santos S/A",
			"707" => "Banco Daycoval S/A",
			"719" => "Banco Banif Primus S/A",
			"721" => "Banco Credibel S/A",
			"733" => "Banco das Nacoes S/A",
			"734" => "Banco Gerdau S/A",
			"735" => "Banco Pottencial S/A",
			"738" => "Banco Morada S/A",
			"739" => "Banco BGN S/A",
			"740" => "Banco BARCLAYS S/A",
			"741" => "Banco Ribeirão Preto S/A",
			"743" => "Banco Emblema S/A",
			"744" => "Bankboston N.A.",
			"745" => "Banco Citibank S/A",
			"746" => "Banco Modal S/A",
			"747" => "Banco Rabobank INT Brasil S/A",
			"748" => "Banco Coop. Sic. S/A BANSICREDI",
			"749" => "BR Banco Mercantil S/A",
			"751" => "DRESDNER Bank Brasil S/A (BM)",
			"752" => "Banco BNP Paribas Brasil S/A",
			"753" => "Banco Comercial Uruguai S/A",
			"756" => "Banco Cooperativo do Brasil S/A",
			"757" => "Banco KEB do Brasil S/A"
		);
	}
}