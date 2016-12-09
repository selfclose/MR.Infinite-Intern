<?php
namespace Intern\Provider;


/**
 * Class PaginateController
 * ajax https://code.tutsplus.com/articles/getting-started-with-ajax-wordpress-pagination--wp-23099
 */

class PaginateProvider
{
    protected $query;

    protected $items_per_page = 5;

    protected $total;

    protected $page;

    /**
     * @var string 'plain', 'list', 'array'
     */
    protected $paginate_link_output = 'list';

    protected $url_name = 'cpage';

    public function __construct($query = 'SELECT * FROM wp_users')
    {
        $this->query = $query;
    }

    /**
     * @param string $query
     */
    public function setQuery(string $query)
    {
        $this->query = $query;
    }

    /**
     * @param int $items_per_page
     */
    public function setItemsPerPage(int $items_per_page)
    {
        $this->items_per_page = $items_per_page;
    }

    /**
     * @param string $paginate_link_output
     */
    public function setPaginateLinkOutput(string $paginate_link_output)
    {
        $this->paginate_link_output = $paginate_link_output;
    }

    /**
     * @param string $url_name
     * @throws Exception
     */
    public function setUrlName(string $url_name)
    {
        if ($url_name=='page') {
            throw new Exception("Don't use 'page'");
        }
        $this->url_name = $url_name;
    }


    function generate()
    {
        global $wpdb;

        $query = $this->query;

        $total_query = "SELECT COUNT(1) FROM (${query}) AS combined_table";
        $this->total = $wpdb->get_var($total_query);

        $this->page = isset($_GET[$this->url_name]) ? abs((int)$_GET[$this->url_name]) : 1;
        $offset = ($this->page * $this->items_per_page) - $this->items_per_page;
        return $wpdb->get_results($query . " LIMIT ${offset}," . $this->items_per_page, OBJECT);
    }

    /**
     * @param array $paginate_link_option
     */
    public function renderPaginateButton($paginate_link_option = []) {
        if (empty($paginate_link_option)) {
            $pages = paginate_links([
                'base' => add_query_arg( $this->url_name, '%#%' ),
                'format' => '',
                'type' => $this->paginate_link_output,
                'prev_text' => __('&laquo;'),
                'next_text' => __('&raquo;'),
                'total' => ceil($this->total / $this->items_per_page),
                'current' => $this->page
            ]);
        }
        else {
            $pages = paginate_links($paginate_link_option);
        }

        if ($this->paginate_link_output == 'array') {
            $paged = ( get_query_var($this->page) == 0 ) ? 1 : get_query_var($this->page);
            echo '<div class="pagination-wrap"><ul class="pagination">';
            foreach ( $pages as $page ) {
                echo "<li>$page</li>";
            }
            echo '</ul></div>';
        }
        else {
            echo $pages;
        }
    }
}
