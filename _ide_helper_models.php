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
	class IdeHelperAttender {}
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
	class IdeHelperCategory {}
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
	class IdeHelperCity {}
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
	class IdeHelperCountry {}
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
	class IdeHelperEvent {}
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
	class IdeHelperItem {}
}

namespace App\Models{
/**
 * App\Models\othertype
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
	class IdeHelperOtherType {}
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
	class IdeHelperPartner {}
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
 * @method static \Illuminate\Database\Eloquent\Builder|place whereLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|place whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|place whereUpdatedAt($value)
 */
	class IdeHelperPlace {}
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
 * @method static \Illuminate\Database\Eloquent\Builder|speaker whereProfession($value)
 * @method static \Illuminate\Database\Eloquent\Builder|speaker whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|speaker whereUpdatedAt($value)
 */
	class IdeHelperSpeaker {}
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
	class IdeHelperSponsor {}
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
	class IdeHelperState {}
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
	class IdeHelperTicket {}
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
	class IdeHelperType {}
}

namespace App\Models{
/**
 * App\Models\user
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property int $phone
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
 * @method static \Illuminate\Database\Eloquent\Builder|user newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|user newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|user query()
 * @method static \Illuminate\Database\Eloquent\Builder|user whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|user whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|user whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|user whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|user whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|user whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|user whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|user wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|user wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|user whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|user whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|user whereUpdatedAt($value)
 */
	class IdeHelperUser {}
}

