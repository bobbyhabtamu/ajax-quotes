<?php
// Array of quotes
$quotes = [
    "The great thing about human language is that it prevents us from sticking to the matter at hand. - Lewis Thomas ",
    "The palest ink is better than the best memory. -Chinese Proverb",
    "Frankly, I’m suspicious of anyone who has a strong opinion on a complicated issue.
- Scott Adams ",
    "Nothing is permanent in this wicked world - not even our troubles. - Charlie Chaplin",
    "In the beginning the Universe was created. This has made a lot of people very angry and been widely regarded as a bad move. - Douglas Adams",
];

// Get a random index
$randomIndex = array_rand($quotes);

// Return the random quote
echo $quotes[$randomIndex];
?>
