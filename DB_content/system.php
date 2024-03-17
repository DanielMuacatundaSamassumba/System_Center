<?php
require("database.php");
class system
{
  public $id;
  public $id_user;
  public $Nome = "user";
  public $Nome_studant;
  public $sobrenome = "user_1";
  public $sobrenome_studant;
  public $Bi_number_studant;
  public $foto_studant;
  public $email;
  public $Bi_number = "000000000";
  public $password;
  public $foto = "C:\Users\Coding\Pictures\Screenshots/Captura de Ecrã (5)";
  public $nome_curso;
  public $turno_curso;
  public $turma_curso;
  public $preco_curso;
   public $data;
  public function users()
  {
    $database = new database();
  $database->sign_up([
      'Nome' => "$this->Nome",
      'Sobrenome' => "$this->sobrenome",
      'Bi_number' => "$this->Bi_number",
      ' Email' => "$this->email",
      'Palavra_passe' => password_hash($this->password, true),
      'Foto' => "$this->foto",
    ]);
  }
  public function Auth_login()
  {
    $database = new database();
    return $database->Login_auth("$this->email");


  }
  public function verify_user()
  {
    $database = new database();
    return $database->Verify_user_account($this->email);
  }
  public function user_info()
  {
    $database = new database();
    return $database->Get_user_info($this->email);
  }
  public function Curso_add()
  {
    $database = new database();
    $database->insert_course(
      [
        'Nome_curso' => "$this->nome_curso",
        'Turno' => "$this->turno_curso",
        'Turma' => "$this->turma_curso",
        'Preco' => "$this->preco_curso",
      ]
    );
  }
  public function Todos_cursos()
  {
    $database = new database();
    return $database->show_course();

  }
  public function Delete_course()
  {
    $database = new database();
    $database->delete_course($this->id);
  }
  public function Updt_course()
  {
    $database = new database();
    return $database->Update_show($this->id);
  }
  public function Updt_c()
  {
    $database = new database();
    return $database->Update_course($this->id, [
      'Nome_curso' => "$this->nome_curso",
      'Turno' => "$this->turno_curso",
      'Turma' => "$this->turma_curso",
      'Preco' => "$this->preco_curso",
    ]);

  }
  public function Id_Course()
  {
    $database = new database();
    $this->id = $database->GetID_Course("$this->nome_curso");
  }
  public function Validation_C()
  {
    $database = new database();
    return $database->Validation_course("$this->nome_curso", "$this->turno_curso");
  }
  public function Inscription_student()
  {
    $database = new database();
    return $database->InserT_student([
      'Nome' => "$this->Nome_studant",
      'Sobrenome' => "$this->sobrenome_studant",
      'Bi_number' => "$this->Bi_number_studant",
      'Foto' => "$this->foto_studant",
      'id_curso' => "$this->id",
      'Datad'=>"$this->data",
    ]);
  }
  public function bi_validation()
  {
    $database = new database();
    return $database->BI_number_validation("$this->Bi_number_studant");
  }
  public function all_studant()
  {
    $database = new database();
    return $database->Show_stundents();
  }
  public function Delete_S()
  {
    $database = new database();
    $database->delete_studant("$this->id");
  }
  public function show_o()
  {
    $database = new database();
    return $database->show_one_studant("$this->id");
  }
  public function update_s($id)
  {
    $database = new database();
    $database->Update_studant($id,[
      'Nome' => "$this->Nome_studant",
      'Sobrenome' => "$this->sobrenome_studant",
      'Bi_number' => "$this->Bi_number_studant",
      'Foto' => "$this->foto_studant",
      'id_curso' => "$this->id",
    ]);
  }
   public function search_s(){
    $database = new database();
   return  $database->Search_studant("$this->Bi_number_studant");
   }
    public function insert_T(){
      $database = new database();
    return $database->insert_teachers([
      'Nome' => "$this->Nome_studant",
      'Sobrenome' => "$this->sobrenome_studant",
      'Bi_number' => "$this->Bi_number_studant",
      'Foto' => "$this->foto_studant",
      'id_curso' => "$this->id",
    ]);
    }
     public function validation_bi_T(){
      $database = new database();
      return $database->BI_number_validation_T("$this->Bi_number_studant");
     }
      public function Validation_teacher(){
        $database = new database();
        return $database->Teacher_validation_M();
      }
      public function Validation_teacher_T(){
        $database = new database();
        return $database->Teacher_validation_T();
      }
       public function All_teachers(){
        $database = new database();
       return $database->show_teachers();
       }
        public function Delete_t(){
          $database = new database();
          $database->Delete_teachers("$this->id");
        }
         public function select_one_T(){
          $database = new database();
         return  $database->Select_one_teacher("$this->id");
         }
          public function Update_T(){
            $database = new database();
     $database->update_teacher("$this->id_user",[
              'Nome' => "$this->Nome_studant",
              'Sobrenome' => "$this->sobrenome_studant",
              'Bi_number' => "$this->Bi_number_studant",
              'Foto' => "$this->foto_studant",
              'id_curso' => "$this->id",
            ]);
          }
          public function user_D(){
            $database = new database();
           return  $database->user_data("$this->email");
          }
          public function update_us(){
            $database = new database();
            $database->update_user("$this->id",[
              'Nome'=>"$this->Nome",
              'Sobrenome'=>"$this->sobrenome",
              'Bi_number '=>"$this->Bi_number ",
              'Foto'=>"$this->foto",
            ]);
          }
          public function getID_use(){
            $database = new database();
           return  $database->getId_user("$this->email");
          }
          public function AllMoney(){
            $database = new database();
            return $database->All_money();
          }
          public function Resume_s(){
            $database = new database();
            return $database->Resume_studate("$this->data");
            
          }
           public function Coure_S(){
            $database = new database();
          return $database->Course_resume();
           }
}