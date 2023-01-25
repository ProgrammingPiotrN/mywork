<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Coupon;

class CouponTest extends TestCase
{
    public function test_is_coupon_valid()
    {
        $coupon = new Coupon();

        $coupon->setAttribute('validity_coupon', now()->addDays(25));

        $this->assertTrue($coupon->getIsValidAttribute());

    }

    public function test_is_coupon_invalid()
    {
        $coupon = new Coupon();

        $coupon->setAttribute('validity_coupon', now()->subDays(3));

        $this->assertFalse($coupon->getIsValidAttribute());

    }
}
