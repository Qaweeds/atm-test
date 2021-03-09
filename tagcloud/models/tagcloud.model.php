<?php
include_once "../_autoload.php";

class tagcloud_model extends Controller
{
    protected static $menuOption = 'tagcloud';

    var $tags; //array(id,tag.total)
    var $largest;

    function __construct()
    {
        parent::__construct();

        // get tags and largest value
        $this->get_tags();

        /*//see the array of tags_total
         *  echo"<pre>";
         print_r($this->tags);
         echo"</pre>";
         exit;*/
    }

    /* Utility functions
    ---------------------------------------*/

    function get_tags()
    {
        $this->tags = array();
        $this->largest = 0;

        $query = "
        SELECT
            article_tag.tag_id,
            tags.tag,
            COUNT(article_tag.tag_id) AS total
        FROM tags, article_tag
        WHERE article_tag.tag_id = tags.id
        GROUP BY article_tag.tag_id";

        $this->db->prepare($query)->execute();

        if ($this->db->numRows() > 0) {
            while ($row = $this->db->fetchRow()) {
                if ($row['total'] > $this->largest) {
                    $this->largest = (int) $row['total'];
                }

                //add tag to array
                $this->tags[] = array('id' => $row['tag_id'], 'tag' => $row['tag'], 'total' => $row['total']);
            }

            // sort tags
            usort($this->tags, array('tagcloud_model', 'compare_tags'));
        } else {
            $this->tags = false;
        }
    }

    function compare_tags($a, $b)
    {
        return strcmp($a['tag'], $b['tag']);
    }

    /*Display Functions
    --------------------------------------*/
    function  get_tag_list()
    {
        if ($this->tags != false) {
            $data = '';

            //display tags in table
            $data .= "<table class=\"table table-striped table-bordered table-hover\">";
            $data .= "<tr><th>ID</th><th>Tag Name</th><th>Count</th><th>Weight</th></tr>";

            foreach ($this->tags as $tag) {
                //find weight
                $weight = round(($tag['total'] / $this->largest) * 10);

                $data .= "<tr>";
                $data .= "<td>" . $tag['id'] . "</td>";
                $data .= "<td>" . $tag['tag'] . "</td>";
                $data .= "<td>" . $tag['total'] . "</td>";
                $data .= "<td>" . $weight . "</td>";
                $data .= "</tr>";
            }

            $data .= "</table>";

            return $data;
        } else {
            return "no tags to display";
        }
    }

    function get_tag_cloud()
    {
        if ($this->tags != false) {
            //create unordered list
            $data = '';

            $data .= '<ul class="tagcloud">';

            foreach ($this->tags as $tag) {
                //find weight
                $weight = round(($tag['total'] / $this->largest) * 10);

                //create list item
                $data .= "<li><a href='" . BASE_URL . "tagcloud/tags.php?id'" . $tag['id'] . "' class='tag" . $weight . "'>";
                $data .= $tag['tag'] . "<a></li>";
                $data .= "\n";
            }

            $data .= "</ul>";

            return $data;
        } else {
            return "no tags to display";
        }
    }
}
