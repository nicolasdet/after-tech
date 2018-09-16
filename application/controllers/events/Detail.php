<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Detail extends MY_User_Controller {
	
	# $id = id du groupe de l'event à crée
	public function index($id = null)
	{   

        $ActualEvent = $this->events->get($id);
        # si on est membre du groupe qui participe à l'event
        $eventGroupes = $this->events_groupes->with_groupe()->where(['evenement_id' => $id])->get_all();

        #de($eventGroupes);
        # on récupére un tableau des groupes participants à l'evenement
        $idGroupes = array();
        foreach ($eventGroupes as &$UnEventGroupe) {
            $UnEventGroupe->membres = $this->user_groupes->getUsersGroupe($UnEventGroupe->groupes_id);
            array_push($idGroupes, $UnEventGroupe->groupes_id);
        }

        #de($eventGroupes);

        # si il est membre
        if(!$this->isMemberOfEvent($idGroupes)){
            $this->flash->setFlash("Vous ne faite pas parti de l'evenement", VALIDATION_MESSAGE_ERROR);
            return redirect('/user/groupe/');
        }



        # on charge les info de l'event
        $getUpdateEventForm         = getUpdateEventForm(true, $ActualEvent);


        # on affiche
        $this->theme->data('getUpdateEventForm', $getUpdateEventForm);
        $this->theme->data('eventGroupes', $eventGroupes);
        $this->theme->data('ActualEvent', $ActualEvent);
        $this->render('events/detail');

	}

    public function isMemberOfEvent($idGroupes){
                // on Test si le user fait partis de groupes (au cas ou)
        $Member = false;
        foreach ($idGroupes as $unGroupe) {

            if($this->user_groupes->isAdmin($unGroupe, $this->session->userdata('user'))){
               return  true;
            }
        }
    }
}