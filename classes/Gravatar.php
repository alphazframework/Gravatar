<?php 
namespace App\Components\gravatar\classes;
use Zest\Mail\Mail;

class Gravatar
{
	const URL = "http://www.gravatar.com/avatar/";

	private $rating = ["G","PG","R","A"];

	protected $properties = [
        "gravatar_id"    => NULL,
        "default"        => NULL,
        "size"            => 80,
        "rating"        => NULL,
        "border"        => NULL,		
	];
	protected $email = '';
	protected $extra = '';
	public function __construct($email=NULL, $default=NULL) 
	{
        $this->setEmail($email);
        $this->setDefault($default);
	}
	private function setEmail($email)
	{
		$mail = new Mail();
		if ((new Mail())->isValidEmail($email)) {
			$this->email = $email;
			$this->properties['gravatar_id'] = trim(md5(strtolower($email)));
		}
	}
	public function setDefault($default)
	{
		if (!empty($default)) 
			$this->properties['default'] = $default;
	}
	public function setSize($size) 
	{
		if ($size > 0) 
			$this->properties['size'] = $size;
	}
	public function setRating() 
	{
		return (is_array($rating,$this->rating)) ? $this->properties['rating'] = $rating : false;
	}
	public function getSrc()
	{
		$url = self::URL . "?";
		$f = true;
		foreach ($this->properties as $key => $value) {
			if (isset($value) && !empty($value)) {
				if (!$first) 
					$url .= "&";
				$url .= $key."=".urlencode($value);
				$f = false;
			}
		}
		return $url;
	}
	public function toHtml()
	{
		return '<img src="'. $this->getSrc() .'"' .(!isset($this->size) ? "" : ' width="'.$this->size.'" height="'.$this->size.'"').$this->extra.' />'; 
	}
	public function __toString(){
		return $this->toHtml();
	}
}