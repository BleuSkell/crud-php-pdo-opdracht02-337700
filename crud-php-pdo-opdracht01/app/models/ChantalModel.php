<?php
    class ChantalModel {
        private $db;

        public function __construct()
        {
            $this->db = new Database();
        }

        public function getAppointments() {
            $sql = "SELECT   ID
                            ,color1
                            ,color2
                            ,color3
                            ,color4
                            ,phone
                            ,mail
                            ,date
                            ,treatment1
                            ,treatment2
                            ,treatment3
                    FROM     afspraak";

            $this->db->query($sql);

            return $this->db->resultSet();
        }

        public function createAppointment($post) {
            $sql = "INSERT INTO afspraak   ( color1
                                            ,color2
                                            ,color3
                                            ,color4
                                            ,phone
                                            ,mail
                                            ,date
                                            ,treatment1
                                            ,treatment2
                                            ,treatment3) 
                    VALUES                (  :Color1
                                            ,:Color2
                                            ,:Color3
                                            ,:Color4
                                            ,:phone
                                            ,:mail
                                            ,:date
                                            ,:treatment1
                                            ,:treatment2
                                            ,:treatment3)";
            
            $this->db->query($sql);

            $this->db->bind(':Color1', $post['color1'], PDO::PARAM_STR);
            $this->db->bind(':Color2', $post['color2'], PDO::PARAM_STR);
            $this->db->bind(':Color3', $post['color3'], PDO::PARAM_STR);
            $this->db->bind(':Color4', $post['color4'], PDO::PARAM_STR);
            $this->db->bind(':phone', $post['phone'], PDO::PARAM_STR);
            $this->db->bind(':mail', $post['mail'], PDO::PARAM_STR);
            $this->db->bind(':date', $post['appointment'], PDO::PARAM_STR);

            $treatments = [
                ':treatment1' => $post['treatment1'] ?? 'false',
                ':treatment2' => $post['treatment2'] ?? 'false',
                ':treatment3' => $post['treatment3'] ?? 'false'
            ];
            
            foreach ($treatments as $treatmentOptions => $value) {
                $this->db->bind($treatmentOptions, $value, PDO::PARAM_STR);
            }

            $this->db->execute();
        }

        public function selectAppointment($chantalID)
        {
            $sql = "SELECT ID
                        ,color1
                        ,color2
                        ,color3
                        ,color4
                        ,phone
                        ,mail
                        ,date
                        ,treatment1
                        ,treatment2
                        ,treatment3
                    FROM  afspraak
                    WHERE ID = :id";
            

            $this->db->query($sql);

            $this->db->bind(':id', $chantalID, PDO::PARAM_INT);

            return $this->db->single();
        }

        public function updateAppointment($post)
        {
            $sql = "UPDATE afspraak 
                    SET     color1 = :Color1
                            ,color2 = :Color2
                            ,color3 = :Color3
                            ,color4 = :Color4
                            ,phone = :Phone
                            ,mail = :Mail
                            ,date = :Date
                            ,treatment1 = :Treatment1
                            ,treatment2 = :Treatment2
                            ,treatment3 = :Treatment3
                    WHERE  ID = :id";

            $this->db->query($sql);

            $this->db->bind(':Color1', $post['color1'], PDO::PARAM_STR);
            $this->db->bind(':Color2', $post['color2'], PDO::PARAM_STR);
            $this->db->bind(':Color3', $post['color3'], PDO::PARAM_STR);
            $this->db->bind(':Color4', $post['color4'], PDO::PARAM_INT);
            $this->db->bind(':Phone', $post['phone'], PDO::PARAM_INT);
            $this->db->bind(':Mail', $post['mail'], PDO::PARAM_STR);
            $this->db->bind(':Date', $post['appointment'], PDO::PARAM_STR);
            $this->db->bind(':id', $post['appointmentID'], PDO::PARAM_INT);

            $treatments = [
                ':Treatment1' => $post['treatment1'] ?? 'false',
                ':Treatment2' => $post['treatment2'] ?? 'false',
                ':Treatment3' => $post['treatment3'] ?? 'false'
            ];
            
            foreach ($treatments as $treatmentOptions => $value) {
                $this->db->bind($treatmentOptions, $value, PDO::PARAM_STR);
            }

            return $this->db->execute();
        }
    }
?>