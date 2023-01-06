<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Package;

class PackageTest extends TestCase
{
    public function test_package_index_success()
    {
        $response = $this->get('/api/package');
        $response->assertStatus(200);
    }

    public function test_package_store_success()
    {
        $package = Package::factory()->make();

        $store = $this->postJson('/api/package', $package->toArray());
        $store->assertStatus(200);
        $store->assertJson([
            'message' => SUCCESS_MSG,
        ]);

        return (object) [
            'transactionId' => $store->getData()->data->transaction_id,
            'package' => $package,
        ];
    }

    /**
     * @depends test_package_store_success
     */
    public function test_package_show_success($data)
    {
        $show = $this->get('/api/package/' . $data->transactionId);
        $show->assertStatus(200);
    }

    /**
     * @depends test_package_store_success
     */
    public function test_package_update_patch_success($data)
    {
        $patch = $this->patchJson('/api/package/' . $data->transactionId, [
            'transaction_state' => 'UNPAID',
        ]);
        $patch->assertStatus(200);
        $patch->assertJson([
            'message' => SUCCESS_MSG,
        ]);
    }

    /**
     * @depends test_package_store_success
     */
    public function test_package_update_put_success($data)
    {
        $put = $this->putJson('/api/package/' . $data->transactionId, $data->package->toArray());
        $put->assertStatus(200);
        $put->assertJson([
            'message' => SUCCESS_MSG,
        ]);
    }

    /**
     * @depends test_package_store_success
     */
    public function test_package_destroy_success($data)
    {
        $delete = $this->deleteJson('/api/package/' . $data->transactionId);
        $delete->assertStatus(200);
        $delete->assertJson([
            'message' => SUCCESS_MSG,
        ]);
    }
}
