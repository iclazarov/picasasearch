<?php
/**
 * Created by PhpStorm.
 * User: rusko
 * Date: 19.03.15
 * Time: 13:48
 */

class Image {

    private $id;
    private $title;
    private $image;
    private $thumbSmall;
    private $thumbMiddle;
    private $thumbLarge;
    private $size;
    private $author;
    private $width;
    private $height;
    private $type;


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }


    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * @return mixed
     */
    public function getThumbSmall()
    {
        return $this->thumbSmall;
    }

    /**
     * @param mixed $thumbSmall
     */
    public function setThumbSmall($thumbSmall)
    {
        $this->thumbSmall = $thumbSmall;
    }

    /**
     * @return mixed
     */
    public function getThumbMiddle()
    {
        return $this->thumbMiddle;
    }

    /**
     * @param mixed $thumbMiddle
     */
    public function setThumbMiddle($thumbMiddle)
    {
        $this->thumbMiddle = $thumbMiddle;
    }

    /**
     * @return mixed
     */
    public function getThumbLarge()
    {
        return $this->thumbLarge;
    }

    /**
     * @param mixed $thumbLarge
     */
    public function setThumbLarge($thumbLarge)
    {
        $this->thumbLarge = $thumbLarge;
    }

    /**
     * @return mixed
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @param mixed $size
     */
    public function setSize($size)
    {
        $this->size = $size;
    }

    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param mixed $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    /**
     * @return mixed
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @param mixed $width
     */
    public function setWidth($width)
    {
        $this->width = $width;
    }

    /**
     * @return mixed
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param mixed $height
     */
    public function setHeight($height)
    {
        $this->height = $height;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }








}