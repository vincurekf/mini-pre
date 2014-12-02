<?php

/**
 * Class Content
 * API
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 * Class content take care of Content API for editting content inline
 * gets content from database and saves edited content to database
 */
class Content extends Controller
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/content/index
     */
    public function index()
    {
        // getting all content and amount of content
        echo json_encode($this->model->getAllContents());
    }

    public function update()
    {
        $update_data = $_POST["update_data"];
        $result = $this->model->updateContent($update_data);
        echo $result;
    }
}
