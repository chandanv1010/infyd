<?php

namespace App\Services\V1\Customer;
use App\Services\V1\BaseService;
use App\Repositories\Customer\CustomerRepository;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

/**
 * Class CustomerService
 * @package App\Services
 */
class CustomerService extends BaseService
{
    protected $customerRepository;
    

    public function __construct(
        CustomerRepository $customerRepository
    ){
        $this->customerRepository = $customerRepository;
    }

    public function paginate($request){
        $condition['keyword'] = addslashes($request->input('keyword'));
        $condition['publish'] = $request->integer('publish');
        $perPage = $request->integer('perpage');
        $customers = $this->customerRepository->customerPagination(
            $this->paginateSelect(), 
            $condition, 
            $perPage,
            ['path' => 'customer/index'], 
        );
        
        return $customers;
    }
 

    public function create($request){
        DB::beginTransaction();
        try{
            $payload = $request->except(['_token','send','re_password']);
            
            // Xử lý birthday nếu có
            if(isset($payload['birthday']) && ($payload['birthday'] != null)){
                $payload['birthday'] = $this->convertBirthdayDate($payload['birthday']);
            }
            
            // Đảm bảo customer_catalogue_id luôn có giá trị
            if(!isset($payload['customer_catalogue_id']) || empty($payload['customer_catalogue_id'])){
                $payload['customer_catalogue_id'] = 1;
            }
            
            // Đảm bảo publish có giá trị
            if(!isset($payload['publish'])){
                $payload['publish'] = 2; // 2 = active
            }
            
            // Hash password
            if(isset($payload['password']) && !empty($payload['password'])){
                $payload['password'] = Hash::make($payload['password']);
            } else {
                throw new \Exception('Mật khẩu không được để trống');
            }
            
            // Tạo customer
            $customer = $this->customerRepository->create($payload);
            
            DB::commit();
            return $customer;
        }catch(\Illuminate\Database\QueryException $e ){
            DB::rollBack();
            Log::error('Customer registration database error: ' . $e->getMessage());
            throw new \Exception('Lỗi cơ sở dữ liệu: ' . $e->getMessage());
        }catch(\Exception $e ){
            DB::rollBack();
            Log::error('Customer registration error: ' . $e->getMessage());
            throw $e;
        }
    }


    public function update($id, $request){
        DB::beginTransaction();
        try{
            $payload = $request->except(['_token','send']);
            if(isset($payload['birthday']) && $payload['birthday'] != null){
                $payload['birthday'] = $this->convertBirthdayDate($payload['birthday']);
            }

            // Handle password update
            if(isset($payload['new_password']) && !empty($payload['new_password'])){
                $payload['password'] = Hash::make($payload['new_password']);
                unset($payload['old_password']);
                unset($payload['new_password']);
                unset($payload['re_new_password']);
            } else {
                // Don't update password if not provided
                unset($payload['password']);
                unset($payload['old_password']);
                unset($payload['new_password']);
                unset($payload['re_new_password']);
            }

            $customer = $this->customerRepository->update($id, $payload);
            DB::commit();
            return true;
        }catch(\Exception $e ){
            DB::rollBack();
            // Log::error($e->getMessage());
            echo $e->getMessage();die();
            return false;
        }
    }

    public function destroy($id){
        DB::beginTransaction();
        try{
            $customer = $this->customerRepository->delete($id);

            DB::commit();
            return true;
        }catch(\Exception $e ){
            DB::rollBack();
            // Log::error($e->getMessage());
            echo $e->getMessage();die();
            return false;
        }
    }

   
    private function convertBirthdayDate($birthday = ''){
        $carbonDate = Carbon::createFromFormat('Y-m-d', $birthday);
        $birthday = $carbonDate->format('Y-m-d H:i:s');
        return $birthday;
    }


    public function statistic(){

        return [
            'totalCustomers' => $this->customerRepository->totalCustomer(),
        ];

    }
    
    private function paginateSelect(){
        return [
            'id',
            // 'code', 
            'email', 
            'phone',
            'address', 
            'name',
            'publish',
            'customer_catalogue_id',
            'source_id',
        ];
    }


}
