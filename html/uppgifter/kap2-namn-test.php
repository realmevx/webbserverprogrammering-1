<?php
/**
 * Visa ett slumpmässigt valt citat
 *
 * Detta är övningen som motsvarar avsnitt 2.3 i läroboken Webbserverprogrammering 1
 */


/**
 * En utf8-funktion som vänder på en textsträng
 *
 * Denna funktion liknar PHP:s inbyggda strrev(), men förutsätter
 * att teckenkodningen är UTF-8 och inte Win-1252/ISO-8859-1
 *
 * @param string $str En UTF-8 kodad sträng
 * @return string Strängen i omvänd ordning
 */



header("Content-type: text/html; charset=utf-8");
?>
<!DOCTYPE html>
<html lang="sv">
<head>
  <meta charset="utf-8" />
  <title>Avsnitt 2.3: Namntest</title>
  <style>
    body {
        font-family: sans-serif;
        max-width: 500px;
        margin: auto;
    }
    dt {
        margin-top: 1em;
    }
  </style>
</head>
<body>
    <h1>Avsnitt 2.3: Namntest</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <p>
          <label for="name">Vad heter du?</label>
          <input type="text" name="name" id="name"
                 placeholder="ex. Åke Svenson" />
        </p>
    </form>
<?php
// Sätt standardvärde (default) för alla mb-funktioner
mb_internal_encoding("UTF-8");

/**
 * En utf8-funktion som vänder på en textsträng
 *
 * Denna funktion liknar PHP:s inbyggda strrev(), men förutsätter
 * att teckenkodningen är UTF-8 och inte WIN-1252/ISO-8859-1
 * @param string $str En UTF-8 kodad sträng
 * @return string Strängen i omvänd ordning
 */
function utf8_strrev($str) {
    // Namnet baklänges - se detta som svart magi tills vidare!
    preg_match_all('/./us', $str, $temp_arr);
    return join('', array_reverse($temp_arr[0]));
}

// Hämta data från formuläret
$submitted_name = filter_input(INPUT_POST, 'name', FILTER_UNSAFE_RAW,FILTER_FLAG_STRIP_LOW);

// En variabel som håller reda på om vi fått något användbart
// Vi börjar med att förutsätta att så inte är fallet
$namedata = false;
if (!empty($submitted_name) ) {
    // Ta bort onödig whitespace i början och slutet
    $submitted_name = trim($submitted_name);
    // Säkra namnet för HTML_output
    $output_name = htmlspecialchars($submitted_name, ENT_QUOTES);
    // Antal tecken i namnet
    $charcount = mb_strlen($submitted_name);
    // Namnet baklänges - betrakta det osm svart magi tills vidare!
    $name_reversed = utf8_strrev($submitted_name);
    // Säkra för HTML-output
    $name_reversed = htmlspecialchars($name_reversed, ENT_QUOTES);
    $namedata = true;
}
?>
</body>
<?php
if ( $namedata ) {
    echo <<<DATA
    <dl>
     <dt>NAMN</dt>
     <dd>{$output_name}</dd>
     <dt>Antal tecken (inklusive ev mellanslag i mitten)</dt>
     <dd>{$charcount}</dd>
     <dt>Namnet baklänges</dt>
     <dd>{$name_reversed}</dd>
    </dl>
DATA;
}
?>
</html>

