<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Add extends MY_User_Controller {
	
	public function index($EvenementID = null, $GroupesId = null)
	{      
        $tabEventGroupe['evenement_id'] = $EvenementID;
        $tabEventGroupe['groupes_id']   = $GroupesId;
        $tabEventGroupe['status']       = 2;


         if($this->events_groupes->insert($tabEventGroupe)){

                 $this->flash->setFlash("Votre groupe fait maintenent partis de l'evenement", VALIDATION_MESSAGE);
                 return redirect('user/event/detail/'.$EvenementID);

            }else{

                $this->flash->setFlash("Erreur lors de la participation à l'evenement", VALIDATION_MESSAGE_ERROR);
                return redirect('user/groupe/'.$GroupesId);
         }



    }
}