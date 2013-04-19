<?php

namespace Deone\Handlers;

class Router {
	public function getRoute() {
		$routingFile = json_decode(file_get_contents('config/routes.json'),true);

		if ($routingFile !== null)
		{
			$requestURI = explode('/', $_SERVER['REQUEST_URI']);
			$scriptName = explode('/',$_SERVER['SCRIPT_NAME']);
			
			// Refactor needed here.

			for($i= 0;$i < sizeof($scriptName);$i++)
			{
				if ($requestURI[$i] == $scriptName[$i])
				{
					unset($requestURI[$i]);
				}
			}
			 
			$command = array_values($requestURI);
			$command = implode('',$command);

			foreach ($routingFile as $route)
			{
				if (preg_match($route['regex'],$command))
				{
					return $command;
				}
			}
		}
		else
		{
			return null;
		}
	}
}

?>