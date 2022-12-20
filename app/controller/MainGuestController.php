<?php
require_once("../repositories/ItemRepository.php");

class MainGuestController
{
   
    public function main()
    {
        $repository = new ItemRepository();
        $items = $repository->getAll();


        require("../view/MainGuest.php");
        
        
        
    }
}

?>


<?php
if(isset($_POST['reg_button'])){
header("Location: http://www.example.com/page.php");
exit;
}