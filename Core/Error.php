<?php
namespace Core;

class Error
{

	/* this converts all errors to exception by throwing an ErrorException
	*int $level Error level
	*string $message Error message
	*string $file Filename the error was raised in 
	*int $line Line number in the file
	*/

	public static function errorHandler($level, $message, $file, $line)
	{
		if(error_reporting() !== 0)//to keep the operator working
		{
			throw new \ErrorException($message,0,$level,$file,$line);
		}
	}

	public static function exceptionHandler($exception)
	{
		//if show errors is on it will show the error
		if (\App\Config::SHOW_ERRORS)
		{
			echo "<h1>Fatal error</h1>";
			echo "<p>Uncaught Exception: ". get_class($exception) . "</p>";
			echo "<p>Message: ".$exception->getMessage(). "</p>";
			echo "<p>Stack trace:<pre>".$exception->getTraceAsString() . "</pre></p>";
			echo "<p>Thrown in ". $exception->getFile() . " on line ". $exception->getLine(). "</p>";

		}
		//if show error is false it will show the normal error page and save the record to the log folder in a file
		else
		{
			$log = dirname(__DIR__).'/logs/' .date('Y-m-d'). '.txt';
			ini_set('error_log',$log);

		$message = "\nUncaught Exception: ". get_class($exception);
		$message .= "\nMessage: ".$exception->getMessage();
		$message .= "\nStack trace: ".$exception->getTraceAsString();
		$message .= "\nThrown in ". $exception->getFile() . " on line ". $exception->getLine();
		error_log($message);
		//here we can show user friendly page
		echo "<h1>An error occured</h1>";
		}
		
	}
}