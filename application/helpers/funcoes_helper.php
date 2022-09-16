<?php 
function convert_number_to_words($number) {

    $hyphen      = '-';
    $conjunction = ' e ';
    $separator   = ', ';
    $negative    = 'menos ';
    $decimal     = ' ponto ';
    $dictionary  = array(
        0                   => 'Zero',
        1                   => 'Um',
        2                   => 'Dois',
        3                   => 'Três',
        4                   => 'Quatro',
        5                   => 'Cinco',
        6                   => 'Seis',
        7                   => 'Sete',
        8                   => 'Oito',
        9                   => 'Nove',
        10                  => 'Dez',
        11                  => 'Onze',
        12                  => 'Doze',
        13                  => 'Treze',
        14                  => 'Quatorze',
        15                  => 'Quinze',
        16                  => 'Dezesseis',
        17                  => 'Dezessete',
        18                  => 'Dezoito',
        19                  => 'Dezenove',
        20                  => 'Vinte',
        30                  => 'Trinta',
        40                  => 'Quarenta',
        50                  => 'Cinquenta',
        60                  => 'Sessenta',
        70                  => 'Setenta',
        80                  => 'Oitenta',
        90                  => 'Noventa',
        100                 => 'Cento',
        200                 => 'Duzentos',
        300                 => 'Trezentos',
        400                 => 'Quatrocentos',
        500                 => 'Quinhentos',
        600                 => 'Seiscentos',
        700                 => 'Setecentos',
        800                 => 'Oitocentos',
        900                 => 'Novecentos',
        1000                => 'Mil',
        1000000             => array('milhão', 'milhões'),
        1000000000          => array('bilhão', 'bilhões'),
        1000000000000       => array('trilhão', 'trilhões'),
        1000000000000000    => array('quatrilhão', 'quatrilhões'),
        1000000000000000000 => array('quinquilhão', 'quinquilhões')
    );
    


    if (!is_numeric($number)) {
        return false;
    }

    if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
        // overflow
        trigger_error(
            'convert_number_to_words só aceita números entre ' . PHP_INT_MAX . ' à ' . PHP_INT_MAX,
            E_USER_WARNING
        );
        return false;
    }

    if ($number < 0) {
        return $negative . convert_number_to_words(abs($number));
    }

    $string = $fraction = null;

    if (strpos($number, '.') !== false) {
        list($number, $fraction) = explode('.', $number);
    }

    switch (true) {
        case $number < 21:
            $string = $dictionary[$number];
            break;
        case $number < 100:
            $tens   = ((int) ($number / 10)) * 10;
            $units  = $number % 10;
            $string = $dictionary[$tens];
            if ($units) {
                $string .= $conjunction . $dictionary[$units];
            }
            break;
        case $number < 1000:
            $hundreds  = floor($number / 100)*100;
            $remainder = $number % 100;
            $string = $dictionary[$hundreds];
            if ($remainder) {
                $string .= $conjunction . convert_number_to_words($remainder);
            }
            break;
        default:
            $baseUnit = pow(1000, floor(log($number, 1000)));
            $numBaseUnits = (int) ($number / $baseUnit);
            $remainder = $number % $baseUnit;
            if ($baseUnit == 1000) {
                $string = convert_number_to_words($numBaseUnits) . ' ' . $dictionary[1000];
            } elseif ($numBaseUnits == 1) {
                $string = convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit][0];
            } else {
                $string = convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit][1];
            }
            if ($remainder) {
                $string .= $remainder < 100 ? $conjunction : $separator;
                $string .= convert_number_to_words($remainder);
            }
            break;
    }

    if (null !== $fraction && is_numeric($fraction)) {
        $string .= $decimal;
        $words = array();
        foreach (str_split((string) $fraction) as $number) {
            $words[] = $dictionary[$number];
        }
        $string .= implode(' ', $words);
    }

    return $string;
}

function url_amigavel($string = NULL){
    $string = remove_acentos($string);
    return url_title($string, '-', TRUE);
}

function remove_acentos($string = NULL){
    $procurar = array('À', 'Á', 'Ã', 'Â', 'É', 'Ê', 'Í', 'Ó', 'Õ', 'Ô', 'Ú', 'Ü', 'Ç', 'à', 'á', 'ã', 'â', 'é', 'ê', 'í', 'ó', 'õ', 'ô', 'ú', 'ü', 'ç');
    $substituir = array('a', 'a', 'a', 'a','e', 'e','i','o','o','o','u','u','c','a', 'a', 'a', 'a','e', 'e','i','o','o','o','u','u','c');

    return str_replace($procurar, $substituir, $string);
}

function mantem_valor($string=NULL){
    $procurar = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','À', 'Á', 'Ã', 'Â', 'É', 'Ê', 'Í', 'Ó', 'Õ', 'Ô', 'Ú', 'Ü', 'Ç', 'à', 'á', 'ã', 'â', 'é', 'ê', 'í', 'ó', 'õ', 'ô', 'ú', 'ü', 'ç', '$');

    return str_replace($procurar, '', $string);
}
//Recupera informações do sistema para header ou footer
function info_header_footer(){
    $CI = & get_instance();

    $sistema = $CI->core_model->getby('sistema', array('id' => 1));

    return $sistema;
}

function get_marcas_navbar(){
    $CI = & get_instance();


    $marcas = $CI->loja_model->get_marcas();

    return $marcas;
}

function get_categorias_navbar(){
    $CI = & get_instance();


    $categorias = $CI->loja_model->get_categorias();

    return $categorias;
}
