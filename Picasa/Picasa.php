<?php
include 'Model/Image.php';
class Picasa {
    private static $URL_SEARCH = 'https://picasaweb.google.com/data/feed/api/all?q=%s&max-results=%d&start-index=%d';
    public  static $maxResults = 5;


    public function getSearchContent ($search, $maxResults, $startIndex) {
        $data = simplexml_load_file(sprintf(self::$URL_SEARCH, $search, $maxResults, $startIndex));
        $_SESSION['startIndex'] = $startIndex;
        $_SESSION['query'] = $search;
        $result = array();
        $obj = 0;
        foreach ($data->entry as $item) {
            $images = new Image();
            $namespaces = $item->getNameSpaces( true );
            $images->setId(''.$item->id);
            $images->setTitle(''.$item->title);
            $images->setImage(''.$item->children($namespaces['media'])->group->content->attributes()->{'url'});
            $images->setThumbSmall(''.$item->children($namespaces['media'])->group->thumbnail[0]->attributes()->{'url'});
            $images->setThumbMiddle(''.$item->children($namespaces['media'])->group->thumbnail[1]->attributes()->{'url'});
            $images->setThumbLarge(''.$item->children($namespaces['media'])->group->thumbnail[2]->attributes()->{'url'});
            $result[$obj] = $images;
            $obj++;
        }
        return $result;
    }


    public function ImageContent ($id) {
        $data = simplexml_load_file($id);
            $image = new Image();
            $namespaces = $data->getNameSpaces( true );
            $image->setId(''.$data->id);
            $image->setTitle(''.$data->title);
            $image->setSize(''.$data->children('gphoto',true)->size);
            $image->setWidth(''.$data->children('gphoto',true)->width);
            $image->setHeight(''.$data->children('gphoto',true)->height);
            $image->setImage(''.$data->content->attributes()->{'src'});
            $image->setType(''.$data->content->attributes()->{'type'});
            $image->setThumbSmall(''.$data->children($namespaces['media'])->group->thumbnail[0]->attributes()->{'url'});
            $image->setThumbMiddle(''.$data->children($namespaces['media'])->group->thumbnail[1]->attributes()->{'url'});
            $image->setThumbLarge(''.$data->children($namespaces['media'])->group->thumbnail[2]->attributes()->{'url'});
            $image->setAuthor(''.$data->children($namespaces['media'])->group->credit);

        return $image;
    }

    public function hasNextPage ($search, $maxResults, $startIndex) {
        $data = simplexml_load_file(sprintf(self::$URL_SEARCH, $search, $maxResults, $startIndex+$maxResults));
        if (sizeof($data->entry) < self::$maxResults)
            return false;

        return true;
    }

    public function hasPrevious ($startIndex) {
        if (($startIndex - self::$maxResults) < 1)
            return false;

        return true;
    }

}