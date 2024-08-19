<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Post Entity
 *
 * @property int $id
 * @property string|null $user
 * @property string|null $address
 * @property string|null $city
 * @property string|null $state
 * @property int|null $zipCode
 * @property float|null $price
 * @property float|null $bedrooms
 * @property float|null $bathrooms
 */
class Post extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'id' => true,
        'user' => true,
        'address' => true,
        'city' => true,
        'state' => true,
        'zipCode' => true,
        'price' => true,
        'bedrooms' => true,
        'bathrooms' => true,
    ];
}
