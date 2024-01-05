<?php namespace CodeIgniter\Debug\Toolbar\Collectors;

class Configs extends BaseCollector
{
    /**
     * Whether this collector has data that can
     * be displayed in the Timeline.
     *
     * @var bool
     */
    protected $hasTimeline = false;

    /**
     * Whether this collector needs to display
     * content in a tab or not.
     *
     * @var bool
     */
    protected $hasTabContent = true;

    /**
     * The 'title' of this Collector.
     * Used to name things in the toolbar HTML.
     *
     * @var string
     */
    protected $title = 'Config Variables';

    //--------------------------------------------------------------------

    /**
     * Builds and returns the HTML needed to fill a tab to display
     * within the Debug Bar
     *
     * @return string
     */
    public function display(): string
    {
        $CI =& get_instance();

        $output = "<table><tbody>";

        $count = 0;

        foreach ($CI->config->config as $config => $val)
        {
            ++$count;

            $pre       = '';
            $pre_close = '';

            if (is_array($val) OR is_object($val))
            {
                $val = print_r($val, true);

                $pre       = '<pre>' ;
                $pre_close = '</pre>';
            }

            $output .= '<tr><td>' . $config . '</td><td>' . $pre . htmlspecialchars((string) $val, ENT_QUOTES, config_item('charset')).$pre_close."</td></tr>";
        }

        $output .= "</tbody></table>";

        return $output;
    }

    //--------------------------------------------------------------------
}
