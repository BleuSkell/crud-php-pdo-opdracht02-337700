<?php
    class Chantal extends BaseController {
        private $chantalModel;

        public function __construct() {
            $this->chantalModel = $this->model('ChantalModel');
        }

        public function index() {
            $dataRows = '';       

            $data = [
                'title' => 'Bling Bling Nail Studio Chantal'
            ];

            $this->view('chantal/index', $data);
        }

        public function create()
        {
            $appointments = $this->chantalModel->getAppointments();

            $dataRows = '';

            foreach ($appointments as $appointment) {
                $dataRows .= "<tr> 
                                <td>$appointment->color1</td>
                                <td>$appointment->color2</td>
                                <td>$appointment->color3</td>
                                <td>$appointment->color4</td>
                                <td>$appointment->phone</td>
                                <td>$appointment->mail</td>
                                <td>$appointment->date</td>
                                <td>$appointment->treatment1</td>
                                <td>$appointment->treatment2</td>
                                <td>$appointment->treatment3</td>
                                <td>
                                    <a href='" . URLROOT . "/chantal/update/$appointment->ID'>
                                        test
                                    </a>
                                </td>
                             </tr>";
            }      

            if ($_SERVER["REQUEST_METHOD"] == "POST")
            {          
                
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    
                $result = $this->chantalModel->createAppointment($_POST);
            }
            
            $data = [
                'title' => 'Afspraken',
                'dataRows' => $dataRows
            ];
    
            $this->view('chantal/create', $data);
        }

        public function update($chantalID = NULL)
        {
            if ($_SERVER['REQUEST_METHOD'] == "POST")
            {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    
                $result = $this->chantalModel->updateAppointment($_POST);
    
                echo    "<div class='alert alert-success' role='alert'>
                            Het updaten is gelukt!                
                        </div>";
                
                header('Refresh:3; ' . URLROOT . '/chantal/create');
            }
    
    
            $result = $this->chantalModel->selectAppointment($chantalID);
    
            $data = [
                'title' => 'Wijzig record',
                'ID' => $result->ID,
                'color1' => $result->color1,
                'color2' => $result->color2,
                'color3' => $result->color3,
                'color4' => $result->color4,
                'phone' => $result->phone,
                'mail' => $result->mail,
                'date' => $result->date,
                'treatment1' => $result->treatment1,
                'treatment2' => $result->treatment2,
                'treatment3' => $result->treatment3
            ];
    
            $this->view("chantal/update", $data);
        }
    }
?>