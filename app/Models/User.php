<?php /** @noinspection PhpUnused */

namespace App\Models;

use Egretos\RestModel\Model;
use Illuminate\Support\Collection;
use InvalidArgumentException;

/**
 * @property-read array $id
 * @property-read array $name
 * @property-read array $location
 * @property-read string $uuid
 * @property-read string $firstName
 * @property-read string $lastName
 * @property-read string $fullName
 * @property-read string $email
 * @property-read string $phone
 * @property-read string $country
 */
class User extends Model
{
	protected $resource = '';
	
	public static function random(int $count = 1) {
		if ($count < 1) {
			throw new InvalidArgumentException('Argument `$count` cannot be less than 0');
		}
		
		if ($count == 1) {
			return static::all()->first();
		} else {
			$collection = new Collection();
			
			while ($count > 0) {
				$collection->add(static::random());
				$count--;
			}
			
			return $collection;
		}
	}
	
	public function getFirstNameAttribute(): string {
		return $this->name['first'];
	}
	
	public function getLastNameAttribute(): string {
		return $this->name['last'];
	}
	
	public function getFullNameAttribute(): string
	{
		return "$this->firstName $this->lastName";
	}
	
	public function getCountryAttribute(): string {
		return $this->location['country'];
	}
	
	public function getUuidAttribute(): string
	{
		if (empty($this->id['name'])) {
			$uuid = "UUID$this->phone";
		} else {
			$uuid = "{$this->id['name']}{$this->id['value']}";
		}
		return preg_replace("/[^a-zA-Z0-9]+/", "", $uuid);
	}
}