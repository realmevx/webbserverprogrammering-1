<?php

// Citat av Rasmus Lerdorf, som uppfann php från början
// http://en.wikiquote.org/wiki/Rasmus_Lerdorf
$alla_citat = array(
    "I did not develop the PHP we know today. Dozens, if not hundreds of people, developed PHP. I was simply the first developer. ", "I actually hate programming,      but i love solving problems.", "I've never thought of php as more than a simple tool to solve all problems. ", "For all the folks getting excited about my        quotes. Here is another - Yes, i am a terrible coder, but i am probably still better than you :)"
);

$random_key = array_rand($alla_citat);
$citat      = $alla_citat[$random_key];

echo "<p lang\"en\">{$citat}</p>\n";

?>