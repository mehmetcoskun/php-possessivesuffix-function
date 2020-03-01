<?php
class PossessvieSuffix
{
    /**
     * @param $word
     * @return string
     */
    public static function word($word)
    {
        $lastLetter = substr(mb_strtolower($word, "UTF-8"), -1); //get last letter
        $penultimateLetter = substr(mb_strtolower($word, "UTF-8"), -2, 1); //get penultimate letter
        $vowels = "aeıioüuü"; //vowels

        if (strrchr($vowels, $lastLetter)) { //last letter check
            $letterCheck = $lastLetter;
            $possessiveSuffixes = array("nın", "nin", "nun", "nün");
        } else { //if there isn't vowels in last letter then check penultimate letter
            $letterCheck = $penultimateLetter;
            $possessiveSuffixes = array("ın", "in", "un", "ün");
        }

        switch ($letterCheck) { //according to last letter add possessive suffix to word
            case "a": case "ı":
                $possessive = $possessiveSuffixes[0];
                break;
            case "e": case "i":
                $possessive = $possessiveSuffixes[1];
                break;
            case "o": case "u":
                $possessive = $possessiveSuffixes[2];
                break;
            case "ö": case "ü":
                $possessive = $possessiveSuffixes[3];
                break;
            default:
                $possessive = "nın";
                break;
        }

        return sprintf("%s'%s", $word, $possessive);
    }
}