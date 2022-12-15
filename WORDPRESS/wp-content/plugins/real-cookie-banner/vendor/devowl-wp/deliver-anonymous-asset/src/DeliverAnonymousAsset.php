<?php

namespace DevOwl\RealCookieBanner\Vendor\DevOwl\DeliverAnonymousAsset;

use WP_Scripts;
/**
 * Deliver anonymous assets through `wp-content/uploads`.
 */
class DeliverAnonymousAsset {
    /**
     * Builder.
     *
     * @var AnonymousAssetBuilder
     */
    private $builder;
    private $handle;
    private $file;
    /**
     * C'tor.
     *
     * @param AnonymousAssetBuilder $builder
     * @param string $handle
     * @param string $file
     * @codeCoverageIgnore
     */
    public function __construct($builder, $handle, $file) {
        $this->builder = $builder;
        $this->handle = $handle;
        $this->file = $file;
        $this->hooks();
    }
    /**
     * Create hooks.
     */
    protected function hooks() {
        add_action('DevOwl/DeliverAnonymousAsset/Update/' . $this->getBuilder()->getOptionNamePrefix(), [
            $this,
            'deleteOldHashes'
        ]);
        add_filter('attribute_escape', [$this, 'attribute_escape']);
        add_filter('script_loader_tag', [$this, 'script_loader_tag'], 10, 2);
    }
    /**
     * Delete all outdated files.
     *
     * @param string[] $deletedHashes
     */
    public function deleteOldHashes($deletedHashes) {
        foreach ($deletedHashes as $deletedHash) {
            $contentPath = $this->getFullPathToFile(\md5($deletedHash . $this->getHandle()));
            if (\file_exists($contentPath)) {
                \unlink($contentPath);
            }
        }
    }
    /**
     * The handle is enqueued, let's modify the `WP_Dependency`.
     */
    public function ready() {
        // Check if folder can be created and is writable
        if (!self::getContentDir()) {
            return \false;
        }
        $script = wp_scripts()->query($this->getHandle());
        if (!$script) {
            return \false;
        }
        // Check if already adjusted
        $usedFilenameWithoutExtension = \explode('.', \basename($script->src))[0];
        if (\strlen($usedFilenameWithoutExtension) !== 32) {
            $script->src = $this->generateSrc();
            return \true;
        }
        return \false;
    }
    /**
     * Generate the file in our content directory and return the URL.
     */
    protected function generateSrc() {
        $output = $this->getBuilder()->readFileAndCorrectSourceMap($this->getFile());
        $contentPath = $this->getFullPathToFile($this->getBuilder()->getHash($this->getHandle()));
        // At this point, through `ready`, the folder is for sure writable
        if (!\file_exists($contentPath)) {
            \file_put_contents($contentPath, $output);
        }
        return self::getContentUrl() . \basename($contentPath);
    }
    /**
     * Get the full path to a file with a given hash.
     *
     * @param string $hash
     */
    public function getFullPathToFile($hash) {
        $extension = \pathinfo($this->getFile(), \PATHINFO_EXTENSION);
        $filename = $hash . '.' . $extension;
        return $this->getContentDir() . $filename;
    }
    /**
     * Modify CData script tag.
     *
     * @param string $safe_text The text after it has been escaped.
     */
    public function attribute_escape($safe_text) {
        if ($safe_text === $this->getHandle()) {
            // Backtrace to detect only changes in `print_extra_script`
            // phpcs:disable
            $backtrace = @\debug_backtrace();
            // phpcs:enable
            foreach ($backtrace as $bt) {
                if (
                    isset($bt['function'], $bt['class']) &&
                    $bt['function'] === 'print_extra_script' &&
                    $bt['class'] === \WP_Scripts::class
                ) {
                    return \md5(\rand());
                }
            }
        }
        return $safe_text;
    }
    /**
     * Modify tags to now show any `id` attribute.
     *
     * @param string $tag The `<script>` tag for the enqueued script.
     * @param string $handle The script's registered handle.
     */
    public function script_loader_tag($tag, $handle) {
        if ($handle === $this->getHandle()) {
            return \str_replace("id='" . $this->getHandle() . "-js'", '', $tag);
        }
        return $tag;
    }
    /**
     * Getter.
     *
     * @codeCoverageIgnore
     */
    public function getBuilder() {
        return $this->builder;
    }
    /**
     * Get handle.
     *
     * @codeCoverageIgnore
     */
    public function getHandle() {
        return $this->handle;
    }
    /**
     * Get file.
     *
     * @codeCoverageIgnore
     */
    public function getFile() {
        return $this->file;
    }
    /**
     * Get the content directory URL.
     */
    public static function getContentUrl() {
        return trailingslashit(set_url_scheme(\constant('WP_CONTENT_URL')));
    }
    /**
     * Get the content directory and also ensure it is created.
     *
     * @return string|false Returns `false` if the folder could not be created.
     */
    public static function getContentDir() {
        $folder = \constant('WP_CONTENT_DIR') . '/';
        /**
         * Get the content directory where anonymous assets should be placed.
         *
         * @hook DevOwl/DeliverAnonymousAsset/ContentDir
         * @param {string} $folder
         * @return {string}
         */
        $folder = apply_filters('DevOwl/DeliverAnonymousAsset/ContentDir', $folder);
        if (!wp_is_writable($folder)) {
            return \false;
        }
        return $folder;
    }
    /**
     * Remove the files from filesystem. Use this function in your `uninstall.php`.
     *
     * @param string $table_name
     * @param string $handle
     * @param string[] $extensions
     */
    public static function uninstall($table_name, $handle, $extensions = []) {
        global $wpdb;
        $contentDir = self::getContentDir();
        if (!$contentDir) {
            return;
        }
        $sql = "SELECT serve_hash FROM {$table_name}";
        // phpcs:disable WordPress.DB.PreparedSQL
        $hashes = $wpdb->get_col($sql);
        // phpcs:enable WordPress.DB.PreparedSQL
        foreach ($hashes as $hash) {
            foreach ($extensions as $extension) {
                $filename = $contentDir . \md5($hash . $handle) . '.' . $extension;
                if (\file_exists($filename)) {
                    \unlink($filename);
                }
            }
        }
    }
}
