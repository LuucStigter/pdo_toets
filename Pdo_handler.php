<?php 

Class Pdo_handler{

    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "pdo_toets";
    public $conn;
    public $logs = [];

    public function __construct()
    {
        try{
            $this->conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username,$this->password);
        
            // set the PDO error mode to exception
        
            $this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            array_push($this->logs, "connected succesfully");
        }
        catch(PDOException $e){
            array_push($this->logs,"connection failed: " . $e->getMessage());
            header("Location: ./index.php?err=con-failed");
        }

        
    }

    public function create($bodemformaat,$saus,$pizzatoppings,$kruiden){

        $kruiden = "";
            
            if(isset($_POST["Peterselie"])){
                $kruiden.= "Peterselie ";
            }
            if(isset($_POST["Oregano"])){
                $kruiden.= "Oregano ";
            }
            if(isset($_POST["Chili flakes"])){
                $kruiden.= "Chili flakes ";
            }
            if(isset($_POST["Zwarte paper"])){
                $kruiden.= "Zwarte paper ";
            }

        try{
            $sql = $this->conn->prepare("INSERT INTO pizza (bodemformaat, saus, pizzatoppings, kruiden)
            VALUES (:bodemformaat, :saus, :pizzatoppings, :kruiden)");

            $sql->bindParam(':bodemformaat', $bodemformaat);
            $sql->bindParam(':saus', $saus);
            $sql->bindParam(':pizzatoppings', $pizzatoppings);
            $sql->bindParam(':kruiden', $kruiden);

            $sql->execute();

            header("location: ./read.php");
        }
        catch(PDOException $e){
            array_push($this->logs,"inserting failed" . $e->getMessage());
            header("Location: ./index.php?err=create-failed");
        }  
    }

    public function read(){
        try{
            $sql = $this->conn->prepare("SELECT * FROM pizza");
            $sql->execute();

            $result = $sql->setFetchMode(PDO::FETCH_ASSOC);

            $records = "";
            while($record = $sql->fetch()){
                $records .= "<tr>
                <th scope='row'>" . $record["id"] . "</th>
                <td> " . $record["bodemformaat"] . "</td>
                <td> " . $record["saus"] . "</td>
                <td> " . $record["pizzatoppings"] . "</td>
                <td> " . $record["kruiden"] . "</td>
                <td>
                    <a href='./update.php?id=" . $record['id'] . "'>
                    <img src='/icons/b_edit.png' alt='pencil'>
                    </a>
                </td>
                <td>
                    <a href='./delete.php?id=" . $record['id'] . "'>
                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-x' viewBox='0 0 16 16'>
                            <path d='M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z'/>
                        </svg>
                    </a>
                </td>   
                </tr>";
            }
            return $records;

        }catch(PDOException $e){
            array_push($this->logs,"reading failed" . $e->getMessage());
        }
    }

    public function getInfoById($id){
        try{
        $id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);

        $sql = $this->conn->prepare("SELECT * FROM pizza WHERE id = $id");
        $sql->execute();

        $result = $sql->setFetchMode(PDO::FETCH_ASSOC);

        return $sql->fetch();

        }
        catch(PDOException $e){
            array_push($this->logs, "getting info failed" . $e->getMessage());
            header("Location: ./index.php?err=update-failed");
        }


    }

    public function update(){
        try{
            $bodemformaat = filter_var($_POST["bodemformaat"], FILTER_SANITIZE_STRING);
            $saus = filter_var($_POST["saus"], FILTER_SANITIZE_STRING);
            $pizzatoppings = filter_var($_POST["pizzatoppings"], FILTER_SANITIZE_STRING);
            $kruiden = filter_var($_POST["kruiden"], FILTER_SANITIZE_STRING);
            $id = filter_var($_POST["id"], FILTER_SANITIZE_NUMBER_INT);


            $sql = $this->conn->prepare("UPDATE `pizza` SET `bodemformaat` = :bodemformaat ,`saus` = :saus ,`pizzatoppings` = :pizzatoppings, `kruiden` = kruiden WHERE `pizza`.`id` = $id;");

            $sql->bindParam(':bodemformaat', $bodemformaat);
            $sql->bindParam(':saus', $saus);
            $sql->bindParam(':pizzatoppings', $pizzatoppings);
            $sql->bindParam(':kruiden', $kruiden);
            
            
            $sql->execute();

            header("Location: ./index.php?err=update-success");

        }catch(PDOException $e){
            array_push($this->logs, "updating failed" . $e->getMessage());
            //header("Location: ./index.php?err=update-failed");
        }
    }

    public function delete(){
        try{
            $id = filter_var($_POST["id"], FILTER_SANITIZE_NUMBER_INT);

            $sql = $this->conn->prepare("DELETE FROM pizza WHERE id = :id");

            $sql->bindParam(":id", $id);

            $sql->execute();

            header("Location: ./index.php?err=deleting-success");
        }
        catch(PDOException $e){
            array_push($this->logs, "deleting failed" . $e->getMessage());
            header("Location: ./index.php?err=deleting-failed");
        }
    }

    public function sanitize($raw_data) {
        $data = filter_var($raw_data, FILTER_SANITIZE_STRING);
        $data = trim($data);
        return $data;
      }

}