<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Search extends MY_User_Controller {
	
	# $text = evenement à chercher
	public function index($text = null)
	{   
        if(empty($text)){
            echo json_encode('false');
            exit();
        }   

        $start  = !empty($this->input->get('start')) ? $this->input->get('start') : 0;
        $end    = !empty($this->input->get('end')) ? $this->input->get('end') : 3;
        $groupe = !empty($this->input->get('groupe')) ? $this->input->get('groupe') : 0;

        $retour = $this
        ->events
        ->where('evenement_nom like ', '%'.$text.'%')
        ->limit($end, $start)
        ->get_all();


	    echo json_encode($retour);
        exit();
	}

    public function ListeEvents()
    {   
        $groupe = !empty($this->input->get('groupe')) ? $this->input->get('groupe') : 0;

        $retour = $this
        ->events_groupes
        ->where('groupes_id', $groupe)
        ->get_all();

        
        echo json_encode($retour);
        exit();
    }
}



