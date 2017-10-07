<?php

namespace Talm\Page;

use \Anax\DI\InjectionAwareInterface;
use \Anax\DI\InjectionAwareTrait;

/**
 * A controller for the pages.
 */
class PageController implements InjectionAwareInterface
{
    use InjectionAwareTrait;


    public function flatFile()
    {
        //Get requested route
        $path = $this->di->get("request")->getRoute();

        // Check if route match existing file
        $file = $this->di->get("flatFile")->checkFlatFile($path);
        if (!$file) {
            return;
        }

        // Get content of file
        $content = $this->di->get("flatFile")->getContent($file);

        // Parse content
        $content = $this->di->get("textfilter")->parse($content, ["yamlfrontmatter", "shortcode", "markdown", "titlefromheader"]);

        // Add sidebar if specified
        if (isset($content->frontmatter["sidebar"])) {
            $sidebar = $content->frontmatter["sidebar"];
            $sidebarRegion = isset($content->frontmatter["sidebar_region"]) ? : "sidebar";
            $this->di->get("view")->add("sidebars/" . $sidebar, [], $sidebarRegion);
        }

        // Render a standard page using layout
        $this->di->get("view")->add("default1/article", [
            "content" => $content->text
        ]);
        $this->di->get("pageRender")->renderPage($content->frontmatter);
    }

    
    public function getIndex()
    {
        $this->di->get("view")->add("base/index", []);
        $this->di->get("pageRender")->renderPage(["title" => "Me-sidan"]);
    }


    public function getAbout()
    {
        $this->di->get("view")->add("base/about", []);
        $this->di->get("pageRender")->renderPage(["title" => "Om sidan"]);
    }
}
