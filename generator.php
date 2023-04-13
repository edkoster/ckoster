<?php

class FileGenerator
{
    private const IGNORE_LIST = ['.', '..', '.DS_Store'];
    private const PHOTO_PATH = './photos';
    private const PHOTO_HTML = '<a href="{photoPath}"><img alt="{photoName}" src="{thumbnailPath}" /></a>' . PHP_EOL;

    public function generate(): void
    {
        $photos = $this->getPhotos();

        print_r($photos);
        $html = $this->generateHtml($photos);
        echo $html;
    }

    private function getPhotos(): array
    {
        $photos = [];
        $files = scandir(self::PHOTO_PATH);

        foreach ($files as $file) {

            if (strpos($file, '_thumbnail') !== false) {
                continue;
            }

            if (in_array($file, self::IGNORE_LIST,true)) {
                continue;
            }

            $photos[] = $file;
        }


        sort($photos);

        return $photos;
    }

    private function generateHtml($photos): string
    {
        $html = '';

        foreach ($photos as $photo) {
            $html .= $this->generatePhotoHtml($photo);
        }

        return $html;
    }

    private function generatePhotoHtml(string $photo): string
    {
        return strtr(self::PHOTO_HTML, [
            '{photoPath}' => $this->getPhotoPath($photo),
            '{thumbnailPath}' => $this->getThumbnailPath($photo),
            '{photoName}' => $this->getPhotoName($photo)
        ]);
    }

    private function getPhotoPath(string $photo): string
    {
        return self::PHOTO_PATH . '/' . $photo;
    }

    private function getThumbnailPath(string $photo): string
    {
        $find = ['.jpg', '.JPG'];
        $replace = ['_thumbnail.jpg', '_thumbnail.JPG'];
        return self::PHOTO_PATH . '/' . str_replace($find, $replace, $photo);
    }

    private function getPhotoName(string $photo): string
    {
        $find = ['.jpg', '.JPG'];
        return str_replace($find, '', $photo);
    }
}

$generator = new FileGenerator();
$generator->generate();