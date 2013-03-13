<?php

namespace Kompakt\Helpers;

/**
 * @package Kompakt\Helpers
 */
class Archiver {
    /**
     * Makes a zip archive including recursively folders and files, keeping their structure
     * 
     * @param string $source Source path
     * @param stirng $destination Destination path (where the archive will be stored)
     * @return ZipArchive ZipArchive
     * @access public
     * @static
     */
    public static function ZipMaker($source,$destination) {
        $zipHandler = new \ZipArchive();
        $zipHandler->open($destination, \ZIPARCHIVE::CREATE);

        $source = str_replace('\\', '/', realpath($source)); // Fixing Windows paths

        $files = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($source),\RecursiveIteratorIterator::SELF_FIRST);
        foreach ($files as $file) {
            $file = str_replace('\\', '/', $file); // Fixing Windows paths

            if (in_array(substr($file,strrpos($file, '/')+1), array('.', '..')))
                continue; // Skipping if it's a "." or ".." dir

            $file = realpath($file);

            if (is_dir($file) === true) { // If it's a directory
                $zipHandler->addEmptyDir(str_replace($source . '/', '', $file . '/'));
            } elseif (is_file($file) === true) { // If it's a file
                $zipHandler->addFromString(str_replace($source . '/', '', $file), file_get_contents($file));
            }
        }

        return $zipHandler->close();
    }
}

?>