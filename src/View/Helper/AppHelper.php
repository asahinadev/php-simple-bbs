<?php
declare(strict_types = 1);
namespace App\View\Helper;

use Cake\View\Helper;

/**
 * App helper
 *
 * @property \Cake\View\Helper\FormHelper $From
 * @property \Cake\View\Helper\HtmlHelper $Html
 */
class AppHelper extends Helper
{

    protected $helpers = [
        "Form",
        "Html"
    ];

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    public function navLink($controller, $template = false)
    {

        $view = $this->getView();


        if (strcmp($view->getName(), $controller) === 0) {
            if ($template === false) {
                return "nav-link active";
            }
            else if (strcmp($view->getTemplate(), $template) === 0) {
                return "nav-link active";
            }
        }
        return "nav-link ";

    }

    public function headerNav(array $list, array $options = [], array $itemOptions = []): string
    {

        return $this->Html->nestedList(
            //
            $list,
            //
            $options + [
                "class" => "navbar-nav mr-auto",
            ],
            //
            $itemOptions + [
                "class" => "nav-item",
            ]);

    }

    public function tabs(array $list, array $options = [], array $itemOptions = []): string
    {

        return $this->Html->nestedList(
            //
            $list,
            //
            $options + [
                "class" => "nav nav-tabs",
            ],
            //
            $itemOptions + [
                "class" => "nav-item",
            ]);

    }

    public function navItem($title, $controller, $action, $template = false, $path = false, $id = false)
    {

        if ($path === false) {
            $path = compact("controller", "action");

            if ($id !== false) {
                $path[] = $id;
            }
        }

        $class = $this->navLink($controller, $template);
        return $this->Html->link($title, $path, compact("class"));

    }

}
