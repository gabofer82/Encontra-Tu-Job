<?php
class WidgetController extends ControllerBase
{
	/*public function __construct()
	{
		
	}	
	*/
	public function add_html_header()
	{
		$this->view->show('header.php');
	}
	
	public function add_user_bar()
    {
        $this->view->show('user-bar.php');
    }
	
	public function add_content()
	{
		$this->view->show('content.php');
	}
	
	public function add_footer()
	{
		$this->view->show('footer.php');
	}
}
?>