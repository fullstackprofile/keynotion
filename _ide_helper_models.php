<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\CompanyDetails
 *
 * @property int $id
 * @property int|null $order_id
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $company_name
 * @property string|null $country_region
 * @property string|null $street_address
 * @property string|null $town_city
 * @property string|null $postcode_zip
 * @property string|null $phone
 * @property string|null $email
 * @property string|null $vat_number
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \App\Models\Order|null $order
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyDetails newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyDetails newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyDetails query()
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyDetails whereCompanyName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyDetails whereCountryRegion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyDetails whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyDetails whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyDetails whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyDetails whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyDetails whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyDetails whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyDetails wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyDetails wherePostcodeZip($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyDetails whereStreetAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyDetails whereTownCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyDetails whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CompanyDetails whereVatNumber($value)
 */
	class IdeHelperCompanyDetails {}
}

namespace App\Models{
/**
 * App\Models\Coupon
 *
 * @property int $id
 * @property string|null $code
 * @property string|null $discount
 * @property string|null $percent_amount
 * @property string|null $user
 * @property string|null $email
 * @property string|null $creation_date
 * @property string|null $expiration_date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon query()
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereCreationDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereDiscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereExpirationDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon wherePercentAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereUser($value)
 */
	class IdeHelperCoupon {}
}

namespace App\Models{
/**
 * App\Models\Delegate
 *
 * @property int $id
 * @property int|null $order_id
 * @property string|null $full_name
 * @property string|null $job_title
 * @property string|null $email
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \App\Models\Order|null $order
 * @method static \Illuminate\Database\Eloquent\Builder|Delegate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Delegate newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Delegate query()
 * @method static \Illuminate\Database\Eloquent\Builder|Delegate whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Delegate whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Delegate whereFullName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Delegate whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Delegate whereJobTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Delegate whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Delegate whereUpdatedAt($value)
 */
	class IdeHelperDelegate {}
}

namespace App\Models{
/**
 * App\Models\Order
 *
 * @property int $id
 * @property int $order_number
 * @property string|null $Subtotal
 * @property string|null $VAT
 * @property string|null $Total
 * @property string|null $payment_method
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\CompanyDetails|null $company
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Delegate[] $delegaters
 * @property-read int|null $delegaters_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\OrderItem[] $order_items
 * @property-read int|null $order_items_count
 * @method static \Illuminate\Database\Eloquent\Builder|Order newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order query()
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereOrderNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order wherePaymentMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereSubtotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereVAT($value)
 */
	class IdeHelperOrder {}
}

namespace App\Models{
/**
 * App\Models\OrderItem
 *
 * @property int $id
 * @property int|null $order_id
 * @property int|null $ticket_id
 * @property string|null $ticket_title
 * @property int|null $quantity
 * @property string|null $currency
 * @property float|null $price
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Order|null $order
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItem query()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItem whereCurrency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItem whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItem wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItem whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItem whereTicketId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItem whereTicketTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItem whereUpdatedAt($value)
 */
	class IdeHelperOrderItem {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string $phone
 * @property string $country
 * @property string $role
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class IdeHelperUser {}
}

namespace App\Models{
/**
 * App\Models\appliedSpeaker
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $surname
 * @property string|null $company_name
 * @property string|null $job_title
 * @property string|null $phone
 * @property string|null $corporate_email
 * @property string|null $country
 * @property string|null $summit_name
 * @property string|null $presentation_proposal
 * @property string|null $learn
 * @property string|null $other
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|appliedSpeaker newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|appliedSpeaker newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|appliedSpeaker query()
 * @method static \Illuminate\Database\Eloquent\Builder|appliedSpeaker whereCompanyName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|appliedSpeaker whereCorporateEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|appliedSpeaker whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|appliedSpeaker whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|appliedSpeaker whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|appliedSpeaker whereJobTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|appliedSpeaker whereLearn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|appliedSpeaker whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|appliedSpeaker whereOther($value)
 * @method static \Illuminate\Database\Eloquent\Builder|appliedSpeaker wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|appliedSpeaker wherePresentationProposal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|appliedSpeaker whereSummitName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|appliedSpeaker whereSurname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|appliedSpeaker whereUpdatedAt($value)
 */
	class IdeHelperappliedSpeaker {}
}

namespace App\Models{
/**
 * App\Models\attender
 *
 * @property int $id
 * @property string $title
 * @property string|null $slug
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\event[] $events
 * @property-read int|null $events_count
 * @method static \Illuminate\Database\Eloquent\Builder|attender newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|attender newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|attender query()
 * @method static \Illuminate\Database\Eloquent\Builder|attender whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|attender whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|attender whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|attender whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|attender whereUpdatedAt($value)
 */
	class IdeHelperattender {}
}

namespace App\Models{
/**
 * App\Models\brochure
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $surname
 * @property string|null $company_name
 * @property string|null $job_title
 * @property string|null $phone
 * @property string|null $corporate_email
 * @property string|null $country
 * @property string|null $summit_name
 * @property string|null $comment
 * @property string|null $learn
 * @property string|null $other
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|brochure newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|brochure newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|brochure query()
 * @method static \Illuminate\Database\Eloquent\Builder|brochure whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|brochure whereCompanyName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|brochure whereCorporateEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|brochure whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|brochure whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|brochure whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|brochure whereJobTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|brochure whereLearn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|brochure whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|brochure whereOther($value)
 * @method static \Illuminate\Database\Eloquent\Builder|brochure wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|brochure whereSummitName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|brochure whereSurname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|brochure whereUpdatedAt($value)
 */
	class IdeHelperbrochure {}
}

namespace App\Models{
/**
 * App\Models\category
 *
 * @property int $id
 * @property string|null $slug
 * @property string $title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\event[] $events
 * @property-read int|null $events_count
 * @method static \Illuminate\Database\Eloquent\Builder|category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|category query()
 * @method static \Illuminate\Database\Eloquent\Builder|category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|category whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|category whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|category whereUpdatedAt($value)
 */
	class IdeHelpercategory {}
}

namespace App\Models{
/**
 * App\Models\city
 *
 * @property int $id
 * @property string $name
 * @property int|null $state_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\event[] $events
 * @property-read int|null $events_count
 * @property-read \App\Models\state|null $states
 * @method static \Illuminate\Database\Eloquent\Builder|city newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|city newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|city query()
 * @method static \Illuminate\Database\Eloquent\Builder|city whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|city whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|city whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|city whereStateId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|city whereUpdatedAt($value)
 */
	class IdeHelpercity {}
}

namespace App\Models{
/**
 * App\Models\comment
 *
 * @property int $id
 * @property int|null $news_id
 * @property string|null $comment
 * @property string|null $name
 * @property string|null $email
 * @property string|null $website
 * @property int $approve
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\news|null $news
 * @method static \Illuminate\Database\Eloquent\Builder|comment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|comment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|comment query()
 * @method static \Illuminate\Database\Eloquent\Builder|comment whereApprove($value)
 * @method static \Illuminate\Database\Eloquent\Builder|comment whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|comment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|comment whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|comment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|comment whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|comment whereNewsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|comment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|comment whereWebsite($value)
 */
	class IdeHelpercomment {}
}

namespace App\Models{
/**
 * App\Models\country
 *
 * @property int $id
 * @property string $code
 * @property string $name
 * @property int $phonecode
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\event[] $events
 * @property-read int|null $events_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\state[] $states
 * @property-read int|null $states_count
 * @method static \Illuminate\Database\Eloquent\Builder|country newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|country newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|country query()
 * @method static \Illuminate\Database\Eloquent\Builder|country whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|country whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|country whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|country whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|country wherePhonecode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|country whereUpdatedAt($value)
 */
	class IdeHelpercountry {}
}

namespace App\Models{
/**
 * App\Models\event
 *
 * @property int $id
 * @property int|null $category_id
 * @property string|null $slug
 * @property string|null $title
 * @property string|null $start_date
 * @property string|null $end_date
 * @property string|null $address
 * @property int|null $city_id
 * @property int|null $state_id
 * @property int|null $country_id
 * @property string|null $small_description
 * @property string|null $about_info
 * @property array|null $key_topics
 * @property array|null $vip_tour
 * @property array|null $key_takeaway
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\attender[] $attenders
 * @property-read int|null $attenders_count
 * @property-read \App\Models\category|null $category
 * @property-read \App\Models\city|null $city
 * @property-read \App\Models\country|null $country
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection|\Spatie\MediaLibrary\MediaCollections\Models\Media[] $media
 * @property-read int|null $media_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\partner[] $partners
 * @property-read int|null $partners_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\place[] $places
 * @property-read int|null $places_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\speaker[] $speakers
 * @property-read int|null $speakers_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\sponsor[] $sponsors
 * @property-read int|null $sponsors_count
 * @property-read \App\Models\state|null $state
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ticket[] $tickets
 * @property-read int|null $tickets_count
 * @method static \Illuminate\Database\Eloquent\Builder|event newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|event newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|event query()
 * @method static \Illuminate\Database\Eloquent\Builder|event whereAboutInfo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|event whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|event whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|event whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|event whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|event whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|event whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|event whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|event whereKeyTakeaway($value)
 * @method static \Illuminate\Database\Eloquent\Builder|event whereKeyTopics($value)
 * @method static \Illuminate\Database\Eloquent\Builder|event whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|event whereSmallDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|event whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|event whereStateId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|event whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|event whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|event whereVipTour($value)
 */
	class IdeHelperevent {}
}

namespace App\Models{
/**
 * App\Models\eventQuestion
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $number
 * @property string $message
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|eventQuestion newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|eventQuestion newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|eventQuestion query()
 * @method static \Illuminate\Database\Eloquent\Builder|eventQuestion whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|eventQuestion whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|eventQuestion whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|eventQuestion whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|eventQuestion whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|eventQuestion whereNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|eventQuestion whereUpdatedAt($value)
 */
	class IdeHelpereventQuestion {}
}

namespace App\Models{
/**
 * App\Models\item
 *
 * @property int $id
 * @property string $slug
 * @property string $title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ticket[] $tickets
 * @property-read int|null $tickets_count
 * @method static \Illuminate\Database\Eloquent\Builder|item newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|item newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|item query()
 * @method static \Illuminate\Database\Eloquent\Builder|item whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|item whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|item whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|item whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|item whereUpdatedAt($value)
 */
	class IdeHelperitem {}
}

namespace App\Models{
/**
 * App\Models\news
 *
 * @property int $id
 * @property string $slug
 * @property string $title
 * @property int|null $news_category_id
 * @property string $description
 * @property string $date
 * @property array $item
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\comment[] $comments
 * @property-read int|null $comments_count
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection|\Spatie\MediaLibrary\MediaCollections\Models\Media[] $media
 * @property-read int|null $media_count
 * @property-read \App\Models\newsCategory|null $news_category
 * @method static \Illuminate\Database\Eloquent\Builder|news newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|news newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|news query()
 * @method static \Illuminate\Database\Eloquent\Builder|news whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|news whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|news whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|news whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|news whereItem($value)
 * @method static \Illuminate\Database\Eloquent\Builder|news whereNewsCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|news whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|news whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|news whereUpdatedAt($value)
 */
	class IdeHelpernews {}
}

namespace App\Models{
/**
 * App\Models\newsCategory
 *
 * @property int $id
 * @property string $slug
 * @property string $title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\news[] $news
 * @property-read int|null $news_count
 * @method static \Illuminate\Database\Eloquent\Builder|newsCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|newsCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|newsCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|newsCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|newsCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|newsCategory whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|newsCategory whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|newsCategory whereUpdatedAt($value)
 */
	class IdeHelpernewsCategory {}
}

namespace App\Models{
/**
 * App\Models\otherType
 *
 * @property int $id
 * @property string $slug
 * @property string $title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ticket[] $tickets
 * @property-read int|null $tickets_count
 * @method static \Illuminate\Database\Eloquent\Builder|otherType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|otherType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|otherType query()
 * @method static \Illuminate\Database\Eloquent\Builder|otherType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|otherType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|otherType whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|otherType whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|otherType whereUpdatedAt($value)
 */
	class IdeHelperotherType {}
}

namespace App\Models{
/**
 * App\Models\partner
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $slug
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\event[] $events
 * @property-read int|null $events_count
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection|\Spatie\MediaLibrary\MediaCollections\Models\Media[] $media
 * @property-read int|null $media_count
 * @method static \Illuminate\Database\Eloquent\Builder|partner newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|partner newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|partner query()
 * @method static \Illuminate\Database\Eloquent\Builder|partner whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|partner whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|partner whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|partner whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|partner whereUpdatedAt($value)
 */
	class IdeHelperpartner {}
}

namespace App\Models{
/**
 * App\Models\place
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $address
 * @property string|null $latitude
 * @property string|null $longitude
 * @property string|null $link
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\event[] $events
 * @property-read int|null $events_count
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection|\Spatie\MediaLibrary\MediaCollections\Models\Media[] $media
 * @property-read int|null $media_count
 * @method static \Illuminate\Database\Eloquent\Builder|place newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|place newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|place query()
 * @method static \Illuminate\Database\Eloquent\Builder|place whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|place whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|place whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|place whereLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|place whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|place whereLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|place whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|place whereUpdatedAt($value)
 */
	class IdeHelperplace {}
}

namespace App\Models{
/**
 * App\Models\question
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $company
 * @property string $interested
 * @property string $event
 * @property string $question
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|question newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|question newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|question query()
 * @method static \Illuminate\Database\Eloquent\Builder|question whereCompany($value)
 * @method static \Illuminate\Database\Eloquent\Builder|question whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|question whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|question whereEvent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|question whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|question whereInterested($value)
 * @method static \Illuminate\Database\Eloquent\Builder|question whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|question wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|question whereQuestion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|question whereUpdatedAt($value)
 */
	class IdeHelperquestion {}
}

namespace App\Models{
/**
 * App\Models\speaker
 *
 * @property int $id
 * @property string|null $slug
 * @property string $full_name
 * @property string $profession
 * @property string $company
 * @property string $linkedin
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\event[] $events
 * @property-read int|null $events_count
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection|\Spatie\MediaLibrary\MediaCollections\Models\Media[] $media
 * @property-read int|null $media_count
 * @method static \Illuminate\Database\Eloquent\Builder|speaker newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|speaker newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|speaker query()
 * @method static \Illuminate\Database\Eloquent\Builder|speaker whereCompany($value)
 * @method static \Illuminate\Database\Eloquent\Builder|speaker whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|speaker whereFullName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|speaker whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|speaker whereLinkedin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|speaker whereProfession($value)
 * @method static \Illuminate\Database\Eloquent\Builder|speaker whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|speaker whereUpdatedAt($value)
 */
	class IdeHelperspeaker {}
}

namespace App\Models{
/**
 * App\Models\sponsor
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $slug
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\event[] $events
 * @property-read int|null $events_count
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection|\Spatie\MediaLibrary\MediaCollections\Models\Media[] $media
 * @property-read int|null $media_count
 * @method static \Illuminate\Database\Eloquent\Builder|sponsor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|sponsor newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|sponsor query()
 * @method static \Illuminate\Database\Eloquent\Builder|sponsor whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|sponsor whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|sponsor whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|sponsor whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|sponsor whereUpdatedAt($value)
 */
	class IdeHelpersponsor {}
}

namespace App\Models{
/**
 * App\Models\sponsorship
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $surname
 * @property string|null $company_name
 * @property string|null $job_title
 * @property string|null $phone_number
 * @property string|null $corporate_email
 * @property string|null $country
 * @property string|null $summit_name
 * @property string|null $comments
 * @property string|null $package_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|sponsorship newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|sponsorship newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|sponsorship query()
 * @method static \Illuminate\Database\Eloquent\Builder|sponsorship whereComments($value)
 * @method static \Illuminate\Database\Eloquent\Builder|sponsorship whereCompanyName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|sponsorship whereCorporateEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|sponsorship whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|sponsorship whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|sponsorship whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|sponsorship whereJobTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|sponsorship whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|sponsorship wherePackageName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|sponsorship wherePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|sponsorship whereSummitName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|sponsorship whereSurname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|sponsorship whereUpdatedAt($value)
 */
	class IdeHelpersponsorship {}
}

namespace App\Models{
/**
 * App\Models\state
 *
 * @property int $id
 * @property string $name
 * @property int|null $country_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\city[] $cities
 * @property-read int|null $cities_count
 * @property-read \App\Models\country|null $countries
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\event[] $events
 * @property-read int|null $events_count
 * @method static \Illuminate\Database\Eloquent\Builder|state newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|state newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|state query()
 * @method static \Illuminate\Database\Eloquent\Builder|state whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|state whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|state whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|state whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|state whereUpdatedAt($value)
 */
	class IdeHelperstate {}
}

namespace App\Models{
/**
 * App\Models\subscriber
 *
 * @property int $id
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder|subscriber newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|subscriber newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|subscriber query()
 * @method static \Illuminate\Database\Eloquent\Builder|subscriber whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|subscriber whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|subscriber whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|subscriber whereUpdatedAt($value)
 */
	class IdeHelpersubscriber {}
}

namespace App\Models{
/**
 * App\Models\testimonial
 *
 * @property int $id
 * @property float $star
 * @property string $testimonial
 * @property string $full_name
 * @property string $heading
 * @property string $profession
 * @property string $company
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection|\Spatie\MediaLibrary\MediaCollections\Models\Media[] $media
 * @property-read int|null $media_count
 * @method static \Illuminate\Database\Eloquent\Builder|testimonial newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|testimonial newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|testimonial query()
 * @method static \Illuminate\Database\Eloquent\Builder|testimonial whereCompany($value)
 * @method static \Illuminate\Database\Eloquent\Builder|testimonial whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|testimonial whereFullName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|testimonial whereHeading($value)
 * @method static \Illuminate\Database\Eloquent\Builder|testimonial whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|testimonial whereProfession($value)
 * @method static \Illuminate\Database\Eloquent\Builder|testimonial whereStar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|testimonial whereTestimonial($value)
 * @method static \Illuminate\Database\Eloquent\Builder|testimonial whereUpdatedAt($value)
 */
	class IdeHelpertestimonial {}
}

namespace App\Models{
/**
 * App\Models\ticket
 *
 * @property int $id
 * @property string|null $slug
 * @property int|null $event_id
 * @property int|null $type_id
 * @property int|null $other_type_id
 * @property float|null $price
 * @property float|null $sale
 * @property string|null $currency
 * @property int $attractive
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\event|null $event
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\item[] $items
 * @property-read int|null $items_count
 * @property-read \App\Models\otherType|null $othertype
 * @property-read \App\Models\type|null $type
 * @method static \Illuminate\Database\Eloquent\Builder|ticket newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ticket newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ticket query()
 * @method static \Illuminate\Database\Eloquent\Builder|ticket whereAttractive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ticket whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ticket whereCurrency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ticket whereEventId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ticket whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ticket whereOtherTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ticket wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ticket whereSale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ticket whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ticket whereTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ticket whereUpdatedAt($value)
 */
	class IdeHelperticket {}
}

namespace App\Models{
/**
 * App\Models\type
 *
 * @property int $id
 * @property string $slug
 * @property string $title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ticket[] $tickets
 * @property-read int|null $tickets_count
 * @method static \Illuminate\Database\Eloquent\Builder|type newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|type newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|type query()
 * @method static \Illuminate\Database\Eloquent\Builder|type whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|type whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|type whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|type whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|type whereUpdatedAt($value)
 */
	class IdeHelpertype {}
}

namespace App\Models{
/**
 * App\Models\vacancy
 *
 * @property int $id
 * @property string|null $slug
 * @property string|null $title
 * @property string|null $job_description
 * @property array|null $about_role
 * @property array|null $looking_for
 * @property array|null $benefits
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|vacancy newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|vacancy newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|vacancy query()
 * @method static \Illuminate\Database\Eloquent\Builder|vacancy whereAboutRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|vacancy whereBenefits($value)
 * @method static \Illuminate\Database\Eloquent\Builder|vacancy whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|vacancy whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|vacancy whereJobDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|vacancy whereLookingFor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|vacancy whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|vacancy whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|vacancy whereUpdatedAt($value)
 */
	class IdeHelpervacancy {}
}

