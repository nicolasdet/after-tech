<?php
class Chat {

		protected $CI;

        public function __construct($config = array())
        {
			$this->CI =& get_instance();
			$this->CI->load->library('session');

            $this->CI->load->model('Salon', 'salon');
            $this->CI->load->model('Message', 'message');
            $this->CI->load->model('User', 'MYuser');

        }

        # crée un salon 
        public function setSalon($idGroupe = null, $idEvenement = null){
                
                if(!empty($idGroupe)){
                    $tabSalon['groupes_id'] = $idGroupe;
                    $tabSalon['type'] = 1;


                    if($this->CI->salon->insert($tabSalon)){
                        return true;
                    }
                    return false;

                }

                    $tabSalon['evenement_id'] = $idEvenement;
                    $tabSalon['type'] = 1;


                    if($this->CI->salon->insert($tabSalon)){
                        return true;
                    }
                    return false;
        } 

        public function getAllSalonByGroupe($idGroupe){

            $SalonActuel = $this->CI->salon->where(['groupes_id' => $idGroupe])->get();

            if(!$SalonActuel) {
                $this->setSalon($idGroupe);
                return $this->getAllSalonByGroupe($idGroupe);
            }

            return $SalonActuel;

        }
        # retourne les messages d'un salon ? 
        public function loadMessageBySalon($idSalon){
            $SalonActuel = $this->CI->message->with_user()->where(['salon_id' => $idSalon])->order_by('date', 'DESC')->get_all();
            $SalonActuel = json_encode($SalonActuel);
            echo $SalonActuel;
            die();
                
        }

        public function addMessageBySalon($idSalon, $idUser){

            $tabMessage['user_id']          = $idUser;
            $tabMessage['salon_id']         = $idSalon;
            $tabMessage['message_text']     = $this->CI->input->post('text');
            $tabMessage['date']             = date("Y-m-d H:i:s");

            $res = $this->CI->message->insert($tabMessage);
            return $res;
            die();
        }

        # set un message pour un salon et un user
        public static function SetMessageForGroupeUser($idSalon, $idUser){

            if(!empty($idSalon) && !empty($idUser)){



            }else {
                return false;
            }
        } 




}