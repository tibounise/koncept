<?php
/**
 * Koncept Localizator
 * @package panel
 */
/**
 * Localizator for koncept
 *
 * @author TiBounise <contact@tibounise.com>
 */

class Localization {
    /**
     * Language strings
     *
     * @var array
     * @access protected
     */
    protected $locales;
    /**
     * Identifier of the language
     *
     * @var string
     * @access protected
     */
    protected $language;
    /**
     * Load the localization
     *
     * @param string $lang Language identifier
     * @access public
     * @return null
     */
    public function loadLocales($lang) {
        $filename = 'localization/' . $lang . '.json';
        if (!is_readable($filename)) {
            $filename = 'localization/en.json';
        }
        $locale_file = json_decode(file_get_contents($filename) , true);
        $this->language = $locale_file['language'];
        $this->locales = $locale_file['locales'];
        
        return null;
    }
    public function getStr($string) {
        
        return $this->locales[$string];
    }
    public function ssParser($string) {
        $matches = array();
        if (preg_match_all('#<([A-Za-z0-9]+)//([A-Za-z0-9]+)>#', $string, $matches)) {
            
            for ($i = 0; $i < count($matches[0]); $i++) {
                if ($matches[1][$i] == 'Localized') {
                    $string = str_replace('<Localized//' . $matches[2][$i] . '>', $this->getStr($matches[2][$i]) , $string);
                }
            }
        }
        
        return $string;
    }
}
?>