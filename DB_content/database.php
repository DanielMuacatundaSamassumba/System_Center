<?php
 class database{
    private $HOST = "localhost";
    private $DB = "system_center";
    private $USER = "root";
     private $PASSWORD="";
    private $CONNECTION;

 public  function __construct(){
  $this->Connect();
  }
    public function Connect(){
        try{
            $this->CONNECTION= new PDO("mysql:host=". $this->HOST .";dbname=".$this->DB ,$this->USER, $this->PASSWORD);
            $this->CONNECTION->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(Exception $e){
            die('ERROR' . $e->getMessage());
        }
    }
     public function executte($query,$param=[]){
        try {
           $statment= $this->CONNECTION->prepare($query);
           $statment->execute($param);
        }catch(Exception $e){
             die("ERROR".$e->getMessage());
        }
     }
     public function sign_up($values){

        $query= "INSERT INTO tbl_cadastros (Nome, Sobrenome, Bi_number, Email, Palavra_passe, Foto)  VALUES(?,?,?,?,?,?)";
       $this->executte($query, array_values($values));
    
     
    }
     public function Verify_user_account($value){
      
      $query = "SELECT Email FROM tbl_cadastros WHERE Email=:Email";
      $statment=$this->CONNECTION->prepare($query);
      $statment->bindValue(":Email",$value);
      $statment->execute();
      $show =$statment->fetchAll(PDO::FETCH_OBJ);
      return $show;
     }
     public function Login_auth($value){
 

        $query = "SELECT Palavra_passe FROM tbl_cadastros WHERE Email=:Email";
        $statment=$this->CONNECTION->prepare($query);
        $statment->bindValue(":Email",$value);
        $statment->execute();
        $show =$statment->fetchAll(PDO::FETCH_OBJ);
        return $show;
     }
    public function Get_user_info($value){
      $query = "SELECT  Nome,Sobrenome,Bi_number, Email,Foto FROM tbl_cadastros WHERE Email=:Email";
      $statment=$this->CONNECTION->prepare($query);
      $statment->bindValue(":Email",$value);
      $statment->execute();
      $show =$statment->fetchAll(PDO::FETCH_OBJ);
      return $show;
    }
     public function insert_course($values){
      $query= "INSERT INTO tbl_cursos (Nome_curso,Turno,Turma,Preco)  VALUES(?,?,?,?)";
      $this->executte($query, array_values($values));
     }
      public function show_course() {
         $query ="SELECT * FROM tbl_cursos";
         $statment= $this->CONNECTION->prepare($query);
         $statment->execute();
          $show= $statment->fetchAll(PDO::FETCH_OBJ);
          return $show;
      }
       public function delete_course($value){
         $query = "DELETE FROM tbl_cursos WHERE ID=$value";
         $this->executte($query);

       }
       public function Update_show($value){
         $query = "SELECT Nome_curso,Turno,Turma,preco FROM tbl_cursos WHERE ID=$value";
         $statment= $this->CONNECTION->prepare($query);
         $statment->execute();
         $show= $statment->fetchAll(PDO::FETCH_OBJ);
          return $show;
       }
        public function Update_course($where,$values){
         $filds = array_keys($values);
         $query ='UPDATE  tbl_cursos SET '.implode("=?,",$filds).'=? WHERE ID='.$where;
         $this->executte($query, array_values($values));
     
        }
         public function GetID_Course($value){
            $query ="SELECT ID FROM tbl_cursos WHERE Nome_curso=:Nome_curso";
            $statment=$this->CONNECTION->prepare($query);
            $statment->bindValue(":Nome_curso",$value);
            $statment->execute();
            $all=$statment->fetchAll(PDO:: FETCH_OBJ);
            return $all;
         }
         public function Validation_course($name_curse, $turno){
            $query ="SELECT ID FROM tbl_cursos WHERE Nome_curso=:Nome_curso AND Turno=:Turno";
            $statment=$this->CONNECTION->prepare($query);
            $statment->bindValue(":Nome_curso",$name_curse);
            $statment->bindValue(":Turno",$turno);
            $statment->execute();
            $all=$statment->fetchAll(PDO:: FETCH_OBJ);
            return $all;
         }
         public function InserT_student($values){
            $query= "INSERT INTO tbl_alunos (Nome,Sobrenome, Bi_number,Foto, id_curso,Datad)  VALUES(?,?,?,?,?,?)";
            $this->executte($query, array_values($values));
         }
          public function BI_number_validation($value){
            $query="SELECT ID_aluno FROM tbl_alunos WHERE Bi_number=:Bi_number";
            $statment=$this->CONNECTION->prepare($query);
            $statment->bindValue(":Bi_number",$value);
            $statment->execute();
            $all=$statment->fetchAll(PDO:: FETCH_OBJ);
            return $all;
          }
           public function Show_stundents(){
            $query="SELECT * FROM tbl_alunos INNER JOIN tbl_cursos ON tbl_alunos.id_curso=tbl_cursos.ID";
            $statment=$this->CONNECTION->prepare($query);
            $statment->execute();
            $all =$statment->fetchAll(PDO::FETCH_OBJ);
            return $all;
           }
           public function delete_studant($value){
            $query = "DELETE FROM tbl_alunos WHERE ID_aluno=$value";
            $this->executte($query);
   
          }
          public function show_one_studant($value){
            $query ="SELECT  * FROM tbl_alunos WHERE ID_aluno=:ID_aluno";
            $statment=$this->CONNECTION->prepare($query);
            $statment->bindValue(":ID_aluno",$value);
            $statment->execute();
            $all=$statment->fetchAll(PDO:: FETCH_OBJ);
            return $all;
          }
           public function Update_studant($where,$values){

               $filds = array_keys($values);
               $query ='UPDATE  tbl_alunos SET '.implode("=?,",$filds).'=? WHERE ID_aluno='.$where;
               $this->executte($query, array_values($values));
           
              
           }
        public function Search_studant($value){
         $query="SELECT * FROM tbl_alunos INNER JOIN tbl_cursos ON tbl_alunos.id_curso=tbl_cursos.ID AND Bi_number=:Bi_number";
         $statment=$this->CONNECTION->prepare($query);
         $statment->bindValue(":Bi_number",$value);
         $statment->execute();
         $all=$statment->fetchAll(PDO:: FETCH_OBJ);
         return $all;
        }
        public function insert_teachers($values){
         $query= "INSERT INTO tbl_professores (Nome,Sobrenome, Bi_number,Foto, id_curso)  VALUES(?,?,?,?,?)";
            $this->executte($query, array_values($values));
        }
        public function BI_number_validation_T($value){
         $query="SELECT ID_formador FROM tbl_professores WHERE Bi_number=:Bi_number";
         $statment=$this->CONNECTION->prepare($query);
         $statment->bindValue(":Bi_number",$value);
         $statment->execute();
         $all=$statment->fetchAll(PDO:: FETCH_OBJ);
         return $all;
       }
        public function Teacher_validation_M(){
         $query ="SELECT Turno, Nome_curso FROM tbl_cursos INNER JOIN tbl_professores  ON tbl_professores.id_curso=tbl_cursos.ID AND  Turno = 'M'";
         $statment=$this->CONNECTION->prepare($query);
         $statment->execute();
         $all=$statment->fetchAll(PDO:: FETCH_OBJ);
         return $all;
        }
        public function Teacher_validation_T(){
         $query ="SELECT Turno, Nome_curso FROM tbl_cursos INNER JOIN tbl_professores  ON tbl_professores.id_curso=tbl_cursos.ID AND  Turno = 'T'";
         $statment=$this->CONNECTION->prepare($query);
         $statment->execute();
         $all=$statment->fetchAll(PDO:: FETCH_OBJ);
         return $all;
        }
        public function show_teachers(){
         $query ="select * from tbl_professores inner join tbl_cursos on tbl_professores.id_curso=tbl_cursos.id";
         $statment=$this->CONNECTION->prepare($query);
         $statment->execute();
         $all=$statment->fetchAll(PDO:: FETCH_OBJ);
         return $all;
        }
         public function Delete_teachers($value){
            $query = "DELETE FROM tbl_professores WHERE ID_formador=$value";
            $this->executte($query);
         }
         public function Select_one_teacher($value){
            $query="select * from tbl_professores inner join tbl_cursos on tbl_professores.id_curso=tbl_cursos.id AND ID_formador=$value";
            $statment=$this->CONNECTION->prepare($query);
            $statment->execute();
            $all=$statment->fetchAll(PDO:: FETCH_OBJ);
            return $all;
         }
          public function update_teacher($where,$values){
            $filds = array_keys($values);
            $query ='UPDATE  tbl_professores SET '.implode("=?,",$filds).'=? WHERE ID_formador='.$where;
      $this->executte($query, array_values($values));
          }
           public function user_data($value){
            $query ="SELECT  * FROM tbl_cadastros WHERE Email=:Email";
            $statment=$this->CONNECTION->prepare($query);
            $statment->bindValue(":Email",$value);
            $statment->execute();
            $all=$statment->fetchAll(PDO:: FETCH_OBJ);
            return $all;
           }
            public function getId_user($value){
               $query ="SELECT  ID FROM tbl_cadastros WHERE Email=:Email";
               $statment=$this->CONNECTION->prepare($query);
               $statment->bindValue(":Email",$value);
               $statment->execute();
               $all=$statment->fetchAll(PDO:: FETCH_OBJ);
               return $all;
            }
           public function update_user($where,$values){
            $filds = array_keys($values);
            $query ='UPDATE  tbl_cadastros SET Nome=?,Sobrenome=?,Bi_number =?,Foto=?  WHERE ID='.$where;
      $this->executte($query, array_values($values));
          }
          public function All_money(){
            $query="SELECT  SUM(preco) FROM tbl_alunos INNER JOIN tbl_cursos ON tbl_alunos.id_curso=tbl_cursos.ID";
         $statment=$this->CONNECTION->prepare($query);
         $statment->execute();
         $all=$statment->fetchAll(PDO:: FETCH_ASSOC);
         return $all;
          }
          public function Resume_studate ($value){
            $query="SELECT * FROM tbl_alunos INNER JOIN tbl_cursos ON tbl_alunos.id_curso=tbl_cursos.ID where  Datad=:Datad order by Nome limit 6 ";
            $statment=$this->CONNECTION->prepare($query);
            $statment->bindValue(":Datad",$value);
            $statment->execute();
            $all=$statment->fetchAll(PDO:: FETCH_OBJ);
            return $all;
          }
           public function Course_resume(){
            $query =" SELECT * FROM tbl_cursos order by Nome_curso limit 6";
            $statment= $this->CONNECTION->prepare($query);
            $statment->execute();
             $show= $statment->fetchAll(PDO::FETCH_OBJ);
             return $show;
           }
 }
 

 


  
 