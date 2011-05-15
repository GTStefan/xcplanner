<?php

if (!isset($rendering)) {
	die();
}

printf("\$FormatGEO\r\n");
foreach ($route["turnpoints"] as $turnpoint) {
	printf("%-6s    %s %02d %02d %05.2f    %s %03d %02d %05.2f  %4d  %s\r\n",
	       $turnpoint["name"],
	       $turnpoint["lat"] < 0.0 ? "S" : "N",
	       abs($turnpoint["lat"]),
	       (60.0 * abs($turnpoint["lat"])) % 60,
	       fmod(3600.0 * abs($turnpoint["lat"]), 60),
	       $turnpoint["lng"] < 0.0 ? "W" : "E",
	       abs($turnpoint["lng"]),
	       (60.0 * abs($turnpoint["lng"])) % 60,
	       fmod(3600.0 * abs($turnpoint["lng"]), 60),
	       $turnpoint["ele"] == -9999 ? 0 : $turnpoint["ele"],
	       $turnpoint["name"]);
}
?>
