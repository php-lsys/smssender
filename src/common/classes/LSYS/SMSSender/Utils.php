<?php
/**
 * lsys sms
 * @author     Lonely <shan.liu@msn.com>
 * @copyright  (c) 2017 Lonely <shan.liu@msn.com>
 * @license    http://www.apache.org/licenses/LICENSE-2.0
 */
namespace LSYS\SMSSender;
class Utils{
	/**
	 * check is china phone number
	 * @param string $mobile
	 * @return bool
	 */
	public static function chinaPhone($mobile){
		return preg_match("/^((13[0-9])|(14[5,7])|(15[0-3,5-9])|(17[0,3,5-8])|(18[0-9])|166|198|199|(147))\\d{8}$/i", $mobile);
	}
	/**
	 * get Country area code
	 * @return string[]
	 */
	public static function zone(){
		return array(
				"1"=>__("america"),//"美国"
				"1"=>__("canada"),//"加拿大",
				"1-264"=>__("anguilla"),//"安圭拉岛",
				"1-268"=>__("Antigua and barbuda"),//"安提瓜和巴布达",
				"1-242"=>__("the bahamas"),//"巴哈马",
				"1-246"=>__("barbados"),//"巴巴多斯",
				"1-441"=>__("bermuda"),//"百慕大",
				"1-284"=>__("the British Virgin islands"),//"英属维京群岛",
				"1-345"=>__("Cayman islands"),//"开曼群岛",
				"1-684"=>__("American Samoa"),//"美属萨摩亚",
				"1-767"=>__("Dominic"),//"多米尼克",
				"1-809"=>__("Republic of Dominica"),//"多米尼加共和国",
				"1-473"=>__("Grenada"),//"格林纳达",
				"1-876"=>__("Jamaica"),//"牙买加",
				"1-664"=>__("montserrat"),//"蒙特塞拉特",
				"1-787"=>__("Puerto Rico [787]"),//"波多黎各[787]",
				"1-939"=>__("Puerto Rico [939]"),//"波多黎各[939]",
				"1-869"=>__("Saint Kitts and nevis"),//"圣基茨和尼维斯",
				"1-758"=>__("lucia"),//"圣卢西亚",
				"1-784"=>__("Saint Vincent and the grenadines"),//"圣文森特和格林纳丁斯",
				"1-868"=>__("in Trinidad and Tobago"),//"特立尼达和多巴哥",
				"1-649"=>__("the Turks and Caicos islands"),//"特克斯和凯科斯群岛",
				"1-340"=>__("virgin islands"),//"美属维京群岛",
				"1-671"=>__("Guam"),//"关岛",
				"1-670"=>__("the Northern Mariana islands"),//"北马里亚纳群岛",
				"20"=>__("egypt"),//"埃及",
				"210"=>__("quasi distribution in Western sahara"),//"拟分配西撒哈拉",
				"211"=>__("South Sultan"),//"南苏丹",
				"212"=>__("Morocco"),//"摩洛哥",
				"213"=>__("Algeria"),//"阿尔及利亚",
				"216"=>__("tunisia"),//"突尼斯",
				"218"=>__("Libya"),//"利比亚",
				"220"=>__("Gambia"),//"冈比亚",
				"221"=>__("Senegal"),//"塞内加尔",
				"222"=>__("Mauritania"),//"毛里塔尼亚",
				"223"=>__("mali"),//"马里",
				"224"=>__("Guinea"),//"几内亚",
				"225"=>__("ivory coast"),//"科特迪瓦",
				"226"=>__("Burkina faso"),//"布基纳法索",
				"227"=>__("Niger"),//"尼日尔",
				"228"=>__("Togo"),//"多哥",
				"229"=>__("Benin"),//"贝宁",
				"230"=>__("Mauritius"),//"毛里求斯",
				"231"=>__("Liberia"),//"利比里亚",
				"232"=>__("Sierra leone"),//"塞拉利昂",
				"233"=>__("Garner"),//"加纳",
				"234"=>__("Nigeria"),//"尼日利亚",
				"235"=>__("chad"),//"乍得",
				"236"=>__("in the Central African republic"),//"中非共和国",
				"237"=>__("Cameroon"),//"喀麦隆",
				"238"=>__("Cape verde"),//"佛得角",
				"239"=>__("Sao Tome and principe"),//"圣多美和普林西比",
				"240"=>__("equatorial guinea"),//"赤道几内亚",
				"241"=>__("gabon"),//"加蓬",
				"242"=>__("Republic of Congo"),//"刚果共和国",
				"243"=>__("the Democratic Republic of the Congo"),//"刚果民主共和国",
				"244"=>__("Angola"),//"安哥拉",
				"245"=>__("guinea bissau"),//"几内亚比绍",
				"246"=>__("Diego Garcia"),//"迪戈加西亚",
				"247"=>__("ascension"),//"阿森松岛",
				"248"=>__("seychelles"),//"塞舌尔",
				"249"=>__("Sultan"),//"苏丹",
				"250"=>__("rwanda"),//"卢旺达",
				"251"=>__("Ethiopia"),//"埃塞俄比亚",
				"252"=>__("somalia"),//"索马里",
				"253"=>__("Djibouti"),//"吉布提",
				"254"=>__("Kenya"),//"肯尼亚",
				"255"=>__("Tanzania"),//"坦桑尼亚",
				"256"=>__("Uganda"),//"乌干达",
				"257"=>__("Burundi"),//"布隆迪",
				"258"=>__("Mozambique"),//"莫桑比克",
				"260"=>__("Zambia"),//"赞比亚",
				"261"=>__("Madagascar"),//"马达加斯加",
				"262"=>__("reunion"),//"留尼汪",
				"263"=>__("Zimbabwe"),//"津巴布韦",
				"264"=>__("Namibia"),//"纳米比亚",
				"265"=>__("malawi"),//"马拉维",
				"266"=>__("Lesotho"),//"莱索托",
				"267"=>__("Botswana"),//"博茨瓦纳",
				"268"=>__("Swaziland"),//"斯威士兰",
				"269"=>__("Comoros and mayotte"),//"科摩罗和马约特",
				"27"=>__("South africa"),//"南非",
				"290"=>__("helena"),//"圣赫勒拿",
				"291"=>__("eritrea"),//"厄立特里亚",
				"297"=>__("aruba"),//"阿鲁巴",
				"298"=>__("the Faroe islands"),//"法罗群岛",
				"299"=>__("greenland"),//"格陵兰",
				"30"=>__("greece"),//"希腊",
				"31"=>__("Holland"),//"荷兰",
				"32"=>__("belgium"),//"比利时",
				"33"=>__("france"),//"法国",
				"34"=>__("spain"),//"西班牙",
				"350"=>__("gibraltar"),//"直布罗陀",
				"351"=>__("portugal"),//"葡萄牙",
				"352"=>__("Luxemburg"),//"卢森堡",
				"353"=>__("ireland"),//"爱尔兰",
				"354"=>__("Iceland"),//"冰岛",
				"355"=>__("Albania"),//"阿尔巴尼亚",
				"356"=>__("Malta"),//"马耳他",
				"357"=>__("cyprus"),//"塞浦路斯",
				"358"=>__("Finland"),//"芬兰",
				"359"=>__("bulgaria"),//"保加利亚",
				"36"=>__("hungary"),//"匈牙利",
				"37"=>__("East germany"),//"东德",
				"370"=>__("Lithuania"),//"立陶宛",
				"371"=>__("Latvia"),//"拉脱维亚",
				"372"=>__("Estonia"),//"爱沙尼亚",
				"373"=>__("Moldova"),//"摩尔多瓦",
				"374"=>__("Armenia"),//"亚美尼亚",
				"375"=>__("Belarus"),//"白俄罗斯",
				"376"=>__("andorra"),//"安道尔",
				"377"=>__("Monaco"),//"摩纳哥",
				"378"=>__("San marino"),//"圣马力诺",
				"379"=>__("reserved for the vatican"),//"保留给梵蒂冈",
				"38"=>__("Yugoslavia"),//"南斯拉夫",
				"380"=>__("Ukraine"),//"乌克兰",
				"381"=>__("Serbia"),//"塞尔维亚",
				"382"=>__("montenegro"),//"黑山",
				"385"=>__("Croatia"),//"克罗地亚",
				"386"=>__("Slovenia"),//"斯洛文尼亚",
				"387"=>__("in Bosnia and herzegovina"),//"波黑",
				"389"=>__("macedonia"),//"马其顿",
				"39"=>__("Italy"),//"意大利",
				"40"=>__("Romania"),//"罗马尼亚",
				"41"=>__("switzerland"),//"瑞士",
				"42"=>__("Czechoslovakia"),//"捷克斯洛伐克",
				"420"=>__("Czech Republic"),//"捷克共和国",
				"421"=>__("Slovakia"),//"斯洛伐克",
				"423"=>__("lichtenstein"),//"列支敦士登",
				"43"=>__("Austria"),//"奥地利",
				"44"=>__("in britain"),//"英国",
				"45"=>__("denmark"),//"丹麦",
				"46"=>__("sweden"),//"瑞典",
				"47"=>__("Norway"),//"挪威",
				"48"=>__("Poland"),//"波兰",
				"49"=>__("germany"),//"德国",
				"500"=>__("the Falkland islands"),//"福克兰群岛",
				"501"=>__("Belize"),//"伯利兹",
				"502"=>__("guatemala"),//"危地马拉",
				"503"=>__("Salvatore"),//"萨尔瓦多",
				"504"=>__("Honduras"),//"洪都拉斯",
				"505"=>__("Nicaragua"),//"尼加拉瓜",
				"506"=>__("Costa rica"),//"哥斯达黎加",
				"507"=>__("Panama"),//"巴拿马",
				"508"=>__("Pierre and miquelon"),//"圣皮埃尔和密克隆群岛",
				"509"=>__("Haiti"),//"海地",
				"51"=>__("Peru"),//"秘鲁",
				"52"=>__("Mexico"),//"墨西哥",
				"53"=>__("cuba"),//"古巴",
				"54"=>__("Argentina"),//"阿根廷",
				"55"=>__("Brazil"),//"巴西",
				"56"=>__("chile"),//"智利",
				"57"=>__("Columbia"),//"哥伦比亚",
				"58"=>__("venezuela"),//"委内瑞拉",
				"590"=>__("guadeloupe"),//"瓜德罗普",
				"591"=>__("Bolivia"),//"玻利维亚",
				"592"=>__("Guyana"),//"圭亚那",
				"593"=>__("Ecuador"),//"厄瓜多尔",
				"594"=>__("French guiana"),//"法属圭亚那",
				"595"=>__("Paraguay"),//"巴拉圭",
				"596"=>__("Martinique"),//"马提尼克",
				"597"=>__("suriname"),//"苏里南",
				"598"=>__("Uruguay"),//"乌拉圭",
				"599"=>__("Netherlands Saint Martin"),//"荷属圣马丁",
				"599-9"=>__("Kuraso"),//"库拉索",
				"60"=>__("Malaysia"),//"马来西亚",
				"61"=>__("australia"),//"澳大利亚",
				"62"=>__("Indonesia"),//"印度尼西亚",
				"63"=>__("Philippines"),//"菲律宾",
				"64"=>__("new zealand"),//"新西兰",
				"65"=>__("singapore"),//"新加坡",
				"66"=>__("Thailand"),//"泰国",
				"670"=>__("East Timor"),//"东帝汶",
				"672"=>__("Australian overseas territory"),//"澳大利亚海外领地",
				"673"=>__("brunei"),//"文莱",
				"674"=>__("Nauru"),//"瑙鲁",
				"675"=>__("Papua new guinea"),//"巴布亚新几内亚",
				"676"=>__("tonga"),//"汤加",
				"677"=>__("Solomon islands"),//"所罗门群岛",
				"678"=>__("Vanuatu"),//"瓦努阿图",
				"679"=>__("fiji"),//"斐济",
				"680"=>__("palau"),//"帕劳",
				"681"=>__("Wallis and Futuna islands"),//"瓦利斯和富图纳群岛",
				"682"=>__("Cook islands"),//"库克群岛",
				"683"=>__("niue"),//"纽埃",
				"685"=>__("Samoa"),//"萨摩亚",
				"686"=>__("Kiribati, Gilbert islands"),//"基里巴斯，吉尔伯特群岛",
				"687"=>__("New Caledonia"),//"新喀里多尼亚",
				"688"=>__("Tuvalu, Ellis islands"),//"图瓦卢，埃利斯群岛",
				"689"=>__("French polynesia"),//"法属波利尼西亚",
				"690"=>__("tokelau"),//"托克劳群岛",
				"691"=>__("micronesia"),//"密克罗尼西亚联邦",
				"692"=>__("Marshall islands"),//"马绍尔群岛",
				"7"=>__("Russia, Kazakhstan"),//"俄罗斯、哈萨克斯坦",
				"81"=>__("in japan"),//"日本",
				"82"=>__("South korea"),//"韩国",
				"84"=>__("vietnam"),//"越南",
				"850"=>__("North korea"),//"朝鲜",
				"852"=>__("the Hongkong special administrative region"),//"香港特别行政区",
				"853"=>__("the Macao special administrative region"),//"澳门特别行政区",
				"855"=>__("Kampuchea"),//"柬埔寨",
				"856"=>__("laos"),//"老挝",
				"86"=>__("China"),//"中国",
				"880"=>__("bangladesh"),//"孟加拉国",
				"886"=>__("Taiwan"),//"台湾",
				"90"=>__("Turkey"),//"土耳其",
				"91"=>__("India"),//"印度",
				"92"=>__("Pakistan"),//"巴基斯坦",
				"93"=>__("afghanistan"),//"阿富汗",
				"94"=>__("Sri lanka"),//"斯里兰卡",
				"95"=>__("Burma"),//"缅甸",
				"960"=>__("Maldives"),//"马尔代夫",
				"961"=>__("lebanon"),//"黎巴嫩",
				"962"=>__("jordan"),//"约旦",
				"963"=>__("Syria"),//"叙利亚",
				"964"=>__("iraq"),//"伊拉克",
				"965"=>__("Kuwait"),//"科威特",
				"966"=>__("Saudi arabia"),//"沙特阿拉伯",
				"967"=>__("Yemen"),//"也门",
				"968"=>__("Oman"),//"阿曼",
				"969"=>__("the Democratic Republic of the Yemen"),//"也门民主共和国",
				"970"=>__("palestine"),//"巴勒斯坦",
				"971"=>__("Arabia United Arab emirates"),//"阿拉伯联合酋长国",
				"972"=>__("israel"),//"以色列",
				"973"=>__("Bahrain"),//"巴林",
				"974"=>__("qatar"),//"卡塔尔",
				"975"=>__("bhutan"),//"不丹",
				"976"=>__("Mongolia"),//"蒙古",
				"977"=>__("nepal"),//"尼泊尔",
				"98"=>__("Iran"),//"伊朗",
				"992"=>__("Tajikistan"),//"塔吉克斯坦",
				"993"=>__("Turkmenistan"),//"土库曼斯坦",
				"994"=>__("Azerbaijan"),//"阿塞拜疆",
				"995"=>__("georgia"),//"格鲁吉亚",
				"996"=>__("Kyrgyzstan"),//"吉尔吉斯斯坦",
				"998"=>__("Uzbekistan"),//"乌兹别克斯坦",
		);
	}
	
}
