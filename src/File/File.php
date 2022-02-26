<?php

namespace KonstantinDmitrienko\EmailValidator\File;

class File
{
    /**
     * @param string $file - Path of file with emails
     *
     * @return array
     */
    public static function getLinesFromFile(string $file): array
    {
        if (!$file || !file_exists($file)) {
            throw new \InvalidArgumentException("Error: File is missing.");
        }

        $content = file_get_contents($file);

        if (!$content) {
            throw new \InvalidArgumentException("Error: File is empty.");
        }

        $content = explode(PHP_EOL, $content);

        // Remove last empty row in file
        if (empty(end($content))) {
            array_pop($content);
        }

        return $content;
    }

    /**
     * @param array  $lines
     * @param string $file
     *
     * @return void
     */
    public static function putLinesInFile(array $lines, string $file): void
    {
        if (!$lines || !$file) {
            throw new \InvalidArgumentException("Error: Both parameters must be provided.");
        }

        file_put_contents($file, implode(PHP_EOL, $lines));
    }
}
