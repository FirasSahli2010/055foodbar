<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $site_name
 * @property string|null $layout
 * @property string $contact_email
 * @property string|null $currecy_name
 * @property string|null $currency_icon
 * @property string $time_zone
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSetting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSetting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSetting query()
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSetting whereContactEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSetting whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSetting whereCurrecyName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSetting whereCurrencyIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSetting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSetting whereLayout($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSetting whereSiteName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSetting whereTimeZone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSetting whereUpdatedAt($value)
 */
	class GeneralSetting extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @method static \Illuminate\Database\Eloquent\Builder|ProductOption newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductOption newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductOption query()
 */
	class ProductOption extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $product_variant_id
 * @property string $name
 * @property float $price
 * @property int $is_default
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\product|null $product
 * @property-read \App\Models\productVariant|null $productVariant
 * @method static \Illuminate\Database\Eloquent\Builder|ProductVariantItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductVariantItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductVariantItem query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductVariantItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductVariantItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductVariantItem whereIsDefault($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductVariantItem whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductVariantItem wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductVariantItem whereProductVariantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductVariantItem whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductVariantItem whereUpdatedAt($value)
 */
	class ProductVariantItem extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string|null $image
 * @property string $name
 * @property string $email
 * @property string $role
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $icon
 * @property string $type
 * @property string $title
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|about newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|about newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|about query()
 * @method static \Illuminate\Database\Eloquent\Builder|about whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|about whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|about whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|about whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|about whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|about whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|about whereUpdatedAt($value)
 */
	class about extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|category query()
 * @method static \Illuminate\Database\Eloquent\Builder|category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|category whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|category whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|category whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|category whereUpdatedAt($value)
 */
	class category extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $code
 * @property int $quantity
 * @property int $max_use
 * @property string $start_date
 * @property string $end_date
 * @property string $discount_type
 * @property float $discount
 * @property int $status
 * @property int $total_used
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|coupon newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|coupon newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|coupon query()
 * @method static \Illuminate\Database\Eloquent\Builder|coupon whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|coupon whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|coupon whereDiscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|coupon whereDiscountType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|coupon whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|coupon whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|coupon whereMaxUse($value)
 * @method static \Illuminate\Database\Eloquent\Builder|coupon whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|coupon whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|coupon whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|coupon whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|coupon whereTotalUsed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|coupon whereUpdatedAt($value)
 */
	class coupon extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string $thumb_image
 * @property int $category_id
 * @property string|null $short_description
 * @property string|null $long_description
 * @property float $price
 * @property int $status
 * @property float|null $offer_price
 * @property string|null $offer_start_date
 * @property string|null $offer_end_date
 * @property string|null $sku
 * @property string|null $seo_title
 * @property string|null $seo_description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\productImageGallery> $ProductImageGalleries
 * @property-read int|null $product_image_galleries_count
 * @property-read \App\Models\category|null $category
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ProductOption> $productoption
 * @property-read int|null $productoption_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\productVariant> $variants
 * @property-read int|null $variants_count
 * @method static \Illuminate\Database\Eloquent\Builder|product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|product query()
 * @method static \Illuminate\Database\Eloquent\Builder|product whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|product whereLongDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|product whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|product whereOfferEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|product whereOfferPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|product whereOfferStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|product wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|product whereSeoDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|product whereSeoTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|product whereShortDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|product whereSku($value)
 * @method static \Illuminate\Database\Eloquent\Builder|product whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|product whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|product whereThumbImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|product whereUpdatedAt($value)
 */
	class product extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $image
 * @property int $product_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|productImageGallery newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|productImageGallery newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|productImageGallery query()
 * @method static \Illuminate\Database\Eloquent\Builder|productImageGallery whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|productImageGallery whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|productImageGallery whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|productImageGallery whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|productImageGallery whereUpdatedAt($value)
 */
	class productImageGallery extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $product_id
 * @property string $name
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\product|null $product
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ProductVariantItem> $productVariantItmes
 * @property-read int|null $product_variant_itmes_count
 * @method static \Illuminate\Database\Eloquent\Builder|productVariant newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|productVariant newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|productVariant query()
 * @method static \Illuminate\Database\Eloquent\Builder|productVariant whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|productVariant whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|productVariant whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|productVariant whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|productVariant whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|productVariant whereUpdatedAt($value)
 */
	class productVariant extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string|null $banner
 * @property string|null $image
 * @property string|null $type
 * @property string|null $title
 * @property string|null $starting_price
 * @property string|null $btn_url
 * @property int|null $serial
 * @property int|null $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|slider newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|slider newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|slider query()
 * @method static \Illuminate\Database\Eloquent\Builder|slider whereBanner($value)
 * @method static \Illuminate\Database\Eloquent\Builder|slider whereBtnUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|slider whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|slider whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|slider whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|slider whereSerial($value)
 * @method static \Illuminate\Database\Eloquent\Builder|slider whereStartingPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|slider whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|slider whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|slider whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|slider whereUpdatedAt($value)
 */
	class slider extends \Eloquent {}
}

