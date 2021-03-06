<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Billing\StripePaymentGateway;
use App\Billing\PaymentFailedException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Unit\Billing\PaymentGatewayContractTests;
/**
*@group integration
*/
class StripePaymentGatewayTest extends TestCase
{
  use PaymentGatewayContractTests;


  protected function getPaymentGateway()
  {
    return new StripePaymentGateway( config('services.stripe.secret') );
  }

  
  // private function lastCharge()
  // {
  //   return array_first(\Stripe\Charge::all(
  //     ["limit" => 1],
  //     ['api_key' => config('services.stripe.secret')]
  //   )['data']);
  // }
  //
  // private function newCharges()
  // {
  //   return \Stripe\Charge::all(
  //     [
  //       // "limit" => 1,
  //       "ending_before" => $this->lastCharge ? $this->lastCharge->id : null
  //       // "ending_before" => $this->lastCharge->id
  //     ],
  //     ['api_key' => config('services.stripe.secret')]
  //   )['data'];
  // }
  //
  // private function validToken()
  // {
  //   return \Stripe\Token::create([
  //     "card" => [
  //       "number" => "4242424242424242",
  //       "exp_month" => 1,
  //       "exp_year" => date('Y')+1,
  //       "cvc" => "123"
  //     ]
  //   ], ['api_key' => config('services.stripe.secret')])->id;
  // }
  //
  // protected function setUp()
  // {
  //   parent::setUp();
  //   $this->lastCharge = $this->lastCharge();
  // }



  // /** @test */
  // function charges_with_a_valid_payment_token_are_successful()
  // {
  //
  //   $paymentGateway = $this->getPaymentGateway();
  //
  //   $newCharges = $paymentGateway->newChargesDuring(function($paymentGateway) {
  //     $paymentGateway->charge(2500, $paymentGateway->getValidTestToken());
  //   });
  //
  //
  //   $this->assertCount(1, $newCharges);
  //   $this->assertEquals(2500, $newCharges->sum());
  //
  // }

  // /** @test */
  // function charges_with_an_invalid_payment_token_fail()
  // {
  //     try {
  //       $paymentGateway = new StripePaymentGateway(['api_key' => config('services.stripe.secret')]);
  //       $paymentGateway->charge(2500, 'invalid-payment_token');
  //     } catch(PaymentFailedException $e) {
  //       $this->assertCount(0, $this->newCharges());
  //       return;
  //     }
  //
  //   $this->fail("Charging with an invalid payment token did not throw a PaymentFailedException.");
  // }
}
