<?php
namespace App\Http\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
class Home extends Model
{
    protected $tableName = 'test';
    public function getInfo($input){
        //添加数据
        $data['name']=$input['name'];
        $data['pwd']=$input['pwd'];
        return DB::table($this->tableName)->insert($data);
        // return $id = DB::table('reg')->insertGetId($data);
    }
    public function signInfo($name,$pwd){
        //登录验证
        $data = DB::table($this->tableName)->get()->toArray();
        foreach($data as $k=>$v){
            if($v->name == $name){
                if($v->pwd == $pwd){
                    Session::put('name', $name);
                    return 3;
                }else{
                    return 2;
                }
            }else{
                return 1;
            }
        }
    }
    public function showInfo(){
//        $page = isset($res->page) ? $res->page  : 1;
//        $pageSize = isset($res->pagesize) ? $res->pagesize : 10;
//        if(!is_numeric($page) || !is_numeric($pageSize)) {
//            return $this->json_echo(0,'数据不合法');
//        }
//        $offset = ($page - 1) * $pageSize;
        //查询所有数据
        return DB::table($this->tableName)->paginate(3);
    }
    public function delRow($id){
        //删除
        return DB::table($this->tableName)->where(['id'=>$id])->delete();
    }
    public function getRow($id){
        //查询一条数据
        $row=DB::table($this->tableName)->where(['id'=>$id])->first();
        $row->hobby=explode(',', $row->hobby);
        return $row;
    }
    public function saveRow($post){
        //修改数据
        $id=$post['id'];
        $data['username']=$post['username'];
        $data['sex']=$post['sex'];
        $data['hobby']=implode(',',$post['hobby']);
        $data['age']=$post['age'];
        return DB::table($this->tableName)->where(['id'=>$id])->update($data);
    }
    public function search($input){
        return DB::table($this->tableName)->where('name','like','%'.$input['name'].'%')->get();
    }
}
?>