<?php

if (!function_exists('posts_background_colour_function')) {
    function posts_background_colour_function($counter)
    {

        //Declaring the array of css class names into a variable
        $gradientedColour = array("gradient-one-two", "gradient-three-four", "gradient-five-six");

        //Counting the number of elements inside the $gradientedColour variable
        $lengthOfTheArray = count($gradientedColour);

        //What the following line of code means (code from Adrian):
        // First parameter: empty($counter)? ; checks whether the variable $counter is empty (is $counter empty?).
        // Second parameter: $counter=0 ; sets $counter=0 if the answer to the first parameter is true (if $counter IS empty, set it to 0).
        // Third parameter: $counter%$lengthOfTheArray ; HAVE TO ASK ADRIAN COZ I CAN'T SAY WHAT THIS DOES; 
        $counter = empty($counter) ? $counter = 0 : $counter % $lengthOfTheArray;

        return $gradientedColour[$counter];
    }
}
