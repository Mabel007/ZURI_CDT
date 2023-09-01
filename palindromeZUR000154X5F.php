<?php
class CascadingPalindrome {
    private array $input;

    public function __construct(array $input) {
        # check if the given input is valid
        if (!$this->isValidInput($input)) {
            throw new InvalidArgumentException("Input parameter must be an array with mixed values.");
        }

        $this->input = $input;
    }

    public function findCascadingPalindrome(): array {
        //initialize the palindrome array
        $components = $this->input;
        $palindromes = [];

        // loop through the given input 
        foreach ($components as $component) {
            // check if the input is a palindrome
            if ($this->isPalindrome($component)) {
                // store in the palindromes array
                $palindromes[] = $component;
            }
        }

        return $palindromes;
    }

    private function isValidInput(array $input): bool {
        // check if elements in the array(given input) are string & numeric
        foreach ($input as $item) {
            if (!is_string($item) && !is_numeric($item)) {
                return false;
            }
        }
        return true;
    }

    private function isPalindrome(string $sequence): bool {
        //removes the space from the sequence
        $sequence = str_replace(" ", "", $sequence);
        // calculates the length and mid point of the sequence
        $length = mb_strlen($sequence, 'UTF-8');
        $middle = floor($length / 2);

        for ($i = 0; $i < $middle; $i++) {
            if ($sequence[$i] !== $sequence[$length - $i - 1]) {
                return false;
            }
        }

        return true;
    }
}

// Examples
try {
    $input1 = ["abc", "1230321", "hello world"];
    $cascadingPalindrome1 = new CascadingPalindrome($input1);
    print_r($cascadingPalindrome1->findCascadingPalindrome());

    $input2 = ["abcd5dcba", "1230321", "09234", "0124210"];
    $cascadingPalindrome2 = new CascadingPalindrome($input2);
    print_r($cascadingPalindrome2->findCascadingPalindrome());

    $input3 = ["radar", "level", "12321"];
    $cascadingPalindrome3 = new CascadingPalindrome($input3);
    print_r($cascadingPalindrome3->findCascadingPalindrome());

    $input4 = ["abcde", "1221", "racecar"];
    $cascadingPalindrome4 = new CascadingPalindrome($input4);
    print_r($cascadingPalindrome4->findCascadingPalindrome());

    $input5 = ["madam", "45654", "hello", "world"];
    $cascadingPalindrome5 = new CascadingPalindrome($input5);
    print_r($cascadingPalindrome5->findCascadingPalindrome());

    $input6 = ["deified", "1234321", "abcba", "54345"];
    $cascadingPalindrome6 = new CascadingPalindrome($input6);
    print_r($cascadingPalindrome6->findCascadingPalindrome());

    $input7 = ["hello", "level", "world", "radar"];
    $cascadingPalindrome7 = new CascadingPalindrome($input7);
    print_r($cascadingPalindrome7->findCascadingPalindrome());

    $input8 = ["a", "b", "c", "d"];
    $cascadingPalindrome8 = new CascadingPalindrome($input8);
    print_r($cascadingPalindrome8->findCascadingPalindrome());

    $input9 = ["123", "12321", "1234321", "123454321"];
    $cascadingPalindrome9 = new CascadingPalindrome($input9);
    print_r($cascadingPalindrome9->findCascadingPalindrome());

    $input10 = ["xyx", "aaa", "zzz", "abba", "121"];
    $cascadingPalindrome10 = new CascadingPalindrome($input10);
    print_r($cascadingPalindrome10->findCascadingPalindrome());

} catch (InvalidArgumentException $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
