<?php


use App\Models\ForecastMatch;

it('can delete forecast', function () {
   $user = actingAs();

   $ForecastMatch = ForecastMatch::factory()->create([
       'user_id' => $user->id
   ]);

    $this->assertDatabaseHas('forecast_matches', [
         'id' => $ForecastMatch->id
    ]);

    $response = $this->delete(route('forecast-match.destroy', $ForecastMatch->id));

    $response->assertStatus(200);

    expect($response['success'])->toBeTruthy();
    expect($response['message'])->toBe('Forecast deleted successfully');
});