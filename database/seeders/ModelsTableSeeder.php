<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;

class ModelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'name' => 'User', 'friendly' => 'Manage Users'],
            ['id' => 2, 'name' => 'Role', 'friendly' => 'Manage Roles'], 
            ['id' => 3, 'name' => 'Country', 'friendly' => 'Manage Countries'], 
            ['id' => 4, 'name' => 'Insurercompany', 'friendly' => 'Manage Insurer Companies'], 
            ['id' => 5, 'name' => 'Status', 'friendly' => 'Manage Statuses'], 
            ['id' => 6, 'name' => 'Paymentmode', 'friendly' => 'Manage Payment Modes'], 
            ['id' => 7, 'name' => 'Policytype', 'friendly' => 'Manage Policy Types'], 
            ['id' => 8, 'name' => 'Productcategory', 'friendly' => 'Manage Product Categories'],
            ['id' => 9, 'name' => 'Product', 'friendly' => 'Manage Products'],
            ['id' => 10, 'name' => 'Client', 'friendly' => 'Manage Clients'],
            ['id' => 11, 'name' => 'Insurance_policy', 'friendly' => 'Manage Insurance Policies'], 


        ];

        foreach ($items as $item) {

            $matchThese=['id'=>$item['id']];

            \App\Models\Mo::updateOrCreate($matchThese,$item);           

            
        }
    }
}
