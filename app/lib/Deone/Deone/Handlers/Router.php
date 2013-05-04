<?php

namespace Deone\Handlers;

class Router {
	/**
	 * Takes the non-rewrited URL and process it, to be analysed.
	 */
	public function rawUrl() {
		$requestURI = explode('/',$_SERVER['REQUEST_URI']);
		$scriptName = explode('/',$_SERVER['SCRIPT_NAME']);

		$scriptNameCnt = count($scriptName);

		for($i= 0;$i < $scriptNameCnt;$i++)
		{
			if ($requestURI[$i] == $scriptName[$i])
			{
				unset($requestURI[$i]);
			}
		}
		 
		$argsArray = array_values($requestURI);

		if (is_string($argsArray))
		{
			return $argsArray;
		}
		else {
			return implode('/',$argsArray);
		}
	}

	public function getRoute($rawUrl) {
		$routingFile = json_decode(file_get_contents('config/routes.json'),true);

		if ($routingFile !== null)
		{
			foreach ($routingFile as $route)
			{
				if (preg_match($route['regex'],$rawUrl,$matches) === 1)
				{	
					foreach ($matches as $match) {
						
					}
					return 'app/module/'.$route['controller'];
					return true;
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