<?php

namespace App\Services;

use App\UserPmz;
use Illuminate\Support\Facades\DB;

class UserService 
{

  const SUCCESS = 'success';
  const DATA = 'data';
  const MESSAGE = 'message';
  const ERROR = 'error';
  /**
   * @var UserPmz
   */
  private $userPmz;

  public function __construct(UserPmz $userPmz)
  {
    $this->userPmz = $userPmz;
  }

  /**
   * @author Caio César Lacerda
   * @data 04/09/2019
   * @return retorna todos os usuarios da tabela
   */
  public function userList()
  {
    $user = $this->userPmz->all();

    return [
        self::SUCCESS => true,
        self::DATA => $user
    ];
  }

  /**
   * @author Caio César Lacerda
   * @data 04/09/2019
   * @return salva usuarios na tabela
   */
  public function userInsert($nome,$registro)
  {
    try {
      DB::BeginTransaction();
      $response = $this->userPmz->create([
        'nome' => $nome,
        'registro' => $registro
      ]);

      if (!$response) {
        throw new \Error('error ao cadastrar!');
      }
     
      DB::commit();
      return [
        self::SUCCESS => true,
        self::MESSAGE => 'Usuario inserido com sucesso!'
      ];
    } catch (\Throwable $exception) {
      DB::rollBack();
        return [
          self::SUCCESS => false,
          self::ERROR => $exception->getMessage()
        ];
    }  
 
  }

  /**
   * @author Caio César Lacerda
   * @data 04/09/2019
   * @return exclui usuarios na tabela user_pmzs
   */
  public function userDelete($id)
  {
    try {
      DB::BeginTransaction();
      $response = $this->userPmz->find($id);
      $response->delete();

      if (!$response) {
        throw new \Error('error ao excluir!');
      }
     
      DB::commit();
      return [
        self::SUCCESS => true,
        self::MESSAGE => 'Usuario excluído com sucesso!'
      ];
    } catch (\Throwable $exception) {
      DB::rollBack();
        return [
          self::SUCCESS => false,
          self::ERROR => $exception->getMessage()
        ];
    }  
 
  }

  /**
   * @author Caio César Lacerda
   * @data 04/09/2019
   * @return atualiza usuarios na tabela user_pmzs
   */
  public function userUpdate($id,$nome,$registro)
  {
    try {
      DB::BeginTransaction();
      $response = $this->userPmz->find($id);
      $response->update([
        'nome' => $nome,
        'registro' => $registro
      ]);

      if (!$response) {
        throw new \Error('error ao atualizar o registro!');
      }
     
      DB::commit();
      return [
        self::SUCCESS => true,
        self::MESSAGE => 'Usuario atualizado com sucesso!'
      ];
    } catch (\Throwable $exception) {
      DB::rollBack();
        return [
          self::SUCCESS => false,
          self::ERROR => $exception->getMessage()
        ];
    }  
 
  }

  /**
   * @author Caio César Lacerda
   * @data 04/09/2019
   * @return restaura usuarios na tabela user_pmzs
   */
  public function userRestore($id)
  {
    try {
      DB::BeginTransaction();
      $response = $this->userPmz->where('id',$id);
      $response->restore();
      if (!$response) {
        throw new \Error('error ao restaurar o registro!');
      }
     
      DB::commit();
      return [
        self::SUCCESS => true,
        self::MESSAGE => 'Usuario restaurado com sucesso!'
      ];
    } catch (\Throwable $exception) {
      DB::rollBack();
        return [
          self::SUCCESS => false,
          self::ERROR => $exception->getMessage()
        ];
    }  
 
  }
}
