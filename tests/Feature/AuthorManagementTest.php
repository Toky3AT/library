<?php

namespace Tests\Feature;

use App\Models\Author;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Carbon\Carbon;

class AuthorManagementTest extends TestCase
{
	use RefreshDatabase;

	/** @test */
	public function an_author_can_be_created()
	{
		// $this->withoutExceptionHandling();

		$this->post('/authors', $this->data());

		$author = Author::all();

		$this->assertCount(1, $author);	
		$this->assertInstanceOf(Carbon::class, $author->first()->dob);	
		$this->assertEquals('2014/16/03', $author->first()->dob->format('Y/d/m'));
	}

	/** @test */
	public function a_name_is_required()
	{
		// $this->withoutExceptionHandling();
		$response = $this->post('/authors', array_merge($this->data(), ['name' => '']));
		$response->assertSessionHasErrors(keys: 'name');		
	}

	/** @test */
	public function a_dob_is_required()
	{
		// $this->withoutExceptionHandling();
		$response = $this->post('/authors', array_merge($this->data(), ['dob' => '']));
		$response->assertSessionHasErrors(keys: 'dob');		
	}


	private function data()
	{
		return [
			'name' => 'Author Name',
			'dob' => '03/16/2014',
		];
	}
    
}
