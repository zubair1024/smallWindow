<?php

class Gallery {

    public $path;

    public function __construct() {
        dirname(__DIR__) . 'img';
    }

    public function setPath($path) {
        if (substr($path, -1) === '/') {
            $path = substr($path, 0, -1);
        }
        $this->path = $path;
    }

    private function getDirectory($path) {
        return scandir($path);
    }

    public function getImages($extensions = array('jpg', 'png')) {
        $images = $this->getDirectory($this->path);
        foreach ($images as $index => $image) {
            $extension = strtolower(end(explode('.', $image)));
            if (!in_array($extension, $extensions)) {
                unset($images[$index]);
            } else {
                $images[$index] = array(
                    'full' =>   $this->path . '/' . $image,
                    'thumb' => $this->path . '/thumb/' . $image
                );
            }
        }
        return $images;
    }

}
