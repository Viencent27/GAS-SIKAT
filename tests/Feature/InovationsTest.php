<?php

namespace Tests\Feature;

use App\Models\Innovation;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class InovationsTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_create_inovation(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $InovationData = $this->InovationData();
        $response = $this->post(route('inovasi.store'), $InovationData); // Upload data inovasi

        $this->assertDatabaseHas('inovations', [    // Cek data yang dimasukkan ada di database
            'user_id' => $user->id,
            'title' => 'Test Inovation',
            'release_date' => '2023-01-01',
            'description' => 'This is a test inovation.',
            'link_video' => 'https://example.com/video',
            'category' => 'test1',
            'photo' => 'photos/' . $InovationData['photo']->hashName(),
        ]);
        $this->assertTrue(Storage::disk('public')->exists('photos/' . $InovationData['photo']->hashName()));    // Cek foto ada di disk public
        $response->assertStatus(200);
    }

    public function test_update_inovation_with_invalid_user(): void
    {
        $user1 = User::factory()->create();
        $this->actingAs($user1);
        $InovationData = $this->InovationData();
        $this->post(route('inovasi.store'), $InovationData);
        $inovation = Innovation::first();

        $user2 = User::factory()->create();
        $this->actingAs($user2);
        $response = $this->put(route('inovasi.update', ['id' => $inovation->id]), $this->InovationData([    // Update data inovasi
            'title' => 'Test Inovation Revision',
        ]));
        $response->assertStatus(403);
    }

    public function test_update_inovation_with_valid_user(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $InovationData = $this->InovationData();
        $this->post(route('inovasi.store'), $InovationData);

        $inovation = Innovation::first();
        $this->assertNotNull($inovation);
        $oldTitle = $inovation->title;
        $oldPhoto = $inovation->photo;
        $newPhoto = UploadedFile::fake()->image('newPhoto.jpg');
        $response = $this->put(route('inovasi.update', ['id' => $inovation->id]), $this->InovationData([    // Update data inovasi
            'title' => 'Test Inovation Revision',
            'photo' => $newPhoto,
        ]));
        
        $this->assertDatabaseHas('inovations', [    // Cek data yang diganti ada di database
            'user_id' => $user->id,
            'title' => 'Test Inovation Revision',
            'photo' => 'photos/' . $newPhoto->hashName(),
        ]);
        $this->assertDatabaseMissing('inovations', [    // Cek data lama tidak ada di database
            'title' => $oldTitle,
            'photo' => $oldPhoto,
        ]);
        $this->assertTrue(Storage::disk('public')->exists('photos/' . $newPhoto->hashName()));  // Cek foto baru ada di disk public
        $response->assertStatus(302);
        $response->assertRedirect(route('inovasi.detail', ['id' => $inovation->id]));
        $this->assertEquals(session('success'), 'Inovasi berhasil diperbarui.');
    }

    public function test_delete_inovation_with_invalid_user(): void
    {
        $user1 = User::factory()->create();
        $this->actingAs($user1);
        $InovationData = $this->InovationData();
        $this->post(route('inovasi.store'), $InovationData);    // Upload data inovasi
        $inovation = Innovation::first();

        $user2 = User::factory()->create();
        $this->actingAs($user2);
        $response = $this->delete(route('inovasi.destroy', ['id' => $inovation->id]));  // Hapus data inovasi
        $response->assertStatus(403);
    }

    public function test_delete_inovation_with_valid_user(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $InovationData = $this->InovationData();
        $this->post(route('inovasi.store'), $InovationData);
        $inovation = Innovation::first();

        $response = $this->delete(route('inovasi.destroy', ['id' => $inovation->id]));
        $this->assertFalse(Storage::disk('public')->exists($inovation->photo));  // Cek foto tidak ada di disk public
        $response->assertStatus(302);
        $response->assertRedirect(route('inovasi.search'));
        $this->assertEquals(session('success'), 'Inovasi berhasil dihapus.');
    }

    public function test_delete_inovation_with_admin(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $InovationData = $this->InovationData();
        $this->post(route('inovasi.store'), $InovationData);
        $inovation = Innovation::first();

        $admin = User::factory()->create(['role' => 'admin']);
        $this->actingAs($admin);
        $response = $this->delete(route('inovasi.destroy', ['id' => $inovation->id]));
        $this->assertFalse(Storage::disk('public')->exists($inovation->photo));  // Cek foto tidak ada di disk public
        $response->assertStatus(302);
        $response->assertRedirect(route('inovasi.search'));
        $this->assertEquals(session('success'), 'Inovasi berhasil dihapus.');
    }
    
    private function InovationData($overrides = [])
    {
        $photo = UploadedFile::fake()->image('photo.jpg');
        return array_merge([
            'title' => 'Test Inovation',
            'release_date' => '2023-01-01',
            'description' => 'This is a test inovation.',
            'link_video' => 'https://example.com/video',
            'category' => 'test1',
            'photo' => $photo,
        ], $overrides);
    }
}
