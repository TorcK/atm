<?php  if (!defined('BASEPATH')) exit('No direct script access allowed'); 

if (! function_exists('translitEncode'))
{
   function translit_encode($str, $encIn = "utf-8", $encOut = "utf-8")
   {
        $cyr = array(
            "Щ", "Ш", "Ч", "Ц","Ю", "Я", "Ж", "А","Б","В","Г","Д","Е","Ё","З","И","Й","К","Л","М","Н", 
            "О","П","Р","С","Т","У","Ф","Х", "Ь","Ы","Ъ","Э","Є","Ї",
            "щ", "ш", "ч", "ц","ю", "я", "ж", "а","б","в","г","д","е","ё","з","и","й","к","л","м","н", 
            "о","п","р","с","т","у","ф","х", "ь","ы","ъ","э","є","ї");
        $lat = array(
            "Shh","Sh","Ch","C","Ju","Ja","Zh","A","B","V","G","D","Je","Jo","Z","I","J","K","L","M",
            "N","O","P","R","S","T","U","F","Kh","","Y", "`","E","Je","Ji",
            "shh","sh","ch","c","ju","ja","zh","a","b","v","g","d","je","jo","z","i","j","k","l","m",
            "n","o","p","r","s","t","u","f","kh","","y", "","e","je","ji");
            
        $str = iconv($encIn, "utf-8", $str);
        $str = str_replace(' ', '-', $str);
        
        for($i=0; $i<count($cyr); $i++){
            $c_cyr = $cyr[$i];
            $c_lat = $lat[$i];
            $str = str_replace($c_cyr, $c_lat, $str);
        }
        
        $str = preg_replace("/([qwrtpsdfghklzxcvbnmQWRTPSDFGHKLZXCVBNM]+)[jJ]e/", "\${1}e", $str);
        $str = preg_replace("/([qwrtpsdfghklzxcvbnmQWRTPSDFGHKLZXCVBNM]+)[jJ]/", "\${1}", $str);
        $str = preg_replace("/([eyuioaEYUIOA]+)[Kk]h/", "\${1}h", $str);
        $str = preg_replace("/^kh/", "h", $str);
        $str = preg_replace("/^Kh/", "H", $str);
        $str = strtolower($str);
        return iconv("utf-8", $encOut, $str);
   }
   
   function name_url($name)
   {
        $symbols = array('"', '/', '\\', ',', '.', '(', ')', '+');
        
        $name = translit_encode($name);
        $name = strtolower($name);
        
        foreach ($symbols as $one) {
             $name = str_replace($one, '', $name);
        }
        
        str_replace(' ', '-', $name);
        return $name;
   }
   
     function win_to_utf8($s)
     {
          static $table= array (
               "\xC0"=>"\xD0\x90","\xC1"=>"\xD0\x91","\xC2"=>"\xD0\x92","\xC3"=>"\xD0\x93","\xC4"=>"\xD0\x94",
               "\xC5"=>"\xD0\x95","\xA8"=>"\xD0\x81","\xC6"=>"\xD0\x96","\xC7"=>"\xD0\x97","\xC8"=>"\xD0\x98",
               "\xC9"=>"\xD0\x99","\xCA"=>"\xD0\x9A","\xCB"=>"\xD0\x9B","\xCC"=>"\xD0\x9C","\xCD"=>"\xD0\x9D",
               "\xCE"=>"\xD0\x9E","\xCF"=>"\xD0\x9F","\xD0"=>"\xD0\xA0","\xD1"=>"\xD0\xA1","\xD2"=>"\xD0\xA2",
               "\xD3"=>"\xD0\xA3","\xD4"=>"\xD0\xA4","\xD5"=>"\xD0\xA5","\xD6"=>"\xD0\xA6","\xD7"=>"\xD0\xA7",
               "\xD8"=>"\xD0\xA8","\xD9"=>"\xD0\xA9","\xDA"=>"\xD0\xAA","\xDB"=>"\xD0\xAB","\xDC"=>"\xD0\xAC",
               "\xDD"=>"\xD0\xAD","\xDE"=>"\xD0\xAE","\xDF"=>"\xD0\xAF","\xAF"=>"\xD0\x87","\xB2"=>"\xD0\x86",
               "\xAA"=>"\xD0\x84","\xA1"=>"\xD0\x8E","\xE0"=>"\xD0\xB0","\xE1"=>"\xD0\xB1","\xE2"=>"\xD0\xB2",
               "\xE3"=>"\xD0\xB3","\xE4"=>"\xD0\xB4","\xE5"=>"\xD0\xB5","\xB8"=>"\xD1\x91","\xE6"=>"\xD0\xB6",
               "\xE7"=>"\xD0\xB7","\xE8"=>"\xD0\xB8","\xE9"=>"\xD0\xB9","\xEA"=>"\xD0\xBA","\xEB"=>"\xD0\xBB",
               "\xEC"=>"\xD0\xBC","\xED"=>"\xD0\xBD","\xEE"=>"\xD0\xBE","\xEF"=>"\xD0\xBF","\xF0"=>"\xD1\x80",
               "\xF1"=>"\xD1\x81","\xF2"=>"\xD1\x82","\xF3"=>"\xD1\x83","\xF4"=>"\xD1\x84","\xF5"=>"\xD1\x85",
               "\xF6"=>"\xD1\x86","\xF7"=>"\xD1\x87","\xF8"=>"\xD1\x88","\xF9"=>"\xD1\x89","\xFA"=>"\xD1\x8A",
               "\xFB"=>"\xD1\x8B","\xFC"=>"\xD1\x8C","\xFD"=>"\xD1\x8D","\xFE"=>"\xD1\x8E","\xFF"=>"\xD1\x8F",
               "\xB3"=>"\xD1\x96","\xBF"=>"\xD1\x97","\xBA"=>"\xD1\x94","\xA2"=>"\xD1\x9E"
          );
          return strtr($s, $table);
     }
}

?>