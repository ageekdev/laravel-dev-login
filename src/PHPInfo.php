<?php

namespace AgeekDev\DevLogin;

class PHPInfo
{
    /**
     * Get the current php version.
     */
    public function phpVersion(): string
    {
        return PHP_VERSION;
    }

    /**
     * Get the current laravel version.
     */
    public function laravelVersion(): string
    {
        return app()->version();
    }

    /**
     * Get post_max_size from php.ini.
     */
    public function postMaxSize(): array
    {
        return $this->formatSize(ini_get('post_max_size'));
    }

    /**
     * Get upload_max_filesize from php.ini.
     */
    public function uploadMaxFilesize(): array
    {
        return $this->formatSize(ini_get('upload_max_filesize'));
    }

    /**
     * Get memory_limit from php.ini.
     */
    public function memoryLimit(): array
    {
        return $this->formatSize(ini_get('memory_limit'));
    }

    /**
     * Get max_execution_time from php.ini.
     */
    public function maxExecutionTime(): array
    {
        return $this->formatSize(ini_get('max_execution_time'));
    }

    /**
     * Get the current loaded php extensions.
     */
    public function loadedExtensions(): array
    {
        $default_extensions = ['Core', 'date', 'libxml', 'openssl', 'pcre', 'sqlite3', 'zlib', 'bcmath', 'bz2', 'calendar', 'ctype', 'curl', 'dba', 'dom', 'hash', 'FFI', 'fileinfo', 'filter', 'ftp', 'gd', 'gettext', 'gmp', 'json', 'iconv', 'intl', 'SPL', 'ldap', 'mbstring', 'session', 'standard', 'odbc', 'pcntl', 'exif', 'mysqlnd', 'PDO', 'pdo_dblib', 'pdo_mysql', 'PDO_ODBC', 'pdo_pgsql', 'pdo_sqlite', 'pgsql', 'Phar', 'posix', 'pspell', 'random', 'readline', 'Reflection', 'mysqli', 'shmop', 'SimpleXML', 'soap', 'sockets', 'sodium', 'sysvmsg', 'sysvsem', 'sysvshm', 'tidy', 'tokenizer', 'xml', 'xmlreader', 'xmlwriter', 'xsl', 'zip', 'cgi-fcgi'];
        $extensions = get_loaded_extensions();

        return array_values(array_diff($extensions, $default_extensions));
    }

    /**
     * Format value and metric of size.
     */
    private function formatSize(string $size): array
    {
        $size = trim($size);

        preg_match('/(\d+)\s*([a-zA-Z]+)/', $size, $matches);

        $value = (int) ($matches[1] ?? 0);
        $metric = (isset($matches[2])) ? strtolower($matches[2]) : 'b';

        $metric = match ($metric) {
            'm', 'mb' => 'mb',
            'g', 'gb' => 'gb',
            't', 'tb' => 'tb',
            default => 'kb'
        };

        return [
            'value' => $value,
            'metric' => $metric,
        ];
    }
}
