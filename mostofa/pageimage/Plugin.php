<?php namespace Mostofa\Pageimage;

use Backend;
use Event;
use System\Classes\PluginBase;

/**
 * Page Image Plugin Information File
 */
class Plugin extends PluginBase
{


	/**
	 * Returns information about this plugin.
	 *
	 * @return array
	 */
	public function pluginDetails()
	{
		return [
			'name'        => 'Page Image',
			'description' => 'Create Page Based Background image from October CMS admin',
			'author'      => 'Golam Mostofa',
			'icon'        => 'icon-bars',
            'homepage'    => 'https://github.com/mostofa62/oc-page-image-plugin'
		];
	}


	public function register()
	{
	    Event::listen('backend.form.extendFields', function($widget) {
	        if (!$widget->model instanceof \Cms\Classes\Page) return;

	        $widget->addTabFields([
	            'settings[image_file]' => [
	                'label' => 'Page image',
	                'tab' => 'Image',
	                'field' => 'settings[image_file]',
	                'type' => 'mediafinder',
	                'comment' => 'Image url is available via the page settings under the name of image_file'
	            ],
	        ], 'primary');
	    });
	}

}